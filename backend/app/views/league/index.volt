{{content}}

<div class="well well-small">
	<h4>Управление лигами</h4>
	<p>Здесь представлены все лиги и основные действия над ними.</p>
</div>

<p class="text-right"><a href="/league/add" class="btn btn-primary">Добавить лигу</a></p>

{% if leagues is defined %}
<table class="table table-bordered">
	<thead>
		<th style="text-align: center; vertical-align: middle;">#</th>
		<th style="text-align: center; vertical-align: middle;">Название вида спорта</th>
		<th style="text-align: center; vertical-align: middle;" width="30%">Действия</th>
	</thead>
	<tbody>
	{% for league in leagues %}
		<tr>
			<td style="text-align: center; vertical-align: middle;">{{ league.getId()|e }}</td>
			<td style="text-align: center; vertical-align: middle;">{{ league.getNameLeague()|e }}</td>
			<td style="text-align: center; vertical-align: middle;">
				<a href="/league/edit/{{ league.getId()|e }}" class="btn btn-default">Редактировать</a> 
				<a href="/league/delete/{{ league.getId()|e }}" class="btn btn-default">Удалить</a>
			</td>
		</tr>
	{% endfor %}
	</tbody>
</table>
{% endif %}