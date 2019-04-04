<?php

/** 
 * PHP-dynamic-Counter-Favicon (maximum two digits)
 *
 * Copyright 2019 Igor Gaffling
 *
 * Idea is based on this Article:
 * https://viralpatel.net/blogs/dynamic-unread-count-favicon-in-php/
 * Written by Viral Patel
 *
 * Free for any profit or non-profit use.
 * You may freely distribute or modify this code.
 *
 * Use:
 * <link href="favicon.php?char=27" rel="icon" type="image/png">
 *
 */

/* Read the favicon template from frame.png file from current directory */
$im = imagecreatefrompng('frame.png'); // Maybe change Font Color if you use an other Image

/* Read the Character which needs to be added in Favicon from Request */
if ( isset($_REQUEST['char']) && !empty($_REQUEST['char']) ) {
  $int = strval( abs( (int)$_REQUEST['char'] ) );
}

/* Preserve the PNG Image Transparency */
imagealphablending($im, false);
imagesavealpha($im, true);

/* Background Color for the Favicon */
$bg = imagecolorallocate($im, 255, 255, 255); // 255,255,255 = white

/* Foreground (Font) Color for the Favicon */
$color = imagecolorallocate($im, 0, 0, 0); // 0,0,0 = black

/* Write int Char(s) - Image, Fontsize, X-, Y-Coordinate, Character(s), Color */
/* Coordinates fit only if Fontzize = 1 */
if ( strlen($int) == 1 ) { /* One Char */
  imagechar($im, 1, 6, 4, $int, $color);
} elseif ( strlen($int) == 2 ) { /* Two Chars */
  imagechar($im, 1, 4, 4, $int[0], $color);
  imagechar($im, 1, 8, 4, $int[1], $color);
} else { /* More than two Chars will show '...' */
  imagechar($im, 1, 3, 4, '.', $color);
  imagechar($im, 1, 6, 4, '.', $color);
  imagechar($im, 1, 9, 4, '.', $color);
}

/* Send the Image to the Browser */
header('Content-type: image/png');
imagepng($im);

/* Clear Memory from Image Data*/
imagedestroy($im);
