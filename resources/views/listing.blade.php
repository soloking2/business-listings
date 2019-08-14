@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Welcome</div>

                <div class="card-body">
                    <div class="card card-default p-3">
                      <h3>Listings</h3>
                        @if(count($list))
                          <ul class="list-group">
                            @foreach($list as $lists)
                              <li class="list-group-item"><a class="btn btn-default text-secondary" href="/listing/{{ $lists->id }}"> {{ $lists->name }}</a></li>
                            @endforeach
                          </ul>
                          @else
                          <p>No listings found</p>
                        @endif
                      </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
