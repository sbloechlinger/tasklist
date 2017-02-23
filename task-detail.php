<?php

require_once "init.php";

// var_dump($_GET);

//wenn keine taskid mitgegeben wird, stelle ich die taskliste wieder dar
if (empty($_GET['taskid']) || !is_numeric($_GET['taskid'])) {
    require "taskliste.php";

    //stoppe die ausgabe hier
    exit();
}

// wenn ich hier ankomme bin ich sicher, dass eine nummer in diesem GET parameter drin ist (siehe oben)
$taskid = $_GET['taskid'];

$dbTaskLoader = new DBTaskLoader();


// frage den task loader nach dem task mit der id aus der GET parameter
$task = $dbTaskLoader->getTaskdetails($taskid);

//wenn kein task mit dieser taskid gefunden wurde...
if ($task == null) {
    require "taskliste.php";

    //stoppe die ausgabe hier
    exit();
}

// var_dump($task);


/**
 * Hilfsfunktion für das formatieren von einem datum
 *
 * @param $date string datum
 * @param $target_format string zielformat des datums
 */
function formatDate($date, $target_format = 'd.m.Y')
{
    $dateTime = new DateTime($date);
    return $dateTime->format($target_format);
}

?>

<h1><?php echo $task->getTitle(); ?></h1>
<p>
    ID: <?php echo $task->getId(); ?> <br/>
    User ID: <?php echo $task->getUserId(); ?> <br/>
    Status ID: <?php echo $task->getStatusId(); ?> <br/>
    Beschreibung: <?php echo $task->getDescription(); ?> <br/>
    Fälligkeitsdatum: <?php echo formatDate($task->getDuedate()); ?> <br/>
    Erstellt am: <?php echo formatDate($task->getCreated()); ?> <br/>
    Zuletzt bearbeitet am: <?php echo formatDate($task->getUpdated()); ?> <br/>
</p>
<p>
    <a href="taskliste.php">&lt;-- zurück zur taskliste</a>
</p>

<!-- $author_id = $_GET['author_id']; $authorname = $_GET['authorname']; -->