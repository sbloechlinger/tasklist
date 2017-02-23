<?php


class DBTaskLoader
{


    public function getTasks()
    {
        $statement = DB::get()->prepare("SELECT * FROM task WHERE id BETWEEN :start AND :end");
        $statement->execute(array(':start' => 0, ':end' => 100));
        $data = $statement->fetchAll(PDO::FETCH_CLASS, "Task");

        return $data;
    }

    public function getTaskdetails($id)
    {
        $statement = DB::get()->prepare("SELECT * FROM task WHERE id = :id");
        $statement->execute(array(':id' => $id));
        $statement->setFetchMode(PDO::FETCH_CLASS, "Task");
        $data = $statement->fetch();

        return $data;
    }


    public function deleteTask($id)
    {
        $statement = DB::get()->prepare("DELETE FROM task WHERE id = :id");
        $statement->execute(array(':id' => $id));
        $num = $statement->rowCount();

        if ($num > 0) {
            return true;
        } else {
            return false;
        }

        /* return $num > 0 ;

        als Altenative zu:

            if ($num > 0) {
                    return true;
                } else {
                    return false;
                }
        */

    }


}



