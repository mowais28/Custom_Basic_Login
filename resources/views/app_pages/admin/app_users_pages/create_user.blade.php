@section('title', 'Create User')
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




                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Add New User</h6>
                    </div>

                    <div class="card-body">


                        <div class="col-md-12">

                            <form action="addUserForm" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Name</label>
                                            <input type="text" name="user_name" class="form-control bg-light small"
                                                placeholder="User Name" required autofocus>
                                            <span class="text-danger">
                                                @error('user_name')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Email Address</label>
                                            <input type="email" name="email_address" class="form-control bg-light small"
                                                placeholder="User Email Address" required>
                                            <span class="text-danger">
                                                @error('email_address')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">User Phone</label>
                                            <input type="number" name="phone" class="form-control bg-light small"
                                                placeholder="User Phone Number" required>
                                            <span class="text-danger">
                                                @error('phone')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">User Role</label>
                                            <select name="account_role" class="form-control bg-light small">
                                                <option value="user">User</option>
                                                <option value="admin">Admin</option>
                                            </select>
                                            <span class="text-danger">
                                                @error('phone')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Password</label>
                                            <div class="input-group">
                                                <input type="text" name="password"
                                                    class="userPassword form-control bg-light small"
                                                    placeholder="Type Strong Password" required>
                                                <div class="input-group-append">
                                                    <button class="btn btn-secondary generatePasswordForUser"
                                                        type="button">
                                                        <i class="fas fa-random"></i> Click
                                                    </button>
                                                </div>
                                            </div>
                                            <span class="text-danger">
                                                @error('password')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Profile Pic (optional)</label>
                                            <p><button type="button" class="btn btn-primary ProfilePicBtn">Upload Profile
                                                    Pic</button></p>
                                            <input type="file" name="profile_pic" class="userProfilePic d-none">
                                        </div>
                                    </div>



                                    <div class="col-md-12">
                                        <button class="btn btn-success"><i class="fa fa-save"></i> Save User</button>
                                    </div>


                                </div>


                            </form>

                        </div>


                    </div>







                </div>
            </div>


        </div>
    </div>

@endsection
