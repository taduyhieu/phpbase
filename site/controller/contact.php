<?php
class Contact extends Controller
{
	public function index()
	{
		if(isset($_POST["send"])){
			require APP . 'libs/mail/index.php';
		}
	    require APP . 'view/templates/header.php';
	    require APP . 'view/Contact/index.php';
	    require APP . 'view/templates/footer.php';
	}
}

