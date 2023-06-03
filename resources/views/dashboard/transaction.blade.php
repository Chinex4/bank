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
                                    <h4 class="page-title">Transaction History</h4>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="javascript:void(0);"><i class="mdi mdi-home-outline"></i></a></li>
                                        <li class="breadcrumb-item"><a href="javascript:void(0);">Transaction History</a></li>
                                        <li class="breadcrumb-item active">Transaction History</li>
                                    </ol>
                                </div>
                            </div> <!-- end row -->
                        </div>
                        <!-- end page-title -->

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="table-rep-plugin">
                                            <div class="table-responsive mb-0" data-pattern="priority-columns">
                                                <table id="tech-companies-1" class="table table-striped">
                                                    <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Date</th>
                                                        <th>Type</th>
                                                        <th>Amount</th>
                                                        <th>Status</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @if (count($transactions) != 0)
                                                        @foreach ($transactions as $transaction)
                                                            <tr>
                                                                <td>{{ $loop->index + 1 }}</td>
                                                                <td>{{ $transaction['date'] }}</td>
                                                                <td>{{ $transaction['type'] }}</td>
                                                                <td>{{ $transaction['amount'] }}</td>
                                                                <td>
                                                                    @if ($transaction['status'] == 0)
                                                                        <span class="badge badge-soft-warning me-1">Pending</span>
                                                                    @else
                                                                       <span class="badge  badge-soft-success me-1">Approved</span>
                                                                    @endif
                                                            </tr>
                                                        @endforeach
                                                    @endif

                                                    </tbody>
                                                </table>
                                            </div>

                                        </div>

                                    </div>
                                </div>

                            </div> <!-- end col -->
                        </div> <!-- end row -->
                        <div class="row justify-content-end" aria-label="Page navigation">
                            <div class="pagination ">
                                {{-- {{ $transactions->links() }} --}}
                            </div>
                        </div>
                    </div>
                    <!-- container-fluid -->

                </div>
                <!-- content -->


            </div>
            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->
            @if(session('model'))

            <!-- Modal -->
            <div class="modal fade show" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button class="btn btn-primary" disabled>
                            <span class="spinner-border spinner-border-sm"  role="status" aria-hidden="true"></span>
                            <span class="visually-hidden">Transaction in Process...</span>
                        </button>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>

                    <div class="modal-body text-center">

                         <div class="pb-3 pt-4 ">
                            <a href="{{ route('dashboard-page') }}" class="btn btn-primary submit_btn ">Return Back Home</a>
                        </div>
                    </div>
                </div>
                </div>
            </div>


            @endif
        @push('scripts')
        <script>
                $(function(){
                    $('#exampleModalCenter').modal('show');
                });

        </script>
        @endpush
@endsection
