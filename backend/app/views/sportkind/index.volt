{{ content() }}

<div class="well well-small">
	<h4>Управление видами спорта</h4>
	<p>Здесь представлены все виды спорта и основные действия над ними.</p>
</div>

<p class="text-right"><a href="/sportkind/add" class="btn btn-primary">Добавить вид спорта</a></p>

{% for sport in sports %}
	{% if loop.first %}
	<table class="table table-bordered">
		<thead>
			<th style="text-align: center; vertical-align: middle;">#</th>
			<th style="text-align: center; vertical-align: middle;">Название вида спорта</th>
			<th style="text-align: center; vertical-align: middle;" width="30%">Действия</th>
		</thead>
		<tbody>
	{% endif %}
		<tr>
			<td style="text-align: center; vertical-align: middle;">{{ sport.getID() }}</td>
			<td style="text-align: center; vertical-align: middle;">{{ sport.getName() }}</td>
			<td style="text-align: center; vertical-align: middle;">
				<a href="/sportkind/edit/{{ sport.getID() }}" class="btn btn-default">Редактировать</a> <a href="/sportkind/delete/{{ sport.getID() }}" class="btn btn-default">Удалить</a>
			</td>
		</tr>
	{% if loop.last %}
		</tbody>
	</table>
	{% endif %}
{% else %}
<p class="text-center">Видов спорта не найдено.</p>
{% endfor %}