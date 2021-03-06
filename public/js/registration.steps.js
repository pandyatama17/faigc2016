$(document).ready(function()
{
   $("#registrationForm").steps(
      {
        bodyTag: "fieldset",
        transitionEffect:"slideLeft",
        onStepChanging: function (event, currentIndex, newIndex)
        {

            // Always allow going backward even if the current step contains invalid fields!
            if (currentIndex > newIndex)
            {
                return true;
            }

            // Forbid suppressing "Warning" step if the user is to young
            if (newIndex === 3 && Number($("#age").val()) < 18)
            {
                return false;
            }
            $("#email").val($("#registype_email").val());

            var form = $(this);

            // Clean up if user went backward before
            if (currentIndex < newIndex)
            {
                // To remove error styles
                $(".body:eq(" + newIndex + ") label.error", form).remove();
                $(".body:eq(" + newIndex + ") .error", form).removeClass("error");
            }

            // Disable validation on fields that are disabled or hidden.
            form.validate().settings.ignore = ":disabled,:hidden";

            // Start validation; Prevent going forward if false
            return form.valid();
        },
        onStepChanged: function (event, currentIndex, priorIndex)
        {
            // Suppress (skip) "Warning" step if the user is old enough.
            if (currentIndex == 1)
            {
                $("#action-previous").show();
            }
            else if (currentIndex == 0)
            {
               $("#action-previous").hide();
            }
            if (currentIndex == 4)
            {
               $("#action-finish").show();
                $("#action-next").hide();
            }
            else if (currentIndex < 4)
            {
               $("#action-finish").hide();
               $("#action-next").show();
            }
            adjustStepHeight();
        },
        onFinishing: function (event, currentIndex)
        {
            var form = $(this);

            // Disable validation on fields that are disabled.
            // At this point it's recommended to do an overall check (mean ignoring only disabled fields)
            form.validate().settings.ignore = ":disabled";

            // Start validation; Prevent form submission if false
            return form.valid();
        },
        onFinished: function (event, currentIndex)
        {
            var form = $(this);

            // Submit form input
            form.submit();
        },
        onInit:function (event, currentIndex)
        {
         //   adjustStepHeight();
         $(".wizard > .content").css("height",800);
        }
    })
    .validate(
    {
       highlight: function(element)
       {
          $(element).closest('.form-group').addClass('has-error');
       },
       unhighlight: function(element)
       {
          $(element).closest('.form-group').removeClass('has-error');
       },
       errorElement: 'span',
       errorClass: 'help-block',
       errorPlacement: function(error, element)
       {
          if(element.parent('.input-group').length)
          {
             error.insertAfter(element.parent());
          }
          else
          {
             if ( element.is(":radio") )
             {
                error.prependTo( element.parents('.form-group') );
             }
             else
             { // This is the default behavior
                error.insertAfter( element );
             }
          }
       },
       rules:
       {
          confirm:
          {
             equalTo: "#password"
          }
       },
       submitHandler: function(form)
       {
          if ($(form).valid())
          {
             showPreloader();
             $(form).ajaxSubmit({
                url:$(this).attr('action'),
                type: 'POST',
                data: $(this).serialize(),
                success: function(data)
                {
                   hidePreloader();
                   var obj = jQuery.parseJSON(data);
                   if(obj.err == false)
                   {
                      console.log(obj.items);
                      swal({
                        title: "Success!",
                        text: obj.msg,
                        type: "success",
                        confirmButtonColor: "#0288d1",
                        confirmButtonText: "Ok!",
                        closeOnConfirm: true
                     },function()
                     {
                        showPreloader();
                        window.location.replace('/registration/success&id='+obj.id);
                     });
                  }
                  else
                  {
                     swal("Opps!", obj.msg, "error");
                  }
               }
            });
            return false;
         }
      }
   });

   //  Personal Data

   var staticCost;

   $(".radioInput").on("ifChecked",function()
   {
      cost = $(this).data('cost');
      $("#totalcost").text(rupiah($(this).data('cost')));
      $("#costinput").val(cost);
      $("#regist_type").val($(this).data('type'));
   });

   $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
    checkboxClass: 'icheckbox_minimal-blue',
    radioClass: 'iradio_minimal-blue'
    });
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
       checkboxClass: 'icheckbox_minimal-red',
       radioClass: 'iradio_minimal-red'
    });
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-green, input[type="radio"].flat-green').iCheck({
       checkboxClass: 'icheckbox_flat-green',
       radioClass: 'iradio_flat-green'
    });
    $("#dietary_request_other_column").hide();

    $(".hide-dietary").on('ifChecked',function() {
       $("#dietary_request_other_column").hide();
    });
    $("#dietary_other").on('ifChecked',function()
    {
       $("#dietary_request_other_column").show();
    });
    $("#country").countrySelect();
    $('#country').change(function()
    {
       var country = $(this).countrySelect("getSelectedCountryData");
       console.log(country['iso2']);
       $("#phone").intlTelInput("setCountry", country['iso2']);
       $("#mobile").intlTelInput("setCountry", country['iso2']);
    });
    $("#phone").intlTelInput({separateDialCode: true});
    $("#mobile").intlTelInput({separateDialCode: true});
    $('#mobile').keydown(function()
    {
         $('#mobileFix').val($(this).intlTelInput('getNumber'));
    })
    $('#phone').keydown(function()
    {
         $('#phoneFix').val($(this).intlTelInput('getNumber'));
    });
    $("#file").change(function(){
       readURL(this);
   });

      // sub atendee

   $(document).on("keypress", 'form', function (e) {
        var code = e.keyCode || e.which;
        if (code == 13) {
            e.preventDefault();
            return false;
        }
   });

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


      //  hotel

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
         cost = ((staticCost*1)+(((3000000*daysStay))*rooms));
         $("#totalcost").html(rupiah(cost));
         $("#costinput").val(cost);
         console.clear();
         console.log('registration fee : '+cost+'\nDays Stay : '+daysStay+'\nRooms : '+rooms);
      });

      $("#rooms").change(function()
      {
         $("#checkout").trigger("change");
      });
      $("#reserve").hide();
      $("#hotel_westin").click(function()
      {
         staticCost = cost;
         console.log(staticCost);
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

      // payment


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

      //  other functions


       $(".actions").hide();

       $("#mainNavbar").autoHidingNavbar({
          hideOffset : 10,
       });

         // $(".wizard > .content").css("overflow-y",'scroll');
         $("#action-next").hide();
         $("#action-previous").hide();
         $("#action-finish").hide();

         $(".wizard > .content").css("height",650);

});

