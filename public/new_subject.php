<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php include("../includes/layouts/header.php"); ?>


<div id="main">
	<div id="navigation">
	<?php echo navigation($current_subject, $current_page); ?>	
	</div>
	<div id="page">
      <h2>Create Subject</h2>
      
      <form action="create_subject.php" method="post">
        <p>Subject name:
            <input type="text" name="menu_name" value="" />
        </p>
        <p>POsition:
            <select name="position">
                <option value="1">1</option>
            </select>
        </p>
        <p>visible:
            <input type="radio" name="visible" value="0" /> No
            &nbsp;
            <input type="radio" name="visible" value="1" /> Yes
        </p>
        <input type="submit" value="Create Subject" />
      </form>
      <br />
      <a href="manage_content.php">Cancel</a>
	</div>
</div>