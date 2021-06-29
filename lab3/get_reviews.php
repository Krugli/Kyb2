<?php
    $id = 0;

    $xmldoc = new DOMDocument();
    $xmldoc->load('reviews.xml');

    $storage = $xmldoc->getElementsByTagName("storage")->item(0);

    foreach($storage->getElementsByTagName("comments") as $section){
        if ($section->attributes['id']->nodeValue==$id){
            $needed_section = $section;
            break;
        }
    }

    if ($needed_section==null){
        $element = $xmldoc->createElement('comments');
        $element->setAttribute('id', $id);
        $needed_section = $storage->appendChild($element);
        $xmldoc->save('reviews.xml');
    }

    foreach($needed_section->getElementsByTagName("comment") as $item){
        echo "<p><section style='background-color:rgb(192, 227, 255); font-size:22px'>";
        echo $item->attributes[0]->nodeValue ." (". $item->attributes[1]->nodeValue . ")";
        echo " >> ". $item->nodeValue;
        echo "</section></p>";
    }
?>