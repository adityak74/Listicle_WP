<?php
session_start();
if(!isset($_SESSION['username']))
	header("location:login.php");

include 'connection.php';
//require ('wp-blog-header.php')

$unapprovedquerry=mysql_query("select * from articles where verified=0");
$approvedquerystats = mysql_query("select * from articles where verified=1");
$totalauthorsstats = mysql_query("select * from authorsdetails");

$approvedarticles = mysql_num_rows($approvedquerystats);
$unapprovedarticles = mysql_num_rows($unapprovedquerry);
$totalarticles = $approvedarticles + $unapprovedarticles;
$totalauthors = mysql_num_rows($totalauthorsstats);

if(isset($_POST['create']))
{
	$username=$_POST['username'];
	$userpass=$_POST['userpass'];

	$createquerry=mysql_query("insert into authorsdetails (auth_username,auth_password,timestamp) values ('$username','$userpass',now())");
	if($createquerry)
	{
		echo "<script language='javascript' type='text/javascript'>";
		echo "alert('New author has been added');";
		echo "</script>";
	}
	else 
	{
		echo "<script language='javascript' type='text/javascript'>";
		echo "alert('Author create error');";
		echo "</script>";
	}

}

?>




<!DOCTYPE html>
<html lang="en" class="no-js" >
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
	<meta name="description" content="" />
	<meta name="author" content="" />
	<!--[if IE]>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<![endif]-->
	<title>Aasya Health Foundation</title>
	<!-- BOOTSTRAP CORE CSS -->
	<link href="assets/css/bootstrap.css" rel="stylesheet" />
	<!-- ION ICONS STYLES -->
	<link href="assets/css/ionicons.css" rel="stylesheet" />
	<!-- FONT AWESOME ICONS STYLES -->
	<link href="assets/css/font-awesome.css" rel="stylesheet" />
	<!-- FANCYBOX POPUP STYLES -->
	<link href="assets/js/source/jquery.fancybox.css" rel="stylesheet" />
	<!-- STYLES FOR VIEWPORT ANIMATION -->
	<link href="assets/css/animations.min.css" rel="stylesheet" />
	<!-- CUSTOM CSS -->
	<link href="assets/css/style-green.css" rel="stylesheet" />


	<!-- CORE JQUERY -->
	<script src="assets/js/jquery-1.11.1.js"></script>
	<!-- BOOTSTRAP SCRIPTS -->
	<script src="assets/js/bootstrap.js"></script>
	<!-- EASING SCROLL SCRIPTS PLUGIN -->
	<script src="assets/js/vegas/jquery.vegas.min.js"></script>
	<!-- VEGAS SLIDESHOW SCRIPTS -->
	<script src="assets/js/jquery.easing.min.js"></script>
	<!-- FANCYBOX PLUGIN -->
	<script src="assets/js/source/jquery.fancybox.js"></script>
	<!-- ISOTOPE SCRIPTS -->
	<script src="assets/js/jquery.isotope.js"></script>
	<!-- VIEWPORT ANIMATION SCRIPTS   -->
	<script src="assets/js/appear.min.js"></script>
	<script src="assets/js/animations.min.js"></script>
	<!-- CUSTOM SCRIPTS -->
	<script src="assets/js/custom.js"></script>

	<!-- HTML5 Shiv and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]-->
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>

	<script type="text/javascript">
		$(document).ready(function(){

			$('.approvebtn').click(function(){
				articleId = $(this).parent().parent().find('.aid').val();
				btnname = $(this).html();
				alert(articleId + "," + btnname);

				$.ajax({
					url: "action_admin.php",
					method: "POST",
					data: 'articleid='+articleId+'&action='+btnname+'',
					success: function(data){
						alert(data);
					},
					error: function(jqXHR, exception) {
						var msg = '';
						if (jqXHR.status === 0) {
							msg = 'Not connect.\n Verify Network.';
						} else if (jqXHR.status == 404) {
							msg = 'Requested page not found. [404]';
						} else if (jqXHR.status == 500) {
							msg = 'Internal Server Error [500].';
						} else if (exception === 'parsererror') {
							msg = 'Requested JSON parse failed.';
						} else if (exception === 'timeout') {
							msg = 'Time out error.';
						} else if (exception === 'abort') {
							msg = 'Ajax request aborted.';
						} else {
							msg = 'Uncaught Error.\n' + jqXHR.responseText;
						}

						alert(msg);

					}
				});

			});

$('.discardbtn').click(function(){
	articleId = $(this).parent().parent().find('.aid').val();
	btnname = $(this).html();
	alert(articleId + "," + btnname);

	$.ajax({
		url: "action_admin.php",
		method: "POST",
		data: 'articleid='+articleId+'&action='+btnname+'',
		success: function(data){
			alert(data);
		},
		error: function(jqXHR, exception) {
			var msg = '';
			if (jqXHR.status === 0) {
				msg = 'Not connect.\n Verify Network.';
			} else if (jqXHR.status == 404) {
				msg = 'Requested page not found. [404]';
			} else if (jqXHR.status == 500) {
				msg = 'Internal Server Error [500].';
			} else if (exception === 'parsererror') {
				msg = 'Requested JSON parse failed.';
			} else if (exception === 'timeout') {
				msg = 'Time out error.';
			} else if (exception === 'abort') {
				msg = 'Ajax request aborted.';
			} else {
				msg = 'Uncaught Error.\n' + jqXHR.responseText;
			}

			alert(msg);

		}
	});
});

$(".authcreatebtn").click(function(){
	uname = $(this).parent().find('.uname').val();
	upass = $(this).parent().find('.upass').val();
	name = $(this).parent().find('.name').val();
	email = $(this).parent().find('.email').val();

	if(uname=='' || upass=='' || name=='' || email==''){
		alert("Can't be empty");
	}else{
				//alert(uname + "," + upass);
				$.ajax({
					url: "action_admin.php",
					method: "POST",
					data: 'uname='+uname+'&upass='+upass+'&name='+name+'&email='+email+'',
					success: function(data){
						alert(data);
					},
					error: function(jqXHR, exception) {
						var msg = '';
						if (jqXHR.status === 0) {
							msg = 'Not connect.\n Verify Network.';
						} else if (jqXHR.status == 404) {
							msg = 'Requested page not found. [404]';
						} else if (jqXHR.status == 500) {
							msg = 'Internal Server Error [500].';
						} else if (exception === 'parsererror') {
							msg = 'Requested JSON parse failed.';
						} else if (exception === 'timeout') {
							msg = 'Time out error.';
						} else if (exception === 'abort') {
							msg = 'Ajax request aborted.';
						} else {
							msg = 'Uncaught Error.\n' + jqXHR.responseText;
						}

						alert(msg);

					}
				});
			}
		});

});
</script>
</head>



