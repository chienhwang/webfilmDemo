<?php
 class DB_driver{
    public $__conn,
    $localhost = "localhost",
    $user = "root",
    $pass = "",
    $DbName = "webfilm";
    
    function connect()
    {
        // Nếu chưa kết nối thì thực hiện kết nối
        if (!$this->__conn) {
            // Kết nối
            $this->__conn = mysqli_connect($this->localhost, $this->user, $this->pass, $this->DbName) or die('Lỗi kết nối');

            // Xử lý truy vấn UTF8 để tránh lỗi font
            mysqli_query($this->__conn, "SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'");

            mysqli_query($this->__conn, "set names 'utf8'");
            mysqli_set_charset($this->__conn, "utf8");
        }
    }

    function dis_connect()
    {
        // Nếu đang kết nối thì ngắt
        if ($this->__conn) {
            mysqli_close($this->__conn);
        }
    }

    function get_list()
    {    $sql = "SELECT * FROM FILM";
        // Kết nối
        $this->connect();

        $result = mysqli_query($this->__conn, $sql);

        if (!$result) {
            die('Câu truy vấn bị sai ' . $sql);
        }

        $return = array();

        // Lặp qua kết quả để đưa vào mảng
        while ($row = mysqli_fetch_assoc($result)) {
            $return[] = $row;

            
        }

        // Xóa kết quả khỏi bộ nhớ
        mysqli_free_result($result);

        return $return;
    }

    function list_Onetime()
    {    $sql = "SELECT * FROM FILM";
        // Kết nối
        $this->connect();

        $result = mysqli_query($this->__conn, $sql);
        
        return $result;
        $this->dis_connect();
    }

    function get_list_page($itemPerPage,$current)

    {   
        $offset = ($current - 1) * $itemPerPage ;
         $sql = "SELECT * FROM FILM ORDER BY id  ASC LIMIT $itemPerPage OFFSET $offset";
        // Kết nối
        $this->connect();

        $result = mysqli_query($this->__conn, $sql);

        if (!$result) {
            die('Câu truy vấn bị sai ' . $sql);
        }

        $return = array();

        // Lặp qua kết quả để đưa vào mảng
        while ($row = mysqli_fetch_assoc($result)) {
            $return[] = $row;

            
        }

        // Xóa kết quả khỏi bộ nhớ
        mysqli_free_result($result);

        return $return;
    }


    function get_list_bySL()
    {    $sql = "SELECT * FROM FILM Where id > 6";
        // Kết nối
        $this->connect();

        $result = mysqli_query($this->__conn, $sql);

        if (!$result) {
            die('Câu truy vấn bị sai ' . $sql);
        }

        $return = array();

        // Lặp qua kết quả để đưa vào mảng
        while ($row = mysqli_fetch_assoc($result)) {
            $return[] = $row;

            
        }

        // Xóa kết quả khỏi bộ nhớ
        mysqli_free_result($result);

        return $return;
    }


    function get_itemByid()
    {      $sql = "SELECT * FROM `film` where `id`=".$_GET['id'];
        // Kết nối
        $this->connect();

        $result = mysqli_query($this->__conn, $sql);

        if (!$result) {
            die('Câu truy vấn bị sai ' . $sql);
        }

        $return = array();

        // Lặp qua kết quả để đưa vào mảng
        while ($row = mysqli_fetch_assoc($result)) {
            $return[] = $row;

            
        }

        // Xóa kết quả khỏi bộ nhớ
        mysqli_free_result($result);

        return $return;
    }

    function get_listUser()
    {      $sql = "SELECT * FROM `users`";
        // Kết nối
        $this->connect();

        $result = mysqli_query($this->__conn, $sql);

        if (!$result) {
            die('Câu truy vấn bị sai ' . $sql);
        }

        $return = array();

        // Lặp qua kết quả để đưa vào mảng
        while ($row = mysqli_fetch_assoc($result)) {
            $return[] = $row;

            
        }

        // Xóa kết quả khỏi bộ nhớ
        mysqli_free_result($result);

        return $return;
    }

    function insert_user($table, $data)
    {
        // Kết nối
        $this->connect();

        // Lưu trữ danh sách field, (tạm thời chưa cần)
        // $field_list = '';
        // Lưu trữ danh sách giá trị tương ứng với field
        $value_list = '';

        // Lặp qua data
        foreach ($data as $key => $value) {
            // $field_list .= ",$key";
            $value_list .= ",'" . mysqli_escape_string($this->__conn, $value) . "'";
        }

        // Vì sau vòng lặp các biến $field_list và $value_list sẽ thừa một dấu , nên ta sẽ dùng hàm trim để xóa đi
        // $sql = 'INSERT INTO ' . $table . '(' . trim($field_list, ',') . ') VALUES (' . trim($value_list, ',') . ')';
        $sql = 'INSERT INTO ' . $table . ' VALUES (' . trim($value_list, ',') . ')';

        return mysqli_query($this->__conn, $sql);
        //return $sql;
    }
 }

 
?>