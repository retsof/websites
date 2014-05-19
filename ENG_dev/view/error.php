<div class="ebSection">
	<h1>Error</h1>
	<p>
		Sorry, there has been an error with your request. 
	</p>
	<?php if(isset($error_msg)): ?>
	    <p>
		    <?php echo $error_msg ?>
	    </p>
	<?php endif; ?>
	<p> 
	    Click <a href="job_search.php">here</a> to search for jobs, or <a href="mailto:<?php echo INFO_EMAIL ?>">contact us</a> for help.
    </p>
</div>
