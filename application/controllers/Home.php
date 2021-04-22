<?php defined("BASEPATH") OR exit("No direct script access allowed");

/**
 * 
 */
class Home extends CI_Controller {
	
	public function index() {
		$this->checkSeating();
	}

	public function login() {

		$this->load->model("homeModel");
		$response = array("error" => false);

		if (!isset($_POST['username']) && !isset($_POST['password'])) {
			$this->load->view('login');
		}
		else {

			$username = $this->input->post("username", TRUE);
			$password = $this->input->post("password", TRUE);

			$user = $this->homeModel->getUser($username, $password);
			if ($user) {
				
				$this->session->set_userdata('username', $username);
				echo "Helloworld";
			}
			else {

				$response['error'] = TRUE;
				$response['errorMessage'] = "Username OR Password Not Correct.";
				$this->load->view('login', $response);
			}
		}
	}

	public function test() {
		$this->load->model("homeModel");

		$code = "COM 111";

		$c = $this->homeModel->seatID($code);

		if ($c != null) {
			$c = explode(",", $c->course_code);
		}

		foreach ($c as $key => $value) {
			if ($value == $code) {
				echo $value;
			}
		}
	}

	public function checkSeating() {

		$this->load->model("homeModel");
		$response = array("error" => false);

		if (!isset($_POST['matric']) && !isset($_POST['course'])) {

			$data['courses'] = $this->homeModel->getCourse();
			$this->load->view('check', $data);
		}
		else {

			$matric = $this->input->post('matric', TRUE);
			$course = $this->input->post('course', TRUE);

			$student = $this->homeModel->getStudent($matric);

			if ($student != null) {
				
				$code = $student->department . " " . $student->id;

				$seat = $this->homeModel->seatID($course);

				$seatID = $seat->id;

				$c = "";

				$codes = explode(",", $seat->course_code);

				foreach ($codes as $key => $value) {
					if ($value == $code) {
						$c = $value;

						echo $value;
					}
				}

				$temp = "";

				if ($seatID) {

					$ar = $this->homeModel->getSeatNo($code, $seatID);

					if ($ar != null) {

						$row = explode(",", $ar->row);

						foreach ($row as $key => $value) {

							if ($value == $code) {
								$temp = $value;
							}
						}

						$val = explode(" ", $temp);

						$data['others'] = $row;
						$data['matric'] = $matric;
						$data['code'] = $code;
						$data['rowNo'] = $val[sizeof($val) - 1];
						$data['hall'] = $seat->hall;
						$this->load->view('info', $data);
					}
					else {
						echo "No Arrangment has been made for " . $course;
					}
				}
			}
			else {

				$response['error'] = TRUE;
				$response['errorMessage'] = "Matric Number Not Found.";
				$this->load->view('check', $response);
			}
		}
	}

	public function seating($code = null) {
		
		if (!empty($code)) {
			$this->load->model('homeModel');

			$course = $this->homeModel->getCourseId(urldecode($code));
			if ($course != null) {
				$id = $course->id;
				$seatings = $this->homeModel->seatings($id);
				$data['seatings'] = $seatings;
				$data['seat'] = $course;
				$this->load->view('view_seat', $data);
			}
			else {
				echo "No Record Found";
			}
		}
	}
}