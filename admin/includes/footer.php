</div><!-- container-fluid -->
<footer class="text-center" id="footer">
 &copy; Copyright 2018 Heba Store
 </footer>
 
 <script>
 function get_child_options() {
		// Gets the selected parent_id from the DOM with jquery
		var parentID = jQuery('#parent').val();
		//console.log(parentID);
		jQuery.ajax({
			url: '/final/admin/parsers/child_categories.php',
			type: 'POST',
			data: {parentID: parentID},
			// data comes back on success
			success: function(data) {
				jQuery('#child').html(data);
			},
			error: function() {alert("Something went wrong with the child options")},
		});
	}//end function get_child_options()
	jQuery('select[name="parent"]').change(get_child_options);
 </script>


<script>
	function updateColors() {
	// start with color string loop through all color qty fields. If the field is empty then skip over
	// otherwise add it to your color string
// finally once the loop is over set the value of the preview field in our form to that color string to be 
		// saved later
		var colorString = '';
		for($i = 1; $i <= 12; $i++) {
			if(jQuery('#colors' + $i).val() != '') {
			colorString+= jQuery('#colors' + $i).val() + ':' + jQuery('#qty' + $i).val() + ',';
			}
		}
		jQuery('#colors').val(colorString);
	}
	</script>

 
 <script src="../js/jquery-3.1.0.js"></script>
<script src="../js/bootstrap.min.js"></script>
 </body> </html>
