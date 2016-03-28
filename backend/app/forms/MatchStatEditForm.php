<?php

class MatchStatEditForm extends \Phalcon\Forms\Form {
	public function initialize( $entity = null, $options = array() ) {
		$matches = $this->db->query("SELECT
`match_stat`.`match_id`,
`hometeam`.`name_team` AS `home_team_name`,
`guestteam`.`name_team` AS `guest_team_name`,
`season`.`name_season` AS `season_name`,
`league`.`name_league` AS `league_name`,
`dt_start`,
`dt_end`
FROM `match_stat`
LEFT JOIN `match` ON `match_stat`.`match_id` = `match`.`id`
LEFT JOIN `team` AS `hometeam` ON `match`.`home_team_id` = `hometeam`.`id`
LEFT JOIN `team` AS `guestteam` ON `match`.`guest_team_id` = `guestteam`.`id`
LEFT JOIN `season` ON `match`.`season_id` = `season`.`id`
LEFT JOIN `league` ON `match`.`league_id` = `league`.`id`")->fetchAll();
		
		$match_id = new \Phalcon\Forms\Element\Select('match_id', $matches, array(
				'using' => array('match_id', 'home_team_name'),
				'useEmpty' => true,
				'emptyText' => '...выберите вид спорта...',
				'emptyValue' => '',
				'class' => 'form-control'	
		));
	}
}