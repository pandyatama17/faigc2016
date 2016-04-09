<div class="box">
      <div class="box-body">
         <div class="row">
            <div class="col-xs-12 col-lg-3">
                  <img src="{{asset('images/members/'.$member->avatar)}}" alt="Member Avatar" class="img-responsive img-thumbnail"/>
               <table class="table">
                  <tbody>
                     <tr>
                        <td><i class="fa fa-envelope"></i> </td>
                        <td>{{$member->email}}</td>
                     </tr>
                     <tr>
                        <td><i class="fa fa-mobile"></i> </td>
                        <td>{{$member->mobile}}</td>
                     </tr>
                     @if($member->phone !="")
                        <tr>
                           <td><i class="fa fa-phone"></i> </td>
                           <td>{{$member->phone}}</td>
                        </tr>
                     @endif
                     @if($member->fax != "")
                        <tr>
                           <td><i class="fa fa-fax"></i> </td>
                           <td>{{$member->fax}}</td>
                        </tr>
                     @endif
                     <tr>
                        <td><i class="fa fa-map-marker"></i> </td>
                        <td>{{$member->address_line_1}}</td>
                     </tr>
                     @if($member->address_line_2 !="")
                        <tr>
                           <td>&nbsp;</td>
                           <td>{{$member->address_line_2}}</td>
                        </tr>
                     @endif
                     <tr>
                        <td><i class="fa fa-user"></i></td>
                        <td>{{DB::table('member_types')->where('id', $member->member_type)->pluck('name')}}</td>
                     </tr>
                     <tr>
                        @if($member->valid == 1)
                           <td><i class="fa fa-check"></i></td>
                           <td><span class="label label-success">Done</span></td>
                        @else
                           <td><i class="fa fa-warning"></i></td>
                           <td><span class="label label-warning">Pending</span></td>
                        @endif
                     </tr>
                  </tbody>
               </table>
            </div>
            <div class="col-xs-12 col-lg-9">
               <h1 class="header">{{$member->title}} {{$member->first_name}} {{$member->family_name}}</h1>
               <hr>
               <h3 class="header">Basic Information</h3>
               <table class="table table-stripped">
                  <tbody>
                     <tr>
                        <td>First Name</td>
                        <td>:</td>
                        <td>{{$member->first_name}}</td>
                     </tr>
                     <tr>
                        <td>Family Name</td>
                        <td>:</td>
                        <td>{{$member->family_name}}</td>
                     </tr>
                     <tr>
                        <td>Title</td>
                        <td>:</td>
                        <td>{{$member->title}}</td>
                     </tr>
                     <tr>
                        <td>Gender</td>
                        <td>:</td>
                        <td>{{ucfirst(trans($member->gender))}}</td>
                     </tr>
                     <tr>
                        <td>Passport Number</td>
                        <td>:</td>
                        <td>{{$member->passport_number}}</td>
                     </tr>
                     <tr>
                        <td>Nationality</td>
                        <td>:</td>
                        <td><span class="label label-nationality"><span id="country-flag"></span> <span id="current-country">{{$member->country}}</span></span></td>
                     </tr>
                     <tr>
                        <td>City</td>
                        <td>:</td>
                        <td>{{$member->city}}</td>
                     </tr>
                     <tr>
                        <td>Zip/Postal Code</td>
                        <td>:</td>
                        <td>{{$member->zip}}</td>
                     </tr>
                     <tr>
                        <td>Address Line 1</td>
                        <td>:</td>
                        <td>{{$member->address_line_1}}</td>
                     </tr>
                     <tr>
                        <td>Address Line 2</td>
                        <td>:</td>
                        <td>{{$member->address_line_2}}</td>
                     </tr>
                  </tbody>
               </table>
            </div>

            <div class="col-lg-6 col-xs-12">
               <h3 class="header">Registration Information</h3>
               <table class="table table-stripped">
                  <tbody>
                     <tr>
                        <td>Registered as</td>
                        <td>:</td>
                        <td>{{DB::table('member_types')->where('id', $member->member_type)->pluck('name')}}</td>
                     </tr>
                     <tr>
                        <td>Registration Key</td>
                        <td>:</td>
                        <td>{{$member->key}}</td>
                     </tr>
                     <tr>
                        <td>Payment Status</td>
                        <td>:</td>
                        @if($member->valid == 1)
                           <td><span class="label label-success">Done</span></td>
                        @else
                           <td><span class="label label-warning">Pending</span></td>
                        @endif
                     </tr>
                  </tbody>
               </table>
            </div>
            <div class="col-lg-6 col-xs-12">
               <h3 class="header">Contact Information</h3>
               <table class="table table-stripped">
                  <tbody>
                     <tr>
                        <td>Email</td>
                        <td>:</td>
                        <td>{{$member->email}}</td>
                     </tr>
                     @if($member->cc_email !="")
                        <tr>
                           <td>CC Email</td>
                           <td>:</td>
                           <td>{{$member->cc_email}}</td>
                        </tr>
                     @endif
                     <tr>
                        <td>Mobile Number</td>
                        <td>:</td>
                        <td>{{$member->mobile}}</td>
                     </tr>
                     @if($member->phone !="")
                        <tr>
                           <td>Phone Number</td>
                           <td>:</td>
                           <td>{{$member->phone}}</td>
                        </tr>
                     @endif
                     @if($member->fax != "")
                        <tr>
                           <td>Fax</td>
                           <td>:</td>
                           <td>{{$member->fax}}</td>
                        </tr>
                     @endif
                     <tr>
                        <td>Organisation</td>
                        <td>:</td>
                        <td>{{$member->organisation}}</td>
                     </tr>
                  </tbody>
               </table>
            </div>
            <div class="col-lg-6 col-xs-12">
               <h3 class="header">Work Information</h3>
               <table class="table table-stripped">
                  <tbody>
                     <tr>
                        <td>Job Title</td>
                        <td>:</td>
                        <td>{{$member->job_title}}</td>
                     </tr>
                     <tr>
                        <td>Organisation</td>
                        <td>:</td>
                        <td>{{$member->organisation}}</td>
                     </tr>
                     <tr>
                        <td>Department</td>
                        <td>:</td>
                        <td>{{$member->department}}</td>
                     </tr>
                  </tbody>
               </table>
            </div>
            @if($hotel != "")
               <div class="col-lg-6 col-xs-12">
                  <h3 class="header">Hotel Information</h3>
                  <table class="table table-stripped">
                     <tr>
                        <td>Hotel Booking</td>
                        <td>:</td>
                        <td>Yes</td>
                     </tr>
                     <tr>
                        <td>Room(s)</td>
                        <td>:</td>
                        <td>{{$hotel->rooms}}</td>
                     </tr>
                     <tr>
                        <td>Room Preference</td>
                        <td>:</td>
                        <td>{{$hotel->preference}}</td>
                     </tr>
                     <tr>
                        <td>Check In Date</td>
                        <td>:</td>
                        <td>{{$hotel->check_in}}</td>
                     </tr>
                     <tr>
                        <td>Check Out Date</td>
                        <td>:</td>
                        <td>{{$hotel->check_out}}</td>
                     </tr>
                  </table>
               </div>
            @endif
            @if(count($sub)>0)
               <div class="col-lg-6 col-xs-12">
                  <h3 class="header">Aditional @if(count($sub)>1)Attendees @else Attendee @endif </h3>
                  <table class="table table-striped">
                     <thead>
                        <tr>
                           <td>#</td>
                           <td>Name</td>
                           <td>Email</td>
                        </tr>
                     </thead>
                     <tbody>
                        <?php $i = 1 ?>
                        @foreach($sub as $s)
                           <tr>
                              <td>{{$i}}</td>
                              <td>{{$s->name}}</td>
                              <td>{{$s->email}}</td>
                           </tr>
                           <?php $i++ ?>
                        @endforeach
                     </tbody>
                  </table>
               </div>
            @endif
            <div class="col-lg-6 col-xs-12">
               <h3 class="header">Other Information</h3>
               <table class="table table-stripped">
                  <tr>
                     <td>Dietary Request</td>
                     <td>:</td>
                     <td>{{$member->dietary_request}}</td>
                  </tr>
                  @if($member->dietary_request == "other")
                     <tr>
                        <td>Description</td>
                        <td>:</td>
                        <td>{{$member->deitary_request_other}}</td>
                     </tr>
                  @endif
               </table>
            </div>
            @if(count($mp)>0)
               <div class="col-lg-6 col-xs-12">
                  <h3 class="header"> @if(count($sub)>1)Programs @else Program @endif  Attended</h3>
                  <table class="table table-stripped">
                     <table class="table table-striped">
                        <thead>
                           <tr>
                              <td>#</td>
                              <td>Program ID</td>
                           </tr>
                        </thead>
                        <tbody>
                           <?php $i = 1 ?>
                           @foreach($mp as $members)
                              <tr>
                                 <td>{{$i}}</td>
                                 <td>{{DB::table('program_child')->where('id',$members->program_id)->pluck('title')}}</td>
                              </tr>
                              <?php $i++ ?>
                           @endforeach
                        </tbody>
                     </table>
               </div>
            @endif
         </div>
      </div>
   </div>
