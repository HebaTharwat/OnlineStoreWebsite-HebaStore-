</div><!-- container-fluid -->




<a href="#" class="btn btn-info btn-lg">
<span class="glyphicon glyphicon-chevron-up"></span> Top
 </a>



<div style="height:50px;background-color:#1A1617">

<footer class="text-center" id="footer" style="padding-top:15px" >
 <span  style="color:aliceblue" >&copy; Copyright 2018 Heba Store</span>
 
 </footer>
 
</div>




<script src="js/jquery-3.1.0.js"></script>
<script src="js/bootstrap.min.js"></script>

<script>
function detailsmodel(id){
	var data={"id":id};
	jQuery.ajax({
		url:'final/includes/detailsmodel.php',
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