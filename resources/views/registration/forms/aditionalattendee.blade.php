<div class="form-group">
   <label class="col-sm-3 control-label">Register additional attendee?<span class="red">*</span></label>
   <div class="col-sm-9">
      <div class="radio">
         <label>
            <input required type="radio" name="subatendee" id="subatendee_no" value="no" checked>
            no
         </label>
      </div>
      <div class="radio">
         <label>
            <input type="radio" name="subatendee" id="subatendee_yes" value="yes">
            yes
         </label>
      </div>
   </div>
</div>
<div id="subatendees">
   <table class="table table-stripped" id="subatendees_table">
      <thead>
         <th>name</th>
         <th>email</th>
      </thead>
      <tbody>
         <tr>
            <td id="name_field_1">
               <input name="name_1" id="subatendee_name_1" class="form-control">
            </td>
            <td id="email_field_1">
               <input type="email" name="email_1" id="subatendee_email_1" class="form-control">
            </td>
            <td>
               <button type="button" class="btn btn-primary" id="okperson_button" data-action="none" name="button"><span class="glyphicon glyphicon-ok"></span> Submit</button>
            </td>
         </tr>
      </tbody>
   </table>
   <table>
      <tfoot>
         <th>
            <span class="help-block">Click ok to register a person or click add to register new person </span>
         </th>
      </tfoot>
   </table>
   <button type="button" class="btn btn-primary" id="addperson_button" data-action="add" name="button"><span class="glyphicon glyphicon-plus"></span> Add</button>
</div>
