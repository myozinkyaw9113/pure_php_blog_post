<?php

if (empty($_SESSION['csrf_token'])) {
	if (function_exists('random_bytes')) {
		$_SESSION['csrf_token'] = bin2hex(random_bytes(32));
	} else {
		$_SESSION['csrf_token'] = bin2hex(openssl_random_pseudo_bytes(32));
	}
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //csrf protection
    if (!hash_equals($_SESSION['csrf_token'], $_POST['_token'])) {
        echo 'Invalid CSRF Token';
        die();
    } else {
        unset($_SESSION['csrf_token']);
    }
}

/**
 * Escapes HTML for output
 *
 */

function escape($html) {
	return htmlspecialchars($html, ENT_QUOTES | ENT_SUBSTITUTE, "UTF-8");
}

?>

<?php

// if (empty($_SESSION['csrf'])) {
// 	if (function_exists('random_bytes')) {
// 		$_SESSION['csrf'] = bin2hex(random_bytes(32));
// 	} else if (function_exists('mcrypt_create_iv')) {
// 		$_SESSION['csrf'] = bin2hex(mcrypt_create_iv(32, MCRYPT_DEV_URANDOM));
// 	} else {
// 		$_SESSION['csrf'] = bin2hex(openssl_random_pseudo_bytes(32));
// 	}
// }