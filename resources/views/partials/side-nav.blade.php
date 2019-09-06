{{--<nav class="navbar navbar-expand-lg navbar-light bg-dark fixed-top">--}}

{{--<a class="navbar-brand" href="{{ url('/') }}">--}}
{{--<img src="/images/laravel.png" style="height: 48px;">--}}
{{--</a>--}}
{{--<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"--}}
{{--aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">--}}
{{--<span class="navbar-toggler-icon"></span>--}}
{{--</button>--}}

{{--<div class="collapse navbar-collapse" id="navbarNavDropdown">--}}
{{--<ul class="navbar-nav">--}}
{{--<li class="nav-item">--}}
{{--<a class="nav-link" href="/home">Home <span class="sr-only">(current)</span></a>--}}
{{--</li>--}}
{{--@if (!Auth::guest())--}}
{{--<li class="nav-item dropdown">--}}
{{--<a class="nav-link dropdown-toggle navbarDropdownMenuLink" id="companyNavLink" data-toggle="dropdown"--}}
{{--aria-haspopup="true" aria-expanded="false">System</a>--}}
{{--<ul class="dropdown-menu" aria-labelledby="systemNavLink">--}}
{{--<li><a class="dropdown-item" href="{{route('clients.index')}}">Clients</a></li>--}}
{{--<li class="dropdown-submenu">--}}
{{--<a class="dropdown-item" href="#">Users</a>--}}
{{--<ul class="dropdown-menu">--}}
{{--<li><a class="dropdown-item" href="{{route('users.index')}}">Search</a></li>--}}
{{--<li><a class="dropdown-item" href="{{route('users.create')}}">Create</a></li>--}}

{{--</ul>--}}
{{--</li>--}}
{{--@permission('acl-manage')--}}
{{--<li class="dropdown-submenu">--}}
{{--<a class="dropdown-item" href="#">Security</a>--}}
{{--<ul class="dropdown-menu">--}}
{{--<li><a class="dropdown-item" href="{{route('roles.index')}}">Roles</a></li>--}}
{{--<li><a class="dropdown-item" href="{{route('permissions.index')}}">Permissions</a></li>--}}
{{--</ul>--}}
{{--</li>--}}
{{--@endpermission--}}
{{--</ul>--}}
{{--</li>--}}

{{--@endif--}}
{{--</ul>--}}
{{--</div>--}}

{{--<div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">--}}
{{--<ul class="navbar-nav">--}}
{{--@if (Auth::guest())--}}
{{--<li class="nav-item"><a href="{{ route('login') }}" class="nav-link">Login</a></li>--}}
{{--@else--}}
{{--<li class="nav-item dropdown">--}}
{{--<a href="#" class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown"--}}
{{--aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }}</a>--}}
{{--<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">--}}
{{--<a href="{{ route('logout') }}" class="dropdown-item"--}}
{{--onclick="event.preventDefault();document.getElementById('logout-form').submit();">--}}
{{--Logout--}}
{{--</a>--}}

{{--<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">--}}
{{--{{ csrf_field() }}--}}
{{--</form>--}}
{{--</div>--}}
{{--</li>--}}
{{--@endif--}}
{{--</ul>--}}
{{--</div>--}}
{{--</nav>--}}

<nav id="sidebar-container" class="col-md-2 d-none d-md-block bg-light sidebar">
  <div class="sidebar-sticky">
    <ul class="nav flex-column">
      <li class="nav-item">
        <a class="nav-link" href="{{route('dashboard.home')}}">
          <span data-feather="home"></span>
          Dashboard <span class="sr-only">(current)</span>
        </a>
      </li>
      {{--<li class="nav-item">--}}
        {{--<a class="nav-link" href="#experience">--}}
          {{--<span data-feather="file"></span>--}}
          {{--Orders--}}
        {{--</a>--}}
      {{--</li>--}}
      <li class="nav-item">
        <a class="nav-link active" href="{{route('dashboard.products.index')}}">
          <span data-feather="shopping-cart"></span>
          Products
        </a>
      </li>
      {{--<li class="nav-item">--}}
        {{--<a class="nav-link" href="#education">--}}
          {{--<span data-feather="users"></span>--}}
          {{--Customers--}}
        {{--</a>--}}
      {{--</li>--}}
      {{--<li class="nav-item">--}}
        {{--<a class="nav-link" href="#">--}}
          {{--<span data-feather="bar-chart-2"></span>--}}
          {{--Reports--}}
        {{--</a>--}}
      {{--</li>--}}
      {{--<li class="nav-item">--}}
        {{--<a class="nav-link" href="#">--}}
          {{--<span data-feather="layers"></span>--}}
          {{--Integrations--}}
        {{--</a>--}}
      {{--</li>--}}
    </ul>

    {{--<h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">--}}
      {{--<span>Saved reports</span>--}}
      {{--<a class="d-flex align-items-center text-muted" href="#">--}}
        {{--<span data-feather="plus-circle"></span>--}}
      {{--</a>--}}
    {{--</h6>--}}
    {{--<ul class="nav flex-column mb-2">--}}
      {{--<li class="nav-item">--}}
        {{--<a class="nav-link" href="#">--}}
          {{--<span data-feather="file-text"></span>--}}
          {{--Current month--}}
        {{--</a>--}}
      {{--</li>--}}
      {{--<li class="nav-item">--}}
        {{--<a class="nav-link" href="#">--}}
          {{--<span data-feather="file-text"></span>--}}
          {{--Last quarter--}}
        {{--</a>--}}
      {{--</li>--}}
      {{--<li class="nav-item">--}}
        {{--<a class="nav-link" href="#">--}}
          {{--<span data-feather="file-text"></span>--}}
          {{--Social engagement--}}
        {{--</a>--}}
      {{--</li>--}}
      {{--<li class="nav-item">--}}
        {{--<a class="nav-link" href="#">--}}
          {{--<span data-feather="file-text"></span>--}}
          {{--Year-end sale--}}
        {{--</a>--}}
      {{--</li>--}}
    {{--</ul>--}}
  </div>
</nav>