<!--Original Source: https://www.w3schools.com/xml/xsl_server.asp -->

<?php

// What I convert
$folderHome= 'xml/';
//$xslFile='story.xsl';

// Load XML file
$xml = new DOMDocument;
$xml->load($folderHome.$xmlLoadFile);

// Load XSL file
$xsl = new DOMDocument;
$xsl->load($folderHome.$xslFile);

// Configure the transformer
$proc = new XSLTProcessor;

// Attach the xsl rules
$proc->importStyleSheet($xsl);

echo $proc->transformToXML($xml);
?>
