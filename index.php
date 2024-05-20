<?php include('inc/header.php');?>
<div class="container" style="padding: 0px;">
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
      <div class="item active">
        <img src="assets/img/ban1.jpg" alt="Chania">
        <div class="carousel-caption">
          <h3 style="font-size: 45px;">WELCOME TO MOVE WITH US</h3>
          <p style="font-size: 20px;">A place where your dreams get wings.</p>
        </div>
      </div>

      <div class="item">
        <img src="assets/img/ban2.jpg" alt="Chania">
        <div class="carousel-caption">
          <h3 style="font-size: 45px;">EXCELLENT SUPPORT</h3>
          <p style="font-size: 20px;">Get guidance from skilled instrcutors.</p>
        </div>
      </div>

      <div class="item">
        <img src="assets/img/ban3.jpg" alt="Chania" style="width:100%;">
        <div class="carousel-caption">
          <h3 style="font-size: 45px;">TALENTED INSTRUCTORS</h3>
          <p style="font-size: 20px;">Learn from our experienced instructors.</p>
        </div>
      </div>
    </div>

 
  </div>
</div>
<div class="hero" style="background: url('assets/img/satrngicolor.jpg') no-repeat; background-size: cover;">

<div class="wrapper">
  <div class="row">
    <h2 style="text-align: center;margin-top: 30px;">DANCE CATEGORIES</h2>
  </div>
  <div class="row">
    <div class="logo-slider">
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
                <?php if($row["tag_name"] != null):?>
                  <div class="trend"><?php echo $row['tag_name'];?></div>
                <?php else:?>
                <?php endif;?>
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
</div>


<!---<div class="container" style="background: #F7F7F7;margin-top: 30px;padding-bottom: 30px;">
  <div class="wrapper">
    <div class="row">
     <h2 style="text-align: center;margin-top: 30px;">POPULAR / TRENDING</h2> 
    </div> -->
    <div class="row">
      <div class="logo-slider">
          <?php
            include('config/db.php');
            $sql = "SELECT tbl_dance_forms.dance_id, tbl_dance_forms.dance_image, tbl_dance_forms.dance_name, tbl_dance_categories.category_name
            FROM tbl_dance_forms 
            JOIN tbl_dance_categories ON tbl_dance_categories.category_id = tbl_dance_forms.category_id
            WHERE tbl_dance_forms.tag_name = 'Popular'";
            $getDance = mysqli_query($conn, $sql);
               if(mysqli_num_rows($getDance) > 0){
                  while($row = mysqli_fetch_assoc($getDance)){
                  ?>
                <div class="col-md-4" style="margin-top: 10px;">
                  <div class="category-box">
                    <img src=<?php echo $row['dance_image'];?> style="width: 85%;    margin-left: 14px;" alt="Dance">
                    <div class="category_name">
                    <span style=""><?php echo $row['dance_name'];?></span></div>
                    <a href="enroll.php?did=<?php echo $row['dance_id'];?>" class="btn btn-warning" style="background: #922bc0;border-color: #922bc0;">Enroll Now</a>
                    
                  </div>
                </div>
              <?php }
            }
          ?>
      </div>
    
  
</div>
<!-- <div class="hero" style="background: url('assets/img/45.jpg') no-repeat; background-size: cover;"> -->
<div class="wrapper">
  <div class="row">
    <h2 style="text-align: center;margin-top: 45px;margin-bottom: 15px;">COACHES & INSTRUCTORS</h2>
  </div>
  <div class="row">
    <div class="logo-slider">
      <?php
        include('config/db.php');
        $sql = "SELECT * FROM tbl_instructors";
        $getInstructors = mysqli_query($conn, $sql);
           if(mysqli_num_rows($getInstructors) > 0){
              while($row = mysqli_fetch_assoc($getInstructors)){
              ?>
            <div class="col-md-4" style="margin-top: 10px;">
              <div class="category-box">
                <img src=<?php echo $row['instructor_image'];?> style="width: 50%;
    margin: 0 auto;
    border-radius: 50%;" alt="Dance">
                
                <div class="category_name" style="background: #922bc0;">
                <span style="display: block;color: #FFF;"><?php echo $row['instructor_name'];?></span>
                <span style="color: #FFF;">Experience: <?php echo $row['experience'];?> Years</span>
                </div>
                
              </div>
            </div>


          <?php }
        }
      ?>
    </div>
  </div>
</div>


<div class="row">
  
</div>

<div class="wrapper">

<div class="row">
  <h2 style="text-align: center;margin-top: 45px;" >FEEDBACK</h2>
</div>
<!-- <div class="container" style="background: #FFF;padding: 0px;"> -->
  <div class="row">
    <div class="logo-slider">
      <?php
        include('config/db.php');
        $sql = "SELECT tbl_students.student_id, tbl_students.student_name, tbl_feedback.feedback, tbl_students.student_image FROM tbl_feedback JOIN tbl_students ON tbl_students.user_id = tbl_feedback.user_id";
        $testimonials = mysqli_query($conn, $sql);
           if(mysqli_num_rows($testimonials) > 0){
              while($row = mysqli_fetch_assoc($testimonials)){
              ?>
            <div class="col-md-4" style="margin-top: 10px;">
              <div class="category-box" style="border:0px;">
                <img src=<?php echo $row['student_image'];?> style="width: 50%;
    margin: 0 auto;
    border-radius: 50%;" alt="Dance">
                
                <div class="category_name">
                <span style="display: block;color: #000;padding: 0px 7px;"><?php echo $row['feedback'];?></span>
                <span style="color: #000;font-size: 13px !important;"><?php echo $row['student_name'];?></span>
                </div>
                
              </div>
            </div>


          <?php }
        }
      ?>
    </div>
  </div>
</div><br><br>


<?php include('inc/footer.php');?>
</div>