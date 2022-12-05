@section('title', 'All Users List')
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
                @endif
                {{-- Response Message End --}}



                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Users List</h6>
                    </div>

                    <div class="card-body">


                        <div class="table-responsive">
                            <table class="table table-bordered">

                                <thead>
                                    <tr class="bg-primary text-white">
                                        <td>Name</td>
                                        <td>Email Address</td>
                                        <td>Phone</td>
                                        <td>Status</td>
                                        <td>Added On</td>
                                        <td>Operation</td>
                                    </tr>
                                </thead>

                                <tbody>

                                    @foreach ($users as $user)
                                        <tr>
                                            <td>{{ $user->user_name }}</td>
                                            <td>{{ $user->email_address }}</td>
                                            <td>{{ $user->phone }}</td>

                                            {{-- user Active or Blocked --}}
                                            <td>
                                                @if ($user->account_status == 1)
                                                    <span class="bg-success rounded text-white p-2"><i
                                                            class="fa fa-unlock"></i> Active</span>

                                                    {{-- Changing Action Text --}}
                                                    <?php $Status_Action = 'Block Account'; ?>
                                                @elseif($user->account_status == 0)
                                                    <span class="bg-danger rounded text-white p-2"> <i class="fa fa-lock"></i>
                                                        Blocked</span>

                                                    {{-- Changing Action Text --}}
                                                    <?php $Status_Action = 'Activate Account'; ?>
                                                @endif
                                            </td>

                                            <td>{{ date('d-M-Y', strtotime($user->created_at)) }}</td>
                                            <td>
                                                <div class="dropdown show">
                                                    <span class="dropdown-toggle" role="button" id="dropdownMenuLink"
                                                        data-toggle="dropdown">
                                                        Options
                                                    </span>

                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">

                                                        <a class="dropdown-item"
                                                            href="status/{{ $user->id.'/'.$user->account_status}}">{{ $Status_Action }}</a>

                                                        <a class="dropdown-item"
                                                            href="deleteUser/{{ $user->id }}">Delete</a>

                                                    </div>
                                                </div>
                                            </td>

                                        </tr>
                                    @endforeach



                                </tbody>

                            </table>
                        </div>


                        @if ($users->hasPages())
                            <div class="col-md-12">
                                {{ $users->onEachSide(1)->links('pagination::bootstrap-5') }}
                            </div>
                        @endif



                    </div>
                </div>


            </div>
        </div>

    @endsection
