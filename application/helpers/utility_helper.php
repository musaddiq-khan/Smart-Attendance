<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
function asset_url(){
   return base_url().'assets/';
}



function no_cache()
{
    header("HTTP/1.0 200 OK");
    header("HTTP/1.1 200 OK");
    header("Expires: Mon, 26 Jul 1990 05:00:00 GMT");
    header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
    header("Cache-Control: no-store, no-cache, must-revalidate");
    header("Cache-Control: post-check=0, pre-check=0", false);
    header("Pragma: no-cache");
}
?>