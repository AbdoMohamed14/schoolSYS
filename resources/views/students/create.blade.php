@extends('layouts.master')
@section('css')

@section('title')
    empty
@stop
@endsection
@php
    $slug = (app()->getLocale() =='en')?'_en':'_ar';
    $name_attr = 'name'.$slug;
@endphp
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">{{trans('students.add_student')}}</h4>
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
                <form action="{{ route('students.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <label for="name" class="mr-sm-2">{{
                                trans('students.student_name_ar') }}
                                :</label>
                            <input type="text" name="name_ar" required class="form-control">
                        </div>
                        <div class="col">
                            <label for="name" class="mr-sm-2">{{
                                trans('students.student_name_en') }}
                                :</label>
                            <input type="text" name="name_en" required class="form-control">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col">
                            <label for="name" class="mr-sm-2">{{
                                trans('students.blood') }}
                                :</label>
                                <select name="blood" required class="form-control">
                                    <option value="A">A</option>
                                    <option value="O">O</option>
                                    <option value="A+">A+</option>
                                    <option value="A-">A-</option>
                                </select>
                        </div>
                        <div class="col">
                            <label for="name" class="mr-sm-2">{{
                                trans('students.religion') }}
                                :</label>
                                <select name="religion" required class="form-control">
                                    <option value="muslim">Muslim</option>
                                    <option value="christian">Christian</option>
                                </select>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col">
                            <label for="name" class="mr-sm-2">{{
                                trans('students.stage_class') }}
                                :</label>
                                <select name="stage_class" id="" required class="form-control">
                                    @foreach ($stage_classes as $stage_class)
                                        <option value="{{$stage_class->id}}">{{$stage_class->$name_attr}}</option>
                                    @endforeach
                                </select>
                        </div>
                        <div class="col">
                            <label for="name" class="mr-sm-3">{{
                                trans('students.classroom') }}
                                :</label>
                                <select name="classroom" id="" required class="form-control">
                                    @foreach ($classrooms as $classroom)
                                        <option value="{{$classroom->id}}">{{$classroom->name}}</option>
                                    @endforeach
                                </select>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col">
                            <label for="name" class="mr-sm-2">{{
                                trans('students.image') }}
                                :</label>
                                <input type="file" name="image" id="" class="form-control">
                        </div>
                        <div class="col">
                            <label for="name" class="mr-sm-2">{{
                                trans('students.address') }}
                                :</label>
                            <input id="Name" type="text" name="address" required class="form-control">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col">
                            <label for="name" class="mr-sm-2">{{trans('students.parent') }}
                                :</label>
                                <select class="js-example-basic-single form-control" required name="parent">
                                    @foreach ($parents as $parent)
                                        <option value="{{$parent->id}}">{{$parent->$name_attr}}</option>
                                    @endforeach
                                </select>
    
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
<!-- row closed -->
@endsection
@section('js')
    <script>
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });
    </script>
@endsection
