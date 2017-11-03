<?php
namespace Model;

/**
 * This class includes methods for models.
 *
 * @abstract
 */

abstract class Model extends \Dframe\Model {


    public function count($whereObject){

        $query = $this->baseClass->db->prepareQuery("SELECT COUNT(*) AS `count` FROM `$this->tableName`");
        $query->prepareWhere($whereObject);

        $row = $this->baseClass->db->pdoQuery($query->getQuery(), $query->getParams())->result();
        return $row['count'];
    }

    public function get($start, $limit, $whereObject, $order = 'id', $sort = 'DESC'){

        $query = $this->baseClass->db->prepareQuery("SELECT * FROM `$this->tableName`");
        $query->prepareWhere($whereObject);
        $query->prepareOrder($order, $sort);
        $query->prepareLimit($limit, $start);

        $results = $this->baseClass->db->pdoQuery($query->getQuery(), $query->getParams())->results();

        return $this->methodResult(true, array('data' => $results));
    }
}