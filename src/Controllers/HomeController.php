<?php

/**
 * Developer: Alanderson Tomaiz
 * Date: 06/04/2022
 */

namespace Source\Controllers;

use Source\Core\Controller;

class HomeController extends Controller
{
  public function index()
  {
    $this->setLayout('pages/Dashboard');
  }
}
