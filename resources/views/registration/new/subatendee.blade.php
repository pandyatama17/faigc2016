@extends('registration.new.main')

@section('content')
   <h1 class="header">Accompanying Person</h1>
   <p>
      Accompanying person. No access to the conference sessions and documentation. Including:
      <ul>
         <li>Conference badge</li>
         <li>Lunches &amp; breaks during the whole conference</li>
         <li>Welcome reception at City Hall (incl. dinner)</li>
         <li>Awards &amp; Opening Ceremony</li>
         <li>Closing Ceremony (incl. dinner)</li>
         <li>Free Internet use at the Conference hotel</li>
         <li>An accompanying person can book an excursion, but this is not included in the registration fee.</li>
      </ul>
      If you decide to register additional delegates or a accompanying person, payment for all registrations should be made at once (by invoice or by credit card).
   </p>
   <form class="form-horizontal" action="{{action('RegisterController@storeSubatendee')}}" method="post">
      <div class="form-group">
         <label class="col-sm-3 control-label">Register aditional atendee?<span class="red">*</span></label>
         <div class="col-sm-9">
            <div class="radio">
               <label>
                  <input required type="radio" name="subatendee" id="subatendee_no" value="no" checked>
                  no
               </label>
            </div>
            <div class="radio">
               <label>
                  <input type="radio" name="subatendee" id="subatendee_yes" value="yes">
                  yes
               </label>
            </div>
         </div>
      </div>
      <div id="subatendees">
         <table class="table table-stripped" id="subatendees_table">
            <thead>
               <th>name</th>
               <th>email</th>
            </thead>
            <tbody>
               <tr>
                  <td id="name_field_1">
                     <input name="name_1" id="subatendee_name_1" class="form-control">
                  </td>
                  <td id="email_field_1">
                     <input type="email" name="email_1" id="subatendee_email_1" class="form-control">
                  </td>
                  <td>
                     <button type="button" class="btn btn-primary" id="okperson_button" data-action="none" name="button"><span class="glyphicon glyphicon-ok"></span> Submit</button>
                  </td>
               </tr>
            </tbody>
         </table>
         <table>
            <tfoot>
               <th>
                  <span class="help-block">Click ok to register a person or click add to register new person </span>
               </th>
            </tfoot>
         </table>
         <button type="button" class="btn btn-primary" id="addperson_button" data-action="add" name="button"><span class="glyphicon glyphicon-plus"></span> Add</button>
      </div>
      <center><b>Total Cost : </b><span id="totalcost">IDR {{number_format(Session::get('cost'), 2,'.','.')}}</span></center>
      <div id="hidden-control">
         <input type="hidden" name="countdata" id="countdata" value="0">
         <input type="hidden" name="validate_1" value="false">
      </div>
      <input type="hidden" name="cost" id="cost" value="{{Session::get('cost')}}">
      <input type="hidden" name="_token" value="{{csrf_token()}}">
      <ul class="pager wizard">
           <li class="previous"><a href="#">Previous</a></li>
           <li class="next"><button class="btn btn-primary" type="submit" id="submit-btn">Next</button></li>
        </ul>
   </form>
   <script type="text/javascript">
   $(document).ready(function()
   {
      $(document).on("keypress", 'form', function (e) {
          var code = e.keyCode || e.which;
          if (code == 13) {
              e.preventDefault();
              return false;
          }
      });

      $("#addperson_button").hide();
      $("#subatendees").hide();
      $("#subatendee_yes").click(function()
      {
         $("#subatendees").show('slow');
      });
      $("#subatendee_no").click(function()
      {
         $("#subatendees").hide('slow');
      });

      var personCost = 3000000;
      var dynamicCost = {{Session::get('cost')}};
      var clicked = 1;
      $("#okperson_button").click(function()
      {
         if($('#subatendee_name_'+clicked).val() == "" || !isEmail($('#subatendee_email_'+clicked).val()))
         {
            if($('#subatendee_name_'+clicked).val() == "")
            {
               $('#subatendee_name_'+clicked).addClass('text-danger');
               alert('fill data first!');
               $('#subatendee_name_'+clicked).focus();
            }
            if (!isEmail($('#subatendee_email_'+clicked).val()))
            {
               $('#subatendee_email_'+clicked).addClass('text-danger');
               alert('please enter valid email');
               $('#subatendee_email_'+clicked).focus();
            }
         }
         else
         {
            $("#subatendee_name_"+clicked).hide();
            $("#subatendee_email_"+clicked).hide();
            $("#name_field_"+clicked).append('<p class="form-control-static">'+$("#subatendee_name_"+clicked).val()+'</p>');
            $("#email_field_"+clicked).append('<p class="form-control-static">'+$("#subatendee_email_"+clicked).val()+'</p>');
            $("#validate_"+clicked).val('true')
            console.log("On click : "+clicked);
            dynamicCost = personCost+dynamicCost;
            $("#totalcost").text(rupiah(dynamicCost));
            $("#cost").val(dynamicCost);
            $("#countdata").val(clicked);
            $(this).hide();
            $("#addperson_button").show();
         }
      });
      $("#addperson_button").click(function()
      {
         if($("#subatendee_name_"+clicked).val() != "" || $("#subatendee_email_"+clicked).val() != "")
         {

               if($("#subatendee_name_"+clicked).is(":visible"))
               {
                  $("#okperson_button").trigger('click');
               }
               if (clicked < 5)
               {
                  clicked++;
                  $('#subatendees_table tr:last').after('<tr><td id="name_field_'+clicked+'"><input required name="name_'+clicked+'" id="subatendee_name_'+clicked+'" class="form-control"></td><td id="email_field_'+clicked+'"><input required type="email" name="email_'+clicked+'" id="subatendee_email_'+clicked+'" class="form-control"></td></tr>');
                  $('#hidden-control').append('<input type="hidden" name="validate_'+clicked+'" id="validate_'+clicked+'" value="false">');
                  $("#countdata").val(($("#countdata").val()*1) +1);
                  $("#okperson_button").show();
                  $(this).hide();
                  if (clicked == 5)
                  {
                        $(this).hide();
                        $("#okperson_button").show();
                  }
                  console.log("Clicked : "+clicked);
               }
               else {
                  alert('maximum person reached!');
               }
            }
            else
            {
               if($('#subatendee_name_'+clicked).val() == "")
               {
                  $('#subatendee_name_'+clicked).addClass('text-danger');
                  alert('fill data first!');
                  $('#subatendee_name_'+clicked).focus();
               }
               if (!isEmail($('#subatendee_email_'+clicked).val()))
               {
                  $('#subatendee_email_'+clicked).addClass('text-danger');
                  alert('please enter valid email');
                  $('#subatendee_email_'+clicked).focus();
               }
            }
      });
      $("input").keydown(function()
      {
         $(this).removeClass('text-danger');
      });
   });
   function isEmail(email) {
  var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  return regex.test(email);
}
   </script>
@endsection
