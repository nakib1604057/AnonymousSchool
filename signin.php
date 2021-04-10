<?php 
$teacher=0;
$student=0;
$fname="";
$lname="";
$fnameError="";
$lnameError="";
$conn=mysqli_connect('localhost','root','','school_database');

if(isset($_POST['studentSubmit']))
{
    echo "student";
    if($_POST['fname'])
    {
      if(preg_match("/^[A-Za-z. ]*$/",$_POST['fname']))
       {
         $fname=userdata($_POST['fname']);
         
       }
       else
       {
         $fnameError="Please enter first name correctly";
       }
    }
    if ($_POST['lname']) {
       if(preg_match("/^[A-Za-z. ]*$/",$_POST['lname']))
       {
         $lname=userdata($_POST['lname']);
       }
       else
       {
         $lnameError="Please enter Last name correctly";
       }
    }
    if($_POST['phonenumber'])
    {
        
        if(preg_match("/^[0-9]*$/",$_POST['phonenumber']))
        {
            $phonenumber=userdata($_POST['phonenumber']);
        }
        else
        {
            $phonenumberError="please entry phonenumber in correct form";
        }
    }
    if($_POST['password'])
    {
        $password=userdata($_POST['password']);
    }
    if($_POST['rpassword'])
    {
        if($_POST["rpassword"]===$_POST['password'])
            $rpassword=userdata($_POST['rpassword']);
        else
        {
            $rpasswordError="Password and Repeat password must be same";
        }
    }
    if($_POST['class'])
    {
        $class=userdata($_POST['class']);
    }
    if($_POST['roll'])
    {
        $roll=userdata($_POST['roll']);
    }
    if($_POST['section']){
       $section=userdata($_POST['section']);
    }
    $user_name=$lname.'_'.$class.'_'.$roll;
      // $file=$_FILES['propic'];
      // print_r($file);
      $fileName=$_FILES['propic']['name'];
      $fileTmpName=$_FILES['propic']['tmp_name'];
      $fileSize=$_FILES['propic']['size'];
      $fileError=$_FILES['propic']['error'];
      $fileType=$_FILES['propic']['type'];
      $fileExt=explode(".", $fileName);
      $fileActualExt=strtolower(end($fileExt));
      $allowed=array('jpg','png','jpeg');
      if(in_array($fileActualExt, $allowed))
      {
         if($fileError===0)
         {
              if($fileSize<1000000){
                 $fileNewName=uniqid("",true).".".$fileActualExt;
                 $fileDestination='upload/'.$fileNewName;
                 move_uploaded_file($fileTmpName,$fileDestination);
                  $query="INSERT INTO studentdata(first_name,last_name,user_name,class,roll,phone_number,section,password,repeat_password,profile_pic)
                  VALUES
                 ('$fname','$lname','$user_name','$class','$roll','$phonenumber','$section','$password','$rpassword','$fileNewName')";
                  $exceut=mysqli_query($conn,$query)or die('cannnot select database');   
              }
              else
              {
                echo "You can not set pic";
              }
         }
         else
         {
            echo "You can not upload this file";
         }
      }
      else
      {
        echo "please give profile pic";
      }
    



}
if(isset($_POST['teacherSubmit']))
{
       if($_POST['fname'])
    {
      if(preg_match("/^[A-Za-z. ]*$/",$_POST['fname']))
       {
         $fname=userdata($_POST['fname']);
         
         
       }
       else
       {
         $fnameError="Please enter first name correctly";
       }
    }
    if ($_POST['lname']) {
       if(preg_match("/^[A-Za-z. ]*$/",$_POST['lname']))
       {
         $lname=userdata($_POST['lname']);
          $uname=$fname.$lname;
       }
       else
       {
         $lnameError="Please enter Last name correctly";
       }
    }
    if($_POST['phonenumber'])
    {
        
        if(preg_match("/^[0-9]*$/",$_POST['phonenumber']))
        {
            $phonenumber=userdata($_POST['phonenumber']);
        }
        else
        {
            $phonenumberError="please entry phonenumber in correct form";
        }
    }
    if($_POST['Job-entry_month'])
    {
         $entry_month=userdata($_POST['Job-entry_month']);
    }
    if($_POST['Job-entry_date'])
    {
        $entry_date=userdata($_POST['Job-entry_date']);
    }
    if($_POST['Job-entry_year'])
    {
        $entry_year=userdata($_POST['Job-entry_year']);
        $job_entry_date=$entry_date.$entry_month.$entry_year;
    }
    if($_POST['subject'])
    {
        $subject=userdata($_POST['subject']);
    }
    if($_POST['employee_code'])
    {
        $empcode=userdata($_POST['employee_code']);
    }
    if($_POST['password'])
    {
        $password=userdata($_POST['password']);
    }
    if($_POST['phonenumber'])
    {
        $phonenumber=userdata($_POST['phonenumber']);
    }
    if($_POST['rpassword'])
    {
        if($_POST["rpassword"]===$_POST['password']){
            $rpassword=userdata($_POST['rpassword']);
            $query="insert into teacher_data(first_name,last_name,username,job_entry_date,teaching_subject,employee_code,phonenumber,password, repeatpassword) VALUES ('$fname','$lname','$uname','$job_entry_date','$subject','$empcode','$phonenumber','$password','$rpassword')";
            $exceut=mysqli_query($conn,$query)or die("cannot select DB");
        }
        else
        {
            $rpasswordError="Password and Repeat password must be same";
        }
    } 
}
if(isset($_POST['first-submit']))
{
	if($_POST['user']==='teacher')
	{
		$teacher=1;
	}
	else
	{
		$student=1;
	}
	if($teacher===1||$student===1)
	{
		echo ' <form method="post" action="signin.php" enctype="multipart/form-data">
               Profile Pic: <br>
               <input type="file" name="propic"><br>
	           First Name:<br>
                <input type="text" name="fname" required><br>
               Last Name <br>
                <input type="text" name="lname" required><br>';
	}
	if($teacher===1)
	{
       
		echo '  Job Entry Date:<br>
     <select name="Job-entry_month">
     	<option>Jan</option>
     	<option>Feb</option>
     	<option>Mar</option>
     	<option>Apr</option>
     	<option>May</option>
     	<option>Jun</option>
     	<option>Jul</option>
     	<option>Aug</option>
     	<option>Sep</option>
     	<option>Oct</option>
     	<option>Nov</option>
     	<option>Dec</option>
     </select>
     <select name="Job-entry_date">
     	<option>1</option>
     	<option>2</option>
     	<option>3</option>
     	<option>4</option>
     	<option>5</option>
     	<option>6</option>
     	<option>7</option>
     	<option>8</option>
     	<option>9</option>
     	<option>10</option>
     	<option>11</option>
     	<option>12</option>
     	<option>13</option>
     	<option>14</option>
     	<option>15</option>
     	<option>16</option>
     	<option>17</option>
     	<option>18</option>
     	<option>19</option>
     	<option>20</option>
     	<option>21</option>
     	<option>22</option>
     	<option>23</option>
     	<option>24</option>
     	<option>25</option>
     	<option>26</option>
     	<option>27</option>
     	<option>28</option>
     	<option>29</option>
     	<option>30</option>
     </select>
     <select name="Job-entry_year">
     	<option>2010</option>
     	<option>2011</option>
     	<option>2012</option>
     	<option>2013</option>
     	<option>2014</option>
     	<option>2015</option>
     	<option>2016</option>
     	<option>2017</option>
     	<option>2018</option>
     	<option>2019</option>
     </select>
     <br>
     Subject:<br>
     <select name="subject">
     	<option>Bangla</option>
     	<option>English</option>
     	<option>Math</option>
     	<option>Science</option>
     	<option>Sociology</option>
     	<option>Islam</option>
     	<option>Arts</option>
     </select><br>
      Employee Code:<br>
      <input type="text" name="employee_code"><br>';
	}
	if($student===1)
	{
		echo 'class:<br>
	<input type="text" name="class"><br>
	Section:<br>
	<select name="section">
		<option>A</option>
		<option>B</option>
		<option>C</option>
		<option>D</option>
		<option>E</option>
	</select><br>
    Roll:<br>
    <input type="text" name="roll"><br>';
	}
    if($teacher===1||$student===1)
    {
      echo ' phonenumber:<br>
     <input type="text" name="phonenumber"><br>
     Password:<br>
     <input type="password" name="password"><br>
     Repeat Password:<br>
     <input type="password" name="rpassword"><br>
     <input type="submit"'; 
     if($teacher===1){
        echo 'name="teacherSubmit">';
    }
    if($student===1)
    {
        echo 'name="studentSubmit">';
    }
}
         
}
function userdata($data)
{
    return $data;
}
 ?>
 <!DOCTYPE html>
<html>
<head>
<title>Anonomus school</title>
</head>
<body>
	<?php
	 if($teacher===0 && $student===0)
	 {
	 	echo '	<form action="signin.php" method="post">
                     <select name="user" required>
                     	<option value="teacher">Teacher</option>
	                    <option value="student">Student</option>
                     </select>
                     <input type="submit" name="first-submit">
                </form>';
	 }
	 ?>

</body>
</html>