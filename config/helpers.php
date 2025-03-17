<?php

/**
 * @param $path
 * @return string
 */
function setActive($path)
{
    return Request::is($path . '*') ? ' menu-active' :  '';
}