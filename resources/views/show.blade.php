@extends('layouts.app')
@section('content')
<div class="row">
  <div class="col-lg-12 col-md-12">
    <a href="/dashboard" class="btn btn-success text-white mb-2">Back</a>
    <div class="jumbotron text-left">

      <h2>{{ $listing->name }}</h2>
      <div class="card card-default p-3" style="width:40%">
        <p class="lead"> Email: {{ $listing->email }}</p>
        <p> <b>Description:</b> {{ $listing->bio }}</p>
        <p> <b>Address:</b> {{ $listing->address }}</p>
        <p> <b>phone:</b> {{ $listing->phone }}</p>
      </div>

    </div>
  </div>

</div>


@endsection
