<div class="row">
   <div class="col-md-12">
      <div class="jumbotron jumbotron-custom" >
         <img src="{{asset('images/programs/1.jpg')}}" alt="Gala Dinner" class="img-responsive feed-image"/>
         <div class="feed-caption">
             Gala Dinner
         </div>
      </div>

   </div>
</div>
<br>
<div class="row">
   <div class="col-md-12">
      <div class="jumbotron jumbotron-custom" >
         <img src="{{asset('images/programs/2.jpg')}}" alt="Amazing Bali City Tour" class="img-responsive feed-image"/>
         <div class="feed-caption">
            Amazing Bali City Tour
         </div>
      </div>

   </div>
</div>
<br>
<div class="row">
   <div class="col-md-12">
      <div class="jumbotron jumbotron-custom" >
         <img src="{{asset('images/programs/3.jpg')}}" alt="Working Session (Conference)" class="img-responsive feed-image"/>
         <div class="feed-caption">
            Working Session (Conference)
         </div>
      </div>
      
   </div>
</div>
<?php
   // $programs = [
   //       [
   //          'id'=>'1',
   //          'title'=> 'Gala Dinner',
   //          'description'=>'gala dinner is a fun apalah terserah lu gua gak peduli mau lu berak kek, lu mau ngompol kek raurus lah gua'
   //       ],
   //       [
   //          'id'=>'2',
   //          'title'=> 'Amazing Bali City Tour',
   //          'description'=>'Bali is magical. As probably the most famous island in Indonesia. tapi gua tetep gapeduli :p'
   //       ],
   //       [
   //          'id'=>'3',
   //          'title'=> 'Working Session (Conference)',
   //          'description'=>'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'
   //       ]
   //    ]
?>
{{-- @foreach($programs as $program)
   <div class="row">
      <div class="col-md-12">
         <div class="jumbotron jumbotron-custom" >
            <img src="{{asset('images/programs/'.$program['id']'.jpg')}}" alt="{{$program['title']}}" class="img-responsive feed-image"/>
            <div class="feed-caption">
                {{$program['title']}}
            </div>
         </div>
         <div class="program-content">
            {{$program['description']}}
         </div>
         <a href="#"> read more ></a>
      </div>
   </div>
@endforeach --}}
