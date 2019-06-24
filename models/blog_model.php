<?php
class blog_model extends main_model
{
	protected $table = 'blogs';
	public function __construct() {
		parent::__construct();
		
    }
    public function isLiked($blog_id) {
        $query = "SELECT reaction FROM `reactions` WHERE blog_id = $blog_id AND user_id = {$_SESSION['userid']}";
        $result = mysqli_query($this->con,$query);
        if($result) {
            $record = mysqli_fetch_assoc($result);
            if($record['reaction']) return true;
            else return false;
		} else return false;
    }

	public function getAllRecords() {
		$query = "SELECT blogs.id, blogs.title, blogs.content, blogs.user_id, users.fullname, likequantity.likequantity, commentquantity.commentquantity, blogs.slug 
		FROM blogs 
		LEFT JOIN users ON blogs.user_id =  users.id
		LEFT JOIN (SELECT blog_id, COUNT(reaction) AS likequantity 
			FROM `reactions` 
			WHERE reaction != 0 
			GROUP BY blog_id) AS likequantity ON blogs.id =  likequantity.blog_id
		LEFT JOIN (SELECT blog_id, COUNT(content) AS commentquantity 
			FROM `comments` 
			GROUP BY blog_id) AS commentquantity ON blogs.id =  commentquantity.blog_id";

		$result = mysqli_query($this->con,$query);

		return $result;
	}

	public function getRecord($id=null) {
		$query = "SELECT * FROM (
			SELECT blogs.id, blogs.title, blogs.content, blogs.user_id, users.fullname, likequantity.likequantity, commentquantity.commentquantity, blogs.photo
			FROM blogs 
			LEFT JOIN users ON blogs.user_id =  users.id
			LEFT JOIN (SELECT blog_id, COUNT(reaction) AS likequantity 
			  FROM `reactions` 
			  WHERE reaction != 0 
			  GROUP BY blog_id) AS likequantity ON blogs.id =  likequantity.blog_id
			LEFT JOIN (SELECT blog_id, COUNT(content) AS commentquantity 
			  FROM `comments` 
			  GROUP BY blog_id) AS commentquantity ON blogs.id =  commentquantity.blog_id
		) as blogdetail
		WHERE blogdetail.id=$id";

		$result = mysqli_query($this->con,$query);
		if($result) {
			$record = mysqli_fetch_assoc($result);
		} else $record=false;
		return $record;
	}

	public function like($blog_id){
		if($this->findReaction($blog_id) != null) {
			$query = "UPDATE reactions SET reaction= !reaction WHERE blog_id=$blog_id AND user_id ={$_SESSION['userid']}";
			return mysqli_query($this->con,$query);
		}
		else {
			$this->addReaction($blog_id);
		}
	}
	
	public function addReaction($blog_id) {
		$query = "INSERT INTO `reactions`(`blog_id`, `user_id`, `reaction`) VALUES ($blog_id,{$_SESSION['userid']},1)";
		return mysqli_query($this->con, $query);
	}

	public function findReaction($blog_id) {
		$query = "SELECT * FROM `reactions` WHERE blog_id=$blog_id AND user_id ={$_SESSION['userid']}";
		$result = mysqli_query($this->con,$query);
		if($result) {
			$record = mysqli_fetch_assoc($result);
		} else $record=false;
		return $record;
	}

	public function getComments($blog_id) {
		$query = "SELECT comments.id, comments.blog_id,comments.user_id, comments.content, users.fullname
		FROM comments
		INNER JOIN users ON comments.user_id = users.id
		WHERE blog_id = $blog_id
		ORDER BY comments.id";
		$result = mysqli_query($this->con,$query);

		return $result;
	}

	public function addComment($blog_id, $content) {
		$query = "INSERT INTO `comments`(`blog_id`, `user_id`, `content`) VALUES ($blog_id, {$_SESSION['userid']}, '$content')";
		return mysqli_query($this->con, $query);
	}

	public function addBlog($data) {
		date_default_timezone_set("Asia/Ho_Chi_Minh");
		//exit('hello');
		// $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $data['title']))).'-'.time();
		$slug = slugify($data['title']).'-'.time();
		$query = "INSERT INTO `blogs`(`title`, `content`, `user_id`, `photo`, `slug`) VALUES ('{$data['title']}', '{$data['content']}', {$_SESSION['userid']}, '{$data['photo']}', '$slug')";
		return mysqli_query($this->con, $query);
	}
}

