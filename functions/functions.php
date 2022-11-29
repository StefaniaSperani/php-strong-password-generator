<?php

function getCharacter($char)
{
    $length = strlen($char) - 1;
    $randomChar = rand(0, $length);

    return $char[$randomChar];
}
;

?>