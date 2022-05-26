<!-- <?php
  session_start();
  session_destroy();
  header('location:login.php');
  
?> -->

<?php
session_start();
include("DbConnect.php");
$_SESSION['Email']=="";
date_default_timezone_set('Asia/Kolkata');
$ldate=date( 'd-m-Y h:i:s A', time () );
mysqli_query($con,"UPDATE tbl_userlog  SET Logout = '$ldate' WHERE UserEmail = '".$_SESSION['Email']."' ORDER BY id DESC LIMIT 1");
session_unset();
$_SESSION['errmsg']="You have successfully logout";
?>
<script language="javascript">
document.location="Homeindex.php";
</script>
