<?php echo $this->getContent(); ?>

<div class="well well-small">
	<h4>Управление видами спорта</h4>
	<p>Здесь представлены все виды спорта и основные действия над ними.</p>
</div>

<p class="text-right"><a href="/sportkind/add" class="btn btn-primary">Добавить вид спорта</a></p>

<?php $v132693198526048744801iterated = false; ?><?php $v132693198526048744801iterator = $sports; $v132693198526048744801incr = 0; $v132693198526048744801loop = new stdClass(); $v132693198526048744801loop->length = count($v132693198526048744801iterator); $v132693198526048744801loop->index = 1; $v132693198526048744801loop->index0 = 1; $v132693198526048744801loop->revindex = $v132693198526048744801loop->length; $v132693198526048744801loop->revindex0 = $v132693198526048744801loop->length - 1; ?><?php foreach ($v132693198526048744801iterator as $sport) { ?><?php $v132693198526048744801loop->first = ($v132693198526048744801incr == 0); $v132693198526048744801loop->index = $v132693198526048744801incr + 1; $v132693198526048744801loop->index0 = $v132693198526048744801incr; $v132693198526048744801loop->revindex = $v132693198526048744801loop->length - $v132693198526048744801incr; $v132693198526048744801loop->revindex0 = $v132693198526048744801loop->length - ($v132693198526048744801incr + 1); $v132693198526048744801loop->last = ($v132693198526048744801incr == ($v132693198526048744801loop->length - 1)); ?><?php $v132693198526048744801iterated = true; ?>
	<?php if ($v132693198526048744801loop->first) { ?>
	<table class="table table-bordered">
		<thead>
			<th style="text-align: center; vertical-align: middle;">#</th>
			<th style="text-align: center; vertical-align: middle;">Название вида спорта</th>
			<th style="text-align: center; vertical-align: middle;" width="30%">Действия</th>
		</thead>
		<tbody>
	<?php } ?>
		<tr>
			<td style="text-align: center; vertical-align: middle;"><?php echo $sport->getID(); ?></td>
			<td style="text-align: center; vertical-align: middle;"><?php echo $sport->getName(); ?></td>
			<td style="text-align: center; vertical-align: middle;">
				<a href="/sportkind/edit/<?php echo $sport->getID(); ?>" class="btn btn-default">Редактировать</a> <a href="/sportkind/delete/<?php echo $sport->getID(); ?>" class="btn btn-default">Удалить</a>
			</td>
		</tr>
	<?php if ($v132693198526048744801loop->last) { ?>
		</tbody>
	</table>
	<?php } ?>
<?php $v132693198526048744801incr++; } if (!$v132693198526048744801iterated) { ?>
<p class="text-center">Видов спорта не найдено.</p>
<?php } ?>