<?php

class tc_shareTest extends WebTestCase
{
	public $fixtures=array(
		'tc_shares'=>'tc_share',
	);

	public function testShow()
	{
		$this->open('?r=tc_share/view&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=tc_share/create');
	}

	public function testUpdate()
	{
		$this->open('?r=tc_share/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=tc_share/view&id=1');
	}

	public function testList()
	{
		$this->open('?r=tc_share/index');
	}

	public function testAdmin()
	{
		$this->open('?r=tc_share/admin');
	}
}
