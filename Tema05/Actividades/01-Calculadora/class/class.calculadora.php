<?php

class Calculadora
{
	private $dato1;
	private $dato2;
	private $operacion;
	private $total;

	//------------------------------------------
	// Constructor
	public function __construct()
	{
		$this->dato1 = 0;
		$this->dato2 = 0;
		$this->operacion = null;
		$this->total = null;
	}

	//------------------------------------------

	//------------------------------------------
	// Setters
	public function getDato1()
	{
		return $this->dato1;
	}


	public function setDato1($dato1)
	{
		$this->dato1 = $dato1;
		return $this;
	}

	//Getter
	public function getDato2()
	{
		return $this->dato2;
	}


	public function setDato2($dato2)
	{
		$this->dato2 = $dato2;
		return $this;
	}


	public function getOperacion()
	{
		return $this->operacion;
	}


	public function setOperacion($operacion)
	{
		$this-> operacion = $operacion;
		return $this;
	}


	public function getTotal()
	{
		return $this->total;
	}

	public function setTotal($total)
	{
		$this -> total = $total;
		return $this;
	}

	//------------------------------------------
	// Operaciones de nuestra calculadora 
	public function suma()
	{
		$this -> total = $this->dato1 + $this->dato2;
	}

	public function resta()
	{
		$this -> total = $this->dato1 - $this->dato2;
	}

	public function multiplicacion()
	{
		$this -> total = $this->dato1 * $this->dato2;
	}

	public function division()
	{
		$this-> total = $this-> dato1 / $this-> dato2;
	}

}

?>