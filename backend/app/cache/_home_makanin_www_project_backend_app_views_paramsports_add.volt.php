<?php echo $this->getContent(); ?>

<?php echo $this->tag->form(array('paramsports/add', 'method' => 'POST', 'class' => 'form-horizontal')); ?>

    <fieldset>
    <legend>Добавление связей параметр-вид спорта</legend>
		
		<?php foreach ($form->getElements() as $element) { ?>
		<div class="form-group">
			<?php echo $form->label($element->getName(), array('class' => 'col-lg-2 control-label')); ?>
			<div class="col-lg-10">
				<?php echo $form->render($element->getName()); ?>
			</div>
		</div>
		<?php } ?>
		
        <div class="form-group">
        	<div class="col-lg-10 col-lg-offset-2">
            	<?php echo $this->tag->submitButton(array('Добавить', 'class' => 'btn btn-primary')); ?>
            </div>
        </div>

    </fieldset>
</form>