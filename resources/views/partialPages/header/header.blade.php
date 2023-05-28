<nav  class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
        </li>

    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <img src="" alt="rounded-circle" class="rounded-circle" style="width: 50px;height: 50px;"
             onerror="this.onerror=null;this.src='{{asset('img/default-avatar.png')}}';">
        &nbsp&nbsp&nbsp


        <div class="dropdown">
            <button class="btn btn-primary dropdown-toggle" type="button"
                    data-toggle="dropdown" style="margin-top: 6px;"> {{auth()->user()->name? auth()->user()->name : "Administrator"}}
                <span class="caret"></span></button>

            <ul class="dropdown-menu" style="width: 250px;">
                <img src="" alt="Stickman" width="150" height="150"
                     style=" margin: 0 auto;display:table;" class="rounded-circle" onerror="this.onerror=null;this.src='{{asset('img/default-avatar.png')}}';">

                <li style=" text-align: center;">{{auth()->user()->email}}</li>
                <li style=" margin: 5px; ">
                    <a class="btn btn-primary" style="float: left" href="{{ url('/forgot-password') }}">Password Reset</a>
                    <form action="{{route('logout')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <button class="btn btn-primary" style="float: right">Logout</button>
                    </form>
                </li>
            </ul>
        </div>

    </ul>
</nav>
