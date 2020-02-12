<?php echo $form->messages(); ?>
<div class="Form">
	<div class="row">
		<div class="col-md-8">
			<div class="box box-primary">
				<div class="box-header">
					<h3 class="box-title">Create Artikel</h3>
				</div>
				<div class="box-body">
					<?php echo $form->open(); ?>
					<p><strong>ID Article - <?php echo 1 ?></strong></p>
					<?php echo $form->bs3_text('Title', 'Title'); ?>
					<?php echo $form->bs3_text('Description', 'Description'); ?>
					<div class='form-input-box' id="BODY_ARTICLE_input_box">
						<textarea id='field-BODY_ARTICLE' name='BODY_ARTICLE' class='texteditor' ></textarea>
					</div>
					<?php echo $form->bs3_text('Date', 'Created'); ?>
					<?php echo $form->bs3_submit(); ?>
					
					<?php echo $form->close(); ?>
				</div>
			</div>
		</div>
		<div class="box box-primary">
			<div class="col-md-4">
				<div class="box-category">
					<h3 class="category-title">Category</h3>
				</div>
				<div class="box-category-body">
					<?php echo $form->open(); ?>
					<?php echo $form->close(); ?>
				</div>
				<div class="box-tag">
					<h3 class="category-title">Tag</h3>
				</div>
				<div class="box-category-body">
					<?php echo $form->open(); ?>
					<?php echo $form->close(); ?>
				</div>
			</div>
		</div>
	</div>
</div>