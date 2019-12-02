<?php

class ORM {
    private $table;
    public $pdo;

    public function __construct() {
        $this->table = get_called_class();
        $this->pdo = new PDO("mysql:hostname=".host.";dbname=".dbname."", ''.username.'', ''.password.'' , [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    }

    public function Insert($data, $table = '') {
        $q = "INSERT INTO " . ($table == '' ? $this->table : $table) . " (".implode(',', array_keys($data)).") VALUES (:".implode(', :', array_keys($data)).")";

        $this->Execute($q, $data);
    }

    public function Update($data, $where, $table = '') {
        $q = "UPDATE " . ($table == '' ? $this->table : $table) . " SET ";
        $i = 0;

        foreach($data as $v => $d) {
            $q .= " $v = :$v ";

            if(++$i < count($data))
                $q .= ", ";
        }

        $q .= " $where";

        $this->Execute($q, $data);
    }

    public function Delete($where, $table = '') {
        $q = "DELETE FROM " . ($table == '' ? $this->table : $table) . " $where";

        $this->Execute($q);
    }

    public function Select($col, $one = '', $two = '') {
        $q1 = "SELECT COUNT(*) total FROM $this->table $one";
        $q2 = "SELECT $col FROM $this->table $one $two";

        $p1 = $this->pdo->prepare($q1);
        $p2 = $this->pdo->prepare($q2);
        $p1->execute();
        $p2->execute();

        $d1 = $p1->fetchAll(PDO::FETCH_ASSOC)[0]['total'];
        $d2 = $p2->fetchAll(PDO::FETCH_ASSOC);

        return [$d1, $d2];
    }

    public function CustomQuery($q) {
        $this->Execute($q);
    }

    public function CustomSelect($q) {
        $p = $this->pdo->prepare($q);
        $p->execute();
        $d = $p->fetchAll(PDO::FETCH_ASSOC);

        return $d;
    }

    public function Execute($q, $data = []) {
        $p = $this->pdo->prepare($q);
        $p->execute($data);
    }
}