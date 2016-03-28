{{ content() }}

<div class="well well-small">
	<h4>Управление сезонами</h4>
	<p>Здесь представлены все сезоны и основные действия над ними.</p>
</div>

<p class="text-right"><a href="/season/add" class="btn btn-primary">Добавить сезон</a></p>

{% if seasons is defined %}
<table class="table table-bordered">
	<thead>
		<th style="text-align: center; vertical-align: middle;">#</th>
		<th style="text-align: center; vertical-align: middle;">Название сезона</th>
		<th style="text-align: center; vertical-align: middle;">Лига</th>
		<th style="text-align: center; vertical-align: middle;">Вид спорта</th>
		<th style="text-align: center; vertical-align: middle;" width="30%">Действия</th>
	</thead>
	<tbody>
	{% for season in seasons %}
		<tr>
			<td style="text-align: center; vertical-align: middle;">{{ season.getId() }}</td>
			<td style="text-align: center; vertical-align: middle;">{{ season.getNameSeason()|e }}</td>
			<td style="text-align: center; vertical-align: middle;">{{ season.getLeague()|e }}</td>
			<td style="text-align: center; vertical-align: middle;">{{ season.getSport()|e }}</td>
			<td style="text-align: center; vertical-align: middle;">
				<a href="/season/edit/{{ season.getId() }}" class="btn btn-default">Редактировать</a> <a href="/season/delete/{{ season.getId() }}" class="btn btn-default">Удалить</a>
			</td>
		</tr>
	{% endfor %}
	</tbody>
</table>
{% endif %}
