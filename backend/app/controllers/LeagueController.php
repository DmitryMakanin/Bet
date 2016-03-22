<?php
class LeagueController extends ControllerBase {
	public function IndexAction() {
		$leagues = $this->db->query("SELECT
				league.id AS `league_id`,
				`country`.`country_name` as `name_country`,
				`sport_kind`.`name` as `kind_name`			
				FROM `league`
				LEFT JOIN `country` ON `country`.`id` = league.country_id
				LEFT JOIN `sport_kind` ON `sport_kind`.`id` = league.sport_kind_id")->fetchAll();
		
		if ( $leagues == null ) {
			$this->flash->error('Лиги не добавлены!');
		} else {
			$this->view->leagues = $leagues;
		}
	}
	
	public function AddAction() {
		$form = new LeaguesEditForm();
		$this->view->form = $form;
	
		if ( $this->request->isPost() ) {
			$league = new League();
			$league->setNameLeague( $this->request->getPost('leaguename', 'string') );
			$league->setCountryId($this->request->getPost('country_id', 'int'));
			$league->setSportKindId($this->request->getPost('sport_kind_id', 'int'));
	
			if ( !$form->isValid( $this->request->getPost() )) {
				foreach ($form->getMessages() as $message) {
					$this->flash->error($message);
				}
				return;
			}
	
			if ( !$league->create() ) {
				foreach ($league->getMessages() as $message) {
					$this->flash->error($message);
				}
				return;
			} else {
				$this->flash->success('Лига успешно добавлена!');
				$this->forward('league/index');
			}
		}
	}
	
	public function EditAction( $league_id = null ) {
		if ( $league_id == null && !$this->request->isPost() ) {
			$this->forward('league/index');
			return;
		}
	
		if ( $league_id == null && $this->request->isPost() ) {
			$league_id = $this->request->getPost('curr_league_id', 'int');
		}
	
		$curr_league = League::findFirst( (int)$league_id );
	
		if ( !$curr_league ) {
			$this->flash->error('Данная лига не найдена!');
			$this->forward('league/index');
			return;
		}
	
		$form = new LeaguesEditForm($curr_league, null);
		$this->view->form = $form;
		$this->view->curr_league_id = (int)$league_id;
	
		if ( $this->request->isPost() ) {
			if ( !$form->isValid( $this->request->getPost() )) {
				foreach ($form->getMessages() as $message) {
					$this->flash->error($message);
				}
				return;
			}
	
			$curr_league->setLeaguename( $this->request->getPost('leaguename', 'string') );
	
			if ( !$curr_league->update() ) {
				foreach ($curr_league->getMessages() as $message) {
					$this->flash->error($message);
				}
				return;
			} else {
				$this->flash->success('Лига успешно изменена!');
				$this->forward('league/index');
			}
		}
	}
	
	public function DeleteAction( $league_id = null ) {
		if ( $league_id == null ) {
			$this->forward('league/index');
			return;
		}
	
		$curr_league = League::findFirst( (int)$league_id );
		if ( $curr_league ) {
			if ( $curr_league->delete() ) {
				$this->flash->success('Данная лига удалена');
				$this->forward('league/index');
			}
		} else {
			$this->flash->error('Данная лига не найдена.');
		}
	}
}