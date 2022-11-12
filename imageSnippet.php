<?php
// include ImageManipulator class
require_once('imageManipulator.php');

if ($_FILES['image']['error'] > 0) {
    echo "Error: " . $_FILES['image']['error'] . "<br />";
} else {
    // array of valid extensions
    $validExtensions = array('.jpg', '.jpeg', '.gif', '.png');
    // get extension of the uploaded file
    $fileExtension = strrchr($_FILES['image']['name'], ".");
    // check if file Extension is on the list of allowed ones
    if (in_array($fileExtension, $validExtensions)) {
        $newName = date("Y-m-d").'/'.$_FILES['image']['name'];
        $manipulator = new ImageManipulator($_FILES['image']['tmp_name']);
        $width  = $manipulator->getWidth();
        $height = $manipulator->getHeight();
        $centreX = round($width / 2);
        $centreY = round($height / 2);
        // our dimensions will be 200x130
        $x1 = $centreX - 1000; 
        $y1 = $centreY - 1000; 
 
        $x2 = $centreX + 1000; 
        $y2 = $centreY + 1000; 
 
        // center cropping
        $newImage = $manipulator->crop($x1, $y1, $x2, $y2);
        // saving file to uploads folder
        $manipulator->save('uploads/'.$newName);
        echo 'Done ...';
    }
    // array of valid extensions
    $validExtensions2 = array('.jpg', '.jpeg', '.gif', '.png');
    // get extension of the uploaded file
    $fileExtension2 = strrchr($_FILES['image2']['name'], ".");
    // check if file Extension is on the list of allowed ones
    if (in_array($fileExtension2, $validExtensions2)) {
        $newName = date("Y-m-d").'/'.$_FILES['image2']['name'];
        $manipulator = new ImageManipulator($_FILES['image2']['tmp_name']);
        $width  = $manipulator->getWidth();
        $height = $manipulator->getHeight();
        $centreX = round($width / 2);
        $centreY = round($height / 2);
        // our dimensions will be 200x130
        $x1 = $centreX - 1000; 
        $y1 = $centreY - 1000; 
 
        $x2 = $centreX + 1000; 
        $y2 = $centreY + 1000; 
 
        // center cropping
        $newImage = $manipulator->crop($x1, $y1, $x2, $y2);
        // saving file to uploads folder
        $manipulator->save('uploads/'.$newName);
        echo 'Done ...';
    }
    // array of valid extensions
    $validExtensions3 = array('.jpg', '.jpeg', '.gif', '.png');
    // get extension of the uploaded file
    $fileExtension3 = strrchr($_FILES['image3']['name'], ".");
    // check if file Extension is on the list of allowed ones
    if (in_array($fileExtension3, $validExtensions3)) {
        $newName = date("Y-m-d").'/'.$_FILES['image3']['name'];
        $manipulator = new ImageManipulator($_FILES['image3']['tmp_name']);
        $width  = $manipulator->getWidth();
        $height = $manipulator->getHeight();
        $centreX = round($width / 2);
        $centreY = round($height / 2);
        // our dimensions will be 200x130
        $x1 = $centreX - 1000; 
        $y1 = $centreY - 1000; 
 
        $x2 = $centreX + 1000; 
        $y2 = $centreY + 1000; 
 
        // center cropping
        $newImage = $manipulator->crop($x1, $y1, $x2, $y2);
        // saving file to uploads folder
        $manipulator->save('uploads/'.$newName);
        echo 'Done ...';
    }
    // array of valid extensions
    $validExtensions4 = array('.jpg', '.jpeg', '.gif', '.png');
    // get extension of the uploaded file
    $fileExtension4 = strrchr($_FILES['image4']['name'], ".");
    // check if file Extension is on the list of allowed ones
    if (in_array($fileExtension4, $validExtensions4)) {
        $newName = date("Y-m-d").'/'.$_FILES['image4']['name'];
        $manipulator = new ImageManipulator($_FILES['image4']['tmp_name']);
        $width  = $manipulator->getWidth();
        $height = $manipulator->getHeight();
        $centreX = round($width / 2);
        $centreY = round($height / 2);
        // our dimensions will be 200x130
        $x1 = $centreX - 1000; 
        $y1 = $centreY - 1000; 
 
        $x2 = $centreX + 1000; 
        $y2 = $centreY + 1000; 
 
        // center cropping
        $newImage = $manipulator->crop($x1, $y1, $x2, $y2);
        // saving file to uploads folder
        $manipulator->save('uploads/'.$newName);
        echo 'Done ...';
    } else {
        echo 'You must upload an image...';
    }
}
?>