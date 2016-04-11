@extends('layouts.modules.registration')

@section('content')
   <center>
      <a href="/register/welcome" class="btn btn-lg btn-orange btn-flat" name="button">REGISTER NOW!</a>
   </center>
   <br><br>
   <div class="row">
      {{-- Delegate --}}
      <div class="col-md-5 col-md-offset-1">
         <div class="panel panel-ticket">
            <div class="panel-heading">&nbsp;<br>DELEGATE <br>&nbsp;</div>
            <div class="panel-body">
               <i style="color:red">Early payment (before July 1<sup>st</sup>)</i>
               <br>
               <b>IDR 5.000.000,-</b>
               <br>
               <i style="color:red">Regular payment (starting July 1<sup>st</sup>)</i>
               <br>
               <b>IDR 6.000.000,-</b>
            </div>
            <div class="panel-footer" data-toggle="tooltip" data-placement="bottom" title="Early Bird Registration until <br> July 1<sup>st</sup> 2016">
               <a href="{{url('register/delegate')}}">BOOK NOW!</a>
            </div>
         </div>
      </div>

      {{-- FAI COMPANIONS OF HONOUR --}}
      <div class="col-md-5">
         <div class="panel panel-ticket">
            <div class="panel-heading">FAI COMPANIONS OF HONOUR <br>&amp;<br> ACCOMPANYING PERSONS</div>
            <div class="panel-body">
               <i style="color:red">Early payment (before July 1<sup>st</sup>)</i>
               <br>
               <b>IDR 3.000.000,-</b>
               <br>
               <i style="color:red">Regular payment (starting July 1<sup>st</sup>)</i>
               <br>
               <b>IDR 4.000.000,-</b>
            </div>
            <div class="panel-footer" data-toggle="tooltip" data-placement="bottom" title="Early Bird Registration until <br> July 1<sup>st</sup> 2016">
               <a href="{{url('register/companion')}}">BOOK NOW!</a>
            </div>
         </div>
      </div>

      {{-- ACCOMPANYING PERSON --}}
      {{-- <div class="col-md-4">
         <div class="panel panel-ticket">
            <div class="panel-heading">ACCOMPANYING PERSON</div>
            <div class="panel-body">
               <i>Early payment fee (before July 2nd)</i>
               <br>
               <b>$ 300</b>
               <br>
               <i>Regular registration fee (starting July 2nd)</i>
               <br>
               <b>$ 350</b>
            </div>
            <div class="panel-footer">
               <a href="#">BOOK NOW!</a>
            </div>
         </div>
      </div> --}}
   </div>
   <br><br>
   <div class="col-md-12">
      <p class="lead">
         <div class="col-md-12">
            <span class="lead"><b>These fees include:</b></span>
            <table class="table">
               <thead class="text-center ">
                  <tr>
                     <td><strong>No.</strong></td>
                     <td><strong>Remark</strong></td>
                     <td><strong>Date</strong></td>
                  </tr>
               </thead>
               <tbody>
                  <tr>
                     <td>1.</td>
                     <td>
                        Meals provided as part of the conference program :
                        <ol type="a">
                           <li>2 lunches including drinks (non alcohol) &amp; coffee break each day</li>
                           <li>2 dinners and a reception including drinks (non alcohol)</li>
                        </ol>
                     </td>
                     <td>
                        <br>
                        <ul class="hidden-bullet">
                           <li>October 14<sup>th</sup> &amp; 15<sup>th</sup> 2016</li>
                           <li>October 13<sup>th</sup> &amp; 15<sup>th</sup> 2016</li>
                        </ul>
                     </td>
                  </tr>
                  <tr>
                     <td>2.</td>
                     <td>
                        All local transport during the conference, as required by the booked program.
                     </td>
                     <td>
                        <ul class="hidden-bullet">
                           <li>October 9<sup>th</sup> &mdash; 17<sup>th</sup> 2016</li>
                        </ul>
                     </td>
                  </tr>
                  <tr>
                     <td>3.</td>
                     <td>
                        All conference documentation and badges.
                     </td>
                     <td>
                        <ul class="hidden-bullet">
                           <li>October 13<sup>th</sup> &mdash; 15<sup>th</sup>  2016</li>
                        </ul>
                     </td>
                  </tr>
                  <tr>
                     <td>4.</td>
                     <td>
                        Free Internet use in the conference hotel.
                     </td>
                     <td>
                        <ul class="hidden-bullet">
                           <li>October 13<sup>th</sup> &mdash; 15<sup>th</sup> 2016</li>
                        </ul>
                     </td>
                  </tr>
                  <tr>
                     <td>5.</td>
                     <td>
                        Excursion / show on last day.
                     </td>
                     <td>
                        <ul class="hidden-bullet">
                           <li>October 16<sup>th</sup> 2016</li>
                        </ul>
                     </td>
                  </tr>
               </tbody>
            </table>
         </div>
         <div class="col-md-12">
            <br><br>
         </div>
         <div class="clearfix"></div>
         <div class="col-md-12">
            <span class="lead"><b>Term of Condition</b></span>
            <ul style="font-size:12pt">
               <li><b>Payment with Credit Card subject to additional 3.63% for credit card administration</b></li>
            {{-- </ul> 
         </div>
         <div class="clearfix"></div>
         <div class="col-md-12">
            <span class="lead"><b>Cancellation policy registration fee</b></span>
            <ul style="font-size:12pt"> --}}
               <li>Cancellation of an accepted application needs to be done in writing to Organizing Comitee of FAIGC 2016.</li>
               <li>In case of cancellation before or on June 23<sup>th</sup>, 2016, 75% of the
               registration fee will be refunded.</li>
               <li>In case of cancellation between June 24<sup>th</sup>, 2016 until 23<sup>th</sup> August, 2016, registration fee minus IDR 3.000.000,- handling costs will be refunded. </li>
               <li>There will be no refund if cancellation is received after August 23<sup>th</sup> 2016, or if the applicant fails to attend the conference for any reason.</li>
            </ul> 
         </div>

      </p>
   </div>

@endsection
