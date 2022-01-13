<?php

    class Database {
        public static function connect() {
            $db = mysqli_connect(
                'localhost',
                'root',
                '',
                'blogMusica'
            );
            $db->query("SET NAMES 'utf8'");
            return $db;
        }
    }

?>