<?php
//Database name=aasya table name=content;

if(isset($_POST['submit']))
{
	$articleName=$_POST['articlename'];
	$articleAuthorName=$_POST['articleauthorname'];
	$articleAuthorMail=$_POST['articleauthoremail'];

	if(isset($_POST['tgl']) && $_POST['tgl']==1){
		$articleHeading=$_POST['newheading'];
	}
	else{
		$articleHeading=$_POST['heading'];
	}



	//upload the file in the respective directory
	$target="uploads/".$_FILES['fu']['name'];
	move_uploaded_file($_FILES['fu']['tmp_name'],$target);
	$articleContent=file_get_contents($target);

	//author email id is needed so that in a seperate page where the contents are reviewed by admin if he see that any article needs 
	//correction then that article will be sent as a mail to that particular author as an attachment and that row will be deleted from the
	//table.
	include 'connection.php';
	echo $articleHeading . "<br>";	
	echo $articleAuthorName . "<br>";
	echo $articleAuthorMail . "<br>";
	echo $articleName . "<br>";
	echo $articleContent . "<br>";
	//0 is for not verified //create table columns in the same order as over here.
	$query = "INSERT INTO articles(heading,auth_name,auth_email,article_heading,content,verified) 
	          VALUES('$articleHeading','$articleAuthorName','$articleAuthorMail','$articleName',
	          	     '$articleContent',0)";
	$insertquerry=mysql_query($query) or die(mysql_query());


unlink($target);//upload the content in the database and delete the file later on to save space
echo "Done";
}
?>


<html>
<head>
<style>
	body{
		background-color: #f5f5f5;
	}
	form{
		text-align: center;
		padding: 20px;
		border-radius: 20px;
		border: 1px solid #ccc;
		box-shadow: 1px 1px 1px #111;
	}
</style>
<script>
var created=1;

function reset(){
	document.getElementById("newchild").style.display='none';
}

function createheading()
{	//if a new heading is needed to upload the content then you need to use this function.
	var toggle = document.getElementById('tgl');
	var toggleButton = document.getElementById('tgbt');
	if(!parseInt(toggle.value)){
		toggle.setAttribute('value','1');
		toggleButton.setAttribute('value','Select from Headings');
		document.getElementById("newchild").style.display='inherit';
		if(created==1){
		var mi = document.createElement("input");
		mi.setAttribute('type', 'text');
		mi.setAttribute('name', 'newheading');
		mi.setAttribute('placeholder','Enter the new heading')
		document.getElementById("newchild").appendChild(mi);
		created++;
		}
		document.getElementById("oldheading").style.display='none';//hide the dropdown menu after the child is append in the div block
	}else{
		toggle.setAttribute('value','0');
		document.getElementById("newchild").style.display='none';
		document.getElementById("oldheading").style.display='inherit';
		toggleButton.setAttribute('value','Create New Heading');
	}
}
</script>
</head>
<body onload="reset()">
<center>
	<form name="contentupload" enctype="multipart/form-data" action="" method="post">

		<input id="tgl" name="tgl" type="hidden" value="0">
		<input id="tgbt" type="button" value="Create New Heading" onclick="createheading()">
		<hr>
		<?php
		include_once 'connection.php';
		$querry=mysql_query("select distinct heading from articles");
		if(!$querry)
			echo "heading name fetch fail";
		else{
			$totalHeadings = mysql_num_rows($querry);
		?>
		<select id="oldheading" name="heading" style="margin:0 auto;"> Heading Name:
			<?php
			while($row = mysql_fetch_array($querry))
			{
				?>
				<option><?php echo $row[0]?></option>
				<?php
			}
			?>
		</select> 
		<?php
		}
		?>

		<div id="newchild">

		</div>
		<hr>

		Article Name: <input type="text" name="articlename" placeholder="Enter the Article Name" pattern="[A-Za-z0-9]+{20}"><br>
		Article Author Name: <input type="text" name="articleauthorname" placeholder="Enter the Author Name" pattern="[A-Za-z0-9]+{20}"><br>
		Article Author email: <input type="email" name="articleauthoremail"  placeholder="Enter the Author Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" ><br>
		<input type="file" name="fu"><br>
		<input type="submit" name="submit" value="submit">
	</form>
</center>
</body>
</html> 