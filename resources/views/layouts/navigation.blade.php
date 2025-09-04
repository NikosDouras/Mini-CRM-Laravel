<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">

            <a href="{{ route('companies.index') }}" class="nav-link">{{ __('Companies') }}</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{ route('employees.index') }}" class="nav-link">{{ __('Employees') }}</a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#" role="button">
                {{ __('Language') }}
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <a href="{{ route('lang.switch', 'en') }}" class="dropdown-item">{{ __('English') }}</a>
                <a href="{{ route('lang.switch', 'el') }}" class="dropdown-item">{{ __('Greek') }}</a>
            </div>
        </li>

        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#" role="button">
                <span class="d-inline-flex align-items-center justify-content-center bg-secondary rounded-circle text-white" style="width: 35px; height: 35px;">
                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                </span>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <span class="dropdown-item-text">{{ Auth::user()->name }}</span>
                <div class="dropdown-divider"></div>

                <a href="{{ route('profile.edit') }}" class="dropdown-item">{{ __('Profile') }}</a>
                <div class="dropdown-divider"></div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="dropdown-item">{{ __('Log Out') }}</button>
                </form>
            </div>
        </li>
    </ul>
</nav>
