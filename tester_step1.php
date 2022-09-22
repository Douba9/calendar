<?php

function display_event(array $event)
{
    echo "The \"".$event['name']."\" event will take place on ".date('d-m-Y', strtotime($event['date']))." in ".$event['location']."\n";
}

$event = [
    'name' => 'RDV Client Smith',
    'date' => '20191231',
    'location' => 'Nantes'
];

display_event($event);