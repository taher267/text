<?php require_once("header.php") ?>

<div class="container">
	<div class="row">
		<div class="col-md-4"></div>
		<div class="col-md-4">
			<?php 
				if(isset($_REQUEST["sgnConf"])){
					echo '<span id="welMg">Congratulations!</span>';
				}
			 ?>
		</div>
		<div class="col-md-4"></div>
	</div>
</div>

<?php require_once("footer.php") ?>
	
	