<?php 
   require_once('include/session.php'); 
 ?>
<?php 
     $conn=mysqli_connect('localhost','root','','school_database');
     $username=getdata($_SESSION['username']);
     $query="SELECT * FROM studentdata WHERE user_name='$username'";
     $exceut=mysqli_query($conn,$query)or die('cannnot select database');
      if(mysqli_num_rows($exceut)>0)
      {
        $result=mysqli_fetch_assoc($exceut);
        ?>
<div class="box">
	<div class="container-liquid">
        <div class="row justify-content-md-center">
           <div class="col col-lg-2 col-sm-12 profile-1st">
                     <ul class="nav flex-column">
                         <li class="nav-item">
                                 <a class="nav-link" href="#">Update Profile</a>
                         </li>
                         <li class="nav-item">
                                 <a class="nav-link active" href="#">Result</a>
                         </li>
                         <li class="nav-item">
                                 <a class="nav-link active" href="#">Send Message</a>
                         </li>
                        <li class="nav-item">
                                 <a class="nav-link active" href="#">Achivement</a>
                         </li>
                      </ul>         
           </div>
           <div class="col-lg-10 col-sm-12 profile-2nd"> 
                  <div class="container-liquid">
                  	<div class="row">
                  		<div class="col col-lg-3">
                  			<div class="profile-pic"><style type="text/css">
                       .profile-pic
                       {
                          background-image: url(upload/5d03d7b84576a5.56973437.png);
                          background-size: cover;
                          background-repeat: no-repeat;
                          height: 286px;
                          background-position: center;
                          border-radius: 4%;

                       }   
                        </style></div>
                            <div class="profile-username"><?php        
        echo $result['user_name'];?>
     </div>
                  		</div>
                  		<div class="col col-lg-9">
                  			
                  		</div>
                  	</div>
                  </div>
           	      <div class="container-liquid">
           	      	<div class="row justify-content-md-center">
           	      		<div class="col col-lg-6 profile-data">
           	      			<table>
           	      				<tr>
           	      					<td>
           	      						First Name
           	      					</td>
           	      					<td>
           	      						:
           	      					</td>
                            <td> </td>
                            <td><?php echo $result['first_name']; ?></td>
           	      				</tr>
           	      				<tr>
           	      					<td>
           	      						Last Name
           	      					</td>
           	      					<td>
           	      						:
           	      					</td>
                            <td> </td>
                            <td><?php echo $result['last_name']; ?></td>
           	      				</tr>
                                <tr>
           	      					<td>
           	      					    Class	
           	      					</td>
           	      					<td>:</td>
                            <td> </td>
                            <td><?php echo $result['class']; ?></td>
           	      				</tr>
           	      				<tr>
           	      					<td>
           	      					    Section
           	      					</td>
           	      					<td>:</td>
                            <td> </td>
                            <td><?php echo $result['section'] ?></td>
           	      				</tr>
           	      				<tr>
           	      					<td>
           	      						Roll
           	      					</td>
           	      					<td>:</td>
                            <td> </td>
                            <td><?php echo $result['roll']; ?></td>
           	      				</tr>
           	      				<tr>
           	      					<td>
           	      						Phone Number
           	      					</td>
           	      					<td>:</td>
                            <td> </td>
                            <td><?php echo $result['phone_number']; ?></td>
           	      				</tr>
           	      			</table>
           	      		</div>
           	      		<div class="col col-lg-6"></div>
           	      	</div>
           	      </div>

           </div>
        </div>
    </div>
</div>
<?php
 }
      else
      {
        echo "TRY AGAIN";
      }
      function getdata($data)
      {
        return $data;
      }?>
      <!-- <img src="upload/<?php echo $result['profile_pic'];?>" width="100%" height="259"> -->