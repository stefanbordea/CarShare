<?php
foreach($listings as $listing){
    echo "{$listing['ID']} " . "{$listing['description']} " . "{$listing['pricePerDay']}";
    echo "<br>";
}


