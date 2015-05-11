<?php

class AccountModel extends BaseModel {

    public function register( $username, $password, $email ) {
        $statement = self::$db->prepare("SELECT COUNT(Id) FROM Users WHERE Username = ?");
        $statement->bind_param("s", $username);
        $statement->execute();
        $result = $statement->get_result()->fetch_assoc();

        if( $result['COUNT(Id)'] ) {
            return false;
        }

        //$hash_pass = password_hash($password, PASSWORD_BCRYPT);

        $registerStatement = self::$db->prepare("INSERT INTO Users (Username, Password, Email) VALUES (?, ?, ?)");
        $registerStatement->bind_param("sss", $username, $password, $email);
        $registerStatement->execute();
        return true;
    }

    public function login( $username, $password) {
        $statement = self::$db->prepare("SELECT Id, username, password FROM Users WHERE Username = ?");
        $statement->bind_param( "s", $username );
        $statement->execute();
        $result = $statement->get_result()->fetch_assoc();

        // TODO: pass must be encrypted
//        if( password_verify($password, $result['password'])  ) {
//            return true;
//        }

        if( $password == $result['password'] ) {
            return true;
        }

        return false;
    }
}