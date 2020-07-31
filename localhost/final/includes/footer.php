</div><!-- container-fluid -->














<footer class="text-center" id="footer">
 &copy; Copyright 2017 Heba Store
 </footer>




<script src="js/jquery-3.1.0.js"></script>
<script src="js/bootstrap.min.js"></script>

<script>
function detailsmodel(id){
	var data={"id":id};
	jQuery.ajax({
		url:<?=BASEURL;?>+'includes/detailsmodel.php',
		method:"post",
		data:data,
		success: function(data){
			jQuery('body').append(data);
			jQuery('#details-modal').modal('toggle');
			},
		error:function(){
			alert("something went wrong!");// alert(id);
			}
		});
	}
</script>




</body>
</html>