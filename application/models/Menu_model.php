<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu_model extends CI_Model {

	function menu() {
		$query = $this->db->query("SELECT * FROM menu ORDER BY id ASC");

		return $query->result();
	}

	function submenu($id_menu = NULL) {
		$query = $this->db->query("SELECT * FROM submenu WHERE id = $id_menu");

		return $query->result();
	}
}