<?php

namespace MyBooks\Domain;

class Comment 
{
    /**
     * author id.
     *
     * @var integer
     */
    private $id;

    /**
     * author first name.
     *
     * @var string
     */
    private $auth_first_name;
	
	/**
     * author last name.
     *
     * @var string
     */
    private $auth_last_name;
	
	/**
     * author book_isbn.
     *
     * @var string
     */
    private $book_isbn;

    /**
     * author summary.
     *
     * @var integer
     */
    private $book_summary;

    /**
     * Associated book.
     *
     * @var \MyBooks\Domain\Book
     */
    private $book;

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getFirstName() {
        return $this->FirstName;
    }

    public function setFirstName($auth_first_name) {
        $this->FirstName = $auth_first_name;
    }
	
	public function getLastName() {
        return $this->LastName;
    }

    public function setlastName($auth_last_name) {
        $this->LastName = $auth_last_name;
    }
	
	public function getISBN() {
        return $this->ISBN;
    }

    public function setISBN($book_isbn) {
        $this->ISBN = $book_isbn;
    }
	
	public function getSummary() {
        return $this->Summary;
    }
	
	public function setSummary($book_summary) {
        $this->Summary = $book_summary;
    }

    public function getLivre() {
        return $this->Livre;
    }

    public function setLivre(Livre $Livre) {
        $this->Livre = $Livre;
    }
}