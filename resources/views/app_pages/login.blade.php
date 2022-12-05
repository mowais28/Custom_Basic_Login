@section('title', 'Login Your Account')
@extends('layout/layout')
@section('ContentSection')




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



    <div class="col-md-12 mt-5">
        <div class="row offset-md-4 mt-5">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card" style="border-radius: 1rem;">
                    <div class="card-body">
                        <p class="bg-primary text-center p-3 mb-5 rounded text-white" style="margin-top: -60px">Login To
                            Your Account </p>
                        <div class="text-center">
                            <img src="/asset/img/favicon.png" style="width: 150px;height: auto;" alt="">
                        </div>

                        <form action="login" method="POST">
                            @csrf

                            <div class="form-outline mb-4">
                                <label class="form-label" for="typeEmailX-2">Email</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text text-white border-0 bg-primary" id="basic-addon1"><i
                                                class="fa fa-envelope"></i></span>
                                    </div>
                                    <input type="email" name="login_email" class="form-control"
                                        placeholder="Enter Your Email Address" value="{{ old('login_email') }}" />
                                </div>
                                <span class="text-danger">
                                    @error('login_email')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>





                            <div class="form-outline mb-4">
                                <label class="form-label" for="typePasswordX-2">Password</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text text-white border-0 bg-primary" id="basic-addon1"><i
                                                class="fa fa-key"></i></span>
                                    </div>
                                    <input type="password" name="login_password" placeholder="Enter Your Password"
                                        class="form-control" />
                                </div>
                                <span class="text-danger">
                                    @error('login_password')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>

                            <hr>

                            <div class="col-12">
                                <button class="btn btn-primary float-right" type="submit">Login <i
                                        class="fa fa-arrow-right"></i></button>
                            </div>

                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>







@endsection
