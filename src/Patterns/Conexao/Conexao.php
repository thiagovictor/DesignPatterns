<?php

namespace Patterns\Conexao;

class Conexao {

    private $db;

    public function __construct(\SQLite3 $db) {
        $this->db = $db;
    }

    public function getCategorias() {
        $data = [];
        $results = $this->db->query('SELECT id, descricao FROM cartegoria');
        while ($row = $results->fetchArray()) {
            $data[$row["id"]] = $row["descricao"];
        }
        return $data;
    }
}
