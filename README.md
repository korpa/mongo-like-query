
This library queries php arrays in a mongoDB like style. Currently this lib is very limited but more functionality will be added when needed.


# 1. Installation #
## 1.1 Composer ##

Prepare composer.json

```
{
    "require": {
    	"mongo-like-query/mongo-like-query" : "0.1.*@beta"
    }
}
```

# 2. Usage #
``` php
$array = array( array('name' => 'Max', 'age' => '25'),
	array('name' => 'Steve', 'age' => '25'),
	array('name' => 'Peter', 'age' => '46'),
	array('name' => 'John', 'age' => '30'),
	array('name' => 'Max', 'age' => '27'),
	);


$people = new \MongoLikeQuery\MongoLikeQuery($array);

//Currently a very limited set of conditions are supported:
print_r($people->find('{ "age": { "$in": [ "25", "30" ] } }'));
print_r($people->find('{ "age": { "$in": [ "25" ] }, "name" : "Max" }'));
print_r($people->find('{ "age": "30", "name" : "Max" }'));
print_r($people->find('{ "age": "30", "name" : "John" }'));
print_r($people->find('{ "name" : "Max" }'));

```