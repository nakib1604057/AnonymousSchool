<div class="box">
	<?php 
    $query="SELECT * FROM notice";
	$exceut=mysqli_query($conn,$query)or die('cannnot select database');
	if(mysqli_num_rows($exceut)>0)
	{
		$result=mysqli_fetch_assoc($exceut);

	?>
<div class="container-liquid">
        <div class="row justify-content-md-center">
           <div class="col col-lg-2 col-sm-12 ">
                     <ul class="nav flex-column">
                         <li class="nav-item">
                                 <a class="nav-link" href="#">New Notice</a>
                         </li>
                         <li class="nav-item">
                                 <a class="nav-link active" href="#">Notice for admission</a>
                         </li>
                         <li class="nav-item">
                                 <a class="nav-link active" href="#">Notice for vaction</a>
                         </li>
                
                      </ul>         
           </div>
           <div class="col-lg-10 col-sm-12 "> 
                  <div class="container-liquid">
                  	<div class="row">
                  		<div class="col col-lg-10">
                  		 <div class="notice-box">
                  		  <h5 class="notice-title"><?php echo $result['title']; ?></h5>
                  		 	<div class="notice-pic">
                  		 		<?php echo $result['notice_pic']; ?>
                  		 	</div>
                  		 	<div class="notice-date"><?php echo $result['date'];?></div>
                  		 	<div class="notice-description"><?php if(strlen($result['notice_description'])>50)
                  		 	{
                             $notice_des=substr($result['notice_description'], 0,300).'.......<a href=>read more</a>';
                  		 	 echo $notice_des;
                  		 	} ?> </div>
                  		 </div>
                  		</div>
                  	</div>
                  </div>

           </div>
        </div>
    </div>

}
<?php } ?>
</div>
