<?php
   $req = '<span class="red">*</span>';
?>
{{-- email --}}
<div class="form-group">
   <label for="email" class="col-sm-3 control-label">Email<?=$req ?></label>
   <div class="col-sm-9">
      <input required type="email" name="email" class="form-control" id="email" placeholder="Email" value="{{Session::get('email')}}">
   </div>
</div>
<div class="clearfix"></div><br>
{{-- title --}}
<div class="form-group">
   <label for="email" class="col-sm-3 control-label">Title<?=$req?></label>
   <div class="col-sm-9">
      <label class="radio-inline">
            <input required type="radio" class="flat-green" name="title" id="title_mr" value="Mr.">
            Mr.
      </label>
      <label class="radio-inline">
            <input type="radio" class="flat-green" name="title" id="title_mrs" value="Mrs.">
            Mrs.
      </label>
      <label class="radio-inline">
            <input type="radio" class="flat-green" name="title" id="title_miss" value="Miss.">
            Miss.
      </label>
   </div>
</div>
<div class="clearfix"></div><br>
{{-- first_name --}}
<div class="form-group">
   <label for="first_name" class="col-sm-3 control-label">First Name<?=$req ?></label>
   <div class="col-sm-9">
      <input required type="text" name="first_name" class="form-control" id="first_name" placeholder="First Name">
   </div>
</div>
<div class="clearfix"></div><br>
{{-- last_name --}}
<div class="form-group">
   <label for="last_name" class="col-sm-3 control-label">Last Name<?=$req ?></label>
   <div class="col-sm-9">
      <input required type="text" name="last_name" class="form-control" id="last_name" placeholder="Last Name">
   </div>
   <p class="help-block col-sm-9 col-sm-offset-3">If your family name contains a prefix such as 'van' or 'de',  please enter the prefix in the box above as well.</p>
</div>
<div class="clearfix"></div><br>
{{-- Gender --}}
<div class="form-group">
   <label for="email" class="col-sm-3 control-label">Gender<?=$req?></label>
   <div class="col-sm-9">
         <label class="radio-inline">
            <input required type="radio" class="flat-green" name="gender" id="gender_male" value="male">
            Male
         </label>
         <label class="radio-inline">
            <input type="radio" class="flat-green" name="gender" id="gender_female" value="female">
            Female
         </label>
   </div>
</div>
<div class="clearfix"></div><br>
{{-- job_title --}}
<div class="form-group">
   <label for="first_name" class="col-sm-3 control-label">Job Title</label>
   <div class="col-sm-9">
      <input type="text" name="job_title" class="form-control" id="job_title" placeholder="Job Title">
   </div>
</div>
<div class="clearfix"></div><br>
{{-- organisation --}}
<div class="form-group">
   <label for="first_name" class="col-sm-3 control-label">Organisation (NAC)<?=$req ?></label>
   <div class="col-sm-9">
      <input required type="text" name="organisation" class="form-control" id="organisation" placeholder="Organisation">
   </div>
</div>
<div class="clearfix"></div><br>
{{-- department --}}
<div class="form-group">
   <label for="first_name" class="col-sm-3 control-label">Department</label>
   <div class="col-sm-9">
      <input type="text" name="department" class="form-control" id="department" placeholder="Department">
   </div>
</div>
<div class="clearfix"></div><br>
{{-- address_line_1 --}}
<div class="form-group">
   <label for="first_name" class="col-sm-3 control-label">Address Line 1<?=$req ?></label>
   <div class="col-sm-9">
      <input required type="text" name="address_line_1" class="form-control" id="address_line_1" placeholder="Address Line 1">
   </div>
</div>
<div class="clearfix"></div><br>
{{-- address_line_2 --}}
<div class="form-group">
   <label for="first_name" class="col-sm-3 control-label">Address Line 2</label>
   <div class="col-sm-9">
      <input type="text" name="address_line_2" class="form-control" id="address_line_2" placeholder="Address Line 2">
   </div>
</div>
<div class="clearfix"></div><br>
{{-- country --}}
<div class="form-group">
   <label for="first_name" class="col-sm-3 control-label">Country<?=$req ?></label>
   <div class="col-sm-9">
      <input required type="text" name="country" class="form-control" id="country" placeholder="Country">
   </div>
</div>
<div class="clearfix"></div><br>
{{-- city --}}
<div class="form-group">
   <label for="first_name" class="col-sm-3 control-label">City<?=$req ?></label>
   <div class="col-sm-9">
      <input required type="text" name="city" class="form-control" id="city" placeholder="City">
   </div>
