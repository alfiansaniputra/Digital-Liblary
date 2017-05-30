<?php
 
use Carbon\Carbon;

function set_active($uri)
{
    return Request::is($uri) ? 'active' : '';

}