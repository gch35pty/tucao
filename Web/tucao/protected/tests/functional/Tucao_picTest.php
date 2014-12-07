<?php

class Tucao_picTest extends WebTestCase
{
	public $fixtures=array(
		'tucao_pics'=>'Tucao_pic',
	);

	public function testShow()
	{
		$this->open('?r=tucao_pic/view&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=tucao_pic/create');
	}

	public function testUpdate()
	{
		$this->open('?r=tucao_pic/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=tucao_pic/view&id=1');
	}

	public function testList()
	{
		$this->open('?r=tucao_pic/index');
	}

	public function testAdmin()
	{
		$this->open('?r=tucao_pic/admin');
	}
}
