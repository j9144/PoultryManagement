<?php
    session_start();
    include("DbConnect.php");
    if(isset($_SESSION['Email']))
{
          
          $lmail= $_SESSION['Email'];


          $sqli = "select Name from tbl_staffregister where Email = '$lmail'";
          $resulti = mysqli_query($con,$sqli);
          $row = mysqli_fetch_array($resulti);

          $sql = "select * from tbl_staffregister where Email = '$lmail' ";
          $resulti = mysqli_query($con,$sql);
          $row = mysqli_fetch_array($resulti);
          $type_id =  $row['Type_Id'];

          
           // $data = "select * from tbl_product where  ";

                

}

    
 if (isset($_POST['sub'])){
    


    $name =  $_POST['Name'];
    $add =  $_POST['Address'];
    $mail =  $_POST['Email'];
    $phone =  $_POST['PhnNo'];
	  $password =$_POST['Pword'];
    $type_id =   $_POST['staff_type'];

    
    $sqli = "select Email from tbl_staffregister where Email = '".$mail."'";
    $resulti = mysqli_query($con,$sqli);
    if(mysqli_num_rows($resulti)>0)  
    {  
        
      echo ("<script>
      window.alert('Already Registered User');
      window.location.href = 'StaffRegister.php';
      </script>");
    }

  else{
    
    
   
    
        $sqli = "insert into tbl_staffregister(Type_Id,Name,Address,Email,Phone_No,Password) values('$type_id','$name','$add','$mail','$phone','$password')";
        echo $sqli;
        if(mysqli_query($con,$sqli))
        {
           header('location: stafflogin.html');
        }

  //}
  //}

 
    }



         mysqli_close($con);

 }

	  ?>
      

  