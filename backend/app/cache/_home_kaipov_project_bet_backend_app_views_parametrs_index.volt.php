<?php echo $this->getContent(); ?>

<div class="well well-small">
	<h4>Управление параметрами</h4>
	<p>Здесь представлены все параметры и основные действия над ними.</p>
</div>

<p class="text-right"><a href="/parametrs/add" class="btn btn-primary">Добавить параметр</a></p>

<?php if (isset($parametrs)) { ?>
<table class="table table-bordered">
	<thead>
		<th style="text-align: center; vertical-align: middle;">#</th>
		<th style="text-align: center; vertical-align: middle;">Название параметра</th>
		<th style="text-align: center; vertical-align: middle;" width="30%">Действия</th>
	</thead>
	<tbody>
	<?php foreach ($parametrs as $parameter) { ?>
		<tr>
			<td style="text-align: center; vertical-align: middle;"><?php echo $parameter->getId(); ?></td>
			<td style="text-align: center; vertical-align: middle;"><?php echo $this->escaper->escapeHtml($parameter->getNameParam()); ?></td>
			<td style="text-align: center; vertical-align: middle;">
				<a href="/parametrs/edit/<?php echo $parameter->getId(); ?>" class="btn btn-default">Редактировать</a> <a href="/parametrs/delete/<?php echo $parameter->getId(); ?>" class="btn btn-default">Удалить</a>
			</td>
		</tr>
	<?php } ?>
	</tbody>
</table>
<?php } ?>