@extends('layouts.bootstrap.container')

@section('page')
   <h4 class="header">CONFERENCE PROGRAM</h4>
   <div class="row">
      <div class="col-sm-12 col-md-6">
         <div class="thumbnail">
            <img src="{{asset('images/programs/1.jpg')}}" alt="Gala Dinner">
            <div class="caption">
               <h3>Gala Dinner</h3>
               <p></p>
            </div>
         </div>
      </div>
      <div class="col-sm-12 col-md-6">
         <div class="thumbnail">
            <img src="{{asset('images/programs/2.jpg')}}" alt="Amazing Bali City Tour">
            <div class="caption">
               <h3>Amazing Bali City Tour</h3>
               <p>Bali is magical. As probably the most famous island in Indonesia, Bali blends spectacular mountain scenery and beautiful beaches with warm and friendly...</p>
            </div>
         </div>
      </div>
   </div>
   <div class="row">
      <div class="col-sm-12 col-md-6 col-md-offset-3">
         <div class="thumbnail">
            <img src="{{asset('images/programs/3.jpg')}}" alt="Conference">
            <div class="caption">
               <h3>Conference</h3>
               <p></p>
            </div>
         </div>
      </div>
   </div>
   <script type="text/javascript">
      document.title = "FAI GENERAL CONFERENCE 2016 BALI | Conference Program"
   </script>
@endsection
