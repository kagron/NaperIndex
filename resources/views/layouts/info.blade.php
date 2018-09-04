@extends('layouts.master')

@section('content')
@include('layouts.nav2')
<div class="container" style="padding-top: 80px">
    <div class="row">
        <div class="col-md-9 p-2">
            <h1 class="text-primary">{{ $httpResponse->name }}</h1>
            <p>{{ $httpResponse->rating }}. {{ $httpResponse->review_count }} reviews</p>
            <p>@php
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
        <div class="col-md-3 p-2">
            <h4>{{ $httpResponse->display_phone }}</h4>
            <p>{{ $httpResponse->location->address1 }}</p>
            <p>{{ $httpResponse->location->city }}, {{ $httpResponse->location->state }}</p>
        </div>
    </div>
    <div class="row">
        @for($i = 0; $i < 3; $i++)
        <div class="col-md-4">
            <img src="{{ $httpResponse->photos[$i] }}" alt="{{ $httpResponse->name }}" class="img-fluid img-thumbnail">
        </div>
        @endfor
    </div>
    <h3 class="text-primary">Reviews</h3>
    @foreach ($reviews->reviews as $review)
        <review user="{{ $review->user->name }}" user_img="{{ $review->user->image_url }}" rating="{{ $review->rating }}"
            text="{{ $review->text }}" url="{{ $review->url }}"></review>
            <hr>
    @endforeach
</div>
@endsection