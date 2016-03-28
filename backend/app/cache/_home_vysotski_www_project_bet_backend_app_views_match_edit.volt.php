<?php echo $this->getContent(); ?>

<div class="well well-small">
	<h4>Редактирование Матча</h4>
	<p>Измените необходимые поля и примените изменения кнопкой Редактировать.</p>
</div>

<?php echo $this->tag->form(array('match/edit', 'method' => 'POST', 'class' => 'form-horizontal')); ?>
	<input type="hidden" name="curr_match_id" value="<?php echo $curr_match_id; ?>" />

    <fieldset>
    <legend>Редактирование матча</legend>

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
            	<?php echo $this->tag->submitButton(array('Редактировать', 'class' => 'btn btn-primary')); ?>
            </div>
        </div>

    </fieldset>
</form>