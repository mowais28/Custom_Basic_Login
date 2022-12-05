@section('title', "Welcome!")
@extends('layout/layout')
@section('ContentSection')

    {{-- Content Wrapper --}}
    <div id="content-wrapper" class="d-flex flex-column">

        {{-- Main Content --}}
        <div id="content">

            {{-- Top NavBar --}}
            <x-top_navbar></x-top_navbar>


            <div class="container-fluid">




                {{-- Response Message  --}}
                @if (Session::has('success'))
                    <div class="responseMessage">
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="fa fa-check-circle"></i> {{ session('success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                @elseif(Session::has('error'))
                    <div class="responseMessage">
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="fa fa-exclamation-circle"></i> {{ session('error') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                @endif
                {{-- Response Message End --}}




                {{-- Dashboard Card --}}
                <div class="row">

                    {{-- All User Count  --}}
                    <div class="col-md-6 mb-4">
                        <div class="card border-left-success shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                            Total User Register</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalUsers }}</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-users fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Blocked User Count --}}
                    <div class="col-md-6 mb-4">
                        <div class="card border-left-danger shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                            Blocked User Accounts</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $blockUsers }}</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-lock fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Account Information</h6>
                    </div>

                    <div class="card-body">


                        <div class="col-md-12">





                            <div class="row">
                                <div class="col-md-4">
                                    <div class="img text-center mt-3">
                                        <img src="{{session('profile_pic') == "" ? "/asset/img/default_profile.png"  : "/asset/img/".session('profile_pic')}}" class="img-fluid mb-3"
                                            style="width: auto;height: 200px;" alt="Profile Pic">
                                    </div>
                                </div>
                                <div class="col-md-8">

                                    <form action="updateAdmin/{{ session('id') }}" method="POST">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">Name</label>
                                                    <input type="text" name="admin_name" value="{{ session('name') }}"
                                                        class="form-control" placeholder="Admin Number">
                                                    <span class="text-danger">
                                                        @error('admin_name')
                                                            {{ $message }}
                                                        @enderror
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">Email Address*</label>
                                                    <input type="email" name="email_address"
                                                        value="{{ session('email') }}" class="form-control"
                                                        placeholder="Email Address">
                                                    <span class="text-danger">
                                                        @error('email_address')
                                                            {{ $message }}
                                                        @enderror
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">Phone</label>
                                                    <input type="number" name="phone_number"
                                                        value="{{ session('phone') }}" class="form-control"
                                                        placeholder="Phone Number">
                                                    <span class="text-danger">
                                                        @error('phone_number')
                                                            {{ $message }}
                                                        @enderror
                                                    </span>

                                                </div>
                                            </div>

                                            <div class="col-md-8">
                                                <button type="submit" class="btn btn-success"><i class="fa fa-edit"></i>
                                                    Update Information</button>
                                            </div>

                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>




                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Update Your Account Password</h6>
                    </div>

                    <div class="card-body">


                        <div class="row">

                            <div class="col-md-12">

                                <form action="users/update-password/{{ session('id') }}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Current Password*</label>
                                                <input type="password" name="current_password" class="form-control"
                                                    placeholder="Current Password">
                                                <span class="text-danger">
                                                    @error('current_password')
                                                        {{ $message }}
                                                    @enderror
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">New Password*</label>
                                                <input type="password" name="new_password" value=""
                                                    class="form-control" placeholder="New Password">
                                                <span class="text-danger">
                                                    @error('new_password')
                                                        {{ $message }}
                                                    @enderror
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Confim Password*</label>
                                                <input type="password" name="confirm_password" value=""
                                                    class="form-control" placeholder="Confirm Password">
                                                <span class="text-danger">
                                                    @error('confirm_password')
                                                        {{ $message }}
                                                    @enderror
                                                </span>

                                            </div>
                                        </div>

                                        <div class="col-md-8">
                                            <button type="submit" class="btn btn-success"><i class="fa fa-lock"></i>
                                                Update Password</button>
                                        </div>

                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>


                </div>





            </div>


        </div>
    </div>

@endsection
