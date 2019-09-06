<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Scripts -->
  <script src="{{ mix('js/app.js') }}"></script>

  <!-- Styles -->
  <link href="{{ mix('css/app.css') }}" rel="stylesheet">

</head>
<body>
<div id="app">
  @include('partials.nav')
  <div class="container-fluid">
    @if (!Auth::guest())
    @include('partials.side-nav')
    @endif
    <div class="row">
      <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          @include('vendor.flash.message')
          @include('partials.errors')
        @yield('content')
      </main>
    </div>
  </div>
</div>

<script>
  $(document).ready(function () {
    $('.date-picker').datepicker({
      format: 'yyyy-mm-dd'
    });
    $('.year-picker').datepicker({
      format: 'yyyy',
      startView: 2,
      viewMode: "years",
      minViewMode: "years"
    });
    $('.onchangeSubmit').change(function() {
      $(this).closest('form').submit();
    });
  });
  var changeParams = function(url, id) {
    return url.replace(/-?\d+/, id);
  };
  feather.replace();
</script>

@stack('scripts')
</body>
</html>
