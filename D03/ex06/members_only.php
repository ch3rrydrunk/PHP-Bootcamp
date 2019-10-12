<?php
    $warning = "<html><body>That area is accessible for members only</body></html>";
    header('WWW-Authenticate: Basic realm="Member area"');
    header('HTTP/1.0 401 Unauthorized');
    header('Cache-Control: no-cache, must-revalidate, max-age=0');
    if ($_SERVER['PHP_AUTH_USER']) 
    {
        if (($_SERVER['PHP_AUTH_USER'] === 'zaz') && ($_SERVER['PHP_AUTH_PW'] === 'Ilovemylittleponey'))
        {
            header('HTTP/1.0 400 Authorized');
            $img = base64_encode(file_get_contents("../img/42.png"));
                echo "<html><body>\nHello Zaz<br />\n<img src='data:image/png;base64,$img'>\n</body></html>".PHP_EOL;
        }
        else
            echo $warning.PHP_EOL;
    }
    else
        echo $warning.PHP_EOL;
?>