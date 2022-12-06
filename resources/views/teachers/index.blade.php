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
            <h4 class="mb-0"> {{trans('teachers.teachers')}}</h4>
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
                    {{ trans('teachers.add_teacher') }}
                </button>
                <br><br>
                      
                <div class="table-responsive">
                    <table id="datatable" class="table table-striped table-bordered p-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th><b>{{trans('teachers.teacher_name')}}</b></th>
                                <th><b>{{trans('teachers.teacher_subject')}}</b></th>
                                <th><b>{{trans('stages.actions')}}</b></th>

                            </tr>
                        </thead>
                        <tbody>
                            @php

                            $slug = (app()->getLocale() == 'ar')?'_ar':'_en';
                            $i = 0;
                            $name_attr = 'name'.$slug;

                            @endphp

                            @foreach ($teachers as $teacher)
                            <tr>
                                @php $i++; @endphp
                                <td><b>{{$i}}</b></td>
                                <td><b>{{$teacher->$name_attr}}</b></td>
                                <td><b>{{$teacher->subject->$name_attr}}</b></td>
                                <td>
                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                        data-target="#edit{{ $teacher->id }}"
                                        title="{{ trans('students.edit') }}"><i class="fa fa-edit"></i></button>
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                        data-target="#delete{{ $teacher->id }}"
                                        title="{{ trans('students.delete') }}"><i class="fa fa-trash"></i></button>

                                        <a type="button" href="{{route('teachers.show', $teacher->id)}}" class="btn btn-warning btn-sm" title="{{ trans('students.show_students') }}"><i style="color: #ffffff" class="fa fa-eye"></i>
                                    
                                </td>

                            </tr>
                            <!-- edit_modal_Classroom -->
                            <div class="modal fade" id="edit{{ $teacher->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                id="exampleModalLabel">
                                                {{ trans('teachers.edit_teacher') }}
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">

                                <!-- edit_form -->
                             
                                    <form action="{{ route('teachers.update', $teacher->id) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <div class="row">
                                            <div class="col">
                                                <label for="name" class="mr-sm-2">{{
                                                    trans('teachers.teacher_name') }}
                                                    :</label>
                                                <input id="Name" type="text" value="{{$teacher->name_ar}}" name="name_ar" class="form-control">
                                            </div>
                                            <div class="col">
                                                <label for="name" class="mr-sm-2">{{
                                                    trans('teachers.teacher_name_en') }}
                                                    :</label>
                                                <input id="Name" type="text" value="{{$teacher->name_en}}" name="name_en" class="form-control">
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col">
                                                <label for="name" class="mr-sm-2">{{
                                                    trans('teachers.email') }}
                                                    :</label>
                                                <input id="Name" type="text" value="{{$teacher->email}}" name="email" class="form-control">
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col">
                                                <label for="name" class="mr-sm-2">{{
                                                    trans('teachers.mobile') }}
                                                    :</label>
                                                <input id="Name" type="text" value="{{$teacher->phone}}" name="phone" class="form-control">
                                            </div>
                                            <div class="col">
                                                <label for="name" class="mr-sm-2">{{
                                                    trans('teachers.address') }}
                                                    :</label>
                                                <input id="Name" type="text" value="{{$teacher->address}}" name="address" class="form-control">
                                            </div>
                                        </div>
                                        <br>
                                        <div class="form-group">
                                            <label for="exampleFormControlTextarea1">{{ trans('teachers.teacher_subject') }}
                                                :</label>
                                            <select name="subject" id="" class="form-control">
                                                <option value="{{$teacher->subject->id}}" selected>{{$teacher->subject->$name_attr}}</option>
                                                @foreach ($subjects as $subject)
                                                <option value="{{$subject->id}}">{{$subject->$name_attr}}</option>
                                                @endforeach
                                            </select>
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
                            <div class="modal fade" id="delete{{ $teacher->id }}" tabindex="-1" role="dialog"
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
                                            <form action="{{ route('teachers.destroy', $teacher->id) }}" method="post">
                                                {{ method_field('Delete') }}
                                                @csrf
                                                {{ trans('classrooms.delete') }}
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
                                        {{ trans('teachers.add_teacher') }}
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    
                                    <!-- add_form -->
                                    <form action="{{ route('teachers.store') }}" method="POST">
                                        @csrf
                                        <div class="row">
                                            <div class="col">
                                                <label for="name" class="mr-sm-2">{{
                                                    trans('teachers.teacher_name') }}
                                                    :</label>
                                                <input id="Name" type="text" name="name_ar" class="form-control">
                                            </div>
                                            <div class="col">
                                                <label for="name" class="mr-sm-2">{{
                                                    trans('teachers.teacher_name_en') }}
                                                    :</label>
                                                <input id="Name" type="text" name="name_en" class="form-control">
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col">
                                                <label for="name" class="mr-sm-2">{{
                                                    trans('teachers.email') }}
                                                    :</label>
                                                <input id="Name" type="text" name="email" class="form-control">
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col">
                                                <label for="name" class="mr-sm-2">{{
                                                    trans('teachers.mobile') }}
                                                    :</label>
                                                <input id="Name" type="text" name="phone" class="form-control">
                                            </div>
                                            <div class="col">
                                                <label for="name" class="mr-sm-2">{{
                                                    trans('teachers.address') }}
                                                    :</label>
                                                <input id="Name" type="text" name="address" class="form-control">
                                            </div>
                                        </div>
                                        <br>
                                        <div class="form-group">
                                            <label for="exampleFormControlTextarea1">{{ trans('teachers.teacher_subject') }}
                                                :</label>
                                            <select name="subject" id="" class="form-control">
                                                <option value="" disabled selected>{{trans('subjects.subject_name')}}</option>
                                                @foreach ($subjects as $subject)
                                                <option value="{{$subject->id}}">{{$subject->$name_attr}}</option>
                                                @endforeach
                                            </select>
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