@extends('layouts.master-2')
@section('content')

    <div class="container-xxl flex-grow-1 container-p-y">
        <!-- Grid Card -->
        <div class="row">
            <div class="col-xl">
                <h6 class="pb-1 mb-4 text-muted">Users Table</h6>
            </div>
            {{-- <div class="col-xl text-end">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCenter">
                    <span class="tf-icons bx bx-add-to-queue"></span>&nbsp; Add New User
                </button>
            </div> --}}
        </div>


        <div class="row">


             <!-- Striped Rows -->
             <div class="card">
                <h5 class="card-header">Users</h5>
                <div class="table-responsive text-nowrap">
                  <table class="table ">
                    <thead>
                      <tr>
                        <th>Id</th>
                        <th>image</th>
                        <th>Name</th>
                        <th>Lastname</th>
                        <th>email</th>
                        <th>Phone Number</th>
                        <th>Total Balance</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @if (count($user) != 0)
                        @forelse ($user as $usering)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>
                                    <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                                        <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" title="" data-bs-original-title="Lilian Fuller">
                                          <img src="{{ asset('/'.$usering->image) }}" alt="Avatar" class="rounded-circle">
                                        </li>
                                    </ul>
                                </td>
                                <td>
                                    {{  $usering->name  }}
                                </td>
                                <td>
                                    {{  $usering->lastname  }}
                                </td>
                                <td>
                                    {{  $usering->email  }}
                                </td>


                                <td>
                                    <span class="badge bg-label-success me-1">  {{  $usering->phone  }} </span>
                                </td>
                                <td>{{ $usering->amount  }}</td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="javascript:void(0);"  data-bs-toggle="modal"
                                            data-bs-target="#modalTop{{ $usering->id }}"><i
                                                    class="bx bx-edit-alt me-1"></i> Edit</a>
                                            <a class="dropdown-item" href="javascript:void(0);">
                                              <form action="{{ route('admin.usermanagement.destroy', $usering->id) }}" method="POST">
                                                @method('delete')
                                                @csrf
                                                <button class="px-2 btn" onclick="return confirm('Are you sure?');"><i class="bx bxs-trash me-1"></i>Delete</button>
                                              </form>
                                            </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @include('admin.user-edit')
                        @empty

                        @endforelse

                        @endif

                    </tbody>

                  </table>
                </div>
              </div>
              <!--/ Striped Rows -->

        </div>

        <div class="row" aria-label="Page navigation">
            <div class="pagination justify-content-center">
                {{ $user->links() }}
            </div>
        </div>

        @include('admin.user-create')


    </div>



@endsection
<script>
    ClassicEditor
        .create(document.getElementById('summary-body'))
        .catch(error => {
            console.error(error);
        });
</script>
