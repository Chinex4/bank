@extends('layouts.master')
@section('content')
    <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content dasboard-content">
                    <div class="container-fluid">
                        <div class="page-title-box">
                            <div class="row align-items-center">
                                <div class="col-sm-6">
                                    <h4 class="page-title">Dashboard</h4>
                                    <ol class="breadcrumb">
                                        <!-- <li class="breadcrumb-item"><a href="javascript:void(0);"><i class="mdi mdi-home-outline"></i></a></li> -->
                                        <li class="breadcrumb-item active">Welcome {{  auth()->user()->name }}</li>
                                    </ol>
                                </div>

                            </div> <!-- end row -->
                        </div>
                        <!-- end page-title -->

                        <div class="row">
                            <div class="col-lg-4">
                                <div class="card mini-stat bg-pattern">
                                    <div class="card-body mini-stat-img">
                                        <div class="mini-stat-icon">
                                            <i class="dripicons-wallet bg-soft-primary text-primary float-right h4"></i>
                                        </div>
                                        <h6 class="text-uppercase mb-3 mt-0">Deposited</h6>
                                        <h5 class="mb-3">${{  $payed }}</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="card mini-stat bg-pattern">
                                    <div class="card-body mini-stat-img">
                                        <div class="mini-stat-icon">
                                            <i class="fa fa-coins bg-soft-primary text-success float-right h4"></i>
                                        </div>
                                        <h6 class="text-uppercase mb-3 mt-0">Profit</h6>
                                          <h5 class="mb-3">${{ $totalprofit }}</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="card mini-stat bg-pattern">
                                    <div class="card-body mini-stat-img">
                                        <div class="mini-stat-icon">
                                            <i class="fa fa-coins bg-soft-primary text-success float-right h4"></i>
                                        </div>
                                        <h6 class="text-uppercase mb-3 mt-0">Total Balance</h6>
                                           <h5 class="mb-3">$ {{ $user->amount }}</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->

                        <div class="row">
                            <div class="col-xl-5 col-lg-12">
                                <div class="card overflow-hidden ">
                                    <div
                                        style="height:509px; background-color: #1D2330; overflow:hidden; box-sizing: border-box; border: 1px solid #282E3B; border-radius: 4px; text-align: right; line-height:14px; font-size: 12px; font-feature-settings: normal; text-size-adjust: 100%; box-shadow: inset 0 -20px 0 0 #262B38; padding: 0px; margin: 0px; width: 100%;">
                                        <div style="height:413px; padding:0px; margin:0px; width: 100%;"><iframe
                                                src="https://widget.coinlib.io/widget?type=full_v2&amp;theme=dark&amp;cnt=6&amp;pref_coin_id=1505&amp;graph=yes"
                                                width="100%" height="509px" scrolling="auto" marginwidth="0" marginheight="0"
                                                frameborder="0" border="0" style="border:0;margin:0;padding:0;"
                                                sandbox="allow-same-origin allow-scripts allow-popups allow-forms"></iframe></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-7">
                                <div class="card">
                                    <div style="height: 510px;">
                                        <div id="tradingview_b766a-wrapper"
                                        style="position: relative;box-sizing: content-box;width: 100%;height: 100%;margin: 0 auto !important;padding: 0 !important;font-family:Arial,sans-serif;">
                                        <div style="width: 100%;height: 100%;background: transparent;padding: 0 !important;">
                                            <iframe id="tradingview_b766a"
                                                src="https://s.tradingview.com/widgetembed/?frameElementId=tradingview_b766a&amp;symbol=FX%3AUSDJPY&amp;interval=1&amp;saveimage=1&amp;toolbarbg=4f4f4f&amp;studies=%5B%5D&amp;theme=Dark&amp;style=10&amp;timezone=Etc%2FUTC&amp;studies_overrides=%7B%7D&amp;overrides=%7B%7D&amp;enabled_features=%5B%5D&amp;disabled_features=%5B%5D&amp;locale=en&amp;utm_source=google.com&amp;utm_medium=widget&amp;utm_campaign=chart&amp;utm_term=FX%3AUSDJPY"
                                                style="width: 100%; height: 100%; margin: 0 !important; padding: 0 !important;"
                                                frameborder="0" allowtransparency="true" scrolling="no" allowfullscreen=""
                                                sandbox="allow-same-origin allow-scripts allow-popups allow-forms"></iframe>
                                        </div>
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

{{-- @include('right-navbar') --}}
