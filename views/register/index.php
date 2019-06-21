<?php
global $enableOB;
$enableOB = true;
?>
<?php include_once 'views/layout/'.$this->layout.'header.php'; ?>
<?php 
	global $obMediaFiles;
	array_push($obMediaFiles['css'], "media/css/login.css");
?>
<div id="login-form">
    <h2>Register Form</h2>

    <form enctype="multipart/form-data" action="<?php echo html_helpers::url(
                    array('ctl'=>'register', 
                            'act'=>'register')); ?>" method="post">
    
        <label><b>Email</b></label>
        <input type="text" placeholder="Enter Email" name="data[email]" required>

        <label><b>Full name</b></label>
        <input type="text" placeholder="Enter full name" name="data[fullname]" required>

        <label><b>Username</b></label>
        <input type="text" placeholder="Enter Username" name="data[username]" required>

        <label><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="data[password]" required>

        <label><b>Confirm Password</b></label>
        <input type="password" placeholder="Confirm Password" name="data[confirmPassword]" required>
        <div class="form-group">
            <label for="photo" class="col-sm-2 control-label">Photo</label>
            <div class="col-sm-10 image-upload">
                <input name="image" type="file" class="form-control" id="photo" placeholder="photo">
            </div>
        </div>
            
        <button type="submit" name="submit">Register</button>
    </form>
    
</div>
<script src="media/js/form.js"></script>
<?php include_once 'views/layout/'.$this->layout.'footer.php'; ?>
