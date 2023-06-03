<div class="right-sidebar d-none d-xl-block">
    <div class="slimscroll-menu">
        <div class="px-4 pt-4">
            <div class="card user-wid text-center overflow-hidden">
                <div class="p-4 bg-lighten-danger"></div>
                <div class="mx-3">
                    <div class=" user-wid-content p-1 rounded" style="background:#a17909; ">
                        <div class="user-img">
                            @if(Auth::user()->image)
                               <img src="{{ asset('profile/'.Auth::user()->image) }}" alt="user-img" title="" class="rounded-circle thumb-md img-fluid">
                            @endif
                            
                        </div>
                        <h5 class="font-14 mb-1"><a href="javascript: void(0);">{{  auth()->user()->name }}</a> </h5>
                        <p class="text-white mb-2"><small>{{  auth()->user()->email }}</small></p>
                    </div>
                </div>
            </div>
            
            

        </div>
    </div>
</div>
