<?php

namespace MyBooks\DAO;

use MyBooks\Domain\Livre;

class LivreDAO extends DAO
{
    /**
     * Return a list of all livres, sorted by date (most recent first).
     *
     * @return array A list of all livres.
     */
    public function findAll() {
        $sql = "select * from book order by book_id desc";
        $result = $this->getDb()->fetchAll($sql);

        // Convert query result to an array of domain objects
        $livres = array();
        foreach ($result as $row) {
            $livreId = $row['book_id'];
            $livres[$livreId] = $this->buildDomainObject($row);
        }
        return $livres;
    }

    /**
     * Creates an livre object based on a DB row.
     *
     * @param array $row The DB row containing livre data.
     * @return \MyBooks\Domain\livre
     */
    protected function buildDomainObject($row) {
        $livre = new livre();
        $livre->setId($row['book_id']);
        $livre->setTitle($row['book_title']);
        $livre->setContent($row['book_summary']);
        return $livre;
    }
	 /**
     * Returns an livre matching the supplied id.
     *
     * @param integer $id
     *
     * @return \MyBooks\Domain\livre|throws an exception if no matching livre is found
     */
    public function find($id) {
        $sql = "select * from book where book_id=?";
        $row = $this->getDb()->fetchAssoc($sql, array($id));

        if ($row)
            return $this->buildDomainObject($row);
        else
            throw new \Exception("No book matching id " . $id);
    }
}