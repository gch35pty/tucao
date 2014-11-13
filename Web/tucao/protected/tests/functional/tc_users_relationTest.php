<?php

class tc_users_relationTest extends WebTestCase
{
	public $fixtures=array(
		'tc_users_relations'=>'tc_users_relation',
	);

	public function testShow()
	{
		$this->open('?r=tc_users_relation/view&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=tc_users_relation/create');
	}

	public function testUpdate()
	{
		$this->open('?r=tc_users_relation/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=tc_users_relation/view&id=1');
	}

	public function testList()
	{
		$this->open('?r=tc_users_relation/index');
	}

	public function testAdmin()
	{
		$this->open('?r=tc_users_relation/admin');
	}
}
