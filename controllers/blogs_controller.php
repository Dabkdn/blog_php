<?php
class blogs_controller extends main_controller
{
	public function index() 
	{
		if(!isset($_SESSION['username']) || $_SESSION['username'] != 'Admin'){
			header("Location: index.php?ctl=login");
		}
		$blogs = new blog_model();
		$this->records = $blogs->getAllRecords();
		$this->display();
	} 

	public function like($id) {
		if(!isset($_SESSION['username'])){
			echo -1;
		}
		else {
			$blog = new blog_model();
			$blog->like($id);
			$record = $blog->getRecord($id);
			echo $record['likequantity']==null ? 0:$record['likequantity'];
		}
		
		
	}	
	public function comment() {
		if(!isset($_SESSION['username'])){
			echo -1;
		}
		else {
			$blog = new blog_model();
			$blog->addComment($_POST['blog_id'], $_POST['comment']);
			$this->comments = $blog->getComments($_POST['blog_id']);
			$rows = array();
			while($r = mysqli_fetch_assoc($this->comments)) {
				$rows[] = $r;
			}
			echo json_encode($rows);
			
		}
	}
	public function add() 
	{
		if(!isset($_SESSION['username'])){
			header("Location: index.php?ctl=login");
		}
		if(isset($_POST['btn_submit'])) {
			$blogdata = $_POST['data'];
			$blogdata['photo'] = $this->uploadImg($_FILES);
			$blog = new blog_model();
			if($blog->addBlog($blogdata))
				header( "Location: ".html_helpers::url(array('ctl'=>'home')));
		}
		$this->display();
	}

	public function view($id) 
	{
		if(!isset($_SESSION['username']) || $_SESSION['username'] != 'Admin'){
			header("Location: index.php?ctl=login");
		}
		$blog = new blog_model();
		$record = $blog->getRecord($id);
		$this->setProperty('record',$record);
		$this->display();
	}

	// public function del($id) {
	// 	$blog = new blog_model();
	// 	$record = $blog->getRecord($id);
	// 	if(file_exists(RootURI."/media/upload/" .$this->controller.'/'.$record['photo']))
	// 		unlink(RootURI."/media/upload/" .$this->controller.'/'.$record['photo']);
			
	// 	echo $student->delRecord($id);
	// 	exit();
	// }
}
?>
