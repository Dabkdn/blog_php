<?php include_once'views/layout/'.$this->layout.'header.php'; ?>
<div class="container">
  <h2>Add your blog here:</h2>
  <form method="post" enctype="multipart/form-data" action="<?php echo html_helpers::url(
		array('ctl'=>'blogs', 
			  'act'=>"add"
)); ?>">
    <div class="form-group">
      <label for="title">Title:</label>
      <input type="text" class="form-control" id="" placeholder="enter title" name="data[title]">
    </div>
    <div class="form-group">
      <label for="content">Content:</label>
      <textarea rows="10" type="text" class="form-control" id="" placeholder="enter content" name="data[content]"></textarea>
    </div>
    <div class="form-group">
      <label for="photo" class="col-sm-2 control-label">Photo</label>
      <div class="col-sm-10 image-upload">
        <input name="image" type="file" class="form-control" id="photo" placeholder="photo">
      </div>
    </div>
    
    <button name="btn_submit" type="submit" class="btn btn-primary">Add</button>
  </form>
</div>
<script src="media/js/form.js"></script>
<?php include_once 'views/layout/'.$this->layout.'footer.php'; ?>