<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Session\Session;
use Psr\Log\LoggerInterface;

abstract class BaseController extends Controller
{
    protected Session $session;

    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger): void
    {
        // $this->helpers = ['form', 'url'];

        parent::initController($request, $response, $logger);

        /** @var Session $session */
        $session = service('session');
        $this->session = $session;
    }
}