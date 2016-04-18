<?php

/**
 * Created by PhpStorm.
 * User: Darya Busel
 * Date: 22.03.2016
 * Time: 00:55
 */
class SeasonController extends ControllerBase
{
    public function IndexAction() {

        $seasons = Season::find();
        if ( $seasons == null ) {
            $this->flash->error('Страны не добавлены.');
        } else {
            $this->view->seasons = $seasons;
        }

        /*$seasons = Season::find(['hydration' => \Phalcon\Mvc\Model\Resultset::HYDRATE_RECORDS]);
        if ( $seasons == null ) {
            $this->flash->error('Сезоны не добавлены.');
        } else {
            $seasons_array = array();
            foreach ($seasons as $season) {
                if ($season->getStatus() == 'N') {
                    array_push($seasons_array, $season);
                }
            }
            $this->view->seasons = $seasons_array;
        }*/
    }

    public function AddAction() {
        $form = new SeasonEditForm();
        $this->view->form = new SeasonEditForm();

        if ( $this->request->isPost() ) {
            $season = new Season();
            $season->setNameSeason( $this->request->getPost('name_season', 'string') );
            $season->setLeagueId( $this->request->getPost('league_id', 'int') );
            $season->setLeagueSportKindId( $this->request->getPost('league_sport_kind_id', 'int') );

            if ( !$form->isValid( $this->request->getPost() )) {
                foreach ($form->getMessages() as $message) {
                    $this->flash->error($message);
                }
                return;
            }

            if ( !$season->save() ) {
                foreach ($season->getMessages() as $message) {
                    $this->flash->error($message);
                }
                return;
            } else {
                $this->flash->success('Сезон успешно добавлен!');
                $this->forward('season/index');
            }
        }
    }

    public function EditAction( $season_id = null ) {
        if ( $season_id == null && !$this->request->isPost() ) {
            $this->forward('season/index');
            return;
        }

        if ( $season_id == null && $this->request->isPost() ) {
            $season_id = $this->request->getPost('curr_season_id', 'int');
        }

        $curr_season = Season::findFirst( (int)$season_id );

        if ( !$curr_season ) {
            $this->flash->error('Данный сезон не найден!');
            $this->forward('season/index');
            return;
        }

        $form = new SeasonEditForm($curr_season, null);
        $this->view->form = $form;
        $this->view->curr_season_id = (int)$season_id;

        if ( $this->request->isPost() ) {
            if ( !$form->isValid( $this->request->getPost() )) {
                foreach ($form->getMessages() as $message) {
                    $this->flash->error($message);
                }
                return;
            }

            $curr_season->setNameSeason( $this->request->getPost('name_season', 'string') );
            $curr_season->setLeagueId( $this->request->getPost('league_id', 'int') );
            $curr_season->setLeagueSportKindId( $this->request->getPost('league_sport_kind_id', 'int') );

            if ( !$curr_season->update() ) {
                foreach ($curr_season->getMessages() as $message) {
                    $this->flash->error($message);
                }
                return;
            } else {
                $this->flash->success('Сезон успешно изменён!');
                $this->forward('season/index');
            }
        }
    }

    public function DeleteAction() {
        /*if ( $season_id == null ) {
            $this->forward('season/index');
            return;
        }

        $curr_season = Season::findFirst( (int)$season_id );
        if ( $curr_season ) {
            if ( $curr_season->delete() ) {
                $this->flash->success('Данный сезон удалён');
                $this->forward('season/index');
            }
        } else {
            $this->flash->error('Сезон с данным ID не найден');
        }*/

        $curr_act = $this->request->get('act', 'string');
        $curr_season_id = (int)$_GET['season_id'];

        if ($curr_act == '' || $curr_season_id == '') {
            $this->flash->error('Неккоректный запрос');
            $this->forward('season/index');
            return;
        }

        $curr_season = Season::findFirst($curr_season_id);
        if ($curr_season) {
            switch ($curr_act) {
                case 'hide':
                    $curr_season->setState('hidden');
                    break;
                case 'delete':
                    $curr_season->setState('deleted');
                    break;
                case 'restore':
                    $curr_season->setState('non_deleted');
                    break;
                default:
                    $this->flash->error('Некорректный запрос!');
                    return;
                    break;
            }

            if ($curr_season->save()) {
                $this->flash->success('Данный матч обновлен!');
                $this->forward('season/index');
            }

        } else {
            $this->flash->error('Данный матч не найден');
        }
    }
}