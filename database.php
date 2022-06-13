<?php

require 'config/Connect_db.php';


class Database
{
    private $connect;
    private $result0 = array();

    public function connect ()
    {
        try {
            $this->connect = mysqli_connect(
                Connect_db::$db_host,
                Connect_db::$db_user,
                Connect_db::$db_pass,
                Connect_db::$db_name);
        } catch (Exception $e) {
            exit($e->getMessage());
        }
    }


    public function select($table, $rows = '*', $where = null, $order = null)
    {
        $mysqli = new mysqli(
            Connect_db::$db_host,
            Connect_db::$db_user,
            Connect_db::$db_pass,
            Connect_db::$db_name);

        $q = 'SELECT '.$rows.' FROM '.$table;
        if($where != null)
            $q .= ' WHERE '.$where;
        if($order != null)
            $q .= ' ORDER BY '.$order;

        $query = $mysqli->query($q);

        if($query)
        {
            $this->numResults = mysqli_num_rows($query);
            for($i = 0; $i < $this->numResults; $i++)
            {
                $r = mysqli_fetch_array($query);
                $key = array_keys($r);
                for($x = 0; $x < count($key); $x++)
                {

                    if(!is_int($key[$x]))
                    {
                        if(mysqli_num_rows($query) > 1)
                            $this->result0[$i][$key[$x]] = $r[$key[$x]];
                        else if(mysqli_num_rows($query) < 1)
                            $this->result0 = null;
                        else
                            $this->result0[$key[$x]] = $r[$key[$x]];
                    }
                }
            }
            return $this->result0;
        } else {
            return false;
        }
    }
}