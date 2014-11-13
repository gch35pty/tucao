<?php

class tc_tucao_supportTest extends WebTestCase
{
	public $fixtures=array(
		'tc_tucao_supports'=>'tc_tucao_support',
	);

	public function testShow()
	{
		$this->open('?r=tc_tucao_support/view&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=tc_tucao_support/create');
	}

	public function testUpdate()
	{
		$this->open('?r=tc_tucao_support/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=tc_tucao_support/view&id=1');
	}

	public function testList()
	{
		$this->open('?r=tc_tucao_support/index');
	}

	public function testAdmin()
	{
		$this->open('?r=tc_tucao_support/admin');
	}
}
