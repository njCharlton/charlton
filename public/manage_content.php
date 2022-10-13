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
	<br />
	<a href="new_subject.php">+ Add a subject</a>	
	</div>
	<div id="page">
		<?php if ($current_subject)  ?>
		<h2>Manage Content</h2>
		<?php if ($selected_subject) { ?>

			<?php $current_subject = find_subject_by_id($subject); ?>
		Menu name: <?php echo $current_subject["menu_name"]; ?><br />

		<?php } elseif ($selected_page) { ?>
		<?php echo ($selected_page); ?>
		<?php } else { ?>
			Please select a subject or a page.
		<?php }?>
		
	</div>
</div>