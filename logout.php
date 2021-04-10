<?php
require_once('include/session.php'); 
?>
<?php
$_SESSION['username']=null;
session_destroy();
 ?>