@extends('registration.new.main')

@section('content')
   <link rel="stylesheet" href="{{asset('plugins/country-select/build/css/countrySelect.css')}}" media="screen">
<link rel="stylesheet" href="{{asset('plugins/intlTelInput/build/css/intlTelInput.css')}}" media="screen">
   <?php
      $req = '<span class="red">*</span>';
   ?>
<form id="form" action="{{action('RegisterController@storeRegistration')}}" method="post" enctype="multipart/form-data" autocomplete="on" class="form-horizontal">
   {{-- email --}}
   <div class="form-group">
      <label for="email" class="col-sm-3 control-label">Email<?=$req ?></label>
      <div class="col-sm-9">
         <input required type="email" name="email" class="form-control" id="email" placeholder="Email" value="{{Session::get('email')}}">
      </div>
   </div>
   {{-- title --}}
   <div class="form-group">
      <label for="email" class="col-sm-3 control-label">Title<?=$req?></label>
      <div class="col-sm-9">
         <label class="radio-inline">
               <input required type="radio" name="title" id="title_mr" value="Mr.">
               Mr.
         </label>
         <label class="radio-inline">
               <input type="radio" name="title" id="title_mrs" value="Mrs.">
               Mrs.
         </label>
         <label class="radio-inline">
               <input type="radio" name="title" id="title_miss" value="Miss.">
               Miss.
         </label>
      </div>
   </div>
   {{-- first_name --}}
   <div class="form-group">
      <label for="first_name" class="col-sm-3 control-label">First Name<?=$req ?></label>
      <div class="col-sm-9">
         <input required type="text" name="first_name" class="form-control" id="first_name" placeholder="First Name">
      </div>
   </div>
   {{-- last_name --}}
   <div class="form-group">
      <label for="last_name" class="col-sm-3 control-label">Last Name<?=$req ?></label>
      <div class="col-sm-9">
         <input required type="text" name="last_name" class="form-control" id="last_name" placeholder="Last Name">
      </div>
      <p class="help-block pull-right">If your family name contains a prefix such as 'van' or 'de',  please enter the prefix in the box above as well.</p>
   </div>
   {{-- Gender --}}
   <div class="form-group">
      <label for="email" class="col-sm-3 control-label">Gender<?=$req?></label>
      <div class="col-sm-9">
            <label class="radio-inline">
               <input required type="radio" name="gender" id="gender_male" value="male">
               Male
            </label>
            <label class="radio-inline">
               <input type="radio" name="gender" id="gender_female" value="female">
               Female
            </label>
      </div>
   </div>
   {{-- job_title --}}
   <div class="form-group">
      <label for="first_name" class="col-sm-3 control-label">Job Title</label>
      <div class="col-sm-9">
         <input type="text" name="job_title" class="form-control" id="job_title" placeholder="Job Title">
      </div>
   </div>
   {{-- organisation --}}
   <div class="form-group">
      <label for="first_name" class="col-sm-3 control-label">Organisation<?=$req ?></label>
      <div class="col-sm-9">
         <input required type="text" name="organisation" class="form-control" id="organisation" placeholder="Organisation">
      </div>
   </div>
   {{-- department --}}
   <div class="form-group">
      <label for="first_name" class="col-sm-3 control-label">Department</label>
      <div class="col-sm-9">
         <input type="text" name="department" class="form-control" id="department" placeholder="Department">
      </div>
   </div>
   {{-- address_line_1 --}}
   <div class="form-group">
      <label for="first_name" class="col-sm-3 control-label">Address Line 1<?=$req ?></label>
      <div class="col-sm-9">
         <input required type="text" name="address_line_1" class="form-control" id="address_line_1" placeholder="Address Line 1">
      </div>
   </div>
   {{-- address_line_2 --}}
   <div class="form-group">
      <label for="first_name" class="col-sm-3 control-label">Address Line 2</label>
      <div class="col-sm-9">
         <input type="text" name="address_line_2" class="form-control" id="address_line_2" placeholder="Address Line 2">
      </div>
   </div>
   {{-- zip --}}
   <div class="form-group">
      <label for="first_name" class="col-sm-3 control-label">Zip (Postal Code)<?=$req ?></label>
      <div class="col-sm-9">
         <input required type="number" name="zip" class="form-control number-control" id="zip" placeholder="Zip (Postal Code)">
      </div>
   </div>
   {{-- city --}}
   <div class="form-group">
      <label for="first_name" class="col-sm-3 control-label">City<?=$req ?></label>
      <div class="col-sm-9">
         <input required type="text" name="city" class="form-control" id="city" placeholder="City">
      </div>
   </div>
   {{-- country --}}
   <div class="form-group">
      <label for="first_name" class="col-sm-3 control-label">Country<?=$req ?></label>
      <div class="col-sm-9">
         <input required type="text" name="country" class="form-control" id="country" placeholder="Country">
      </div>
   </div>
   {{-- phone --}}
   <div class="form-group">
      <label for="first_name" class="col-sm-3 control-label">Phone</label>
      <div class="col-sm-9">
         <input type="number" name="phoneSelect" class="form-control number-control" id="phone" placeholder="Phone">
      </div>
   </div>
   {{-- fax --}}
   <div class="form-group">
      <label for="first_name" class="col-sm-3 control-label">Fax</label>
      <div class="col-sm-9">
         <input type="number" name="fax" class="form-control number-control" id="fax" placeholder="Fax">
      </div>
   </div>
   {{-- mobile --}}
   <div class="form-group">
      <label for="first_name" class="col-sm-3 control-label">Mobile<?=$req ?></label>
      <div class="col-sm-9">
         <input required type="number" name="mobileSelect" class="form-control number-control" id="mobile" placeholder="Mobile">
      </div>
   </div>
   {{-- cc_email --}}
   <div class="form-group">
      <label for="first_name" class="col-sm-3 control-label">CC email</label>
      <div class="col-sm-9">
         <input type="text" name="cc_email" class="form-control" id="cc_email" placeholder="CC email">
      </div>
   </div>
   {{-- passport_number --}}
   <div class="form-group">
      <label for="first_name" class="col-sm-3 control-label">Passport Number<?=$req?></label>
      <div class="col-sm-9">
         <input required type="text" name="passport_number" class="form-control" id="passport_number" placeholder="Passport Number">
      </div>
   </div>
   {{-- dietary_request --}}
   <div class="form-group">
      <label for="email" class="col-sm-3 control-label">Dietary Request<?=$req?></label>
      <div class="col-sm-9">
         <div class="radio">
            <label>
               <input required type="radio" name="dietary_request" id="dietary_no" value="no" class="hide-dietary" checked>
               No
            </label>
         </div>
         <div class="radio">
            <label>
               <input required type="radio" name="dietary_request" id="dietary_vegetarian_fish" value="vegetarian_fish" class="hide-dietary">
               Vegetarian (will eat fish)
            </label>
         </div>
         <div class="radio">
            <label>
               <input type="radio" name="dietary_request" id="dietary_vegetarian_no_fish" value="vegetarian_no_fish" class="hide-dietary">
               Vegetarian (will not eat fish)
            </label>
         </div>
         <div class="radio">
            <label>
               <input type="radio" name="dietary_request" id="dietary_vegan" value="vegan" class="hide-dietary">
               Vegan
            </label>
         </div>
         <div class="radio">
            <label>
               <input type="radio" name="dietary_request" id="dietary_other" value="other">
               Other
            </label>
         </div>
      </div>
   </div>
   {{-- dietary_request_other --}}
   <div class="form-group" id="dietary_request_other_column">
      <div class="col-sm-9 col-sm-offset-3">
         <p class="help-block">Please Describe<?=$req?></p>
         <textarea name="dietary_request_other" class="form-control number-control" id="dietary_request_other" placeholder="Please Describe">
         </textarea>
      </div>
   </div>
   {{-- avatar --}}
   <div class="form-group">
      <label for="first_name" class="col-sm-3 control-label">Please upload a picture of yourself<?=$req ?></label>
      <div class="col-sm-9">
         <input required type="file" name="avatar" class="form-control" id="avatar" placeholder="Picture File">
         <p class="help-block">will be used for your badge</p>
      </div>
   </div>
   <input type="hidden" name="member_type" value="{{Session::get('member_type')}}">
   <input type="hidden" name="cost" value="{{Session::get('cost')}}">
   <input type="hidden" name="phone" id="phoneFix" value="">
   <input type="hidden" name="mobile" id="mobileFix" value="">
   {{-- <center><b>Total Cost : </b><span id="totalcost">&euro; {{number_format($dataflow['cost'], 2,'.','.')}}</span></center> --}}
   <input type="hidden" name="_token" value="{{csrf_token()}}">
   <ul class="pager wizard">
        <li class="previous"><a href="{{url('/register/type')}}">Previous</a></li>
        <li class="next"><button class="btn btn-primary" type="submit" id="submit" disabled="disabled">Next</button></li>
     </ul>
