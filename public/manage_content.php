
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php
	
	$query  = "SELECT * FROM subjects WHERE visible = 1 ORDER BY position ASC";
	$result = mysqli_query($connection, $query);
   confirm_query($result);
	// Test if there was a query error
	if (!$result) {
      die("Database query failed.");	
	} 
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


				$query1  = "SELECT * FROM pages WHERE visible = 1 and subject_id = ".$subject["id"]." ORDER BY position ASC";
				$pages_set = mysqli_query($connection, $query1);
				confirm_query($pages_set);
				// Test if there was a query error
				if (!$pages_set) {
					die("Database query failed.");	
				} 
            ?>
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
  