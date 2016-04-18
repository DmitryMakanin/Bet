{{ content() }}

<div class="well well-small">
	<h4>Управление странами</h4>
	<p>Здесь представлены все страны и основные действия над ними.</p>
</div>

<p class="text-right"><a href="/country/add" class="btn btn-primary">Добавить страну</a></p>

{% if countries is defined %}
<table class="table table-bordered">
	<thead>
		<th style="text-align: center; vertical-align: middle;">#</th>
		<th style="text-align: center; vertical-align: middle;">Название вида спорта</th>
		<th style="text-align: center; vertical-align: middle;" width="30%">Действия</th>
	</thead>
	<tbody>
	{% for country in countries %}
		<tr>
			<td style="text-align: center; vertical-align: middle;">{{ country.getId()|e }}</td>
			<td style="text-align: center; vertical-align: middle;">{{ country.getCountryName()|e }}</td>
			<td style="text-align: center; vertical-align: middle;">{{ country.getState()|e }}</td>
			<td style="text-align: center; vertical-align: middle;">
				<a href="/country/edit/{{ country.getId()|e }}" class="btn btn-default">Редактировать</a>
				{% if country.getState()|e == 'non_deleted' %}
                            					<a href="/country/delete/?act=hide&country_id={{ country.getId()|e }}" class="btn btn-default">Скрыть</a>
                            					<a href="/country/delete/?act=delete&country_id={{ country.getId()|e }}" class="btn btn-default">Удалить</a>
                            				{% endif %}
    {% if country.getState()|e == 'deleted' %}
                					<a href="/country/delete/?act=restore&country_id={{ country.getId()|e }}" class="btn btn-default">Восстановить</a>
                					<a href="/country/delete/?act=hide&country_id={{ country.getId()|e }}" class="btn btn-default">Скрыть</a>
                				{% endif %}
            {% if country.getState()|e == 'hidden' %}
                        					<a href="/country/delete/?act=restore&country_id={{ country.getId()|e }}" class="btn btn-default">Восстановить</a>
                        					<a href="/country/delete/?act=delete&country_id={{ country.getId()|e }}"d class="btn btn-default">Удалить</a>
               {% endif %}
			</td>
		</tr>
	{% endfor %}
	</tbody>
</table>
{% endif %}