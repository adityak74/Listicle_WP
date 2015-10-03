<?php
//Database name=aasya table name=content;

if(isset($_POST['submit']))
{
$articlename=$_POST['articlename'];
$articleauthorname=$_POST['articleauthorname'];
$articleauthormail=$_POST['articleauthoremail'];



if($_POST['heading'])
$articleheading=$_POST['heading'];
else 
{
	$articleheading=$_POST['newheading'];
	//update the new heading in the json file also;
	$file = json_decode(file_get_contents('whatwedo.json'),true);
	unset($file);
	echo count($file);
	//$data[] = array(++count($file) => $articleheading);
	//$result=json_encode($data);
	//file_put_contents('whatwedo.json', $result);
}



//upload the file in the respective directory
$target="uploads/".$_FILES['fu']['name'];
move_uploaded_file($_FILES['fu']['tmp_name'],$target);
$articlecontent=file_get_contents($target);


$timestamp = new DateTime();
echo $timestamp->getTimestamp();


//author email id is needed so that in a seperate page where the contents are reviewed by admin if he see that any article needs 
//correction then that article will be sent as a mail to that particular author as an attachment and that row will be deleted from the
//table.

//0 is for not verified //create table columns in the same order as over here.
$insertquerry=mysql_query("insert into content values('$articleheading','$articleauthorname','$articleauthormail','$articleheading','$articlecontent',0,$timestamp)") or die("insert querry fail");


delete($target);//upload the content in the database and delete the file later on to save space

}
?>


<html>
<head>
<script>
function createheading()

{//if a new heading is needed to upload the content then you need to use this function.
var mi = document.createElement("input");
mi.setAttribute('type', 'text');
mi.setAttribute('name', 'newheading');
mi.setAttribute('placehoder','Enter the new heading')
newchild.appendChild(mi);
document.getElementById("oldheading").display="none";//hide the dropdown menu after the child is append in the div block
}
</script>
</head>
<body>

<form name="contentupload" enctype="multipart/form-data" action="" method="post">

<buttton type="buttton" value="newheading" onclick="createheading()">Create New Heading</buttton>

<?php
include_once 'connection.php';
$querry=mysql_query("select distinct Heading_Name from content");
if(!$querry)
	echo "heading name fetch fail";
?>


<select id="oldheading"> Heading Name:
<?php
for ($i=0;$i<sizeof($querry);$i++)
{
	?>
  <option value="heading"><?php echo $querry[i]?></option>
<?php
	}
	?>
</select> 

<div id="newchild">
</div>


Article Name: <input type="text" name="articlename" placeholder="Enter the Article Name" pattern="[A-Za-z0-9]{20}"><br>
Article Author Name: <input type="text" name="articleauthorname" placeholder="Enter the Author Name" pattern="[A-Za-z0-9]{20}"><br>
Article Author email: <input type="email" name="articleauthoremail"  placeholder="Enter the Author Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" ><br>
<input type="file" name="fu">
<input type="submit" name="submit" value="submit">
</form>
</body>
</html> 