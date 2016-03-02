<?php echo $this->getContent(); ?>

<ul class="breadcrumb">
  <li><a href="#">Home</a></li>
  <li><a href="#">Library</a></li>
  <li class="active">How to implement this?</li>
</ul>

<blockquote class="blockquote-reverse">
  <p>Бабки не проблема!</p>
  <small>Женя Часовитин</small>
</blockquote>

<ul class="nav">
	<li><a href="#">Установки парсеров</a></li>
	<li><a href="#">Установки источников</a></li>
	<li><a href="#">Статистика пользователей</a></li>
</ul>

<?php $v30331540197943147301iterator = $sports; $v30331540197943147301incr = 0; $v30331540197943147301loop = new stdClass(); $v30331540197943147301loop->length = count($v30331540197943147301iterator); $v30331540197943147301loop->index = 1; $v30331540197943147301loop->index0 = 1; $v30331540197943147301loop->revindex = $v30331540197943147301loop->length; $v30331540197943147301loop->revindex0 = $v30331540197943147301loop->length - 1; ?><?php foreach ($v30331540197943147301iterator as $sport) { ?><?php $v30331540197943147301loop->first = ($v30331540197943147301incr == 0); $v30331540197943147301loop->index = $v30331540197943147301incr + 1; $v30331540197943147301loop->index0 = $v30331540197943147301incr; $v30331540197943147301loop->revindex = $v30331540197943147301loop->length - $v30331540197943147301incr; $v30331540197943147301loop->revindex0 = $v30331540197943147301loop->length - ($v30331540197943147301incr + 1); $v30331540197943147301loop->last = ($v30331540197943147301incr == ($v30331540197943147301loop->length - 1)); ?>
	<?php if ($v30331540197943147301loop->first) { ?>
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
	<?php if ($v30331540197943147301loop->last) { ?>
		</tbody>
	</table>
	<?php } ?>
<?php $v30331540197943147301incr++; } ?>