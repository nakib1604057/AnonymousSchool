<?php 

session_start();
function check_user_login()
{
	if(isset($_SESSION['username']))
	{
       return true; 
	}
}

function check_for_validation()
{
   if(!check_user_login())
   {
   	 header();
   }
}

 ?>