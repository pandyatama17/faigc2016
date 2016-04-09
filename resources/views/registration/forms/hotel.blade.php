      <div class="form-group">
         <label for="email" class="col-sm-3 control-label">Hotel Reservation<span class="red">*</span></label>
         <div class="col-sm-9">
            <div class="radio">
               <label>
                  <input type="radio" name="hotel" id="hotel_westin" value="1">
                  Westin Nusa Dua Bali <span class="badge">IDR 3.000.000,00</span>/<sup>room per night</sup>
               </label>
            </div>
            <div class="radio">
               <label>
                  <input type="radio" name="hotel" id="hotel_none" value="none" checked>
                  No Lodging Required
               </label>
            </div>
         </div>
      </div>
      <div class="" id="reserve">
         <div class="form-group">
            <label for="" class="col-sm-3 control-label">Number of Rooms</label>
            <div class="col-sm-9">
               <input  type="number" min='1' name="rooms" class="form-control" id="rooms" placeholder="Number of Rooms" value='1'>
            </div>
         </div>
         <div class="form-group">
            <label class="col-sm-3 control-label">Preference<span class="red">*</span></label>
            <div class="col-sm-9">
               <div class="radio">
                  <label>
                     <input type="radio" name="preference" id="preference_single" value="single">
                     Single
                  </label>
               </div>
               <div class="radio">
                  <label>
                     <input type="radio" name="preference" id="preference_double" value="double">
                     Double
                  </label>
               </div>
            </div>
         </div>
         <div class="form-group">
            <label for="" class="col-sm-3 control-label">Check in</label>
            <div class="col-sm-9">
               <input  type="text" name="checkin" class="form-control datepicker" id="checkin" placeholder="Check in date">
            </div>
         </div>
         <div class="form-group">
            <label for="" class="col-sm-3 control-label">Check out</label>
            <div class="col-sm-9">
               <input  type="text" name="checkout" class="form-control datepicker" id="checkout" placeholder="Check out date">
            </div>
         </div>
         <div class="form-group">
            <div class="col-sm-9 col-sm-offset-3">
               <span class="help-block">You will stay for <span id="totaldays"></span> night(s)</span>
            </div>
         </div>
      </div>
