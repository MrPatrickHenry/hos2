  <!-- End of Table-to-load-the-data Part -->
            <!-- Modal (Pop up when detail button clicked) -->
            <div class="modal animated slideInRight" id="AddSponsorModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                            <h1 class="modal-title" id="myModalLabel">Add Sponsor</h1>
                        </div>
  <div class="modal-body">

<form name="frmPackageItem" class="form-horizontal" method="POST" action="/api/v1/sponsor/create" id='addsponsor'>
  
  <input type="text" name="Company_Signed" value="" autofocus placeholder="Company_Signed">

  <select name="Level">
  <option ng-repeat="x in packages" value="@{{x.ID}}">@{{ x.PackageName }}</option>
  
</select>
  
<input type="text" name="amount" value="" autofocus placeholder="Enter Package Value">

  <select name="Event">
  <option ng-repeat="x in events" value="@{{x.ID}}">@{{ x.EventName }}</option>
  

<input type="text" name="_of_Symp_Tix_Included_in_Package" value="" autofocus placeholder="Tickets">

 <input type="text" name="Contact_Name" value="" autofocus placeholder="Contact Name">

 <input type="text" name="Contact_Email" value="" autofocus placeholder="Contact Email">

 <input type="text" name="RM_Staff_Rep" value="" autofocus placeholder="RM_Staff_Rep">

  <label>Notes</label>
  <textarea rows="4" cols="75" name="Notes" required placeholder="Notes on Sponsorship"> </textarea>

  <input type="submit" class="btn btn-primary waves-effect waves-light" id="btn-save" value="Save">
  </form>
  </div>

                    </div>
                </div>
            </div>
        </div>