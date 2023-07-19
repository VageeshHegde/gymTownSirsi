<html>
<head>
<title>Stored Names</title>
</head>
<body>

<h1>StoreSongs.php</h1>
<h2>Accepted data from input page and stored into DB.</h2>
<?php
if(empty($_POST['firstName'])||empty($_POST['lastName'])||empty($_POST['mail'])||empty($_POST['address'])||empty($_POST['code'])||empty($_POST['phone'])||empty($_POST['weight'])||empty($_POST['height'])||empty($_POST['pass'])||empty($_POST['color'])||empty($_POST['favoriteColor']))
		print"You must enter all of the information";
	else
	{
		//WE DO NOT inlcude our DBD connection information in the file like this
		//establish a commenction to the database
		$DBConnect = mysqli_connect("127.0.0.1","root","","vageesh");
		
		if($DBConnect === false)
			print"Unable to connection to the database, error number:".mysqli_errno();
			else{
				
			
				//you could and should make sure that there is a DBName called your name
				//create the code to say what table we are going to use
				$TableName = "project";
				//now it is time to get the information from the $_POST array
				
				$firstName = stripslashes($_POST['firstName']);
				$lastName = stripslashes($_POST['lastName']);
				$mail = stripslashes($_POST['mail']);
                $address = stripslashes($_POST['address']);
                $code = stripslashes($_POST['code']);
                $phone = stripslashes($_POST['phone']);
                $weight = stripslashes($_POST['weight']);
                $height = stripslashes($_POST['height']);
                $pass = stripslashes($_POST['pass']);
                $color = stripslashes($_POST['color']);
                $favoriteColor = stripslashes($_POST['favoriteColor']);
				
				//now it is time to crate the SQL statement
				$SQLstring = "insert into $TableName(firstName, lastName, email, address, zip, phoneNumber, weight, height, password, gender, program) values ('$firstName','$lastName','$mail','$address','$code','$phone','$weight','$height','$pass','$color','$favoriteColor')";
				
				//this is the line of code that executes our SQL statement
				//$QueryResult =mysqli_query($SQLstring,$DBConnect);
				if(mysqli_query($DBConnect,$SQLstring))
					print"New Record Created";
				else
					print"Error: " . $$SQLstring . "<br>" . mysqli_error($DBConnect);
				
			}//end inner else DB connect
			mysqli_close($DBConnect);
		
	}//end outter have everything

?>
</body>
</html>