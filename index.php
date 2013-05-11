<?php

session_start();
require('config.php');

// API
$api = new JSONAPI($JSONAPI['host'], $JSONAPI['port'], $JSONAPI['username'], $JSONAPI['password'], $JSONAPI['salt']);
$getServer = $api->call("getServer");

// SECURITY ACESS & MORE.
function login_status()
{
	if (isset($_SESSION['USER_ACCESS'])) { return true; }
	else { return false; }
}
function login_check()
{
	global $usernames;
	global $password;
	
	for ($u=0;$u<sizeof($usernames);$u++) {
		if ($_POST['username'] === $usernames[$u] && hash('sha256',$_POST['password']) === $password[$u]) {
			$_SESSION['USER_ACCESS'] = $_POST['username'];
			$_SESSION['LAST_ACTIVITY'] = time();
			break;
		}
	}
}
if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1800)) {
	// last request was more than 30 minutes ago
	session_unset();     // unset $_SESSION variable for the run-time 
	session_destroy();   // destroy session data in storage
}


// SMARTY
if (login_status() === true)
{
	function server_status()
	{
		global $getServer;
		
		if($getServer["result"] == "success") { return 'online'; }
		elseif($getServer["result"] == "error") { return 'offline'; }
		elseif(is_null($getServer)) { return 'offline'; }
	}
	
	if (isset($_GET['action'])) {
		switch ($_GET['action']) {
			case 'logout':
				session_unset();
				session_destroy();
				break;
			case 'start':
				$api->call("remotetoolkit.startServer");
				break;
			case 'stop':
				$api->call("remotetoolkit.stopServer");
				break;
			case 'restart':
				$api->call("remotetoolkit.restartServer");
				break;	

		}
	}

	if (isset($_GET['site'])) {
		switch ($_GET['site']) {
			case 'home':
				$smarty = new Smarty_app();
					
				$smarty->assign('zone','Home');
				$smarty->assign('server_status',server_status());
				if(isset($_SESSION['USER_ACCESS'])): $smarty->assign('username',$_SESSION['USER_ACCESS']); endif;

				$smarty->display('templates/home.tpl');

				$smarty->clearAllCache(); # REMOVE AFTER FINAL VERSION
				$smarty->clear_all_cache();
				$smarty->caching = false; # REMOVE AFTER FINAL VERSION

				break;
			case 'add_user':
			
				break;
			default:
				header("Location:?site=home");
				break;
		}
	}
	else {
		header("Location:?site");
	}
}
elseif (login_status() === false)
{
	if (isset($_POST['username']) && isset($_POST['password'])) { login_check(); }

	$smarty = new Smarty_app();

	$smarty->assign('zone','Login');


	$smarty->display('templates/login.tpl');

	$smarty->clearAllCache(); # REMOVE AFTER FINAL VERSION
	$smarty->caching = false; # REMOVE AFTER FINAL VERSION
}

?>