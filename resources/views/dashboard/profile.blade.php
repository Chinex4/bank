@extends('layouts.master')
@section('content')
      <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container-fluid">
                        <div class="page-title-box">
                            <div class="row align-items-center">
                                <div class="col-sm-6">
                                    <h4 class="page-title">Profile</h4>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{ route('dashboard-page') }}"><i class="mdi mdi-home-outline"></i></a></li>
                                        {{-- <li class="breadcrumb-item"><a href="javascript:void(0);">profile page</a></li> --}}
                                        <li class="breadcrumb-item active">profile</li>
                                    </ol>
                                </div>
                            </div> <!-- end row -->
                        </div>
                        <!-- end page-title -->

                        <div class="row">
                            <div class="col-12 col-lg-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h2 class="py-3">Update Profile</h2>
                                        <div class="row">
                                            <div class="col-md-12 ">
                                                <div>
                                                    <form action="{{ route('update-profile-page', $users->id) }}" method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('put')
                                                        <div class="form-group">
                                                            <label>Profile Picture</label>
                                                            <div class="fallback">
                                                                <input name="image" type="file" class="form-contro" multiple="multiple">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Full Name</label>
                                                            <input type="text"  name="name" value="{{ $users->name }}" class="form-control">
                                                            {{-- <span class="font-13 text-muted">e.g "999-99-999-9999-9"</span> --}}
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Email Address</label>
                                                            <input type="text"  name="email" value="{{ $users->email }}" class="form-control">
                                                            {{-- <span class="font-13 text-muted">999 99 999 9999 9</span> --}}
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Phone Number</label>
                                                            <input type="text" name="phone" value="{{ $users->phone }}" class="form-control">
                                                            {{-- <span class="font-13 text-muted">999/99/999/9999/9</span> --}}
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="submit" class="btn btn-primary waves-effect waves-light mr-1" value="Submit">
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div> <!-- end row -->
                                    </div>
                                </div>
                            </div> <!-- end col -->
                            <div class="col-12 col-lg-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h2>Change Password</h2>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="mt-4 mt-md-0">
                                                    <form action="{{ route('change-password-page') }}"  method="POST">
                                                        @csrf
                                                        @method('put')
                                                        <div class="form-group">
                                                            <label>Current Password</label>
                                                            <input type="text" name="current_password" class="form-control">
                                                            {{-- <span class="font-13 text-muted">99-9999999</span> --}}
                                                        </div>
                                                        <div class="form-group">
                                                            <label>New Password</label>
                                                            <input type="text" name="new_password" class="form-control">
                                                            {{-- <span class="font-13 text-muted">(999) 999-9999</span> --}}
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Confirm New Password</label>
                                                            <input type="text" name="Confirm_password" class="form-control">
                                                            {{-- <span class="font-13 text-muted">$ 999,999,999.99</span> --}}
                                                        </div>
                                                        
                                                        <div class="form-group">
                                                            <input type="submit" class="btn btn-primary waves-effect waves-light mr-1" value="Submit">
                                                        </div>
                                                    </form>
                                                </div>
                                            </div> <!-- end col -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->

                    </div>
                    <!-- container-fluid -->

                </div>
                <!-- content -->

             

            </div>
            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->
@endsection