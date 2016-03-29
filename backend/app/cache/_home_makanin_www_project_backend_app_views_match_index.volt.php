<?php echo $this->getContent(); ?>

<div class="well well-small">
	<h4>Управление матчей</h4>
	<p>Здесь представлены все матчи и основные действия над ними.</p>
</div>

<p class="text-right"><a href="/match/add" class="btn btn-primary">Добавить матч</a></p>

<?php if (isset($matches)) { ?>
<table class="table table-bordered">
	<thead>
		<th style="text-align: center; vertical-align: middle;">#</th>
		<th style="text-align: center; vertical-align: middle;">Домашняя команда</th>
	    <th style="text-align: center; vertical-align: middle;">Гостевая команда</th>
	    <th style="text-align: center; vertical-align: middle;">Сезон</th>
	    <th style="text-align: center; vertical-align: middle;">Лига</th>
	    <th style="text-align: center; vertical-align: middle;">Вид спорта</th>
	    <th style="text-align: center; vertical-align: middle;">Дата начала</th>
	    <th style="text-align: center; vertical-align: middle;">Дата окончания</th>
		<th style="text-align: center; vertical-align: middle;" width="30%">Действия</th>
	</thead>
	<tbody>
	<?php foreach ($matches as $match) { ?>
		<tr>
			<td style="text-align: center; vertical-align: middle;"><?php echo $this->escaper->escapeHtml($match['match_id']); ?></td>
			<td style="text-align: center; vertical-align: middle;"><?php echo $this->escaper->escapeHtml($match['home_team_name']); ?></td>
			<td style="text-align: center; vertical-align: middle;"><?php echo $this->escaper->escapeHtml($match['guest_team_name']); ?></td>
			<td style="text-align: center; vertical-align: middle;"><?php echo $this->escaper->escapeHtml($match['season_name']); ?></td>
			<td style="text-align: center; vertical-align: middle;"><?php echo $this->escaper->escapeHtml($match['league_name']); ?></td>
			<td style="text-align: center; vertical-align: middle;"><?php echo $this->escaper->escapeHtml($match['kind_name']); ?></td>
			<td style="text-align: center; vertical-align: middle;"><?php echo $this->escaper->escapeHtml($match['dt_start']); ?></td>
			<td style="text-align: center; vertical-align: middle;"><?php echo $this->escaper->escapeHtml($match['dt_end']); ?></td>
			<td style="text-align: center; vertical-align: middle;">
			<a href="/match/edit/<?php echo $this->escaper->escapeHtml($match['match_id']); ?>" class="btn btn-default">Редактировать</a> <a href="/match/delete/<?php echo $this->escaper->escapeHtml($match['match_id']); ?>" class="btn btn-default">Удалить</a>
			</td>
		</tr>
	<?php } ?>
	</tbody>
</table>
<?php } ?>