@extends('layouts.modules.registration')

@section('page')
   <link rel="stylesheet" href="{{asset('plugins/jquery-ui/jquery-ui.css')}}">
   <link rel="stylesheet" href="{{asset('plugins/jquery-ui/jquery-ui.structure.css')}}">
   <link rel="stylesheet" href="{{asset('plugins/jquery-ui/jquery-ui.theme.css')}}">
   <script src="{{asset('plugins/jquery-ui/jquery-ui.js')}}" charset="utf-8"></script>
   <script src="{{asset('plugins/jquery-validation/dist/jquery.validate.min.js')}}"></script>
   {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.15.0/jquery.validate.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.15.0/additional-methods.min.js"></script> --}}
   <div class="col-md-12 col-xs-12">
      <center>
         <div class="fwizard">
           <a @if($step == 'regtype')class="current" @endif>New Registration</a>
           <a @if($step == 'personal_data')class="current" @endif>Personal Data</a>
           <a @if($step == 'programs')class="current" @endif>Dinner Reservation</a>
           <a @if($step == 'subatendee')class="current" @endif>Aditional Atendees</a>
           <a @if($step == 'hotel')class="current" @endif>Hotel Reservation</a>
           <a @if($step == 'payment')class="current" @endif>Payment</a>
           <a current="last"@if($step == 'record')class="current" @endif>Registration Record</a>
        </div>
     </center>
   </div>
<br><br>
<br><br>
   <div class="col-md-8 col-md-offset-2 col-xs-12">
      @yield('content')
   </div>
   <script type="text/javascript">
   function rupiah(nStr)
{
   nStr += '';
   x = nStr.split('.');
   x1 = x[0];
   x2 = x.length > 1 ? '.' + x[1] : '';
   var rgx = /(\d+)(\d{3})/;

   while (rgx.test(x1))
   {
      x1 = x1.replace(rgx, '$1' + '.' + '$2');
   }

   return "IDR " + x1 + x2 +",00";
}
   </script>
@endsection
