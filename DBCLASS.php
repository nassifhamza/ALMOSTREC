<?php   


class DBH{



    public function DATABASE()
    {
        try {
            $connect = new PDO("mysql:host=localhost;dbname=clients;port=3306;charset=utf8", "root", "", array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        return $connect;
    }


}

?>