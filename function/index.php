<?php

function dd($dat){
    echo "<p></pre>".var_dump($dat)."</pre></p>";
    die();
}

function base_path($path):string{
    return __DIR__."/../".$path;
}

function views($path,array $array = [])
{
    extract($array);
    return require base_path("/Views/" . $path);
}