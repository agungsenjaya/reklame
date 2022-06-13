<?php
    function counTing($a)
    {
        $len = strlen($a);
        switch ($len) {
            case 1:
                echo '0' . $a;
                break;
            default:
                echo $a;
                break;
        }
    }