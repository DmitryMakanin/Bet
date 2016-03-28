<?php echo $this->getContent(); ?>

<div class="well well-small">
	<h4>Управление единицами статистик матчей</h4>
	<p>Здесь представлены все единицы статистик матчей и основные действия над ними.</p>
</div>

<p class="text-right"><a href="/matchstat/add" class="btn btn-primary">Добавить статистику матча</a></p>

<?php if (isset($matchstats)) { ?>
<table class="table table-bordered">
	<thead>
		<th style="text-align: center; vertical-align: middle;">#</th>
		<th style="text-align: center; vertical-align: middle;">ID матча</th>
		<th style="text-align: center; vertical-align: middle;">Лига</th>
		<th style="text-align: center; vertical-align: middle;">Вид спорта</th>
		<th style="text-align: center; vertical-align: middle;">Значение (value)</th>
		<th style="text-align: center; vertical-align: middle;">param_sports_id</th>
		<th style="text-align: center; vertical-align: middle;" width="30%">Действия</th>
	</thead>
	<tbody>
	<?php foreach ($matchstats as $ms) { ?>
		<tr>
			<td style="text-align: center; vertical-align: middle;"><?php echo $this->escaper->escapeHtml($ms['id']); ?></td>
			<td style="text-align: center; vertical-align: middle;"><?php echo $this->escaper->escapeHtml($ms['match_id']); ?> (<?php echo $this->escaper->escapeHtml($ms['home_team_name']); ?> - <?php echo $this->escaper->escapeHtml($ms['guest_team_name']); ?>)</td>
			<td style="text-align: center; vertical-align: middle;"><?php echo $this->escaper->escapeHtml($ms['league_name']); ?> [<?php echo $this->escaper->escapeHtml($ms['league_id']); ?>]</td>
			<td style="text-align: center; vertical-align: middle;"><?php echo $this->escaper->escapeHtml($ms['sport_kind_name']); ?> [<?php echo $this->escaper->escapeHtml($ms['sport_kind_id']); ?>]</td>
			<td style="text-align: center; vertical-align: middle;"><?php echo $this->escaper->escapeHtml($ms['value']); ?></td>
			<td style="text-align: center; vertical-align: middle;"><?php echo $this->escaper->escapeHtml($ms['parametrs_name']); ?></td>
			<td style="text-align: center; vertical-align: middle;">
				<a href="/matchstat/edit/<?php echo $this->escaper->escapeHtml($ms['id']); ?>" class="btn btn-default">Редактировать</a> <a href="/matchstat/delete/<?php echo $this->escaper->escapeHtml($ms['id']); ?>" class="btn btn-default">Удалить</a>
			</td>
		</tr>
	<?php } ?>
	</tbody>
</table>
<?php } ?>