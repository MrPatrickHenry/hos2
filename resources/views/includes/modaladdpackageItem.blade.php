  <!-- End of Table-to-load-the-data Part -->
            <!-- Modal (Pop up when detail button clicked) -->
            <div class="modal animated slideInRight" id="AddPackageItemModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                            <h1 class="modal-title" id="myModalLabel">Add a New Rakuten Marketing Package Item</h1>
                        </div>
  <div class="modal-body">

<form name="frmPackageItem" class="form-horizontal" method="POST" action="/api/v1/package/item/create" id='addPackageItem'>
  
  <input type="text" name="PackageItemName" value="" autofocus placeholder="Enter Package Item Name">
  
<input type="text" name="PackageItemValue" value="" autofocus placeholder="Enter Package Value">

 <select name="PackageLevel">
  <option ng-repeat="x in packages" value="@{{x.ID}}">@{{ x.PackageName }}</option>
  
</select>
  <label>Package Description</label>
  <textarea rows="4" cols="75" name="PackageItemDescription" required placeholder="Describe the Event"> </textarea>

  <input type="submit" class="btn btn-primary waves-effect waves-light" id="btn-save" value="Save">
  </form>
  </div>

                    </div>
                </div>
            </div>
        </div>