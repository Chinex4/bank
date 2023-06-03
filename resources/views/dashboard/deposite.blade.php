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
                                    <h4 class="page-title">Deposit</h4>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{ route('dashboard-page') }}"><i class="mdi mdi-home-outline"></i></a></li>
                                        {{-- <li class="breadcrumb-item"><a href="javascript:void(0);">profile page</a></li> --}}
                                        <li class="breadcrumb-item active">deposit</li>
                                    </ol>
                                </div>
                            </div> <!-- end row -->
                        </div>
                        <!-- end page-title -->

                        <div class="row justify-content-center">
                            <div class="col-10 mb-4">
                                @foreach ($walletaddress as $wallet)
                                <div class="row justify-content-center">
                                    <div class="col-10 mb-3 text-center">
                                        <h2 class="py-4 text-whitephp ">Wallet Address</h2>
                                        <div class="d-flex flex-wrap">
                                            <input type="text" class="form-control w-75" value="{{ $wallet->address  }}" id="myInput" readonly>

                                          <button onclick="myFunction()" class="btn btn-primary">Copy Wallet Address</button>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                            <script>
                                function myFunction() {
                                  var copyText = document.getElementById("myInput");
                                  copyText.select();
                                  copyText.setSelectionRange(0, 99999)
                                  document.execCommand("copy");
                                  alert("Copied the text: " + copyText.value);
                                }
                            </script>
                            </div>
                            <div class="col-10">
                                <h3 class="my-4">Confirm your deposit.</h3>
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div>
                                                    <form action="{{ route('deposit-store') }}" method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="form-group">
                                                            <label>Amount</label>
                                                            <input type="number"  placeholder="Enter Amount" name="amount" class="form-control @error('amount') is-invalid @enderror">
                                                            @error('amount')

                                                            @enderror
                                                            {{-- <span class="font-13 text-muted">e.g "999-99-999-9999-9"</span> --}}
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">Payment Receipt Upload </label>
                                                            <div class="fallback">
                                                                <input name="image" type="file" class="form-control @error('amount') is-invalid @enderror" multiple="multiple">
                                                                @error('image')

                                                                @enderror
                                                            </div>
                                                        </div>
                                                         <div class="form-group">
                                                             <input type="submit" class="btn btn-primary" value="Submit">
                                                         </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div> <!-- end row -->
                                    </div>
                                </div>
                            </div> <!-- end col -->
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
