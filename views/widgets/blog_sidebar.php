<?php if( isset( $_SESSION['userName'] ) ) { ?>
<div class="list-group" id="user-info">
	<div href="#" class="list-group-item">
		<h4 class="list-group-item-heading"><?php echo $user['fullname']?></h4>
	</div>
	<img src="<?php echo "media/upload/register/".$user['photo']; ?>" alt="<?php echo $user['username']; ?>" id="avatar">
	<p><label for="">User name:</label><?php echo $user['username']?></p>
	<p><label for="">email:</label><?php echo $user['email']?></p>
	
</div>
<?php } ?>

<div class="list-group" id="popular">
	<div href="#" class="list-group-item">
		<h4 class="list-group-item-heading">Popular post</h4>
	</div>
</div>