<?php

class tc_tucao_commentTest extends WebTestCase
{
	public $fixtures=array(
		'tc_tucao_comments'=>'tc_tucao_comment',
	);

	public function testShow()
	{
		$this->open('?r=tc_tucao_comment/view&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=tc_tucao_comment/create');
	}

	public function testUpdate()
	{
		$this->open('?r=tc_tucao_comment/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=tc_tucao_comment/view&id=1');
	}

	public function testList()
	{
		$this->open('?r=tc_tucao_comment/index');
	}

	public function testAdmin()
	{
		$this->open('?r=tc_tucao_comment/admin');
	}
}
