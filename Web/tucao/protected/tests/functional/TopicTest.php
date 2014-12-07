<?php

class TopicTest extends WebTestCase
{
	public $fixtures=array(
		'topics'=>'Topic',
	);

	public function testShow()
	{
		$this->open('?r=topic/view&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=topic/create');
	}

	public function testUpdate()
	{
		$this->open('?r=topic/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=topic/view&id=1');
	}

	public function testList()
	{
		$this->open('?r=topic/index');
	}

	public function testAdmin()
	{
		$this->open('?r=topic/admin');
	}
}
