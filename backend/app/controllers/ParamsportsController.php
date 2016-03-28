<?php

class ParamsportsController extends ControllerBase {
	public function IndexAction() {
		$param_sports = $this->db->query("
				SELECT 
				`param_sports`.`id`,
				`sport_kind`.`id` AS `sport_kind_id`,
				`sport_kind`.`name` AS `sport_kind_name`,
				`parametrs`.`id` AS `parametrs_id`,
				`parametrs`.`name_param` AS `parametrs_name_param`
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
}