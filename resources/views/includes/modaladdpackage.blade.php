  <!-- End of Table-to-load-the-data Part -->
            <!-- Modal (Pop up when detail button clicked) -->
            <div class="modal animated slideInRight" id="AddPackageModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                            <h1 class="modal-title" id="myModalLabel">Add a New Rakuten Marketing Packages</h1>
                        </div>
  <div class="modal-body">
<form name="frmEmployees" class="form-horizontal" method="POST" action="api/v1/package/create" id='addPackage'>
  
  <input type="text" name="PackageName" value="" autofocus placeholder="Enter Package Name">
  
<input type="text" name="PackageLevel" value="" autofocus placeholder="Enter Package Level">

<input type="text" name="PackageValue" value="" autofocus placeholder="Enter Package Value">

 <select name="Event">
  <option ng-repeat="x in events" value="@{{x.ID}}">@{{ x.EventName }}</option>
  
</select>
  <label>Event Description</label>
  <textarea rows="4" cols="75" name="PackageDescription" required placeholder="Describe the Event"> </textarea>

  <input type="submit" class="btn btn-primary waves-effect waves-light" id="btn-save" value="Save">
  </form>
  </div>

                    </div>
                </div>
            </div>
        </div>