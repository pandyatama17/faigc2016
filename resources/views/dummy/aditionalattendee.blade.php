@extends('layouts.bootstrap.container')

@section('page')
   <link rel="stylesheet" href="{{asset('plugins/swal/dist/sweetalert.css')}}">
   <div class="form-group">
      <label class="col-sm-3 control-label">Register additional attendee?<span class="red">*</span></label>
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
   <form class="" action="{{url('dummypost/subattendee')}}" method="post">
   <div id="subatendees">
      <table id="subattendee_table" class="table">
         <tr>
            <td>#</td>
            <td>Name</td>
            <td>Email</td>
         </tr>
      </table>
      <button onclick="addRow();" class="btn btn-success" id="addBtn">Add</button>
      <button onclick="removeRow();" class="btn btn-danger" id="removeBtn">Remove</button>
      <div class="clearfix"></div>
      <strong>Total Cost : <span id="totalcost"></span></strong>
   </div>
   <button type="submit" name="button">SUBMIT</button>
   </form>
   <script src="{{asset('plugins/swal/dist/sweetalert.min.js')}}" charset="utf-8"></script>
   <script>
   $(document).ready(function() {
      $("#subatendees").hide();
      $("#subatendee_yes").click(function()
      {
          $("#subatendees").fadeIn('slow',function()
          {

          });
      });
      $("#subatendee_no").click(function()
      {
          $("#subatendees").fadeOut('slow',function()
          {
             $("#subattendee_table").find('tr:not(:first)' ).remove();
          });
      });
      if ($("#subatendees_table tr").length == 0)
      {
        $("#removeBtn").hide();
      }
      else {
         $("#removeBtn").show();

      }
      $("#removeBtn").click(function()
      {
         rowCount = $("#subatendees_table tr").length;
         $('email-control').trigger("change");
      });
   });

   var personCost = 3000000;
   var cost = 0;

      function addRow() {
          //debugger;
          cost += personCost;
          $("#totalcost").text(rupiah(cost));

          var tableID="subattendee_table";
          var table = document.getElementById(tableID);
          var rowCount = table.rows.length;
          if(rowCount<=5)
          {
              var row = table.insertRow(rowCount);
              var cell1 = row.insertCell(0);
              var cell2 = row.insertCell(1);
              var cell3 = row.insertCell(2);
              var element1 = document.createElement('input');
              element1.type="text";
              element1.id="name_"+rowCount;
              element1.setAttribute('class','form-control');
              element1.setAttribute('name','name_'+rowCount);
              element1.setAttribute('required','required');
              var element2 = document.createElement('input');
              element2.type="email_";
              element2.id="email"+rowCount;
              element2.setAttribute('class','form-control email-control');
              element2.setAttribute('name','email_'+rowCount);
              element2.setAttribute('required','required');
              element2.setAttribute("onchange","validateEmail(this);");
              cell1.innerHTML = rowCount;
              cell2.appendChild(element1);
              cell3.appendChild(element2);
              $("#addBtn").attr('readonly',true);
          }
          else
          {
             swal("Sorry...","Maximum Person Reached!","warning");
          }
          $("#removeBtn").show();

      }

      function removeRow()
      {
         cost -= personCost;
         $("#totalcost").text(rupiah(cost));
          var tableID="subattendee_table";
          var table = document.getElementById(tableID);
          var rowCount = table.rows.length;

          if(rowCount>1){
              table.deleteRow(-1);
          }
          if (rowCount -1 == 1)
          {
           $("#removeBtn").hide();
          }
          else {
             $("#removeBtn").show();

          }
          console.log(rowCount-1);
      }
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
      function validateEmail(emailField){
        var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;

        if (reg.test(emailField.value) == false)
        {
            swal({
               title:"Oops...",
               text:'Invalid Email Address',
               type:"warning"
            },function(){
               $('#'+emailField.id).focus();
               console.log(emailField);
            });
            return false;
        }
        else
        {
           $("#addBtn").attr('readonly',false);
        }

        return true;
     }

   </script>
   {{-- <div class="form-group">
      <label class="col-sm-3 control-label">Register additional attendee?<span class="red">*</span></label>
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
            <tr id="subatendee_form_1">
               <td id="name_field_1">
                  <input name="name_1" id="subatendee_name_1" class="form-control">
               </td>
               <td id="email_field_1">
                  <input type="email" name="email_1" id="subatendee_email_1" class="form-control">
               </td>
               <td id="control_field_1">

               </td>
            </tr>
            @for($i=1; $i <= 5 ; $i++)
               <tr id="subatendee_form_{{$i}}">
                  <td id="name_field_{{$i}}">
                     <input name="name_{{$i}}" id="subatendee_name_{{$i}}" class="form-control">
                  </td>
                  <td id="email_field_{{$i}}">
                     <input type="email" name="email_1" id="subatendee_email_{{$i}}" class="form-control">
                  </td>
                  <td id="control_field_{{$i}}">

                  </td>
               </tr>
            @endfor
         </tbody>
      </table>
      <table>
         <tfoot>
            <th>
               <span class="help-block">Click submit to register a person or click add to register new person </span>
            </th>
         </tfoot>
      </table>
      <button type="button" class="btn btn-primary" id="okperson_button" data-action="none" name="button"><span class="glyphicon glyphicon-ok"></span> Submit</button>
      <button type="button" class="btn btn-primary" id="addperson_button" data-action="add" name="button"><span class="glyphicon glyphicon-plus"></span> Add</button>
      <div class="clearfix"></div>
      <h1>Total cost:<span id="totalcost"></span></h1>
      <div class="clearfix"></div>
      <input type="text" id="countdata" value="">
   </div>
   <script type="text/javascript">
   $(document).ready(function()
   {
      // var cost = 0;
      // $(document).on("keypress", 'form', function (e) {
      //      var code = e.keyCode || e.which;
      //      if (code == 13) {
      //          e.preventDefault();
      //          return false;
      //      }
      // });
      //
      // $("#addperson_button").hide();
      // $("#subatendees").hide();
      // $("#subatendee_yes").click(function()
      // {
      //     $("#subatendees").show('slow');
      // });
      // $("#subatendee_no").click(function()
      // {
      //     $("#subatendees").hide('slow');
      // });
      //
      // var personCost = 3000000;
      // var clicked = 1;
      // $("#okperson_button").click(function()
      // {
      //    console.log(cost+"+"+personCost);
      //     if($('#subatendee_name_'+clicked).val() == "" || !isEmail($('#subatendee_email_'+clicked).val()))
      //     {
      //        if($('#subatendee_name_'+clicked).val() == "")
      //        {
      //           $('#subatendee_name_'+clicked).addClass('text-danger');
      //           alert('fill data first!');
      //           $('#subatendee_name_'+clicked).focus();
      //        }
      //        if (!isEmail($('#subatendee_email_'+clicked).val()))
      //        {
      //           $('#subatendee_email_'+clicked).addClass('text-danger');
      //           alert('please enter valid email');
      //           $('#subatendee_email_'+clicked).focus();
      //        }
      //     }
      //     else
      //     {
      //        $("#subatendee_name_"+clicked).hide();
      //        $("#subatendee_email_"+clicked).hide();
      //        $("#name_field_"+clicked).append('<p class="form-control-static">'+$("#subatendee_name_"+clicked).val()+'</p>');
      //        $("#email_field_"+clicked).append('<p class="form-control-static">'+$("#subatendee_email_"+clicked).val()+'</p>');
      //        $("#control_field_"+clicked).append('<button class="btn btn-danger" onclick="$(\'#subatendee_form_'+clicked+'\').remove();$(\'#countdata\').val($(\'#countdata\').val()- 1);"><i class="fa fa-times"></i> Delete</button>');
      //        $("#validate_"+clicked).val('true')
      //        console.log("On click : "+clicked);
      //        cost = (personCost+cost);
      //        console.log(cost);
      //        $("#totalcost").text(rupiah(cost));
      //        $("#costinput").val(cost);
      //        $("#countdata").val(clicked);
      //        $(this).hide();
      //        $("#addperson_button").show();
      //     }
      // });
      // $("#addperson_button").click(function()
      // {
      //     if($("#subatendee_name_"+clicked).val() != "" || $("#subatendee_email_"+clicked).val() != "")
      //     {
      //
      //           if($("#subatendee_name_"+clicked).is(":visible"))
      //           {
      //              $("#okperson_button").trigger('click');
      //           }
      //           if (clicked < 5)
      //           {
      //              clicked++;
      //              $('#subatendees_table tr:last').after('<tr id="subatendee_form_'+clicked+'"><td id="name_field_'+clicked+'"><input required name="name_'+clicked+'" id="subatendee_name_'+clicked+'" class="form-control"></td><td id="email_field_'+clicked+'"><input required type="email" name="email_'+clicked+'" id="subatendee_email_'+clicked+'" class="form-control"></td></tr>');
      //              $('#hidden-control').append('<icountdatanput type="hidden" name="validate_'+clicked+'" id="validate_'+clicked+'" value="false">');
      //              $("#countdata").val(($("#countdata").val()*1) +1);
      //              $("#okperson_button").show();
      //              $(this).hide();
      //              if (clicked == 5)
      //              {
      //                    $(this).hide();
      //                    $("#okperson_butto3n").show();
      //              }
      //              console.log("Clicked : "+clicked);
      //           }
      //           else {
      //              alert('maximum person reached!');
      //           }
      //        }
      //        else
      //        {
      //           if($('#subatendee_name_'+clicked).val() == "")
      //           {
      //              $('#subatendee_name_'+clicked).addClass('text-danger');
      //              alert('fill data first!');
      //              $('#subatendee_name_'+clicked).focus();
      //           }
      //           if (!isEmail($('#subatendee_email_'+clicked).val()))
      //           {
      //              $('#subatendee_email_'+clicked).addClass('text-danger');
      //              alert('please enter valid email');
      //              $('#subatendee_email_'+clicked).focus();
      //           }
      //        }
      //     });
      //     $("#countdata").on("change", function()
      //     {
      //        clicked = $(this).val();
      //     });
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
   function isEmail(email)
   {
      var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
      return regex.test(email);
   }
   </script> --}}
@endsection
