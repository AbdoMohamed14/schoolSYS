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
            <h4 class="mb-0"> {{trans('subjects.subjects')}}</h4>
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
                    {{ trans('subjects.add_subject') }}
                </button>
                <br><br>
                    
                <div class="table-responsive">
                    <table id="datatable" class="table table-striped table-bordered p-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th><b>{{trans('subjects.subjects')}}</b></th>
                                <th><b>{{trans('stages.actions')}}</b></th>

                            </tr>
                        </thead>
                        <tbody>
                            @php

                            $slug = (app()->getLocale() == 'ar')?'_ar':'_en';
                            $i = 0;
                            $name_attr = 'name'.$slug;

                            @endphp

                            @foreach ($subjects as $subject)
                            <tr>
                                @php $i++; @endphp
                                <td><b>{{$i}}</b></td>
                                <td><b>{{$subject->$name_attr}}</b></td>
                                <td>
                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                        data-target="#edit{{ $subject->id }}"
                                        title="{{ trans('students.edit') }}"><i class="fa fa-edit"></i></button>
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                        data-target="#delete{{ $subject->id }}"
                                        title="{{ trans('students.delete') }}"><i class="fa fa-trash"></i></button>

                                        <a type="button" href="{{route('subjects.show',$subject->id)}}" class="btn btn-warning btn-sm" title="{{ trans('students.show_students') }}"><i style="color: #ffffff" class="fa fa-eye"></i>
                                    
                                </td>

                            </tr>
                            <!-- edit_modal_Classroom -->
                            <div class="modal fade" id="edit{{ $subject->id }}" tabindex="-1" role="dialog"
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

                                <!-- edit_subject_form -->
                             
                                    <form action="{{ route('subjects.update', $subject->id) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PATCH')
                                        <div class="row">
                                            <div class="col">
                                                <label for="name" class="mr-sm-2">{{
                                                    trans('subjects.subject_name') }}
                                                    :</label>
                                                <input id="Name" value="{{$subject->name_ar}}" type="text" name="name_ar" class="form-control">
                                            </div>
                                            <div class="col">
                                                <label for="name" class="mr-sm-2">{{
                                                    trans('subjects.subject_name_en') }}
                                                    :</label>
                                                <input id="Name" value="{{$subject->name_en}}" type="text" name="name_en" class="form-control">
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col">
                                                <label for="name" class="mr-sm-2">{{
                                                    trans('subjects.image') }}
                                                    :</label>
                                                <input id="Name" type="file" name="image" class="form-control">
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
                            <div class="modal fade" id="delete{{ $subject->id }}" tabindex="-1" role="dialog"
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
                                            <form action="{{ route('subjects.destroy', $subject->id) }}" method="post">
                                                {{ method_field('Delete') }}
                                                @csrf
                                                {{ trans('subjects.delete') }}
                                                <input id="id" type="hidden" name="id" class="form-control"
                                                    value="{{ $subject->id }}">
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
                    <!-- add_modal_Subject -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                        id="exampleModalLabel">
                                        {{ trans('subjects.add_subject') }}
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <!-- add_form -->
                                    <form action="{{ route('subjects.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col">
                                                <label for="name" class="mr-sm-2">{{
                                                    trans('subjects.subject_name') }}
                                                    :</label>
                                                <input id="Name" required type="text" name="name_ar" class="form-control">
                                            </div>
                                            <div class="col">
                                                <label for="name" class="mr-sm-2">{{
                                                    trans('subjects.subject_name_en') }}
                                                    :</label>
                                                <input id="Name" required type="text" name="name_en" class="form-control">
                                            </div>
                                        </div>
                                        <br>
                                        <div class="form-group">
                                            <label for="exampleFormControlTextarea1">{{ trans('stage_classes.stage') }}
                                                :</label>
                                            <select name="stage_class" required id="" class="form-control">
                                                <option value="" disabled selected>{{trans('stage_classes.choose')}}</option>
                                                @foreach ($stage_classes as $stage_class)
                                                <option value="{{$stage_class->id}}">{{$stage_class->$name_attr}}</option>
                                                @endforeach
                                            </select>
                                        </div>


                                        <div class="row">
                                            <div class="col">
                                                <label for="name" class="mr-sm-2">{{
                                                    trans('subjects.image') }}
                                                    :</label>
                                                <input id="Name" type="file" name="image" class="form-control">
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