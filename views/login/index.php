<?php
global $enableOB;
$enableOB = true;
?>
<?php include_once 'views/layout/'.$this->layout.'header.php'; ?>
<?php //html_helpers::header($this->layout, ['css'=>$cssFiles]); ?>
<?php 
	global $obMediaFiles;
	array_push($obMediaFiles['css'], "media/css/login.css");
?>
<div id="login-form">
    <h2>Login Form</h2>

    <form action="<?php echo html_helpers::url(
                    array('ctl'=>'login', 
                            'act'=>'login')); ?>" method="post">
    
        <label for="username"><b>Username</b></label>
        <input type="text" placeholder="Enter Username" name="username" required>

        <label for="password"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="password" required>
            
        <button type="submit">Login</button>
    </form>
    
</div>

<?php include_once 'views/layout/'.$this->layout.'footer.php'; ?>
<?php //html_helpers::footer($this->layout, ['js'=>$jsFiles]); ?>
