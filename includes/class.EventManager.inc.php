<?php

class EventManager
{
	public $events = array();

	public function __construct($args)
	{
		foreach($args as $key => $value)
		{
			$this->key = $value;
		}

		$this->getListeners();

		$this->events = array(
			'store_law' => array(
				array('JSONExport', 'storeLaw'),
				array('TextExport', 'storeLaw'),
				array('XMLExport', 'storeLaw'),
				array('USLMExport', 'storeLaw')
			)
		);
	}

	/*
	 * Refreshes all listeners.
	 */
	public function getListeners()
	{
		// Purge previous listeners
		$this->events = array();

		// TODO: query the db.
		$listeners = array();

		foreach($listeners as $listener)
		{
			$this->registerListener($listener->name, $listener->method);
		}
	}

	public function registerListener($name, $method)
	{
		if(!isset($this->events[$name]))
		{
			$this->events[$name] = array();
		}
		$this->events[$name][] = $method;
	}

	 public function trigger($name, &$args)
	{
		if(isset($this->events[$name]))
		{
			foreach($this->events[$name] as $listener)
			{
				$this->callListener($listener, $args);
			}
		}
	}

	public function callListener($listener, &$args = array())
	{
		// Simplest possible implementation:
		// * calls a listener function
		// * passes in a variable number of arguments.
		// * those arguments are expanded in the listener function.
		// TODO: Handle objects more better.

		if(is_array($listener))
		{
			if(is_object($listener[0]))
			{
				list($class, $method) = $listener;
			}
			else
			{
				list($classname, $method) = $listener;
				$class = new $classname();
			}

			call_user_func_array(array($class, $method), $args);
		}
		else
		{
			call_user_func_array($listener, $args);
		}
	}

	public function has($name)
	{
		if(!isset($this->events[$name]))
		{
			return FALSE;
		}
		return count($this->events[$name]);
	}
}
