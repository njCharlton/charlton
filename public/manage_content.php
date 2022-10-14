<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php include("../includes/layouts/header.php"); ?>
<php find_selected_page(); ?>


<div id="main">
	<div id="navigation">
	<?php echo navigation($selected_subject, $selected_page); ?>
	<br />
	<a href="new_subject.php">+ Add a subject</a>
	</div>
	<div id="page">
		<?php if ($selected_subject) { ?>
		<h2>Manage Subject</h2>
		<?php $current_subject = find_subject_by_id($selected_subject_id); ?>
		Menu name: <?php  echo $current_subject["menu_name"]; ?><br />
		
			
			
		

		<?php } elseif ($selected_page) { ?>
			<h2>Manage Page</h2>
			<?php  $current_page = "find_page_by_id($selected_page)"; ?>
		Menu name: <?php echo $current_page["menu_name"]; ?>

		<?php } else { ?>
			Please select a subject or a page.
		<?php }?>
		
	</div>
</div>