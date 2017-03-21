<?php
global $_DB;
$_DB['host'] = "127.0.0.1";
$_DB['username'] = "root";
$_DB['password'] = "root";
$_DB['dbname'] = "test";

class Dbsql
{
    var $_dbConn = 0;
    var $_queryResource = 0;

    public function __construct()
    {
        $db = new Dbsql();
        $db->connect_db($_DB['host'], $_DB['username'], $_DB['password'], $_DB['dbname']);
    }

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

    public function select($table, $query)
    {
        if($query==null){

            $query = '1';
        }
        try {

            $ = mysqli_query($this->_dbConn,'SELECT * FROM '.$table.' WHERE '.$query);
        } catch (PDOException $e) {
            ErrorC::showErrorC('0');
        }
        die ("MySQL Query Error");
        $this->_queryResource = $queryResource;
        return $queryResource;
    }

    public function insert($table, $query1, $query2, $array)
    {
        try {
            $stmt = $this->db->prepare('INSERT INTO '.$table.' ('.$query1.') VALUES ('.$query2.')');
            $aa=$stmt->execute($array);
            return $aa;
        } catch (PDOException $e) {
            ErrorC::showErrorC('0');
        }
    }
    public function update($table, $query1, $query2, $array)
    {
        try {
            $stmt = $this->db->prepare('UPDATE '.$table.' SET '.$query1.' WHERE '.$query2);
            $aa=$stmt->execute($array);
            return $aa;

        } catch (PDOException $e) {
            ErrorC::showErrorC('0');
        }
    }

    public function del($table, $query)
    {
        try {
            $stmt=$this->db->prepare('DELETE FROM '.$table.' WHERE '.$query);
            $aa=$stmt->execute();
            return $aa;
        } catch (PDOException $e) {
            ErrorC::showErrorC('0');
        }
    }
}
