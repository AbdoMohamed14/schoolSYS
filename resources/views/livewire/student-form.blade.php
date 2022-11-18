@php
$slug = (app()->getLocale() == 'en')?'_en':'_ar';

$name_attr = 'name'.$slug;
@endphp

@if($currentStep != 1)
<div style="display: none" class="row setup-content" id="step-1">
    @endif
    <div class="col-xs-12">
        <div class="col-md-12">
            <br>
            <div class="form-row">
                <div class="col">
                    <label for="title">{{trans('students.student_name_ar')}}</label>
                    <input type="text" wire:model="student_name" class="form-control">
                    @error('student_name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <br>

                <div class="col">
                    <label for="title">{{trans('students.student_name_en')}}</label>
                    <input type="email" wire:model="student_name_en" class="form-control">
                    @error('student_name_en')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <br>

            <div class="form-row">
                <div class="col">
                    <label for="title">{{trans('students.religion')}}</label>
                    <select class="custom-select my-1 mr-sm-2" wire:model="religion">
                        <option value="" selected>{{trans('students.choose')}}...</option>
                        <option value="muslim" selected>{{trans('students.muslim')}}</option>
                        <option value="christian" selected>{{trans('students.christian')}}</option>

                    </select>

                    @error('religion')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <br>

                <div class="col">
                    <label for="title">{{trans('students.address')}}</label>
                    <input type="text" wire:model="student_address" class="form-control">
                    @error('student_address')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <br>
            <div class="form-row">

                <div class="col">
                    <label for="title">{{trans('students.stage')}}</label>
                    <select class="custom-select my-1 mr-sm-2" wire:model="stage">
                        <option selected value="">{{trans('students.choose')}}...</option>
                        @foreach ($stages as $stage)
                        <option value="{{$stage->id}}">{{$stage->$name_attr}}</option>
                        @endforeach
                    </select>
                    @error('stage')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col">
                    <label for="title">{{trans('students.stage_class')}}</label>
                    <select class="custom-select my-1 mr-sm-2" wire:model="stage_class">
                        <option value="" selected>{{trans('students.choose')}}...</option>
                        @if ($stage != '')
                        @foreach ($stageClasses as $stageClass)
                        <option value="{{$stageClass->id}}">{{$stageClass->$name_attr}}</option>
                        @endforeach
                        @endif
                    </select>
                    @error('stage_class')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <br>
            <div class="form-row">

                <div class="col">
                    <label for="title">{{trans('students.classroom')}}</label>
                    <select class="custom-select my-1 mr-sm-2" wire:model="student_classroom">
                        <option value="" selected>{{trans('students.choose')}}...</option>
                        @if ($stage_class != '')
                        @foreach ($classrooms as $classroom)
                        <option value="{{$classroom->id}}">{{$classroom->name}}</option>
                        @endforeach
                        @endif
                    </select>
                    @error('student_classroom')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col">
                    <label for="title">{{trans('students.blood_type')}}</label>
                    <select class="custom-select my-1 mr-sm-2" wire:model="student_blood_type">
                        <option value="" selected>{{trans('students.choose')}}...</option>
                        <option value="{{'A+'}}">{{'A+'}}</option>
                        <option value="{{'A'}}">{{'A'}}</option>
                        <option value="{{'O'}}">{{'O'}}</option>
                        <option value="{{'AB'}}">{{'AB'}}</option>
                    </select>
                    @error('student_blood_type')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <br>
            </div>
            <br>
            @if($updateMode)
            <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" wire:click="firstStepSubmit_edit"
                type="button">{{trans('students.next')}}
            </button>
            @else
            <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" wire:click="firstStepSubmit"
                type="button">{{trans('students.next')}}
            </button>
            @endif

        </div>
    </div>
</div>