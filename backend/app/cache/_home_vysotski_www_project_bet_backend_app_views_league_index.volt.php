<?php echo $this->getContent(); ?>

<div class="well well-small">
	<h4>Управление лигами</h4>
	<p>Здесь представлены все лиги и основные действия над ними.</p>
</div>

<p class="text-right"><a href="/league/add" class="btn btn-primary">Добавить лигу</a></p>

<div class="dropdown">
	<button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true">
		Не сортировать по стране
		<span class="caret"></span>
	</button>
  	<ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
    	<li><a href="#">Action</a></li>
    	<li><a href="#">Another action</a></li>
    	<li><a href="#">Something else here</a></li>
    	<li role="separator" class="divider"></li>
    	<li><a href="#">Separated link</a></li>
  	</ul>
</div>

<?php if (isset($leagues)) { ?>
<table class="table table-bordered">
	<thead>
		<th style="text-align: center; vertical-align: middle;">#</th>
		<th style="text-align: center; vertical-align: middle;">Название лиги</th>
		<th style="text-align: center; vertical-align: middle;">Страна</th>
		<th style="text-align: center; vertical-align: middle;">Вид спорта</th>
		<th style="text-align: center; vertical-align: middle;">status</th>
		<th style="text-align: center; vertical-align: middle;" width="30%">Действия</th>
	</thead>
	<tbody>
	<?php foreach ($leagues->items as $league) { ?>
		<tr>
			<td style="text-align: center; vertical-align: middle;"><?php echo $league['league_id']; ?></td>
			<td style="text-align: center; vertical-align: middle;"><?php echo $this->escaper->escapeHtml($league['name_league']); ?></td>
			<td style="text-align: center; vertical-align: middle;"><?php echo $this->escaper->escapeHtml($league['country_name']); ?></td>
			<td style="text-align: center; vertical-align: middle;"><?php echo $this->escaper->escapeHtml($league['sport_kind_name']); ?></td>
			<td style="text-align: center; vertical-align: middle;"><?php echo $league['league_status']; ?></td>
			<td style="text-align: center; vertical-align: middle;">
				<a href="/league/edit/<?php echo $league['league_id']; ?>" class="btn btn-default">Редактировать</a> <a href="/league/delete/<?php echo $league['league_id']; ?>" class="btn btn-default">Удалить</a>
			</td>
		</tr>
	<?php } ?>
	</tbody>
</table>

<div class="text-center">
	<div class="btn-group">
		<a href="/league/index" class="btn btn-default"><i class="icon-fast-backward"></i> Первая</a>
		<a href="/league/index?page=<?php echo $leagues->before; ?>" class="btn btn-default"><i class="icon-step-backward"></i> Предыдущая</a>
		<a href="/league/index?page=<?php echo $leagues->next; ?>" class="btn btn-default"><i class="icon-step-forward"></i> Следующая</a>
		<a href="/league/index?page=<?php echo $leagues->last; ?>" class="btn btn-default"><i class="icon-fast-forward"></i> Последняя</a>
	</div>
	<p>страница <?php echo $leagues->current; ?> из <?php echo $leagues->total_pages; ?> по 50 на страницу</p>
</div>

<?php } ?>
