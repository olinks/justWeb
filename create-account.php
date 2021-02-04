<?php
$pdo = new PDO('mysql:host=files.000webhost.com;dbname=socialNetwork;charset=utf8', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

include('classes/DB.php');

if (isset($_POST['createaccount'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];
	$email = $_POST['email'];

	if (!DB::query('SELECT username FROM users WHERE username=:username', array(':username'=>$username))) {

		if (strlen($username) >= 3 && strlen($username) <= 32){

			if (preg_match('/[a-zA-Z0-9_]+/', $username)) {

				if (strlen($password) >= 6 && strlen($password) <= 60) {

				if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

				if (!DB::query('SELECT email FROM users WHERE email=:email', array(':email'=>$email))) {

					DB::query('INSERT INTO users VALUES (\'\', :username, :password, :email)', array(':username'=>$username, ':password'=>password_hash($password, PASSWORD_BCRYPT), ':email'=>$email));
					echo "Success!";
				} else{
					echo 'This Email Has Been Used';
				}
			} else {
					echo 'invalid email';
				}
			} else {
				echo 'invalid password';
			}

			} else {
				echo 'invalid username';
			}

		} else {
			echo 'invalid username';
		}

	} else {
			echo 'User already exist!';
		}
}

?>





<h1>Register</h1>
<form action="create-account.php" method="post">
<input type="text" name="username" value="" placeholder="username ..."><p />
<input type="password" name="password" value="" placeholder="password ..."><p />
<input type="email" name="email" value="" placeholder="someone@somesite.com"><p />
<input type="submit" name="createaccount" value="Create Account">
</form>