@extends('registration.new.main')

@section('content')
   <h1 class="header">Registration Type</h1>
   <p>
      Please note that part of the personal information below will appear on your delegate badge exactly as you have entered it. <br><br>
      Fields marked with an asterisk <font class="red">*</font>are mandatory fields throughout the registration process.
   </p>
   <form class="form-horizontal" action="{{action('RegisterController@atendeeInformation')}}" method="get" enctype="multipart/form-data">
      <div class="form-group">
        <label for="email">Email address<span class="red">*</span></label>
        <input required type="email" class="form-control" id="email" name="email" placeholder="Email" value="{{$flow['email']}}">
      </div>
      <div class="form-group">
        <label for="email">Please select from the following options:<span class="red">*</span></label>
        @foreach($member_types as $mt)
           {{-- @if($mt->id != '8') --}}
           <div class="radio @if($mt->id == '2')disabled @endif" id="radio_{{$mt->id}}">
              <label>
                 <input required class="radioInput" type="radio" name="member_type" id="optionsRadios_{{$mt->id}}" data-cost="{{$mt->cost}}" value="{{$mt->id}}"
                     @if($mt->id == '2')disabled @endif
                     @if(Session::has('registype'))
                        @if (Session::get('registype') == 'delegate' && $mt->id =='1')checked
                        @elseif(Session::get('registype') == 'companion' && $mt->id =='9')checked
                        @endif
                     @endif
                  >
                 {{$mt->name}}
                 @if($mt->cost != 0)
                       <span class="badge">Rp. {{number_format($mt->cost ,2,',','.')}}</span><sup>*Early Bird Registration until July 1<sup>st</sup> 2016</sup>
                 @endif
                 <br>
                 @if(isset($mt->description))
                    <em>
                       {{$mt->description}}
                    </em>
                 @endif
              </label>
           </div>
        {{-- @endif --}}
        @endforeach
      </div>
      @if(Session::has('registype'))
        @if (Session::get('registype') == 'delegate')
           <center><b>Total Cost : </b><span id="totalcost">Rp. {{number_format(DB::table('member_types')->where('id','1')->pluck('cost'),2,',','.')}}</span></center>
        @elseif(Session::get('registype') == 'companion')
           <center><b>Total Cost : </b><span id="totalcost">Rp. {{number_format(DB::table('member_types')->where('id','9')->pluck('cost'),2,',','.')}}</span></center>
        @endif
        @else
           <center><b>Total Cost : </b><span id="totalcost"></span></center>
      @endif
      <input type="hidden" name="_token" value="{{csrf_token()}}">
      <ul class="pager wizard">
           <li class="previous"><a href="#">Previous</a></li>
           <li class="next"><a href="atendee_information">Next</a></li>
        </ul>
   </form>

   <script type="text/javascript">
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

   return "Rp. " + x1 + x2 +",00";
}
   $(document).ready(function()
   {
      var president = "{{DB::table('member_presets')->where('position','fai_president')->pluck('email')}}";
      $('#email').on('input', function(event)
      {
         if ($(this).val() == president)
         {
            $('#radio_2').removeClass('disabled');
            $('#optionsRadios_2').removeAttr('disabled');
         }
      })

      $('input[name=member_type]').change(function()
      {
         $("#totalcost").text(rupiah($(this).data('cost')));
      });
      $('form').validate({
         rules:{
            email:{
               required:true,
               email:true
            }
            member_type: 'required'
         },
         submitHandler:function(form)
         {
               form.submit();
         }
      })
   });

   </script>
@endsection
