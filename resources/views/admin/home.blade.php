@extends('layouts.admin')

@section('title')
  | Dashboard
@endsection

@section('content')
<div class="container">
  <h2 class="fs-4 my-4">Dashboard</h2>

  <div class="row justify-content-center">
      <div class="col">
          <div class="card">
              <div class="card-header">{{ __('User Dashboard') }}</div>

              <div class="card-body">
                  @if (session('status'))
                  <div class="alert alert-success" role="alert">
                      {{ session('status') }}
                  </div>
                  @endif

                  <p>Welcome to your admin area <span class="fw-semibold">{{ Auth::user()->name }}</span> !</p>

              </div>
          </div>
      </div>
  </div>
</div>
@endsection
