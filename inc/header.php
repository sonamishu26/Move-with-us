
<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
   <meta content="width=device-width, initial-scale=1" name="viewport" />
    <link rel="stylesheet" href="assets/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="http://code.jquery.com/resources/demos/style.css">
   
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous"></script>
    <script type="text/javascript" src="assets/js/bootstrap.js"></script>
    
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    

        <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js" integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg==" crossorigin="anonymous"></script>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" integrity="sha512-yHknP1/AwR+yx26cB1y0cjvQUMvEa2PFzt1c9LlS4pRQ5NOTZFWbhBig+X9G9eYW/8m0/4OXNx8pxJ6z57x0dw==" crossorigin="anonymous" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css" integrity="sha512-17EgCFERpgZKcm0j0fEq1YCJuyAWdz9KUtv1EjVuaOz8pDnh/0nZxmU6BBXwaaxqoi9PQXnRWqlcDB027hgv9A==" crossorigin="anonymous" />

    <style type="text/css">
      .slick-prev:before {
        color: #000;
      }

          .slick-next:before {
        color: #000;
    }


    .wrapper{
      width: 90%;
      margin: 0 auto;
      padding-bottom: 20px;
    }
    .category-box{
      margin-top: 10px;
      padding: 30px 0px 15px 0px;
      background-color: #fff;
      box-shadow: 0.5rem 1rem rgba(0,0,0,.1);
      text-align: center;
      border: 1px solid #8e8484;
      border-top: 4px solid #c09ac0;
      border-bottom: 4px solid #922bc0;
    }
    .category-box span{
      margin: 10px 0px;
      font-size: 16px;
    }
    .catergory_name{
      text-align: center;
      padding: 3px 0px 13px 0px;
      color: #000;
      margin: 20px 0px 0px 0px;
    }
    .catergory_name span{
      font-weight: bold;
      color: #353131;
    }
    .trend{
      position: absolute;
      top: 17px;
      left: 10px;
      border-radius: 0.5rem;
      padding: 4px 10px;
      font-size: 14px;
      color: #fff;
      background-color: #c09ac0;
    }
    .slick-arrow{
      background: #959494 !important;
      border-radius: 50% !important;
    }
    /* Carousel */

#quote-carousel {
    padding: 0 10px 3=0px 10px;
    margin-top: 30px;
    /* Control buttons  */
    /* Previous button  */
    /* Next button  */
    /* Changes the position of the indicators */
    /* Changes the color of the indicators */
}
#quote-carousel .carousel-control {
    background: none;
    color: #CACACA;
    font-size: 2.3em;
    text-shadow: none;
    margin-top: 30px;
}
#quote-carousel .carousel-control.left {
    
}
#quote-carousel .carousel-control.right {
    
}
#quote-carousel .carousel-indicators {
    right: 50%;
    top: auto;
    bottom: 0px;
    margin-right: -19px;
}
#quote-carousel .carousel-indicators li {
    width: 50px;
    height: 50px;
    margin: 5px;
    cursor: pointer;
    border: 4px solid #CCC;
    border-radius: 50px;
    opacity: 0.4;
    overflow: hidden;
    transition: all 0.4s;
}
#quote-carousel .carousel-indicators .active {
    background: #333333;
    width: 128px;
    height: 128px;
    border-radius: 100px;
    opacity: 1;
    overflow: hidden;
}
.carousel-inner {
    min-height: 300px;
}
.item blockquote {
    border-left: none;
    margin: 0;
}
.item blockquote p:before {
    
    font-family: 'Fontawesome';
    float: left;
    margin-right: 10px;
}

    </style>
    <script type="text/javascript">
      $( function() {
        $( "#datepicker" ).datepicker();
      } );
    </script>
    <script type="text/javascript">
    var $ = jQuery;
      jQuery(document).ready(function($){
        $('.logo-slider').slick({
          slidesToShow: 5,
          slidesToScroll: 1,
          
          arrows: true,
          
          infinite: true
        });
      });
    </script>

    <script type="text/javascript">
      $('.carousel .vertical .item').each(function(){
      var next = $(this).next();
      if (!next.length) {
        next = $(this).siblings(':first');
      }
      next.children(':first-child').clone().appendTo($(this));
      
      for (var i=1;i<2;i++) {
        next=next.next();
        if (!next.length) {
          next = $(this).siblings(':first');
        }
        
        next.children(':first-child').clone().appendTo($(this));
      }
    });
    </script>
   
 

    <title>Move With Us | Home Page</title>
  </head>
  <body>
  
    <nav class="navbar navbar-default">
    
      <div class="container-fluid" style="padding-left: 25px;">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">Move With Us</a>
          <ul class="menubar">
            <li><a href="index.php">Home</a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="services.php">Our Services</a></li>
            <li><a href="staff.php">Our Instructors</a></li>
            <li><a href="contact.php">Contact Us</a></li>
          </ul>
        </div>
      
        

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav navbar-right">

            <?php if(isset($_SESSION['student_user_id'])){?>
            <li class="dropdown">

              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Settings <span class="caret"></span></a>
              <ul class="dropdown-menu">
              <li><a href="student_dashboard.php">Student</a></li>
              <li><a href="logout.php">Logout</a></li>
              </ul>
            </li>
            <?php } else if(isset($_SESSION['instructor_user_id'])){?>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Settings <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="instructor_dasbhoard.php">Instructor</a></li>
                <li><a href="logout.php">Logout</a></li>
              </ul>
            </li>
            <?php } else if(isset($_SESSION['admin_user_id'])){?>

            <li class="dropdown">
           
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Settings <span class="caret"></span></a>
              <ul class="dropdown-menu">
              <li><a href="admin_dashboard.php">Admin</a></li>
              <li><a href="logout.php">Logout</a></li>
              </ul>
            </li>
            <?php } else if(!isset($_SESSION['admin_user_id']) || !isset($_SESSION['instructor_user_id']) || !isset($_SESSION['student_user_id'])){?>
            <li><a href="register.php">Register</a></li>
              <li><a href="Login.php">Login</a></li>
            <?php } ?>
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>
    </body>

  </html>