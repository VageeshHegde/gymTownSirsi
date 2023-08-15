<html>
<head>
<title>Record Removed</title>
<meta http-equiv="content-type" content ="text/html; charset=iso-8859-1" />
</head>
<body>

<h1>Shakti Gym Town</h1>
<h2>Your Record</h2>
<?php
		$DBConnect = mysqli_connect("127.0.0.1","root","","vageesh");
	
	if($DBConnect === false)
			print"Unable to connection to the database, error number:".mysqli_errno();
			else{
				
					$TableName = "project";
					//********************************************************
					//this is the new code to delete a records
					$SearchThis = stripslashes($_POST['mail']);
					$SQLString = "select from $TableName where email = '$SearchThis'";
					$QueryResult = mysqli_query($DBConnect,$SQLString);
															
					//*********************************************************
									
					$SQLString = "select * from $TableName where email='$SearchThis'";
					$QueryResult = mysqli_query($DBConnect,$SQLString);
					/*
						print"There are no records in the database";
							
					else{*/
						if(mysqli_num_rows($QueryResult)> 0)
						{print"Here is a list of your data";
						//we are now going to set up the table
						print"<table width ='100%' border='1'>";
						print"<tr><th>id</th><th>First_Name</th><th>Last_Name</th><th>Email</th><th>Address</th><th>Zip</th><th>Phone_Number</th><th>Weight</th><th>Height</th><th>Gender</th><th>Program</th></tr>";
						//this is where we make it dynamic
						
						while($Row = mysqli_fetch_assoc($QueryResult))
						{
							print"<tr><td>{$Row['id']}</td><td>{$Row['firstName']}</td><td>{$Row['lastName']}</td><td>{$Row['email']}</td><td>{$Row['address']}</td><td>{$Row['zip']}</td><td>{$Row['phoneNumber']}</td><td>{$Row['weight']}</td><td>{$Row['height']}</td><td>{$Row['gender']}</td><td>{$Row['program']}</td></tr>";
									
						}//end while
						print"</table>";
						}
							else	
								print"0 results";
							
					//}//end there are records
					mysqli_free_result($QueryResult);
						
					
				}//end the there is a database
		mysqli_close($DBConnect);
	
		
	
?>
<br>
<h2>Give your Feedback</h2>
<textarea rows=6 cols=90>Hi there!</textarea>

</body>
</html>