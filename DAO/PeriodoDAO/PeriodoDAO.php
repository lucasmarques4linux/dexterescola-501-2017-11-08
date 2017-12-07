<?php 

namespace DAO\PeriodoDAO;

use DAO\Conexao\Conexao;
use PDO;
use Model\Periodo\Periodo;
use PDOException;
use DAO\Sql\Sql;


class PeriodoDAO extends Sql
{

	private $con = null;

	public function __construct(){
		$this->con = Conexao::getInstance();
	}

	public function allPeriodos(){

		$result = $this->all("tb_periodos");

		$periodos = [];
		foreach ($result as $item) {			
			 $periodo = new Periodo();
			 $periodo->setId($item['id']);
			 $periodo->setDescricao($item['descricao']);
			 $periodos[] = $periodo;
		}

		return $periodos;
	}

	public function insertPeriodo(Periodo $periodo){
		// $sql = "INSERT INTO tb_periodos (descricao) VALUES (:descricao)";

		// strip_tags($periodo->getDescricao());
		// trim($periodo->getDescricao());

		// try {
		// 	$descricao = $periodo->getDescricao();
		// 	$this->con->beginTransaction();
		// 	$stmt = $this->con->prepare($sql);
		// 	$stmt->bindValue(":descricao", $descricao);

		// 	$stmt->execute();

		// 	$this->con->commit();	
		// 	$_SESSION['sucesso'] = "Salvo Com Sucesso";
		// } catch (PDOException $e) {
		// 	$this->con->rollback();
		// 	// $this->log("Erro -> {$e->getMessage()}") ;
		// 	$_SESSION['erro'] = "Erro ao Atualizar Periodo";
		// }

		$this->insert("tb_periodos",["descricao" => $periodo->getDescricao()]);
	}

	public function update(Periodo $periodo){
		$sql = "UPDATE tb_periodos SET descricao = :descricao WHERE id = :id";

		try {
			$descricao = $periodo->getDescricao();
			$id = $periodo->getId();
			$this->con->beginTransaction();
			$stmt = $this->con->prepare($sql);
			$stmt->bindParam(":descricao", $descricao);
			$stmt->bindParam(":id", $id);

			$stmt->execute();

			$this->con->commit();
			$_SESSION['sucesso'] = "Atualizado Com Sucesso";	
		} catch (PDOException $e) {
			$this->con->rollback();
			// $this->log("Erro -> {$e->getMessage()}") ;
			$_SESSION['erro'] = "Erro ao Atualizar Periodo";
		}
	}

	public function delete(Periodo $periodo){
		$sql = "DELETE FROM tb_periodos WHERE id = :id";

		try {
			$id = $periodo->getId();
			$this->con->beginTransaction();
			$stmt = $this->con->prepare($sql);
			$stmt->bindParam(":id", $id);

			$stmt->execute();

			$this->con->commit();
			$_SESSION['sucesso'] = "Excluido Com Sucesso";	
		} catch (PDOException $e) {
			$this->con->rollback();
			// $this->log("Erro -> {$e->getMessage()}") ;
			$_SESSION['erro'] = "Erro ao Excluir Periodo";
		}
	}

	public function find($id){
		$sql = "SELECT * FROM tb_periodos WHERE id = :id";

		$stmt = $this->con->prepare($sql);
		$stmt->bindParam(":id", $id);

		$stmt->execute();
		$result = $stmt->fetch(PDO::FETCH_ASSOC);

		 $periodo = new Periodo();
		 $periodo->setId($result['id']);
		 $periodo->setDescricao($result['descricao']);

		return $periodo;
	}
}