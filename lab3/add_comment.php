<?php
    $id = $_GET['id'];
    $text = $_GET['text'];

    $xmldoc = new DOMDocument();
    $xmldoc->load('comments.xml');

    $storage = $xmldoc->getElementsByTagName("storage")->item(0);

    foreach($storage->getElementsByTagName("comments") as $section){
        if ($section->attributes['id']->nodeValue==$id){
            $needed_section = $section;
            break;
        }
    }

    $element = $xmldoc->createElement("comment", $text);
    $needed_section->appendChild($element);

    $xmldoc->save('comments.xml');
?>