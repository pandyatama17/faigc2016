@extends('layouts.bootstrap.container')
@section('page')
   <ul class="row thumbnails">
   @for($i=1; $i < 10 ; $i++)
      <li class="col-lg-2 col-md-2 col-sm-3 col-xs-4">
         <img src="{{asset('images/gallery/image'.$i.'.jpg')}}" alt="Gallery {{$i}}" class="img-responsive" />
         <br>
      </li>
   @endfor
   </ul>
   <div class="modal fade" id="galleryModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
     <div class="modal-dialog">
       <div class="modal-content">
         <div class="modal-body"><center> </center></div>
       </div>
     </div>
   </div>
<script src="{{asset('plugins/photo-gallery/photo-gallery.js')}}" charset="utf-8"></script>
<script type="text/javascript">
   document.title = "FAI GENERAL CONFERENCE 2016 BALI | Gallery"
</script>
@endsection
