{{ content() }}

<div class="well well-small">
	<h4>Управление командами</h4>
	<p>Здесь представлены все команды и основные действия над ними.</p>
</div>

<p class="text-right"><a href="/team/add" class="btn btn-primary">Добавить команду</a></p>

{% if teams is defined %}
<table class="table table-bordered">
	<thead>
		<th style="text-align: center; vertical-align: middle;">#</th>
		<th style="text-align: center; vertical-align: middle;">Название команды</th>
		<th style="text-align: center; vertical-align: middle;" width="30%">Действия</th>
	</thead>
	<tbody>
	{% for team in teams %}
		<tr>
			<td style="text-align: center; vertical-align: middle;">{{ team.getID() }}</td>
			<td style="text-align: center; vertical-align: middle;">{{ team.getNameTeam()|e }}</td>
			<td style="text-align: center; vertical-align: middle;">{{ team.getState()|e }}</td>

			<td style="text-align: center; vertical-align: middle;">
				<a href="/team/edit/{{ team.getID() }}" class="btn btn-default">Редактировать</a>
				{% if team.getState()|e == 'non_deleted' %}
				<a href="/team/delete/?act=hide&team_id={{ team.getId()|e }}" class="btn btn-default">Скрыть</a>
				<a href="/team/delete/?act=delete&team_id={{ team.getId()|e }}" class="btn btn-default">Удалить</a>
				{% endif %}
				{% if team.getState()|e == 'deleted' %}
					<a href="/team/delete/?act=restore&team_id={{ team.getId()|e }}" class="btn btn-default">Восстановить</a>
					<a href="/team/delete/?act=hide&team_id={{ team.getId()|e }}" class="btn btn-default">Скрыть</a>
				{% endif %}
				{% if team.getState()|e == 'hidden' %}
					<a href="/team/delete/?act=restore&team_id={{ team.getId()|e }}" class="btn btn-default">Восстановить</a>
					<a href="/team/delete/?act=delete&team_id={{ team.getId()|e }}"d class="btn btn-default">Удалить</a>
				{% endif %}
			</td>
		</tr>
	{% endfor %}
	</tbody>
</table>
{% endif %}
