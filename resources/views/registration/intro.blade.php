@extends('layouts.modules.registration')

@section('page')
   <h2>Welcome to the online registration for FAI General Conference 2016</h2>
   {{-- <br> --}}
   <h4>Nusa Dua, Bali, Indonesia October, 13-15, 2016</h4>
   <br>
   <p>
      Registration and hotel reservation for FAI 2016 are done in a few simple, consecutive steps.
      <br><br>
      Just follow the instructions appearing on your screen to go through the registration process smoothly.
      <br><br>
      When you have finalized your registration, you will receive an automatic email confirmation within a few minutes. If you do not receive a confirmation email, please contact the FAI Conference Secretariat (<a href="#">info@faigc2016bali.com</a>).
   </p>
   <br><br>
   <div class="col-md-2 col-md-offset-5">
      <a href="{{url('registration')}}" class="btn btn-lg btn-primary">New Registration</a>
   </div>
@endsection
