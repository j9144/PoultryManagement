  
  <?php
session_start();
include("DbConnect.php");


$email=$_POST["Email"];
$password=$_POST["Pword"];


$sql="select * from `tbl_staffregister` where `Email`='$email' and `Password`='$password' ";
$result=mysqli_query($con,$sql);
$n=mysqli_num_rows($result);
if($n>0)
{
	while($row=mysqli_fetch_array($result))
	{
		if ($row['Status']!=2) 
		{
			echo "sorry please wait for admin approval";
		}
		else
		{
			$_SESSION['Type_Id']=$row['Type_Id'];
			if($row['Type_Id']=='1' )
			{	
                $_SESSION['id']=$row['StaffReg_Id'];
				$_SESSION['Email']=$email;
				header("location:farmerview.php");

			}
			elseif($row['Type_Id']=='2')
			{	
                $_SESSION['id']=$row['StaffReg_Id'];
				$_SESSION['Email']=$email;
				header("location:wholesalerview.php");

			}
			elseif($row['Type_Id']=='3')
			{	
                $_SESSION['id']=$row['StaffReg_Id'];
				$_SESSION['Email']=$email;
				header("location:supplierview.php");

			}
			elseif($row['Type_Id']=='4')
			{	
                $_SESSION['id']=$row['StaffReg_Id'];
				$_SESSION['Email']=$email;
				header("location:hatcheryview.php");

			}
			elseif($row['Type_Id']=='5')
			{	
                $_SESSION['id']=$row['StaffReg_Id'];
				$_SESSION['Email']=$email;
				header("location:distributor.php");

			}
			else
			{
				
				header("location:stafflogin.html");
			}


		}
}


}
else
{

echo"incorrect credentials";
}


mysqli_close($con);
?>
