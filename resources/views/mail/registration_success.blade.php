<div class="mail-wrapper"  style="color:#092567; line-spacing:0px; font-size:14pt;">
   <center><h1>Registration Success!</h1></center>
   <br>
   <p>
      you have been registered with the following record:
   </p>
   <div class="mail-wrapper"  style="color:#092567; font-size:14pt;">
      <p>
         <h2 class="header" style="color:#092567; margin-bottom:0px;">Confirmation</h2>

         <h3 style="color:#1292DC; margin-top:0px;">110<sup>th</sup> FAI Conference, Bali – Indonesia</h3>
         <br>
         Dear {{$title}} {{$first_name}} {{$family_name}},
         <br><br>

         Thank you for registering to attend the 110<sup>th</sup>  FAI Conference on 13<sup>th</sup> &ndash; 15<sup>th</sup> 2016
         <br><br>
         This e-mail is a confirmation of your registration only and not a proof <br>of your payment settlement.
         <br><br>
         Your registration identification is : <span style="color:black;text-decoration:underline; -moz-text-decoration-color: #092567; text-decoration-color: #092567;"><b>{{$key}}</b></span>. 
         <br><br>
         Please continue with the payment process. If you choose to make the
         <br>
         payment with bank transfer please mention your registration
         <br>
         identification code into the Bank transfer form.
         <br><br>
         <span class="red">Time limit for early payment is before 1<sup>st</sup> of July 2016</span>
         <br><br>
         your payment link is <u><strong><a href="{{url('payment/dopayment&id='.$id)}}">{{url('payment/dopayment&id='.$id)}}</a></strong></u>
         <br><br>
         We will send you an email of payment confirmation after we received
         <br>
         your payment
         <br><br>
         We look forward to seeing you at Bali.
         <br><br><br>
         Best regards,
         <br>
         <span style="color:#1292DC; ">Committee of <b>110<sup>th</sup> FAI Conference, Bali – Indonesia</b></span>
         <br><br>
      </p>
   </div>
</div>
