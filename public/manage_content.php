<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php include("../includes/layouts/header.php"); ?>


<div id="main">
	<div id="navigation">
		<ul class="subjects">
			<?php $subject_set = find_all_subjects(); ?>
			<?php
			//var_dump($subject_set);
			while ($subject = mysqli_fetch_assoc($subject_set)) {
			?>
				<li>
					<?php echo $subject["menu_name"] . " " . $subject["id"];

					$page_set = find_all_pages_subject($subject["id"]);
					//var_dump($page_set);

					?>
					<ul class="pages">
						<?php
						while ($page = mysqli_fetch_assoc($page_set)) {
						?>
							<li>
								<?php echo $page["menu_name"]; ?>
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


	</div>
</div>