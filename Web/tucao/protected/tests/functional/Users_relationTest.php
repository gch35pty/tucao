<?php

class Users_relationTest extends WebTestCase
{
	public $fixtures=array(
		'users_relations'=>'Users_relation',
	);

	public function testShow()
	{
		$this->open('?r=users_relation/view&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=users_relation/create');
	}

	public function testUpdate()
	{
		$this->open('?r=users_relation/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=users_relation/view&id=1');
	}

	public function testList()
	{
		$this->open('?r=users_relation/index');
	}

	public function testAdmin()
	{
		$this->open('?r=users_relation/admin');
	}
}
