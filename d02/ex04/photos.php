#!/usr/bin/php
<?php
    if ($argc != 2)
        return ;

    $url = $argv[1];

    if (($html = file_get_contents($url)) === false)
        return ;

    $folder = strrchr($url, '//');
    $folder = trim($folder, "/");
    array_map('unlink', glob("$folder/*.*"));
    rmdir($folder);
    mkdir($folder, 0755, true);

    preg_match_all('/<img.*src="([^"]*)"/i', $html, $mat);
    foreach ($mat[1] as $link) {
        if (!preg_match("/^http[s]:\/\//", $link))
            $link = $url.$link;
        if (($pic = file_get_contents($link)) === false )
            continue ;
        $name = strrchr($link , '/');
        file_put_contents($folder . '/' . $name, $pic);
    }
?>