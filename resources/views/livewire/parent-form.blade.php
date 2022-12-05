@php
$slug = (app()->getLocale() == 'en')?'_en':'_ar';
$name_attr = 'name'.$slug;
@endphp

@if($currentStep != 2)
<div style="display: none" class="row setup-content" id="step-2">
    @endif
    <div class="col-xs-12">
        <div class="col-md-12">
            <br>
            <div class="form-row">
                <div class="col">
                    <label for="title">{{trans('students.parent_name_ar')}}</label>
                    <input type="email" wire:model="parent_name_ar" class="form-control">
                    @error('parent_name_ar')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col">
                    <label for="title">{{trans('students.parent_name_en')}}</label>
                    <input type="email" wire:model="parent_name_en" class="form-control">
                    @error('parent_name_en')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <br>
            </div>
            <br>

            <div class="form-row">
                <div class="col">
                    <label for="title">{{trans('students.Parent_email')}}</label>
                    <input type="text" wire:model="parent_email" class="form-control">
                    @error('parent_email')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col">
                    <label for="title">{{trans('students.Parent_phone')}}</label>
                    <input type="text" wire:model="parent_phone" class="form-control">
                    @error('parent_phone')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <br>
            </div>
            <br>
            <div class="form-row">
                <div class="col">
                    <label for="title">{{trans('students.address')}}</label>
                    <input type="text" wire:model="parent_address" class="form-control">
                    @error('parent_address')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col">
                    <label for="title">{{trans('students.blood_type')}}</label>
                    <select class="custom-select my-1 mr-sm-2" wire:model="parent_blood_type">
                        <option selected>{{trans('students.choose')}}...</option>
                        <option value="{{'A+'}}">{{'A+'}}</option>
                        <option value="{{'A'}}">{{'A'}}</option>
                        <option value="{{'O'}}">{{'O'}}</option>
                        <option value="{{'AB'}}">{{'AB'}}</option>
                    </select>
                    @error('parent_blood_type')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <br>
            <button class="btn btn-primary btn-sm nextBtn btn-lg pull-right m-1" wire:click="back(1)"
                type="button"><b>{{trans('students.back')}}</b>
            </button>
            @if($updateMode)
            <button class="btn btn-success btn-sm nextBtn btn-lg pull-right m-1" wire:click="secondStepSubmit_edit"
                type="button"><b>{{trans('students.next')}}</b>
            </button>
            @else
            <button class="btn btn-success btn-sm nextBtn btn-lg pull-right m-1" wire:click="secondStepSubmit"
                type="button"><b>{{trans('students.next')}}</b>
            </button>
            @endif

        </div>
    </div>
</div>