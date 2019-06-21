<?php $title = 'Blog App-View'?>
<?php include_once 'views/layout/'.$this->layout.'header.php'; ?>
<?php $data = $this->record ?>
	<h1><?php echo $data['title'] ?></h1>
	<div>
		<img src="<?php echo "media/upload/blogs/".$data['photo']; ?>" alt="<?php echo $data['title']; ?>" class="">
	</div>
	<p><?php echo $data['content'] ?></p>
	<p>Author: <?php echo $data['fullname']?></p>
	<p class="user-id" style="display: none;"><?php echo $_SESSION['userid'] ?></p>
	<p class="blog-id" style="display: none;"><?php echo $data['id'] ?></p>
	<a class='like-btn'>
		<i class='fa fa-thumbs-o-up'></i>
		<label class='like'>
			<?php echo $data['likequantity']==null? 0:$data['likequantity']; ?>
		</label>
	</a>
	<i class='fa fa-comment-o'></i>
	<label class='comment-label'>
		<?php echo $data['commentquantity']==null? 0:$data['commentquantity']; ?>
	</label>

	<div class='comment-container'>
		<div class="comment-form">
			<input type="text" class="form-control" id="comment-input" placeholder="what do you think?" name="comment">
			<button id="add-comment-btn" class="btn btn-primary">Add</button>
		</div>
		<div class="comment-list">
			<?php while($comment = mysqli_fetch_array($this->comments)) : ?>
				<div>
					<label><?php echo $comment['fullname']?></label>
					<p><?php echo $comment['content']?></p>
				</div>
			<?php endwhile; ?>
		</div>
	</div>
<script src="media/js/blog.js"></script>
<?php include_once 'views/layout/'.$this->layout.'footer.php'; ?>
