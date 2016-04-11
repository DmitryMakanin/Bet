{{ content() }}

<div class="well well-small">
	<h4>Управление лигами</h4>
	<p>Здесь представлены все лиги и основные действия над ними.</p>
</div>

<p class="text-right"><a href="/league/add" class="btn btn-primary">Добавить лигу</a></p>

<div class="dropdown">
	<button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true">
		Не сортировать по стране
		<span class="caret"></span>
	</button>
  	<ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
    	<li><a href="#">Action</a></li>
    	<li><a href="#">Another action</a></li>
    	<li><a href="#">Something else here</a></li>
    	<li role="separator" class="divider"></li>
    	<li><a href="#">Separated link</a></li>
  	</ul>
</div>

{% if leagues is defined %}
<table class="table table-bordered">
	<thead>
		<th style="text-align: center; vertical-align: middle;">#</th>
		<th style="text-align: center; vertical-align: middle;">Название лиги</th>
		<th style="text-align: center; vertical-align: middle;">Страна</th>
		<th style="text-align: center; vertical-align: middle;">Вид спорта</th>
		<th style="text-align: center; vertical-align: middle;">status</th>
		<th style="text-align: center; vertical-align: middle;" width="30%">Действия</th>
	</thead>
	<tbody>
	{% for league in leagues.items %}
		<tr>
			<td style="text-align: center; vertical-align: middle;">{{ league['league_id'] }}</td>
			<td style="text-align: center; vertical-align: middle;">{{ league['name_league']|e }}</td>
			<td style="text-align: center; vertical-align: middle;">{{ league['country_name']|e }}</td>
			<td style="text-align: center; vertical-align: middle;">{{ league['sport_kind_name']|e }}</td>
			<td style="text-align: center; vertical-align: middle;">{{ league['league_status'] }}</td>
			<td style="text-align: center; vertical-align: middle;">
				<a href="/league/edit/{{ league['league_id'] }}" class="btn btn-default">Редактировать</a> <a href="/league/delete/{{ league['league_id'] }}" class="btn btn-default">Удалить</a>
			</td>
		</tr>
	{% endfor %}
	</tbody>
</table>

<div class="text-center">
	<div class="btn-group">
		<a href="/league/index" class="btn btn-default"><i class="icon-fast-backward"></i> Первая</a>
		<a href="/league/index?page={{ leagues.before }}" class="btn btn-default"><i class="icon-step-backward"></i> Предыдущая</a>
		<a href="/league/index?page={{ leagues.next }}" class="btn btn-default"><i class="icon-step-forward"></i> Следующая</a>
		<a href="/league/index?page={{ leagues.last }}" class="btn btn-default"><i class="icon-fast-forward"></i> Последняя</a>	                
	</div>
	<p>страница {{ leagues.current }} из {{ leagues.total_pages }} по 50 на страницу</p>
</div>

{% endif %}
