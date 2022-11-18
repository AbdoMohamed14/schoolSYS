@extends('layouts.master')
@section('css')
@section('title')
empty
@stop
@endsection

@php
// get current languge .
$lang = app()->getLocale();

$slug = ($lang == 'en')?"_en":"_ar";

@endphp
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">{{trans('main.stages_list')}}</h4>
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

    <div class="col-xl-12 mb-30">
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
                    {{ trans('stages.add_stage') }}
                </button>
                <br><br>
                <div class="table-responsive">
                    <table id="datatable" class="table table-striped table-bordered p-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th><b>{{trans('stages.stage_name')}}</b></th>
                                <th><b>{{trans('stages.notes')}}</b></th>
                                <th><b>{{trans('stages.actions')}}</b></th>

                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $i = 0;
                            $name_attr = 'name'.$slug;

                            @endphp

                            @foreach ($stages as $stage)
                            <tr>
                                @php $i++; @endphp
                                <td><b>{{$i}}</b></td>
                                <td><b>{{$stage->$name_attr}}</b></td>
                                <td><b>{{$stage->notes}}</b></td>
                                <td>
                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                        data-target="#edit{{ $stage->id }}" title="{{ trans('Grades_trans.Edit') }}"><i
                                            class="fa fa-edit"></i></button>
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                        data-target="#delete{{ $stage->id }}" title="{{ trans('stages.Delete') }}"><i
                                            class="fa fa-trash"></i></button>
                                </td>

                            </tr>
                            <!-- edit_modal_Grade -->
                            <div class="modal fade" id="edit{{ $stage->id }}" tabindex="-1" role="dialog"
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
                                            <!-- add_form -->
                                            <form action="{{ route('stages.update', 'test') }}" method="post">
                                                {{ method_field('patch') }}
                                                @csrf
                                                <div class="row">
                                                    <div class="col">
                                                        <label for="Name" class="mr-sm-2">{{
                                                            trans('stages.stage_name_ar') }}
                                                            :</label>
                                                        <input id="Name" type="text" name="name_ar" class="form-control"
                                                            value="{{ $stage->name_ar }}" required>
                                                        <input id="id" type="hidden" name="id" class="form-control"
                                                            value="{{ $stage->id }}">
                                                    </div>
                                                    <div class="col">
                                                        <label for="Name_en"
                                                            class="mr-sm-2">{{trans('stages.stage_name_en') }}
                                                            :</label>
                                                        <input type="text" class="form-control"
                                                            value="{{ $stage->name_en }}" name="name_en" required>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="form-group">
                                                    <label for="exampleFormControlTextarea1">{{ trans('stages.notes') }}
                                                        :</label>
                                                    <textarea class="form-control" name="notes"
                                                        id="exampleFormControlTextarea1"
                                                        rows="3">{{ $stage->notes }}</textarea>
                                                </div>
                                                <br><br>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">{{ trans('stages.Close') }}</button>
                                                    <button type="submit" class="btn btn-success">{{
                                                        trans('stages.submit') }}</button>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- delete_modal_Grade -->
                            <div class="modal fade" id="delete{{ $stage->id }}" tabindex="-1" role="dialog"
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
                                            <form action="{{ route('stages.destroy', 'test') }}" method="post">
                                                {{ method_field('Delete') }}
                                                @csrf
                                                {{ trans('stages.Warning_Grade') }}
                                                <input id="id" type="hidden" name="id" class="form-control"
                                                    value="{{ $stage->id }}">
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


                <!-- add_modal_Grade -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                    id="exampleModalLabel">
                                    {{ trans('Grades_trans.add_Grade') }}
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <!-- add_form -->
                                <form action="{{ route('stages.store') }}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col">
                                            <label for="name_ar" class="mr-sm-2">{{ trans('stages.stage_name_ar') }}
                                                :</label>
                                            <input id="Name" type="text" name="name_ar" class="form-control">
                                        </div>
                                        <div class="col">
                                            <label for="name_en" class="mr-sm-2">{{ trans('stages.stage_name_en') }}
                                                :</label>
                                            <input type="text" class="form-control" name="name_en">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">{{ trans('stages.notes') }}
                                            :</label>
                                        <textarea class="form-control" name="notes" id="exampleFormControlTextarea1"
                                            rows="3"></textarea>
                                    </div>
                                    <br><br>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{
                                            trans('stages.Close') }}</button>
                                        <button type="submit" class="btn btn-success">{{ trans('stages.submit')
                                            }}</button>
                                    </div>
                                </form>

                            </div>
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