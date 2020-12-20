<head>
	<title>HMS</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
	<style type="text/css">
		.main_container{
			position:relative;
			min-height:100vh;
		}
		.content_wrap{
			padding-bottom:4.0rem;
		}
		.brand{
			background: #6e72ee !important;
		}
		.brand-text{
			color: #cbb09c !important;
			font-size: 40px !important;
		}
		.heading-text{
			color: #ee6eb2 !important;
		}
		.title-text{
			font-size: 25px;
			text-align: center;
		}
		.title-box{
			margin: 0px 25px;
		}
		.nav_button{
			margin-right: 10px;
		}
		.nav_button_text{
			font-size: 20px;
		}
		.profile-details{
			padding-left: 485px;
			padding-right: 485px;
			padding-bottom: 30px;
			padding-top: 10px;
		}
		.tabstu{
			border:1px solid black;
			text-align: center;
		}
		form{
			max-width: 460px;
			margin: 20px auto;
			padding: 20px;
		}
		footer{
			position: absolute;
			bottom: 0;
			width: 100%;
			height: 3.0rem;
			background-color: #ee6e73;
			color: white;
			text-align: center;
		}
		/*table,tr,td{
			border:1px solid black;
			text-align: center;
		}*/
		#logo{
			margin-left: 50px;
		}
		#footer_text{
			color: #fff;
		}
		#manager_email{
			padding:0;
			margin:0;
			text-decoration:underline;
			display:inline;
			color:blue;
			border:none;
			background:none;
		}
		#admin_email{
			padding:0;
			margin:0;
			border:none;
			background:none;
			text-decoration:underline;
			display:inline;
			color:blue;
		}
		#admin_email_form{
			margin:0;
			padding:0;
			width:auto;
			display:inline;
		}
		button:hover{
			cursor:pointer;
		}
	</style>
</head>
<body class="grey lighten-2">
<div class="main_container">
	<div class="content_wrap">
		<div class="navbar-fixed">
			<nav>
			    <div class="nav-wrapper">
			      <a href="index.php" class="brand-logo" id="logo">HOSTEL MANAGEMENT SYSTEM</a>
			      <ul id="nav-mobile" class="right hide-on-med-and-down">
			        <li class="nav_button"><a href="index.php" class="nav_button_text" id="home">Home</a></li>
			        <li class="nav_button" id="wrapper"><a href="hostels.php" class="nav_button_text" id="hostels">Hostels</a></li>
			        <li class="nav_button"><a href="students.php" class="nav_button_text" id="students">Students</a></li>
			        <li class="nav_button" style="margin-right: 50px"><a href="profile.php" class="nav_button_text" id="profile">Profile</a></li>
			      </ul>
			    </div>
			</nav>
		</div>