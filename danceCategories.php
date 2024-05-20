<?php include('config/db.php');?>
<?php session_start();?>
<?php
	$admin_user_id = $_SESSION['admin_user_id'];
	if(!isset($admin_user_id)){
		header('location:login.php');
	}

	if(isset($_POST['danceCategories'])){
		$category_name = mysqli_real_escape_string($conn, $_POST['category_name']);
		$tag_name = mysqli_real_escape_string($conn, $_POST['tag_name']);
	   	$image = $_FILES['category_image']['name'];
	   	$image_size = $_FILES['category_image']['size'];
	   	$tmp_name = $_FILES['category_image']['tmp_name'];
	   	$img_path = 'uploads/categories/'.$image;

	   if(!empty($image)){
	      if($image_size > 2000000){
	         $message[] = 'image file size is too large';
	      }else{
	        $insertCategory = "INSERT INTO tbl_dance_categories(category_name, tag_name, category_image) VALUES('$category_name', '$tag_name', '$img_path')";
	          mysqli_query($conn, $insertCategory);
	          move_uploaded_file($tmp_name, $img_path);
	           header('location:danceCategories.php');
	        }
	    }
	}

	if(isset($_POST['updDanceCategories'])){
		$category_id = mysqli_real_escape_string($conn, $_POST['category_id']);
		$category_name = mysqli_real_escape_string($conn, $_POST['category_name']);
		$tag_name = mysqli_real_escape_string($conn, $_POST['tag_name']);

	   	$image = $_FILES['category_image']['name'];
	   	$image_size = $_FILES['category_image']['size'];
	   	$tmp_name = $_FILES['category_image']['tmp_name'];
	   	$img_path = 'uploads/categories/'.$image;

	   	/*$data = array(
	   		'category_id' => $category_id,
	   		'category_name' => $category_name,
	   		'tag_name' => $tag_name,
	   		'img_path' => $img_path,
	   	);
	   	print_r($data);*/
	   if(!empty($image)){
	      if($image_size > 2000000){
	         $message[] = 'image file size is too large';
	      }else{
	        $updateCategory = "UPDATE tbl_dance_categories SET category_name='$category_name', tag_name='$tag_name', category_image='$img_path' WHERE category_id='$category_id'";
	          mysqli_query($conn, $updateCategory);
	          move_uploaded_file($tmp_name, $img_path);
	           header('location:danceCategories.php');
	        }
	    }
	}
