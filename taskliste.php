<?php

require_once "init.php";

$dbTaskLoader = new DBTaskLoader();

// tasks aus dem task loader holen
$tasks = $dbTaskLoader->getTasks();


//tasks sortieren (mittels anonyme funktion)
usort($tasks, function ($t1, $t2) {
    return strtotime($t1->getDuedate()) - strtotime($t2->getDuedate());
});

echo "<h1>Taskliste</h1>";
echo "<table cellpadding='5' cellspacing='5'>";
echo "<tr><th>ID</th><th>Title</th><th>Due Date</th></tr>";

foreach ($tasks as $task) {

    $task_id = $task->getId();

    $detail_link = "task-detail.php?taskid=" . $task_id;
    $delete_link = "delete-task.php?taskid=" . $task_id;
    $confirm_javascript = "return confirm(\"Willst du den Task mit der id $task_id wirklich löschen?\")";

    echo "<tr>";
    echo "<td>" . "<a href='$detail_link' >" . $task->getId() . "</a>" . "</td>";
    echo "<td>" . $task->getTitle() . "</td>";
    echo "<td>" . $task->getDuedate() . "</td>";

    echo "<td><a onclick='$confirm_javascript' href='$delete_link' >Löschen <img src='delete.png'/></a></td>";
    echo "</tr>";

}

echo "</table>";


