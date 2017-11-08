<footer>
State of Mode • &copy; <?php echo date("Y"); ?>

</footer>

<script>
$(document).ready(function() {
	$('[data-toggle=offcanvas]').click(function() {
		$('.row-offcanvas').toggleClass('active');
	});
});

// ADDING
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

// EDITING
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
});  


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

<script src="//rawgit.com/hhurz/tableExport.jquery.plugin/master/tableExport.js"></script>
<script src="//rawgit.com/vitalets/x-editable/master/dist/bootstrap3-editable/js/bootstrap-editable.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script>
$(function() {
	$(".datepicker").datepicker();
});
</script>
