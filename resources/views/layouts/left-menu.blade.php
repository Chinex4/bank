<ul class="metismenu" id="side-menu">
    <li class="menu-title">Overview</li>
    <li>
        <a href="{{ route('dashboard-page') }}" class="waves-effect">
            <i class="ion ion-md-speedometer"></i>
             <span> Dashboard </span>
        </a>
    </li>

    <li class="menu-title">Apps</li>
    <li>
        <a href="{{  route('profile-page') }}" class="waves-effect {{ set_active_url('profile-page')}}">
            <i class="ion ion-md-calendar"></i><span> Profile </span>
        </a>
    </li>
    <li>
        <a href="{{  route('deposit-page') }}" class="waves-effect {{ set_active_url('deposit-page')}}">
            <i class="ion ion-md-calendar"></i><span> Make Deposite </span>
        </a>
    </li>
    <li>
        <a href="{{ route('transaction-page') }}" class="waves-effect {{ set_active_url('transaction-page')}}">
            <i class="ion ion-md-calendar"></i><span> Trade History </span>
        </a>
    </li>
    <li>
        <a href="{{ route('withdrawal-page') }}" class="waves-effect {{ set_active_url('withdrawal-page')}}">
            <i class="ion ion-md-calendar"></i><span> Withdrawals </span>
        </a>
    </li>

    <li>
        <a href="{{ route('logout') }}"
        onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();" class="waves-effect {{ set_active_url('logout')}}">
            <i class="mdi mdi-power text-danger"></i>
            <span> {{ __('Logout') }} </span>
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
            <button type="submit"></button>
        </form>
    </li>
    {{-- <li>
        <a href="javascript:void(0);" class="waves-effect"><i class="ion ion-md-mail"></i>
            <span> Profile <span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span> </span>
        </a>
        <ul class="submenu">
            <li>
                <a href="{{  route('profile-page') }}" class="waves-effect"><i class="ion ion-md-calendar"></i><span> Profile </span></a>
            </li>
            <li><a href="">Edit Profile</a></li>
            <li><a href="email-compose.html">Change Password</a></li>
        </ul>
    </li> --}}

</ul>
