<table class="table table-stripped table-bordered table-hover">
   {{-- @foreach($programs as $p)
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
                        <input type="radio" class="flat-green" name="program_{{$child->id}}" value="1" checked>
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
                        <input type="radio" class="flat-green" name="program_{{$child->id}}" value="0">
                        no, i will not attend
                     </label>
                  </div>
               </td>
            </tr>
         @endforeach
      </tbody>
   @endforeach --}}
   <thead>
      <th colspan="2" style="background:#6E9C20;color:white">Day 1 (13 October 2016)</th>
   </thead>
   <tbody>
      <tr>
         <td><span class="pull-right">19:00</span></td>
         <td><strong>FAI Awards Ceremony and Opening Dinner</strong></td>
      </tr>
      <tr>
         <td>

         </td>
         <td>
            <div class="radio">
               <label>
                  <input type="radio" class="flat-green" name="program_2" value="1" checked>
                  yes, i will attend
               </label>
            </div>
            <div class="radio">
               <label>
                  <input type="radio" class="flat-green" name="program_2" value="0">
                  no, i will not attend
               </label>
            </div>
         </td>
      </tr>
   </tbody>
   <thead>
      <th colspan="2" style="background:#6E9C20;color:white">Day 3 (15 October 2016)</th>
   </thead>
   <tbody>
      <tr>
         <td><span class="pull-right">19:00</span></td>
         <td><strong>Closing &amp; Gala Dinner</strong></td>
      </tr>
      <tr>
         <td>

         </td>
         <td>
            <div class="radio">
               <label>
                  <input type="radio" class="flat-green" name="program_4" value="1" checked>
                  yes, i will attend
               </label>
            </div>
            <div class="radio">
               <label>
                  <input type="radio" class="flat-green" name="program_4" value="0">
                  no, i will not attend
               </label>
            </div>
         </td>
      </tr>
   </tbody>
</table>
