<?php
$errors = []; // Define $errors as an empty array
if (count($errors) > 0) :
?>
	<div class="msg">
		<?php foreach ($errors as $error) : ?>
			<span><?php echo $error ?></span>
		<?php endforeach ?>
	</div>
<?php 
endif 
?>