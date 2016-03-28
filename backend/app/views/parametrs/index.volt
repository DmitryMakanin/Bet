{{ content() }}

<div class="well well-small">
	<h4>Управление параметрами</h4>
	<p>Здесь представлены все параметры и основные действия над ними.</p>
</div>

<p class="text-right"><a href="/parametrs/add" class="btn btn-primary">Добавить параметр</a></p>

{% if parametrs is defined %}
<table class="table table-bordered">
	<thead>
		<th style="text-align: center; vertical-align: middle;">#</th>
		<th style="text-align: center; vertical-align: middle;">Название параметра</th>
		<th style="text-align: center; vertical-align: middle;" width="30%">Действия</th>
	</thead>
	<tbody>
	{% for parameter in parametrs %}
		<tr>
			<td style="text-align: center; vertical-align: middle;">{{ parameter.getId() }}</td>
			<td style="text-align: center; vertical-align: middle;">{{ parameter.getNameParam()|e }}</td>
			<td style="text-align: center; vertical-align: middle;">
				<a href="/parametrs/edit/{{ parameter.getId() }}" class="btn btn-default">Редактировать</a> <a href="/parametrs/delete/{{ parameter.getId() }}" class="btn btn-default">Удалить</a>
			</td>
		</tr>
	{% endfor %}
	</tbody>
</table>
{% endif %}