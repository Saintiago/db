<?php
	
	require "predis/autoload.php";
	Predis\Autoloader::register();

	define("KEY", "poll");

	function AddParticipant($name)
	{
		$participantExists = RedisConnection::getInstance()->hexists(KEY, $name);
		if (!$participantExists)
		{
			RedisConnection::getInstance()->hset(KEY, $name, 0);
		}
	}

	function RemoveParticipant($name)
	{
		RedisConnection::getInstance()->hdel(KEY, $name);
	}

	function GetParticipants()
	{
		$participants = RedisConnection::getInstance()->hgetall(KEY);
		arsort($participants);
		return $participants;
	}

	function VoteUp($name)
	{
		RedisConnection::getInstance()->hincrby(KEY, $name, 1);
	}

	function VoteDown($name)
	{
		$votes = RedisConnection::getInstance()->hget(KEY, $name);
		if ($votes > 0)
		{
			RedisConnection::getInstance()->hincrby(KEY, $name, -1);
		}
	}

	class RedisConnection
	{
	    private static $instance;
	    
	    public static function getInstance()
	    {
	        if (null === static::$instance) 
	        {
	            static::$instance = new Predis\Client();
	        }

	        return static::$instance;
	    }

	    private function __construct() {}
	    private function __clone() {}
	    private function __wakeup() {}
	}