<?php
#!/usr/bin/php

function docx2text($filename) {
   return readZippedXML($filename, "word/document.xml");
}

function readZippedXML($archiveFile, $dataFile) {
	// // Create new ZIP archive
	// $zip = new ZipArchive;

	// // Open received archive file
	// if (true === $zip->open($archiveFile)) {
	//     // If done, search for the data file in the archive
	//     if (($index = $zip->locateName($dataFile)) !== false) {
	//         // If found, read it to the string
	//         $data = $zip->getFromIndex($index);
	//         // Close archive file
	//         $zip->close();
	//         // Load XML from a string
	//         // Skip errors and warnings
	//         $xml = new DOMDocument();
	//     	$xml->loadXML($data, LIBXML_NOENT | LIBXML_XINCLUDE | LIBXML_NOERROR | LIBXML_NOWARNING);
	//         // Return data without XML formatting tags
	//         echo $xml;
	//         return strip_tags($xml->saveXML());
	//     }
	//     $zip->close();
	// }

	// // In case of failure return empty string
	// return "failed";

	$striped_content = '';
    $content = '';

    $zip = zip_open($archiveFile);

    if (!$zip || is_numeric($zip)) return false;

    while ($zip_entry = zip_read($zip)) {

        if (zip_entry_open($zip, $zip_entry) == FALSE) continue;

        if (zip_entry_name($zip_entry) != "word/document.xml") continue;

        $content .= zip_entry_read($zip_entry, zip_entry_filesize($zip_entry));

        zip_entry_close($zip_entry);
    }// end while

    zip_close($zip);


    $content = str_replace('</w:r></w:p></w:tc><w:tc>', " ", $content);
    $content = str_replace('</w:r></w:p>', "\r\n", $content);
    $striped_content = strip_tags($content);

    print_r ($striped_content);

    return $striped_content;


}

echo docx2text("REVIEWQUESTIONSFORCIS32SPRING2016-4.docx");


?>

