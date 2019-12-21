<?php

function level($l){
    $level=config("level");
    foreach($level as $key=>$value){
       if($value > $l){
           return $key;
       }
    }
}