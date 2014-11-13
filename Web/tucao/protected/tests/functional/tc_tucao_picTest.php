<?php

class tc_tucao_picTest extends WebTestCase
{
	public $fixtures=array(
		'tc_tucao_pics'=>'tc_tucao_pic',
	);

	public function testShow()
	{
		$this->open('?r=tc_tucao_pic/view&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=tc_tucao_pic/create');
	}

	public function testUpdate()
	{
		$this->open('?r=tc_tucao_pic/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=tc_tucao_pic/view&id=1');
	}

	public function testList()
	{
		$this->open('?r=tc_tucao_pic/index');
	}

	public function testAdmin()
	{
		$this->open('?r=tc_tucao_pic/admin');
	}
}
