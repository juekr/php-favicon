Slightly adapted version of https://github.com/gaffling/PHP-Dynamic-Counter-Favicon

Original README (more details soon):

PHP-dynamic-Counter-Favicon (maximum two digits)
================================================

> PHP Dynamic Content Favicon shows e.g. unread email counts or whatever, direct in your browser tab icon. If your browser has lots of tabs open, this might be a really useful feature that let user know of any count item. This small but powerful script in PHP let you create your own dynamic favicon. It will use the PHP GD library to manipulate the favicon image and add text (maximum two digits) into it. If you try to give a longer text to the script it will show three dots in the icon (...) - thats all ;-)

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
