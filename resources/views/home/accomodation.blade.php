@extends('layouts.bootstrap.container')
@section('page')
   <style media="screen">
      .jumbotron
      {
         background: url("{{asset('images/accomodation/WestinCover.jpg')}}");
         background-size: cover;
         width: 100%;
         height: 50%;
         padding-top: 20px;
      }
      .jumbotron > h1
      {
         text-shadow: 0 0 10px #FFF;
         /*color: #FFF;*/
         font-size: 40pt;
      }
   </style>
   <div class="jumbotron">
      <h1 class="pull-right">Westin Resort Nusa Dua Bali</h1>
   </div>
   <p class="lead">
      Nestled on a white sandy beach on Bali’s southern coast,<br>The Westin Nusa Dua is a luxury resort that provides you with a rejuvenating haven with all you need to be at your best.<br> If you are looking for the ideal choice of a 5-star hotel in this part of the world, this exceptionally lavish hotel in Nusa Dua is indeed the perfect fit.
   </p>
   {{-- <a href="http://www.westinnusaduabali.com" target="_blank">Website</a> --}}
   <div class="clearfix"></div>
   <br><br>
   <ul class="row thumbnails">
  <li class="col-lg-2 col-md-2 col-sm-3 col-xs-4">
     <img src="{{asset('images/accomodation/Aerial-View.jpg')}}" alt="Aerial View" class="img-responsive" />
  <br></li>
  <li class="col-lg-2 col-md-2 col-sm-3 col-xs-4">
     <img src="{{asset('images/accomodation/BICC-Nusantara-Room_lg.jpg')}}" alt="Aerial View" class="img-responsive" />
  <br></li>
  <li class="col-lg-2 col-md-2 col-sm-3 col-xs-4">
     <img src="{{asset('images/accomodation/MainPool.jpg')}}" alt="Aerial View" class="img-responsive" />
  <br></li>
  <li class="col-lg-2 col-md-2 col-sm-3 col-xs-4">
     <img src="{{asset('images/accomodation/wes35ag.77497_lg.jpg')}}" alt="Aerial View" class="img-responsive" />
  <br></li>
  <li class="col-lg-2 col-md-2 col-sm-3 col-xs-4">
     <img src="{{asset('images/accomodation/wes35br.57017_lg.jpg')}}" alt="Aerial View" class="img-responsive" />
  <br></li>
  <li class="col-lg-2 col-md-2 col-sm-3 col-xs-4">
     <img src="{{asset('images/accomodation/wes35br.77466_lg.jpg')}}" alt="Aerial View" class="img-responsive" />
  <br></li>
  <li class="col-lg-2 col-md-2 col-sm-3 col-xs-4">
     <img src="{{asset('images/accomodation/wes35gr.139720_lg.jpg')}}" alt="Aerial View" class="img-responsive" />
  <br></li>
  <li class="col-lg-2 col-md-2 col-sm-3 col-xs-4">
     <img src="{{asset('images/accomodation/wes35gr.991691_lg.jpg')}}" alt="Aerial View" class="img-responsive" />
  <br></li>
  <li class="col-lg-2 col-md-2 col-sm-3 col-xs-4">
     <img src="{{asset('images/accomodation/wes35gr.1103632_lg.jpg')}}" alt="Aerial View" class="img-responsive" />
  <br></li>
  <li class="col-lg-2 col-md-2 col-sm-3 col-xs-4">
     <img src="{{asset('images/accomodation/wes35re.77491_lg.jpg')}}" alt="Aerial View" class="img-responsive" />
  <br></li>
  <li class="col-lg-2 col-md-2 col-sm-3 col-xs-4">
     <img src="{{asset('images/accomodation/wes35re.123626_lg.jpg')}}" alt="Aerial View" class="img-responsive" />
  <br></li>
</ul>
<div class="modal fade" id="galleryModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body"> </div>
    </div>
  </div>
</div>
<script src="{{asset('plugins/photo-gallery/photo-gallery.js')}}" charset="utf-8"></script>
<script type="text/javascript">
   document.title = "FAI GENERAL CONFERENCE 2016 BALI | Accomodation"
</script>
@endsection
