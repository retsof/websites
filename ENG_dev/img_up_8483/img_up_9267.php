<?php

/**
 * Img Up 9267
 *
 * Used to upload internal images.
 * Dependency: Internal_Image_Upload.php
 *
 * NOTE: login settings are in admin_config.php, which is included in common.php (via db_inc.php)
 */

//$Id: img_up_9267.php 5942 2013-10-29 13:29:35Z maxrobson $

chdir("..");
require ("eb_include/common.php");

$destination_id = $_REQUEST['destination_id'];
if(!is_numeric($destination_id) || !array_key_exists($destination_id, $upload_destination_arr)){
	Visual_Helper::get_instance()->die_html('Non suitable destination id passed to image upload');
}
?>

<HTML>
<HEAD>
	<title>EuroJobsites Image Manager</title>
	<link rel='stylesheet' href='<?php print CSS_FILE; ?>' />

</HEAD>
<BODY>

<?php
//Controller
//===============
if($_SERVER['REQUEST_METHOD']=='POST'){
		$image_upload = new Internal_Image_Upload();
		if(!$image_upload->do_upload()){
			echo "<p class='error'>ERROR:" .  $image_upload->get_upload_error_msg() . "</p>";
		}else{
			echo "<script type='text/javascript'> setTimeout('self.close();',1000000); </script>";
			echo "<h1>Successfully uploaded!</h1>";
			echo "<img style='border:1px solid grey' src='". $image_upload->get_image_disply_url() . "'></img><br>";
			echo "<p>File uploaded to " . $image_upload->get_image_disply_url() . "</p>";
		}
}
else{
// View
//======
?>

<!-- Form to Upload File -->
<form enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
	<table>
	  <tr>
		<td>
			User
		</td>
	  	<td>
			<input type="text" style="data" name="p_user" size=30>
		</td>
	  </tr>
	  <tr>
		<td>
			Password
		</td>
		<td>
			<input type="password" style="data" name="p_pwd" size=30> <br />
		</td>
	  </tr>
	  <tr>
		<td>
			File to Upload
		</td>
		<td>
			<input type="file" name="user_file" />
		</td>
	  </tr>
	  <tr>
		<td>
			Overwrite existing file
		</td>
		<td>
			<input name="p_allow_overwrite_file" type="checkbox" value="Y"> (only tick if you are sure)
		</td>
	  </tr>
	</table>
	<br />
	<input type="hidden" name="destination_id" value="<?php echo $destination_id ?>" />
	<input type="submit" name="submit" value="Upload" />
	&nbsp;
</form>
<?php
$upload_dir_arr = $upload_destination_arr[$destination_id];
echo "<p>Uploading images to: ". $upload_dir_arr[1] . ".</p>";
echo "<p>Image naming standard: use only lower case and underscore (e.g. ecb_logo_80x40.png). Rename file to meaningful name.</p>";
}
?>
<p>
<a href="javascript:self.close()">Close Window</a>
</p>
</BODY>
</HTML>
