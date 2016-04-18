<?php

class ParamsportsController extends ControllerBase {
	public function IndexAction() {
		$param_sports = $this->db->query("
				SELECT 
				`param_sports`.`id`,
				`sport_kind`.`id` AS `sport_kind_id`,
				`sport_kind`.`name` AS `sport_kind_name`,
				`parametrs`.`id` AS `parametrs_id`,
				`parametrs`.`name_param` AS `parametrs_name_param`,
				`param_sports`.`state` AS `paramsports_status`
				FROM `param_sports`
				LEFT JOIN `sport_kind` ON `param_sports`.`kind_of_sport_id` = `sport_kind`.`id`
				LEFT JOIN `parametrs` ON `param_sports`.`parametrs_id` = `parametrs`.`id`
				")->fetchAll();
		if ( $param_sports == null ) {
			$this->flash->error('Связи параметр - вид спорта не добавлены.');
		} else {
			$this->view->param_sports = $param_sports;
		}
	}

	public function AddAction() {
		$form = new ParamsportsEditForm();
		$this->view->form = $form;

		if ($this->request->isPost()) {
			if (!$form->isValid($this->request->getPost())) {
				foreach ($form->getMessages() as $message) {
					$this->flash->error($message);
				}
				return;
			}

			$paramsports = new ParamSports();
			$paramsports->setId($this->request->getPost('id', 'int'));
			$paramsports->setKindOfSportId($this->request->getPost('kind_of_sport_id', 'int'));
			$paramsports->setParametrsId($this->request->getPost('parametrs_id', 'int'));

			if (!$paramsports->create()) {
				foreach ($paramsports->getMessages() as $message) {
					$this->flash->error($message);
				}
				return;
			}

			$this->flash->success('Добавление успешно!');
			$this->forward('paramsports/index');
		}
	}

	public function EditAction($paramsports_id = null) {
		if ($paramsports_id == null && !$this->request->isPost()) {
			$this->forward('paramsports/index');
			return;
		}

		if ($paramsports_id == null && $this->request->isPost()) {
			$paramsports_id = $this->request->getPost('curr_paramsports_id', 'int');
		}

		$curr_paramsports = ParamSports::findFirst((int)$paramsports_id);

		if ($curr_paramsports) {
			$this->flash->error('данный параметр не найден!');
			$this->forward('paramsports/index');
			return;
		}

		$form = new ParamsportsEditForm($curr_paramsports, null);
		$this->view->form = $form;
		$this->view->curr_paramsports_id = (int)$paramsports_id;

		if ($this->request->isPost()){
			if (!$form->isValid($this->request->getPost() )) {
				foreach ($form->getMessages() as $message) {
					$this->flash->error($message);
				}
				return;
			}

			$curr_paramsports->setId($this->request->getPost('id', 'int'));
			$curr_paramsports->setKindOfSportId($this->request->getPost('kind_of_sport_id', 'int'));
			$curr_paramsports->setParametrsId($this->request->getPost('parametrs_id', 'int'));

			if (!$curr_paramsports->update()) {
				foreach ($curr_paramsports->getMessages() as $message) {
					$this->flash->error($message);
				}
				return;
			} else {
				$this->flash->success('Параметры успешно изменены!');
				$this->forward('paramsports/index');
			}
		}
	}

	public function DeleteAction() {
		$curr_act = $this->request->get('act', 'string');
		$curr_paramsports_id = (int)$_GET['paramsports_id'];

		if ($curr_act == '' || $curr_paramsports_id == '') {
			$this->flash->error('Неккоректный запрос');
			$this->forward('paramsports/index');
			return;
		}

		$curr_paramsports = ParamSports::findFirst($curr_paramsports_id);
		if ($curr_paramsports) {
			switch ($curr_act) {
				case 'hide':
					$curr_paramsports->setState('hidden');
					break;
				case 'delete':
					$curr_paramsports->setState('deleted');
					break;
				case 'restore':
					$curr_paramsports->setState('non_deleted');
					break;
				default:
					$this->flash->error('Некорректный запрос');
					return;
					break;
			}

			if ($curr_paramsports->save()) {
				$this->flash->success('Данный матч обновлен!');
				$this->forward('paramsports/index');
			}

		} else {
			$this->flash->error('Данный параметр не найден');
		}
	}
}