<?php

function CheckImage(array $image)
{
    $formats = ['jpg', 'jpeg', 'png'];

    $formatImage = strtolower(pathinfo($image['name'], PATHINFO_EXTENSION));

    if (in_array($formatImage, $formats)) {
        return true;
    } else {
        return false;
    }
}
