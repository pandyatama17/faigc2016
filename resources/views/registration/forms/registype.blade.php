<div class="form-group">
 <label for="registype_email" class="control-label">Email address<span class="red">*</span></label>
 <div class="clearfix"></div>
 <div class="col-md-9">
    <input required type="email" class="form-control" id="registype_email" name="email" placeholder="Email">
 </div>
 <div class="col-md-3">
    <button type="button" onclick="verifyEmail()" class="btn btn-primary">Verify</button>
 </div>
 <div class="clearfix"></div>
</div>
@if(Session::has('registype'))
   You will continue registering as {{ucfirst(trans(DB::table('member_types')->where('id',Session::get('registype'))->pluck('name')))}}
   <br><br><br>
   <input type="hidden" name="regist_type" id="regist_type" value="{{Session::get('registype')}}">
@else
<div class="form-group">
 <label for="radio" class="control-label">Please select from the following options:<span class="red">*</span></label>
 @foreach($member_types as $mt)
     {{-- @if($mt->id != '8') --}}
     <div class="radio" id="radio_{{$mt->id}}">
        <label>
           <input required class="radioInput flat-green " type="radio" name="member_type" id="optionsRadios_{{$mt->id}}" data-cost="{{$mt->cost}}" value="{{$mt->id}}" data-type="{{$mt->id}}"
               @if(Session::has('registype'))
                  @if (Session::get('registype') == 'delegate' && $mt->id =='1')checked
                  @elseif(Session::get('registype') == 'companion' && $mt->id =='9')checked
                  @endif
               @endif
            >
           {{$mt->name}}
           @if($mt->cost != 0)
                 <span class="badge">IDR {{$mt->cost}},-</span><sup>*Early payment until July 1<sup>st</sup> 2016</sup>
           @endif
           <br>
           @if(isset($mt->description))
              <span class="help-block">
                 {{$mt->description}}
              </span>
           @endif
        </label>
     </div>
 {{-- @endif --}}
 @endforeach
 <input type="hidden" name="regist_type" id="regist_type" value="">
</div>
@endif
