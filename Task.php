<?php


class Task {
    private $id;
    private $user_id;
    private $status_id;
    private $title;
    private $description;
    private $duedate;
    private $created;
    private $updated;



    /**
     * @return mixed
     */
    public function getId() {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getUserId() {
        return $this->user_id;
    }

    /**
     * @return mixed
     */
    public function getStatusId() {
        return $this->status_id;
    }

    /**
     * @return mixed
     */
    public function getTitle() {
        return $this->title;
    }

    /**
     * @return mixed
     */
    public function getDescription() {
        return $this->description;
    }

    /**
     * @return mixed
     */
    public function getDuedate() {
        return $this->duedate;
    }

    /**
     * @return mixed
     */
    public function getCreated() {
        return $this->created;
    }

    /**
     * @return mixed
     */
    public function getUpdated() {
        return $this->updated;
    }
}