<?php

/**
 * Developer: Alanderson Tomaiz
 * Date: 06/04/2023
 */

namespace Source\Core;

class Database
{
	/**
	 * The connection to the database.
	 *
	 * @access protected
	 * @var    \PDO
	 */
	protected $_connection;

	/**
	 * The query that we have just run.
	 *
	 * @access protected
	 * @var    \PDOStatement
	 */
	protected $_statement;

	protected static function connect()
	{
		if (!isset($instance)) {
			$error_mode = !DISPLAY_ERRORS
				? \PDO::ERRMODE_SILENT : \PDO::ERRMODE_WARNING;

			try {
				// Connect to the database
				$this->_connection = new \PDO(
					"mysql:host=" . CONF_DB_HOST . ";dbname=" . CONF_DB_NAME,
					CONF_DB_USER,
					CONF_DB_PASS,
					array(
						\PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
						\PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_OBJ,
						\PDO::ATTR_CASE => \PDO::CASE_NATURAL,
					)
				);
			} catch (\PDOException $error) {
				if (ENVIRONMENT == 'dev') {
					pr($error, true);
				}

				die('<p>Sorry, we were unable to complete your request.</p>');
			}
		}
	}

	/**
	 * Execute an SQL statement on the database.
	 *
	 * @access protected
	 * @param  string    $sql   The SQL statement to run.
	 * @param  array     $data  The data to pass into the prepared statement.
	 * @param  boolean   $reset Whether we should reset the model data.
	 * @return boolean
	 */
	protected function run($sql, $data = array(), $reset = true)
	{
		// If we do not have a connection then establish one
		if (!$this->_connection) {
			$this->connect();
		}

		// Prepare, execute, reset, and return the outcome
		$this->_statement = $this->_connection->prepare($sql);
		$result = $this->_statement->execute($data);

		if ($reset) {
			$this->reset();
		}

		return $result;
	}
}
