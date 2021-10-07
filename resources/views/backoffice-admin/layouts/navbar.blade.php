<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
      <a href="{{ route('admin') }}" class="nav-link">{{ __('backoffice/navbar.home') }}</a>
    </li>
    {{-- <li class="nav-item d-none d-sm-inline-block">
      <a href="#" class="nav-link">Contact</a>
    </li> --}}
  </ul>
  
  <!-- Right navbar links -->
  <ul class="ml-auto navbar-nav">
    <li class="nav-item dropdown">
      <a class="nav-link" data-toggle="dropdown" href="#">
        <i class="fas fa-sign-out-alt"></i>
      </a>
      <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item nav-logout">
          <i class="fas fa-sign-out-alt"></i> {{ __('backoffice/navbar.logout') }}
        </a>
        
      </div>
    </li>
  </ul>
</nav>

{!! Form::open(['id' => 'form-logout', 'route' => 'logout', 'method' => 'post' ]) !!}
  @csrf
{!! Form::close() !!}