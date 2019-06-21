<?php $title = 'Blog App-Index'?>
<?php include_once 'views/layout/'.$this->layout.'header.php'; ?>
<div class="row row-offcanvas row-offcanvas-right">
<div class="table-responsive">
	  <table class="table table-bordered">
        <thead>
          <tr>
            <th>#</th>
            <th>Title</th>
            <th>Content</th>
            <th>Like</th>
            <th>User</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
		<?php while($row = mysqli_fetch_array($this->records)) : ?>
		  <tr>
			<th width="5%" scope="row"><?php echo $row['id']; ?></th>
			<td width="12%"><?php echo $row['title']; ?></td>
			<td width="30%"><?php echo $row['content']; ?></td>
			<td width="12%"><?php echo $row['reaction']; ?></td>
			<td width="11%"><?php echo $row['user_id']; ?></td>
			<td width="15%">
			  <a href="<?php echo html_helpers::url(
							array('ctl'=>'blogs', 
								  'act'=>'view', 
								  'params'=>array(
									'id'=>$row['id']
							))); ?>" class="table-link">
				<span class="fa-stack">
				<i class="fa fa-square fa-stack-2x"></i>
				<i class="fa fa-search-plus fa-stack-1x fa-inverse"></i>
				</span>
			  </a>
			  
			  <a href="<?php echo html_helpers::url(
							array('ctl'=>'blogs', 
								  'act'=>'del', 
								  'params'=>array(
									'id'=>$row['id']
							))); ?>" class="table-link danger delete">
				<span class="fa-stack">
				<i class="fa fa-square fa-stack-2x"></i>
				<i class="fa fa-trash-o fa-stack-1x fa-inverse"></i>
				</span>
			  </a>
			</td>
		  </tr>
		<?php endwhile; ?>
        </tbody>
      </table>
	</div>
</div>
<script src="media/js/students.js"></script>
<?php include_once 'views/layout/'.$this->layout.'footer.php'; ?>