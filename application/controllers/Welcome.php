<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

    public function offense_count($id)
    {
        $this->load->model('model');
        $this->load->library('upload');
        if ($this->input->post("offenseNo") == "1") {
            $date = date('y-m-d');
            $block_date = date_create($date);
            date_add($block_date, date_interval_create_from_date_string("3 days"));
            echo date_format($block_date, "y-m-d");
            $status = "block";
        }
        if ($this->input->post("offenseNo") == "2") {
            $date = date('y-m-d');
            $block_date = date_create($date);
            date_add($block_date, date_interval_create_from_date_string("30 days"));
            echo date_format($block_date, "y-m-d");
            $status = "block";
        }
        if ($this->input->post("offenseNo") == "3") {
            $status = "banned";
            $block_date = date_create("0000-00-00");
        }
        $this->form_validation->set_rules("offenseNo", "offense number", 'numeric');
        $offense = array(
            "offense" => $this->input->post("offenseNo"),
            "block_end" => date_format($block_date, "y-m-d"),
            "status" => $status,
        );

        $this->model->update_offense_user($offense);
        $notif_insert = array(
            "user_id" => $id,
            "notif_type" => "user",
            "notif_status" => $status,
            "status" => "notified",
            "notif_name" => $status,

        );
        $this->model->insert_data_notifications($notif_insert);
        redirect(base_url() . "users");
    }
    public function changeoff()
    {
        $this->load->model('model');
        $this->load->library('upload');
        $block_date = date_create("0000-00-00");

        $offense = array(
            "block_end" => date_format($block_date, "y-m-d"),
            "status" => "verified",
        );

        $this->model->update_offense_user1($offense);
        echo '<script> alert("Account can now be used please login again");</script>';
        echo '<script> window.location.replace("login")</script>';

    }
    public function ban($id)
    {
        $this->load->model('model');
        $this->load->library('upload');
        $status = "banned";
        $ban = array("status" => $status);
        $this->model->update_ban_user($ban);
        $notif_insert = array(
            "user_id" => $id,
            "notif_type" => "user",
            "notif_status" => $status,
            "status" => "notified",
            "notif_name" => $status,

        );
        $this->model->insert_data_notifications($notif_insert);
        redirect(base_url() . "users");
    }
// delete start
    public function delete_user($id)
    {
        $this->load->model('model');
        $offense = array("status" => "hide");

        $this->model->update_hide_user($offense);
        $notif_insert = array(
            "user_id" => $id,
            "notif_type" => "user",
            "notif_status" => "removed",
            "status" => "notified",
            "notif_name" => "Removed User",

        );

        $this->model->insert_data_notifications($notif_insert);
        redirect(base_url() . "users");
    }
    public function delete_report($id)
    {
        $this->load->model('model');
        $offense = array("reports_status" => "hide");

        $this->model->update_hide_report($offense);

        $notif_insert = array(
            "report_id" => $id,
            "notif_type" => "report",
            "notif_status" => "removed",
            "status" => "notified",
            "notif_name" => "Removed Report",

        );

        $this->model->insert_data_notifications($notif_insert);
        redirect(base_url() . "reports");

    }
    public function delete_event($id)
    {
        $this->load->model('model');
        $offense = array("status" => "hide");

        $this->model->update_hide_event($offense);

        $notif_insert = array(
            "booking_id" => $id,
            "notif_type" => "event",
            "notif_status" => "cancel",
            "status" => "notified",
            "notif_name" => "Cancelled Event",

        );
        $this->model->insert_data_notifications($notif_insert);
        redirect(base_url() . "events");
    }

    public function delete_package($id)
    {
        $this->load->model('model');
        $offense = array("package_status" => "hide");

        $this->model->update_hide_package($offense);

        $notif_insert = array(
            "package_id" => $id,
            "notif_type" => "package",
            "notif_status" => "removed",
            "status" => "notified",
            "notif_name" => "Removed package",

        );
        $this->model->insert_data_notifications($notif_insert);
        redirect(base_url() . "services");

    }
