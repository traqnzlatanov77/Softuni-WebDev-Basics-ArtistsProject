<?php

class SongsModel extends BaseModel {

    public function getAll() {

        $statement = self::$db->query("SELECT * FROM songs ORDER BY id");
        return $statement->fetch_all(MYSQL_ASSOC);
    }

    public function createSong( $artist, $name, $duration, $genres_id, $blob_data ) {
        if( $name == '' || $genres_id == '' || $artist == '' || $duration == '') {
            return false;
        }

        $statement = self::$db->prepare(
            "INSERT INTO songs VALUES(NULL, ?, ?, ?, ?, ?)");

        $statement->bind_param("sssis", $artist, $name, $duration, $genres_id, $blob_data);
        $statement->execute();
        return $statement->affected_rows > 0;
    }

    public function getGenres() {
        $statement = self::$db->query("SELECT * FROM genres");
        return $statement;
    }

    public function deleteSong( $id ) {

        $statement = self::$db->prepare(
            "DELETE FROM songs WHERE id = ?");

        $statement->bind_param("i", $id);
        $statement->execute();
        return $statement->affected_rows >0;
    }

    public function getSongLocation( $id ) {
//        $statement = self::$db->prepare(
//            "SELECT blob_data FROM songs WHERE id = ?");
//
//        $statement->bind_param("i", $id);
        $statement = self::$db->query("SELECT blob_data FROM songs WHERE id = {$id}");
//        $statement->execute();
        return $statement;
    }

    public function rank( $id, $value ) {
//        $statement = self::$db->prepare(
//            "UPDATE songs SET Rank = '?' WHERE id = ?");
//
//        $statement->bind_param("ii",$id, $value);
//        $statement->execute();

        $statement = self::$db->query("UPDATE songs SET Rank = '{$value}' WHERE id = {$id}");

        return $statement->affected_rows > 0;
    }

    public  function getRank ( $id ) {
//        $statement = self::$db->prepare(
//            "SELECT Rank FROM songs WHERE id = ?");
//
//        $statement->bind_param("i", $id);
//        $statement->execute();
        $statement = self::$db->query("SELECT Rank FROM songs WHERE id = {$id}");
        return $statement->fetch_assoc();
    }
}