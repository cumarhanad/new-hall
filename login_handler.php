<?php
 session_start();	
  include("conn.php"); 
  $email=$_POST['email'];
  $password=$_POST['password'];


  if(isset($_POST['submit']))
  {
  

      $query = mysqli_query($conn,"select * from users where email='$email' and password='$password'");
      $res=mysqli_fetch_array($query);
      $type=$res['type'];
      $id=$res['company_id'];
      $_SESSION['email']='email';
      $_SESSION['password'];
      
      if(mysqli_num_rows($query)>0){

        if($type=='business'){
            header("location:Bussiness?id=$id ");
            $_SESSION["$id"];
        }
        else if($type='Admins'){
            header("location:admin");  
        }
        else{
            echo "<center><h4 style='color: red;' class='mt-4'>No appropiate credantials found</h4></center>";
            include("login.php");

        }
            
        
      }

      else
      {
         echo "<center><h4 style='color: red;' class='mt-4'>Wrong credientails please Try Again</h4></center>";
     include("login.php");
        
       
      }


    }
  
?>


