<?php 

$q = new SplQueue();
$q->setIteratorMode(SplQueue::IT_MODE_DELETE);

foreach ($q as $task) {
    $q[] = $newTask;
}


$q = new SplQueue();
$q->push("This is a task");
$q->push("The next Task");
$q->push("The last one");
$q->pop();
print_r($q);


$str  =  strlen($q[1]);
var_dump($str);
var_dump($q[1]);


