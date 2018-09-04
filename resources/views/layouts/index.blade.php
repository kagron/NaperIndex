@extends('layouts.master')

@section('content')
@include('layouts.nav')
  <!-- Header -->
  <header class="masthead">
    <div class="container">
      <div class="intro-text">
        <div class="intro-lead-in">Welcome To</div>
        <div class="intro-heading text-uppercase">{{ config('app.name', 'Laravel') }}</div>
          <form action="{{ route('search') }}" method="GET">
            <div class="input-group mb-3 w-75 mx-auto input-group-lg">
              <input type="text"  class="form-control" placeholder="Search Naperville Businesses" name="term" />
              <div class="input-group-append">
                <button type="submit" class="btn btn-primary text-uppercase" href="search">Go</button>
              </div>
            </div>
          </form>
          <!-- If there is nothing in the input, it will redirect with a status session variable which will display here -->
          @if (session('status'))
          <div class="card-body w-75 mx-auto">
              <div class="alert alert-danger">
                  {{ session('status') }}
              </div>
          </div>
          @endif
      </div>
    </div>
  </header>

@endsection