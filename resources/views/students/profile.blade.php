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
            <h4 class="mb-0"> {{trans('students.student_info')}}</h4>
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
    $parent_name_attr = 'parent_name'.$slug;
    
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
                              @if ($student->image)
                              <img src="{{asset('students_images/'.$student->avatar)}}" alt="avatar"
                              class="rounded-circle img-fluid" style="width: 150px;">
                              @else
                              <img src="{{asset('students_images/staticpro.jpg')}}" alt="avatar"
                              class="rounded-circle img-fluid" style="width: 150px;">
                              @endif                                  
                              <h5 class="my-3">{{$student->$name_attr}}</h5>
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
                                  <p class="mb-0">{{trans('students.student_name')}}</p>
                                </div>
                                <div class="col-sm-9">
                                  <p class="text-muted mb-0">{{$student->$name_attr}}</p>
                                </div>
                              </div>
                              <hr>
                              <div class="row">
                                <div class="col-sm-3">
                                  <p class="mb-0">{{trans('students.classroom')}}</p>
                                </div>
                                <div class="col-sm-9">
                                  <p class="text-muted mb-0">{{$student->classroom->name}}</p>
                                </div>
                              </div>
                              <hr>
                              <div class="row">
                                <div class="col-sm-3">
                                  <p class="mb-0">{{trans('students.stage_class')}}</p>
                                </div>
                                <div class="col-sm-9">
                                  <p class="text-muted mb-0">{{$student->stageClass->$name_attr}}</p>
                                </div>
                              </div>
                              <hr>
                              <div class="row">
                                <div class="col-sm-3">
                                  <p class="mb-0">{{trans('students.blood_type')}}</p>
                                </div>
                                <div class="col-sm-9">
                                  <p class="text-muted mb-0">{{$student->blood}}</p>
                                </div>
                              </div>
                              <hr>
                              <div class="row">
                                <div class="col-sm-3">
                                  <p class="mb-0">{{trans('teachers.address')}}</p>
                                </div>
                                <div class="col-sm-9">
                                  <p class="text-muted mb-0">{{$student->address}}</p>
                                </div>
                              </div>
                              <hr>
                              <div class="row">
                                <div class="col-sm-3">
                                  <p class="mb-0">{{trans('students.parent')}}</p>
                                </div>
                                <div class="col-sm-9">
                                  <p class="text-muted mb-0">{{$student->$parent_name_attr}}</p>
                                </div>
                              </div>
                              <hr>
                              <div class="row">
                                <div class="col-sm-3">
                                  <p class="mb-0">{{trans('students.Parent_phone')}}</p>
                                </div>
                                <div class="col-sm-9">
                                  <p class="text-muted mb-0">{{$student->parent_phone}}</p>
                                </div>
                              </div>

                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-6">
                              <div class="card mb-4 mb-md-0">
                                <div class="card-body">
                                  <p class="mb-4"> {{trans('students.student_rate')}}
                                  </p>
                                  @foreach ($student->stageClass->subject as $subject)
                                  <p class="mb-1" style="font-size: .77rem;">{{$subject->$name_attr}}</p>
                                  <div class="progress rounded" style="height: 5px;">
                                    <div class="progress-bar" role="progressbar" style="width: 80%" aria-valuenow="80"
                                      aria-valuemin="0" aria-valuemax="100"></div>
                                  </div>  
                                  <br>
                                  @endforeach
                                </div>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="card mb-4 mb-md-0">
                                <div class="card-body">
                                  <p class="mb-4"><span class="text-primary font-italic me-1">assigment</span> Project Status
                                  </p>
                                  <p class="mb-1" style="font-size: .77rem;">Web Design</p>
                                  <div class="progress rounded" style="height: 5px;">
                                    <div class="progress-bar" role="progressbar" style="width: 80%" aria-valuenow="80"
                                      aria-valuemin="0" aria-valuemax="100"></div>
                                  </div>
                                  <p class="mt-4 mb-1" style="font-size: .77rem;">Website Markup</p>
                                  <div class="progress rounded" style="height: 5px;">
                                    <div class="progress-bar" role="progressbar" style="width: 72%" aria-valuenow="72"
                                      aria-valuemin="0" aria-valuemax="100"></div>
                                  </div>
                                  <p class="mt-4 mb-1" style="font-size: .77rem;">One Page</p>
                                  <div class="progress rounded" style="height: 5px;">
                                    <div class="progress-bar" role="progressbar" style="width: 89%" aria-valuenow="89"
                                      aria-valuemin="0" aria-valuemax="100"></div>
                                  </div>
                                  <p class="mt-4 mb-1" style="font-size: .77rem;">Mobile Template</p>
                                  <div class="progress rounded" style="height: 5px;">
                                    <div class="progress-bar" role="progressbar" style="width: 55%" aria-valuenow="55"
                                      aria-valuemin="0" aria-valuemax="100"></div>
                                  </div>
                                  <p class="mt-4 mb-1" style="font-size: .77rem;">Backend API</p>
                                  <div class="progress rounded mb-2" style="height: 5px;">
                                    <div class="progress-bar" role="progressbar" style="width: 66%" aria-valuenow="66"
                                      aria-valuemin="0" aria-valuemax="100"></div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </section>            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')

@endsection
