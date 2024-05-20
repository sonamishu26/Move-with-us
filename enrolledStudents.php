<?php include('config/db.php');?>
<?php session_start();?>
<?php
	$admin_user_id = $_SESSION['admin_user_id'];
	if(!isset($admin_user_id)){
		header('location:login.php');
	}


?>
<?php include('inc/header.php');?>
<div class="hero" style="background: url('assets/img/46.jpeg') no-repeat; background-size: cover;">

	<div class="container">
		<div class="col-md-3">
		   <?php include('sidebar/adminSidebar.php');?>
		</div>
		<div class="col-md-9">
			<h3>ENROLLED STUDENTS</h3>
			<table class="table table-dark">
			  	<thead>
				    <tr>
				      	<th scope="col" style="width: 20%;">Student Name</th>
				      	<th scope="col" style="width: 15%;">Category</th>
				      	<th scope="col" style="width: 15%;">Dance</th>
				      	<th scope="col" style="width: 5%;">Price</th>
				      	<th scope="col" style="width: 25%;">Shift</th>
				      	<th scope="col" style="width: 10%;">Mobile</th>
				      	<th scope="col" style="width: 10%;">Pay Status</th>
				    </tr>
			  		</thead>
			  		<tbody>
				    <?php
					$sql = "SELECT tbl_enrollment.id, tbl_enrollment.student_name, tbl_dance_categories.category_name,tbl_dance_forms.dance_name, tbl_enrollment.price, tbl_enrollment.shift, tbl_enrollment.payment_method, tbl_enrollment.payment_status, tbl_students.student_image, tbl_users.mobile
