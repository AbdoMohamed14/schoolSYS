@extends('layouts.master')
@section('css')

@section('title')
empty
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> {{trans('classrooms.classromms')}}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">Home</a></li>
                <li class="breadcrumb-item active">Page Title</li>
            </ol>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <div class="card card-statistics h-100">
            <div class="card-body">

                <button type="button" class="button x-small" data-toggle="modal" data-target="#exampleModal">
                    {{ trans('classrooms.add_classroom') }}
                </button>
                <br><br>

                <div class="table-responsive">
                    <table id="datatable" class="table table-striped table-bordered p-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th><b>{{trans('classrooms.classroom')}}</b></th>
                                <th><b>{{trans('classrooms.stage_class')}}</b></th>
                                <th><b>{{trans('stages.stage_name')}}</b></th>
                                <th><b>{{trans('stages.actions')}}</b></th>

                            </tr>
                        </thead>
                        <tbody>
                            @php

                            $slug = (app()->getLocale() == 'ar')?'_ar':'_en';
                            $i = 0;
                            $name_attr = 'name'.$slug;

                            @endphp

                            @foreach ($classrooms as $classroom)
                            <tr>
                                @php $i++; @endphp
                                <td><b>{{$i}}</b></td>
                                <td><b>{{$classroom->name}}</b></td>
                                <td><b>{{$classroom->stageClass->$name_attr}}</b></td>
                                <td><b>{{$classroom->stage->$name_attr}}</b></td>
                                <td>
                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                        data-target="#edit{{ $classroom->id }}"
                                        title="{{ trans('students.edit') }}"><i class="fa fa-edit"></i></button>
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                        data-target="#delete{{ $classroom->id }}"
                                        title="{{ trans('students.delete') }}"><i class="fa fa-trash"></i></button>

                                        <a type="button" href="{{route('classrooms.show',$classroom->id)}}" class="btn btn-warning btn-sm" title="{{ trans('students.show_students') }}"><i style="color: #ffffff" class="fa fa-eye"></i>
                                    
                                </td>

                            </tr>
                            <!-- edit_modal_Classroom -->
                            <div class="modal fade" id="edit{{ $classroom->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                id="exampleModalLabel">
                                                {{ trans('stages.edit_Grade') }}
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                <!-- edit_form -->
                                        <form action="{{ route('classrooms.update', $classroom->id) }}" method="POST">
                                            @method('PATCH')
                                            @csrf
                                            <div class="row">
                                                <div class="col">
                                                    <label for="name" class="mr-sm-2">{{
                                                        trans('classrooms.classroom') }}
                                                        :</label>
                                                    <input id="Name" type="text" value="{{$classroom->name}}" name="name" class="form-control">
                                                </div>
                                            </div>
                                            <br>
                                            <div class="form-group">
                                                <label for="exampleFormControlTextarea1">{{ trans('stage_classes.stage') }}
                                                    :</label>
                                                <select name="stage" id="" class="form-control">
                                                    <option value="{{$classroom->stage->id}}" selected>{{$classroom->stage->$name_attr}}</option>
                                                    @foreach ($stages as $stage)
                                                    <option value="{{$stage->id}}">{{$stage->$name_attr}}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleFormControlTextarea1">{{ trans('classrooms.stage_class') }}
                                                    :</label>
                                                <select name="stage_class" id="" class="form-control">
                                                    <option value="{{$classroom->stageClass->id}}" selected>{{$classroom->stageClass->$name_attr}}</option>
                                                    @foreach ($stage_classes as $stage_class)
                                                    <option value="{{$stage_class->id}}">{{$stage_class->$name_attr}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <label for="teachers">المعلمين</label>
                                                    <select class="custom-select" name="teachers[]" multiple>
                                                        <option selected disabled>Open this select menu</option>
                                                        @foreach ($teachers as $teacher)
                                                            <option value="{{$teacher->id}}">{{$teacher->name_ar}}->{{$teacher->subject->name_ar}}</option>
                                                        @endforeach
                                                      </select>
                                                </div>
                                            </div>    

                                            <div class="row">
                                                <div class="col">
                                                    <label for="name" class="mr-sm-2">{{
                                                        trans('stages.notes') }}
                                                        :</label>
                                                    <input id="Name" type="text" value="{{$classroom->notes}}" name="notes" class="form-control">
                                                </div>
                                            </div>
                                            <br><br>
                                            
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{
                                                    trans('stages.Close') }}</button>
                                                <button type="submit" class="btn btn-success">{{ trans('stages.submit') }}</button>
                                            </div>
                                        </form>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- delete_modal_Grade -->
                            <div class="modal fade" id="delete{{ $classroom->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                id="exampleModalLabel">
                                                {{ trans('stages.delete_Grade') }}
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('classrooms.destroy', $classroom->id) }}" method="post">
                                                {{ method_field('Delete') }}
                                                @csrf
                                                {{ trans('classrooms.delete') }}
                                                <input id="id" type="hidden" name="id" class="form-control"
                                                    value="{{ $classroom->id }}">
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">{{ trans('stages.Close') }}</button>
                                                    <button type="submit" class="btn btn-danger">{{
                                                        trans('stages.delete') }}</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            @endforeach
                    </table>
                    <!-- add_modal_Classroom -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                        id="exampleModalLabel">
                                        {{ trans('stage_classes.add_stage_class') }}
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <!-- add_form -->
                                    <form action="{{ route('classrooms.store') }}" method="POST">
                                        @csrf
                                        <div class="row">
                                            <div class="col">
                                                <label for="name" class="mr-sm-2">{{
                                                    trans('classrooms.classroom') }}
                                                    :</label>
                                                <input id="Name" type="text" name="name" class="form-control">
                                            </div>
                                        </div>
                                        <br>

                                        <div class="form-group">
                                            <label for="exampleFormControlTextarea1">{{ trans('stage_classes.stage') }}
                                                :</label>
                                            <select name="stage" id="" class="form-control">
                                                <option value="" disabled selected>{{trans('stages.stage_name')}}</option>
                                                @foreach ($stages as $stage)
                                                <option value="{{$stage->id}}">{{$stage->$name_attr}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleFormControlTextarea1">{{ trans('classrooms.stage_class') }}
                                                :</label>
                                            <select name="stage_class" id="" class="form-control">
                                                <option value="" disabled selected>{{trans('stage_classes.stage_class')}}</option>
                                                @foreach ($stage_classes as $stage_class)
                                                <option value="{{$stage_class->id}}">{{$stage_class->$name_attr}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <label for="teachers">{{trans('teachers.teachers')}}</label>
                                                <select class="custom-select" name="teachers[]" multiple>
                                                    <option selected disabled style="color: darkgoldenrod">you can select many teachers</option>
                                                    @foreach ($teachers as $teacher)
                                                        <option value="{{$teacher->id}}">{{$teacher->$name_attr}}->{{$teacher->subject->$name_attr}}</option>
                                                    @endforeach
                                                  </select>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col">
                                                <label for="name" class="mr-sm-2">{{
                                                    trans('stages.notes') }}
                                                    :</label>
                                                <input id="Name" type="text" name="notes" class="form-control">
                                            </div>
                                        </div>
                                        <br><br>
                                        
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">{{
                                                trans('stages.Close') }}</button>
                                            <button type="submit" class="btn btn-success">{{ trans('stages.submit') }}</button>
                                        </div>
                                </form>
                            </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

                <!-- row closed -->
                @endsection
                @section('js')

                @endsection