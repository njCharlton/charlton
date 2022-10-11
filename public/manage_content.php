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
		<ul class="subjects">
			<?php $subject_set = find_all_subjects(); ?>
			<?php
			//var_dump($subject_set);
			while ($subject = mysqli_fetch_assoc($subject_set)) {
			?>
				<li class="selected">
				 <a href="manage_content.php?subject=<?php echo urlencode($subject["id"]); ?>"><?php echo $subject["menu_name"] . " " . $subject["id"];

					$page_set = find_all_pages_subject($subject["id"]);
					//var_dump($page_set);

					?></a>
					<ul class="pages">
						<?php
						while ($page = mysqli_fetch_assoc($page_set)) {
						?>
							<li>
								<a href="manage_content.php?page=<?php echo urlencode($page["id"]); ?> ">
									<?php echo $page["menu_name"]; ?>
								</a>
							</li>
						<?php
						}
						?>
						<?php mysqli_free_result($page_set); ?>
					</ul>
				</li>
			<?php
			}
			?>
			<?php mysqli_free_result($subject_set); ?>
		</ul>
	</div>
	<div id="page">
		<h2>Manage Content</h2>
		<?php echo $selected_subject; ?><br />
		<?php echo $selected_page; ?>
	</div>
</div>