<?php

function display_events_by_month(array $event){

    $la = $event;
    $lb = [];

    $ischanged = true;

    

    while($ischanged == true){
        $tempLa = $la;
        $tempLb = $lb;
        foreach($la as $arr){

            if(sizeof($la) == 1){
                array_push($lb, $la[0]);
                array_shift($la);
            }

            if(isset($la[1])){

                $date1 = explode("-", date('d-m-Y', strtotime($la[0]['date'])));
                $date2 = explode("-", date('d-m-Y', strtotime($la[1]['date'])));   

                if(intval($date1[1]) < intval($date2[1])){
                    array_push($lb, $la[0]);
                    array_shift($la);
                }
                if(intval($date1[2]) < intval($date2[2])){
                    array_push($lb, $la[0]);
                    array_shift($la);
                }
                if(intval($date1[1]) > intval($la[1]['date'])){
                    array_push($la, $la[0]);
                    array_shift($la);
                }
                if(intval($date1[2]) > intval($la[2]['date'])){
                    array_push($la, $la[0]);
                    array_shift($la);
                }
                if(intval($date1[1]) == intval($la[1]['date'])){
                    array_push($lb, $la[0]);
                    array_shift($la);
                }
                if(intval($date1[2]) == intval($la[2]['date'])){
                    array_push($lb, $la[0]);
                    array_shift($la);
                }
            }
        }
        if($la == $tempLa && $lb == $tempLb){
            $ischanged = false;
        }
    }

    foreach($lb as $arr){
        array_push($la, $lb[sizeof($lb)-1]);
        array_shift($lb);
    }

    $tempDate = null;

    foreach($la as $arr){

        $date = explode("-", date('d-m-Y', strtotime($arr['date'])));
        
        if($date[2] == $tempDate || $tempDate == null){
            echo $date[2]."-".$date[1]."\n";
        }
        
        echo "  The \"".$arr['name']."\" la will take place on in ".$arr['location']."\n";

        $tempDate = $date[2];
    }

}

$event = [
    [
    'name' => 'Reunion Client',
    'date' => '20200505',
    'location' => 'Nantes'
    ] ,
    [
    'name' => 'Affinage sprint 2',
    'date' => '20200705',
    'location' => 'Nantes'
    ] ,
    [
    'name' => 'RDV Pro',
    'date' => '20200705',
    'location' => 'Paris'
    ] ,
    [
    'name' => 'Brainstorming',
    'date' => '20190705',
    'location' => 'Lyon'
    ] ,
    [
    'name' => 'Demonstration client',
    'date' => '20200205',
    'location' => 'Lille'
    ]
];

display_events_by_month($event);