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
            <h4 class="mb-0">{{trans('students.parent_info')}}</h4>
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

@php
    $slug = (app()->getLocale()=='en')?'_en':'_ar';
    $name_attr = 'name'.$slug;
@endphp
<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                <section style="background-color: #eee;">
                    <div class="container py-5">
                      <div class="row">
                        <div class="col-lg-4">
                          <div class="card mb-4">
                            <div class="card-body text-center">
                              @if ($parent->avatar)
                                <img src="{{asset('teacher_avatars/'.$parent->avatar)}}" alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
                              @else
                                <img src="{{asset('teacher_avatars/staticpro.jpg')}}" alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
                              @endif
                              <h5 class="my-3">{{$parent->$name_attr}}</h5>
                              <p class="text-muted mb-1">Full Stack Developer</p>
                              <p class="text-muted mb-4">Bay Area, San Francisco, CA</p>
                            </div>
                          </div>
                          <div class="card mb-4 mb-lg-0">
                            <div class="card-body p-0">
                              <ul class="list-group list-group-flush rounded-3">
                                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                  <i class="fas fa-globe fa-lg text-warning"></i>
                                  <p class="mb-0">https://mdbootstrap.com</p>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                  <i class="fab fa-github fa-lg" style="color: #333333;"></i>
                                  <p class="mb-0">mdbootstrap</p>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                  <i class="fab fa-twitter fa-lg" style="color: #55acee;"></i>
                                  <p class="mb-0">@mdbootstrap</p>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                  <i class="fab fa-instagram fa-lg" style="color: #ac2bac;"></i>
                                  <p class="mb-0">mdbootstrap</p>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                  <i class="fab fa-facebook-f fa-lg" style="color: #3b5998;"></i>
                                  <p class="mb-0">mdbootstrap</p>
                                </li>
                              </ul>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-8">
                          <div class="card mb-4">
                            <div class="card-body">
                              <div class="row">
                                <div class="col-sm-3">
                                  <p class="mb-0">{{trans('teachers.teacher_name')}}</p>
                                </div>
                                <div class="col-sm-9">
                                  <p class="text-muted mb-0">{{$parent->$name_attr}}</p>
                                </div>
                              </div>
                              <hr>
                              <div class="row">
                                <div class="col-sm-3">
                                  <p class="mb-0">{{trans('teachers.email')}}</p>
                                </div>
                                <div class="col-sm-9">
                                  <p class="text-muted mb-0">{{$parent->email}}</p>
                                </div>
                              </div>
                              <hr>
                              <div class="row">
                                <div class="col-sm-3">
                                  <p class="mb-0">{{trans('teachers.teacher_subject')}}</p>
                                </div>
                                <div class="col-sm-9">
                                  {{-- <p class="text-muted mb-0">{{$parent->subject->$name_attr}}</p> --}}
                                </div>
                              </div>
                              <hr>
                              <div class="row">
                                <div class="col-sm-3">
                                  <p class="mb-0">{{trans('teachers.mobile')}}</p>
                                </div>
                                <div class="col-sm-9">
                                  <p class="text-muted mb-0">{{$parent->phone}}</p>
                                </div>
                              </div>
                              <hr>
                              <div class="row">
                                <div class="col-sm-3">
                                  <p class="mb-0">{{trans('teachers.address')}}</p>
                                </div>
                                <div class="col-sm-9">
                                  <p class="text-muted mb-0">{{$parent->address}}</p>
                                </div>
                              </div>
                              <hr>
                              <div class="row">
                                <div class="col-sm-3">
                                  <p class="mb-0">{{trans('teachers.address')}}</p>
                                </div>
                                <div class="col-sm-9">
                                  <p class="text-muted mb-0">{{$parent->address}}</p>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            
                            @foreach($parent->Mystudents as $student)
                              <div class="card-body text-center">
                                <div class="mt-3 mb-4">
                                  <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava2-bg.webp"
                                    class="rounded-circle img-fluid" style="width: 100px;" />
                                </div>
                                <h4 class="mb-2">{{$student->$name_attr}}</h4>
                              </div>   
                            @endforeach
                          </div>
                        </div>
                      </div>
                    </div>
                  </section>            
                </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')

@endsection
