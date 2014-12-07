<?php

class ShareTest extends WebTestCase
{
	public $fixtures=array(
		'shares'=>'Share',
	);

	public function testShow()
	{
		$this->open('?r=share/view&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=share/create');
	}

	public function testUpdate()
	{
		$this->open('?r=share/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=share/view&id=1');
	}

	public function testList()
	{
		$this->open('?r=share/index');
	}

	public function testAdmin()
	{
		$this->open('?r=share/admin');
	}
}
