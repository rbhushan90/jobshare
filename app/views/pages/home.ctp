<div class="home page">
	<h2><?php __('Home');?></h2>
		<fieldset>
		<?php echo "Wilkommen zum Jobshare Portal der BAHOGE." ?>
		<?php if (!$logged_in): ?>
		<?php echo "<br><br>Du bist nicht angemeldet. <br>Bitte Registrieren oder Anmelden um auf die volle Funktionalität zugreifen zu können." ?>
		<br/>
		<?php elseif ($guest): ?>
			<?php echo "<br><br>Du bist als Gast angemeldet. Ein Administrator oder Manager muss deinen Account freischalten."?>
		<?php else: ?>
			<?php echo '<br><br>Next Steps:<br>Alle Tasks: Anzeige sämtlicher Tasks<br>Offene Tasks: Anzeige sämtlicher Tasks die zur Zeit offen sind' ?>
		<?php endif;?>
		</fieldset>
</div>
