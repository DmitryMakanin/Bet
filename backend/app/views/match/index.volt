{{ content() }}

<div class="well well-small">
	<h4>Управление матчей</h4>
	<p>Здесь представлены все матчи и основные действия над ними.</p>
</div>

<p class="text-right"><a href="/match/add" class="btn btn-primary">Добавить матч</a></p>

{% if matches is defined %}
<table class="table table-bordered">
	<thead>
		<th style="text-align: center; vertical-align: middle;">#</th>
		<th style="text-align: center; vertical-align: middle;">Домашняя команда</th>
	    <th style="text-align: center; vertical-align: middle;">Гостевая команда</th>
	    <th style="text-align: center; vertical-align: middle;">Сезон</th>
	    <th style="text-align: center; vertical-align: middle;">Лига</th>
	    <th style="text-align: center; vertical-align: middle;">Вид спорта</th>
	    <th style="text-align: center; vertical-align: middle;">Дата начала</th>
	    <th style="text-align: center; vertical-align: middle;">Дата окончания</th>
		<th style="text-align: center; vertical-align: middle;" width="30%">Действия</th>
	</thead>
	<tbody>
	{% for match in matches %}
		<tr>
			<td style="text-align: center; vertical-align: middle;">{{ match['match_id']|e }}</td>
			<td style="text-align: center; vertical-align: middle;">{{ match['home_team_name']|e }}</td>
			<td style="text-align: center; vertical-align: middle;">{{ match['guest_team_name']|e }}</td>
			<td style="text-align: center; vertical-align: middle;">{{ match['season_name']|e }}</td>
			<td style="text-align: center; vertical-align: middle;">{{ match['league_name']|e }}</td>
			<td style="text-align: center; vertical-align: middle;">{{ match['kind_name']|e }}</td>
			<td style="text-align: center; vertical-align: middle;">{{ match['dt_start']|e }}</td>
			<td style="text-align: center; vertical-align: middle;">{{ match['dt_end']|e }}</td>
			<td style="text-align: center; vertical-align: middle;">{{ match['match_status'] }}</td>
			<td style="text-align: center; vertical-align: middle;">
			<a href="/match/edit/{{ match['match_id']|e }}" class="btn btn-default">Редактировать</a>
			{% if match['match_status'] == 'non_deleted' %}
            					<a href="/match/delete/?act=hide&match_id={{ match['match_id'] }}" class="btn btn-default">Скрыть</a>
            					<a href="/match/delete/?act=delete&match_id={{ match['match_id'] }}" class="btn btn-default">Удалить</a>
            				{% endif %}
            				{% if match['match_status'] == 'deleted' %}
            					<a href="/match/delete/?act=restore&match_id={{ match['match_id'] }}" class="btn btn-default">Восстановить</a>
            					<a href="/match/delete/?act=hide&match_id={{ match['match_id'] }}" class="btn btn-default">Скрыть</a>
            				{% endif %}
            				{% if match['match_status'] == 'hidden' %}
            					<a href="/match/delete/?act=restore&match_id={{ match['match_id'] }}" class="btn btn-default">Восстановить</a>
            					<a href="/match/delete/?act=delete&match_id={{ match['match_id'] }}"d class="btn btn-default">Удалить</a>
            				{% endif %}
			</td>
		</tr>
	{% endfor %}
	</tbody>
</table>
{% endif %}