?>
<?php include('inc/header.php');?>
<div class="hero" style="background: url('assets/img/47.jpeg') no-repeat; background-size: cover;">

	<div class="container">
		<div class="col-md-3">
		    <?php include('sidebar/adminSidebar.php');?>
			
		</div>
		<div class="col-md-9" style="">
			<div class="row" style="margin-left: 1px;margin-top: 18px;">
				<a href="" class="btn btn-info" data-toggle="modal" data-target="#exampleModal">Add Category</a>
			</div>
			<!--<div class="row">
			<?php
				/*$sql = "SELECT * FROM tbl_dance_categories";
				$etCategories = mysqli_query($conn, $sql);
			     if(mysqli_num_rows($etCategories) > 0){
			        while($row = mysqli_fetch_assoc($etCategories)){*/
			        ?>
						<div class="col-md-4" style="margin-top: 10px;">
							<div class="category-box">
								<img src=<?php //echo $row['category_image'];?> style="width: 85%;" alt="Dance">
								<?php //if($row["tag_name"] != null):?>
									<div class="trend"><?php //echo $row['tag_name'];?></div>
								<?php //else:?>
								<?php //endif;?>
								<div class="category_name">
								<span style=""><?php //echo $row['category_name'];?> (0)</span></div>
								<a href="viewDanceForms.php" class="btn btn-warning" style="background: #922bc0;border-color: #922bc0;">View Dance Forms</a>
								
							</div>
						</div>
					<?php //}
				//}
			?>
			</div>-->
			<table class="table table-dark">
			  <thead>
			    <tr>
			      <th scope="col">ID</th>
			      <th scope="col">Category Name</th>
			      <th scope="col">Tag</th>
			      <th scope="col">Image</th>
			      <th scope="col">Action</th>
			    </tr>
			  </thead>
			  <tbody>
			   
			      <?php
			$sql = "SELECT * FROM tbl_dance_categories";
			$getCategories = mysqli_query($conn, $sql);
		     if(mysqli_num_rows($getCategories) > 0){
		        while($row = mysqli_fetch_assoc($getCategories)){
		        ?>
		        	<tr>
		        		<td style="width: 5%;font-size: 14px;"><?php echo $row['category_id'];?></td>
		        		<td style="width: 35%;font-size: 14px;"><?php echo $row['category_name'];?></td>
		        		<td style="width: 10%;font-size: 14px;"><?php echo $row['tag_name'];?></td>
		        		<td style="width: 20%;font-size: 14px;" class="image">
		        			<img src=<?php echo $row['category_image'];?> style="width: 30%;" alt="Dance">
						</td>
						<td style="width: 25%;" class="actions">
						
		        			<a href="" class="btn-sm btn-primary editCategory" data-val=<?php echo $row['category_id'];?> data-toggle="modal" data-target="#editCategory"><i class="fa fa-edit"></i> Edit</a>
		        			<a href="" class="btn-sm btn-danger deleteCategory" data-val=<?php echo $row['category_id'];?>><i class="fa fa-trash"></i> Delete</a>
		        		</td>
		        	</tr>
		        	
					
				<?php }
			}
			else{
				?>
				<tr>
					<td>No categories added yet!</td>
				</tr>
				<?php
			}
		?>
			   
			  </tbody>
			</table>
		</div>

		<!--Modal to add categories-->
		<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  	<div class="modal-dialog" role="document">
		    	<div class="modal-content">
			      	<div class="modal-header">
				        <h5 class="modal-title" id="exampleModalLabel">Add Dance Category</h5>
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
			      	</div>
			      	<div class="modal-body">
			      		<form method="post" action="danceCategories.php" enctype="multipart/form-data">
					      	<div class="modal-body">
					        
				                <div class="form-group">
				                    <label>Category</label>
				                    <input type="text" name="category_name" class="form-control" required="" placeholder="Category">
				                </div>
				                <div class="form-group">
				                    <label>Tag Name</label>
				                    <input type="text" name="tag_name" id="tag_name" class="form-control" placeholder="Tag Name">
				                </div>
				                <div class="form-group">
					              	<label>Upload Image</label>
					              	<input type="file" name="category_image" accept="image/jpg, image/jpeg, image/png" required="" class="form-control">
					          	</div>
					      	</div>
					      	<div class="modal-footer">
					        	<button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="location.reload();">Close</button>
					        	<input type="submit" name="danceCategories" value="Save changes" class="btn btn-primary">
					      	</div>
			      		</form>
			      	</div>
		    	</div>
		  	</div>
		</div>

		<!-- Modal to update categories-->
		<div class="modal fade" id="editCategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  	<div class="modal-dialog" role="document">
			    <div class="modal-content">
			      	<div class="modal-header">
				        <h5 class="modal-title" id="exampleModalLabel">Edit Dance Category</h5>
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="window.location.reload();"
				        >
				          <span aria-hidden="true">&times;</span>
				        </button>
			      	</div>
			      	<div class="modal-body">
			        	<form method="post" action="danceCategories.php" enctype="multipart/form-data">
					      	<div class="modal-body">
					      		
					      		<input type="hidden" name="category_id" id="category_id">
				                <div class="form-group">
				                    <label>Category</label>
				                    <input type="text" name="category_name" id="category_name" value="" class="form-control" required="" placeholder="Category">
				                </div>
				                <div class="form-group">
				                    <label>Tag Name</label>
<input type="text" name="tag_name" value="" class="form-control tag_name" required="" placeholder="Tag Name">
				                </div>
				                <div class="form-group">
				                	<div id="category_image"></div>
					              	<label>Upload Image</label>
					              	<input type="file" name="category_image" accept="image/jpg, image/jpeg, image/png" required="" class="form-control">
					          	</div>
					        
					      	</div>
					      	<div class="modal-footer">
					        	<button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="window.location.reload();">Close</button>
					        	<input type="submit" name="updDanceCategories" value="Update changes" class="btn btn-primary">
					      	</div>
			      		</form>
			      	</div>
			    </div>
		  	</div>
		</div>

	</div><br><br><br><br><br><br><br><br><br><br>
	<script>
  $('.nav-<?php echo isset($_GET['page']) ? $_GET['page'] : '' ?>').addClass('active')
</script>
<?php include('inc/footer.php');?>
</div>

<script type="text/javascript">
	$('.editCategory').click(function(){
	    var id = $(this).attr('data-val');
	    $.ajax({
			url: "updateCategories.php",
			type: "POST",
			data: {
				type: 1,
				id: id,
			},
			cache: false,
			success: function(data){
				var jsonData = $.parseJSON(data);
				$('#category_id').val(jsonData.category_id);
            	$('#category_name').val(jsonData.category_name);
            	$('.tag_name').val(jsonData.tag_name);
            	$('#category_image').append('<img src="'+jsonData.category_image+'">');
			}
		});
	})


	$('.deleteCategory').click(function(){
	    var id = $(this).attr('data-val');
	    $.ajax({
			url: "deleteCategory.php",
			type: "POST",
			data: {
				type: 1,
				id: id,
			},
			cache: false,
			success: function(data){
				alert(data);
			}
		});
	})


</script>