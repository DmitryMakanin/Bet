<?php echo $this->getContent(); ?>

<ul class="breadcrumb">
  <li><a href="#">Home</a></li>
  <li><a href="#">Library</a></li>
  <li class="active">How to implement this?</li>
</ul>

<ul class="nav">
	<li><a href="#">Установки парсеров</a></li>
	<li><a href="#">Установки источников</a></li>
	<li><a href="#">Статистика пользователей</a></li>
</ul>

<?php $v114798550978556682351iterator = $sports; $v114798550978556682351incr = 0; $v114798550978556682351loop = new stdClass(); $v114798550978556682351loop->length = count($v114798550978556682351iterator); $v114798550978556682351loop->index = 1; $v114798550978556682351loop->index0 = 1; $v114798550978556682351loop->revindex = $v114798550978556682351loop->length; $v114798550978556682351loop->revindex0 = $v114798550978556682351loop->length - 1; ?><?php foreach ($v114798550978556682351iterator as $sport) { ?><?php $v114798550978556682351loop->first = ($v114798550978556682351incr == 0); $v114798550978556682351loop->index = $v114798550978556682351incr + 1; $v114798550978556682351loop->index0 = $v114798550978556682351incr; $v114798550978556682351loop->revindex = $v114798550978556682351loop->length - $v114798550978556682351incr; $v114798550978556682351loop->revindex0 = $v114798550978556682351loop->length - ($v114798550978556682351incr + 1); $v114798550978556682351loop->last = ($v114798550978556682351incr == ($v114798550978556682351loop->length - 1)); ?>
	<?php if ($v114798550978556682351loop->first) { ?>
	<table class="table table-bordered">
		<thead>
			<th>#</th>
			<th>name</th>
		</thead>
		<tbody>
	<?php } ?>
		<tr>
			<td><?php echo $sport->getID(); ?></td>
			<td><?php echo $sport->getName(); ?></td>
		</tr>
	<?php if ($v114798550978556682351loop->last) { ?>
		</tbody>
	</table>
	<?php } ?>
<?php $v114798550978556682351incr++; } ?>