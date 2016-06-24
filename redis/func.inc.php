<?php
	
	require 'predis/autoload.php';
	Predis\Autoloader::register();

	define('KEY', 'poll');

	function AddParticipant($name)
	{
		RedisConnection::getInstance()->zincrby(KEY, 0, $name);
	}

	function RemoveParticipant($name)
	{
		RedisConnection::getInstance()->zrem(KEY, $name);
	}

	function GetParticipants()
	{
		return RedisConnection::getInstance()->zrevrange(KEY, 0, -1, 'WITHSCORES');
	}

	function VoteUp($name)
	{
		RedisConnection::getInstance()->zincrby(KEY, 1, $name);
	}

	function VoteDown($name)
	{
		$votes = RedisConnection::getInstance()->zscore(KEY, $name);
		if ($votes > 0)
		{
			RedisConnection::getInstance()->zincrby(KEY, -1, $name);
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