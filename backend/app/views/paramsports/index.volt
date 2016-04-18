{{ content() }}

<div class="well well-small">
	<h4>Управление связями Вид спорта <-> Параметр</h4>
	<p>Здесь представлены все связи и основные действия над ними.</p>
</div>

<p class="text-right"><a href="/paramsports/add" class="btn btn-primary">Добавить статистику матча</a></p>

{% if param_sports is defined %}
<table class="table table-bordered">
	<thead>
		<th style="text-align: center; vertical-align: middle;">#</th>
		<th style="text-align: center; vertical-align: middle;">Вид спорта</th>
		<th style="text-align: center; vertical-align: middle;">Параметр</th>
		<th style="text-align: center; vertical-align: middle;" width="30%">Действия</th>
	</thead>
	<tbody>
	{% for param in param_sports %}
		<tr>
			<td style="text-align: center; vertical-align: middle;">{{ param['id']|e }}</td>
			<td style="text-align: center; vertical-align: middle;">{{ param['parametrs_name_param']|e }} [{{ param['parametrs_id']|e }}]</td>
			<td style="text-align: center; vertical-align: middle;">{{ param['sport_kind_name']|e }} [{{ param['sport_kind_id']|e }}]</td>
			<td style="text-align: center; vertical-align: middle;">{{ param['paramsports_status']|e }}</td>
			<td style="text-align: center; vertical-align: middle;">
				<a href="/paramsports/edit/{{ param['id']|e }}" class="btn btn-default">Редактировать</a>

				{% if param['paramsports_status'] == 'non_deleted' %}
					<a href="/paramsports/delete/?act=hide&paramsports_id={{ param['id'] }}" class="btn btn-default">Скрыть</a>
					<a href="/paramsports/delete/?act=delete&paramsports_id={{ param['id'] }}" class="btn btn-default">Удалить</a>
				{% endif %}
				{% if param['paramsports_status'] == 'deleted' %}
					<a href="/paramsports/delete/?act=restore&paramsports_id={{ param['id'] }}" class="btn btn-default">Восстановить</a>
					<a href="/paramsports/delete/?act=hide&paramsports_id={{ param['id'] }}" class="btn btn-default">Скрыть</a>
				{% endif %}
				{% if param['paramsports_status'] == 'hidden' %}
					<a href="/paramsports/delete/?act=restore&paramsports_id={{ param['id'] }}" class="btn btn-default">Восстановить</a>
					<a href="/paramsports/delete/?act=delete&paramsports_id={{ param['id'] }}" class="btn btn-default">Удалить</a>
				{% endif %}


			</td>
		</tr>
	{% endfor %}
	</tbody>
</table>
{% endif %}