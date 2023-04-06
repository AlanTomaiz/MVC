<?php

/**
 * Developer: Alanderson Tomaiz
 * Date: 07/04/2022
 * Time: 15:51
 */

namespace Source\Core;

class Model extends Database
{
	/**
	 * The primary key for the table.
	 *
	 * @access protected
	 * @var    string
	 */
	protected $_primaryKey = 'id';

	/**
	 * Which columns we want to select.
	 *
	 * @access private
	 * @var    array
	 */
	private $_select = array();

	/**
	 * The tables that we wish to select data from.
	 *
	 * @access private
	 * @var    array
	 */
	private $_from = array();

	/**
	 * The clause conditions for where and having to apply to the query.
	 *
	 * @access private
	 * @var    array
	 */
	private $_clause = array();

	/**
	 * The having conditions to apply.
	 *
	 * @access private
	 * @var    array
	 */
	private $_having = array();

	/**
	 * How our queries should be grouped.
	 *
	 * @access private
	 * @var    array
	 */
	private $_group = array();

	/**
	 * How we should order the returned rows.
	 *
	 * @access private
	 * @var    array
	 */
	private $_order = array();

	/**
	 * How we should limit the returned rows.
	 *
	 * @access private
	 * @var    array
	 */
	private $_limit = array();

	/**
	 * Data that has been passed to the row to insert/update.
	 *
	 * @access private
	 * @var    array
	 */
	private $_store = array();

	/**
	 * Data that will be passed to the query.
	 *
	 * @access private
	 * @var    array
	 */
	private $_data;

	/**
	 * Whether, after running a query, we should reset the model data.
	 *
	 * @access private
	 * @var    boolean
	 */
	private $_resetAfterQuery = true;

	/**
	 * Set a variable for the row.
	 *
	 * @access public
	 * @param  string $variable The field to manipulate.
	 * @param  mixed  $value    The field's value.
	 * @magic
	 */
	public function __set($variable, $value)
	{
		$this->_store[$variable] = $value;
	}

	/**
	 * Get a field value.
	 *
	 * @access public
	 * @param  string         $field The name of the field.
	 * @return string|boolean String if exists, boolean false otherwise.
	 */
	public function __get($field)
	{
		return isset($this->_store[$field])
			? $this->_store[$field]
			: false;
	}

	/**
	 * Reset the query ready for the next one to avoid contamination.
	 * Note: This function is called everytime we have run a query automatically.
	 *
	 * @access public
	 */
	public function reset()
	{
		$this->_select = array();
		$this->_from   = array();
		$this->_clause = array();
		$this->_having = array();
		$this->_group  = array();
		$this->_order  = array();
		$this->_limit  = array();
		$this->_data   = array();
		$this->_store  = array();
	}
}
