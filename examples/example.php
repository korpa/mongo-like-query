<?php

include_once('../src/MongoLikeQuery/MongoLikeQuery.php');


$array = array( array('name' => 'Max', 'age' => '25'),
	array('name' => 'Steve', 'age' => '25'),
	array('name' => 'Peter', 'age' => '46'),
	array('name' => 'John', 'age' => '30'),
	array('name' => 'Max', 'age' => '27'),
	);


$actions = new \MongoLikeQuery\MongoLikeQuery($array);

print_r($actions->find('{ "age": { "$in": [ "25", "30" ] } }'));
print_r($actions->find('{ "age": { "$in": [ "25" ] }, "name" : "Max" }'));
print_r($actions->find('{ "age": "30", "name" : "Max" }'));
print_r($actions->find('{ "age": "30", "name" : "John" }'));
print_r($actions->find('{ "name" : "Max" }'));
