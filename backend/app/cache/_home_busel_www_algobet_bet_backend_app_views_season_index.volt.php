<?php echo $this->getContent(); ?>

<div class="well well-small">
	<h4>Управление сезонами</h4>
	<p>Здесь представлены все сезоны и основные действия над ними.</p>
</div>

<p class="text-right"><a href="/season/add" class="btn btn-primary">Добавить сезон</a></p>

<?php if (isset($seasons)) { ?>
<table class="table table-bordered">
	<thead>
		<th style="text-align: center; vertical-align: middle;">#</th>
		<th style="text-align: center; vertical-align: middle;">Название сезона</th>
		<th style="text-align: center; vertical-align: middle;">Лига</th>
		<th style="text-align: center; vertical-align: middle;">Вид спорта</th>
		<th style="text-align: center; vertical-align: middle;" width="30%">Действия</th>
	</thead>
	<tbody>
	<?php foreach ($seasons as $season) { ?>
		<tr>
			<td style="text-align: center; vertical-align: middle;"><?php echo $season->getId(); ?></td>
			<td style="text-align: center; vertical-align: middle;"><?php echo $this->escaper->escapeHtml($season->getNameSeason()); ?></td>
			<td style="text-align: center; vertical-align: middle;"><?php echo $this->escaper->escapeHtml($season->getLeague()); ?></td>
			<td style="text-align: center; vertical-align: middle;"><?php echo $this->escaper->escapeHtml($season->getSport()); ?></td>
			<td style="text-align: center; vertical-align: middle;">
				<a href="/season/edit/<?php echo $season->getId(); ?>" class="btn btn-default">Редактировать</a> <a href="/season/delete/<?php echo $season->getId(); ?>" class="btn btn-default">Удалить</a>
			</td>
		</tr>
	<?php } ?>
	</tbody>
</table>
<?php } ?>