FROM tbl_enrollment
JOIN tbl_dance_categories ON tbl_dance_categories.category_id = tbl_enrollment.category_id
JOIN tbl_dance_forms ON tbl_dance_forms.dance_id = tbl_enrollment.dance_id
JOIN tbl_students ON tbl_students.user_id = tbl_enrollment.user_id
JOIN tbl_users ON tbl_users.user_id = tbl_enrollment.user_id";
					$enrolled = mysqli_query($conn, $sql);
			     	if(mysqli_num_rows($enrolled) > 0){
			        while($row = mysqli_fetch_assoc($enrolled)){
			        ?>
		        	<tr>
		        		
						<td style="width: 20%;font-size: 14px;"><a href="" class="viewEnrollments" data-val=<?php echo $row['id'];?> data-toggle="modal" data-target="#viewStudentInfo"><?php echo $row['student_name'];?></a></td>
		        		<td style="width: 15%;font-size: 14px;"><?php echo $row['category_name'];?></td>
		        		<td style="width: 15%;font-size: 14px;"><?php echo $row['dance_name'];?></td>
		        		<td style="width: 5%;font-size: 14px;"><?php echo $row['price'];?></td>
		        		<td style="width: 25%;font-size: 14px;"><?php echo $row['shift'];?></td>
		        		<td style="width: 10%;font-size: 14px;"><?php echo $row['mobile'];?></td>
		        		<td style="width: 10%;font-size: 14px;"><?php echo $row['payment_status'];?></td>
		        	</tr>
				<?php }
			}
			else{
				?>
				<tr>
					<td>No instructors registered yet!</td>
				</tr>
				<?php
			}
			
		?>
			   
			  </tbody>
			</table>
		</div>
		
	</div>


	<div class="modal fade" id="viewStudentInfo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  	<div class="modal-dialog" role="document">
	    	<div class="modal-content">
		      	<div class="modal-header">
			        <h5 class="modal-title" id="exampleModalLabel">Enrolled Students Details</h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="location.reload();">
			          <span aria-hidden="true">&times;</span>
			        </button>
		      	</div>
		      	<div class="modal-body">
		      		<form method="post" action="enrolledStudents.php" enctype="multipart/form-data">
				      	<div class="modal-body">
				        	<div class="row">
				        		<div class="col-md-3">
				        			<p id="studentImage"></p>
				        		</div>
				        		<div class="col-md-9">
				        			<table class="table table-dark">
									  	<thead>
									  		<tr>
										      	<th scope="col" style="font-weight: normal;border-bottom: none;">ID</th>
										      	<td id="id"></td>
										    </tr>
										    <tr>
										      	<th scope="col" style="font-weight: normal;border-bottom: none;" width="40%">Student Name</th>
										      	<td id="student_name"></td>
										    </tr>
										    <tr>
										      	<th scope="col" style="font-weight: normal;border-bottom: none;">Category Name</th>
										      	<td id="category_name"></td>
										    </tr>
										    <tr>
										      	<th scope="col" style="font-weight: normal;border-bottom: none;">Dance Name</th>
										      	<td id="dance_name"></td>
										    </tr>
										    <tr>
										      	<th scope="col" style="font-weight: normal;border-bottom: none;">Price</th>
										      	<td id="price"></td>
										    </tr>
										    <tr>
										      	<th scope="col" style="font-weight: normal;border-bottom: none;">Shift</th>
										      	<td id="shift"></td>
										    </tr>
										    <tr>
										      	<th scope="col" style="font-weight: normal;border-bottom: none;">Payment Method</th>
										      	<td id="payment_method"></td>
										    </tr>
										    <tr>
										      	<th scope="col" style="font-weight: normal;border-bottom: none;">Payment Status</th>
										      	<td>
										      		<select name="payment_status" id="payment_status" class="form-control">
										      			<option id="mode"></option>
										      			<option value="Pending">Pending</option>
										      			<option value="Approve">Approved</option>
										      		</select>
										      	</td>
										    </tr>
										    <tr>
										      	<th scope="col" style="font-weight: normal;border-bottom: none;">Mobile</th>
										      	<td id="mobile" name="mobile"></td>
										    </tr>
										    
									  	</thead>
									  	<tbody>

									  	</tbody>
									</table>
				        		</div>
				        	</div>
			                
				      	</div>
				      	<div class="modal-footer">
				        	<button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="location.reload();">Close</button>
				        	
				        	<!--<input type="submit" name="updateEnrollData" value="Approve Enrollment" class="btn btn-primary">-->
				        	<button type="button" id="enrollStudent" class="btn btn-primary">Update Status</button>
				      	</div>
		      		</form>
		      	</div>
	    	</div>
	  	</div>
	</div><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

<?php include('inc/footer.php');?>
</div>
<script type="text/javascript">
	$('.nav-<?php echo isset($_GET['page']) ? $_GET['page'] : '' ?>').addClass('active')
</script>
<script type="text/javascript">
	$('.viewEnrollments').click(function(){
	    var id = $(this).attr('data-val');
	    $.ajax({
			url: "viewEnrolledStudent.php",
			type: "POST",
			data: {
				type: 1,
				id: id,
			},
			cache: false,
			success: function(data){
				var jsonData = $.parseJSON(data);
            	$('#studentImage').append('<img src="'+jsonData.student_image+'">');
            	$('#id').html(jsonData.id);
            	$('#student_name').html(jsonData.student_name);
            	$('#category_name').html(jsonData.category_name);
            	$('#dance_name').html(jsonData.dance_name);
            	$('#price').html(jsonData.price);
            	$('#shift').html(jsonData.shift);
            	$('#mode').html(jsonData.payment_status);
            	$('#payment_method').html(jsonData.payment_method);
            	$('#mobile').html(jsonData.mobile);
			}
		});
	})

	$('#enrollStudent').click(function(){
		var id = $('#id').text();
		var payment_status = $('#payment_status').val();
		$.ajax({
			url: "updateEnrollRequest.php",
			type: "POST",
			data: {
				type: 1,
				id: id,
				payment_status: payment_status,
			},
			cache: false,
			success: function(data){
				alert(data);
				location.reload();
			}
		});
	})
</script>