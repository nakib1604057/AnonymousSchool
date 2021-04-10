<?php
require_once('include/session.php'); 
 ?>
<?php
$conn=mysqli_connect('localhost','root','','school_database');

  if (isset($_POST['submit'])) {
      $username=getdata($_POST['username']);
      $password=getdata($_POST['password']);
      $user_type=getdata($_POST['user_type']);
      if($user_type==="teacher")       
      {
        $query="SELECT * FROM teacher_data WHERE username='$username' and password='$password'";
        $exceut=mysqli_query($conn,$query)or die("cann't select DB");
      // print_r($exceut);
      if(mysqli_num_rows($exceut)>0)
      {
        $result=mysqli_fetch_assoc($exceut);
        echo $result['username'];
        $_SESSION['username']=$result['username'];
      }
      else
      {
        echo "TRY AGAIN";
      }
      }
      else {
      $query="SELECT * from studentdata WHERE user_name='$username'and password='$password'";
      $exceut=mysqli_query($conn,$query)or die("cann't select DB");
      // print_r($exceut);
      if(mysqli_num_rows($exceut)>0)
      {
        $result=mysqli_fetch_assoc($exceut);
        echo $result['user_name'];
        $_SESSION['username']=$result['user_name'];
      }
      else
      {
        echo "TRY AGAIN";
      }
    }
  }
  function getdata($data)
  {
    return $data;
  }
?>

<!DOCTYPE html>
<html>
<head>
	<title>CUET SCHOOL</title>
   <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  <style type="text/css">
    .formbox
    {
      
      width: 30%;
      margin: 10% 20% 30% 30%;
      border:2px solid black;
    }
    .login_button
    {
      background: black;
      border: 2px solid blue;
      color: blue;
      border-radius: 5px;

    }

  </style>
</head>
<body>
<div class="formbox">
 <fieldset> <legend>Log in</legend>
<form method="post" action="login.php">
  Login As:<br>
  <select name="user_type" required>
    <option value="teacher">Teacher</option>
    <option value="student">Student</option>
  </select><br>
  UserName:<br>
  <input type="text" name="username" placeholder="" required><br>
  Password:<br>
  <input type="password" name="password" required><br>
  <button class="login_button" name="submit">submit</button>
</form></fieldset>
</div>
</body>
</html>