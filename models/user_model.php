<?php
class user_model extends main_model
{
	protected $table = 'users';
	public function __construct() {
		parent::__construct();
		
	}

	public function addUser($data) {
		$query = "INSERT INTO `users`(`username`, `password`, `email`, `fullname`, `photo`) VALUES ('{$data['username']}', '{$data['password']}', '{$data['email']}', '{$data['fullname']}', '{$data['photo']}')";
		return mysqli_query($this->con, $query);
	}

	public function getUser($id) {
		$query = "SELECT * FROM `users` WHERE id = $id";
		$result = mysqli_query($this->con,$query);
		if($result) {
			$record = mysqli_fetch_assoc($result);
		} else $record=false;
		return $record;
	}
}
