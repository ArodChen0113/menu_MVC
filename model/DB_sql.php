<?php
//namespace model;



class Dbsql
{
    private $con;
    public function __construct()
    {
        require_once("DB_config.php");
        require_once("DB_Class.php");
        $con = new DB();
        $con->connect_db($_DB['host'], $_DB['username'], $_DB['password'], $_DB['dbname']);
    }

    public function select($table, $query)
    {
        if($query==null){

            $query = '1';
        }
        try {
            $result = $this->db->query('SELECT * FROM '.$table.' WHERE '.$query);
        } catch (PDOException $e) {
            ErrorC::showErrorC('0');
        }
        return $result;
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