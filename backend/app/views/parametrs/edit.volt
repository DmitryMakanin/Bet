{{ content() }}

<div class="well well-small">
	<h4>Редактирование Параметров</h4>
	<p>Измените необходимые поля и примените изменения кнопкой Редактировать.</p>
</div>

{{ form('parametrs/edit', 'method': 'POST', 'class': 'form-horizontal') }}
	<input type="hidden" name="curr_parametrs_id" value="{{ curr_parametrs_id }}" />
	
    <fieldset>
    <legend>Редактирование параметров</legend>
		
		{% for element in form.getElements() %}
		<div class="form-group">
			{{ form.label( element.getName(), ['class': 'col-lg-2 control-label'] ) }}
			<div class="col-lg-10">
				{{ form.render( element.getName() ) }}
			</div>
		</div>
		{% endfor %}
		
        <div class="form-group">
        	<div class="col-lg-10 col-lg-offset-2">
            	{{ submit_button('Редактировать', 'class': 'btn btn-primary') }}
            </div>
        </div>

    </fieldset>
</form>