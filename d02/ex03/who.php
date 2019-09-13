#!/usr/bin/php
<?php
    // this one is useful https://github.com/libyal/dtformats/blob/master/documentation/Utmp%20login%20records%20format.asciidoc
    $fd = fopen("/var/run/utmpx", "r");
    date_default_timezone_set('America/Los_Angeles');
    $format = "a256ut_user/a4ut_id/a32ut_line/iut_pid/sut_type/sunkn/Itv_sec/Itv_usec/a256ut_host/i16ut_pad";
    while ($bytes = fread($fd, 628))
    {
        $unpacked = unpack($format, $bytes);
        if ($unpacked['ut_type'] === 7) {
            $time_format = "%b %e %H:%M";
            $time = strftime($time_format, $unpacked['tv_sec']);
            print("{$unpacked['ut_user']}  {$unpacked['ut_line']}  {$time}\n");
        }
    }
?>