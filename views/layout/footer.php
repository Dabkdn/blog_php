		
    </div>
<div class="footer">
	<div class='container'>
			<hr>
			<footer>
			<p>&copy; PSCD - Softdevelop 2019</p>
		</footer>
	</div>
</div>
	<?php 
	if($enableOB) {
		echo "JSBOTTOM";
		ob_end_flush();
	}
	echo html_helpers::jsFooter();
	?>
</body>
</html>
