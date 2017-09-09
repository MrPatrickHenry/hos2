<script>

// post

$(document).ready(function(){
$('#addwordmodal').submit(function(){

// show that something is loading
$('#response').html("<b>Loading response...</b>");

/*
* 'post_receiver.php' - where you will pass the form data
* $(this).serialize() - to easily read form data
* function(data){... - data contains the response from post_receiver.php
*/
$.ajax({
type: 'POST',
url: 'http://192.168.99.100:32779/api/v1/save', 
data: $(this).serialize()
})
.done(function(data){

// show the response
$('#response').html(data);

})
.fail(function() {

// just in case posting your form failed
alert( "Posting failed." );

});

// to prevent refreshing the whole page page
return false;

});
});
//





$(document).ready(function() {
$('[data-toggle=offcanvas]').click(function() {
$('.row-offcanvas').toggleClass('active');
});
});


$('#btn-add').click(function(){
$('#myModal').modal('show')
});


$('#btn-add-packages').click(function(){
$('#AddPackageModal').modal('show')
});


$('#btn-add-packagesItem').click(function(){
$('#AddPackageItemModal').modal('show')
});


$('#btn-add-sponsor').click(function(){
$('#AddSponsorModal').modal('show')
});



$('.edit').click(function(){
$('#myModal').modal('show')
});

var $table = $('#table');
$(function () {
$('#toolbar').find('select').change(function () {
$table.bootstrapTable('refreshOptions', {
exportDataType: $(this).val()
});
});
})  




function queryParams() {
return {
type: 'owner',
sort: 'updated',
direction: 'desc',
per_page: 100,
page: 1
};
}

</script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.15/angular.min.js"></script> 

<script>

function customersController($scope,$http) {

$http.get('/vlog/entry', {cache: false})
.success(function(data){$scope.entries = data;});


}
</script>


{{-- <script src="https://events.private.linksynergy.com/app/js/extensions/export/bootstrap-table-export.js"></script> --}}
{{-- <script src="//rawgit.com/hhurz/tableExport.jquery.plugin/master/tableExport.js"></script>
<script src="//rawgit.com/vitalets/x-editable/master/dist/bootstrap3-editable/js/bootstrap-editable.js"></script>
<script src="https://events.private.linksynergy.com/app/js/extensions/mobile/bootstrap-table-mobile.js"></script>
 --}}
{{-- <script src="https://events.private.linksynergy.com/app/js/extensions/editable/bootstrap-table-editable.js"></script> --}}
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <script>
  $( function() {
    $( ".datepicker" ).datepicker();
  } );
  </script>
