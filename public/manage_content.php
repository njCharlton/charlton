<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php include("../includes/layouts/header.php"); ?>

<?php
	if (isset($_GET["subject"])) {
		$selected_subject = $_GET["subject"];
		$selected_page = null;
	} elseif (isset($_GET["page"])) {
		$selected_subject = null;
		$selected_page = $_GET["page"];
	} else {
		$selected_subject = null;
		$selected_page = null;
	}

?>
<div id="main">
  <div id="navigation">
		<?php echo navigation($selected_subject, $selected_page); ?>
  </div>
  <div id="page">
		<?php if ($selected_subject) { ?>
	    <h2>Manage Subject</h2>
			<?php $current_subject = find_subject_by_id($selected_subject); ?>
			Menu name: <?php echo $current_subject["menu_name"]; ?><br />
			
		<?php } elseif ($selected_page) { ?>
			<h2>Manage Page</h2>
			<?php $current_page = "find_page_by_id($selected_page)"; ?>
			Menu name: <?php echo $current_page["menu_name"]; ?><br />
			
		<?php } else { ?>
			Please select a subject or a page.
		<?php }?>
  </div>
</div>

<?php include("../includes/layouts/footer.php"); ?>
