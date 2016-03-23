<?php

class TeamController extends ControllerBase {
	public function IndexAction() {
		
		$teams = $this->db->query("SELECT
				team.id AS `team_id`,				
				`league`.`name_league` as `league_name`,
				`sport_kind`.`name` as `kind_name`,
				`name_team`, `info`
				FROM `team`
				LEFT JOIN `league` ON `league`.`id` = team.league_id
				LEFT JOIN `sport_kind` on `sport_kind`.`id` = team.league_kind_sport_id")->fetchAll();
		
		$teams = Team::find();
		if ($teams == null) {
			$this->flash->error('Команды не добавлены!');
		}
		else {
			$this->view->teams = $teams;
		}
	}
	
	public function AddAction() {
		$form = new TeamEditForm();
		$this->view->form = new TeamEditForm();
	
		if ($this->request->isPost()) {	
			if (!$form->isValid($this->request->getPost())) {
				foreach ($form->getMessages() as $message) {
					$this->flash->error($message);
				}
				return;
			}
	
			$team = new Team();
			$team->setId($this->request->getPost('id', 'int'));			
			$team->setLeagueId($this->request->getPost('league_id', 'int'));
			$team->setLeagueKindSportId($this->request->getPost('league_kind_of_sport_id', 'int'));
			$team->setNameTeam($this->request->getPost('name_team', 'string'));
			$team->setInfo($this->request->getPost('info', 'string'));
	
			if ( !$team->create() ) {
				foreach ($team->getMessages() as $message) {
					$this->flash->error($message);
				}
				return;
			}
	
			$this->flash->success('Добавление успешно!');
			$this->forward('team/index');
		}
	}
	
	public function EditAction($team_id = null)
	{
		if ($team_id == null && !$this->request->isPost()) {
			$this->forward('team/index');
			return;
		}
	
		if ($team_id == null && $this->request->isPost()) {
			$team_id = $this->request->getPost('curr_team_id', 'int');
		}
	
		$curr_team = Team::findFirst((int)$team_id);
	
		if (!$curr_team) {
			$this->flash->error('Данная команда не найдена!');
			$this->forward('team/index');
			return;
		}
	
		$form = new TeamEditForm($curr_team, null);
		$this->view->form = $form;
		$this->view->curr_team_id = (int)$team_id;
	
		if ($this->request->isPost()) {
			if (!$form->isValid($this->request->getPost() )) {
				foreach ($form->getMessages() as $message) {
					$this->flash->error($message);
				}
				return;
			}
	
			$curr_team->setId($this->request->getPost('id', 'int'));			
			$curr_team->setLeagueId($this->request->getPost('league_id', 'int'));
			$curr_team->setLeagueKindSportId($this->request->getPost('league_kind_of_sport_id', 'int'));
			$curr_team->setNameTeam($this->request->getPost('name_team', 'string'));
			$curr_team->setInfo($this->request->getPost('info', 'string'));
	
	
			if (!$curr_team->update()) {
				foreach ($curr_team->getMessages() as $message) {
					$this->flash->error($message);
				}
				return;
			} else {
				$this->flash->success('Команда успешно изменена!');
				$this->forward('team/index');
			}
		}
	}
	
	public function DeleteAction($team_id = null) {
		if ($team_id == null) {
			$this->forward('team/index');
			return;
		}
	
		$curr_team = Team::findFirst((int)$team_id);
		if ($curr_team) {
			if ($curr_team->delete()) {
				$this->flash->success('Данная команда удалена');
				$this->forward('team/index');
			}
		} else {
			$this->flash->error('Данная команда не найдена');
		}
	}
}