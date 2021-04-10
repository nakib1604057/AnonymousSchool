<?php 
 require_once('include/session.php');
 require_once('include/dbconn.php');
?>
 <!DOCTYPE html>
<html>
<head>
  <title>Anonomus school</title>
  <script src="https://kit.fontawesome.com/0f4b29f3d9.js"></script>
  <link rel="stylesheet" href="https://kit-free.fontawesome.com/releases/latest/css/free.min.css" media="all">
  <link rel="stylesheet" type="text/css" href="css/frontpage.css">
   <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
   <link rel="stylesheet" type="text/css" href="css/notice.css">
   <link rel="stylesheet" type="text/css" href="css/Profile1.css">
   <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
</head>
<body>
   <style type="text/css">
.body-1st-profile
{
    background: #495057;
    margin-left: 39%;
}
.school-name
{
    font-family: impact;
    font-size: 40px;
    line-height: 43px;
    padding-left: 8%;
    letter-spacing: 3px;
    color: #fbfbfb;
    height: 108px;
    padding-top: 3%;
    text-shadow: 0px 4px 3px #242627,
                 0px 10px 13px #1b1e21,
                 0px 7px 1px #303131;
}
  </style>
  <div class="overlay"><a href="homepage.php?PageName=profile"><?php echo $_SESSION['username']; ?></a><div class="back">>></div></div>
  <div class="body-1st">
    <div class="container-liquid">
      <div class="row justify-content-md-center">
        <div class="col col-lg-3  col-mid-3 col-sm-3 col-xs-3">
          <div class="school-name">Anonymous<br>School</div>
        </div>
        <div class="col col-lg-7 col-mid-7 col-sm-7 col-xs-7 body-1st-blank">
          
        </div>
        <div class="col col-lg-2 col-mid-2 col-sm-2  col-xs-2 log-sig-pro"><?php if(check_user_login()){
          echo '<a href="logout.php">Log Out</a><span class="body-1st-profile">Profile <i class="fas fa-user-plus"></i></span>';
        }
        else{
          echo '<a href="login.php">login</a>/<a href="signin.php">SignUp</a>';
        } 
        ?>   
        </div>
      </div>
    </div> 
  </div>
  <div class="body-2nd ">
    <nav class="navbar navbar-expand-lg navbar-expand-mid">
      <a class="navbar-brand body-2nd-block" href="homepage.php?PageName=homepage"><div class="">Home</div></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon">|||</span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
         <ul class="navbar-nav">
           <li class="nav-item active ">
             <a class="nav-link body-2nd-block" href="homepage.php?PageName="><div class="">Admission</div><span class="sr-only">(current)</span></a>
           </li>
           <li class="nav-item ">
             <a class="nav-link body-2nd-block" href="homepage.php?PageName=students"><div class="">Students</div></a>
           </li>
           <li class="nav-item ">
             <a class="nav-link body-2nd-block" href="homepage.php?PageName=teacher"><div class="">teacher</div></a>
           </li>
           <li class="nav-item ">
             <a class="nav-link body-2nd-block" href="homepage.php?PageName=notice"><div class="">notice</div></a>
           </li>
            <li class="nav-item ">
             <a class="nav-link body-2nd-block" href="homepage.php?PageName=calender"><div class="">Calender</div></a>
           </li>
           <li class="nav-item">
             <a class="nav-link body-2nd-block" href="homepage.php?PageName=result"><div class="">result</div></a>
           </li>
           <li class="nav-item">
             <a class="nav-link body-2nd-block" href="homepage.php?PageName=routine"><div class="">routine</div></a>
           </li>
           <li class="nav-item">
             <a class="nav-link body-2nd-block" href="homepage.php?PageName=event"><div class="">events</div></a>
           </li>
           <li class="nav-item">
             <a class="nav-link body-2nd-block" href="homepage.php?PageName=about"><div class="">about</div></a>
           </li>
         </ul>
       </div>
     </nav>
  </div>
  <?php 
              
              if(!empty($_GET['PageName']))
              {
                $PageName=$_GET['PageName'];
                $myPagesFolder='C:\xampp\htdocs\myproject\pages folder';
                $directory=scandir($myPagesFolder,0);
                unset($directory[0],$directory[1]);
                 // print_r($directory);
                if(in_array($PageName.'.php', $directory))
                {
                 
                 include($myPagesFolder.'/'.$PageName.'.php');
                }
                else
                {
                  echo "404: not found";
                }
                
              }
              else
              {
                 $myPagesFolder='C:\xampp\htdocs\myproject\pages folder';
                include($myPagesFolder.'\homepage.php');
              }


            ?>
    <div class="box">
    </div>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript" src="js/homepage.js"></script>
</body>
</html>