function slugify($string, $options = array())
{
    $slugTransliterationMap = array(
        'á' => 'a',
        'à' => 'a',
        'ả' => 'a',
        'ã' => 'a',
        'ạ' => 'a',
        'â' => 'a',
        'ă' => 'a',
        'Á' => 'A',
        'À' => 'A',
        'Ả' => 'A',
        'Ã' => 'A',
        'Ạ' => 'A',
        'Â' => 'A',
        'Ă' => 'A',
        'ấ' => 'a',
        'ầ' => 'a',
        'ẩ' => 'a',
        'ẫ' => 'a',
        'ậ' => 'a',
        'Ấ' => 'A',
        'Ầ' => 'A',
        'Ẩ' => 'A',
        'Ẫ' => 'A',
        'Ậ' => 'A',
        'ắ' => 'a',
        'ằ' => 'a',
        'ẳ' => 'a',
        'ẵ' => 'a',
        'ặ' => 'a',
        'Ắ' => 'A',
        'Ằ' => 'A',
        'Ẳ' => 'A',
        'Ẵ' => 'A',
        'Ặ' => 'A',
        'đ' => 'd',
        'Đ' => 'D',
        'é' => 'e',
        'è' => 'e',
        'ẻ' => 'e',
        'ẽ' => 'e',
        'ẹ' => 'e',
        'ê' => 'e',
        'É' => 'E',
        'È' => 'E',
        'Ẻ' => 'E',
        'Ẽ' => 'E',
        'Ẹ' => 'E',
        'Ê' => 'E',
        'ế' => 'e',
        'ề' => 'e',
        'ể' => 'e',
        'ễ' => 'e',
        'ệ' => 'e',
        'Ế' => 'E',
        'Ề' => 'E',
        'Ể' => 'E',
        'Ễ' => 'E',
        'Ệ' => 'E',
        'í' => 'i',
        'ì' => 'i',
        'ỉ' => 'i',
        'ĩ' => 'i',
        'ị' => 'i',
        'Í' => 'I',
        'Ì' => 'I',
        'Ỉ' => 'I',
        'Ĩ' => 'I',
        'Ị' => 'I',
        'ó' => 'o',
        'ò' => 'o',
        'ỏ' => 'o',
        'õ' => 'o',
        'ọ' => 'o',
        'ô' => 'o',
        'ơ' => 'o',
        'Ó' => 'O',
        'Ò' => 'O',
        'Ỏ' => 'O',
        'Õ' => 'O',
        'Ọ' => 'O',
        'Ô' => 'O',
        'Ơ' => 'O',
        'ố' => 'o',
        'ồ' => 'o',
        'ổ' => 'o',
        'ỗ' => 'o',
        'ộ' => 'o',
        'Ố' => 'O',
        'Ồ' => 'O',
        'Ổ' => 'O',
        'Ỗ' => 'O',
        'Ộ' => 'O',
        'ớ' => 'o',
        'ờ' => 'o',
        'ở' => 'o',
        'ỡ' => 'o',
        'ợ' => 'o',
        'Ớ' => 'O',
        'Ờ' => 'O',
        'Ở' => 'O',
        'Ỡ' => 'O',
        'Ợ' => 'O',
        'ú' => 'u',
        'ù' => 'u',
        'ủ' => 'u',
        'ũ' => 'u',
        'ụ' => 'u',
        'ư' => 'u',
        'Ú' => 'U',
        'Ù' => 'U',
        'Ủ' => 'U',
        'Ũ' => 'U',
        'Ụ' => 'U',
        'Ư' => 'U',
        'ứ' => 'u',
        'ừ' => 'u',
        'ử' => 'u',
        'ữ' => 'u',
        'ự' => 'u',
        'Ứ' => 'U',
        'Ừ' => 'U',
        'Ử' => 'U',
        'Ữ' => 'U',
        'Ự' => 'U',
        'ý' => 'y',
        'ỳ' => 'y',
        'ỷ' => 'y',
        'ỹ' => 'y',
        'ỵ' => 'y',
        'Ý' => 'Y',
        'Ỳ' => 'Y',
        'Ỷ' => 'Y',
        'Ỹ' => 'Y',
        'Ỵ' => 'Y'
    );
    $options = array_merge(array(
        'delimiter' => '-',
        'transliterate' => true,
        'replacements' => array(),
        'lowercase' => true,
        'encoding' => 'UTF-8'
    ), $options);
   
    if ($options['transliterate']) {
        $string = str_replace(array_keys($slugTransliterationMap), $slugTransliterationMap, $string);
    }
    if (is_array($options['replacements']) && !empty($options['replacements'])) {
        $string = str_replace(array_keys($options['replacements']), $options['replacements'], $string);
    }
    $string = preg_replace('/[^\p{L}\p{Nd}]+/u', $options['delimiter'], $string);
    $string = preg_replace('/(' . preg_quote($options['delimiter'], '/') . '){2,}/', '$1', trim($string, $options['delimiter']));

    if ($options['lowercase']) {
        $string = mb_strtolower($string, $options['encoding']);
    }
    return $string;
}
?>