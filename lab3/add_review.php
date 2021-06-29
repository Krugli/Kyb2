<?php
    $name = $_GET['name'];
    $email = $_GET['email'];
    $review = $_GET['review'];

    $xmldoc = new DOMDocument();
    $xmldoc->load('reviews.xml');

    $storage = $xmldoc->getElementsByTagName("storage")->item(0);

    foreach($storage->getElementsByTagName("comments") as $section){
        if ($section->attributes['id']->nodeValue==0){
            $needed_section = $section;
            break;
        }
    }

    $element = $xmldoc->createElement("comment", $review);
    $element->setAttribute('name', $name);
    $element->setAttribute('email', $email);
    $needed_section->appendChild($element);

    $xmldoc->save('reviews.xml');
?>