<?php

/*

PHP-dynamic-Counter-Favicon (maximum two digits)
================================================

> PHP Dynamic Content Favicon shows e.g. unread email counts or whatever, direct in your browser tab icon. If your browser has lots of tabs open, this might be a really useful feature that lets user know of any count item. This small but powerful script in PHP let you create your own dynamic Favicon. It will use the PHP GD library to manipulate the favicon image and add text (maximum two digits) into it. If you try to give a longer Text to the Script it will show three dots in the icon (...) - thats all ;-)

**Idea based on this Article:**<br>
https://viralpatel.net/blogs/dynamic-unread-count-favicon-in-php/<br>
written by Viral Patel

**Use:**

```html
<link href="favicon.php?char=27" rel="icon" type="image/png">
```

or

```PHP
<link href="favicon.php?char=<?php echo $char; ?>" rel="icon" type="image/png">
```

**Try:**<br>
test.php

**Info:**<br>
https://github.com/audreyr/favicon-cheat-sheet

***Free for any profit or non-profit use.<br>
You may freely distribute or modify this code.***

Copyright 2019 Igor Gaffling

*/

/* Read the favicon template from png file from current directory */
/* frame-border.png / frame-card.png / frame-cal.php */
$im = imagecreatefrompng('frame-border.png'); // Maybe change Font Color if you use an other Image

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
