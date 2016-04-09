<?php echo $this->getContent(); ?>

<div class="well well-small">
	<h4>Управление связями Вид спорта <-> Параметр</h4>
	<p>Здесь представлены все связи и основные действия над ними.</p>
</div>

<p class="text-right"><a href="/paramsports/add" class="btn btn-primary">Добавить статистику матча</a></p>

<?php if (isset($param_sports)) { ?>
<table class="table table-bordered">
	<thead>
		<th style="text-align: center; vertical-align: middle;">#</th>
		<th style="text-align: center; vertical-align: middle;">Параметр</th>
		<th style="text-align: center; vertical-align: middle;">Вид спорта</th>
		<th style="text-align: center; vertical-align: middle;">Статус</th>
		<th style="text-align: center; vertical-align: middle;" width="30%">Действия</th>
	</thead>
	<tbody>
	<?php foreach ($param_sports as $param) { ?>
		<tr>
			<td style="text-align: center; vertical-align: middle;"><?php echo $this->escaper->escapeHtml($param['id']); ?></td>
			<td style="text-align: center; vertical-align: middle;"><?php echo $this->escaper->escapeHtml($param['parametrs_name_param']); ?> [<?php echo $this->escaper->escapeHtml($param['parametrs_id']); ?>]</td>
			<td style="text-align: center; vertical-align: middle;"><?php echo $this->escaper->escapeHtml($param['sport_kind_name']); ?> [<?php echo $this->escaper->escapeHtml($param['sport_kind_id']); ?>]</td>
			<td style="text-align: center; vertical-align: middle;"><?php if ($param['deleted'] == 1) { ?><font style="color: red;">удален</font><?php } else { ?>существует<?php } ?></td>
			<td style="text-align: center; vertical-align: middle;">
				<a href="/paramsports/edit/<?php echo $this->escaper->escapeHtml($param['id']); ?>" class="btn btn-default">Редактировать</a> <a href="/paramsports/delete/<?php echo $this->escaper->escapeHtml($param['id']); ?>" class="btn btn-default">Удалить</a>
			</td>
		</tr>
	<?php } ?>
	</tbody>
</table>
<?php } ?>