</form>
<script src="{{asset('plugins/country-select/build/js/countrySelect.min.js')}}" charset="utf-8"></script>
<script src="{{asset('plugins/intlTelInput/build/js/intlTelInput.min.js')}}" charset="utf-8"></script>
<script src="{{asset('plugins/intlTelInput/build/js/utils.js')}}" charset="utf-8"></script>
<script type="text/javascript">
$(document).ready(function()
{
   $("#dietary_request_other_column").hide();

   $(".hide-dietary").click(function() {
      $("#dietary_request_other_column").hide();
   });
   $("#dietary_other").click(function()
   {
      $("#dietary_request_other_column").show();
   });
   $("#country").countrySelect();
   $('#country').change(function()
   {
      var country = $(this).countrySelect("getSelectedCountryData");
      console.log(country['iso2']);
      $("#phone").intlTelInput("setCountry",country['iso2']);
      $("#mobile").intlTelInput("setCountry",country['iso2']);
   });
   $("#phone").intlTelInput();
   $("#mobile").intlTelInput();
   $('#mobile').keydown(function()
   {
         $('#mobileFix').val($(this).intlTelInput('getNumber'));
   })
   $('#phone').keydown(function()
   {
         $('#phoneFix').val($(this).intlTelInput('getNumber'));
   });

   $('#avatar').on('change', function()
   {
      if ($("#form").valid()) {
           $('#submit').prop('disabled', false);
      } else {
           $('#submit').prop('disabled', 'disabled');
      }
   });

   $("#form").validate();
});

</script>
@endsection
