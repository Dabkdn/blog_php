<?php
global $enableOB;
$enableOB = true;
?>
<?php include_once 'views/layout/'.$this->layout.'header.php'; ?>
<?php //html_helpers::header($this->layout, ['css'=>$cssFiles]); ?>
<?php 
	global $obMediaFiles;
	array_push($obMediaFiles['css'], "media/css/about.css");
?>
<div class="jumbotron clearfix">
	<h1>This is about page of management students system</h1>
	<p>At Website.com, we believe everyone deserves to have a website or online store. Innovation and simplicity makes us happy: our goal is to remove any technical or financial barriers that can prevent business owners from making their own website. We're excited to help you on your journey!</p>
	<div id="animation"> </div>
</div>

<?php
	array_push($obMediaFiles['js'], "media/js/about.js");
?>

<?php include_once 'views/layout/'.$this->layout.'footer.php'; ?>
<?php //html_helpers::footer($this->layout, ['js'=>$jsFiles]); ?>
