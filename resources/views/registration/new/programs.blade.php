@extends('registration.new.main')

@section('content')
<form class="" action="{{action('RegisterController@storeProgram')}}" method="post">
   <table class="table table-stripped table-bordered table-hover">
      @foreach($programs as $p)
         <thead>
            <th colspan="2" style="background:#6E9C20;color:white">Day {{$p->day}} ({{$p->date}})</th>
         </thead>
         <tbody>
            @foreach(DB::table('program_child')->where('parent_id',$p->id)->get() as $child)
               <tr>
                  <td><span class="pull-right">{{$child->time}}</span></td>
                  <td><strong>{{$child->title}}</strong></td>
               </tr>
               <tr>
                  <td>

                  </td>
                  <td>
                     <div class="radio">
                        <label>
                           <input type="radio" name="program_{{$child->id}}" value="1" checked>
                           yes, i will attend
                           @if(isset($child->cost) && $child->cost != '0')
                              <span class="badge primary">&euro; {{number_format($child->cost ,2,'.','.')}}</span>
                           @endif
                           @if(isset($child->information))
                              <a href="{{$child->information}}" target="_blank">[More Information]</a>
                           @endif
                        </label>
                     </div>
                     <div class="radio">
                        <label>
                           <input type="radio" name="program_{{$child->id}}" value="0">
                           no, i will not attend
                        </label>
                     </div>
                  </td>
               </tr>
            @endforeach
      </tbody>
   @endforeach
   </table>
   <input type="hidden" name="uid" value="{{Session::get('uid')}}">
   <input type="hidden" name="_token" value="{{csrf_token()}}">
   <ul class="pager wizard">
        <li class="previous"><a href="{{url('register/atendee_information')}}">Previous</a></li>
        <li class="next"><button class="btn btn-primary" type="submit">Next</button></li>
     </ul>
</form>
@endsection
