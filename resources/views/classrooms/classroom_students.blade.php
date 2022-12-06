@extends('layouts.master')
@section('css')

@section('title')
    empty
@stop
@endsection

@php
    $slug = (app()->getLocale() == 'en')?'_en':'_ar';
    $name_attr = 'name'.$slug;
@endphp
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">{{ trans('classrooms.classroom'). '/ ' .$classroom->name }}</h4>
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
        <div class="card card-statistics h-100">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                           style="text-align: center">
                        <thead>
                        <tr class="table-success">
                            <th>#</th>
                            <th>{{ trans('students.student_name') }}</th>
                            <th>{{ trans('students.stage') }}</th>
                            <th>{{ trans('students.stage_class') }}</th>
                            <th>{{ trans('students.classroom') }}</th>
                            <th>{{ trans('students.blood_type') }}</th>
                            <th>{{ trans('students.religion') }}</th>
                            <th>{{ trans('students.actions') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $i = 0; ?>
                        @foreach ($classroom->students as $student)
                            <tr>
                                <?php $i++; ?>
                                <td>{{ $i }}</td>
                                <td>{{ $student->$name_attr }}</td>
                                <td>{{ $student->stage->$name_attr }}</td>
                                <td>{{ $student->stageClass->$name_attr }}</td>
                                <td>{{ $student->classroom->name }}</td>
                                <td>{{ $student->blood }}</td>
                                <td>{{ $student->religion }}</td>
                                <td>
                                    <button wire:click="editMode({{ $student->id }})" title="{{ trans('Grades_trans.Edit') }}"
                                            class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></button>
                                    <button type="button" class="btn btn-danger btn-sm"  title="{{ trans('Grades_trans.Delete') }}" data-toggle="modal" data-target='#deleteModal{{$student->id}}'><i class="fa fa-trash"></i></button>
                                </td>
                            </tr>
                
                            <!-- Modal -->
                                <div class="modal fade" id="deleteModal{{$student->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        </div>
                                        <div class="modal-body">
                                        هل انت متأكد من حذف هذا الطالب
                                        </div>
                                        <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">تراجع</button>
                                        <button type="button"  class="btn btn-primary" data-dismiss="modal">تأكيد</button>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                        @endforeach
                    </table>
                </div> 
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')

@endsection
