@extends('registration.new.main')

@section('content')

   <form class="form-horizontal" action="index.html" method="post">
      <h1 class="header">Payment</h1>
      <span class="lead">Total Cost : IDR.{{number_format(Session::get('cost'),2,',','.')}}</span>
      <br><br>
      <div class="form-group">
         <label class="col-sm-3 control-label">Payment Method<span class="red">*</span></label>
         <div class="col-sm-9">
            <select class="form-control" name="">
               <option value="transfer">Manual Transfer</option>
               <option value="doku">Credit Card</option>
            </select>
            <span class="help-block">select your payment Method   </span>
         </div>
      </div>
      <br>
      <div class="col-md-12" id="dokupayment-container">
         <center>
            <div class="col-md-6 col-md-offset-3">
               <img src="{{asset('images/transparent-logo-visa.png')}}" alt="Visa LOGO" class="img-responsive"/>
            </div>
         </center>
      </div>
      <div class="col-md-12" id="transfer-container">
         <table class="table">
            <tr>
               <td><b>Account Number</b></td>
               <td>283983893298717172</td>
            </tr>
            <tr>
               <td><b>Bank Account</b></td>
               <td>BCA</td>
            </tr>
         </table>
         <p class="help-block">
            please confirm your payment by email to <br> <a href="mailto:secretariat@faigc2016bali.com" class="lead" style="color:#092567">secretariat@faigc2016bali.com</a><br> after your transfer is complete
         </p>
      </div>
      <div class="clearfix"></div>
      <ul class="pager wizard">
           <li class="previous"><a href="#">Previous</a></li>
           <li class="next"><a href="{{url('register/new/success')}}">Next</a></li>
        </ul>
   </form>
   <script type="text/javascript">
   $(document).ready(function() {
      $('#dokupayment-container').hide();

      $('select').change(function()
      {
         if($(this).val() == 'doku')
         {
            $('#dokupayment-container').show();
            $('#transfer-container').hide();
         }
         else if ($(this).val() == 'transfer')
         {
            $('#dokupayment-container').hide();
            $('#transfer-container').show();
         }
      });
   });

   </script>
@endsection
