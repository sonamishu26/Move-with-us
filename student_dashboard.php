<?php include('config/db.php');?>
<?php session_start();?>
<?php
  $student_user_id = $_SESSION['student_user_id'];
  if(!isset($student_user_id)){
    header('location:login.php');
  }
?>
<?php include('inc/header.php');?>
<div class="hero" style="background: url('assets/img/45.jpeg') no-repeat; background-size: cover;">

  <div class="container">
    <div class="col-md-3">
      <?php include('sidebar/studentSidebar.php');?>

    </div>
    <div class="col-md-9">
      <h3>DASHBOARD</h3>
        <div class="jumbotron" style="margin-top: 10px;background-color: #f9f9f9;
        border: 1px solid #ccc;border-radius: unset;padding-right: 30px;padding-left: 30px;">

        <div class="row">
          <div class="col-md-5">
            <?php
            $user_id = $_SESSION[ 'student_user_id' ];
            $sql = "SELECT * 
            FROM tbl_students 
            WHERE user_id = $user_id";
            $data = mysqli_query($conn, $sql);
            if(mysqli_num_rows($data) > 0){while($row = mysqli_fetch_assoc($data)){ ?>
              <p style="text-align: center;"><img src=<?php echo $row['student_image']?> 
          style="width: 50%;border-radius: 50%;border: 1px solid #FFF;"></p>
          <h2 style="text-align: center;text-transform: uppercase;font-size: 20px;"><?php echo $_SESSION['username'];?></h2>
          <?php }

            }
            else{ ?>
              <p style="text-align: center;"><img src="assets/img/avatar.jpg" 
            style="width: 50%;border-radius: 50%;border: 1px solid #FFF;"></p>
            <h2 style="text-align: center;"><?php echo $_SESSION['username'];?></h2>

            <?php }
 

            ?>
            
        </div>
        <div class="col-md-7">
          <ul class="list-group">
            <?php
            $user_id = $_SESSION[ 'student_user_id' ];
            $sql = "SELECT * FROM tbl_students WHERE user_id = $user_id ";
            $data = mysqli_query($conn, $sql);
            if(mysqli_num_rows($data) > 0){
              while($row = mysqli_fetch_assoc($data)){ ?>

            <li class="list-group-item d-flex
            justify-content-between align-items-center">
            Age
            <span class="badge bg-primary rounded-pill"><?php echo $row['age'];?></span>
            </li>
            <li class="list-group-item d-flex
            justify-content-between align-items-center">
            Gender
            <span class="badge bg-primary rounded-pill"><?php echo $row['gender'];?></span>
            </li>

            <li class="list-group-item d-flex justify-content-between align-items-center">
            <?php $doj = date('d/m/Y');?>
                  Date of Join
                  <span class="badge bg-primary rounded-pill"><?php echo $doj;?></span>
               </li>

               <li class="list-group-item d-flex
            justify-content-between align-items-center">
            Address
            <span class="badge bg-primary rounded-pill"><?php echo $row['address'];?></span>
               </li>
               <?php }?>
            <?php }?>
          </ul>
        </div>
        </div>

        </div>
    
    </div>
  



  </div><br><br><br><br><br><br><br><br><br>



  <?php include('inc/footer.php');?>
</div>