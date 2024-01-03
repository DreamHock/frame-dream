<?php

function dd($value)
{
    if (is_array($value)) {
        foreach ($value as $key => $v) {
            echo '<h3>';
            echo '<span style="color: grey;">';
            echo $key;
            echo '</span>: ';
            echo '<span style="color: green;">';
            echo $v;
            echo '</span>';
            echo '</h3>';
        }
    } else {
        echo var_dump($value);
    }
    die();
}

function view($class, $method, $data=[])
{
    $targetClass = new $class();
    $targetClass->$method($data);
    die();
}
