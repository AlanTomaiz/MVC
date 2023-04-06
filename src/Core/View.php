<?php

/**
 * Developer: Alanderson Tomaiz
 * Date: 08/04/2022
 */

namespace Source\Core;

class View
{
  /** @var array */
  private $data;

  /** @var string */
  private $layout;

  /**
   * Parse a template.
   *
   * @access public
   */
  public function view($template, $data)
  {
    // Full path to View
    $layout = ROOT_DIR . "/src/Views/{$template}.php";
    $pathTheme = ROOT_DIR . "/src/Views/theme/default.php";

    if (!file_exists($layout)) {
      require_once(ROOT_DIR . "/src/Views/theme/404.php");
      exit;
    }

    $this->data = $data;
    $this->layout = $layout;
    require_once($pathTheme);
  }

  /**
   * Render the layout.
   *
   * @access public
   */
  public function render()
  {
    foreach ($this->data as $name => $value) {
      $$name = $value;
    }

    require_once($this->layout);
  }
}
