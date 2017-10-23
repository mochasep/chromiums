<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	/**
	 * Text email Field
	 *
	 * @access public
	 * @param mixed
	 * @param string
	 * @param string
	 * @return string
	 */
if ( ! function_exists('form_email'))
{
	function form_email($data = '', $value = '', $extra = '')
	{
		$defaults = array(
			'type' => 'email',
			'name' => (( ! is_array($data)) ? $data : ''),
			'value' => $value
		);

	return "<input "._parse_form_attributes($data, $defaults).$extra." />";
	}
}

if ( ! function_exists('form_tel'))
{
	function form_tel($data = '', $value = '', $extra = '')
	{
		$defaults = array(
			'type' => 'tel',
			'name' => (( ! is_array($data)) ? $data : ''),
			'value' => $value
		);

	return "<input "._parse_form_attributes($data, $defaults).$extra." />";
	}
}

if ( ! function_exists('form_url'))
{
	function form_url($data = '', $value = '', $extra = '')
	{
		$defaults = array(
			'type' => 'url',
			'name' => (( ! is_array($data)) ? $data : ''),
			'value' => $value
		);

	return "<input "._parse_form_attributes($data, $defaults).$extra." />";
	}
}

if ( ! function_exists('form_date'))
{
	function form_date($data = '', $value = '', $extra = '')
	{
		$defaults = array(
			'type' => 'date',
			'name' => (( ! is_array($data)) ? $data : ''),
			'value' => $value
		);

	return "<input "._parse_form_attributes($data, $defaults).$extra." />";
	}
}
?>