@extends('registration.new.main')

@section('content')
   <h1 class="header">Hotel Reservation</h1>

   <p>
      Participants are advised to book hotel accommodation for the duration of the conference. We have secured hotel accommodation at the Westin Nusa Dua Hotel. <br>
Hotel accommodation is not included in the registration fee and should be settled together with the conference fee in advance. The negotiated, special room rate offers excellent value for money and includes breakfast, and city tax. <br>
Any additional services (e.g. telephone, mini-bar, laundry, meals not included in the program) will be charged to you by the hotel at checkout. <br><br>

If you do not need a hotel room, please click 'No Lodging Required' to continue the registration process.<br><br>

Please note that it is only possible to book your hotel room online during registration. <br><br>

Please be informed that the hotel is fully booked. Please contact us by email info@faigc2016bali.com for more information.
   </p>
   <form id="form" class="form-horizontal" action="{{action('RegisterController@storeHotelReservation')}}" method="post">
      <div class="form-group">
         <label for="email" class="col-sm-3 control-label">Hotel Reservation<span class="red">*</span></label>
         <div class="col-sm-9">
            <div class="radio">
               <label>
                  <input type="radio" name="hotel" id="hotel_westin" value="1">
                  Westin Nusa Dua Bali <span class="badge">IDR 3.000.000,00</span>/<sup>room per night</sup>
               </label>
            </div>
            <div class="radio">
               <label>
                  <input type="radio" name="hotel" id="hotel_none" value="none" checked>
                  No Lodging Required
               </label>
            </div>
         </div>
      </div>
      <div class="" id="reserve">
         <div class="form-group">
            <label for="" class="col-sm-3 control-label">Number of Rooms</label>
            <div class="col-sm-9">
               <input  type="number" min='1' name="rooms" class="form-control" id="rooms" placeholder="Number of Rooms" value='1'>
            </div>
         </div>
         <div class="form-group">
            <label class="col-sm-3 control-label">Preference<span class="red">*</span></label>
            <div class="col-sm-9">
               <div class="radio">
                  <label>
                     <input type="radio" name="preference" id="preference_single" value="single">
                     Single
                  </label>
               </div>
               <div class="radio">
                  <label>
                     <input type="radio" name="preference" id="preference_double" value="double">
                     Double
                  </label>
               </div>
            </div>
         </div>
         <div class="form-group">
            <label for="" class="col-sm-3 control-label">Check in</label>
            <div class="col-sm-9">
               <input  type="text" name="checkin" class="form-control datepicker" id="checkin" placeholder="Check in date">
            </div>
         </div>
         <div class="form-group">
            <label for="" class="col-sm-3 control-label">Check out</label>
            <div class="col-sm-9">
               <input  type="text" name="checkout" class="form-control datepicker" id="checkout" placeholder="Check out date">
            </div>
         </div>
         <div class="form-group">
            <div class="col-sm-9 col-sm-offset-3">
               <span class="help-block">You will stay for <span id="totaldays"></span> night(s)</span>
            </div>
         </div>
      </div>
      <br><br>
      <center><b>Total Cost : </b><span id="totalcost">IDR {{number_format(Session::get('cost'), 2,'.','.')}}</span></center>
      <input type="hidden" name="cost" id="cost" value="{{Session::get('cost')}}">
      <input type="hidden" name="_token" value="{{csrf_token()}}">
      <ul class="pager wizard">
           <li class="previous"><a href="{{url('register/program')}}">Previous</a></li>
           <li class="next"><button class="btn btn-primary" type="submit" id="submit">Next</button></li>
        </ul>
   </form>
   <script type="text/javascript">
   function replaceAll(str, find, replace) {
     return str.replace(new RegExp(find, 'g'), replace);
   }
   $(document).ready(function() {
      var staticCost = "{{Session::get('cost')}}";

      $("#checkin").datepicker({
        dateFormat: "yy-mm-dd",
        onSelect: function (date) {
            var date2 = $('#checkin').datepicker('getDate');
            date2.setDate(date2.getDate() + 1);
            $('#checkout').datepicker('setDate', date2);
            console.log(date2.getDate());
            //sets minDate to dt1 date + 1
            $('#checkout').datepicker('option', 'minDate', date2).trigger("change");
        }
    });
    $('#checkout').datepicker({
        dateFormat: "yy-mm-dd",
        onClose: function () {
            var dt1 = $('#checkin').datepicker('getDate');
            var dt2 = $('#checkout').datepicker('getDate');
            //check to prevent a user from entering a date below date of dt1
            if (dt2 <= dt1) {
                var minDate = $('#checkout').datepicker('option', 'minDate');
                $('#checkout').datepicker('setDate', minDate);
            }
        }

    });

      $("#checkout").change(function()
      {
         var startdate = $("#checkin").datepicker('getDate');
          var enddate = $(this).datepicker('getDate');
          var daysStay = Math.ceil((enddate - startdate) / (1000 * 60 * 60 * 24));
         $("#totaldays").text(daysStay);

         var rooms = $("#rooms").val();
         var newCost = ((staticCost*1)+(((3000000*daysStay))*rooms));
         $("#totalcost").html(rupiah(newCost));
         $("#cost").val(newCost);
         console.clear();
         console.log('registration fee : '+staticCost+'\nDays Stay : '+daysStay+'\nRooms : '+rooms);

         if ($("#form").valid()) {
              $('#submit').prop('disabled', false);
         } else {
              $('#submit').prop('disabled', 'disabled');
         }
      });

      $("#rooms").change(function()
      {
         $("#checkout").trigger("change");
      });
      $("#reserve").hide();
      $("#hotel_westin").click(function()
      {
         $("#reserve").show('slow');
         $("#rooms").val('1').trigger('change');
         $("#submit").prop("disabled","disabled");
         $("#checkin").prop("required",true);
         $("#checkout").prop("required",true);
         $("#preference_single").prop("required",true);
         $("#preference_double").prop("required",true);
      });
      $("#hotel_none").click(function()
      {
         $("#reserve").hide('slow');
         $("#rooms").val('0').trigger('change');
         $("#submit").prop("disabled",false);
         $("#checkin").prop("required",false);
         $("#checkin").prop("required",false);
         $("#preference_single").prop("required",false);
         $("#preference_double").prop("required",false);
      });

      $("#form").validate();
   });

   </script>
@endsection
