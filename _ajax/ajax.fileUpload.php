<?php
header('Content-Type: application/json');
ini_set("display_errors", 1);

function RandomString($length = 8) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';
    for ($i = 0; $i < $length+1; $i++) {
    	if($i == round($length/2))
    		$randomString .= "_";
    	else
        $randomString .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $randomString;
}

$uploadPath = "../files/";
$showPath = "files/";

$uploaded = array();
$uploaded['success'] = true;

if(isset($_POST['data'])){
	$temp = explode(",", $_POST['data']);
	if(sizeof($temp) > 1){
		$data = base64_decode($temp[1]);

		$string = RandomString();

		if(file_put_contents("{$uploadPath}{$string}.png", $data)){
			$uploaded['files'][] = array(
				'name' => "{$string}.png",
				'path' => "{$showPath}{$string}.png"
			);
		}else{
			$uploaded['success'] = false;
		}
	}else{
		$uploaded['success'] = false;
	}
}
else if(!empty($_FILES['blob'])){
	$string = RandomString();
	$value = "{$string}.png";
	if(move_uploaded_file($_FILES['blob']['tmp_name'], $uploadPath.$value)){
		$uploaded['files'][] = array(
				'name' => $value,
				'path' => $showPath.$value
			);
	}
}
elseif(!empty($_FILES['files']['name'][0]) && !isset($_FILES['blob'])){
	foreach ($_FILES['files']['name'] as $key => $value) {
		if(move_uploaded_file($_FILES['files']['tmp_name'][$key], $uploadPath.$value)){
			$uploaded['files'][] = array(
				'name' => $value,
				'path' => $showPath.$value
			);
		}else{
			$uploaded['success'] = false;
		}
	}
}

if(!empty($uploaded)){
	echo json_encode($uploaded);
}else{
	$uploaded['success'] = false;
	echo json_encode($uploaded);
}
