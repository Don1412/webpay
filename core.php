<?php
/**
 * Created by PhpStorm.
 * User: don
 * Date: 26.07.18
 * Time: 23:27
 */

if($_POST)
{
    include "task_1.php";

    $task = new task_1();

    switch($_POST['task'])
    {
        case 'a':
            echo htmlspecialchars($task->a());
            break;
        case 'b'  :
            echo htmlspecialchars($task->b());
            break;
        case 'c'  :
            echo htmlspecialchars($task->c());
            break;
    }
}