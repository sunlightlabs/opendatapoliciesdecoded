<?php

class TextExport extends Export
{
	public $format = 'txt';
	public $extension = '.txt';

	public function storeLaw($law, $dir, $url)
	{
		$path = $this->createExportDir($dir, $url);

		$file_name = $path . $this->getLawFilename($law, $path);

		file_put_contents($file_name, $law->plain_text);

		return TRUE;
	}

}
