<?php

class XMLExport extends Export
{
	public $format = 'xml';
	public $extension = '.xml';

	public function storeLaw($law_original, $dir, $url)
	{
		$law = clone($law_original);

		$path = $this->createExportDir($dir, $url);

		$file_name = $path . $this->getLawFilename($law, $path);

		/*
		 * Store the XML file.
		 *
		 * We need to massage the $law object into matching the State Decoded
		 * XML standard. The first step towards this is removing unnecessary
		 * elements.
		 */
		unset($law->plain_text);
		unset($law->structure_contents);
		unset($law->next_section);
		unset($law->previous_section);
		unset($law->amendment_years);
		unset($law->dublin_core);
		unset($law->plain_text);
		unset($law->section_id);
		unset($law->structure_id);
		unset($law->edition_id);
		unset($law->full_text);
		unset($law->formats);
		unset($law->html);
		$law->structure = $law->ancestry;
		unset($law->ancestry);
		$law->referred_to_by = $law->references;
		unset($law->references);

		/*
		 * Encode all entities as their proper Unicode characters, save for the
		 * few that are necessary in XML.
		 */
		$law = html_entity_decode_object($law);

		/*
		 * Quickly turn this into an XML string.
		 */
		$xml = new SimpleXMLElement('<law />');
		object_to_xml($law, $xml);

		$xml = $xml->asXML();

		/*
		 * Load the XML string into DOMDocument.
		 */
		$dom = new DOMDocument();
		$dom->loadXML($xml);

		/*
		 * Simplify every reference, stripping them down to the cited sections.
		 */
		$referred_to_by = $dom->getElementsByTagName('referred_to_by');
		if ( !empty($referred_to_by) && ($referred_to_by->length > 0) )
		{
			$referred_to_by = $referred_to_by->item(0);
			$references = $referred_to_by->getElementsByTagName('unit');

			/*
			 * Iterate backwards through our elements.
			 */
			for ($i = $references->length; --$i >= 0;)
			{

				$reference = $references->item($i);

				/*
				 * Save the section number.
				 */
				$section_number = trim($reference->getElementsByTagName('section_number')->item(0)->nodeValue);

				/*
				 * Create a new element, named "reference," which contains the only
				 * the section number.
				 */
				$element = $dom->createElement('reference', $section_number);
				$reference->parentNode->insertBefore($element, $reference);

				/*
				 * Remove the "unit" node.
				 */
				$reference->parentNode->removeChild($reference);

			}

		}

		/*
		 * Simplify and reorganize every structural unit.
		 */
		$structure = $dom->getElementsByTagName('structure');
		if ( !empty($structure) && ($structure->length > 0) )
		{
			$structure = $structure->item(0);

			$structural_units = $structure->getElementsByTagName('unit');

			/*
			 * Iterate backwards through our elements.
			 */
			for ($i = $structural_units->length; --$i >= 0;)
			{

				$unit = $structural_units->item($i);

				/*
				 * Add the "level" attribute.
				 */
				$label = trim(strtolower($unit->getAttribute('label')));
				$level = $dom->createAttribute('level');
				$level->value = $unit->getAttribute('depth');

				$unit->appendChild($level);

				/*
				 * Add the "identifier" attribute.
				 */
				$identifier = $dom->createAttribute('identifier');
				$identifier->value = trim($unit->getElementsByTagName('identifier')->item(0)->nodeValue);
				$unit->appendChild($identifier);

				/*
				 * Remove the "id" attribute from <unit>.
				 */
				$unit->removeAttribute('id');

				/*
				 * Store the name of this structural unit as the contents of <unit>.
				 */
				$unit->nodeValue = trim($unit->getElementsByTagName('name')->item(0)->nodeValue);

				/*
				 * Save these changes.
				 */
				$structure->appendChild($unit);

			}

		}

		/*
		 * Rename text units as text sections.
		 */
		$text = $dom->getElementsByTagName('text');
		if (!empty($text) && ($text->length > 0))
		{
			$text = $text->item(0);
			$text_units = $text->getElementsByTagName('unit');

			/*
			 * Iterate backwards through our elements.
			 */
			for ($i = $text_units->length; --$i >= 0;)
			{
				$text_unit = $text_units->item($i);
				renameElement($text_unit, 'section');
			}

		}

		return file_put_contents($file_name, $dom->saveXML());
	}

}
