
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php
	
	$subject_set = find_all_subjects()
	
?>
<?php include("../includes/layouts/header.php"); ?>

<div id="main">
   <div id="navigation">
   <ul>
		<?php
			while($subject = mysqli_fetch_assoc($result)) {
			
		?>
		
		<li>
			<?php 
				echo $subject["menu_name"]." (".$subject["id"].")"; 
			?>
			<?php $page_set =
			 find_all_pages_subject ($subject["id"]); ?>	
			<ul class="pages">
				<?php
					while($page = mysqli_fetch_assoc($pages_set)) {
				?>
				<li>
						<?php
							echo $page["menu_name"];
						?>
				</li>
				<?php
					}
					?>
			</ul>
		</li>
	  <?php

			}
		?>
		</ul>
   </div>
   <div id="page">
     <h2>Manage Content</h2>

   </div>
</div>  
<?php
		  // 4. Release returned data
		  mysqli_free_result($result);
		  mysqli_free_result($pages_set);
		?>

<?php
 include("../includes/layouts/footer.php");
 ?>
  