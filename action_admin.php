<?php
session_start();
include 'connection.php';

if(isset($_POST['articleid']) && isset($_POST['action']) && $_POST['action']=="Approve")
{
	$idd=$_POST['articleid'];
	$verifyquery=mysql_query("update articles set verified=1 where id=" . $idd);
	//$verifyquery=1;
	if($verifyquery)
	{
		echo 'Article has been verified';
	}
	else 
	{
		echo 'Failed';
	}


}

if(isset($_POST['articleid']) && isset($_POST['action']) && $_POST['action']=="Discard")
{
	$idd=$_POST['articleid'];
	//$deleteyquery=1;
	//send the mail to that author with the content as the body of the file write the code over here after that delete that row from table

	$deletequery=mysql_query("delete from articles where id=" . $idd);
	if($deletequery)
	{
		echo 'Author has been notified';
	}
	else 
	{
		echo 'Error';
	}

}

if(isset($_POST['uname']) && isset($_POST['upass']) && isset($_POST['name']) && isset($_POST['email']))
{
	$uname=$_POST['uname'];
	$upass=sha1($_POST['upass']);
	$name = $_POST['name'];
	$email = $_POST['email'];

	$createquerry=mysql_query("insert into authorsdetails (auth_name,auth_email,auth_username,auth_password,timestamp) values ('$name','$email','$uname','$upass',now())");
	if($createquerry)
	{
		echo "New Author Created with username : ".$uname;
	}
	else 
	{
		echo "Error in creating author.Please try again later.";
	}

}

?>