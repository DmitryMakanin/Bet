{{ content() }}

{{ form('parametrs/add', 'method': 'POST', 'class': 'form-horizontal') }}

    <fieldset>
    <legend>Добавление параметра</legend>
		
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
            	{{ submit_button('Добавить', 'class': 'btn btn-primary') }}
            </div>
        </div>

    </fieldset>
</form>