// delete end

    public function block_page()
    {

        $this->load->view('/admin/block_page');
    }

    public function form_validation()
    {
        $this->load->library('form_validation');
        $this->load->library('upload');
        $this->form_validation->set_rules("fname", "first name", 'required');
        $this->form_validation->set_rules("lname", "last name", 'required');
        $this->form_validation->set_rules("password", "password", 'required|min_length[6]');
        $this->form_validation->set_rules("username", "username", 'required|min_length[6]');
        $this->form_validation->set_rules("contact_number", "contact number", 'required|integer|max_length[13]');
        $this->form_validation->set_rules("contact_number1", "contact number 2", 'integer|max_length[13]');
        $this->form_validation->set_rules("email", "email", 'required|valid_email');
        $this->form_validation->set_rules("usertype", "usertype", 'required');

        // if($_FILES['userfile']){
        //     $this->form_validation->set_rules('userfile', 'userfile', 'callback_file_check');
        // }

        $password = md5($this->input->post("password"));

        if ($this->form_validation->run()) {
            $timestamp = date('Y_m_d_H_i_s');
            $array = explode('.', $_FILES['userfile']['name']);
            $ext = end($array);

            // Upload Image
            $config['file_name'] = $timestamp . '.' . $ext;
            $config['upload_path'] = './assets/img/client/';
            $config['allowed_types'] = 'jpg|png';
            $config['max_size'] = '2048';
            $config['max_width'] = '50000';
            $config['max_height'] = '50000';

            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if (!$this->upload->do_upload()) {
                $errors = $this->upload->display_errors();
                $client_image = 'assets/img/client/no_image.jpg';
            } else {
                $data = array('upload_data' => $this->upload->data());
                $client_image = 'assets/img/client/' . $timestamp . '.' . $ext;
            }

            //             echo '<pre>';
            // print_r($_FILES);
            // echo $client_image;
            // echo $errors;
            // echo $config['upload_path'];
            // echo '</pre>';
            // die;

            $this->load->model("model");
            $status = "verified";
            $data_insert = array(
                "fname" => $this->input->post("fname"),
                "lname" => $this->input->post("lname"),
                "password" => $password,
                "username" => $this->input->post("username"),
                "telephone_1" => $this->input->post("contact_number"),
                "telephone_2" => $this->input->post("contact_number1"),
                "email" => $this->input->post("email"),
                "user_type" => $this->input->post("usertype"),
                "address" => $this->input->post("address"),
                "status" => $status,
                "created_at" => date('y-m-d'),
                "photo" => $client_image,
            );

            $this->model->insert_data_users($data_insert);
            if ($status == "verified") {
                $details = "has Created a new account";
                $notif_insert = array(
                    "user_id" => $this->db->insert_id(),
                    "notif_type" => "user",
                    "notif_status" => "created",
                    "status" => "notified",
                    "notif_name" => $this->input->post("fname"),

                );
                $this->model->insert_data_notifications($notif_insert);
            }

            redirect(base_url() . "users");
        } else {
            echo '<script> alert("invalid inputs, Try again");</script>';
            $this->load->model('model');
            $data["fetch_data_user"] = $this->model->fetch_data_user();
            $this->load->view('/admin/users', $data);
        }
    }

