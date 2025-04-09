<?php

function demo() {
     return "Demo";
}

function imageUpload($image, $directory) {
    $imageExtension = $image->getClientOriginalExtension();
    $imageName = rand(1000, 5000).'.'.$imageExtension;
    $image->move($directory,$imageName);
    return $directory.$imageName;
}
