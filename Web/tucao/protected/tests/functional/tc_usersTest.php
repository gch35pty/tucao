<?php

class tc_usersTest extends WebTestCase
{
	public $fixtures=array(
		'tc_users'=>'tc_users',
	);

	public function testShow()
	{
		$this->open('?r=tc_users/view&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=tc_users/create');
	}

	public function testUpdate()
	{
		$this->open('?r=tc_users/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=tc_users/view&id=1');
	}

	public function testList()
	{
		$this->open('?r=tc_users/index');
	}

	public function testAdmin()
	{
		$this->open('?r=tc_users/admin');
	}
}
