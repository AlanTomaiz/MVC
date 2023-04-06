<?php

/**
 * Developer: Alanderson Tomaiz
 * Date: 06/04/2022
 */

namespace Source\Core;

class Session {
	/**
   * @return void
	 */
  public static function start() {
		try {
			session_start();
	 } catch(\ErrorExpression $e) {
			session_regenerate_id();
			session_start();
	 }
  }

	/**
	 * @param string $name
	 * @param $value
	 * @return void
	 */
  public static function set($name, $value) {
    $_SESSION[$name] = $value;
  }

	/**
	 * @param string $name
   * @return void|bool
	 */
  public static function get($name) {
    return isset($_SESSION[$name])
            ? $_SESSION[$name]
            : false;
  }

	/**
	 * @param string $name
	 * @return bool
	 */
	public static function rem($name) {
		if (isset($_SESSION[$name])) {
				unset($_SESSION[$name]);
				return true;
		}

		return false;
	}

	/** @return void */
	public static function singout() {
		session_destroy();

	}

}