@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard <span class="float-right"><a href="/listing/create" class="btn btn-success text-white">Add Listing</a></span></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="card card-default p-3">
                      <h3>Listings</h3>
                      <table class="table table-stripped">
                        @if(count($listing))
                          <tr>
                            <th>Companies</th>
                            <th></th>
                            <th></th>
                          </tr>
                          @foreach($listing as $listings)
                            <tr>
                              <td><a href="/listing/{{ $listings->id }}" class="text-secondary" style="font-weight:bold;">{{ $listings->name }}</a></td>
                              <th><a href="/listing/{{ $listings->id }}/edit" class="btn btn-default text-secondary">Edit</a></th>
                              <th><a href="#" class="btn btn-default text-secondary" onclick="
                                  var result = confirm('Are you sure you want to delete this Listing?');
                                  if(result){
                                    event.preventDefault();
                                    document.getElementById('delete-form').submit();
                                  };
                                ">Delete</a>
                                <form id="delete-form" action="{{ route('listing.destroy', [$listings->id ])}}" method="post">
                                  {{ csrf_field() }}
                                  <input type="hidden" name="_method" value="delete">
                                </form>
                              </th>
                            </tr>
                          @endforeach
                        @endif
                      </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
