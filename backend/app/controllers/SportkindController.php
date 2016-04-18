<?php

class SportkindController extends ControllerBase {
	public function IndexAction() {
		$kinds = SportKind::find();
		if ( $kinds == null ) {
			$this->flash->error('Виды спорта не добавлены.');
		} else {
			$this->view->sports = $kinds;
		}
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
			
			if ( !$form->isValid( $this->request->getPost() )) {
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
	
		$curr_sportkind = SportKind::findFirst( (int)$sportkind_id );
	
		if ( !$curr_sportkind ) {
			$this->flash->error('Данный вид спорта не найден!');
			$this->forward('sportkind/index');
			return;
		}
	
		$form = new SportKindEditForm($curr_sportkind, null);
		$this->view->form = $form;
		$this->view->curr_sportkind_id = (int)$sportkind_id;
	
		if ( $this->request->isPost() ) {
			if ( !$form->isValid( $this->request->getPost() )) {
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
	
	public function DeleteAction() {
		/*if ( $sportkind_id == null ) {
			$this->forward('sportkind/index');
			return;
		}
		
		$curr_sportkind = SportKind::findFirst( (int)$sportkind_id );
		if ( $curr_sportkind ) {
			if ( $curr_sportkind->delete() ) {
				$this->flash->success('Данный вид спорта удалён');
				$this->forward('sportkind/index');
			}
		} else {
			$this->flash->error('Вид спорта с данным ID не найден');
		}*/

		$curr_act = $this->request->get('act', 'string');
		$curr_sportkind_id = (int)$_GET['sport_id'];

		if ($curr_act == '' || $curr_sportkind_id == '') {
			$this->flash->error('Неккоректный запрос');
			$this->forward('sportkind/index');
			return;
		}

		$curr_sportkind = SportKind::findFirst($curr_sportkind_id);
		if ($curr_sportkind) {
			switch ($curr_act) {
				case 'hide':
					$curr_sportkind->setState('hidden');
					break;
				case 'delete':
					$curr_sportkind->setState('deleted');
					break;
				case 'restore':
					$curr_sportkind->setState('non_deleted');
					break;
				default:
					$this->flash->error('Некорректный запрос!');
					return;
					break;
			}

			if ($curr_sportkind->save()) {
				$this->flash->success('Данный матч обновлен!');
				$this->forward('sportkind/index');
			}

		} else {
			$this->flash->error('Данный матч не найден');
		}
	}
}