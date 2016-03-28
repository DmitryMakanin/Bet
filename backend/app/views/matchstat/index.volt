{{ content() }}

<div class="well well-small">
	<h4>Управление единицами статистик матчей</h4>
	<p>Здесь представлены все единицы статистик матчей и основные действия над ними.</p>
</div>

<p class="text-right"><a href="/matchstat/add" class="btn btn-primary">Добавить статистику матча</a></p>

{% if matchstats is defined %}
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
	{% for ms in matchstats %}
		<tr>
			<td style="text-align: center; vertical-align: middle;">{{ ms['id']|e }}</td>
			<td style="text-align: center; vertical-align: middle;">{{ ms['match_id']|e }} ({{ ms['home_team_name']|e }} - {{ ms['guest_team_name']|e }})</td>
			<td style="text-align: center; vertical-align: middle;">{{ ms['league_name']|e }} [{{ ms['league_id']|e }}]</td>
			<td style="text-align: center; vertical-align: middle;">{{ ms['sport_kind_name']|e }} [{{ ms['sport_kind_id']|e }}]</td>
			<td style="text-align: center; vertical-align: middle;">{{ ms['value']|e }}</td>
			<td style="text-align: center; vertical-align: middle;">{{ ms['parametrs_name']|e }}</td>
			<td style="text-align: center; vertical-align: middle;">
				<a href="/matchstat/edit/{{ ms['id']|e }}" class="btn btn-default">Редактировать</a> <a href="/matchstat/delete/{{ ms['id']|e }}" class="btn btn-default">Удалить</a>
			</td>
		</tr>
	{% endfor %}
	</tbody>
</table>
{% endif %}