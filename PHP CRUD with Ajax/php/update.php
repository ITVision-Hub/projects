<?php
	include('conn.php');
	if(isset($_POST['edit'])){
		$id=$_POST['id'];
		$name=$_POST['name'];
        $password=$_POST['password'];
        
        if (strlen($password) < 6)
        {
        return  "Input is too short, minimum is 6 characters (20 max).";
        }
        
        // $hash=password_hash($_POST['password'], PASSWORD_BCRYPT);
        // $hash = md5($password);
        $hash = base64_encode(($password));
		$email=$_POST['email'];
 
        mysqli_query($conn,"update `users` set name='$name', password='$hash', email='$email' where id='$id'");

	}
?>