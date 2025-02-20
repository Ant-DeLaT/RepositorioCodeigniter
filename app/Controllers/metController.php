<?php
namespace App\Controllers;
use App\Controllers\BaseController;


class metController extends BaseController 
{
    function index() {

        return view("metronic/metronic");    
    }
    function register() {
        
        return view("metronic/register_View2");
    }
    function login(){
        // View isn't created yet
        return view("metronic/login_View2");
    }
    function about(){
        // View isn't created yet
        return view("metronic/about_View");
    }
    function support(){
        // View isn't created yet
        return view("metronic/support_View");
    }
    function FAQ(){
        // View isn't created yet
        return view("metronic/faq_View");
    }
    // DELETE WHEN DONE
    function asdf()  {
        return view("metronic/Aside_template");
    }
}
