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
                    {{ trans('stage_classes.add_stage_class') }}
                </button>
                <br><br>
                <div class="table-responsive">
                    <table id="datatable" class="table table-striped table-bordered p-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th><b>{{trans('stage_classes.stage_class')}}</b></th>
                                <th><b>{{trans('stage_classes.stage_name')}}</b></th>
                                <th><b>{{trans('stages.actions')}}</b></th>

                            </tr>
                        </thead>
                        <tbody>
                            @php
                             $i = 0;
                             $name_attr = 'name'.$slug;
                             
                             @endphp

                            @foreach ($stage_classes as $stage_class)
                            <tr>
                                @php $i++; @endphp
                                <td><b>{{$i}}</b></td>
                                <td><b>{{$stage_class->$name_attr}}</b></td>
                                <td><b>{{$stage_class->stage->$name_attr}}</b></td>
                                <td>
                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                        data-target="#edit{{ $stage_class->id }}" title="{{ trans('Grades_trans.Edit') }}"><i
                                            class="fa fa-edit"></i></button>
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                        data-target="#delete{{ $stage_class->id }}"
                                        title="{{ trans('stages.Delete') }}"><i class="fa fa-trash"></i></button>
                                </td>

                            </tr>
                                <!-- edit_modal_StageClass -->
                                <div class="modal fade" id="edit{{ $stage_class->id }}" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                    id="exampleModalLabel">
                                                    {{ trans('stages.edit_Grade') }}
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <!-- edit_form -->
                                                <form action="{{ route('stage_classes.update',$stage_class->id) }}" method="post">
                                                    {{ method_field('patch') }}
                                                    @csrf
                                                    <div class="row">
                                                        <div class="col">
                                                            <label for="Name"
                                                                class="mr-sm-2">{{ trans('stages.stage_name_ar') }}
                                                                :</label>
                                                            <input id="Name" type="text" name="name_ar"
                                                                class="form-control"
                                                                value="{{ $stage_class->name_ar }}"
                                                                required>
                                                        </div>
                                                        <div class="col">
                                                            <label for="Name_en"
                                                                class="mr-sm-2">{{trans('stages.stage_name_en') }}
                                                                :</label>
                                                            <input type="text" class="form-control"
                                                                value="{{ $stage_class->name_en }}"
                                                                name="name_en" required>
                                                        </div>

                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <label for="teachers">{{trans('subjects.subjects')}}</label>
                                                            <select class="custom-select" name="subjects[]" multiple>
                                                                <option selected disabled style="color: darkgoldenrod">you can select many subjects</option>
                                                                @foreach ($subjects as $subject)
                                                                    <option value="{{$subject->id}}">{{$subject->$name_attr}}</option>
                                                                @endforeach
                                                              </select>
                                                        </div>
                                                    </div>
                            
                                                    <br>
                                                    <div class="form-group">
                                                        <label
                                                            for="exampleFormControlTextarea1">{{ trans('stages.notes') }}
                                                            :</label>
                                                            <select name="stage" id="" class="form-control">
                                                                <option value="{{$stage_class->stage->id}}">{{$stage_class->stage->$name_attr}}</option>
                                                                @foreach ($stages as $stage)
                                                                <option value="{{$stage->id}}">{{$stage->name_ar}}</option>
                                                                @endforeach
                                                            </select>
                                                    </div>
                                                    <br><br>
    
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">{{ trans('stages.Close') }}</button>
                                                        <button type="submit"
                                                            class="btn btn-success">{{ trans('stages.submit') }}</button>
                                                    </div>
                                                </form>
    
                                            </div>
                                        </div>
                                    </div>
                                </div>
    
                                <!-- delete_modal_StageClass -->
                                <div class="modal fade" id="delete{{ $stage_class->id }}" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                    id="exampleModalLabel">
                                                    {{ trans('stage_classes.delete_stage_class') }}
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('stage_classes.destroy', 'test') }}" method="post">
                                                    {{ method_field('Delete') }}
                                                    @csrf
                                                    {{ trans('stage_classes.warning_stage_class') }}
                                                    <input id="id" type="hidden" name="id" class="form-control"
                                                        value="{{ $stage_class->id }}">
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">{{ trans('stages.Close') }}</button>
                                                        <button type="submit"
                                                            class="btn btn-danger">{{ trans('stages.delete') }}</button>
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
    </div>
    
    
    <!-- add_modal_StageClass -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                        {{ trans('stage_classes.add_stage_class') }}
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- add_form -->
                    <form action="{{ route('stage_classes.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col">
                                <label for="name_ar" class="mr-sm-2">{{ trans('stage_classes.stageClass_name_ar') }}
                                    :</label>
                                <input id="Name" type="text" name="name_ar" class="form-control">
                            </div>
                            <div class="col">
                                <label for="name_en" class="mr-sm-2">{{ trans('stage_classes.stageClass_name_en') }}
                                    :</label>
                                <input type="text" class="form-control" name="name_en">
                            </div>
                        </div>
                        <br>

                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">{{ trans('stage_classes.stage') }}
                                :</label>
                                <select name="stage" id="" class="form-control">
                                    <option value="">{{trans('stage_classes.stage')}}</option>
                                    @foreach ($stages as $stage)
                                    <option value="{{$stage->id}}">{{$stage->$name_attr}}</option>
                                    @endforeach
                                </select>
                        </div>

                        <div class="row">
                            <div class="col">
                                <label for="teachers">{{trans('subjects.subjects')}}</label>
                                <select class="custom-select" name="subjects[]" multiple>
                                    <option selected disabled style="color: darkgoldenrod">you can select many subjects</option>
                                    @foreach ($subjects as $subject)
                                        <option value="{{$subject->id}}">{{$subject->$name_attr}}</option>
                                    @endforeach
                                  </select>
                            </div>
                        </div>

                        <br><br>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"
                        data-dismiss="modal">{{ trans('stages.Close') }}</button>
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
@endsection