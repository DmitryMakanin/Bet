<?php echo $this->getContent(); ?>

<div class="well well-small">
	<h4>Управление странами</h4>
	<p>Здесь представлены все страны и основные действия над ними.</p>
</div>

<p class="text-right"><a href="/country/add" class="btn btn-primary">Добавить страну</a></p>

<?php if (isset($countries)) { ?>
<table class="table table-bordered">
	<thead>
		<th style="text-align: center; vertical-align: middle;">#</th>
		<th style="text-align: center; vertical-align: middle;">Название вида спорта</th>
		<th style="text-align: center; vertical-align: middle;" width="30%">Действия</th>
	</thead>
	<tbody>
	<?php foreach ($countries as $country) { ?>
		<tr>
			<td style="text-align: center; vertical-align: middle;"><?php echo $this->escaper->escapeHtml($country->getID()); ?></td>
			<td style="text-align: center; vertical-align: middle;"><?php echo $this->escaper->escapeHtml($country->getCountryname()); ?></td>
			<td style="text-align: center; vertical-align: middle;">
				<a href="/country/edit/<?php echo $this->escaper->escapeHtml($country->getID()); ?>" class="btn btn-default">Редактировать</a> <a href="/country/delete/<?php echo $this->escaper->escapeHtml($country->getID()); ?>" class="btn btn-default">Удалить</a>
			</td>
		</tr>
	<?php } ?>
	</tbody>
</table>
<?php } ?>
