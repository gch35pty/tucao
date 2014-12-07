<?php

class TucaoTest extends WebTestCase
{
	public $fixtures=array(
		'tucaos'=>'Tucao',
	);

	public function testShow()
	{
		$this->open('?r=tucao/view&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=tucao/create');
	}

	public function testUpdate()
	{
		$this->open('?r=tucao/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=tucao/view&id=1');
	}

	public function testList()
	{
		$this->open('?r=tucao/index');
	}

	public function testAdmin()
	{
		$this->open('?r=tucao/admin');
	}
}
