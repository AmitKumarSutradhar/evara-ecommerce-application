<?php

function imageUpload($image, $directory)
{
    $imageExtension = $image->getClientOriginalExtension();
    $imageName = rand(1000, 5000) . '.' . $imageExtension;
    $image->move($directory, $imageName);
    return $directory . $imageName;
}

function imageUploadUpdate($requstImage, $advertisementImage, $directory)
{
    if ($requstImage) {
        if (file_exists($advertisementImage)) {
            unlink($advertisementImage);
        }

        $imageExtension = $requstImage->getClientOriginalExtension();
        $imageName = rand(1000, 5000) . '.' . $imageExtension;
        $requstImage->move($directory, $imageName);
        return $directory . $imageName;
    }
}
