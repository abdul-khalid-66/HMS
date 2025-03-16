@extends('backend.layout.master')



@section('content')
<div class="contacts-area mg-b-15">
    <div class="container-fluid">
        <div class="row">
            @foreach ($teachers as $teacher)
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 " style="margin-top: 20px">
                    <div class="hpanel hblue contact-panel contact-panel-cs responsive-mg-b-30">
                        <div class="panel-body custom-panel-jw">
                            <div class="social-media-in">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-pinterest"></i></a>
                            </div>
                            <img alt="logo" style="width: 80px;height:80px" class="img-circle m-b" src="{{ $teacher?->profile ? asset('backend/'. $teacher?->profile) : asset('backend/img/contact/1.jpg') }}">                        
                            
                            <h3><a href="">{{ $teacher->user->name}}</a></h3>
                            <p class="all-pro-ad"> {{$teacher->state??"-"}}, {{$teacher->city??"-"}}</p>
                            <p>
                                {{$teacher->description??"-"}}
                            </p>
                        </div>
                        <div class=" ">
                            {{-- <div class="d-grid gap-2 col-6 mx-auto">
                                <a class="btn btn-primary" type="button">Button</a>
                                <a class="btn btn-primary" type="button">Button</a>
                              </div> --}}
                            <div class="professor-stds-int">
                                <div class="professor-stds mx-auto">
                                    <div class="d-grid gap-2 col-6 ">
                                        <a href="{{ route('teachers.show', $teacher->id) }}" class="btn btn-primary" type="button">Profile View</a>
                                        <a href="{{ route('teachers.edit', $teacher->id) }}" class="btn btn-warning" type="button">Profile Edit</a>
                                      </div>
                                </div>                                
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
                
            
        
    </div>
</div>
@endsection