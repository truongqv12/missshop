<?php

class Database {

    protected $link;

    public function __construct() {
        $this->link = mysqli_connect("localhost", "root", "", "doan") or die("ket noi khong thanh cong");
        mysqli_set_charset($this->link, "utf8");
    }

    public function insert($table, array $data) {
        //code
        $sql = "INSERT INTO {$table} ";
        $columns = implode(',', array_keys($data));
        $values = "";
        $sql .= '(' . $columns . ')';
        foreach ($data as $field => $value) {
            if (is_string($value)) {
                $values .= "'" . mysqli_real_escape_string($this->link, $value) . "',";
            } else {
                $values .= mysqli_real_escape_string($this->link, $value) . ',';
            }
        }
        $values = substr($values, 0, -1);
        $sql .= " VALUES (" . $values . ')';
        // _debug($sql);die;
        mysqli_query($this->link, $sql) or die("Lỗi  query  insert ----" . mysqli_error($this->link));

        return mysqli_insert_id($this->link);
    }

    public function update($name, $slug, $id) {
        $sql = "UPDATE Categories SET name = '$name', slug = '$slug' WHERE ID = $id";
        return  mysqli_query($this->link, $sql);
    }

    public function updateview($sql) {
        $result = mysqli_query($this->link, $sql) or die("Lỗi update view " . mysqli_error($this->link));
        return mysqli_affected_rows($this->link);
    }

    public function countTable($table) {
        $sql = "SELECT id FROM  {$table}";
        $result = mysqli_query($this->link, $sql) or die("Lỗi Truy Vấn countTable----" . mysqli_error($this->link));
        $num = mysqli_num_rows($result);
        return $num;
    }

    public function count_sql($sql) {
        $result = mysqli_query($this->link, $sql);
        $num = mysqli_num_rows($result);
        return  $num;
    }
    /**
     * [delete description] hàm delete
     * @param  $table      [description]
     * @param  array  $conditions [description]
     * @return integer             [description]
     */
    public function delete($table, $id) {
        $sql = "DELETE FROM {$table} WHERE id = $id ";

        mysqli_query($this->link, $sql) or die(" Lỗi Truy Vấn delete   --- " . mysqli_error($this->link));
        return mysqli_affected_rows($this->link);
    }

    /**
     * delete array 
     */
    public function deletewhere($table, $data = array()) {
        foreach ($data as $id) {
            $id = intval($id);
            $sql = "DELETE FROM {$table} WHERE id = $id ";
            mysqli_query($this->link, $sql) or die(" Lỗi Truy Vấn delete   --- " . mysqli_error($this->link));
        }
        return true;
    }

    public function fetchsql($sql) {
        $result = mysqli_query($this->link, $sql) or die("Lỗi  truy vấn sql " . mysqli_error($this->link));
        $data = [];
        if ($result) {
            while ($num = mysqli_fetch_assoc($result)) {
                $data[] = $num;
            }
        }
        return $data;
    }

    public function fetchID($table, $id) {
        $sql = "SELECT * FROM {$table} WHERE id = $id ";
        $result = mysqli_query($this->link, $sql) or die("Lỗi  truy vấn fetchID " . mysqli_error($this->link));
        return mysqli_fetch_assoc($result);
    }

    public function fetchOne($table, $query) {
        $sql = "SELECT * FROM {$table} WHERE ";
        $sql .= $query;
        $sql .= "LIMIT 1";
        $result = mysqli_query($this->link, $sql) or die("Lỗi  truy vấn fetchOne " . mysqli_error($this->link));
        return mysqli_fetch_assoc($result);
    }

    public function deletesql($table, $sql) {
        $sql = "DELETE FROM {$table} WHERE " . $sql;
        // _debug($sql);die;
        mysqli_query($this->link, $sql) or die(" Lỗi Truy Vấn delete   --- " . mysqli_error($this->link));
        return mysqli_affected_rows($this->link);
    }

    public function fetchAll($table) {
        $sql = "SELECT * FROM {$table} WHERE 1";
        $result = mysqli_query($this->link, $sql) or die("Lỗi Truy Vấn fetchAll " . mysqli_error($this->link));
        $data = [];
        if ($result) {
            while ($num = mysqli_fetch_assoc($result)) {
                $data[] = $num;
            }
        }
        return $data;
    }

    public function fetchJones($table, $sql, $total = 1, $page, $row, $pagi = true) {

        $data = [];

        if ($pagi == true) {
            $sotrang = ceil($total / $row);
            $start = ($page - 1 ) * $row;
            $sql .= " LIMIT $start,$row ";
            $data = [ "page" => $sotrang];
            $result = mysqli_query($this->link, $sql) or die("Lỗi truy vấn fetchJone ---- " . mysqli_error($this->link));
        } else {
            $result = mysqli_query($this->link, $sql) or die("Lỗi truy vấn fetchJone ---- " . mysqli_error($this->link));
        }

        if ($result) {
            while ($num = mysqli_fetch_assoc($result)) {
                $data[] = $num;
            }
        }

        return $data;
    }

    public function fetchJone($table, $sql, $page = 0, $row, $pagi = false) {

        $data = [];
        // _debug($sql);die;
        if ($pagi == true) {
            $total = $this->countTable($table);
            $sotrang = ceil($total / $row);
            $start = ($page - 1 ) * $row;
            $sql .= " LIMIT $start,$row";
            $data = [ "page" => $sotrang];

            $result = mysqli_query($this->link, $sql) or die("Lỗi truy vấn fetchJone ---- " . mysqli_error($this->link));
        } else {
            $result = mysqli_query($this->link, $sql) or die("Lỗi truy vấn fetchJone ---- " . mysqli_error($this->link));
        }

        if ($result) {
            while ($num = mysqli_fetch_assoc($result)) {
                $data[] = $num;
            }
        }
        // _debug($data);
        return $data;
    }

    public function fetchJoneDetail($table, $sql, $page = 0, $total, $pagi) {
        $result = mysqli_query($this->link, $sql) or die("Lỗi truy vấn fetchJone ---- " . mysqli_error($this->link));

        $sotrang = ceil($total / $pagi);
        $start = ($page - 1 ) * $pagi;
        $sql .= " LIMIT $start,$pagi";

        $result = mysqli_query($this->link, $sql);
        $data = [];
        $data = [ "page" => $sotrang];
        if ($result) {
            while ($num = mysqli_fetch_assoc($result)) {
                $data[] = $num;
            }
        }
        return $data;
    }

    public function total($sql) {
        $result = mysqli_query($this->link, $sql);
        $tien = mysqli_fetch_assoc($result);
        return $tien;
    }

   public function count_parentid($id)
   {
        $sql = "SELECT * FROM  Categories WHERE parent_id = $id";
        $result = mysqli_query($this->link, $sql);
        $count = mysqli_num_rows($result);
        return $count;
   }

   public function update_slide($name, $image, $id) {
        $sql = "UPDATE slides SET name = '$name', image = '$image' WHERE id = $id";
        return  mysqli_query($this->link, $sql);
    }

    public function insert_img_pro($link, $pro_id)
    {
        $sql = "INSERT INTO pro_img(links, 	pro_id) VALUES ('$link', $pro_id)";
        return  mysqli_query($this->link, $sql);
    }

    public function update_status($table,$status,$id) {
        $sql = "UPDATE {$table} SET status = $status WHERE id = $id";
        return  mysqli_query($this->link, $sql);
    }

    public function query($sql)
    {
        return mysqli_query($this->link, $sql);
    }
}