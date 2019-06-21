<?php include_once 'views/layout/'.$this->layout.'header.php'; ?>
<div class='container'>
	<?php $user = $this->user ?>
	<div class="col-xs-12 col-sm-9">
	<div class='blog-content'>
	<?php while($row = mysqli_fetch_array($this->records)) : ?>
		
		<div class="blog">
			<h1>
				<a href="<?php echo html_helpers::url(
					array('ctl'=>'home', 
							'act'=>'view', 
							'params'=>array(
							'id'=>$row['id'],
							'slug'=>$row['slug']
					))); ?>"><?php echo $row['title']; ?></a>
			</h1>
			<p>
				<?php 
					$string = strip_tags($row['content']);
					if (strlen($string) > 100) {
					
						// truncate string
						$stringCut = substr($string, 0, 100);
						$endPoint = strrpos($stringCut, ' ');
					
						//if the string doesn't contain any space then it will cut without word basis.
						$string = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
						$string .= '...';
						//$string .= '... <a href="/this/story">Read More</a>';
					}
					echo $string;
				?>
			</p>
			<p>Author: <?php echo $row['fullname']?></p>
			<div id='blog_<?php echo $row['id']; ?>'>
				<label class='like'><i class='fa fa-thumbs-o-up'></i>
					<?php echo $row['likequantity']==null? 0:$row['likequantity']; ?>
				</label>
				<label class='comment'><i class='fa fa-comment-o'></i>
					<?php echo $row['commentquantity']==null? 0:$row['commentquantity']; ?>
				</label>
			</div>
		</div>
	<?php endwhile; ?>
	</div>
	</div>
	
	<div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar">
		<?php include_once 'views/widgets/blog_sidebar.php'; ?>
	  </div>
	
</div>
<script src="media/js/blog.js"></script>
<?php include_once 'views/layout/'.$this->layout.'footer.php'; ?>