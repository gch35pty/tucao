<?php

class comment_supportTest extends WebTestCase
{
	public $fixtures=array(
		'comment_supports'=>'comment_support',
	);

	public function testShow()
	{
		$this->open('?r=comment_support/view&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=comment_support/create');
	}

	public function testUpdate()
	{
		$this->open('?r=comment_support/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=comment_support/view&id=1');
	}

	public function testList()
	{
		$this->open('?r=comment_support/index');
	}

	public function testAdmin()
	{
		$this->open('?r=comment_support/admin');
	}
}
