<?php

class CountryController extends ControllerBase {
	public function IndexAction() {
		$countries = Country::find();
		if ( $countries == null ) {
			$this->flash->error('Страны не добавлены.');
		} else {
			$this->view->countries = $countries;
		}
	}
	
	public function AddAction() {
		$form = new CountriesEditForm();
		$this->view->form = $form;
	
		if ( $this->request->isPost() ) {
			$country = new Country();
			$country->setCountryName( $this->request->getPost('country_name', 'string') );
				
			if ( !$form->isValid( $this->request->getPost() )) {
				foreach ($form->getMessages() as $message) {
					$this->flash->error($message);
				}
				return;
			}
				
			if ( !$country->save() ) {
				foreach ($country->getMessages() as $message) {
					$this->flash->error($message);
				}
				return;
			} else {
				$this->flash->success('Страна успешно добавлена!');
				$this->forward('country/index');
			}
		}
	}
	
	public function EditAction( $country_id = null ) {
		if ( $country_id == null && !$this->request->isPost() ) {
			$this->forward('country/index');
			return;
		}
	
		if ( $country_id == null && $this->request->isPost() ) {
			$country_id = $this->request->getPost('curr_country_id', 'int');
		}
	
		$curr_country = Country::findFirst( (int)$country_id );
	
		if ( !$curr_country ) {
			$this->flash->error('Данная страна не найдена!');
			$this->forward('country/index');
			return;
		}
	
		$form = new CountriesEditForm($curr_country, null);
		$this->view->form = $form;
		$this->view->curr_country_id = (int)$country_id;
	
		if ( $this->request->isPost() ) {
			if ( !$form->isValid( $this->request->getPost() )) {
				foreach ($form->getMessages() as $message) {
					$this->flash->error($message);
				}
				return;
			}
				
			$curr_country->setCountryName( $this->request->getPost('country_name', 'string') );
				
			if ( !$curr_country->update() ) {
				foreach ($curr_country->getMessages() as $message) {
					$this->flash->error($message);
				}
				return;
			} else {
				$this->flash->success('Страна успешно изменена!');
				$this->forward('country/index');
			}
		}
	}
	
	public function DeleteAction( $country_id = null ) {
		if ( $country_id == null ) {
			$this->forward('country/index');
			return;
		}
	
		$curr_country = Country::findFirst( (int)$country_id );
		if ( $curr_country ) {
			if ( $curr_country->delete() ) {
				$this->flash->success('Данная страна удалена');
				$this->forward('country/index');
			}
		} else {
			$this->flash->error('Данная страна не найдена.');
		}
	}
}