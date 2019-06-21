<?php
class register_controller extends main_controller
{
	public function index() 
	{
		$this->display();
	}

	public function register() 
	{
		if(isset($_POST['submit'])) {
			$data = $_POST['data'];
			// $studentData['photo'] = $this->uploadImg($_FILES);
			$user = new user_model();
			if($user->addUser($data))
				header( "Location: ".html_helpers::url(array('ctl'=>'home')));
		}
		
		$this->display();
	}
}
?>
