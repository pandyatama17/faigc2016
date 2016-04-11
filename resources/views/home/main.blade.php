@extends('layouts.bootstrap.container')

@section('page')
<div class="row">
   <div class="col-md-12">
      @include('modules.slideshow')
   </div>
</div>

<div class="col-md-12 content-heading">
   <h4>WELCOME TO FAI GENERAL CONFERENCE 2016</h4>
</div>
<div class="clearfix">
   <br>
</div>
<div class="row">
      <br>
      <div class="col-md-5">
      <img src="{{asset('images/fasi_chairman.png')}}" class="img-responsive pull-left" style="width:30%;margin-right:10px"alt="FAIGC 2016" />
      {{-- <br> --}}
      <p class="justify">
         Dear Delegates , <br>
         As the president of Federasi Aero Sport Indonesia (FASI), I am pleased to receive the trust that has been given by FAI to FASI as the host of FAI General Conference 2016. Furthermore, it is also my pleasure to receive the FAI member delegates, FAI executive boards and Sport Commission members for the conference.<br>

            Since become a member of FAI in 1972, FASI has been receiving enormous support from FAI in developing air sports in Indonesia. Gliding, Hang Gliding, Paragliding, Parachuting, Aeromodelling are air sports that have been included in Indonesia  National Sport Games (PON) which is organized in every four years together with other olympic sports. Other air sports such Paramotor,  Microlight, Aerobatics, General aviation, Amateur built and experimental aircraft are growing as well in Indonesia; and soon the sport of Ballooning will join FASI.<br>

            In 2018 Indonesia will be the host of Asian Games, the ultimate multi sport event in Asia. It is our mission to put air sport as one of the sport in Asian Games 2018.  Since last year FASI has been putting huge effort with Indonesia Olympic Committee to influence Olympic Committee of Asia (OCA) and its members to accept paragliding to represent air sport in Asian games 2018.<br>

            For the location of the conference, Bali is representing Indonesia as the world’s largest archipelago. Indonesia has numerous ideal and beautiful sites for air sport. Whether for competition or for leisure flying  many flying sites in Indonesia are ready to be explored. Therefore I hope that there would be many other international championship that could be taking place in Indonesia or as aerosport activities destination.<br>

            At the end, it is my highest hope that FAI General Conference 2016 would be held successfully. I wish you will have pleasant conference and enjoy the beauty of Bali as one of world’s prime destination for tourism.
            <br>
            <span class="pull-left">
               <br><br>
               <span class="pull-left">Agus Supriatna</span>
               <br>
               President Federasi Aero Sport Indonesia. (FASI)
            </span>
            <br><br>
            <br><br>
      </p>
      <div class="clearfix"></div>
   </div>
   <div class="col-md-5" style="border-left:1px solid grey">
      <img src="{{asset('images/fai_chairman.png')}}" class="img-responsive pull-left" style="width:30%;margin-right:10px"alt="FAIGC 2016" />
      {{-- <br> --}}
      <p class="justify">
         Dear Delegates, <br>
         The 110th FAI General Conference will be held on the “island of God”, Bali, Indonesia. <br>
         As FAI President, I really look forward to meeting you all there. I know you will enjoy the beauty and friendliness of this island! <br>
            As FAI’s supreme body, the General Conference is the right and proper place to develop and determine the future strategy and structure of our Federation and to make our air sports flourish and become more visible. Your participation will be an invaluable contribution to decisions of long-lasting importance. <br>
            In addition, it will also give you the opportunity to exchange ideas during informal discussions outside of the formal sessions; to get to know the members of the Executive Board and our staff, and for them a chance to meet you on a more personal level. <br>
            2016 will be a thrilling year for the Federation. Numerous championships, records, meetings and above all the review of the World Air Games and the preparation of the next edition. <br>
            The evening before the opening of the Conference, we will hold one of the highlights of the year: the 2015 (2016?) FAI Awards Ceremony, during which we will celebrate the achievements of key contributors to aeronautics and astronautics. All prestigious FAI Awards and Diplomas, as well as the FAI-Breitling Awards will be presented. <br>
            We will, again this year organise topical workshops that will take place on Thursday. These will give you a better insight into the on-going projects and the opportunity, in small groups, to discuss ideas and opinions on specific issues such as anti-doping, sporting licences and finances.<br>
            In conclusion, I would like to warmly thank FEDERASI AERO SPORT INDONESIA for its hard work and organizational skills in preparing for this Conference, which will undoubtedly be a memorable occasion. <br>
            We also hope that the FAI Conference will give you an opportunity to discover the wonderful country that is the Indonesia. <br>
            Considering this will be my last FAI General Conference as your President I really look forward to meeting you all! <br>
            I wish you a successful Conference and an enjoyable time in the tropical paradise of Bali!<br>
            <span class="pull-left">
               <br><br>
               <span class="pull-left">Dr. Jhon  Grubbstrom</span>
               <br>
               FAI President
            </span>
      </p>
      <div class="clearfix"></div>
   </div>
   <div class="col-md-2">
      <div class="row">
         <div class="panel panel-default">
            <div class="panel-heading">
               FAIGC2016BALI on Instagram
            </div>
            <div class="panel-body ad">
               @include('modules.instagram')
            </div>
         </div>
      </div>
      <div class="row" style="height:50%">
         <div class="panel panel-default">
            <div class="panel-body twitter">
               @include('modules.twitter')
            </div>
         </div>
      </div>
   </div>
</div>
<br><br>
<script type="text/javascript">
   document.title = "FAI GENERAL CONFERENCE 2016 BALI | Home"
</script>
@endsection
