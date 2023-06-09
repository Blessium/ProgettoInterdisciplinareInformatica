<?php
    include __DIR__ . "/pagina.php";
    class Database {
        private string $db_name = "AppleDB";
        private string $username = "blessium";
        private string $servername = "localhost";
        private string $password = "blessium";
        private mysqli $database;
        private static $db = null;

        public function __construct() {
            $this->database = new mysqli($this->servername, $this->username, $this->password);
            if ($this->database->connect_error) {
                die("Database error");
            }
            $query_db_init = "CREATE DATABASE IF NOT EXISTS " . $this->db_name;
            if ($this->database->query($query_db_init) == false) {
                die("Database error");
            }

            $this->database->select_db($this->db_name);
            
            $page_table = "CREATE TABLE IF NOT EXISTS pagine (
                id INT PRIMARY KEY NOT NULL,
                title VARCHAR(255) NOT NULL
            )";

            if ($this->database->query($page_table) == false) {
                die("Database error");
            }

            $titoli_table = "CREATE TABLE IF NOT EXISTS titoli (
                id INT PRIMARY KEY NOT NULL,
                id_pagina INT NOT NULL,
                testo VARCHAR(255) NOT NULL,
                testo_eng VARCHAR(255) NOT NULL,
                FOREIGN KEY (id_pagina) REFERENCES pagine(id)
            )";

            if ($this->database->query($titoli_table) == false) {
                die("Database error");
            }
            
            $paragrafi_table = "CREATE TABLE IF NOT EXISTS paragrafi (
                id INT PRIMARY KEY NOT NULL,
                id_titolo INT NOT NULL,
                testo TEXT NOT NULL,
                testo_eng TEXT NOT NULL,
                FOREIGN KEY (id_titolo) REFERENCES titoli(id)
            )";

            if ($this->database->query($paragrafi_table) == false) {
                die("Database error");
            }

            
            $image_table = "CREATE TABLE IF NOT EXISTS immagini(
                id INT PRIMARY KEY NOT NULL,
                id_titolo INT NOT NULL,
                filename TEXT NOT NULL,
                FOREIGN KEY (id_titolo) REFERENCES titoli(id)
            )";

            if ($this->database->query($image_table) == false) {
                die("Database error");
            }
        }

        static function get_sigleton() {
            if (self::$db == null) {
                self::$db = new Database();
            }
            return self::$db;
        }

        function getPageInfo($page_name, $lang) {
            $page = new Pagina();
            $query = "SELECT t.testo, p.testo, i.filename FROM paragrafi p, pagine p2, titoli t, immagini i WHERE p.id_titolo = t.id AND t.id_pagina = p2.id AND i.id_titolo = t.id AND p2.title = '$page_name'";
            if ($lang == "english") {
                $query = "SELECT t.testo_eng, p.testo_eng, i.filename FROM paragrafi p, pagine p2, titoli t, immagini i WHERE p.id_titolo = t.id AND t.id_pagina = p2.id AND i.id_titolo = t.id AND p2.title = '$page_name'";
            }
            $result = $this->database->query($query);
            $values = $result->fetch_all();
            
            for ($i = 0; $i < sizeof($values); $i++) {
                $row = $values[$i];
                $layer = new Layer($row[0], $row[1], $row[2]);
                $page->addLayer($layer);
            }
            return $page;
        }
    }
?>