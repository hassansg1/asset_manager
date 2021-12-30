<?php

/**
 * This file is part of the Nette Framework (https://nette.org)
 * Copyright (c) 2004 David Grudl (https://davidgrudl.com)
 */

declare(strict_types=1);

namespace Nette\Utils;

use Nette;


/**
 * File system tool.
 */
final class FileSystem
{
	use Nette\StaticClass;

	/**
	 * Creates a directory if it doesn't exist.
	 * @throws Nette\IOException  on error occurred
	 */
	public static function createDir(string $dir, int $mode = 0777): void
	{
		if (!is_dir($dir) && !@mkdir($dir, $mode, true) && !is_dir($dir)) { // @ - dir may already exist
<<<<<<< HEAD
			throw new Nette\IOException("Unable to create directory '$dir' with mode " . decoct($mode) . '. ' . Helpers::getLastError());
=======
			throw new Nette\IOException(sprintf(
				"Unable to create directory '%s' with mode %s. %s",
				self::normalizePath($dir),
				decoct($mode),
				Helpers::getLastError()
			));
>>>>>>> a87ae57077b7139b6995c4c9ca2338f0c6b91d35
		}
	}


	/**
	 * Copies a file or a directory. Overwrites existing files and directories by default.
	 * @throws Nette\IOException  on error occurred
	 * @throws Nette\InvalidStateException  if $overwrite is set to false and destination already exists
	 */
	public static function copy(string $origin, string $target, bool $overwrite = true): void
	{
		if (stream_is_local($origin) && !file_exists($origin)) {
<<<<<<< HEAD
			throw new Nette\IOException("File or directory '$origin' not found.");

		} elseif (!$overwrite && file_exists($target)) {
			throw new Nette\InvalidStateException("File or directory '$target' already exists.");
=======
			throw new Nette\IOException(sprintf("File or directory '%s' not found.", self::normalizePath($origin)));

		} elseif (!$overwrite && file_exists($target)) {
			throw new Nette\InvalidStateException(sprintf("File or directory '%s' already exists.", self::normalizePath($target)));
>>>>>>> a87ae57077b7139b6995c4c9ca2338f0c6b91d35

		} elseif (is_dir($origin)) {
			static::createDir($target);
			foreach (new \FilesystemIterator($target) as $item) {
				static::delete($item->getPathname());
			}
			foreach ($iterator = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($origin, \RecursiveDirectoryIterator::SKIP_DOTS), \RecursiveIteratorIterator::SELF_FIRST) as $item) {
				if ($item->isDir()) {
					static::createDir($target . '/' . $iterator->getSubPathName());
				} else {
					static::copy($item->getPathname(), $target . '/' . $iterator->getSubPathName());
				}
			}

		} else {
			static::createDir(dirname($target));
			if (
				($s = @fopen($origin, 'rb'))
				&& ($d = @fopen($target, 'wb'))
				&& @stream_copy_to_stream($s, $d) === false
			) { // @ is escalated to exception
<<<<<<< HEAD
				throw new Nette\IOException("Unable to copy file '$origin' to '$target'. " . Helpers::getLastError());
=======
				throw new Nette\IOException(sprintf(
					"Unable to copy file '%s' to '%s'. %s",
					self::normalizePath($origin),
					self::normalizePath($target),
					Helpers::getLastError()
				));
>>>>>>> a87ae57077b7139b6995c4c9ca2338f0c6b91d35
			}
		}
	}


	/**
	 * Deletes a file or directory if exists.
	 * @throws Nette\IOException  on error occurred
	 */
	public static function delete(string $path): void
	{
		if (is_file($path) || is_link($path)) {
			$func = DIRECTORY_SEPARATOR === '\\' && is_dir($path) ? 'rmdir' : 'unlink';
			if (!@$func($path)) { // @ is escalated to exception
<<<<<<< HEAD
				throw new Nette\IOException("Unable to delete '$path'. " . Helpers::getLastError());
=======
				throw new Nette\IOException(sprintf(
					"Unable to delete '%s'. %s",
					self::normalizePath($path),
					Helpers::getLastError()
				));
>>>>>>> a87ae57077b7139b6995c4c9ca2338f0c6b91d35
			}

		} elseif (is_dir($path)) {
			foreach (new \FilesystemIterator($path) as $item) {
				static::delete($item->getPathname());
			}
			if (!@rmdir($path)) { // @ is escalated to exception
<<<<<<< HEAD
				throw new Nette\IOException("Unable to delete directory '$path'. " . Helpers::getLastError());
=======
				throw new Nette\IOException(sprintf(
					"Unable to delete directory '%s'. %s",
					self::normalizePath($path),
					Helpers::getLastError()
				));
>>>>>>> a87ae57077b7139b6995c4c9ca2338f0c6b91d35
			}
		}
	}


	/**
	 * Renames or moves a file or a directory. Overwrites existing files and directories by default.
	 * @throws Nette\IOException  on error occurred
	 * @throws Nette\InvalidStateException  if $overwrite is set to false and destination already exists
	 */
	public static function rename(string $origin, string $target, bool $overwrite = true): void
	{
		if (!$overwrite && file_exists($target)) {
<<<<<<< HEAD
			throw new Nette\InvalidStateException("File or directory '$target' already exists.");

		} elseif (!file_exists($origin)) {
			throw new Nette\IOException("File or directory '$origin' not found.");
=======
			throw new Nette\InvalidStateException(sprintf("File or directory '%s' already exists.", self::normalizePath($target)));

		} elseif (!file_exists($origin)) {
			throw new Nette\IOException(sprintf("File or directory '%s' not found.", self::normalizePath($origin)));
>>>>>>> a87ae57077b7139b6995c4c9ca2338f0c6b91d35

		} else {
			static::createDir(dirname($target));
			if (realpath($origin) !== realpath($target)) {
				static::delete($target);
			}
			if (!@rename($origin, $target)) { // @ is escalated to exception
<<<<<<< HEAD
				throw new Nette\IOException("Unable to rename file or directory '$origin' to '$target'. " . Helpers::getLastError());
=======
				throw new Nette\IOException(sprintf(
					"Unable to rename file or directory '%s' to '%s'. %s",
					self::normalizePath($origin),
					self::normalizePath($target),
					Helpers::getLastError()
				));
>>>>>>> a87ae57077b7139b6995c4c9ca2338f0c6b91d35
			}
		}
	}


	/**
	 * Reads the content of a file.
	 * @throws Nette\IOException  on error occurred
	 */
	public static function read(string $file): string
	{
		$content = @file_get_contents($file); // @ is escalated to exception
		if ($content === false) {
<<<<<<< HEAD
			throw new Nette\IOException("Unable to read file '$file'. " . Helpers::getLastError());
=======
			throw new Nette\IOException(sprintf(
				"Unable to read file '%s'. %s",
				self::normalizePath($file),
				Helpers::getLastError()
			));
>>>>>>> a87ae57077b7139b6995c4c9ca2338f0c6b91d35
		}
		return $content;
	}


	/**
	 * Writes the string to a file.
	 * @throws Nette\IOException  on error occurred
	 */
	public static function write(string $file, string $content, ?int $mode = 0666): void
	{
		static::createDir(dirname($file));
		if (@file_put_contents($file, $content) === false) { // @ is escalated to exception
<<<<<<< HEAD
			throw new Nette\IOException("Unable to write file '$file'. " . Helpers::getLastError());
		}
		if ($mode !== null && !@chmod($file, $mode)) { // @ is escalated to exception
			throw new Nette\IOException("Unable to chmod file '$file' to mode " . decoct($mode) . '. ' . Helpers::getLastError());
=======
			throw new Nette\IOException(sprintf(
				"Unable to write file '%s'. %s",
				self::normalizePath($file),
				Helpers::getLastError()
			));
		}
		if ($mode !== null && !@chmod($file, $mode)) { // @ is escalated to exception
			throw new Nette\IOException(sprintf(
				"Unable to chmod file '%s' to mode %s. %s",
				self::normalizePath($file),
				decoct($mode),
				Helpers::getLastError()
			));
>>>>>>> a87ae57077b7139b6995c4c9ca2338f0c6b91d35
		}
	}


	/**
	 * Fixes permissions to a specific file or directory. Directories can be fixed recursively.
	 * @throws Nette\IOException  on error occurred
	 */
	public static function makeWritable(string $path, int $dirMode = 0777, int $fileMode = 0666): void
	{
		if (is_file($path)) {
			if (!@chmod($path, $fileMode)) { // @ is escalated to exception
<<<<<<< HEAD
				throw new Nette\IOException("Unable to chmod file '$path' to mode " . decoct($fileMode) . '. ' . Helpers::getLastError());
=======
				throw new Nette\IOException(sprintf(
					"Unable to chmod file '%s' to mode %s. %s",
					self::normalizePath($path),
					decoct($fileMode),
					Helpers::getLastError()
				));
>>>>>>> a87ae57077b7139b6995c4c9ca2338f0c6b91d35
			}
		} elseif (is_dir($path)) {
			foreach (new \FilesystemIterator($path) as $item) {
				static::makeWritable($item->getPathname(), $dirMode, $fileMode);
			}
			if (!@chmod($path, $dirMode)) { // @ is escalated to exception
<<<<<<< HEAD
				throw new Nette\IOException("Unable to chmod directory '$path' to mode " . decoct($dirMode) . '. ' . Helpers::getLastError());
			}
		} else {
			throw new Nette\IOException("File or directory '$path' not found.");
=======
				throw new Nette\IOException(sprintf(
					"Unable to chmod directory '%s' to mode %s. %s",
					self::normalizePath($path),
					decoct($dirMode),
					Helpers::getLastError()
				));
			}
		} else {
			throw new Nette\IOException(sprintf("File or directory '%s' not found.", self::normalizePath($path)));
>>>>>>> a87ae57077b7139b6995c4c9ca2338f0c6b91d35
		}
	}


	/**
	 * Determines if the path is absolute.
	 */
	public static function isAbsolute(string $path): bool
	{
		return (bool) preg_match('#([a-z]:)?[/\\\\]|[a-z][a-z0-9+.-]*://#Ai', $path);
	}


	/**
	 * Normalizes `..` and `.` and directory separators in path.
	 */
	public static function normalizePath(string $path): string
	{
		$parts = $path === '' ? [] : preg_split('~[/\\\\]+~', $path);
		$res = [];
		foreach ($parts as $part) {
			if ($part === '..' && $res && end($res) !== '..' && end($res) !== '') {
				array_pop($res);
			} elseif ($part !== '.') {
				$res[] = $part;
			}
		}
		return $res === ['']
			? DIRECTORY_SEPARATOR
			: implode(DIRECTORY_SEPARATOR, $res);
	}


	/**
	 * Joins all segments of the path and normalizes the result.
	 */
	public static function joinPaths(string ...$paths): string
	{
		return self::normalizePath(implode('/', $paths));
	}
}
