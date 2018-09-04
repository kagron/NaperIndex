@extends('layouts.master')

@section('content')
@include('layouts.nav2')
<div class="container" style="padding-top: 80px">

    {{-- Create a search bar at the top --}}
    <form action="{{ route('search') }}" method="GET">
        <div class="input-group mb-3">
            <input type="text"  class="form-control" placeholder="Search Naperville Businesses" name="term" />
            <div class="input-group-append">
            <button type="submit" class="btn btn-primary text-uppercase" href="search">Go</button>
            </div>
        </div>
    </form>

    {{-- Name/Address  --}}
    <div class="row">
        <div class="col-md-9 p-2">

            {{-- Echo out all the information about the business in boostrap styled columns --}}
            <h1 class="text-primary">{{ $httpResponse->name }}</h1>
            <p><span class="stars">{{ $httpResponse->rating }}</span> {{ $httpResponse->review_count }} reviews</p>

            {{-- Make categories comma separated values --}}
            <p><strong>Categories: </strong>@php 
                    $first = true;
                    foreach ($httpResponse->categories as $cat)
                    {
                        if($first)
                        {
                            echo $cat->title;
                            $first = false;
                        }
                        else
                            echo ", " . $cat->title;
                    }
                @endphp
            </p>
        </div>

        {{-- Address --}}
        <div class="col-md-3 p-2">
            <h4>{{ $httpResponse->display_phone }}</h4>
            <p>{{ $httpResponse->location->address1 }}<br />
                {{-- Display address line 2 only if its there --}}
            @if(!empty($httpResponse->location->address2))
                {{ $httpResponse->location->address2 }} <br />
            @endif
            {{ $httpResponse->location->city }}, {{ $httpResponse->location->state }}</p>
        </div>
    </div>
    <hr>

    {{-- Photos --}}
    <div class="row">
        {{-- Select the first 3 photos to display --}}
        @for($i = 0; $i < 3; $i++)
        <div class="col-md-4">
            <img src="{{ $httpResponse->photos[$i] }}" alt="{{ $httpResponse->name }}" class="img-fluid img-thumbnail">
        </div>
        @endfor
    </div>
    <hr>

    {{-- Hours and Reviews --}}
    <div class="row">
        <div class="col-md-3">
            <h3 class="text-primary">Hours</h3>
            <ul style="list-style-type: none">
            @php
                // Create an array of days to put into the loop
                $dowMap = array('Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun');
                $i = 0;
            @endphp
            @foreach ($httpResponse->hours[0]->open as $day)
                <li>
                    <div class="row">
                        <div class="col-md-2">
                            <strong>
                            @php
                                // Dynamically add Days incase a business is open
                                // at two different times a day
                                if(!isset($pastDay) || $pastDay != $day->day)
                                {
                                    echo date("D", strtotime($dowMap[$i]));
                                    $i++;   
                                }
                                $pastDay = $day->day;
                            @endphp
                            </strong> 
                        </div>
                        <div class="col-md-10 text-right">
                                {{ date("g:i a", strtotime( $day->start )) }} - {{ date("g:i a", strtotime( $day->end )) }}
                        </div>
                    </div>
                </li>
                
            @endforeach
            </ul>
        </div>

        {{-- Reviews --}}
        <div class="col-md-9">
            <h3 class="text-primary">Reviews</h3>

            {{-- Loop through all the reviews and pass into Vue components --}}
            @foreach ($reviews->reviews as $review)
                <review user="{{ $review->user->name }}" user_img="{{ $review->user->image_url }}" rating="{{ $review->rating }}"
                    text="{{ $review->text }}" url="{{ $review->url }}"></review>
                    <hr>
            @endforeach
        </div>
    </div>
</div>
@endsection