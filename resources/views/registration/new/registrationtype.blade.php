@extends('registration.new.main')

@section('content')
   @if(Session::has('error'))
      <div class="alert alert-{{Session::get('error')['type']}}" role="alert">
         <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
         {{Session::get('error')['msg']}}
      </div>
   @endif
   <h1 class="header">Registration Type</h1>
   <p>
      Please note that part of the personal information below will appear on your delegate badge exactly as you have entered it. <br><br>
      Fields marked with an asterisk <font class="red">*</font>are mandatory fields throughout the registration process.
   </p>
   <form class="form-horizontal" action="{{action('RegisterController@atendeeInformation')}}" method="get" enctype="multipart/form-data">
      <div class="form-group">
        <label for="email">Email address<span class="red">*</span></label>
        <input required type="email" class="form-control" id="email" name="email" placeholder="Email">
      </div>
      @if(Session::has('registype'))
         You will continue registering as {{ucfirst(trans(DB::table('member_types')->where('id',Session::get('registype'))->pluck('name')))}}
         <br><br><br>
      @else
      <div class="form-group">
        <label for="email">Please select from the following options:<span class="red">*</span></label>
        @foreach($member_types as $mt)
           {{-- @if($mt->id != '8') --}}
           <div class="radio" id="radio_{{$mt->id}}">
              <label>
                 <input required class="radioInput" type="radio" name="member_type" id="optionsRadios_{{$mt->id}}" data-cost="{{$mt->cost}}" value="{{$mt->id}}"
                     @if(Session::has('registype'))
                        @if (Session::get('registype') == 'delegate' && $mt->id =='1')checked
                        @elseif(Session::get('registype') == 'companion' && $mt->id =='9')checked
                        @endif
                     @endif
                  >
                 {{$mt->name}}
                 @if($mt->cost != 0)
                       <span class="badge">IDR {{number_format($mt->cost ,2,',','.')}}</span><sup>*Early Bird Registration until July 1<sup>st</sup> 2016</sup>
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
      @endif
      @if(Session::has('registype'))
         <input type="hidden" name="member_type" value="{{Session::get('registype')}}" id="member_type">
         <input type="hidden" name="cost" value="{{DB::table('member_types')->where('id',Session::get('registype'))->pluck('cost')}}" id="cost_input">
         <center><b>Total Cost : </b><span id="totalcost">IDR {{number_format(DB::table('member_types')->where('id',Session::get('registype'))->pluck('cost'),2,',','.')}}</span></center>
      @else
         <input type="hidden" name="cost" value="" id="cost_input">
         <center><b>Total Cost : </b><span id="totalcost"></span></center>
      @endif
      <input type="hidden" name="_token" value="{{csrf_token()}}">
      <ul class="pager wizard">
           <li class="previous"><a href="#">Previous</a></li>
           <li class="next"><button class="btn btn-primary" type="submit">Next</button></li>
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

   return "IDR " + x1 + x2 +",00";
}
   $(document).ready(function()
   {
      var president = "{{DB::table('member_presets')->where('position','fai_president')->pluck('email')}}";
      // $('#email').on('input', function(event)
      // {
      //    if ($(this).val() == president)
      //    {
      //       $('#radio_2').removeClass('disabled');
      //       $('#optionsRadios_2').removeAttr('disabled');
      //    }
      // })
      //
      // $('input[name=member_type]').change(function()
      // {
      //    $("#totalcost").text(rupiah($(this).data('cost')));
      // });
      // $('form').validate({
      //    rules:{
      //       email:{
      //          required:true,
      //          email:true
      //       }
      //       member_type: 'required'
      //    },
      //    submitHandler:function(form)
      //    {
      //          form.submit();
      //    }
      // });
      $(".radioInput").click(function()
      {
         console.log($(this).data('cost'));
         $("#totalcost").text(rupiah($(this).data('cost')))
         $("#cost_input").text($(this).data('cost'))
      });
   });
   </script>
@endsection