// report add
    public function form_validation_report()
    {
        $this->load->library('form_validation');
        $this->load->library('upload');

        // if($_FILES['userfile']){
        //     $this->form_validation->set_rules('userfile', 'userfile', 'callback_file_check');
        // }
        if ($this->form_validation->run()) {
            $timestamp = date('Y_m_d_H_i_s');
            $array = explode('.', $_FILES['userfile']['name']);
            $ext = end($array);

            // Upload Image
            $config['file_name'] = $timestamp . '.' . $ext;
            $config['upload_path'] = './assets/img/report/';
            $config['allowed_types'] = 'mp4|mkv|jpg|png';
            $config['max_size'] = '10048';
            $config['max_width'] = '50000';
            $config['max_height'] = '50000';

            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if (!$this->upload->do_upload()) {
                $errors = $this->upload->display_errors();
                $report_image = 'assets/img/report/no_image.jpg';
            } else {
                $data = array('upload_data' => $this->upload->data());
                $report_image = 'assets/img/report/' . $timestamp . '.' . $ext;

                echo '<pre>';
                print_r($_FILES);
                echo $report_image;
                echo $errors;
                echo $config['upload_path'];
                echo '</pre>';
                die;
            }

            $this->load->model("model");
            $data_insert = array(
                "booking_id" => $this->input->post("booking_id"),
                "report_from" => $this->input->post("report_from"),
                "report_to" => $this->input->post("violator"),
                "report_photo" => $report_image,
                "report_details" => $this->input->post("report_info"),

            );

        }
        // $notif_insert = array(
        //     "user_id"         => $this->input->post("report_from"),
        //     "notif_type"     => "report",
        //     "notif_status"     => "reporter",
        //     "status"         => "notified",
        //     "notif_name"     => "New report has been added",
        //     "report_id"        => $this->db->insert_id()
        // );
        // $notif_insert2 = array(
        //     "user_id"         => $this->input->post("violator"),
        //     "notif_type"     => "report",
        //     "notif_status"     => "reported",
        //     "status"         => "notified",
        //     "notif_name"     => "Account Reported",
        //     "report_id"        => $this->db->insert_id()
        // );
        //
        // $this->model->insert_data_notifications2($notif_insert2);
        redirect(base_url() . "reports");

    }

    public function form_validation_event()
    {
        $id = $this->uri->segment(2);
        $this->load->model("model");
        $this->db->where('package_id', $id);
        $temp = $this->db->get('packages');
        $data['package'] = $temp->row_array();
        $this->load->view('admin/addevent', $data);

    }
    public function booking_attempt()
    {
        $id = $this->uri->segment(2);
        $this->db->where('package_id', $id);
        $this->db->join('users', 'users.user_id = packages.owner');
        $this->db->select('packages.*, users.*');
        $temp = $this->db->get('packages');
        $data['package'] = $temp->row_array();

        $this->form_validation->set_rules('event_name', '', 'required', array('required' => 'Please Input Event Name'));
        $this->form_validation->set_rules('event_date', '', 'required', array('required' => 'No Date Selected'));
        $this->form_validation->set_rules('event_time', '', 'required', array('required' => 'No Time Selected'));
        $this->form_validation->set_rules('duration', '', 'required', array('required' => 'No Time Selected'));
        // $this->form_validation->set_rules('full_payment', '', 'required|numeric', array('required'=>'Please Input Payment', 'numeric'=> 'Please Input a valid amount'));
        $this->form_validation->set_rules('down_payment', '', 'required|numeric', array('required' => 'Please Input Payment', 'numeric' => 'Please Input a valid amount'));
        $this->form_validation->set_rules('location', '', 'required', array('required' => 'Location is required'));
        $this->form_validation->set_rules('notes', '', 'required', array('required' => 'Notes is required'));

        $data['event_name'] = $this->input->post('event_name');
        $data['event_date'] = $this->input->post('event_date');
        $data['event_time'] = $this->input->post('event_time');
        $data['duration'] = $this->input->post('duration');
        $data['down_payment'] = $this->input->post('down_payment');
        $data['location'] = $this->input->post('location');
        $data['notes'] = $this->input->post('notes');
//         echo '<pre>';
// print_r($data);
// echo '</pre>';
//         die;

        if ($this->form_validation->run() === false) {

            $this->load->view('admin/addevent', $data);
        } else {
            echo $data['date_error'] = $this->booking_model->check_date($data);
            echo '<br>';
            echo $data['time_error'] = $this->booking_model->check_time($data);

            if ($data['date_error'] || $data['time_error']) {
                $this->load->view('admin/addevent', $data);
            } else {
                $book_id = $this->booking_model->event_insert($data['package']);
                $this->session->set_flashdata('success_message', 'Event ' . $data['event_name'] . ' has been successfully booked!');
                redirect('booking');
            }
        }
    }
    public function event_insert($package)
    {
        $timestamps = date('Y-m-d');
        if ($this->input->post('down_payment') >= $package['price']) {
            $payment_status = 'paid';
        } else {
            $payment_status = 'dp';
        }

        // echo '<pre>';
        // print_r($package);
        // print_r($this->input->post());
        // echo '</pre>';
        // die;

        $data = array(
            'client_id' => $this->session->userdata('user_id'),
            'performer_id' => $package['owner'],
            'package_id' => $package['package_id'],
            'venue_name' => $this->input->post('location'),
            'event_date' => $this->input->post('event_date'),
            'event_from' => $this->input->post('duration'),
            'event_to' => $this->input->post('event_time'),
            'notes' => $this->input->post('notes'),
            'full_amount' => $package['price'],
            'down_payment' => $this->input->post('down_payment'),
            'payment_status' => $payment_status,
            'date_booked' => $timestamps,
            'event_name' => $this->input->post('event_name'),
            'artist_type' => $package['artist_type'],
        );

        $this->db->insert('bookings', $data);
        $id = $this->db->insert_id();
        // echo $this->db->last_query();
        // die();

        $this->db->set('booked', 1);
        $this->db->where('package_id', $package['package_id']);
        $this->db->update('packages');
        return $id;
    }
    public function get_packages()
    {
        $this->db->join('users', 'user_id = owner');
        $this->db->select('packages.*, artist_type');
        $query = $this->db->get_where('packages', array('booked' => 0));
        return $query->result_array();
    }
    public function check_date()
    {
        if ($this->input->post('event_date') < date('Y-m-d')) {
            return $data['date_error'] = 'Date selected is invalid';
        } else {
            return null;
        }
    }
    public function check_time()
    {
        if ($this->input->post('event_date') <= date('Y-m-d')) {
            if ($this->input->post('duration') < date('H:i')) {
                return $data['time_error'] = 'Time selected is already passed';
            } else {
                return null;
            }
        } else {
            return null;
        }
    }
