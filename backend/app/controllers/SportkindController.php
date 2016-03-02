<?php

class SportkindController extends ControllerBase {
	public function IndexAction() {
		$this->view->sports = SportKind::find();
	}
	
	public function AddAction() {		
		$form = new SportKindEditForm();
		$this->view->form = new SportKindEditForm();

		/*
		 * Мне как-то один мужик из ПВТ сказал, что большая вложенность if'ов - плохо.
		 * Тогда, здесь можно было бы обойтись проверкой еслиНеПост - ретурн
		 * И избавиться от двойной вложенности...
		 */
		if ( $this->request->isPost() ) {			
			$sportkind = new SportKind();
			$sportkind->setName( $this->request->getPost('name', 'string') );
			
			if ( !$form->isValid( $this->request->getPost(), $sportkind )) {
				foreach ($form->getMessages() as $message) {
					$this->flash->error($message);
				}
				return;
			}
			
			if ( !$sportkind->save() ) {
				foreach ($sportkind->getMessages() as $message) {
					$this->flash->error($message);
				}
				return;
			} else {
				$this->flash->success('Вид спорта успешно добавлен!');
				$this->forward('sportkind/index');
			}
		}
	}
	
	public function EditAction( $sportkind_id = null ) {
		if ( $sportkind_id == null && !$this->request->isPost() ) {
			$this->forward('sportkind/index');
			return;
		}
		
		if ( $sportkind_id == null && $this->request->isPost() ) {
			$sportkind_id = $this->request->getPost('curr_sportkind_id', 'int');
		}
	
		$filter = new \Phalcon\Filter;
		$curr_sportkind = SportKind::findFirst( $filter->sanitize($sportkind_id, 'int') );
	
		if ( !$curr_sportkind ) {
			$this->flash->error('Данный вид спорта не найден!');
			$this->forward('sportkind/index');
			return;
		}
	
		$form = new SportKindEditForm($curr_sportkind, null);
		$this->view->form = $form;
		$this->view->curr_sportkind_id = $filter->sanitize($sportkind_id, 'int');
	
		if ( $this->request->isPost() ) {
			if ( !$form->isValid( $this->request->getPost(), $curr_sportkind )) {
				foreach ($form->getMessages() as $message) {
					$this->flash->error($message);
				}
				return;
			}
			
			$curr_sportkind->setName( $this->request->getPost('name', 'string') );
			
			if ( !$curr_sportkind->update() ) {
				foreach ($curr_sportkind->getMessages() as $message) {
					$this->flash->error($message);
				}
				return;
			} else {
				$this->flash->success('Вид спорта успешно изменён!');
				$this->forward('sportkind/index');
			}
		}
	}
	
	public function DeleteAction( $sportkind_id = null ) {
		if ( $sportkind_id == null ) {
			$this->forward('sportkind/index');
			return;
		}
		
		$filter = new \Phalcon\Filter();
		$curr_sportkind = SportKind::findFirst( $filter->sanitize($sportkind_id, 'int') );
		if ( $curr_sportkind ) {
			if ( $curr_sportkind->delete() ) {
				$this->flash->success('Данный вид спорта удалён');
				$this->forward('sportkind/index');
			}
		} else {
			$this->flash->error('Вид спорта с данным ID не найден');
		}
	}
}