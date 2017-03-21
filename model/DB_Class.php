<?php

class DB
{
    var $_dbConn = 0;
    var $_queryResource = 0;

    function connect_db($host, $user, $pwd, $dbname)
    {
        $dbConn = mysqli_connect($host, $user, $pwd, $dbname);
        if (! $dbConn)
            die ("MySQL Connect Error");
        mysqli_set_charset($dbConn,"utf8");;
        $this->_dbConn = $dbConn;
        return true;
    }

    function query($sql)
    {
        if (! $queryResource = mysqli_query($this->_dbConn,$sql))
            die ("MySQL Query Error");
        $this->_queryResource = $queryResource;
        return $queryResource;
    }

    function select($field,$table,$query)
    {
        if($query==null){
            $query = '1';
        }
        if (! $queryResource = mysqli_query($this->_dbConn,"SELECT $field FROM $table WHERE $query"))
            die ("MySQL Query Error");
        $this->_queryResource = $queryResource;
        return $queryResource;
    }

    function select_all($table,$query)
    {
        if($query==null){
            $query = '1';
        }
        if (! $queryResource = mysqli_query($this->_dbConn,"SELECT * FROM $table WHERE $query"))
            die ("MySQL Query Error");
        $this->_queryResource = $queryResource;
        return $queryResource;
    }

    function insert($table,$query1,$query2)
    {
        if (! $queryResource = mysqli_query($this->_dbConn,"INSERT INTO $table ($query1) VALUES ($query2)"))
            $this->_queryResource = $queryResource;
        return $queryResource;
    }

    function update($table,$query1,$query2)
    {
        if (! $queryResource = mysqli_query($this->_dbConn,"UPDATE $table SET $query1 WHERE $query2"))
        $this->_queryResource = $queryResource;
        return $queryResource;
    }

    function delete($table,$query)
    {
        if (! $queryResource = mysqli_query($this->_dbConn,"DELETE FROM $table WHERE $query"))
            $this->_queryResource = $queryResource;
        return $queryResource;
    }

    /** Get array return by MySQL */
    function fetch_array()
    {
        return mysqli_fetch_array($this->_queryResource);
    }

    function get_num_rows()
    {
        return mysql_num_rows($this->_queryResource);
    }

    /** Get the cuurent id */
    function get_insert_id()
    {
        return mysqli_insert_id($this->_dbConn);
    }
}
