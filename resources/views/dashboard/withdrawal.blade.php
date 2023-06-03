@extends('layouts.master')
@section('content')
    <!-- ============================================================== -->
            <!-- Start right Content here  wTvOzFNV&C[*-->
            <!-- ============================================================== -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content py-5">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-pattern">
                                    <div class="card-body">
                                        <div class="float-right">
                                            <i class="dripicons-archive text-primary h4 ml-3"></i>
                                        </div>
                                        <h5 class="mb-3">${{  $user->amount }}</h5>
                                        <p class="text-muted mb-0">Total Balance</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row ">
                            <div style="
            padding: 0;
            " class="card-body">
            <div class="card-header pb-0">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title mg-b-0">MAKING A WITHDRAWAL</h4>
                    <i class="mdi mdi-dots-horizontal text-gray"></i>
                </div>
            </div>
            <h3 class="c-font c-font-bold">
            </h3>
            <ul class="nav bg-inverse-success nav-pills rounded nav-fill mb-3" role="tablist" style="border-bottom: 1px solid #19203a; padding-bottom: 10px;">
                <li class="nav-item">
                    <a class="nav-link active show" data-toggle="pill" href="#nav-tab-paypal">
                    <i class="fab fa-btc"></i>  Receive In Bitcoin</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="pill" href="#nav-tab-bank">
                    <i class="fa fa-university"></i>  Receive Via Bank Transfer</a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane fade active show" id="nav-tab-paypal">
                    <div class="col-sm-12">
                        <form class="form-horizontal" id="withdrawal-form" method="post" action="{{  route('withdrawal-store')  }}">
                            @csrf
                            <input type="hidden" name="user_id" value="{{  $user->id }}">
                            <div style="margin-top:10px;">
                                Method of withdraw<br>
                                <div class="input-group c-square">
                                    <select name="method_of_withdrawal" class="form-control c-square c-theme" >
                                        <option value="bitcoins"> Bitcoin </option>
                                    </select>
                                </div>
                            </div>
                            <div style="margin-top:10px;">
                                Amount in $<br>
                                <div class="input-group c-square">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">$</span>
                                    </div>
                                    <input  class="form-control" type="number" name="amount" required>
                                    <div class="input-group-append">
                                        <span class="input-group-text">.00</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-30" style="margin-top:10px;">
                                <strong>Your Wallet Address </strong><br>
                                <div class="input-group c-square">
                                    <input type="text" class="form-control  c-square c-theme"  name="address" required>
                                </div>
                            </div>
                            <div class="form-group mb-30" style="marign-top:20px !important;">
                                {{-- <button type="submit" class="btn btn-primary waves-effect waves-light mr-1">
                                    Submit
                                </button> --}}
                                <input type="submit" class="btn btn-primary waves-effect waves-light mr-1" value="Submit">
                            </div>

                        <p><strong>Note:</strong> You will get a follow up mail on the status on your withdrawal</p>
                        </form>

                    </div>
                </div>
                <div class="tab-pane fade" id="nav-tab-bank" style="">
                    <div class="col-sm-12">
                        <p><em>Enter your account details to receive payment!</em></p>
                        <form id="withdrawal-form" method="POST"   action="{{  route('withdrawal-store')  }}">
                            @csrf
                            <input type="hidden" name="user_id" value="{{  $user->id }}">
                            <div class="form-group ">
                                <input type="text" class="form-control" hidden required name="method_of_withdrawal"
                                value="bank-transfer">
                            </div>
                            <div class="form-group ">
                                <label for="payment_amount">Bank Name</label>
                                <input type="text" class="form-control" placeholder="Bank Name" required name="bankname"
                                value="">
                            </div>
                            <div class="form-group ">
                                <label for="payment_amount">Account Name</label>
                                <input type="text" class="form-control" placeholder="Account Name"  required
                                 name="accountname" value="">
                            </div>
                            <div class="form-group ">
                                <label for="payment_amount">Account Number</label>
                                <input type="number" class="form-control" placeholder="Account Number"  required
                                name="accountnumber" value="">
                            </div>
                            <div class="form-group ">
                                <label for="payment_amount">IBAN/ SWIFT</label>
                                <input type="text" class="form-control" placeholder="IBAN/ SWIFT" required name="swift" value="">
                            </div>
                            <div class="form-group ">
                                <label for="payment_amount">Amount In $</label>
                                <div class="input-group c-square">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">$</span>
                                        </div>
                                        <input aria-label="Amount (to the nearest $)" required name="amount"
                                        class="form-control" type="number">
                                        <div class="input-group-append">
                                            <span class="input-group-text">.00</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary waves-effect waves-light mr-1" value="Submit">
                            </div>
                            <p><strong>Note:</strong> You will get a follow up mail on the status on your withdrawal</p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
                        </div>


                    </div>
                    <!-- container-fluid -->

                </div>
                <!-- content -->

                {{-- <footer class="footer">

                </footer> --}}

            </div>
            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->


@endsection
