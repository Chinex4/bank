@component('mail::layout')
 {{-- Header --}}
 @slot('header')
 @component('mail::header', ['url' => config('app.url')])
     <!-- header here -->
 @endcomponent
 @endslot
<style>
    .action{
        display: none;
    }
</style>
 {{-- Body section --}}
  <div class="container">
       <div class="card">
            <div class="card-body">
                <h5 class="card-title" style="color: #1808B4;">
                    New Trade Profits have been credited into your trading account  successfully
                </h5>
                <h6 class="card-subtitle mb-2 text-muted">Hi {{ $usermail->name }}</h6>
                <p class="card-text"> Your newly traded deposit <span style="color: #0D42B2;"> ${{  $useramount }} </span>
                    has been added into your   account successfully</p>
                <p class="card-text">click the below to login your   account.</p>

 {{-- Footer --}}
 @slot('footer')
 @component('mail::footer')
     <!-- footer here -->
     © {{ date('Y') }} {{ config('app.name') }}. @lang('All rights reserved.')
 @endcomponent
@endslot

@endcomponent
