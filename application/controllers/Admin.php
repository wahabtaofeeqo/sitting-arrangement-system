<?php defined("BASEPATH") OR exit("No direct script access allowed");

/**
 * 
 */
class Admin extends CI_Controller {
	
	public function index() {
		
		if (!$this->session->has_userdata('adminEmail')) {
			redirect('../../login');
		}
		else {

			echo $this->session->username;
			$this->load->model('homeModel');

			$data['seatings'] = $this->homeModel->getSeatings();
			$data['page'] = 'home';
			$this->load->view('home', $data);
		}
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
				
				$this->session->set_userdata('adminEmail', $username);
				$this->session->set_userdata('adminName', $user->firstname);
				redirect('../../home');
			}
			else {

				$response['error'] = TRUE;
				$response['errorMessage'] = "Username OR Password Not Correct.";
				$this->load->view('login', $response);
			}
		}
	}

	public function logout() {

		$this->load->model('homeModel');

		$seats = $this->homeModel->getNullSeats();

		if ($seats != null) {
			foreach ($seats as $key => $value) {
				$this->homeModel->deleteSeat($value->id);
			}
		}

		unset($_SESSION['adminEmail']);
		unset($_SESSION['adminName']);

		session_destroy();

		redirect('../../login');
	}

	public function newArrangement() {
		if (!isset($_POST['room']) && !isset($_POST['depts'])) {

			$this->load->model('homeModel');

			$data['page'] = 'seating';
			$data['hall'] = $this->homeModel->getHall();
			$data['depts'] = $this->homeModel->departments();
			$data['courses'] = $this->homeModel->getCourse();
			$data['invigilators'] = $this->homeModel->getInvigilators();
			$this->load->view('home', $data);
		}
		else {

			$this->load->model('homeModel');

			$room = $this->input->post('hall', TRUE);
			$code = $this->input->post('code', TRUE);
			$date = $this->input->post('date', TRUE);
			$time = $this->input->post('time', TRUE);
			$perRow = $this->input->post('perRow', TRUE);
			$invigilators = $this->input->post('invigilators', TRUE);
			$departments = $this->input->post('departments', TRUE);

			// Number of departments
			$counts = intval($this->input->post('depts', TRUE));
			$departmentTotal = array();

			if (empty($invigilators)) {
				echo "Please select Exam Invigilators";
				exit();
			}

			// capacity of hall
			$capacity = $this->homeModel->getCapacity($room);

			if ($counts != sizeof($departments)) {
				echo "Number of departments must be equal to selected departments";
				exit();
			}

			$total = $this->input->post('counts');

			$total = explode(",", $total);

			if (sizeof($total) != sizeof($departments)) {
				echo "Selected departments is not equal to the specified nummber of students";
				exit();
			}

			$totalSum = 0;
			for ($i=0; $i < sizeof($total); $i++) { 
				$totalSum = $totalSum + intval($total[$i]);
				$departmentTotal[] = intval($total[$i]);
			}

			if ($totalSum > $capacity) {
				echo "Hall capacity is not equal to the number of students";
				exit();
			}

			$code = join(",", $code);
			
			$data = array(
				'hall' => $room,
				'course_code' => $code,
				'exam_date' => $date,
				'exam_time' => $time,
				'invigilators' => join(",", $invigilators));

			$seatID = $this->homeModel->addSeating($data);

			// Number of rows

			$perRow = intval($perRow);
			$rows = ceil($capacity / $perRow);
			$counter = 0;
			$deptC = 0;
			$index = -1;
			$iterate = -1; 
			$seats = array();

			for($i = 1; $i <= $rows; $i++) {

				$counter++;
				$row = array();

				if ($i % 2 == 0) {

					for ($j=0; $j < $perRow; $j++) { 

						if ($j == sizeof($departments)) {
							$counter++;
						}

						$put;
						if (($index + 1) == sizeof($departmentTotal)) {
							$index = 0;
						}
						else {
							$index++;
						}

						if ($counter <= $departmentTotal[$index]) {
							$put = $departments[$index] . " " . $counter;
						}
						else {
							$put = "";
						}

						$row[] = $put; 
					}
				}
				else {

					for ($j = $perRow - 1; $j >= 0; $j--) { 

						$iterate++;
						if ($iterate == sizeof($departments)) {
							$counter++;
						}

						$put;

						if (($index + 1) == sizeof($departmentTotal)) {
							$index = 0;
						}
						else {
							$index++;
						}

						if ($counter <= $departmentTotal[$index]) {
							$put = $departments[$index] . " " . $counter;
						}
						else {
							$put = "";
						}

						$row[] = $put;
						
					}
				}

				$last = sizeof($seats) - 1;
				$lastRow;

				if ($last >= 0) {

					$lastRow = $seats[$last];

					foreach ($lastRow as $key => $value) {
						$c = explode(" ", $value);
						$d = explode(" ", $row[$key]);

						if ($c[0] == $d[0]) {

							$swap = 0;
							if (($key + 1) < sizeof($row)) {
								$swap = $key + 1;
							}

							$temp = $row[$key];

							$row[$key] = $row[$swap];
							$row[$swap] = $temp;
						}
					}
				}

				$seats[] = $row;
			}

			$this->addSeats($seats, $seatID);

			$response = array();
			$response['seats'] = $seats;
			$response['code'] = $code;
			$response['seatID'] = $seatID;
			$response['page'] = 'arrange';
			$this->load->view('home', $response);
		}
	}

	private function addSeats($seats, $seatID) {

		$this->load->model('homeModel');

		if (!empty($seats) || sizeof($seats) != 0) {
			
			foreach ($seats as $key => $value) {
				if (is_array($value)) {
					
					$row = join(",", $value);

					$data = array(
						'seats_id' => $seatID,
						'row' => $row);

					$this->homeModel->addRow($data);
				}
			}
		}
	}

	public function confirmSeating() {
		$id = $this->input->post('seatid', TRUE);

		if ($id != null) {
			$id = intval($id);

			$this->load->model('homeModel');

			$data = array(
				'status' => 1);

			$this->homeModel->confirmSeating($data, $id);

			redirect('../../home');
		}
		else {
			echo "Error, Can not Save Data";
		}
	}

	public function hall() {

		if (!isset($_POST['name']) && !isset($_POST['capacity'])) {
			$data['page'] = 'add_hall';
			$this->load->view('home', $data);
		}
		else {
			$this->load->model('homeModel');

			$name = $this->input->post('name', TRUE);
			$capacity = $this->input->post('capacity', TRUE);

			$data = array(
				'name' => $name,
				'capacity' => intval($capacity));

			$this->homeModel->addHall($data);

			$data['page'] = 'add_hall';
			$data['error'] = FALSE;
			$data['message'] = "Hall has been added Successfully";
			$this->load->view('home', $data);
		}
	}

	public function viewHall() {

		$this->load->model('homeModel');

		$data['page'] = 'view_hall';
		$data['hall'] = $this->homeModel->getHall();
		$this->load->view('home', $data);
	}


	public function student() {

		if (!isset($_POST['temp'])) {

			$data['page'] = 'add_student';
			$this->load->view('home', $data);
		}
		else {
			$this->load->model('homeModel');

			include_once 'SimpleXLSX.php';
			$base = "C:/xampp/htdocs/arrangement/uploads";

			$response = $this->uploadFile('students');

			if (!$response['error']) {

				$filename = $response['data']['file_name'];
				if ( $xlsx = SimpleXLSX::parse($base . '/' . $filename) ) {
			   	
				   	foreach ($xlsx->rows() as $key => $value) {

				   		$data = array(
				   			'name' => $value[0],
				   			'matric' => $value[1],
				   			'department' => $value[2],
				   			'level' => $value[3],
				   			'phone' => $value[4],
				   			'email' => $value[5]);

				   		$this->homeModel->addStudent($data);
				   	}

				   	$data['page'] = 'add_student';
					$data['error'] = FALSE;
					$data['message'] = "Students have been added Successfully";
					$this->load->view('home', $data);
				} else {

				    	$data['page'] = 'add_student';
						$data['error'] = TRUE;
						$data['errorMessage'] = SimpleXLSX::parseError();
						$this->load->view('home', $data);
				}
			}
			else {

				$data['page'] = 'add_student';
				$data['error'] = TRUE;
				$data['errorMessage'] = "File Format not supported";
				$this->load->view('home', $data);
			}
		}
	}


	public function viewStudent() {

		$this->load->model('homeModel');

		$data['page'] = 'view_student';
		$data['students'] = $this->homeModel->students();
		$this->load->view('home', $data);
	}

	public function uploadFile($filename) {

		$response = array('error' => FALSE);

		$config['upload_path']          = './uploads/';
        $config['allowed_types']        = 'xlsx';

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload($filename)) {

			$response['error'] = TRUE;
			$response['errorMessage'] = $this->upload->display_errors();
		}
		else {
			$response['error'] = FALSE;
			$response['data'] = $this->upload->data();
		}

		return $response;
	}


	public function course() {

		if (!isset($_POST['title']) && !isset($_POST['code'])) {
			$data['page'] = 'add_course';
			$this->load->view('home', $data);
		}
		else {
			$this->load->model('homeModel');

			$code = $this->input->post('code', TRUE);
			$title = $this->input->post('title', TRUE);

			$data = array(
				'code' => $code,
				'title' => $title);

			$this->homeModel->addCourse($data);

			$data['page'] = 'add_course';
			$data['error'] = FALSE;
			$data['message'] = "Course has been added Successfully";
			$this->load->view('home', $data);
		}
	}

	public function viewCourse() {

		$this->load->model('homeModel');

		$data['page'] = 'view_course';
		$data['courses'] = $this->homeModel->getCourse();
		$this->load->view('home', $data);
	}

	public function invigilator() {

		if (!isset($_POST['name']) && !isset($_POST['post'])) {
			$data['page'] = 'add_invigilator';
			$this->load->view('home', $data);
		}
		else {
			$this->load->model('homeModel');

			$name = $this->input->post('name', TRUE);
			$post = $this->input->post('post', TRUE);

			$data = array(
				'name' => $name,
				'post' => $post);

			$this->homeModel->addInvigilator($data);

			$data['page'] = 'add_course';
			$data['error'] = FALSE;
			$data['message'] = "Examiner has been added Successfully";
			$this->load->view('home', $data);
		}
	}

	public function viewInvigilators() {
		$this->load->model('homeModel');

		$data['page'] = 'view_invigilator';
		$data['examiners'] = $this->homeModel->getInvigilators();
		$this->load->view('home', $data);
	}



	public function addAdmin() {

		if (!isset($_POST['firstname']) && !isset($_POST['email'])) {
			$data['page'] = 'add_admin';
			$this->load->view('home', $data);
		}
		else {
			$this->load->model('homeModel');

			$firstname = $this->input->post('firstname', TRUE);
			$lastname = $this->input->post('lastname', TRUE);
			$email = $this->input->post('email', TRUE);
			$phone = $this->input->post('phone', TRUE);
			$password = $this->input->post('password', TRUE);

			$data = array(
				'firstname' => $firstname,
				'lastname' => $lastname,
				'email' => $email,
				'phone' => $phone,
				'password' => $password);

			$this->homeModel->addUser($data);

			$data['page'] = 'add_admin';
			$data['error'] = FALSE;
			$data['message'] = "Admin has been added Successfully";
			$this->load->view('home', $data);
		}
	}

	public function viewAdmin() {
		$this->load->model('homeModel');

		$data['page'] = 'view_admin';
		$data['admins'] = $this->homeModel->getUsers();
		$this->load->view('home', $data);
	}


	public function seatings($id = 0) {
		if ($id == 0) {
			echo "No ID";
		}
		else {

			$this->load->model('homeModel');

			$data['page'] = 'seatings';
			$data['seatings'] = $this->homeModel->seatings($id);
			$data['seat'] = $this->homeModel->getSeat($id);
			$this->load->view('seatings', $data);
		}
	}

	public function delete() {
		$table = $this->input->post('table');
		$id = $this->input->post('id');

		if ($table != null && $id != null) {

			$this->load->model('homeModel');	
			$this->homeModel->deleteRow($table, $id);

			echo json_encode("Record Deleted Successfully");
		}
	}

	public function test() {

		$counter = 0;
		// Row
		for ($i=0; $i < $rows; $i++) { 

			// Column
			for ($j=0; $j <= $col; $j++) { 
				
				if ($counter <= 20) {
					$counter++;
				}

				if ($j % 2 == 1) {

					echo "A" . ($counter+1) . "B" . ($counter+1) . "C" . ($counter+1) . "<br>";
				}
				else {
					echo "B" . ($counter+1) . "C" . ($counter+1) . "A" . ($counter+1) . "<br>";
				}
			}
		}
	}
}