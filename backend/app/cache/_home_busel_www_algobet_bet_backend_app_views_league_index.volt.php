<?php echo $this->getContent(); ?>

<div class="well well-small">
	<h4>Управление лигами</h4>
	<p>Здесь представлены все лиги и основные действия над ними.</p>
</div>

<p class="text-right"><a href="/league/add" class="btn btn-primary">Добавить лигу</a></p>

<?php if (isset($leagues)) { ?>
<table class="table table-bordered">
	<thead>
		<th style="text-align: center; vertical-align: middle;">#</th>
		<th style="text-align: center; vertical-align: middle;">Название лиги</th>
		<th style="text-align: center; vertical-align: middle;" width="30%">Действия</th>
	</thead>
	<tbody>
	<?php foreach ($leagues as $league) { ?>
		<tr>
			<td style="text-align: center; vertical-align: middle;"><?php echo $league->getID(); ?></td>
			<td style="text-align: center; vertical-align: middle;"><?php echo $this->escaper->escapeHtml($league->getNameLeague()); ?></td>
			<td style="text-align: center; vertical-align: middle;"></td>
			<td style="text-align: center; vertical-align: middle;"></td>
			<td style="text-align: center; vertical-align: middle;">
				<a href="/league/edit/<?php echo $league->getID(); ?>" class="btn btn-default">Редактировать</a> <a href="/league/delete/<?php echo $league->getID(); ?>" class="btn btn-default">Удалить</a>
			</td>
		</tr>
	<?php } ?>
	</tbody>
</table>
<?php } ?>
