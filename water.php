<?php

function isItWater($lat,$lng,$apiKey) {

    $GMAPStaticUrl = "https://maps.googleapis.com/maps/api/staticmap?center=".$lat.",".$lng."&size=40x40&maptype=roadmap&sensor=false&zoom=16&key=".$apiKey;
    echo "\n\n";
    echo $GMAPStaticUrl;
    $chuid = curl_init();
    curl_setopt($chuid, CURLOPT_URL, $GMAPStaticUrl);
    curl_setopt($chuid, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($chuid, CURLOPT_SSL_VERIFYPEER, FALSE);
    $data = trim(curl_exec($chuid));
    curl_close($chuid);
    $image = imagecreatefromstring($data);

    // this is for debug to print the image
    ob_start();
    imagepng($image);
    $contents =  ob_get_contents();
    ob_end_clean();
    echo "\n\n";
    echo "<img src='data:image/png;base64,".base64_encode($contents)."' />";

    // here is the test : I only test 3 pixels ( enough to avoid rivers ... )
    $hexaColor = imagecolorat($image,0,0);
    $color_tran = imagecolorsforindex($image, $hexaColor);

    $hexaColor2 = imagecolorat($image,0,1);
    $color_tran2 = imagecolorsforindex($image, $hexaColor2);

    $hexaColor3 = imagecolorat($image,0,2);
    $color_tran3 = imagecolorsforindex($image, $hexaColor3);

    $red = $color_tran['red'] + $color_tran2['red'] + $color_tran3['red'];
    $green = $color_tran['green'] + $color_tran2['green'] + $color_tran3['green'];
    $blue = $color_tran['blue'] + $color_tran2['blue'] + $color_tran3['blue'];

    imagedestroy($image);
    echo "\n\n";
    var_dump($red,$green,$blue);
    // This is changing sometimes...
    if($red == 489 && $green == 612 && $blue == 765)
        return 1;
    else
        return 0;
}

?>
