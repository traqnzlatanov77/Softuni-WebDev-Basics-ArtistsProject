<?php

class GenresModel extends BaseModel {

    public function getAll() {
        $statement = self::$db->query("SELECT * FROM genres ORDER BY id");
        return $statement->fetch_all(MYSQL_ASSOC);
    }
}