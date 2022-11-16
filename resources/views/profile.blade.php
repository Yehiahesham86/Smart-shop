@extends('layouts.app')
@section('loc')

@endsection
@section('nav')
<div class="breadcrumbs">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-6 col-12">
                <div class="breadcrumbs-content">
                    <h1 class="page-title"></h1>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-12">
                <ul class="breadcrumb-nav">
                    <li><a href="{{route('home')}}"><i class="lni lni-home"></i> Home</a>  <i class="lni lni-chevron-right"></i><a href="javascript:void(0)">My profile</a></li>
        
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
<section class="py-2 my-2">
    <div class="container">

        <div class="bg-white shadow rounded-lg d-block d-sm-flex">
            <div class="profile-tab-nav border-right">
                <div class="p-4">
                    <div class="img-circle text-center mb-3">
                        <svg  class="shadow rounded-circle" fill="#13224F" width="150" height="150" version="1.1" id="lni_lni-user" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 64 64" style="enable-background:new 0 0 64 64;" xml:space="preserve">
                            <g>
                              <path d="M32,36.4c8.2,0,14.9-6.7,14.9-14.9S40.2,6.5,32,6.5s-14.9,6.7-14.9,14.9S23.8,36.4,32,36.4z M32,10
  c6.3,0,11.4,5.1,11.4,11.4c0,6.3-5.1,11.4-11.4,11.4c-6.3,0-11.4-5.1-11.4-11.4C20.6,15.2,25.7,10,32,10z"></path>
                              <path d="M62.1,54.4c-8.3-7.1-19-11-30.1-11s-21.8,3.9-30.1,11C1.1,55,1,56.1,1.7,56.9c0.6,0.7,1.7,0.8,2.5,0.2
  c7.7-6.5,17.6-10.1,27.9-10.1s20.2,3.6,27.9,10.1c0.3,0.3,0.7,0.4,1.1,0.4c0.5,0,1-0.2,1.3-0.6C63,56.1,62.9,55,62.1,54.4z"></path>
                            </g>
                          </svg>
                    </div>
                    <h4 class="text-center">{{auth::user()->name}}</h4>
                </div>
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link active" id="account-tab" data-bs-toggle="pill" href="#account" role="tab"
                        aria-controls="account" aria-selected="true">
                        <i class="fa fa-home text-center mr-1"></i>
                        Account
                    </a>
                    <a class="nav-link" id="verfiction-tab" data-bs-toggle="pill" href="#verfiction" role="tab"
                        aria-controls="verfiction" aria-selected="true">
                        <i class="fa fa-envelope" aria-hidden="true"></i>
                        E-mail verification
                    </a>

                </div>
            </div>
            <div class="tab-content p-4 p-md-5" id="v-pills-tabContent">
                <div class="tab-pane fade " id="verfiction" role="tabpanel" aria-labelledby="verfiction-tab">
                    <h3 class="mb-4"> E-mail verification</h3>
                    <div class="row">
                    <div class="col-md-8">
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email" value="{{auth::user()->email}}">
                        </div>
                    </div>
    
                    <div class="col-md-2">
                        <div class="form-group">
                            <label></label>
                            @if (is_null(Auth::user()->email_verified_at))
                            <form method="POST" action="{{route('verification.send')}}">
                                @csrf
                                <button class="btn btn-primary form-control">verify</button>
                            </form>
    
                            @else
                            <label class="btn btn-primary form-control"><i class="fa fa-check-circle"
                                    aria-hidden="true"></i> verified</label>
                            @endif
    
                        </div>
                    </div>
                    @if (Session::has('message'))
                    <div class="col-md-8">
                        <div class="alert alert-success">
                            {!! Session::get('message') !!}
                        </div>
                    </div>
                    @endif
                </div>
            </div>

            <div class="tab-content p-4 p-md-5" id="v-pills-tabContent">
                <div class="tab-pane fade show active" id="account" role="tabpanel" aria-labelledby="account-tab">
                    <h3 class="mb-4">Account Settings</h3>
                    <form method="POST" action="{{route('editprofile')}}">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Full Name</label>
                                    <input type="text" class="form-control" name="name" value="{{auth::user()->name}}">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Phone number</label>
                                    <input type="tel" name="phone" class="form-control" value="{{auth::user()->phone}}">
                                </div>
                            </div>
                            <div>
                                <button class="btn btn-primary">Update</button>
                                <button class="btn btn-light">Cancel</button>
                            </div>
                    </form>

                    <hr class="horizontal dark m-3">
                    <h3 class="text-uppercase text-sm ">Contact Information</h3>
                    <div class="row mt-4">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Address</label>
                                <input class="form-control" type="text"
                                    value="Bld Mihail Kogalniceanu, nr. 8 Bl 1, Sc 1, Ap 09">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">City</label>
                                <input class="form-control" type="text" value="New York">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Country</label>
                                <input class="form-control" type="text" value="United States">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Postal code</label>
                                <input class="form-control" type="text" value="437300">
                            </div>
                        </div>
                    </div>
                    <div>
                        <button class="btn btn-primary">Update</button>
                        <button class="btn btn-light">Cancel</button>
                    </div>
                </div>
            </div>
        </div>

    </div>

   
</div>

</section>

@endsection