<?php

namespace MyBooks\Domain;

class Livre 
{
    /**
     * Livre id.
     *
     * @var integer
     */
    private $id;

    /**
     * Livre title.
     *
     * @var string
     */
    private $title;

    /**
     * Livre summary.
     *
     * @var string
     */
    private $summary;

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getTitle() {
        return $this->title;
    }

    public function setTitle($title) {
        $this->title = $title;
    }

    public function getSummary() {
        return $this->summary;
    }

    public function setSummary($summary) {
        $this->summary = $summary;
    }
}