<?php
/***********************************************************************************
Функция img_resize(): генерация thumbnails
Параметры:
  $src             - имя исходного файла
  $dest            - имя генерируемого файла
  $width, $height  - ширина и высота генерируемого изображения, в пикселях
Необязательные параметры:
  $rgb             - цвет фона, по умолчанию - белый
  $quality         - качество генерируемого JPEG, по умолчанию - максимальное (100)
***********************************************************************************/
//функция уменьшения картинки без обрезки белых краев
/**
 * function img_resize($src, $dest, $width, $height, $rgb=0xFFFFFF, $quality=100)
 * {
 *   if (!file_exists($src)) return false;

 *   $size = getimagesize($src);

 *   if ($size === false) return false;

 *   // Определяем исходный формат по MIME-информации, предоставленной
 *   // функцией getimagesize, и выбираем соответствующую формату
 *   // imagecreatefrom-функцию.
 *   $format = strtolower(substr($size['mime'], strpos($size['mime'], '/')+1));
 *   $icfunc = "imagecreatefrom" . $format;
 *   if (!function_exists($icfunc)) return false;

 *   $x_ratio = $width / $size[0];
 *   $y_ratio = $height / $size[1];

 *   $ratio       = min($x_ratio, $y_ratio);
 *   $use_x_ratio = ($x_ratio == $ratio);

 *   $new_width   = $use_x_ratio  ? $width  : floor($size[0] * $ratio);
 *   $new_height  = !$use_x_ratio ? $height : floor($size[1] * $ratio);
 *   $new_left    = $use_x_ratio  ? 0 : floor(($width - $new_width) / 2);
 *   $new_top     = !$use_x_ratio ? 0 : floor(($height - $new_height) / 2);

 *   $isrc = $icfunc($src);
 *   $idest = imagecreatetruecolor($width, $height);

 *   imagefill($idest, 0, 0, $rgb);
 *   imagecopyresampled($idest, $isrc, $new_left, $new_top, 0, 0, 
 *     $new_width, $new_height, $size[0], $size[1]);

 *   imagejpeg($idest, $dest, $quality);

 *   imagedestroy($isrc);
 *   imagedestroy($idest);

 *   return true;

 * }
 */
 //функция уменьшения картинки с обрезкой белых краев
 function img_resize($src, $dest, $width, $height, $rgb=0xFFFFFF, $quality=100) 
	{ 
	if (!file_exists($src)) return false; 

	$size = getimagesize($src); 

	if ($size === false) return false; 

	// Определяем исходный формат по MIME-информации, предоставленной 
// функцией getimagesize, и выбираем соответствующую формату 
// imagecreatefrom-функцию. 
	$format = strtolower(substr($size['mime'], strpos($size['mime'], '/')+1)); 
	$icfunc = "imagecreatefrom" . $format; 
	if (!function_exists($icfunc)) return false; 

	/* alg */ 
	$src_w = intval($size[0]); 
	$src_h = intval($size[1]); 
	$set_w = abs(intval($width)); 
	$set_h = abs(intval($height)); 
	$src_x = $src_y = 0; 

	if ($set_w == 0 && $set_h == 0) { $set_w = $src_w; $set_h = $src_h; } 
	if ($set_w > 0 && $set_h == 0) { $set_h = ceil($src_h*$set_w/$src_w); } 
	if ($set_h > 0 && $set_w == 0) { $set_w = ceil($src_w*$set_h/$src_h); } 
	$prc_w = ceil($src_w*$set_h/$src_h); 
	$prc_h = ceil($src_h*$set_w/$src_w); 
	if ($prc_h >= $set_h) 
	{ 
	$out_w = $set_w; $out_h = $prc_h; 
	} 
	else 
	{ 
	$out_w = $prc_w; $out_h = $set_h; 
	} 
	if ($out_w > $set_w) 
	{ 
	$xw = ceil($set_w*$src_h/$set_h); 
	$src_x = ceil(($src_w-$xw)/2); 
	} 
	if ($out_h > $set_h) 
	{ 
	$xh = ceil($set_h*$src_w/$set_w); 
	$src_y = ceil(($src_h-$xh)/2); 
	} 

	if ($out_w > $set_w || $out_h > $set_h) 
	{ 
	if ($out_w > $set_w) 
	{ 
	$h = ceil($out_h*$set_w/$out_w); $w = $set_w; 
	} 
	if ($out_h > $set_h) 
	{ 
	$w = ceil($out_w*$set_h/$out_h); $h = $set_h; 
	} 
	} 
	else 
	{ 
	$w = $out_w; $h = $out_h; 
	} 
	$src_x = $src_y = 0; 
	$set_w = $out_w = $w; 
	$set_h = $out_h = $h; 
	/* alg */ 



	// Создаем новое изображение 
$idest = imagecreatetruecolor($set_w, $set_h); 
	$isrc = $icfunc($src); 

	// Копируем существующее изображение в новое с изменением размера: 
imagecopyresampled( 
	$idest, // Идентификатор нового изображения 
$isrc, // Идентификатор исходного изображения 
0,0, // Координаты (x,y) верхнего левого угла 
// в новом изображении 
$src_x,$src_y, // Координаты (x,y) верхнего левого угла копируемого 
// блока существующего изображения 
$out_w, // Новая ширина копируемого блока 
$out_h, // Новая высота копируемого блока 
$size[0], // Ширина исходного копируемого блока 
$size[1] // Высота исходного копируемого блока 
); 

imagejpeg($idest, $dest, $quality); 

	imagedestroy($isrc); 
	imagedestroy($idest); 

	return array('width' => $out_w, 'height'=> $out_h); 

	} 
?>