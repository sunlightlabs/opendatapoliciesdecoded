<?php

class JSONExport extends Export
{
	public $format = 'json';
	public $extension = '.json';

	public function storeLaw($law, $dir, $url)
	{
		$path = $this->createExportDir($dir, $url);

		$file_name = $path . $this->getLawFilename($law, $path);

		file_put_contents($file_name, json_encode($law));

		return TRUE;
	}

}
