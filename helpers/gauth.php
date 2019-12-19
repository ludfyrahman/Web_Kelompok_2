<?php
require_once('google-login-api.php');
require_once('db.php');
require_once('../cores/Response.php');


// Google passes a parameter 'code' in the Redirect Url
if(isset($_GET['code'])) {
	try {
		$gapi = new GoogleLoginApi();
		
		// Get the access token 
		$data = $gapi->GetAccessToken(CLIENT_ID, CLIENT_REDIRECT_URL, CLIENT_SECRET, $_GET['code']);
		
		// Get user information
		$user_info = $gapi->GetUserProfileInfo($data['access_token']);
		// if()
		// $_SESSION['userdata'] = $user_info;
		$q = $pdo->query("SELECT * FROM pengguna where email='$user_info[email]'");
		$pengguna = $q->fetchAll(PDO::FETCH_ASSOC);
		echo count($pengguna);
		if(count($pengguna) < 1){
			Response::redirectWithAlert('pengguna/login/', ['danger', 'Anda masih belum register. harap register terlebih dahulu']);
		}else{
			// print_r($pengguna[0]);
			$_SESSION['userid'] = $pengguna[0]['id'];
			$_SESSION['userlevel'] = $pengguna[0]['level'];
			Response::redirect('');
		}
		// echo "<pre>";
		// print_r($pengguna);
		
	}
	catch(Exception $e) {
		echo $e->getMessage();
		exit();
	}
}
?>
<!-- <head>
<style type="text/css">

#information-container {
	width: 400px;
	margin: 50px auto;
	padding: 20px;
	border: 1px solid #cccccc;
}

.information {
	margin: 0 0 30px 0;
}

.information label {
	display: inline-block;
	vertical-align: middle;
	width: 150px;
	font-weight: 700;
}

.information span {
	display: inline-block;
	vertical-align: middle;
}

.information img {
	display: inline-block;
	vertical-align: middle;
	width: 100px;
}

</style>
</head>

<body>

<div id="information-container">
	<div class="information">
		<label>Name</label><span><?= $user_info['name'] ?></span>
	</div>
	<div class="information">
		<label>ID</label><span><?= $user_info['id'] ?></span>
	</div>
	<div class="information">
		<label>Email</label><span><?= $user_info['email'] ?></span>
	</div>
	<div class="information">
		<label>Email Verified</label><span><?= $user_info['verified_email'] == true ? 'Yes' : 'No' ?></span>
	</div>
	<div class="information">
		<label>Picture</label><img src="<?= $user_info['picture'] ?>" />
	</div>
</div>

</body>
</html> -->