
	

	<script type="text/javascript" charset="utf8" src="../../assets/js/jquery.js"></script>
	<script type="text/javascript" charset="utf8" src="../../assets/js/popper.js"></script>
	<script src="../../assets/js/bootstrap.bundle.min.js"></script>
	<script type="text/javascript" charset="utf8" src="../../assets/js/custom-flatly.js"></script>
	<script src="../../assets/js/bootstrap.min.js"></script>
	<script src="../../assets/api/ckeditor/ckeditor.js"></script>
	<script type="text/javascript" charset="utf8" src="../../assets/api/DataTables/DataTables-1.10.18/js/dataTables.bootstrap4.min.js"></script>
	<script type="text/javascript" charset="utf8" src="../../assets/api/DataTables/DataTables-1.10.18/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" charset="utf8" src="../../assets/api/DataTables/datatables.js"></script>
	<script src="../../assets/js/custom.js"></script>

	<script>
	    // Replace the <textarea id="editor1"> with a CKEditor
	    // instance, using default configuration.
	    CKEDITOR.replace( 'editor1' );

	    // For dataTable
		$(document).ready(function() {
		    $('#example').DataTable( {     
		        // ajax: 'https://api.myjson.com/bins/qgcu',
		        // drawCallback: function(settings){
		        //     var api = this.api();
		            
		        //     /* Add some tooltips for demonstration purposes */
		        //     $('td', api.table().container()).each(function () {
		        //        $(this).attr('title', $(this).text());
		        //     });

		        //     /* Apply the tooltips */
		        //     $('td', api.table().container()).tooltip({
		        //        container: 'body'
		        //     });          
		        // }  
		    });
		} );

		// File Input
		// Add the following code if you want the name of the file appear on select
		$(".custom-file-input").on("change", function() {
		  var fileName = $(this).val().split("\\").pop();
		  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
		});

		$(function () {
		  $('[data-toggle="tooltip"]').tooltip()
		})
	</script>
</body>
</html>