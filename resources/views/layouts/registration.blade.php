<link type="text/css" rel="stylesheet" href="{{url()}}/css/page/registration.intro.css">
<link type="text/css" rel="stylesheet" href="{{url()}}/css/main.css">
<script src="{{asset('js/jquery.js')}}" charset="utf-8"></script>
   <body class="index">
      <table id="outer_table" width="750" cellspacing="0" cellpadding="0" align="center" bgcolor="#FFFFFF">
         <tbody>
            <tr>
               <td align="center">
                  <h1 role="banner">
                     <div class="logo-img-container" style="display: block; position:relative;width:750px;height:250px;">
                        <a target="_blank" href="http://www.faigc2015.com/">
                           <img src="{{url()}}/images/87842240b5112fb42e085ab67644652a_BannerFAIregistratiewebsite.png" border="0" alt="FAI General Conference 2015">
                        </a>
                     </div>
                  </h1>
               </td>
            </tr>
            <tr bgcolor="#FFFFFF">
               <td style="padding:5px;">
                  <div id="r-breadcrumbs" class="r-mobile">
                     <ul class="crumbs">
                        @foreach($crumbs as $crumb)
                           <li class="{{$crumb['class']}}">{{$crumb['title']}}</li>
                        @endforeach
                        <span class="r-count">
                           <span class="r-crumb-trigger fa fa-bars"></span>
                        </span>
                     </ul>
                  </div>
                  <table width="100%" cellspacing="0" cellpadding="2" id="orig-nav" class="r-desktop">
                     <tbody>
                        <tr>
                           @foreach($crumbs as $crumb)
                              <td align="center" width="{{intval(100/$static)}}%" class="{{$crumb['class']}}">{{$crumb['title']}}</td>
                              @if($control != 0)
                                 <td align="center">
                                    <img src="{{url()}}/pagecontrol/arrow.png" border="0" width="13" height="10" alt="arrow pointing to the right">
                                 </td>
                              @endif
                              <?php $control-- ?>
                           @endforeach

                        </tr>

                     </tbody>
                  </table>
               </td>
            </tr>
            <tr>
               <td bgcolor="#111C5A">
                  <table width="100%" cellspacing="0" cellpadding="2" class="reg-header-container">
                     <tbody>
                        <tr>
                           <td class="header" style="padding-left:15px;">FAI General Conference 2016 </td>
                        </tr>
                     </tbody>
                  </table>
               </td>
            </tr>
            <tr>
               <td id="inner_content" valign="top" style="padding:10px;height:100%;">
                  <table width="100%" cellspacing="0" cellpadding="0">
                     <tbody>
                        <tr>
                           <td valign="top">
                              @yield('page')
                           </td>
                        </tr>
                     </tbody>
                  </table>
               </td>
            </tr>
         </tbody>
      </table>
      <div id="selectdescription" style="display:none;position:absolute;border:1px solid #000000;width:300px;background:#FFFFFF;padding:5px;"></div>
      <div id="overlay" style="position:absolute;display:none;opacity:.75;filter:alpha(opacity=75);z-index:90;top:0;left:0;background-color:#000000;"></div>
      {{-- <script type="text/javascript">
          if (window.File && window.FileReader && window.FileList && window.Blob) {
              var clearFileInputField = function(container) {
                  container.innerHTML = container.innerHTML;
                  container.select('input:file').invoke('observe', 'change', handleOnFileChange);
              };
              var handleOnFileChange = function(evt) {
                  var files = evt.target.files;
                  if (!files) {
                      return;
                  }
                  for(var i=0; i < files.length; i++) {
                      if(files[i] && files[i].size > 52428800) {
                          evt.preventDefault();
                          clearFileInputField(this.up('tr'));
                          alert('file too big');
                          return false;
                      }
                  }
              };
            //   $('input:file').invoke('observe', 'change', handleOnFileChange);
          }
      </script> --}}
      <script type="text/javascript" src="{{url()}}/js/picker.js"></script>
      <script type="text/javascript" src="{{url()}}/js/picker.date.js"></script>
      <script type="text/javascript" src="{{url()}}/js/picker.time.js"></script>
      <script type="text/javascript" src="{{url()}}/js/legacy.js"></script>


      </body></html>
