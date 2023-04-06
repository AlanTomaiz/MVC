<?php

/**
 * Developer: Alanderson Tomaiz
 * Date: 06/04/2022
 */

namespace Source\Core;

class Route
{

  /** @var array|null */
  private $allRouters;

  /** @var array */
  private $routeRegex = array(
    "{id}" => "([0-9]{1,})",
    "{string}" => "([a-zA-Z_]*)",
    "{any}" => "([a-zA-Z0-9-_\.\=\&\%\@\!\'\"\(\)\+\*\;\,]+)",
  );

  /** @return void */
  public function dispatch()
  {
    $actualRoute = $this->getCurrentRoute();
    $controller = $actualRoute['controller'];
    $method = $actualRoute['method'];
    $data = $actualRoute['data'];

    $this->instantiateController($controller, $method, $data);
  }

  /** @return array */
  private function getCurrentRoute()
  {
    $routeAlias = substr($this->getUrlFullName(), 1);

    // Set bar if empty route
    if ($routeAlias == '') $routeAlias = '/';
    $barInActualRoute = substr_count($routeAlias, '/');

    // Get All similar routes
    $filterRoutes = array_filter($this->allRouters, function ($route) use ($barInActualRoute) {
      return substr_count($route['alias'], '/') === $barInActualRoute;
    });

    // Get routes with similar regex
    $filterRoutes = array_filter($filterRoutes, function ($route) use ($routeAlias) {
      $route = str_replace('/', '\/', $route['route']);
      return preg_match("/^{$route}/", $routeAlias, $matches);
    });

    // Get routes with similar method
    $filterRoutes = array_filter($filterRoutes, function ($route) {
      return $route['type'] == $_SERVER['REQUEST_METHOD'];
    });

    // Route does not found!
    if (!count($filterRoutes)) {
      require_once(ROOT_DIR . "/src/Views/theme/404.php");
      exit;
    }

    $filterRoutes = $this->getParamsData($filterRoutes);

    return current($filterRoutes);
  }

  /**
   * @var array $routes
   * @return array
   */
  protected function getParamsData($routes)
  {
    $routeAlias = $this->getUrlFullName();

    return array_map(function ($route) use ($routeAlias) {
      $routeParsed = str_replace('/', '\/', $route['route']);
      preg_match("/^{$routeParsed}/", $routeAlias, $match);
      array_shift($match);

      $route['data'] = $match;
      return $route;
    }, $routes);
  }

  /** @return string */
  protected function getUrlFullName()
  {
    $parseRoute = strrchr($_SERVER["REQUEST_URI"], "?");
    $parseRoute = str_replace($parseRoute, "", $_SERVER["REQUEST_URI"]);

    return $parseRoute;
  }

  /**
   * @param int $position
   * @return string
   */
  protected function getUrlParamName($position)
  {
    $parseRoute = $this->getUrlFullName();
    $parseRoute = explode("/", $parseRoute);
    array_shift($parseRoute);

    return @$parseRoute[$position];
  }

  /**
   * @param string $route
   * @param array $matches
   * @return string
   */
  protected function manipulateRouteRegex($route, $matches)
  {
    foreach ($matches as $regex) {
      $regexValue = isset($this->routeRegex[$regex]) ? $this->routeRegex[$regex] : '(.*?||)';
      $route = str_replace($regex, "?{$regexValue}", $route);
    }

    return $route;
  }

  /**
   * @param string $alias
   * @param string $method
   * @param string $type
   * @return void
   */
  private function create($alias, $method, $type)
  {
    $arrayExplode = explode('::', $method);

    preg_match_all("/\{([a-zA-Z0-9_-]+)\}/", $alias, $matches);
    $route = $this->manipulateRouteRegex($alias, $matches[0]);

    $this->allRouters[] = array(
      "controller"  => $arrayExplode[0],
      "method"      => $arrayExplode[1],
      "alias"       => $alias,
      "route"       => $route,
      "type"        => $type,
    );
  }

  /**
   * @param string $alias
   * @param string $method
   * @return void
   */
  public function get($alias, $method)
  {
    $this->create($alias, $method, "GET");
  }

  /**
   * @param string $alias
   * @param string $method
   * @return void
   */
  public function post($alias, $method)
  {
    $this->create($alias, $method, "POST");
  }

  /**
   * @param string $controller
   * @param string $method
   * @param array $data
   * @return void
   */
  protected function instantiateController($controller, $method, $data)
  {
    $controller = "Source\Controllers\\" . $controller;
    $controller = new $controller;
    $callArray = array($controller, $method);

    if (!count($data)) {
      call_user_func($callArray);
      return;
    }

    call_user_func_array($callArray, $data);
  }
}
