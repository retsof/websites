<?php
/**
 * Post Job Sent  
 * 
 * View to display '$sent_message' to user when a job has been submitted successfully. This is stored in the DB, and is different per job. 
 * Also displays $job_submitted->get_post_submission_warning_msg() errors if there has been an error that didn't stop the submission, but that the user sould be aware of. 
 * 
 * $Id: post_job_sent.php 5689 2013-09-02 08:57:22Z jamescollier $
 */
?>
<?php if(!empty($error_arr)): ?>
    <div class="ebSection">
        <h1>Warning</h1>
        <p>Your job ad has been submitted, but there has been a problem:</p>
        <ul>
                <?php foreach($job_submitted->get_post_submission_warning_msg() as $error): ?>
                    <li><?php echo $error ?></li>
                <?php endforeach; ?>
        </ul>
        <p>Please <a href="mailto:<?php echo INFO_EMAIL ?>">email</a> or <a href="/contact_us">contact us</a> so we can help.</p>
    </div>
<?php endif; ?>
<div class="ebSection">
    <?php echo $sent_message; ?>
</div>
