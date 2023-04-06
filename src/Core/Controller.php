<?php

/**
 * Developer: Alanderson Tomaiz
 * Date: 06/04/2022
 */

namespace Source\Core;

class Controller
{
  /**
   * Instance of the view.
   *
   * @access public
   * @var    View
   */
  public $view;

  /**
   * Set layout.
   *
   * @access public
   * @param  string $layout Which layout to use.
   * @param  string $data Set variables to use.
   */
  public function setLayout($layout, $data = array())
  {
    $this->view = new View();
    $this->view->view($layout, $data);
  }

  /**
   * Get variables of the POST method request.
   *
   * @access public
   * @return stdClass
   */
  public function post()
  {
    return (object) $_POST;
  }

  /**
   * Get variables of the GET method request.
   *
   * @access public
   * @return stdClass
   */
  protected function get()
  {
    return (object) $_GET;
  }

  /**
   * Redirect the user to a new page.
   *
   * @access public
   * @param  string $url The URL that we wish to redirect to.
   */
  public function redirect($url)
  {
    header('Location: ' . $url);
    exit();
  }
}
