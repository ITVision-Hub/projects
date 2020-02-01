<?php
	include('conn.php');
?>
<!DOCTYPE html>
<html lang = "en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
		<title>PHP CRUD Operation using AJAX/JQuery</title>
	</head>
<body>
	<div style="height:30px;"></div>
	<div class = "row">	
		<div>
		</div>
		<div class="container mx-auto">
			<div class="row mx-auto">
                <div class="col-md-10 mx-auto">
                    <center><h2 class = "text-primary">PHP - CRUD Operation using AJAX/JQuery</h2></center>
					<hr style="width: 600px;">
					<form>
						<div class="form-group">
							<label for="name">Name:</label>
							<input type="text" class="form-control" id="name" aria-describedby="emailHelp" autocomplete="off" required>
						</div>
						<div class="form-group">
							<label for="password">Password:</label>
							<input type="password" class="form-control" id="password" minlength="6" autocomplete="off" required>
						</div>
						<div class="form-group">
							<label for="email">Email:</label>
							<input type="email" class="form-control" id="email" autocomplete="off" required>
						</div>
						<button type="submit" id="addnew" class="btn btn-primary"> Added</button>
					</form>
					
                </div>
            </div><br>
			<div class="row mx-auto">
				<div class="col-md-10 mx-auto">
					<div id="userTable">
					
					</div>
				</div>
			</div>
		</div>
	</div>
</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

<script type = "text/javascript">
	$(document).ready(function(){
		showUser();
		//Add New
		$(document).on('click', '#addnew', function(){
			if ($('#firstname').val()=="" || $('#password').val()=="" || $('#email').val()==""){
				alert('Please input data first');
			}
			else{
			$name=$('#name').val();
			$password=$('#password').val();			
			$email=$('#email').val();			
				$.ajax({
					type: "POST",
					url: "addnew.php",
					data: {
						name: $name,
						password: $password,
						email: $email,
						add: 1,
					},
					success: function(){
						showUser();
					}
				});
			}
		});
		//Delete
		$(document).on('click', '.delete', function(){
			$id=$(this).val();
				$.ajax({
					type: "POST",
					url: "delete.php",
					data: {
						id: $id,
						del: 1,
					},
					success: function(){
						showUser();
					}
				});
		});
		//Update
		$(document).on('click', '.updateuser', function(){
			$uid=$(this).val();
			$('#edit'+$uid).modal('hide');
			$('body').removeClass('modal-open');
			$('.modal-backdrop').remove();
			$uname=$('#uname'+$uid).val();
			$upassword=$('#upassword'+$uid).val();
			$uemail=$('#uemail'+$uid).val();
				$.ajax({
					type: "POST",
					url: "update.php",
					data: {
						id: $uid,
						name: $uname,
						password: $upassword,
						email: $uemail,
						edit: 1,
					},
					success: function(){
						showUser();
					}
				});
		});
 
	});
 
	//Showing our Table
	function showUser(){
		$.ajax({
			url: 'show_user.php',
			type: 'POST',
			async: false,
			data:{
				show: 1
			},
			success: function(response){
				$('#userTable').html(response);
			}
		});
	}
 
</script>
</html>