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
            <h4 class="mb-0"> {{trans('students.parents')}}</h4>
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

                <button type="button" class="button x-small">
                    <a href="{{route('students.create')}}">{{ trans('students.add_student') }}
                    </a>
                </button>
                <br><br>
                      
                <div class="table-responsive">
                    <table id="datatable" class="table table-striped table-bordered p-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th><b>{{trans('students.student_name')}}</b></th>
                                <th><b>{{trans('students.classroom')}}</b></th>
                                <th><b>{{trans('students.stage_class')}}</b></th>
                                <th><b>{{trans('stages.actions')}}</b></th>

                            </tr>
                        </thead>
                        <tbody>
                            @php

                            $slug = (app()->getLocale() == 'ar')?'_ar':'_en';
                            $i = 0;
                            $name_attr = 'name'.$slug;

                            @endphp

                            @foreach ($students as $student)
                            <tr>
                                @php $i++; @endphp
                                <td><b>{{$i}}</b></td>
                                <td><b>{{$student->$name_attr}}</b></td>
                                <td><b>{{$student->classroom->name}}</b></td>
                                <td><b>{{$student->stageClass->$name_attr}}</b></td>
                                <td>
                                    <a type="button" href="{{route('students.edit', $student->id)}}" class="btn btn-info btn-sm" title="{{trans('students.edit')}}"><i style="color: #ffffff" class="fa fa-edit"></i></a>
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                        data-target="#delete{{ $student->id }}"
                                        title="{{ trans('students.delete') }}"><i class="fa fa-trash"></i></button>

                                        <a type="button" href="{{route('teachers.show', $student->id)}}" class="btn btn-warning btn-sm" title="{{ trans('students.show_students') }}"><i style="color: #ffffff" class="fa fa-eye"></i>
                                    
                                </td>

                            </tr>
                            <!-- delete_modal_Grade -->
                            <div class="modal fade" id="delete{{ $student->id }}" tabindex="-1" role="dialog"
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
                                            <form action="{{ route('students.destroy', $student->id) }}" method="post">
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
                </div>
            </div>
        </div>

       <!-- row closed -->
     @endsection
     @section('js')

     @endsection