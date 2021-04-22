<?php defined("BASEPATH") OR exit("No direct script access allowed");

/**
 * 
 */
class HomeModel extends CI_Model {

	public function addSeating($data) {
		$this->db->insert('seats', $data);
		return $this->db->insert_id();
	}

	public function seatings($id) {
		$sql = "SELECT seats.*, seatings.row FROM seats, seatings WHERE seats.id = seatings.seats_id AND seats.id = $id";

		$query = $this->db->query($sql);
		return $query->result();
	}

	public function getSeat($id) {
		$query = $this->db->get_where('seats', array('id' => $id));
		return $query->row();
	}

	public function departments() {
		$query = $this->db->query("SELECT DISTINCT department FROM students");
		return $query->result();
	}
	public function addStudent($data) {
		$this->db->insert('students', $data);
		return $this->db->insert_id();
	}

	public function addRow($data) {
		$this->db->insert('seatings', $data);
	}

	public function deleteRow($table, $id) {
		$this->db->delete($table, array('id' => $id));
	}

	public function getSeatings() {
		$sql = "SELECT seats.*, hall.capacity FROM seats, hall WHERE seats.hall = hall.name AND seats.status = 1 ORDER BY id DESC";
		$query = $this->db->query($sql);

		return $query->result();
	}

	public function getNullSeats() {
		$this->db->select('id');
		$query = $this->db->get_where('seats', array('status' => 0));

		return $query->result();
	}
	public function deleteSeat($id) {
		$this->db->delete('seatings', array('seats_id' => $id));
		$this->db->delete('seats', array('id' => $id));
	}

	public function seatID($code) {

		$this->db->like('course_code', $code);
		$query = $this->db->get('seats');

		return $query->row();
	}
	public function getSeatNo($code, $id) {
		$this->db->like('row', $code);
		$this->db->where('seats_id', $id);
		$query = $this->db->get('seatings');

		return $query->row();
	}

	public function getCapacity($name) {
		$query = $this->db->query("SELECT capacity FROM hall WHERE name = '$name'");
		return $query->row()->capacity;
	}

	public function addCourse($data) {
		$this->db->insert('course', $data);
	}

	public function getCourse() {
		$query = $this->db->query("SELECT * FROM course");
		return $query->result();
	}

	public function addHall($data) {
		$this->db->insert('hall', $data);
	}

	public function getHall() {
		$query = $this->db->query("SELECT * FROM hall");
		return $query->result();
	}

	public function addInvigilator($data) {
		$this->db->insert('invigilators', $data);
	}

	public function getInvigilators() {
		$query = $this->db->get('invigilators');
		return $query->result();
	}

	public function confirmSeating($data, $id) {
		$this->db->update('seats', $data, array('id' => $id));

		return $this->db->affected_rows();
	}

	public function admins() {
		return $this->db->get('admins')->result();
	}

	public function checkAdmin($email) {

		$query = $this->db->get_where('admins', array('email' => $email));

		if ($query->num_rows() > 0) {
			return true;
		}
		else {
			return false;
		}
	}

	public function getUser($username, $password) {

		$query = $this->db->get_where("users", array("email" => $username, "password" => md5($password)));

		return $query->row();
	}

	public function getUserWithEmail($username) {

		$query = $this->db->get_where("customers", array("username" => $username));

		return $query->row();
	}

	public function getUserId($email) {

		$this->db->select("id");
		$query = $this->db->get_where("customers", array("email" => $email));

		$id = 0;

		if ($query->num_rows() > 0) {
			$id = $query->row()->id;
		}

		return $id;
	}


	public function getUserWithID($userid) {

		$query = $this->db->get_where("customers", array("id" => $userid));

		if ($query->num_rows() > 0) {
			return $query->row();
		}
		else {
			return false;
		}
	}

	public function hasEmail($username) {

		$this->db->select('id');
		$query = $this->db->get_where('customers', array('email' => $username));

		if ($query->num_rows() > 0)
			return true;
		else
			return false;
	}

	public function addUser($data) {

		$this->db->insert('users', $data);

		$id = $this->db->insert_id();

		if ($id > 0) {
			return true;
		}
		else {
			return false;
		}
	}

	public function getUsers() {
		$query = $this->db->get('users');
		return $query->result();
	}

	public function getAdmin($username, $password) {
		$query = $this->db->get_where('admins', array('email' => $username, 'password' => $password));
		return $query->row();
	}

	public function getStudent($matric) {
		$query = $this->db->get_where('students', array('matric' => $matric));
		return $query->row();
	}

	public function students() {

		$this->db->order_by('department', 'ASC');
		$query = $this->db->get('students');
		return $query->result();
	}

	public function getCourseId($code) {
		$query = $this->db->get_where('seats', array('course_code' => $code));
		return $query->row();
	}
}