<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

class Template
{
	var $template_data = array();

	function set($name, $value)
	{
		$this->template_data[$name] = $value;
	}

	function load($template = '', $view = '', $view_data = array(), $return = FALSE)
	{
		$this->CI = &get_instance();
		$role = $this->CI->session->userdata('role');
		if ($role == 1) {
			$sidebar = "sidebar";
		}
		$this->set('contents', $this->CI->load->view($view, $view_data, TRUE));
		$this->set('sidebar', $sidebar);
		return $this->CI->load->view($template, $this->template_data, $return);
	}
}
