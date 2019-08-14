@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-lg-8 mx-auto">
<div class="card">
  <h3 class="card-header">Create Listings <span class="float-right"><a href="/dashboard" class="btn btn-warning text-secondary">Back to Dashboard</a></span></h3>
  <form action="{{ route('listing.update', [$listing->id])}}" method="post" class="p-4">
    {{ csrf_field() }}
    <input type="hidden" name="_method" value="put">
    <div class="form-group">
      <label for="company-name">Company Name</label>
      <input type="text" name="name" class="form-control" spellcheck="false" value="{{ $listing->name }}" placeholder="Enter Company Name">
    </div>
    <div class="form-group">
      <label for="company-email">Email</label>
      <input type="email" name="email" class="form-control" spellcheck="false" value="{{ $listing->email }}" placeholder="Enter Company Email">
    </div>
    <div class="form-group">
      <label for="phone">Company Phone</label>
      <input type="text" name="phone" class="form-control" spellcheck="false" value="{{ $listing->phone }}" placeholder="Enter Company Phone">
    </div>
    <div class="form-group">
      <label for="address">Company's Address</label>
      <input type="text" name="address" class="form-control" spellcheck="false" value="{{ $listing->address }}" placeholder="Enter Company's Address">
    </div>
    <div class="form-group">
      <label for="bio">Company Bio</label>
      <textarea name="bio" rows="3" cols="80" class="form-control" placeholder="About Your Business">{{ $listing->bio }}</textarea>
    </div>
    <div class="form-group">
      <input type="submit" name="sub" class="form-control btn btn-primary" value="Submit">
    </div>

  </form>
</div>
</div>
</div>


@endsection
