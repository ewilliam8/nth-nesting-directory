<?php

require 'config/Connect_db.php';


class Database
{
    private $connect;

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

        return $this->connect;
    }

    public function select($table, $rows = '*', $where = null, $order = null)
    {
        $q = 'SELECT '.$rows.' FROM '.$table;
        if($where != null)
            $q .= ' WHERE '.$where;
        if($order != null)
            $q .= ' ORDER BY '.$order;

        $query = $this->connect->query($q);

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

    public function create($table, $values, $rows = null)
    {
        if($this->tableExists($table)) {
            $insert = 'INSERT INTO `'.$table.'`';
            if($rows != null)
            {
                $insert .= ' ('.$rows.')';
            }

            for($i = 0; $i < count($values); $i++)
            {
                if(is_string($values[$i]))
                    $values[$i] = "'".$values[$i]."'";
            }
            $values = implode(',',$values);
            $insert .= ' VALUES ('.$values.');';

            if ($this->connect->query($insert)) {
//                echo "New record created successfully";
            } else {
                echo "Error: " . $insert . "<br>" . mysqli_error($this->connect);
            }
        }
    }

    public function delete($table, $where = null)
    {
        if($this->tableExists($table)) {
            if($where == null) {
                $delete = 'DELETE '.$table;
            } else {
                $delete = 'DELETE FROM '.$table.' WHERE '.$where;
            }
            @mysqli_query($this->connect, $delete);

        } else {
            return false;
        }
    }

    public function update($table, $rows, $where, $condition)
    {
        if($this->tableExists($table)) {
            for($i = 0; $i < count($where); $i++)
            {
                if($i % 2 != 0) {
                    if(is_string($where[$i])) {
                        if(($i+1) != null) {
                            //$where[$i] = '"'.$where[$i].'" AND ';
                        }
                        else
                            $where[$i] = '"'.$where[$i].'"';
                    }
                }
            }
            $where = implode($condition, $where);

            $update = 'UPDATE '.$table.' SET ';
            $keys = array_keys($rows);
            for($i = 0; $i < count($rows); $i++)
            {
                if(is_string($rows[$keys[$i]])) {
                    $update .= $keys[$i].'="'.$rows[$keys[$i]].'"';
                } else {
                    $update .= $keys[$i].'='.$rows[$keys[$i]];
                }

                if($i != count($rows) - 1) {
                    $update .= ',';
                }
            }
            $update .= ' WHERE '.$where;

            @mysqli_query($this->connect, $update);
        }
    }

    private function tableExists($table)
    {
        $tablesInDb = mysqli_query($this->connect, 'SHOW TABLES FROM '.Connect_db::$db_name.' LIKE "'.$table.'"');
        if($tablesInDb) {
            if(mysqli_num_rows($tablesInDb)==1) {
                return true;
            } else {
                return false;
            }
        }
    }
}