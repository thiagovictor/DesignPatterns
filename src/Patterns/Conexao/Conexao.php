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

    /* unlink('empresa.db');
      $db = new SQLite3('empresa.db');

      $db->exec('CREATE TABLE cartegoria (id INTEGER AUTO_INCREMENT, descricao STRING)');
      $db->exec("INSERT INTO cartegoria (descricao) VALUES ('Limpeza')");
      $db->exec("INSERT INTO cartegoria (descricao) VALUES ('Higiene')");
      $db->exec("INSERT INTO cartegoria (descricao) VALUES ('Perfumaria')");

      $results = $db->query('SELECT descricao FROM cartegoria');
      while ($row = $results->fetchArray()) {
      foreach($row as $chave => $valor){
      if($chave == "cartegoria"){
      echo $valor;
      }
      }
      } */
}
