<?php
include('./classes/DB.php');

if (isset($_POST['resetpassword'])) {

	
}



?>
<h1>Forgot Password</h1>
<form action="forgot-password.php" method="post">
<p>
<input type="text" name="email" value="" placeholder="Email...">
</p>
<input type="submit" name="resetpassword" value="Reset Password">
</form>