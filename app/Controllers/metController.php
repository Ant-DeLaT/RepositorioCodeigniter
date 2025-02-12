<?php
namespace App\Controllers;
use App\Controllers\BaseController;


class metController extends BaseController 
{
    function show() {
        return("metronic/index.html");    
    }
    function reg() {
        return ("register_View2");
    }
    
}
