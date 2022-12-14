@extends('layouts.master')
@section('css')

@section('title')
    empty
@stop
@endsection
@section('page-header')

@php
    $slug = (app()->getLocale()=='en')?'_en':'_ar';
    $name_attr = 'name'.$slug;
@endphp
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">{{$subject->$name_attr}} / {{$subject->stage_class->$name_attr}}</h4>
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
                <button type="button" class="button x-small" data-toggle="modal" data-target="#exampleModal">
                    {{ trans('lessons.add_lesson') }}
                </button>
                <br><br>
                <div class="table-responsive">
                    <table id="datatable" class="table table-striped table-bordered p-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th><b>{{trans('lessons.lesson_title')}}</b></th>
                                <th><b>{{trans('stages.notes')}}</b></th>
                                <th><b>{{trans('stages.actions')}}</b></th>

                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $i = 0;
                            $name_attr = 'name'.$slug;

                            @endphp

                            @foreach ($lessons as $lesson)
                            <tr>
                                @php $i++; @endphp
                                <td><b>{{$i}}</b></td>
                                <td><b>{{$lesson->title}}</b></td>
                                <td><b>{{$lesson->description}}</b></td>
                                <td>
                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                        data-target="#edit{{ $lesson->id }}" title="{{ trans('Grades_trans.Edit') }}"><i
                                            class="fa fa-edit"></i></button>
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                        data-target="#delete{{ $lesson->id }}" title="{{ trans('stages.Delete') }}"><i
                                            class="fa fa-trash"></i></button>
                                </td>

                            </tr>
                            <!-- edit_modal -->
                            <div class="modal fade" id="edit{{ $lesson->id }}" tabindex="-1" role="dialog"
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
                                            <form action="{{ route('lessons.update', $lesson->id) }}" method="post">
                                                {{ method_field('patch') }}
                                                @csrf
                                                <div class="row">
                                                    <div class="col">
                                                        <label for="Name" class="mr-sm-2">{{
                                                            trans('lessons.lesson_title') }}
                                                            :</label>
                                                        <input id="Name" type="text" name="title" class="form-control"
                                                            value="{{ $lesson->title }}" required>
                                                    </div>

                                                </div>
                                                <br>
                                                <div class="form-group">
                                                    <label for="exampleFormControlTextarea1">{{ trans('stages.notes') }}
                                                        :</label>
                                                    <textarea class="form-control" name="description"
                                                        id="exampleFormControlTextarea1"
                                                        rows="3">{{ $lesson->description }}</textarea>
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

                            <!-- delete_modal -->
                            <div class="modal fade" id="delete{{ $lesson->id }}" tabindex="-1" role="dialog"
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
                                            <form action="{{ route('lessons.destroy', $lesson->id) }}" method="post">
                                                {{ method_field('Delete') }}
                                                @csrf
                                                {{ trans('stages.Warning_Grade') }}
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


                <!-- add_modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                    id="exampleModalLabel">
                                    {{ trans('lessons.add_lesson') }}
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <!-- add_form -->
                                <form action="{{ route('lessons.store') }}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col">
                                            <label for="title" class="mr-sm-2">{{ trans('lessons.lesson_title') }}
                                                :</label>
                                            <input id="Name" type="text" name="title" class="form-control">
                                            <input type="hidden" value="{{$subject->id}}" name="subject_id">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">{{ trans('stages.notes') }}
                                            :</label>
                                        <textarea class="form-control" name="description" id="exampleFormControlTextarea1"
                                            rows="8"></textarea>
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
