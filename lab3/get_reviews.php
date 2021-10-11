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
        echo "<div style='background-color:rgb(192, 227, 255);padding-bottom:10px; padding-top:10px'>";
            echo "<section style='background-color:rgb(19, 207, 235); margin-left:40%; width:20%; padding-bottom:10px; padding-top:10px' align='center'>";
            echo "<div style='font-size:22px'>".$item->attributes[0]->nodeValue."</div>";
            echo "<div style='font-size:12px'>".$item->attributes[1]->nodeValue."</div>";
            echo "<div style='font-size:22px'>".$item->nodeValue."</div>";
            echo "<section style='background-color:rgb(192, 227, 255); padding-bottom=10px; padding-top=10px' align='center'>";
        echo "</div>";
    }
?>
