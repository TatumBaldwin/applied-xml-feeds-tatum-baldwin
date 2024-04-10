!<?php 

// Define the URL of the RSS feed
$file_url = "./books.xml";

// Download the XML content using file_get_contents
$content = file_get_contents($file_url);

//check if download was successful with a conditional statement
if (!$content) {
    echo "Error: Content missing";
    exit();
}

//Parse the XML content using SimpleXML (parse means: read the code)
$xml_object = simplexml_load_string($content);

//Check if the parsing was successful with a conditional statement
if (!$xml_object) {
    echo "Error: XML Parsing Error!";
    exit();
}
// Use the data