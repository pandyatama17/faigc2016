@extends('layouts.bootstrap.container')

@section('page')
   <script src="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/icheck.min.js" charset="utf-8"></script>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/skins/all.css">
   <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
   <div class="container-fluid">
      <span class="lead">Total Cost : <span id="cost">IDR. {{number_format($m->cost,0,',','.')}},-</span></span>
      <span id="cc_help-block" class="help-block">this includes 3.65% admin fee</span>
      <br><br>
      <div class="form-group">
         <label class="col-sm-2 control-label">Payment Method<span class="red">*</span></label>
         <div class="col-sm-10">
            {{-- <select class="form-control" name="">
               <option value="transfer">Manual Transfer</option>
               <option value="doku">Credit Card</option>
            </select> --}}
            <label class="radio-inline">
               <input type="radio" id="radio-transfer" name="radio-payment" data-show="transfer-container" class="flat-green" value="transfer" checked>
               Manual Transfer
            </label>
            <label class="radio-inline">
               <input type="radio" id="radio-doku" name="radio-payment" data-show="dokupayment-container" class="flat-green" value="doku">
               Credit Card
            </label>
            <span class="help-block">select your payment Method   </span>
         </div>
      </div>
      <br><br><br><br>
      <div class="clearfix"></div>
      <div class="col-md-12" id="dokupayment-container">
         <center>
            <?php
         	$transidmerchant = str_random(10);
         ?>
            <div class="col-md-6 col-md-offset-3">
               <FORM NAME="order" METHOD="Post" ACTION="https://apps.myshortcart.com/payment/request-payment/" >
            		<input type=hidden name="BASKET" value="FAIGC 2016 Bali Registration,{{Session::get('cc_cost')}}.00,1,{{Session::get('cc_cost')}}.00;">
            		<input type=hidden name="STOREID" value="00329488">
            		<input type=hidden name="TRANSIDMERCHANT" value="{{$transidmerchant}}">
            		<input type=hidden name="AMOUNT" value="{{Session::get('cc_cost')}}.00">
            		<input type=hidden name="URL" value="http://dev.faigc2016bali.com">
            		<input type=hidden name="WORDS" value="{{sha1(Session::get('cc_cost').'.00'.'d9R2g8E6B3r5'.$transidmerchant)}}">
            		<input type=hidden name="CNAME" value="{{$m->name}}">
            		<input type=hidden name="CEMAIL" value="{{$m->email}}">
            		<input type=hidden name="CWPHONE" value="{{str_replace("+", "", $m->mobile)}}">
            		<input type=hidden name="CHPHONE" value="{{str_replace("+", "", $m->mobile)}}">
            		<input type=hidden name="CMPHONE" value="{{str_replace("+", "", $m->mobile)}}">
            		<input type=hidden name="CADDRESS" value="{{$m->address_line_1}}">
            		<input type=hidden name="CZIPCODE" value="{{$m->zip}}">
            		<input type=hidden name="BIRTHDATE" value="">
            		<input type=hidden name="CCITY" value="{{$m->city}}">
            		<input type=hidden name="CSTATE" value="">
            		<input type=hidden name="CCOUNTRY" value="{{strtoupper($m->country)}}">
            		<input type=hidden name="SADDRESS" value="">
            		<input type=hidden name="SZIPCODE" value="">
            		<input type=hidden name="SCITY" value="">
            		<input type=hidden name="SSTATE" value="">
            		<input type=hidden name="SCOUNTRY" value="">
         		</FORM>
               <img src="{{asset('images/transparent-logo-visa.png')}}" alt="Visa LOGO" class="img-responsive" onclick="$('form').submit()"/>
            </div>
         </center>
      </div>
      <div class="col-sm-10 col-sm-offset-2" id="transfer-container">
         <table class="table">
            <tr>
               <td><b>Account Number</b></td>
               <td>166 000 140 237 9</td>
            </tr>
            <tr>
               <td><b>Account Holder</b></td>
               <td>PT. Arfa Kreasi Expotama</td>
            </tr>
            <tr>
               <td><b>Address</b></td>
               <td>Halim Perdana Kusuma Airport Jakarta Timur, Indonesia.</td>
            </tr>
            <tr>
               <td><b>Swift Code</b></td>
               <td>BMRIIDJA</td>
            </tr>
            <tr>
               <td><b>Bank</b></td>
               <td>BANK MANDIRI</td>
            </tr>
            <tr>
               <td><b>Branch Office</b></td>
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

      $("#cc_help-block").html("<span class='red'>*additional charge fee depends on your bank account</span>");

      $('input[type=radio]').iCheck({
          checkboxClass: 'icheckbox_flat',
          radioClass: 'iradio_flat'
        });

      $('#radio-transfer').on('ifChecked', function()
      {
         $('#dokupayment-container').hide("slide", { direction: "down" },500,function()
         {
            $('#transfer-container').show("slide", { direction: "down" },500);
         });
         $("#cost").text(rupiah(normalcost));
         $("#cc_help-block").html("<span class='red'>*additional charge fee depends on your bank account</span>");
      });
      $('#radio-doku').on('ifChecked', function()
      {
         $('#transfer-container').hide("slide", { direction: "down" },500,function()
         {
            $('#dokupayment-container').show("slide", { direction: "down" },500);
         });
         $("#cost").text(rupiah(cc_cost));
         $("#cc_help-block").html("<span class='red'>*3.63% of credit card admin charge is included</span>");
      });
      $('select').change(function()
      {
         if($(this).val() == 'doku')
         {
            $('#transfer-container').hide("slow",function()
            {
               $('#dokupayment-container').show('slow');
            });
            $("#cost").text(rupiah(cc_cost));
            $("#cc_help-block").html("<span class='red'>*3.63% of credit card admin charge is included</span>");
         }
         else if ($(this).val() == 'transfer')
         {
            $('#dokupayment-container').hide("slow",function()
            {
               $('#transfer-container').show('slow');
            });
            $("#cost").text(rupiah(normalcost));
            $("#cc_help-block").html("<span class='red'>*additional charge fee depends on your bank account</span>");
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
