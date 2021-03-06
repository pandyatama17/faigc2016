@extends('layouts.bootstrap.container')

@section('page')
   <link rel="stylesheet" href="{{asset('plugins/steps/jquery.steps.css')}}">
   <link rel="stylesheet" href="{{asset('plugins/iCheck/all.css')}}">
   <link rel="stylesheet" href="{{asset('plugins/country-select/build/css/countrySelect.css')}}" media="screen">
   <link rel="stylesheet" href="{{asset('plugins/intlTelInput/build/css/intlTelInput.css')}}" media="screen">
   <link rel="stylesheet" href="{{asset('css/jquery.steps.custom.css')}}" media="screen">
   <link rel="stylesheet" href="{{asset('plugins/jquery-ui/jquery-ui.css')}}">
   <link rel="stylesheet" href="{{asset('plugins/jquery-ui/jquery-ui.structure.css')}}">
   <link rel="stylesheet" href="{{asset('plugins/jquery-ui/jquery-ui.theme.css')}}">
   <link rel="stylesheet" href="{{asset('plugins/swal/dist/sweetalert.css')}}">
   <script src="{{asset('plugins/jquery-ui/jquery-ui.js')}}" charset="utf-8"></script>
   <script src="{{asset('plugins/steps/jquery.steps.min.js')}}" charset="utf-8"></script>
   <script src="{{asset('plugins/validate/jquery.validate.min.js')}}" charset="utf-8"></script>
   <script src="{{asset('plugins/iCheck/icheck.min.js')}}" charset="utf-8"></script>
   <script src="{{asset('plugins/country-select/build/js/countrySelect.min.js')}}" charset="utf-8"></script>
   <script src="{{asset('plugins/intlTelInput/build/js/intlTelInput.min.js')}}" charset="utf-8"></script>
   <script src="{{asset('plugins/intlTelInput/build/js/utils.js')}}" charset="utf-8"></script>
   <script src="{{asset('plugins/autohidingnavbar/jquery.bootstrap-autohidingnavbar.min.js')}}" charset="utf-8"></script>
   <script src="{{asset('plugins/swal/dist/sweetalert.min.js')}}" charset="utf-8"></script>
   <script src="{{asset('plugins/form/jquery.form.js')}}" charset="utf-8"></script>
   <div class="col-lg-12">
      <form class="wizard wizard-big" id="registrationForm" method="post" action="{{url('registration/store')}}" enctype="multipart/form-data">
         <h1>Registration Type</h1>
         <fieldset>
            <h2>Registration Type</h2>
            <div class="col-md-12">
               <p>
                  Please note that part of the personal information below will appear on your delegate badge exactly as you have entered it.<br>
                  Fields marked with an asterisk <font class="red">*</font>are mandatory fields throughout the registration process.
               </p>
               @include('registration.forms.registype')
            </div>
         </fieldset>
         <h1>Personal Data</h1>
         <fieldset>
            <h2>Personal Data</h2>
            @include('registration.forms.personaldata')
         </fieldset>
         <h1>Dinner Reservation</h1>
         <fieldset>
            <h2>Dinner Reservation</h2>
            @include('registration.forms.dinner')
         </fieldset>
         <h1>Additional Attendees</h1>
         <fieldset>
            <h2>Additional Attendees</h2>
            @include('registration.forms.aditionalattendee')
         </fieldset>
         <h1>Hotel Reservation</h1>
         <fieldset>
            <h2>Hotel Reservation</h2>
            <p>
               @include('registration.forms.hotel')
            </p>
         </fieldset>
         <h1>Finish Registration</h1>
         <fieldset id="registrationRecord">
            <h2>Registration Record</h2>
         </fieldset>
         <input type="hidden" name="kontol" id="costinput" value="">
         <input type="hidden" name="_token" value="{{csrf_token()}}">
      </form>
      <div class="col-md-12">
         <div class="pull-left lead">Total Cost : <span id="totalcost"><span></div>
         <div class="pull-right">
            <input type="button" id="action-previous" class="btn btn-warning" value="Previous" onclick="$('#registrationForm').steps('previous');"/>
            <input type="button" id="action-next" class="btn btn-primary" value="Next" onclick="$('#registrationForm').steps('next');"/>
            <input type="button" id="action-finish" class="btn btn-success" value="Submit" onclick="$('#registrationForm').submit();"/>
         </div>
      </div>
   </div>

   <script src="{{asset('js/registration.steps.js')}}" charset="utf-8"></script>
   <script type="text/javascript">
     $(document).ready(function()
     {

         // $(".actions").append('<div class="pull-left lead">Total Cost : <span id="totalcost"><span></div>');
         @if(Session::has('registype'))
               if ({{Session::get('registype')}} == 1)
               {
                  cost = {{DB::table('member_types')->where('id','1')->pluck('cost')}};
               }
               else if ({{Session::get('registype')}} == 9)
               {
                  cost = {{DB::table('member_types')->where('id','9')->pluck('cost')}};
               }
               costSession = cost;
               console.log(costSession);
               $("#regist_tpye").val("{{Session::get('registype')}}");
               $("#totalcost").text(rupiah(cost));
               $("#costinput").val(cost);
         @endif

       var staticCost = "{{Session::get('cost')}}";

    });

    </script>
@endsection
