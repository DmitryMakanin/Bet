<?php

class ParamsportsController extends ControllerBase {
	public function IndexAction() {
		$param_sports = ParamSports::getLeftJoinedDBQuery()->toArray();
		if ( $param_sports == null ) {
			$this->flash->error('Связи параметр - вид спорта не добавлены.');
		} else {
			$this->view->param_sports = $param_sports;
		}
	}
	
	public function AddAction() {
		$form = new ParamsportsEditForm();
		$this->view->form = $form;
		
		if ( $this->request->isPost() ) {
			$paramsport = new ParamSports();
			if ( isset($_REQUEST['del']) ) {
				$paramsport->setDeleted( 1 );
			}
			$paramsport->setKindOfSportId( $this->request->get('kind', 'int') );
			$paramsport->setParametrsId( $this->request->get('param', 'int') );  
		
			if ( !$form->isValid( $this->request->getPost() )) {
				foreach ($form->getMessages() as $message) {
					$this->flash->error($message);
				}
				return;
			}
		
			if ( !$paramsport->save() ) {
				foreach ($paramsport->getMessages() as $message) {
					$this->flash->error($message);
				}
				return;
			} else {
				$this->flash->success('Связь параметр-вид спорта добавлен!');
				$this->forward('paramsports/index');
			}
		}
	}
	
	public function EditAction() {
		
	}
}