<?PHP
   session_start();

   $servername='localhost:3307';
   $username='root';
   $password='';
   $dbname='agora';

   $db_handle = @mysql_connect($servername,$username, $password) OR DIE ('Unable to connect to database! Please try again later.');
   @mysql_select_db($dbname);

   if (isset($_POST['username']) && isset($_POST['password'])&& isset($_POST['firstName'])&& isset($_POST['lastName'])&& isset($_POST['email'])){
      $uname = $_POST['username'];
      $psw = $_POST['password'];
      $firstName = $_POST['firstName'];
      $lastName = $_POST['lastName'];
      $email = $_POST['email'];

      $query = 'INSERT INTO user VALUES( NULL, \'' . $uname . '\', \'' . $psw . '\' , \'' . $email . '\', \'' . $firstName . '\', \'' . $lastName . '\', \'\', \'0\', \'0\', \'0\', \'0\', \'0\');';
      $result = mysql_query($query);

      $_SESSION['username']=$uname;
      $_SESSION['password']=$psw;
      header('Location: home.php');
   }
?>

<!DOCTYPE html>
<html>
<head>
	<title>Sign Up</title>
</head>
<body>
	<form id = "signup" action="signup.php" method="post">
 		 <div class="container">
			 <div class="signup_data">
			 	<div class="signup_data_row">
               <label class = "input_label">E-mail</label>
    				<input class = "input_text_box" type="email" placeholder="Enter E-mail" name="email" required>
			 		<label class = "input_label">Username</label>
    				<input class = "input_text_box" type="text" placeholder="Enter Username" name="username" required>
               <label class = "input_label">First Name</label>
    				<input class = "input_text_box" type="text" placeholder="Enter First Name" name="firstName" required>
               <label class = "input_label">Last Name</label>
    				<input class = "input_text_box" type="text" placeholder="Enter Last Name" name="lastName" required>
				</div>
				<div class="signup_data">
    				<label class = "input_label">Password</label>
    				<input class = "input_text_box" type="password" placeholder="Enter Password" name="password" required>
				</div>
			</div>
    			<button id="submit_btn" type="submit">Sign Up</button>
  		</div>
</form>
</body>
</html>
