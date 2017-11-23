<?php 

namespace Model\Periodo;

use DAO\PeriodoDAO\PeriodoDAO;

class Periodo
{
	private $id;
	private $descricao;

	public function __construct($id,$descricao){
		$this->id = $id;
		$this->descricao = $descricao;
	}

	public function setId($id){
		$this->id = $id;
	}
	public function getId(){
		return $this->id;
	}

	public function setDescricao($descricao){
		$this->descricao = $descricao;
	}
	public function getDescricao(){
		return $this->descricao;
	}

	public function save(){
		$dao = new PeriodoDAO();
		if (is_null($this->id)) {
			$dao->insert($this);
		} else {
			$dao->update($this);
		}
	}
	public function remove(){
		$dao = new PeriodoDAO();
		$dao->delete($this);
	}

	public static function find($id){
		$dao = new PeriodoDAO();
		return $dao->find($id);
	}

	public static function all(){
		$dao = new PeriodoDAO();
		return $dao->all();
	}
}
