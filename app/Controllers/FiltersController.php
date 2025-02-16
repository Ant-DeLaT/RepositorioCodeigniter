<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;


class FiltersController implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // Do something here
        // THIS IS BEFORE FILTERING, USED FOR REDIRECTING (if needed)
        if (!(url_is("/users/*")||url_is("*/activity/*"))) {
            return response();
        }

    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
        if (url_is("/users/*")) {
            // This is for the main dashboard



        }elseif(url_is("/activity/*")){
            // This  is for the secondary
        }


    }
}