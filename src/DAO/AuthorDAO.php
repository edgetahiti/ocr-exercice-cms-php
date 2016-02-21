<?php

namespace MyBooks\DAO;

use MyBooks\Domain\Comment;

class CommentDAO extends DAO 
{
    /**
     * @var \MyBooks\DAO\LivreDAO
     */
    private $LivreDAO;

    public function setLivreDAO(LivreDAO $LivreDAO) {
        $this->LivreDAO = $LivreDAO;
    }

    /**
     * Return a list of all comments for an Livre, sorted by date (most recent last).
     *
     * @param integer $LivreId The Livre id.
     *
     * @return array A list of all comments for the Livre.
     */
    public function findAllByLivre($LivreId) {
        // The associated Livre is retrieved only once
        $Livre = $this->LivreDAO->find($LivreId);

        // art_id is not selected by the SQL query
        // The Livre won't be retrieved during domain objet construction
        $sql = "select auth.auth_id as author_id,auth_first_name,auth_last_name,book_isbn,book_summary from author auth inner join book bk on bk.auth_id = auth.auth_id where book_id=? order by auth_id";
        $result = $this->getDb()->fetchAll($sql, array($LivreId));

        // Convert query result to an array of domain objects
        $comments = array();
        foreach ($result as $row) {
            $autId = $row['author_id'];
            $author = $this->buildDomainObject($row);
            // The associated Livre is defined for the constructed author
            $author->setLivre($Livre);
            $authors[$autId] = $author;
        }
        return $authors;
    }

    /**
     * Creates an Author object based on a DB row.
     *
     * @param array $row The DB row containing Author data.
     * @return \MyBooks\Domain\Comment
     */
    protected function buildDomainObject($row) {
        $author = new Comment();
        $author->setId($row['author_id']);
        $author->setFirstName($row['auth_first_name']);
		$author->setLastName($row['auth_last_name']);
		$author->setISBN($row['book_isbn']);
        $author->setSummary($row['book_summary']);

        if (array_key_exists('book_id', $row)) {
            // Find and set the associated Livre
            $LivreId = $row['book_id'];
            $Livre = $this->LivreDAO->find($LivreId);
            $author->setLivre($Livre);
        }
        
        return $author;
    }
}