// search start
    public function search_results($page = 0)
    {
        $this->load->model('model');

		/*
        if ($this->input->post('usertype') == 'admin') {
            $usertype = "admin";
        } else if ($this->input->post('usertype') == 'client') {
            $usertype = "client";
        } else if ($this->input->post('usertype') == 'performer') {
            $usertype = "performer";
        } else {
            $usertype = "*";
        }
        if ($this->input->post('status') == 'verified') {
            $status = "verified";
        } else if ($this->input->post('status') == 'block') {
            $status = "block";
        } else if ($this->input->post('status') == 'banned') {
            $status = "banned";
        } else {
            $status = "*";
		}
		*/

		$where = array();
		if ($this->input->get('user_type') != '') {
			$where['user_type'] = $this->input->get('user_type'); 
		}
		if ($this->input->get('status') != '') {
            $where['status'] = $this->input->get('status'); 
            
        }
        
     
		// $this->model->query_results_user($usertype, $status);
		// $this->model->query_results_user($where);
		// $data["query_results_user"] = $this->model->query_results_user($usertype, $status);

        $total_rows = $this->model->count_results_user($where);
        // echo $total_rows;exit();
		
		$rpg = 2;

		$config['base_url'] = site_url('users');
		$config['total_rows'] = $total_rows;
		$config['per_page'] = $rpg;
		$config['reuse_query_string'] = true;
		$config['uri_segment'] = 2;
		
		$this->pagination->initialize($config);

		$data['pagination'] = $this->pagination->create_links();

		// $page = 1;

		$data["query_results_user"] = $this->model->query_results_user($where, $rpg, $page);
		$data['where'] = $where;
        $this->load->view('/admin/users', $data);
    }

    public function search_results_report()
    {
        $this->load->model('model');
        if ($this->input->post('user_id') == '') {
            $user_id = "*";
        } else {
            $user_id = $this->input->post('user_id');
        }
        $this->model->query_results_report($user_id);
        $data["query_results_report"] = $this->model->query_results_report($user_id);
        $data["fetch_data_user"] = $this->model->fetch_data_user();
        $data["fetch_data_event"] = $this->model->fetch_data_event();
        $this->load->view('/admin/search_report', $data);
    }

    public function search_results_package()
    {
		$this->load->model('model');
		/*
        if ($this->input->post('user_id') == '') {
            $user_id = "*";
        } else {
            $user_id = $this->input->post('user_id');
		}
		*/
		$where = array();
		if ($this->input->get("user_id")) {
			$where['owner'] = $this->input->get("user_id");
		}
        // $this->model->query_results_package($where);
        $data["query_results_package"] = $this->model->query_results_package($where);
        $data["fetch_data_perf"] = $this->model->fetch_data_perf();
        $data["fetch_data_notifications_count"] = $this->model->fetch_data_notifications_count();
        $this->load->view('/admin/search_package', $data);
    }

    public function search_results_events()
    {
        $this->load->model('model');

        if ($this->input->post('date') == '') {
            $date_event = "*";

        } else {
            $date_event = $this->input->post('date');
        }

        if ($this->input->post('name') == '') {
            $name = "*";
        } else {
            $name = $this->input->post('name');
        }

        $this->model->query_data_event($date_event, $name);
        $data["query_data_event"] = $this->model->query_data_event($date_event, $name);
        $data["fetch_data_notifications_count"] = $this->model->fetch_data_notifications_count();
        $this->load->view('/admin/search_event', $data);
    }
    public function search_results_history()
    {
        $this->load->model('model');

        if ($this->input->post('date') == '') {
            $date_event = "*";

        } else {
            $date_event = $this->input->post('date');
        }

        if ($this->input->post('name') == '') {
            $name = "*";
        } else {
            $name = $this->input->post('name');
        }
        $this->model->query_data_event_history($date_event, $name);
        $data["query_data_event_history"] = $this->model->query_data_event_history($date_event, $name);
        $data["fetch_data_notifications_count"] = $this->model->fetch_data_notifications_count();
        $this->load->view('/admin/search_event_history', $data);
    }
