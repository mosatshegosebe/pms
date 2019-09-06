@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card card-default">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                      <i data-feather="circle"></i>
                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
  {{--<div class="card">--}}
    {{--<div class="col py-0" data-spy="scroll" data-target="#sidebar-container" data-offset="51">--}}
      {{--<section class="card border-success my-3" id="experience" style="min-height: 60em">--}}

        {{--<div class="card-body">--}}
          {{--<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>--}}
        {{--</div>--}}
      {{--</section>--}}

      {{--<section class="card border-success my-3" id="skills" style="min-height: 60em">--}}

        {{--<div class="card-body">--}}
          {{--<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>--}}
        {{--</div>--}}
      {{--</section>--}}

      {{--<section class="card border-success my-3" id="education" style="min-height: 60em">--}}
        {{--<div class="card-body">--}}
          {{--<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>--}}
        {{--</div>--}}
      {{--</section>--}}

      {{--<section class="card border-success my-3" id="awards" style="min-height: 60em">--}}
        {{--<div class="card-body">--}}
          {{--<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>--}}
        {{--</div>--}}
      {{--</section>--}}

      {{--<section class="card border-success my-3" id="projects" style="min-height: 60em">--}}

        {{--<div class="card-body">--}}
          {{--<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>--}}
        {{--</div>--}}
      {{--</section>--}}
    {{--</div>--}}
  {{--</div>--}}

@endsection
