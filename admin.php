<?php
//Database name=aasya table name=content;

if(isset($_POST['submit']))
{
	$articleName=$_POST['articlename'];
	$articleAuthorName=$_POST['articleauthorname'];
	$articleAuthorMail=$_POST['articleauthoremail'];



	if(isset($_POST['heading']))
		$articleHeading=$_POST['heading'];
	else 
	{
		$articleHeading=$_POST['heading'];
		//update the new heading in the json file also;
		$arr = json_decode(file_get_contents('whatwedo.json'),true);
		echo count($arr);
		//$data[] = array(++count($file) => $articleheading);
		//$result=json_encode($data);
		//file_put_contents('whatwedo.json', $result);
	}



	//upload the file in the respective directory
	$target="uploads/".$_FILES['fu']['name'];
	move_uploaded_file($_FILES['fu']['tmp_name'],$target);
	$articleContent=file_get_contents($target);

	//author email id is needed so that in a seperate page where the contents are reviewed by admin if he see that any article needs 
	//correction then that article will be sent as a mail to that particular author as an attachment and that row will be deleted from the
	//table.

	//0 is for not verified //create table columns in the same order as over here.
	$insertquerry=mysql_query("insert into content values('$articleHeading','$articleAuthorName','$articleAuthorMail','$articleName','$articleContent',0)") or die("insert querry fail");


delete($target);//upload the content in the database and delete the file later on to save space

}
?>


<html>
<head>
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
		document.getElementById("newchild").style.display='block';
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
		document.getElementById("oldheading").style.display='block';
		toggleButton.setAttribute('value','Create New Heading');
	}
}
</script>
</head>
<body onload="reset()">

	<form name="contentupload" enctype="multipart/form-data" action="" method="post">

		<input id="tgl" type="hidden" value="0">
		<input id="tgbt" type="button" value="Create New Heading" onclick="createheading()">
		<hr>
		<?php
		include_once 'connection.php';
		$querry=mysql_query("select distinct heading from articles");
		if(!$querry)
			echo "heading name fetch fail";
		else{
			$result = mysql_fetch_array($querry);
			$totalHeadings = mysql_num_rows($querry);
		?>
		<select id="oldheading"> Heading Name:
			<?php
			for ($i=0;$i<$totalHeadings;$i++)
			{
				?>
				<option name="heading"><?php echo $result[$i]?></option>
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

		Article Name: <input type="text" name="articlename" placeholder="Enter the Article Name" pattern="[A-Za-z0-9]{20}"><br>
		Article Author Name: <input type="text" name="articleauthorname" placeholder="Enter the Author Name" pattern="[A-Za-z0-9]{20}"><br>
		Article Author email: <input type="email" name="articleauthoremail"  placeholder="Enter the Author Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" ><br>
		<input type="file" name="fu">
		<input type="submit" name="submit" value="submit">
	</form>
</body>
</html> 