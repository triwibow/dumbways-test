<?php
    // require('../config/conn.php');
    $conn = mysqli_connect('localhost', 'root', '', 'dumbways_db');

    function getData($query) {
        global $conn;

        $data = mysqli_query($conn, $query);

        $rows = [];

        while($row = mysqli_fetch_array($data)){
            $rows[] = $row;
        }

        return $rows;
    }

    function getDataById($id) {
        global $conn;

        $query = "SELECT * FROM book_tb WHERE id = $id";
        $data = mysqli_query($conn, $query);

        $rows = [];

        while($row = mysqli_fetch_assoc($data)){
            $rows[] = $row;
        }

        return $rows;
    }

    function upload($img) {
        $nameFile = $img["name"];
        $tmpName = $img["tmp_name"];
        $error = $img["error"];
        $validExtension = ["jpg", "jpeg", "png"];
        $extension = explode('.', $nameFile);
        $extension = strtolower(end($extension));

        if($error === 4){
            echo "
                <script>
                    alert('pilih gambar terlebih dahulu');
                </script>
            ";

            return false;
        }

        if(!in_array($extension, $validExtension)){
            echo "
                <script>
                    alert('masukan gambar valid berektensi jpg, jpeg, png');
                </script>
            ";

            return false;
        }


        $newfileName = uniqid();
        $newfileName .= '.';
        $newfileName .= $extension;

        move_uploaded_file($tmpName, 'assets/img/'.$newfileName);

        return $newfileName;


    }

    function addData($data){
        global $conn;

        $name = $data["name"];
        $category_id = $data["category_id"];
        $writer_id = $data["writer_id"];
        $publication_year = $data["Publication_year"];
        $img = upload($_FILES["img"]);

        if(!$img){
            return false;
        }

        $query = "INSERT INTO `book_tb` (`id`, `name`, `category_id`, `writer_id`, `Publication_year`, `img`) 
                    VALUES (
                            NULL,
                            '$name',
                            '$category_id',
                            '$writer_id',
                            '$publication_year',
                            '$img'
                            )";
        mysqli_query($conn, $query);
        return mysqli_affected_rows($conn);

    }

    function editData($data){
        global $conn;

        $id = $data["id"];
        $name = $data["name"];
        $category_id = $data["category_id"];
        $writer_id = $data["writer_id"];
        $publication_year = $data["Publication_year"];

        $query = "UPDATE `book_tb` SET 
            `name` = '$name',
             `category_id` = '$category_id', 
            `writer_id` = '$writer_id', 
            `Publication_year` = '$publication_year'
          WHERE `book_tb`.`id` = $id";
        mysqli_query($conn, $query);
        return mysqli_affected_rows($conn);
    }

    function addCategory($data){
        global $conn;

        $name = $data["name"];
        $query = "INSERT INTO `category_tb` (`id`, `name`) VALUES (NULL, '$name')";

        mysqli_query($conn, $query);

        return mysqli_affected_rows($conn);
    }

    function addWriter($data){
        global $conn;

        $name = $data["name"];
        $query = "INSERT INTO `writer_tb` (`id`, `name`) VALUES (NULL, '$name')";

        mysqli_query($conn, $query);

        return mysqli_affected_rows($conn);
    }

    function delete($id) {
        global $conn;

        $query = "DELETE FROM book_tb WHERE id = '$id'";

        mysqli_query($conn, $query);
        return mysqli_affected_rows($conn);
    }

   
?>