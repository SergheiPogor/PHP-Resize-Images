<?php

$folder= $_GET['folder'] ?? '';

$file_names = scandir("downloads/$folder");
array_splice($file_names, 0, 2);

print $folder;
var_dump($file_names);
//exit;

$zip = new ZipArchive;
$tmp_file = "zip/$folder.zip";
if ($zip->open($tmp_file, ZipArchive::CREATE)) {
    foreach ($file_names as $image) {
        $zip->addFile("downloads/$folder/$image", "$image");
    }  

    $zip->close();
    echo 'Archive created!';
    header("Content-disposition: attachment; filename=$tmp_file");
    header('Content-type: application/zip');
    readfile($tmp_file);
} else {
    echo 'Failed!';
}


