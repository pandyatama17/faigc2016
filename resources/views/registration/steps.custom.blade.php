@extends('layouts.bootstrap.container')
@section('page')
   <link rel="stylesheet" href="{{asset('plugins/steps/jquery.steps.css')}}">
   <link rel="stylesheet" href="{{asset('plugins/iCheck/all.css')}}">
   <link rel="stylesheet" href="{{asset('plugins/country-select/build/css/countrySelect.css')}}" media="screen">
   <link rel="stylesheet" href="{{asset('plugins/intlTelInput/build/css/intlTelInput.css')}}" media="screen">
   <link rel="stylesheet" href="{{asset('css/steps.custom.css')}}" media="screen">
   <script src="{{asset('plugins/steps/jquery.steps.min.js')}}" charset="utf-8"></script>
   <script src="{{asset('plugins/validate/jquery.validate.min.js')}}" charset="utf-8"></script>
   <script src="{{asset('plugins/iCheck/icheck.min.js')}}" charset="utf-8"></script>
   <script src="{{asset('plugins/country-select/build/js/countrySelect.min.js')}}" charset="utf-8"></script>
   <script src="{{asset('plugins/intlTelInput/build/js/intlTelInput.min.js')}}" charset="utf-8"></script>
   <script src="{{asset('plugins/intlTelInput/build/js/utils.js')}}" charset="utf-8"></script>
   <script src="{{asset('js/steps.custom.js')}}" charset="utf-8"></script>
   <div class="steps">
      <ul class="blue 5steps">
         <li class="current"><a href="#"><em>Step 1</em><span>Description 1</span></a></li>
         <li class=""><a href="#"><em>Step 2</em><span>Description 2</span></a></li>
         <li class=""><a href="#"><em>Step 3</em><span>Descripci&oacute;n del paso 1</span></a></li>
         <li class=""><a href="#"><em>Step 4</em><span></span></a></li>
         <li class="end"><a href="#"><em>Step 5</em><span></span></a></li>
      </ul>
   </div>
   <span style="clear:both; display:block;">&nbsp;</span>

    <input class="btn btn-danger" type="button" value="Start over" onclick="$('.steps').steps('start');"/>
    <input class="btn btn-warning" type="button" value="<< Prev" onclick="$('.steps').steps('prev');"/>
    <input class="btn btn-primary" type="button" value="Next >>" onclick="$('.steps').steps('next');"/>
    <input class="btn btn-success" type="button" value="Finish" onclick="$('.steps').steps('finish');"/>
@endsection
