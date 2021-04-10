
<style type="text/css">
  h3
  {
    background: #14756d;
    color: white;
    border-bottom-right-radius: 14px;
    border-bottom-left-radius: 14px;

  }
  .student-head
  { 
    margin-top: 1%;
    margin-right: 5%;
    background: white;
    margin-left: 6%;
    margin-bottom: 1%;
    border: 1px solid #14756d;
    box-shadow: 0px 4px 4px rgb(189, 189, 189), 2px 2px 3px 1px rgba(255, 255, 255);
  }
  
</style>
<div class="box">

<?php 

     for($i=1;$i<=10;$i++)
	{
	 echo "<div class='student-head'><h3>student of class  $i</h3>";
	
     $query="SELECT section FROM studentdata where class='$i'";
     $exceut=mysqli_query($conn,$query)or die('can not select database');
     if(mysqli_num_rows($exceut)>0)
      {
       while($result = mysqli_fetch_assoc($exceut))
        {
         echo '<a href="">'.'section'.' '.$result['section'].'</a>'.'<br>';
        }
      }
      echo "<br>".'</div>';
	}	 
?>

</div>






