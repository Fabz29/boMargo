<div class="col-md-offset-4 col-md-4">
	<div class="alert alert-danger" role="alert">
		<ul>
			<?php 
			foreach ($_REQUEST['erreurs'] as $erreur) {
			    echo "<li>$erreur</li>";
			}
			?>
		</ul>
	</div>
</div>
