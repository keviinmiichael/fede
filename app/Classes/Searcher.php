<?php

namespace App\Classes;

class Searcher {

    private $db;
    private $table;
    private $ids;

    function __construct($host, $database, $user, $password)
    {
        $this->db = new \PDO("mysql:host=$host;dbname=$database;charset=utf8", $user, $password);
        $this->db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }

    public function getIds()
    {
        return $this->ids;
    }

    public function search($keywords, $fields, $table)
    {
        $this->table = $table;
        $keywords = $this->prepareSearch($keywords);
        $this->ids = strstr($keywords, ' ')
                ? $this->multipleSearch($keywords, $fields)
                : $this->simpleSearch($keywords, $fields);
        return $this;
    }

    public function simpleSearch ($keyword, $fields)
    {
        $fields = (is_array($fields))?$fields:array($fields);
        $ids = array(0);
        foreach ($fields as $field) {
            $sql = 'SELECT id FROM '.$this->table.' AS t WHERE t.id NOT IN ('.implode(',', $ids).') AND t.'.$field.' LIKE "%'.$keyword.'%"';
			$query = $this->db->query($sql);
            $result = $query->fetchAll(\PDO::FETCH_COLUMN);
            $result = (is_array($result))?$result:array($result);
            if($result) $ids = array_merge($ids, $result);
        }
        return array_unique($ids);
    }
    
    public function multipleSearch ($keywords, $fields)
    {
        $andLike = ' LIKE "%'.str_replace(' ', '%" AND colum LIKE "%', $keywords).'%"';

        $fields = (is_array($fields))?$fields:array($fields);
        $ids = $this->simpleSearch($keywords, $fields);

        //busqueda con and
        foreach ($fields as $field) {
            $serchTerm = str_replace('colum', 't.'.$field, $andLike);
            $sql = 'SELECT id FROM '.$this->table.' AS t WHERE t.id NOT IN ('.implode(',', $ids).') AND t.'.$field.$serchTerm;
            $query = $this->db->query($sql);
            $result = $query->fetchAll(\PDO::FETCH_COLUMN);
            $result = (is_array($result))?$result:array($result);
            if($result) $ids = array_merge($ids, $result);
        }

        return array_unique($ids);
    }

    public function get()
    {
        $sql = "SELECT * FROM $this->table WHERE id in (".implode(',', $this->ids).") ORDER BY FIND_IN_SET(id, '".implode(',', $this->ids)."')";
        $query = $this->db->query($sql);
        return $query->fetchAll(\PDO::FETCH_OBJECT);
    }

    public function paginate($page=1, $items=10)
    {
        $offset = ($page - 1) * $items;
        $sql = "SELECT * FROM $this->table WHERE id in (".implode(',', $this->ids).") ORDER BY FIND_IN_SET(id, '".implode(',', $this->ids)."') LIMIT $items OFFSET $offset";
        $query = $this->db->query($sql);
        return $query->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function count()
    {
        return count($this->ids)-1;
    }

    private function prepareSearch ($keywords)
    {
        $keywords = strtolower($keywords);
        $keywords = preg_replace('/\b(el|la|los|las|un|una|unos|unas|a|al|de|del|con|por|para|que|en)\b/i', '', $keywords);
        $keywords = preg_replace('/ {2,}/', ' ', $keywords);
        return trim($keywords);
    }
}