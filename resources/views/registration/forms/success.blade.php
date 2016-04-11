@extends('layouts.bootstrap.container')

@section('page')
   <link rel="stylesheet" href="{{asset('plugins/swal/dist/sweetalert.css')}}">
   <div class="col-md-8 col-md-offset-2">
      <center><h1>Registration Success!</h1></center>
      <br>
      <p>
         you have been registered with the following record:
      </p>
      <div class="mail-wrapper"  style="color:#092567; font-size:14pt;">
         <p>
            <h2 class="header" style="color:#092567; margin-bottom:0px;">Confirmation</h2>

            <h3 style="color:#1292DC; margin-top:0px;">110<sup>th</sup> FAI Conference, Bali – Indonesia</h3>
            <br>
            Dear {{$rs->title}} {{$rs->first_name}} {{$rs->family_name}},
            <br><br>

            Thank you for registering to attend the 110<sup>th</sup>  FAI Conference on 13<sup>th</sup> &ndash; 15<sup>th</sup> 2016
            <br><br>
            Your registration identification is : <span style="color:black;text-decoration:underline; -moz-text-decoration-color: #092567; text-decoration-color: #092567;"><b>{{$rs->key}}</b></span>. 
            <br><br>
            Please continue with the payment process. If you choose to make the
            <br>
            payment with bank transfer please mention your registration
            <br>
            identification code into the Bank transfer form.
            <br><br>
            <span class="red">Time limit for early payment is before 1<sup>st</sup> of July 2016</span>
            <br><br>
            your payment link is <u><strong><a href="{{url('payment/dopayment&id='.$rs->id)}}">{{url('payment/dopayment&id='.$rs->id)}}</a></strong></u>
            <br><br>
            We will send you an email of payment confirmation after we received
            <br>
            your payment
            <br><br>
            We look forward to seeing you at Bali.
            <br><br><br>
            Best regards,
            <br>
            <span style="color:#1292DC; ">Committee of <b>110<sup>th</sup> FAI Conference, Bali – Indonesia</b></span>
            <br><br>
         </p>
      </div>
      {{-- <a href="{{url('payment/dopayment&id='.$rs->id)}}" class="btn btn-primary pull-right">Continue to payment</a>
      &nbsp;
      <a class="btn btn-danger" id="payment-later">Later</a> --}}
   </div>
   <script src="{{asset('plugins/swal/dist/sweetalert.min.js')}}" charset="utf-8"></script>
   <script type="text/javascript">
      $(document).ready(function()
      {
         $("#payment-later").click(function()
         {
            swal({
               title :  "Are you sure?",
               text  :  "Continue Payment later? we will email you a link to complete your payment",
               type  :  "warning",
               confirmButtonColor: "#D9534F",
               confirmButtonText: "Ok",
               closeOnConfirm: false
            },function()
            {
               window.location.replace("/payment/later&id={{$rs->id}}");
            })
         });
      });

   </script>
@endsection