// more other functions

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
function adjustStepHeight()
{
   sum = 0;
   //get the current step number
   stepNumber = $("#registrationForm").steps("getCurrentIndex");
   //get the combined height of all child elements in the step
   $("#registrationForm-p-"+stepNumber).children().each(function()
   {
      sum += ($(this).height()+
                 parseInt($(this).css("margin-top"))+
                 parseInt($(this).css("margin-bottom"))
              )
   });

   if (stepNumber == 1)
   {
      //add vertical padding to the sum variable
      sum += (parseInt($("#registrationForm-p-"+stepNumber).css("padding-top")))*22;
   }
   else if (stepNumber == 3 || stepNumber == 4)
   {
      //add vertical padding to the sum variable
      sum += (parseInt($("#registrationForm-p-"+stepNumber).css("padding-top")))*16;
   }
   else if (stepNumber == 0)
   {
      //add vertical padding to the sum variable
      $(".wizard > .content").css("height",650);
   }
   else
   {
      sum += (parseInt($("#registrationForm-p-"+stepNumber).css("padding-top")))*2;
   }
   //set height of step to the sum value
   $(".wizard > .content").css("height",sum);
   $(".wizard > .content").css("overflow-y",'hidden');
}
function replaceAll(str, find, replace)
{
   return str.replace(new RegExp(find, 'g'), replace);
}
function verifyEmail()
{
   if (isEmail($("#registype_email").val()))
   {
      showPreloader();
      $.get( "registration/verifyemail&email="+$("#registype_email").val(), function( data )
      {
         obj = $.parseJSON(data)
         // alert( "Load was performed." );
         console.log(obj.valid);
         if (obj.valid == true)
         {
            hidePreloader();
            swal({
               title :  "Valid",
               text  :  "this email is valid!",
               type  :  "success"
            },function()
            {
               $("#registype_email").closest('.form-group').addClass("has-success");
               $("#action-next").show();
            });

         }
         else
         {
            hidePreloader();
            swal({
               title :  "Failed",
               text  :  "this email has been registered!",
               type  :  "error"
            },function()
            {
               $("#registype_email").closest('.form-group').addClass("has-error");
               $("#action-next").hide();
            });

         }
      });
   }
   else
   {
      $("#registype_email").closest('.form-group').addClass("has-error");
      swal("Oops..","Please enter a valid email","warning");
   }
}
function readURL(input) {

    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#img-preview').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}
function showPreloader()
{
   $("#preloader").show();
   $("#mainNavbar").hide();
}
function hidePreloader()
{
   $("#preloader").hide();
   $("#mainNavbar").show();
}
function addRow() {
    //debugger;
    var personCost = 3000000;
    cost += personCost;
    $("#totalcost").text(rupiah(cost));
    $("#costinput").val(cost);

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
   var personCost = 3000000;
   cost -= personCost;
   $("#totalcost").text(rupiah(cost));
   $("#costinput").val(cost);
   
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
