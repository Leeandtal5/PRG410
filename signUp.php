<link href="styles.css" rel="stylesheet" type="text/css">
<div>
<?php
include("connection.php"); 
include("header.php");
?>
</div>
<div class="wrapper">
<div class="regForm">
<h1>Member Sign Up</h1>
	<?php
	
	///VALIDATION
	//variables
	$nameErr= $passErr= $passchErr= $emailErr= $fname= $username= $userpass= $userpassch= $email="";
	
	$secure_userpass=hash('sha256', $userpass);
	
	//check for errors
	if ($_SERVER["REQUEST_METHOD"]== "POST"){
		//function to display erros
		function test_input($data){
			$data= trim($data);
			$data= stripslashes($data);
			$data= htmlspecialchars($data);
			return $data;
		}
		if(empty($_POST["frame"])){
			$nameErr= "Your name is requried";
		}
		else{
			$fname= test_input($_POST["fname"]);
		}
		if(empty($_POST["username"])){
			$userErr="User name is required";
		}
		else{
			$username= test_input($_POST["username"]);
		}
		if(empty($_POST["userpass"])){
			$passErr="Your password is requried";
		}
		else{
			$userpass= test_input($_POST["userpass"]);
		}
		if(empty($_POST["userpassCheck"])){
			$userchErr= "Retype your password";
		}
		else{
			$userpassch= test_input($_POST["userpassCheck"]);
		}
		if($userpassch == $userpass){
			$userchErr="Password Match";
		}
		if (empty($_POST["useremail"])){
			$emailErr= "Email is required";
		}
		else{
			$email= test_input($_POST["useremail"]);
		}
	
	//save to database
	$sql = "INSERT INTO users (fullName, userName, email, password) VALUES ('$fname', '$username', '$email', '$secure_userpass')";
	//test connection
	if ($connect->query($sql)===TRUE){
		header("Location: index.php");
	}
	else{
		echo "Error: ".$sql."<br/>".$connect->error;
	}
		}
	?>


<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" id="signup" class="form">
	<label>Name: </label><input type="text" name="fname">
	<br/>
	<label>User Name: </label><input type="text" name="username">
	<br/>
	<label>Password: </label><input type="text" name="userpass">
	<br/>
	<label>Re-enter Password: </label><input type="text" name="userpassCheck">
	<br/>
	<label>Email: </label><input type="text" name="useremail">
	<br/>
	<input type="submit" value="Join" class="submit">
</form>
</div>	
	</div>
</section>
<?php
include("footer.php");
?>