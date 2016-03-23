<?php echo $this->getContent(); ?>

<div class="well well-small">
	<h4>Управление командами</h4>
	<p>Здесь представлены все команды и основные действия над ними.</p>
</div>

<p class="text-right"><a href="/team/add" class="btn btn-primary">Добавить команду</a></p>

<?php if (isset($teams)) { ?>
<table class="table table-bordered">
	<thead>
		<th style="text-align: center; vertical-align: middle;">#</th>
		<th style="text-align: center; vertical-align: middle;">Название команды</th>
		<th style="text-align: center; vertical-align: middle;" width="30%">Действия</th>
	</thead>
	<tbody>
	<?php foreach ($teams as $team) { ?>
		<tr>
			<td style="text-align: center; vertical-align: middle;"><?php echo $team->getID(); ?></td>
			<td style="text-align: center; vertical-align: middle;"><?php echo $this->escaper->escapeHtml($team->getNameTeam()); ?></td>
			<td style="text-align: center; vertical-align: middle;">
				<a href="/team/edit/<?php echo $team->getID(); ?>" class="btn btn-default">Редактировать</a> <a href="/team/delete/<?php echo $team->getID(); ?>" class="btn btn-default">Удалить</a>
			</td>
		</tr>
	<?php } ?>
	</tbody>
</table>
<?php } ?>
