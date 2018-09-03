@extends('layouts.master')

@section('content')
@include('layouts.nav2')
<div class="container" style="padding-top: 100px">
<pre>
 <?php print_r( $httpResponse->businesses) ?>
</pre>
</div>
@endsection