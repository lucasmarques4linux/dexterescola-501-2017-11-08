<?php 

namespace DAO\Sql;

use DAO\Conexao\Conexao;
use PDO;
use PDOException;

class Sql
{
	public function all($table){
		$con = Conexao::getInstance();

		$sql = "SELECT * FROM {$table} ORDER BY id";

		$prepare = $con->query($sql);
		$prepare->execute();

		$result = $prepare->fetchAll(PDO::FETCH_ASSOC);

		return $result;
	}

	public function insert($table, array $dados){
		$con = Conexao::getInstance();

		$campos = array_keys($dados);
		$campos = implode(',',$campos);
		$valores = array_keys($dados);
		$valores = implode(',:',$valores);

		$sql = "INSERT INTO {$table} ({$campos}) VALUES (:{$valores})";

		try {

			$con->beginTransaction();
			$stmt = $con->prepare($sql);
			foreach ($dados as $key => $value) {
				$params[":{$key}"] = "$value";
			}
			$stmt->execute($params);
			$con->commit();	
			$_SESSION['sucesso'] = "Salvo Com Sucesso";
		} catch (PDOException $e) {
			$con->rollback();
			// $this->log("Erro -> {$e->getMessage()}") ;
			$_SESSION['erro'] = "Erro ao Inserir";
		}
	}
}