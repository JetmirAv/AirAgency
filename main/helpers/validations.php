<?php

function valid_email($str)
{
    return (!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $str)) ? FALSE : TRUE;
}

function valid_password($str)
{
    $uppercase = preg_match('@[A-Z]@', $str);
    $lowercase = preg_match('@[a-z]@', $str);
    $number    = preg_match('@[0-9]@', $str);

    if (!$uppercase || !$lowercase || !$number || strlen($str) < 8) {
        return false;
    } else {
        return true;
    }
}

function valide_date($date)
{
    $dateArr  = explode('-', $date);
    print_r($dateArr);
    echo $dateArr[0] . "   " . $dateArr[1] . "   " . $dateArr[2];
    if (count($dateArr) == 3) {
        
        if (checkdate($dateArr[1], $dateArr[2], $dateArr[0])) {
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
}
function validate_name($str)
{
    //https://andrewwoods.net/blog/2018/name-validation-regex/
    $pattern = '/^[A-Za-z\x{00C0}-\x{00FF}][A-Za-z\x{00C0}-\x{00FF}\'\-]+([\ A-Za-z\x{00C0}-\x{00FF}][A-Za-z\x{00C0}-\x{00FF}\'\-]+)*/u';
}

function valid_phone($number)
{
    $formats = [
        '###-###-####', 
        '####-###-###',
        '(###) ###-###',
        '####-####-####',
        '##-###-####-####',
        '####-####',
        '###-###-###',
        '#####-###-###', 
        '##########', 
        '#########',
        '# ### #####', 
        '#-### #####'
    ];

    return in_array(trim(preg_replace('/[0-9]/', '#', $number)),$formats);
}
