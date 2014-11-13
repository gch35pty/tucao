<?php

class tc_tucaoTest extends WebTestCase
{
	public $fixtures=array(
		'tc_tucaos'=>'tc_tucao',
	);

	public function testShow()
	{
		$this->open('?r=tc_tucao/view&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=tc_tucao/create');
	}

	public function testUpdate()
	{
		$this->open('?r=tc_tucao/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=tc_tucao/view&id=1');
	}

	public function testList()
	{
		$this->open('?r=tc_tucao/index');
	}

	public function testAdmin()
	{
		$this->open('?r=tc_tucao/admin');
	}
}
