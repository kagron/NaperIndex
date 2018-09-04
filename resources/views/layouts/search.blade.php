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
        <div class="d-flex justify-content-between">
            <p>Showing results for <strong>'{{ $input }}'</strong> in Naperville, IL</p>
            <p><strong>{{ $httpResponse->total }}</strong> total results</p>
        </div>
        <hr>
        @foreach($httpResponse->businesses as $business)
        <search-result picture="{{ $business->image_url }}" name="{{ $business->name }}" rating="{{ $business->rating }}"
            phone="{{ $business->display_phone }}" address1="{{ $business->location->address1 }}" city="{{ $business->location->city }}" 
            state="{{ $business->location->state }}"></search-result>
            <hr>
        @endforeach
        {{-- Pages --}}
        <nav>
            <ul class="pagination justify-content-center">
                @if($page >= 2)
                    <li class="page-item">
                @else 
                    <li class="page-item disabled">
                @endif
                <a class="page-link" href="search?term={{ $input }}&p={{ $page - 1 }}" tabindex="-1">Previous</a>
            </li>
            <!-- Determine which numbers to show -->
            @if($page <= 3)
                @for($i = 0; $i <= 5; $i++)
                    @if($i > 0 && $i <= ($httpResponse->total / 10) - 2)
                        <li class="page-item<?php if($i == $page) echo " active"; ?>"><a class="page-link" href="search?term={{ $input }}&p={{ $i }}">{{ $i }}</a></li>
                    @endif
                @endfor

            @else
                @for($i = $page - 2; $i <= $page + 2; $i++)
                    @if($i > 0 && $i <= ($httpResponse->total / 10) - 2)
                        <li class="page-item<?php if($i == $page) echo " active"; ?>"><a class="page-link" href="search?term={{ $input }}&p={{ $i }}">{{ $i }}</a></li>
                    @endif
                @endfor
            @endif
            <li class="page-item">
                <a class="page-link" href="search?term={{ $input }}&p={{ $page + 1 }}">Next</a>
            </li>
            </ul>
        </nav>
        <hr>

    {{-- If there's nothing from Yelp's response --}}
    @else 
            There are no results for '{{ $input }}'.  Please try searching again.
    @endif
    
</div>
@endsection