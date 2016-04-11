@extends('layouts.bootstrap.container')

@section('page')
   <?php
      function random_color_part()
      {
          return str_pad( dechex( mt_rand( 0, 255 ) ), 2, '0', STR_PAD_LEFT);
      }

      function random_color()
      {
        return random_color_part() . random_color_part() . random_color_part();
      }
   ?>
   <h4 class="header">CONFERENCE SCHEDULE</h4>
   <div class="clearfix"></div>
   <p>
      All conference will be held at <strong>THE WESTIN HOTEL &amp; RESORT NUSA DUA BALI</strong>
   </p>
   <table class="table table-striped table-hover">
      <thead>
         <tr class="gray-bg">
            <th>NO.</th>
            <th>DATE</th>
            <th>ROOM</th>
            <th>PROGAMME</th>
         </tr>
      </thead>
      <tbody class="list-schedule">
         <tr>
            <td>{{$num++}}</td>
            <td>Monday, 10 October 2016</td>
            <td class="haslist">
               <ul>
                  <li>Surabaya room</li>
                  <li>Bandung room</li>
               </ul>
            </td>
            <td class="haslist">
               <ul>
                  <li>FAI Executive Board Meeting</li>
                  <li>Informal Commission Presidents' Group Meeting</li>
               </ul>
            </td>
         </tr>
         <tr>
            <td>{{$num++}}</td>
            <td>Tuesday, 11 October 2016</td>
            <td class="haslist">
               <ul>
                  <li>Jakarta room</li>
               </ul>
            </td>
            <td class="haslist">
               <ul>
                  <li>Commission Presidents' Group Meeting</li>
               </ul>
            </td>
         </tr>
         <tr>
            <td>{{$num++}}</td>
            <td>Wednesday, 12 October 2016</td>
            <td class="haslist">
               <ul>
                  <li>Jakarta Room A</li>
                  <li>Surabaya room</li>
                  <li>Bandung room</li>
               </ul>
            </td>
            <td class="haslist">
               <ul>
                  <li>CASI Meeting</li>
                  <li>Statutes Working Group Meeting</li>
                  <li>Additional Working Group Meeting</li>
               </ul>
            </td>
         </tr>
         <tr>
            <td>{{$num++}}</td>
            <td>Thursday, 13 October 2016</td>
            <td class="haslist">
               <ul>
                  <li>Hibicus room, Frangipani room,<br>Bougenvile, Orchird, Bandung</li>
                  <li>Nusantara room</li>
               </ul>
            </td>
            <td class="haslist">
               <ul>
                  <li>Workshops (5 room)<br>&nbsp;</li>
                  <li><b>Joint Award Ceremony &amp; Opening Dinner</b></li>
               </ul>
            </td>
         </tr>
         <tr>
            <td>{{$num++}}</td>
            <td>Friday, 14 October 2016</td>
            <td class="haslist">
               <ul>
                  <li>Nusantara room</li>
               </ul>
            </td>
            <td class="haslist">
               <ul>
                  <li>Plenary Session</li>
               </ul>
            </td>
         </tr>
         <tr>
            <td>{{$num++}}</td>
            <td>Saturday, 15 October 2016</td>
            <td class="haslist">
               <ul>
                  <li>Nusantara</li>
                  <li>Jakarta room</li>
                  <li>Temple Garden</li>
               </ul>
            </td>
            <td class="haslist">
               <ul>
                  <li>Plenary Session</li>
                  <li>CASI Meeting</li>
                  <li>Closing Ceremony &amp; Gala Dinner</li>
               </ul>
            </td>
         </tr>
         <tr>
            <td>{{$num++}}</td>
            <td>Sunday, 16 October 2016</td>
            <td class="haslist">
               <ul>
                  <li>Bandung room</li>
               </ul>
            </td>
            <td class="haslist">
               <ul>
                  <li>Executive Board Meeting</li>
                  <li>Full day tour for delegation and accompanying Person</li>
               </ul>
            </td>
         </tr>
      </tbody>
   </table>
   <script type="text/javascript">
      document.title = "FAI GENERAL CONFERENCE 2016 BALI | Conference Schedule"
   </script>
@endsection
