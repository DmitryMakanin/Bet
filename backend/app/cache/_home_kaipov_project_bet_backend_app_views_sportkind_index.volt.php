<?php echo $this->getContent(); ?>

<div class="well well-small">
	<h4>Управление видами спорта</h4>
	<p>Здесь представлены все виды спорта и основные действия над ними.</p>
</div>

<p class="text-right"><a href="/sportkind/add" class="btn btn-primary">Добавить вид спорта</a></p>

<?php if (isset($sports)) { ?>
<table class="table table-bordered">
	<thead>
		<th style="text-align: center; vertical-align: middle;">#</th>
		<th style="text-align: center; vertical-align: middle;">Название вида спорта</th>
		<th style="text-align: center; vertical-align: middle;" width="30%">Действия</th>
	</thead>
	<tbody>
	<?php foreach ($sports as $sport) { ?>
		<tr>
			<td style="text-align: center; vertical-align: middle;"><?php echo $sport->getID(); ?></td>
			<td style="text-align: center; vertical-align: middle;"><?php echo $this->escaper->escapeHtml($sport->getName()); ?></td>
			<td style="text-align: center; vertical-align: middle;">
				<a href="/sportkind/edit/<?php echo $sport->getID(); ?>" class="btn btn-default">Редактировать</a> <a href="/sportkind/delete/<?php echo $sport->getID(); ?>" class="btn btn-default">Удалить</a>
			</td>
		</tr>
	<?php } ?>
	</tbody>
</table>
<?php } ?>
