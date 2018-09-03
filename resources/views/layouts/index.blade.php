@extends('layouts.master')

@section('content')

  <!-- Header -->
  <header class="masthead">
    <div class="container">
      <div class="intro-text">
        <div class="intro-lead-in">Welcome To</div>
        <div class="intro-heading text-uppercase">{{ config('app.name', 'Laravel') }}</div>

        <div class="input-group mb-3 w-75 mx-auto input-group-lg">
            <input type="text"  class="form-control" placeholder="Search Naperville Businesses" />
            <div class="input-group-append">
                <a class="btn btn-primary text-uppercase js-scroll-trigger" href="#services">Go</a>
            </div>
        </div>
      </div>
    </div>
  </header>

@endsection