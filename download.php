<?php
// if array
$image = $_GET['image'] ?? '1.jpg';

// if values separated by commas
// $all_image= $_GET['image'] ?? '1.jpg';
// $image = explode(",", $_GET["all_image"]);

// var_dump($image);

$w = $_GET['w'] ?? 1000; 
$h = $_GET['h'] ?? 800;


$folder_to_download = time();
mkdir("downloads/$folder_to_download");

for ($i=0; $i < count($image) ; $i++) { 
    
    $original_image = imagecreatefromjpeg("images/$image[$i]");
    $new_image = imagecreatetruecolor($w, $h);
    $size = getimagesize("images/$image[$i]");
    $ow = $size[0];
    $oh = $size[1];
    imagecopyresized(
        $new_image,
        $original_image,
        0,0,
        0,0,
        $w,$h,
        $ow,$oh
    );
    imagejpeg($new_image, "downloads/$folder_to_download/$i--$w-x-$h.jpg", 70);
}
print "<h1><a href='index.php'>HOME</a></h1>";

print "<h3>To Download all Folder(ZIP) => <a href='zip.php?folder=$folder_to_download'> CLICK HERE !</a></h3>";
print "<h3>To Download each image separated Click on image you want to download</h3>";
print "<hr>";
 $all_images = scandir("downloads/$folder_to_download");
        array_splice($all_images, 0, 2);

        foreach ($all_images as $image) {
            print "
                <div class='img-box'>
                    <label>
                        <a href='downloads/$folder_to_download/$image' download='$image'><img src='downloads/$folder_to_download/$image'></a>
                    </label>
                </div>
            ";
        }


?>