<?php

/**
 * Created by PhpStorm.
 * User: Darya Busel
 * Date: 15.03.2016
 * Time: 11:13
 */

use Phalcon\Paginator\Adapter\NativeArray as PaginatorArray;

class LeagueController extends ControllerBase
{
    public function IndexAction() {
        //$leagues = League::find(['hydration' => \Phalcon\Mvc\Model\Resultset::HYDRATE_RECORDS]);
        
    	$curr_page = $this->request->get('page', 'int', 1);
    	$limit_lower = $curr_page * 50 - 50;
    	$limit_higher = $curr_page * 50;
    	
    	//LIMIT ' . $limit_lower . ', ' . $limit_higher . '
        $leagues = $this->db->query('
        		SELECT
				`league`.`id` AS `league_id`,
				`league`.`name_league` AS `name_league`,
				`sport_kind`.`name` AS `sport_kind_name`,
				`country`.`country_name`,
				`league`.`state` AS `league_status`
				FROM `league`
				LEFT JOIN `sport_kind` ON `league`.`sport_kind_id` = `sport_kind`.`id`
				LEFT JOIN `country` ON `league`.`country_id` = `country`.`id`
        ')->fetchAll();
        
        
        
        // Передача данных из массива
        $paginator = new PaginatorArray(
        		array(
        				"data"  => $leagues,
        				"limit" => 50,
        				"page"  => $curr_page
        		)
        );
        
        
    	
        if ( $leagues == null ) {
            $this->flash->error('Лиги не добавлены.');
        } else {
            /*$leagues_array = array();
            foreach($leagues as $league){
                if($league->getStatus() == 'N'){
                    array_push($leagues_array, $league);
                }
            }*/
            $this->view->leagues = $paginator->getPaginate();;
        }
    }

    public function AddAction() {
        $form = new LeagueEditForm();
        $this->view->form = new LeagueEditForm();

        if ( $this->request->isPost() ) {
            $league = new League();
            $league->setNameLeague( $this->request->getPost('name_league', 'string') );
            $league->setCountryId( $this->request->getPost('country_id', 'int') );
            $league->setSportKindId( $this->request->getPost('sport_kind_id', 'int') );

            if ( !$form->isValid( $this->request->getPost() )) {
                foreach ($form->getMessages() as $message) {
                    $this->flash->error($message);
                }
                return;
            }

            if ( !$league->save() ) {
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

        $form = new LeagueEditForm($curr_league, null);
        $this->view->form = $form;
        $this->view->curr_league_id = (int)$league_id;

        if ( $this->request->isPost() ) {
            if ( !$form->isValid( $this->request->getPost() )) {
                foreach ($form->getMessages() as $message) {
                    $this->flash->error($message);
                }
                return;
            }

            $curr_league->setNameLeague( $this->request->getPost('name_league', 'string') );
            $curr_league->setCountryId( $this->request->getPost('country_id', 'int') );
            $curr_league->setSportKindId( $this->request->getPost('sport_kind_id', 'int') );

            if ( !$curr_league->update() ) {
                foreach ($curr_league->getMessages() as $message) {
                    $this->flash->error($message);
                }
                return;
            } else {
                $this->flash->success('Лига успешно изменёна!');
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
            if ( $curr_league->delete()) {
                $this->flash->success('Данная лига удалёна');
                $this->forward('league/index');
            }
        } else {
            $this->flash->error('Лига с данным ID не найдена');
        }
    }
}