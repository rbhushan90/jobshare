<div class="home page">
	<h2><?php __('Home');?></h2>
		<fieldset>
		Wilkommen zum Jobshare Portal der BAHOGE.
		<?php if (!$logged_in): ?>
		<?php echo 'Du musst dich Anmelden um die Funktionen zu nutzen.' ?>
		<?php else: ?>
			<?php echo 'Gehe zu Navigation - Tasks um alle Tasks anzuzeigen.' ?>
		<?php endif;?>
		</fieldset>
</div>
