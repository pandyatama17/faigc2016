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
   <table id="subattendee_table" class="table">
      <tr>
         <td>No.</td>
         <td>Name</td>
         <td>Email</td>
      </tr>
   </table>
   <button type="button" onclick="addRow();" class="btn btn-success" id="addBtn">Add</button>
   <button type="button" onclick="removeRow();" class="btn btn-danger" id="removeBtn">Remove</button>
   <div class="clearfix"></div>
</div>
