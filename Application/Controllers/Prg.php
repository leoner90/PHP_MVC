<?php
/* delete data from fields if refresh or save if btn pressed in session
PRG to avoid form post resend ,on page refresh and back button .
if request is get (refresh) then $_SESSION['post'] = null, otherwise = post ,what is condition to start Add_To_Db() procedure*/
class Application_Controllers_Prg {
	public function postRedirectGet() {
		unset($_SESSION['return-post-for-fields']);
		if (!$_SESSION['postdata'] && $_SERVER['REQUEST_METHOD'] == 'POST') {
			$_SESSION['postdata'] = $_POST;
			$_SESSION['post'] = 'POST';
			unset($_POST);
			header("Location: /Add");
			exit;
		}
	}
}
?>