<body data-spy="scroll" data-target="#menu-section" window.onload="hideform();">




	<div class="navbar navbar-inverse navbar-fixed-top scroll-me" id="menu-section" >
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="admin.php">
					Aasya Health Foundation Administration
				</a>
			</div>
			<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav navbar-right">
					<li><a href="#contact">Dashboard</a></li>
					<li><a href="#work">Approve Post</a></li>
					<li><a href="#grid">Create Authors</a></li>
					<li><a href="logout.php">LOGOUT</a></li>
				</ul>
			</div>

		</div>
	</div>

	<section id="contact" >
		<div class="container">
			<div class="row text-center header animate-in" data-anim-type="fade-in-up">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<h1>DASHBOARD</h1>	
					<p>Ye tu kar be jo jo statistics dikhana hai yaha mar de is format me </p>
					<hr />
				</div>
			</div>
			<div class="row pad-bottom animate-in" data-anim-type="fade-in-up">
				<div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-1 col-lg-10 col-lg-offset-1">
					<div class="row db-padding-btm db-attached">
						<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
							<div class="light-pricing">
								<div class="price">
									<?php 
									echo $totalarticles;
									?>
								</div>
								<div class="type">
									Articles
								</div>
								<ul>

									<li><i class="glyphicon glyphicon-print"></i>Unnaproved : <?php echo $unapprovedarticles; ?></li>
									<li><i class="glyphicon glyphicon-time"></i>Approved : <?php echo $approvedarticles; ?></li>
									
								</ul>
								
							</div>
						</div>
						
						<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
							<div class="light-pricing">
								<div class="price">
									<?php
									echo $totalauthors;
									?>
								</div>
								<div class="type">
									Authors
								</div>
								<ul>

									<li><i class="glyphicon glyphicon-print"></i>30+ Accounts </li>
									<li><i class="glyphicon glyphicon-time"></i>150+ Projects </li>
									
								</ul>
								
							</div>
						</div>
						
					</div>
				</div>
			</div>
		</div>
	</section>

	<!--DASHBOARD SECTION END-->
	<section id="work">
		<div class="container">
			<div class="row animate-in" data-anim-type="fade-in-up">
				<div class="row text-center header animate-in" data-anim-type="fade-in-up">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<h3>Unnaproved Post</h3>
						<hr />
					</div>
				</div>
				<div class="row pad-bottom animate-in" data-anim-type="fade-in-up">
					<div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-1 col-lg-10 col-lg-offset-1">
						<table class="table table-striped" id="utable">            
							<thead>
								<tr>
									<th>Topic</th>
									<th>Author Name</th>
									<th>Author Email</th>
									<th>Verify</th>
								</tr>
							</thead>


							<?php
							while($row = mysql_fetch_array($unapprovedquerry)){

									//echo '<script type="text/javascript">alert("'.$row['auth_name'].$row['auth_email'].'");</script>';

								?>

								<tbody>
									<tr>

										<div id="readform">
											<td style="color:black;"><?php echo $row['heading']; ?></td>  

											<?php

											$authquery = mysql_query("select auth_name,auth_email from authorsdetails WHERE aid=".$row['aid']);
											$authqueryresults = mysql_fetch_assoc($authquery);
									//echo "select auth_name,auth_email from authorsdetails WHERE aid=".$row['aid'];

											?>

											<td style="color:black;"><?php echo $authqueryresults['auth_name']; ?></td>  
											<td style="color:black;"><?php echo $authqueryresults['auth_email']; ?></td> 
											<input type="hidden" name="articleheading" value="<?php echo $row['article_heading'];?>">
											<input type="hidden" name="verifycontent" value="<?php echo $row['content'];?>">
											<input type="hidden" name="uniqueid" value="<?php echo $row['id'];?>">


											<?php echo '<td><button class="btn btn-default" id= "read" name="read" data-toggle="modal" data-target=#modal_show'.$row['id'].'>Read</button></td>';
								//modal here
											echo '<div class="modal fade" id=modal_show'.$row['id'].' role="dialog" style="color:#000;">
											<div class="modal-dialog">

												<!-- Modal content-->
												<div class="modal-content">
													<input class="hidden aid" value="'.$row['id'].'"/>
													<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal">&times;</button>
														<h4 class="modal-title">'.$row['heading'].'</h4>
													</div>
													<div class="modal-body">
														<p>'.$row['content'].'</p>
													</div>
													<div class="modal-footer">
														<button  type="button" class="btn btn-default approvebtn" data-dismiss="modal">Approve</button>
														<button type="button"  class="btn btn-default discardbtn" data-dismiss="modal">Discard</button>	

														<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
													</div>
												</div>

											</div>
										</div>';

										?>

									</div>
								</tr>
							</tbody>
							<?php
						}
						?>
					</table>
					
					</div>
				</div>
			</div>
		</div>
	</section>


	<section id="grid">
		<div class="container">
			<div class="row animate-in" data-anim-type="fade-in-up">
				<div class="row text-center header animate-in" data-anim-type="fade-in-up">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<h3>Create Authors</h3>
						<hr />
					</div>
				</div>
				<div class="row pad-bottom animate-in" data-anim-type="fade-in-up">
					<div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-1 col-lg-10 col-lg-offset-1">

						<div>
							<div class="form-group">
								<label for="name">Name</label>
								<input type="name" class="form-control name" name="name" placeholder="Enter name" pattern="[A-Za-z0-9]+{20}" required/>
							</div>
							<div class="form-group">
								<label for="email">Password:</label>
								<input type="password" class="form-control email" name="email" placeholder="Enter email" pattern="[A-Za-z]+{3}" required/>
							</div>
							<div class="form-group">
								<label for="name">Username</label>
								<input type="email" class="form-control uname" name="username" placeholder="Enter new user name" pattern="[A-Za-z0-9]+{20}" required/>
							</div>
							<div class="form-group">
								<label for="pwd">Password:</label>
								<input type="password" class="form-control upass" name="userpass" placeholder="Enter new password" pattern="[A-Za-z]+{3}" required/>
							</div>
							<button type="button" class="btn btn-default authcreatebtn" name="create">Create</button>
						</div>
					</div>
				</div>


			</div>
		</div>

	</section>


</body>

</html>
