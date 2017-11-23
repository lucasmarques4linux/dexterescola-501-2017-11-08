<?php 

namespace DAO\PeriodoDAO;

use DAO\Conexao\Conexao;
use PDO;
use Model\Periodo\Periodo;

class PeriodoDAO
{
	private $con = null;

	public function __construct(){
		$this->con = Conexao::getInstance();
	}

	public function all(){

		$prepare = $this->con->query("SELECT * FROM tb_periodos ORDER BY id");
		$prepare->execute();

		$result = $prepare->fetchAll(PDO::FETCH_ASSOC);

		$periodos = [];
		foreach ($result as $item) {			
			 $periodos[] = new Periodo($item['id'],$item['descricao']);
		}

		return $periodos;
	}

	public function insert(Periodo $periodo){
		$sql = "INSERT INTO tb_periodos (descricao) VALUES (:descricao)";

		try {
			$descricao = $periodo->getDescricao();
			$this->con->beginTransaction();
			$stmt = $this->con->prepare($sql);
			$stmt->bindValue(":descricao", $descricao);

			$stmt->execute();

			$this->con->commit();	
		} catch (PDOException $e) {
			$this->con->rollback();
			die($e->getMessage);
		}
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
		} catch (PDOException $e) {
			$this->con->rollback();
			die($e->getMessage);
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
		} catch (PDOException $e) {
			$this->con->rollback();
			die($e->getMessage);
		}
	}

	public function find($id){
		$sql = "SELECT * FROM tb_periodos WHERE id = :id";

		$stmt = $this->con->prepare($sql);
		$stmt->bindParam(":id", $id);

		$stmt->execute();
		$result = $stmt->fetch(PDO::FETCH_ASSOC);

		return new Periodo($result['id'],$result['descricao']);
	}
}