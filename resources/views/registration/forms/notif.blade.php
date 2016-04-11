@extends('layouts.bootstrap.container')

@section('page')
   <h1 class="text-center">Payment Successful, thank you for registering</h1>
   <div class="text-center">
      <a href="{{url('home')}}" class="btn btn-primary">Redirect to Home</a>
   </div>
@endsection
