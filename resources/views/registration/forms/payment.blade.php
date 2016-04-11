@extends('layouts.bootstrap.container')

@section('page')
   <div class="container-fluid">
      <span class="lead">Total Cost : <span id="cost">IDR. {{number_format($m->cost,0,',','.')}},-</span></span>
      <span id="cc_help-block" class="help-block">this includes 3.65% admin fee</span>
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
               <td>166 000 140 237 9</td>
            </tr>
            <tr>
               <td><b>Address</b></td>
               <td>Halim Perdana Kusuma Airport Jakarta Timur, Indonesia.</td>
            </tr>
            <tr>
               <td><b>Switch Code</b></td>
               <td>BMRIIDJA</td>
            </tr>
            <tr>
               <td><b>Bank</b></td>
               <td>BANK MANDIRI</td>
            </tr>
            <tr>
               <td>Brand Office</td>
               <td>Halim Perdana Kusuma</td>
            </tr>
         </table>
         <p class="help-block">
            please confirm your payment by email to <br> <a href="mailto:secretariat@faigc2016bali.com" class="lead" style="color:#092567">secretariat@faigc2016bali.com</a><br> after your transfer is complete
         </p>
      </div>
   </div>

    <script type="text/javascript">
   $(document).ready(function() {
      $('#dokupayment-container').hide();

      var cc_cost = "{{Session::get('cc_cost')}}";
      var normalcost = "{{$m->cost}}";

      $("#cc_help-block").html("<span class='red'>*</span>additional charge fee depends on your bank account");

      $('select').change(function()
      {
         if($(this).val() == 'doku')
         {
            $('#dokupayment-container').show();
            $('#transfer-container').hide();
            $("#cost").text(rupiah(cc_cost));
            $("#cc_help-block").html("<span class='red'>*</span>this includes admin charge fee");
         }
         else if ($(this).val() == 'transfer')
         {
            $('#dokupayment-container').hide();
            $('#transfer-container').show();
            $("#cost").text(rupiah(normalcost));
            $("#cc_help-block").html("<span class='red'>*</span>additional charge fee depends on your bank account");
         }
      });
   });
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

     return "IDR. " + x1 + x2 +",-";
   }
   </script>
@endsection
