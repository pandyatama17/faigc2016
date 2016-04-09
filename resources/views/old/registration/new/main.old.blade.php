@extends('layouts.modules.registration')
@section('page')
   <link rel="stylesheet" href="{{asset('plugins/bootstrap-wizard/prettify.css')}}" media="screen">
   <form method="post" action="register" id="rootwizard">
   	<div class="navbar">
   	  <div class="navbar-inner">
   	    <div class="container">
             <ul>
                <li><a href="#tab1" data-toggle="tab">Personal Data</a></li>
                <li><a href="#tab2" data-toggle="tab">Program</a></li>
                <li><a href="#tab3" data-toggle="tab">Hotel Reservation</a></li>
                <li><a href="#tab4" data-toggle="tab">Travel Details</a></li>
                <li><a href="#tab5" data-toggle="tab">Aditional Atendees</a></li>
                <li><a href="#tab6" data-toggle="tab">Payment</a></li>
                <li><a href="#tab7" data-toggle="tab">Registration Record</a></li>
             </ul>
          </div>
       </div>
   </div>
   <div class="tab-content">
      <div class="tab-pane" id="tab1">
         <h1>Personal Data</h1>
         <p>
            Please note that part of the personal information below will appear on your delegate badge exactly as you have entered it.
            <br><br>
            Fields marked with an asterisk *are mandatory fields throughout the registration process.
            <br>
            <div class="form-group">
               <label for="exampleInputEmail1">Email address</label>
               <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
            </div>
            <div class="form-group">
               <label for="exampleInputEmail1">Email address</label>
               <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
            </div>
         </p>
      </div>
   	<div class="tab-pane" id="tab2">
   	      2
   	</div>
   	<div class="tab-pane" id="tab3">
   			3
      </div>
   	<div class="tab-pane" id="tab4">
   			4
      </div>
   	<div class="tab-pane" id="tab5">
   			5
      </div>
   	<div class="tab-pane" id="tab6">
   			6
      </div>
   	<div class="tab-pane" id="tab7">
   			7
       </div>
       <ul class="pager wizard">
   	     <li class="previous first" style="display:none;"><a href="#">First</a></li>
   			<li class="previous"><a href="#">Previous</a></li>
   			<li class="next last" style="display:none;"><a href="#">Last</a></li>
   		  	<li class="next"><a href="#">Next</a></li>
   		</ul>
   	</div>
   </form>

   <script src="{{asset('plugins/bootstrap-wizard/jquery.bootstrap.wizard.min.js')}}"></script>
   <script type="text/javascript">
   $(document).ready(function() {
   $('#rootwizard').bootstrapWizard();
   });
   </script>
@endsection
