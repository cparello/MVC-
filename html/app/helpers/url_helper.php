<?php
/**
 * Created by PhpStorm.
 * User: chris
 * Date: 3/12/2019
 * Time: 11:21 PM
 */


//redirect

function redirect($page)
{
    header('location:' . URLROOT . '/' . $page);
}
