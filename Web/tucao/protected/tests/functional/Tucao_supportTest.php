<?php

class Tucao_supportTest extends WebTestCase
{
	public $fixtures=array(
		'tucao_supports'=>'Tucao_support',
	);

	public function testShow()
	{
		$this->open('?r=tucao_support/view&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=tucao_support/create');
	}

	public function testUpdate()
	{
		$this->open('?r=tucao_support/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=tucao_support/view&id=1');
	}

	public function testList()
	{
		$this->open('?r=tucao_support/index');
	}

	public function testAdmin()
	{
		$this->open('?r=tucao_support/admin');
	}
}
