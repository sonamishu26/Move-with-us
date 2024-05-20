<?php include('inc/header.php');?>
	<div class="container" style="padding: 0px;">
		<img src="assets/img/ourservices.jpg" alt="" width="100%" height="auto">
	</div>
  <div class="hero" style="background: url('assets/img/satrngicolor.jpg') no-repeat; background-size: cover;">
	<div class="row">
		<h2 style="text-align: center;">OUR SERVICES</h2>
  	</div>
  	<div class="row">
  		<div class="wrapper">
  			<?php
        include('config/db.php');
        $sql = "SELECT * FROM tbl_dance_categories";
        $getCategories = mysqli_query($conn, $sql);
           if(mysqli_num_rows($getCategories) > 0){
              while($row = mysqli_fetch_assoc($getCategories)){
                $category_id = $row['category_id'];
              ?>
            <div class="col-md-4" style="margin-top: 10px;">
              <div class="category-box">
                <img src=<?php echo $row['category_image'];?> style="width: 85%;    margin-left: 14px;" alt="Dance">
                
                <div class="category_name">
                <span style=""><?php echo $row['category_name'];?></span></div>
                <a href=viewDanceForms.php?id=<?php echo $category_id;?> class="btn btn-warning" style="background: #922bc0;border-color: #922bc0;">View Dance Forms</a>
                
              </div>
            </div>
          <?php }
        }
      ?>
  		</div>
  	</div>

    <div style="display: flex; justify-content: space-around; margin: 30px;">
    <div style="display: inline-block; margin-right: 10px;">
  <div style="text-align: center;">Bharatanatyam</div>
  <video width="320" controls>
    <source src="assets/video/bharatnatayam.mp4" type="video/mp4">
    Your browser does not support the video tag.
  </video>
</div>

<div style="display: inline-block; margin-right: 10px;">
  <div style="text-align: center;">Hip-Hop</div>
  <video width="320" controls>
    <source src="assets\video\hip-hop.mp4" type="video/mp4">
    Your browser does not support the video tag.
  </video>
</div>

<div style="display: inline-block; margin-right: 10px;">
  <div style="text-align: center;">Kuchipudi</div>
  <video width="320" controls>
    <source src="assets\video\kuchhipudi.mp4" type="video/mp4">
    Your browser does not support the video tag.
  </video>
</div>

<div style="display: inline-block; margin-right: 10px;">
  <div style="text-align: center;">Ballet</div>
  <video width="320" controls>
    <source src="assets\video\ballet.mp4" type="video/mp4">
    Your browser does not support the video tag.
  </video>
</div>

</div>
<style>
  @media (max-width: 768px) {
  div {
    display: flex;
    flex-direction: column;
    align-items: center;
  }

  video {
    width: 100%;
    margin-top: 10px;
  }
}
</style>
      
<?php include('inc/footer.php');?>
</div> 