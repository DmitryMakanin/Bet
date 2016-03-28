<?php

class MatchController extends ControllerBase {
    public function IndexAction() {
        $matches = $this->db->query("SELECT
match.id AS `match_id`,
`team_home`.name_team as `home_team_name`,
`team_guest`.name_team as `guest_team_name`,
`season`.`name_season` as `season_name`,
`league`.`name_league` as `league_name`,
`sport_kind`.`name` as `kind_name`,
`dt_start`, `dt_end`
FROM `match`
LEFT JOIN `team` as `team_home` ON (`match`.`home_team_id` = `team_home`.`id`)
LEFT JOIN `team` as `team_guest` ON (`match`.`guest_team_id` = `team_guest`.`id`)
LEFT JOIN `season` ON `season`.`id` = match.season_id
LEFT JOIN `league` ON `league`.`id` = match.league_id
LEFT JOIN `sport_kind` on `sport_kind`.`id` = match.league_kind_sport_id")->fetchAll();

        if ($matches == null) {
            $this->flash->error('Матчи не добавлены!');
        }
        else {
            $this->view->matches = $matches;
        }

    }

    public function AddAction() {
        $form = new MatchEditForm();
        $this->view->form = new MatchEditForm();

        if ($this->request->isPost()) {

            if (!$form->isValid($this->request->getPost())) {
                foreach ($form->getMessages() as $message) {
                    $this->flash->error($message);
                }
                return;
            }

            $match = new Match();
            $match->setHomeTeamId($this->request->getPost('home_team_id', 'int'));
            $match->setGuestTeamId($this->request->getPost('guest_team_id', 'int'));
            $match->setSeasonId($this->request->getPost('season_id', 'int'));
            $match->setLeagueId($this->request->getPost('league_id', 'int'));
            $match->setLeagueKindSportId($this->request->getPost('league_kind_of_sport_id', 'int'));
            $match->setDtStart($this->request->getPost('dt_start', 'string'));
            $match->setDtEnd($this->request->getPost('dt_end', 'string'));

            if ( !$match->create() ) {
                foreach ($match->getMessages() as $message) {
                    $this->flash->error($message);
                }
                return;
            }

            $this->flash->success('Добавление успешно!');
            $this->forward('match/index');
        }
    }

    public function EditAction($match_id = null)
    {
        if ($match_id == null && !$this->request->isPost()) {
            $this->forward('match/index');
            return;
        }

        if ($match_id == null && $this->request->isPost()) {
            $match_id = $this->request->getPost('curr_match_id', 'int');
        }

        $curr_match = Match::findFirst((int)$match_id);

        if (!$curr_match) {
            $this->flash->error('Данный матч не найден!');
            $this->forward('match/index');
            return;
        }

        $form = new MatchEditForm($curr_match, null);
        $this->view->form = $form;
        $this->view->curr_match_id = (int)$match_id;

        if ($this->request->isPost()) {
            if (!$form->isValid($this->request->getPost() )) {
                foreach ($form->getMessages() as $message) {
                    $this->flash->error($message);
                }
                return;
            }

            $curr_match->setHomeTeamId($this->request->getPost('home_team_id', 'int'));
            $curr_match->setGuestTeamId($this->request->getPost('guest_team_id', 'int'));
            $curr_match->setSeasonId($this->request->getPost('season_id', 'int'));
            $curr_match->setLeagueId($this->request->getPost('league_id', 'int'));
            $curr_match->setLeagueKindSportId($this->request->getPost('league_kind_of_sport_id', 'int'));
            $curr_match->setDtStart($this->request->getPost('dt_start', 'string'));
            $curr_match->setDtEnd($this->request->getPost('dt_end', 'string'));

            if (!$curr_match->update()) {
                foreach ($curr_match->getMessages() as $message) {
                    $this->flash->error($message);
                }
                return;
            } else {
                $this->flash->success('Матч успешно изменен!');
                $this->forward('match/index');
            }
        }
    }

    public function DeleteAction($match_id = null) {
        if ($match_id == null) {
        $this->forward('match/index');
        return;
        }

        $curr_match = Match::findFirst((int)$match_id);
        if ($curr_match) {
            if ($curr_match->delete()) {
                $this->flash->success('Данный матч удален');
                $this->forward('match/index');
            }
        } else {
            $this->flash->error('Данный матч не найден');
        }
    }
}