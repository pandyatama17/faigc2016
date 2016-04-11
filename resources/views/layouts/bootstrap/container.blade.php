<head>
   @include('layouts.bootstrap.head')
</head>
<body>
   <div id="preloader"></div>

   <nav class="navbar navbar-inverse navbar-custom navbar-fixed-top" id="mainNavbar">
      <div class="page-heading">
         <div class="container" id="pageHeadingContainer">
            <h4>
               <a href="{{url()}}">
                  {{-- <span class="fai">FAI</span> <span class="text-white">GC 2016 BALI</span> --}}
                  <img src="{{asset('images/logo-heading.png')}}" class="heading-icon" alt="" />
               </a>
            </h4>
         </div>
      </div>
     <div class="container" id="mainNavbarContainer">
       <div class="navbar-header">
         <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
           <span class="icon-bar"></span>
           <span class="icon-bar"></span>
           <span class="icon-bar"></span>
         </button>
       </div>
       <div class="collapse navbar-collapse" id="myNavbar">
         <ul class="nav navbar-nav">
           <li @if($pagin == 'home') class="active" @endif>
              <a href="{{url('home')}}">Home</a>
           </li>
           <li class="dropdown">
             <a class="dropdown-toggle" data-toggle="dropdown" href="#">Program <span class="caret"></span></a>
             <ul class="dropdown-menu">
                <li><a href="{{url('program')}}">Conference Program</a></li>
                <li><a href="{{url('schedule')}}">Conference Schedule</a></li>
                <li><a href="http://www.aerotravel.co.id/en/tour/bali-tour-kintamani-3-days-2-nights.html" onclick="window.open($(this).attr('href'), 'newwindow', 'width=800, height=800'); return false;">Other Activity and City Tour</a></li>
             </ul>
           </li>
           <li @if($pagin == 'accomodation') class="active" @endif >
              <a href="{{url('accomodation')}}">Accomodation</a>
           </li>
           <li @if($pagin == 'registration') class="active" @endif>
              <a href="{{url('register')}}">Registration</a>
           </li>
           <li @if($pagin == 'gallery') class="active" @endif>
              <a href="{{url('gallery')}}">Gallery</a>
           </li>
           <li @if($pagin == 'contact') class="active" @endif>
              <a href="{{url('contact')}}">Contact Us</a>
           </li>
           <li @if($pagin == 'participants') class="active" @endif>
             <a href="{{url('participants')}}">Participants</a>
         </li>
         </ul>
         <ul class="nav navbar-nav navbar-right countdown-panel">
            <li class="countdown-panel"><a href="#">Registration Until:  <span id="countdown"></span></a></li>
          </ul>
       </div>
     </div>
   </nav>
<br><br><br><br>
<br><br><br><br>
<div class="clearfix"></div>
<div class="container" style="height:100%">
   @yield('page')
</div>
<br><br><br><br>
<div class="clearfix"></div>
@include('layouts.bootstrap.footer')
</body>
<script type="text/javascript">
$(document).ready(function() {
   var d = new Date('2016-10-13T12:00:00');
   // d.setMinutes(d.getMinutes() + 30);
   $('#countdown').tinyTimer({ to: d, format: '<span class="label label-faigc text-right">%d D</span> &nbsp;<span class="label label-faigc text-right">%h hrs</span>&nbsp;<span class="label label-faigc text-right">%m mins</span>&nbsp;<span class="label label-faigc text-right">%s sec</span>' });

    $('[data-toggle="tooltip"]').tooltip({html: true});

    $("#preloader").hide();
});

</script>
