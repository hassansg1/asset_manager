<?php

/**
 * This file is part of the Nette Framework (https://nette.org)
 * Copyright (c) 2004 David Grudl (https://davidgrudl.com)
 */

declare(strict_types=1);

namespace Nette;


/**
 * Static class.
 */
trait StaticClass
{
<<<<<<< HEAD
	/** @throws \Error */
=======
	/**
	 * @return never
	 * @throws \Error
	 */
>>>>>>> a87ae57077b7139b6995c4c9ca2338f0c6b91d35
	final public function __construct()
	{
		throw new \Error('Class ' . static::class . ' is static and cannot be instantiated.');
	}


	/**
	 * Call to undefined static method.
	 * @return void
	 * @throws MemberAccessException
	 */
	public static function __callStatic(string $name, array $args)
	{
		Utils\ObjectHelpers::strictStaticCall(static::class, $name);
	}
}