</div>
<div class="clearfix"></div><br>
{{-- zip --}}
<div class="form-group">
   <label for="first_name" class="col-sm-3 control-label">Zip (Postal Code)<?=$req ?></label>
   <div class="col-sm-9">
      <input required type="number" name="zip" class="form-control number-control" id="zip" placeholder="Zip (Postal Code)">
   </div>
</div>
<div class="clearfix"></div><br>
{{-- mobile --}}
<div class="form-group">
   <label for="first_name" class="col-sm-3 control-label">Mobile<?=$req ?></label>
   <div class="col-sm-9">
      <input required type="number" name="mobileSelect" class="form-control number-control" id="mobile" placeholder="Mobile">
   </div>
</div>
<div class="clearfix"></div><br>
{{-- phone --}}
<div class="form-group">
   <label for="first_name" class="col-sm-3 control-label">Phone</label>
   <div class="col-sm-9">
      <input type="number" name="phoneSelect" class="form-control number-control" id="phone" placeholder="Phone">
   </div>
</div>
<div class="clearfix"></div><br>
{{-- fax --}}
<div class="form-group">
   <label for="first_name" class="col-sm-3 control-label">Fax</label>
   <div class="col-sm-9">
      <input type="number" name="fax" class="form-control number-control" id="fax" placeholder="Fax">
   </div>
</div>
<div class="clearfix"></div><br>
{{-- cc_email --}}
<div class="form-group">
   <label for="first_name" class="col-sm-3 control-label">CC email</label>
   <div class="col-sm-9">
      <input type="text" name="cc_email" class="form-control" id="cc_email" placeholder="CC email">
   </div>
</div>
<div class="clearfix"></div><br>
{{-- passport_number --}}
<div class="form-group">
   <label for="first_name" class="col-sm-3 control-label">Passport Number<?=$req?></label>
   <div class="col-sm-9">
      <input required type="text" name="passport_number" class="form-control" id="passport_number" placeholder="Passport Number">
   </div>
</div>
<div class="clearfix"></div><br>
{{-- dietary_request --}}
<div class="form-group">
   <label for="email" class="col-sm-3 control-label">Dietary Request<?=$req?></label>
   <div class="col-sm-9">
      <div class="radio">
         <label>
            <input required type="radio" class="flat-green" name="dietary_request" id="dietary_no" value="no" class="hide-dietary" checked>
            No
         </label>
      </div>
      <div class="radio">
         <label>
            <input required type="radio" class="flat-green" name="dietary_request" id="dietary_vegetarian_fish" value="vegetarian_fish" class="hide-dietary">
            Vegetarian (will eat fish)
         </label>
      </div>
      <div class="radio">
         <label>
            <input type="radio" class="flat-green" name="dietary_request" id="dietary_vegetarian_no_fish" value="vegetarian_no_fish" class="hide-dietary">
            Vegetarian (will not eat fish)
         </label>
      </div>
      <div class="radio">
         <label>
            <input type="radio" class="flat-green" name="dietary_request" id="dietary_vegan" value="vegan" class="hide-dietary">
            Vegan
         </label>
      </div>
      <div class="radio">
         <label>
            <input type="radio" class="flat-green" name="dietary_request" id="dietary_other" value="other">
            Other
         </label>
      </div>
   </div>
</div>
<div class="clearfix"></div><br>
{{-- dietary_request_other --}}
<div class="form-group" id="dietary_request_other_column">
   <div class="col-sm-9 col-sm-offset-3">
      <p class="help-block">Please Describe<?=$req?></p>
      <textarea name="dietary_request_other" class="form-control number-control" id="dietary_request_other" placeholder="Please Describe">
      </textarea>
   </div>
</div>
<div class="clearfix"></div><br>
{{-- avatar --}}
<div class="form-group">
   <label class="col-sm-3 control-label">Please upload a picture of yourself<?=$req ?></label>
   <div class="col-sm-9">
      <input type="file" name="file" id="file" class="file-control" />
      <label for="file"><i class="fa fa-upload"></i> Choose a file</label>
      <p class="help-block">will be used for your badge, please send your passport size of photograph</p>
   </div>
</div>
<input type="hidden" name="member_type" value="{{Session::get('member_type')}}">
<input type="hidden" name="cost" value="{{Session::get('cost')}}">
<input type="hidden" name="phone" id="phoneFix" value="">
<input type="hidden" name="mobile" id="mobileFix" value="">
