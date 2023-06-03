
<div class="modal fade" id="modalTop{{ $events->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel2">{{ __('Edit Blog') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.deposit.update', $events->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="row">
                        <div class="mb-3">
                            <label for="metakeywords">User </label>
                            <select name="user_id" id="" class="form-control">
                                @foreach($user as $users)
                                    <option value="{{ $users->id }}">{{ $users->name }}</option>
                                @endforeach
                            </select>

                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="basic-default-fullname">{{ __('Amount') }}</label>
                            <input type="text" name="amount"
                                class="form-control @error('amount') is-invalid @enderror" id="basic-default-fullname"
                                placeholder="Amount" value="{{ $events->amount }}">
                            @error('amount')
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