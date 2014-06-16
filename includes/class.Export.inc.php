<?php

/**
 * Export base class
 *
 * Note: I've tried to give a concrete implementation
 * example below for extension.
 */

abstract class Export
{
	public $format = 'data';
	public $extension = '.php';

	// The export should not prescribe paths,
	// it should just add its own
	public function createExportDir($dir, $url)
	{
		$path = $dir . 'code-' . $this->format . $url;

		mkdir_safe($path);

		return $path;
	}

	public function storeLaw($law, $dir, $url)
	{
		$path = $this->createExportDir($dir, $url);

		$file_name = $path . $this->getLawFilename($law, $path);

		file_put_contents($file_path, var_export($law, true));

		return TRUE;
	}

	public function getLawFilename($law, $path)
	{
		/*
		 * Eliminate colons from section numbers, since some OSes can't handle colons in
		 * filenames.
		 */
		return str_replace(':', '_', $law->section_number) . $this->extension;
	}
}
