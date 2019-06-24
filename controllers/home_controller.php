<?php
//include "models/home_model.php"; 
class home_controller extends main_controller
{
	public function index() 
	{
		$blogs = new blog_model();
		$user = new user_model();
		$this->records = $blogs->getAllRecords();
		$this->user = $user->getUser($_SESSION['userid']);
		$this->display();
	} 

	public function view($id) 
	{
		$blog = new blog_model();
		$this->record = $blog->getRecord($id);
		$this->comments = $blog->getComments($id);
		$this->isLiked = $blog->isLiked($id);
		$this->display();
	}
}
?>
