<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{url('/')}}" class="brand-link">
        <img src="{{asset('img/logo/logo.png')}}" alt="TechSwivel" class="brand-image  elevation-3" style="opacity: .8">
<br>
{{--        <span class="brand-text font-weight-light text-center"></span>--}}
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <a href="#" class="d-block">{{auth()->user()->name? auth()->user()->name : "Administrator"}}</a>
            </div>
            <div class="info">
{{--                <a href="#" class="d-block">{{auth()->user()->name? auth()->user()->name : "Administrator"}}</a>--}}

            </div>
        </div>


        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{url('home')}}" class="nav-link {{ (request()->is('/home')) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{url('telescope')}}"
                       class="nav-link {{ (request()->is('telescope/*')) ? 'active' : '' }}" target="_blank">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Telescope
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{url('getUsers')}}" class="nav-link {{ (request()->is('getUsers')) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                             Users
                        </p>
                    </a>
                </li>
                @if(env('IS_CONFIGURATION_VISIBLE'))
                    <li class="nav-item">
                        <a href="{{url('artisan-login')}}" class="nav-link  {{ (request()->is('artisan/*')) ? 'active' : '' }}" target="_blank">
                            <i class="nav-icon fa fa-cog"></i>
                            <p>
                            Configurations
                            </p>
                        </a>
                    </li>
                @endif
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
