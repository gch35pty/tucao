<?php

class Tucao_commentTest extends WebTestCase
{
	public $fixtures=array(
		'tucao_comments'=>'Tucao_comment',
	);

	public function testShow()
	{
		$this->open('?r=tucao_comment/view&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=tucao_comment/create');
	}

	public function testUpdate()
	{
		$this->open('?r=tucao_comment/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=tucao_comment/view&id=1');
	}

	public function testList()
	{
		$this->open('?r=tucao_comment/index');
	}

	public function testAdmin()
	{
		$this->open('?r=tucao_comment/admin');
	}
}
