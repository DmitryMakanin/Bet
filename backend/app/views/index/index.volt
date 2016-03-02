{{ content() }}

<ul class="breadcrumb">
  <li><a href="#">Home</a></li>
  <li><a href="#">Library</a></li>
  <li class="active">How to implement this?</li>
</ul>

<blockquote class="blockquote-reverse">
  <p>Бабки не проблема!</p>
  <small>Женя Часовитин</small>
</blockquote>

<ul class="nav">
	<li><a href="#">Установки парсеров</a></li>
	<li><a href="#">Установки источников</a></li>
	<li><a href="#">Статистика пользователей</a></li>
</ul>

{% for sport in sports %}
	{% if loop.first %}
	<table class="table table-bordered">
		<thead>
			<th>#</th>
			<th>name</th>
		</thead>
		<tbody>
	{% endif %}
		<tr>
			<td>{{ sport.getID() }}</td>
			<td>{{ sport.getName() }}</td>
		</tr>
	{% if loop.last %}
		</tbody>
	</table>
	{% endif %}
{% endfor %}