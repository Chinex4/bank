
<div class="modal fade" id="modalTop{{ $usering->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel2">{{ __('Edit User') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.usermanagement.update', $usering->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="row">
                        <div class="col-12 mb-3">
                            <label class="form-label" for="basic-default-fullname">{{ __('Name') }}</label>
                            <input type="text" value="{{ $usering->name }}" name="name" class="form-control @error('name') is-invalid @enderror" id="basic-default-fullname" placeholder="First name" />
                            @error('name')
                              <span class="invalid-feedback" role="alert">
                                 {{ $message }}
                              </span>
                            @enderror
                        </div>
                        <div class="col-12 mb-3">
                            <label class="form-label" for="basic-default-fullname">{{ __('Last Name') }}</label>
                            <input type="text" value="{{ $usering->lastname }}" name="lastname" class="form-control @error('lastname') is-invalid @enderror" id="basic-default-fullname" placeholder="Last Name" />
                            @error('lastname')
                              <span class="invalid-feedback" role="alert">
                                 {{ $message }}
                              </span>
                            @enderror
                        </div>
                        <div class="col-12 mb-3">
                            <label class="form-label" for="basic-default-fullname">{{ __('Total balance') }}</label>
                            <input type="number" value="{{ $usering->amount }}" name="amount" class="form-control @error('amount') is-invalid @enderror" id="basic-default-fullname" placeholder="total balance" />
                            @error('amount')
                              <span class="invalid-feedback" role="alert">
                                 {{ $message }}
                              </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="basic-default-fullname">{{ __('Email') }}</label>
                            <input type="text" name="email" value="{{ $usering->email }}"
                                class="form-control @error('email') is-invalid @enderror" id="basic-default-fullname"
                                placeholder="Email  address" />
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror

                        </div>
                        <div class="col-12 mb-3">
                            <label class="form-label" for="basic-default-fullname">{{ __('Phone Number') }}</label>
                            <input type="text" value="{{ $usering->phone }}" name="phone" class="form-control @error('phone') is-invalid @enderror" id="basic-default-fullname" placeholder="Phone Number" />
                            @error('phone')
                              <span class="invalid-feedback" role="alert">
                                 {{ $message }}
                              </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Upload Popfile Image</label>
                            <input class="form-control" value="{{ $usering->image }}" name="image" type="file" id="formFile" />
                            @error('image')
                            <span class="invalid-feedback" role="alert">
                                {{ $message }}
                            </span>
                        @enderror
                          </div>

                    </div>
                    <div class="row g-2">
                        <div class="col mb-0 text-center">
                            <input type="submit" class="btn btn-primary btn-sm" value="Save Change">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- @include('layouts.script') --}}
