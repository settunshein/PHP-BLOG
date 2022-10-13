<?php

if( isset($_POST['insert_comment']) ) {
	insert_comment();
}

if( isset($_POST['login']) ){
	login();
}

if( isset($_POST['register']) ){
	register();
}

if( isset($_GET['logout']) ){
	logout();
}
?>