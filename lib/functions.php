<?php

function getContent(){
	if(isset($_GET['home'])){
		include __DIR__.'/../pages/home.php';
	}
	if(isset($_GET['about'])){
		include __DIR__.'/../pages/bio.php';
	}
	if(isset($_GET['contact'])){
		include __DIR__.'/../pages/contact.php';
	}
	if(isset($_GET['admin'])){
		include __DIR__.'/../public/admin.php';
	}
	if(isset($_GET['save'])){
		formToJson();
		savePage();
	}
}

function getMessage(){
	$data = file_get_contents("../data/last_message.json", true);
	$tab = json_decode($data, true);
	echo '<div class="container-admin">';
	echo
	'<div class="last-message">

		<h1>Last message received</h1>
		<div>
			<label for="">Name</label>
			<p>'.$tab["name"].'</p>
			<label for="">Email</label>
			<p>'.$tab["email"].'</p>
			<label for="">Topic</label>
			<p>'.$tab["topic"].'</p>
			<label for="">Message</label>
			<p>'.$tab["message"].'</p>
		</div>

	</div>';
	echo '</div>';
}

function savePage(){
		include __DIR__.'/../pages/save.php';
}

function getHeaderImage() {
		if(empty($_GET)){
		include __DIR__.'/../parts/headerInPage.php';
	}
}

function getFooter(){
	if(!empty($_GET)) {
		include __DIR__.'/../parts/footer.php';
	}
}


function getUserData(){
	$data = file_get_contents("../data/user.json", true);
	$tab = json_decode($data, true);
	echo '<div id="container-top">';
	echo '<h1 id="pres">'.$tab["name"].' '.$tab["first_name"].'</h1>';
	echo '<h1 id="job">'.$tab["occupation"].'</h1>';
	echo '</div>';
}

function formToJson(){
		if(!empty($_POST)){
			$postArray = array(
			"name" => $_POST['q_name'],
			"email" => $_POST['q_email'],
			"topic" => $_POST['q_topic'],
			"message" => $_POST['q_message'],
			);

		$json = json_encode($postArray, JSON_PRETTY_PRINT);
		$file = '../data/last_message.json';

		file_put_contents($file, $json, FILE_APPEND);
		}
}

function getExperience(){
	$data2 = file_get_contents("../data/user.json", true);
	$tab2 = json_decode($data2, true);
	$experiences = $tab2["experiences"];

	foreach ($experiences as $keys){
	echo '
	<div class="experiences col-md-3 offset-md-2">
		<p>Year: '.$keys["year"].'</p>
		<p>Company: '.$keys["company"].'</p>
	</div>';
	}

}


?>