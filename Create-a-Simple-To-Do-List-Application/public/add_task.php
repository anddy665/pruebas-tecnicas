<?php
class AddTask
{
    public function addingTask()
    {
        require_once '../config.php';
        if (isset($_POST['add'])) {
            if ($_POST['task'] != "") {
                $task = $_POST['task'];

                $addtasks = mysqli_query(
                    $db,
                    "INSERT INTO `task` VALUES('', '$task', 'Pending')"
                )
                    or
                    die(mysqli_error($db));
                header('location:index.php');
            }
        }
    }
}

$task = new AddTask();
$task->addingTask();
