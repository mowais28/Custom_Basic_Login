@extends('layout/layout')
@section('ContentSection')
    {{-- Content Wrapper --}}
    <div id="content-wrapper" class="d-flex flex-column">

        {{-- Main Content --}}
        <div id="content">


            <div class="container-fluid">


                <div class="col-md-4">
                    <p class="my-2 text-muted">Hi {{$name}}</p>
                    <p class="my-2 text-muted">Welcome To App here is Your Login Credentials</p>


                    <div class="form-group">
                        <label>Email Address</label>
                        <p class="form-control border-0">{{$email}}</p>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <p class="form-control border-0">{{$password}}</p>
                    </div>

                    <p class="my-3 text-muted">Note - Don't Share Your Account Info With Anyone</p>
                </div>

            </div>


        </div>
    </div>
@endsection
