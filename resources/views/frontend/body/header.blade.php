<nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4 px-lg-5 py-3">
    <a class="navbar-brand p-0" href="{{ url('/') }}">
        <h1 class="text-primary m-0" ><i class="fa fa-utensils me-3"></i>Gusteau</h1>
        <!-- <img src="img/logo.png" alt="Logo"> -->
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="fa fa-bars"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto py-0 pe-4">
            <a href="index.html" class="nav-item nav-link active"> @if(session()->get('language') == 'arabic') الرئيسية@else Home @endif </a>
           {{-- <a href="about.html" class="nav-item nav-link">@if(session()->get('language') == 'arabic')من نحن @else About @endif </a>
            <a href="service.html" class="nav-item nav-link">@if(session()->get('language') == 'arabic') الخدمات  @else Service @endif </a>
            --}}<a href="{{ route('menu') }}" class="nav-item nav-link">@if(session()->get('language') == 'arabic')القائمة @else Menu @endif </a>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">@if(session()->get('language') == 'arabic')اللغة@else Languages @endif </a>
                <div class="dropdown-menu m-0">
                    @if(session()->get('language') == 'arabic')
                    <a href="{{route('english')}}" class="dropdown-item">English</a>
                    @else
                    <a href="{{ route('arabic') }}" class="dropdown-item">عربي</a>
                    @endif
                </div>
            </div>
            <a href="contact.html" class="nav-item nav-link">@if(session()->get('language') == 'arabic')اتصل بنا@else Contact @endif </a>
            @auth
            <a href="{{route('login')}}" class="nav-item nav-link">@if(session()->get('language') == 'arabic')حسابي@else User Profile @endif </a>
            @else
            <a href="{{route('login')}}" class="nav-item nav-link">@if(session()->get('language') == 'arabic')تسجيل دخول / انشاء حساب  @else Login/Register @endif </a>
            @endauth
            @auth
                @if(count(auth()->user()->unreadnotifications) > 0 )
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link " data-bs-toggle="dropdown">
                         <i style="color: red; transform: rotate(-120deg);" class="bi bi-bell fa-2x"></i><span class="badge badge-pill badge-danger" style="margin-left: -9px; position: absolute;/* margin-bottom: 37px; */font-size: 10px;top: 31px;background-color: red;width: 18px;border-radius: 11px;height: 16px;"> {{ count(auth()->user()->unreadnotifications) }} </span></a>
                    <div class="dropdown-menu m-0">
                @foreach(auth()->user()->notifications as $notification)
                    <div class="alert alert-success mark-as-read" data-id="{{ $notification->id }}" id="{{ $notification->id }}" onclick="markRead(this.id)">
                        <p > Your Reservation is at {{ $notification->data['time'] }} </p>
                    </div>
                    @endforeach
                    </div>
                </div>
        </div>
        @else
            <div class="nav-item dropdown">
                <a href="#" class="nav-link " data-bs-toggle="dropdown">
                    <i class="bi bi-bell fa-2x" ></i><span class="badge badge-pill badge-danger" style="margin-left: -9px; position: absolute;/* margin-bottom: 37px; */font-size: 10px;top: 31px;background-color: red;width: 18px;border-radius: 11px;height: 16px;"> {{ count(auth()->user()->unreadnotifications) }} </span></a>
                   </a>
                <div class="dropdown-menu m-0">
                    @foreach(auth()->user()->notifications as $notification)
                        <div class="alert" data-id="{{ $notification->id }}" id="{{ $notification->id }}" onclick="markRead(this.id)">
                            <p  > Your Reservation is at {{ $notification->data['time'] }} </p>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
        @endauth

    </div>
        <a href="{{route('tables')}}" class="btn btn-primary py-2 px-4">@if(session()->get('language') == 'arabic')احجز طاولة@else Book A Table @endif </a>

    </div>
</nav>