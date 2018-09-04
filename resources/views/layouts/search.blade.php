@extends('layouts.master')

@section('content')
@include('layouts.nav2')
<div class="container" style="padding-top: 100px">
{{-- <pre> --}}
 <?php #print_r( $httpResponse->businesses[0]) ?>
{{-- </pre> --}}
    <form action="{{ route('search') }}" method="GET">
        <div class="input-group mb-3">
            <input type="text"  class="form-control" placeholder="Search Naperville Businesses" name="term" />
            <div class="input-group-append">
            <button type="submit" class="btn btn-primary text-uppercase" href="search">Go</button>
            </div>
        </div>
    </form>
    {{-- Check if there is anything in the array, then display it --}}
    @if(!empty($httpResponse->businesses))
        <p>Showing results for '{{ $input }}' in Naperville, IL</p>
        @foreach($httpResponse->businesses as $business)
        <search-result picture="{{ $business->image_url }}" name="{{ $business->name }}" rating="{{ $business->rating }}"
            phone="{{ $business->display_phone }}" address1="{{ $business->location->address1 }}" city="{{ $business->location->city }}" 
            state="{{ $business->location->state }}"></search-result>
            <hr>
        @endforeach
    @else 
            There are no results for '{{ $input }}'.  Please try searching again.

    @endif
</div>
@endsection