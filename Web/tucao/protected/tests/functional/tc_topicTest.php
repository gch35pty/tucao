<?php

class tc_topicTest extends WebTestCase
{
	public $fixtures=array(
		'tc_topics'=>'tc_topic',
	);

	public function testShow()
	{
		$this->open('?r=tc_topic/view&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=tc_topic/create');
	}

	public function testUpdate()
	{
		$this->open('?r=tc_topic/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=tc_topic/view&id=1');
	}

	public function testList()
	{
		$this->open('?r=tc_topic/index');
	}

	public function testAdmin()
	{
		$this->open('?r=tc_topic/admin');
	}
}
