<?php

namespace MongoLikeQuery;

class MongoLikeQuery {

	private $inventory;

	public function __construct($inventory) {
		$this->inventory = $inventory;
	}

	public function find($statement) {

		$s = json_decode($statement,true);

		return array_filter($this->inventory, function($data) use ($s) {


			$return = true;
			foreach ($s as $key => $sub) {

				//Check if key exists
				if (array_key_exists($key, $data)) {
					$sub = $s[$key];

					//If sub = array => check for known conditions
					if (is_array($sub)) {
						//check for conditions
						$condition = key($sub);
						if ($condition == '$in') {
							if (in_array($data[$key], $sub[$condition])) {
								$return = true;
							} else {
								return false;
							}
						}
					} else {

						if ($data[$key] == $sub) {
							$return = true;
						} else {
							return false;
						}
					}
				}
			}
			return $return;
		});


	}

}