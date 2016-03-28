<?php

class MatchstatController extends ControllerBase {
	public function IndexAction() {
		$matchstats = $this->db->query("
				SELECT
				`match_stat`.`id`,
				`match_stat`.`match_id`,
				`hometeam`.`name_team` AS `home_team_name`,
				`guestteam`.`name_team` AS `guest_team_name`,
				`season`.`name_season` AS `season_name`,
				`league`.`name_league` AS `league_name`,
				`league`.`id` AS `league_id`,
				`sport_kind`.`name` AS `sport_kind_name`,
				`sport_kind`.`id` AS `sport_kind_id`,
				`match_stat`.`value`,
				`parametrs`.`name_param` AS `parametrs_name`
				FROM `match_stat`
				LEFT JOIN `match` ON `match_stat`.`match_id` = `match`.`id`
				LEFT JOIN `team` AS `hometeam` ON `match`.`home_team_id` = `hometeam`.`id`
				LEFT JOIN `team` AS `guestteam` ON `match`.`guest_team_id` = `guestteam`.`id`
				LEFT JOIN `season` ON `match`.`season_id` = `season`.`id`
				LEFT JOIN `league` ON `match`.`league_id` = `league`.`id`
				LEFT JOIN `sport_kind` ON `match_stat`.`match_league_kind_sport_id` = `sport_kind`.`id`
				LEFT JOIN `param_sports` ON `match_stat`.`param_sports_id` = `param_sports`.`id`
				LEFT JOIN `parametrs` ON `param_sports`.`parametrs_id` = `parametrs`.`id`
				")->fetchAll();
		if ( $matchstats == null ) {
			$this->flash->error('Статистика матчей не добавлена.');
		} else {
			$this->view->matchstats = $matchstats;
		}
	}
}