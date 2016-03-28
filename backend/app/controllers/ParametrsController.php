<?php

class ParametrsController extends ControllerBase {
	public function IndexAction() {
		$parametrs = Parametrs::find();
		if ( $parametrs == null ) {
			$this->flash->error('Параметры не добавлены.');
		} else {
			$this->view->parametrs = $parametrs;
		}
	}
	
	public function AddAction() {		
		$form = new ParametrsEditForm();
		$this->view->form = new ParametrsEditForm();
		
		if ( $this->request->isPost() ) {			
			$parameter = new Parametrs();
			$parameter->setNameParam( $this->request->getPost('name', 'string') );
			
			if ( !$form->isValid( $this->request->getPost() )) {
				foreach ($form->getMessages() as $message) {
					$this->flash->error($message);
				}
				return;
			}
			
			if ( !$parameter->save() ) {
				foreach ($parameter->getMessages() as $message) {
					$this->flash->error($message);
				}
				return;
			} else {
				$this->flash->success('Параметр успешно добавлен!');
				$this->forward('parametrs/index');
			}
		}
	}
	
	public function EditAction( $parametrs_id = null ) {
		if ( $parametrs_id == null && !$this->request->isPost() ) {
			$this->forward('parametrs/index');
			return;
		}
	
		if ( $parametrs_id == null && $this->request->isPost() ) {
			$parametrs_id = $this->request->getPost('curr_parametrs_id', 'int');
		}
	
		$curr_parametrs = Parametrs::findFirst( (int)$parametrs_id );
	
		if ( !$curr_parametrs ) {
			$this->flash->error('Данный параметр не найден!');
			$this->forward('parametrs/index');
			return;
		}
	
		$form = new ParametrsEditForm($curr_parametrs, null);
		$this->view->form = $form;
		$this->view->curr_parametrs_id = (int)$parametrs_id;
	
		if ( $this->request->isPost() ) {
			if ( !$form->isValid( $this->request->getPost() )) {
				foreach ($form->getMessages() as $message) {
					$this->flash->error($message);
				}
				return;
			}
				
			$curr_parametrs->setNameParam( $this->request->getPost('name', 'string') );
				
			if ( !$curr_parametrs->update() ) {
				foreach ($curr_parametrs->getMessages() as $message) {
					$this->flash->error($message);
				}
				return;
			} else {
				$this->flash->success('Параметр успешно изменен!');
				$this->forward('parametrs/index');
			}
		}
	}
	
	public function DeleteAction( $parameter_id = null ) {
		if ( $parameter_id == null ) {
			$this->forward('parametrs/index');
			return;
		}
		
		$curr_parameter = Parametrs::findFirst( (int)$parameter_id );
		if ( $curr_parameter ) {
			if ( $curr_parameter->delete() ) {
				$this->flash->success('Данный параметр удалён');
				$this->forward('parametrs/index');
			}
		} else {
			$this->flash->error('Параметр с данным ID не найден');
		}
	}
}