// search_end
    public function services()
    {
		$this->load->model('model');
		$this->load->library('pagination');

		$config['base_url']=site_url('services');
		// $config['total_rows']=$total_rows;
		$config['per_page']="10";

		$config['reuse_query_string']='true';
		$this->pagination->initialize($config);
		// $data['pagination']=$this->pagination->create_links();
        $data["fetch_data_packages"] = $this->model->fetch_data_packages();
        $data["fetch_data_perf"] = $this->model->fetch_data_perf();
        $data["fetch_data_notifications_count"] = $this->model->fetch_data_notifications_count();
        $this->load->view('/admin/services', $data);
    }
    public function history()
    {
        $this->load->model('model');
        $data["fetch_data_history"] = $this->model->fetch_data_history();
        $data["fetch_data_notifications_count"] = $this->model->fetch_data_notifications_count();
        $this->load->view('/admin/history', $data);
    }
    public function histview($id)
    {
        $this->load->model('model');
        $data["fetch_data_histview"] = $this->model->fetch_data_histview();
        $data["fetch_data_notifications_count"] = $this->model->fetch_data_notifications_count();
        $this->load->view('/admin/histview', $data);
    }
    public function reports()
    {
        $this->load->model('model');
        $data["fetch_data_user"] = $this->model->fetch_data_user();
        $data["fetch_data_event"] = $this->model->fetch_data_event();
        $data["fetch_data_notifications_count"] = $this->model->fetch_data_notifications_count();
        $data["fetch_data_report"] = $this->model->fetch_data_report();
        $this->load->view('/admin/reports', $data);
    }
    public function notifications()
    {
        $this->load->model('model');
        $data["fetch_data_notifications"] = $this->model->fetch_data_notifications();
        $data["fetch_data_notifications_count"] = $this->model->fetch_data_notifications_count();
        $this->load->view('/admin/notifications', $data);
    }
    public function profile($id)
    {
        $this->load->model('model');
		$data["fetch_data_profile"] = $this->model->fetch_data_profile();
		$data["fetch_data_user_galleries"] = $this->model->fetch_data_user_galleries();
        $data["fetch_data_notifications_count"] = $this->model->fetch_data_notifications_count();
        $this->load->view('/admin/profile', $data);
    }
    public function eventview($id)
    {
        $this->load->model('model');
        $data["fetch_data_event_detail"] = $this->model->fetch_data_event_detail();
        $data["fetch_data_notifications_count"] = $this->model->fetch_data_notifications_count();
        $this->load->view('/admin/eventview', $data);
    }

    public function events()
    {
        $this->load->model('model');
        $data["fetch_data_event"] = $this->model->fetch_data_event();
        $data["fetch_data_notifications_count"] = $this->model->fetch_data_notifications_count();
        $this->load->view('/admin/events', $data);
    }
    public function users()
    {
		$this->load->model('model');
		
        $data["fetch_data_user"] = $this->model->fetch_data_user();
        $data["fetch_data_notifications_count"] = $this->model->fetch_data_notifications_count();
        $this->load->view('/admin/users', $data);
    }
    public function logout()
    {
        $this->load->view('/admin/logout');
    }

    public function file_check()
    {

        $allowed_mime_type_arr = array('image/gif', 'image/jpeg', 'image/pjpeg', 'image/png', 'image/x-png');
        $mime = get_mime_by_extension($_FILES['userfile']['name']);
        if (isset($_FILES['userfile']['name']) && $_FILES['userfile']['name'] != "") {
            if ($_FILES['userfile']['error'] != 0) {
                $this->form_validation->set_message('file_check', 'Image File Exceed 2MB');
                return false;
            }
            // if($width > 5000 && $height > 5000){
            //     $this->form_validation->set_message('file_check', 'Image Dimension Exceed 5000 x 5000');
            //     return false;
            // }
            if (in_array($mime, $allowed_mime_type_arr)) {
                return true;
            } else {
                $this->form_validation->set_message('file_check', 'Please select only gif/jpg/png file.');
                return false;
            }
        } else {
            $this->form_validation->set_message('file_check', 'Please choose a file image to upload.');
            return false;
        }
    }

}
