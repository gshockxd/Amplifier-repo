<?php 

class model extends CI_Model
{
    function fetch_data_user()
    {
       $this->db->select("*");
       $this->db->from("users");
       $query = $this->db->get();
       return $query;
    }
    function fetch_data_profile()
    {
       $id = $this->uri->segment(2);
       $this->db->select("*");
       $this->db->from("users");
       $this->db->where("user_id",$id);
       $query = $this->db->get();
       return $query;
    }
    function fetch_data_event_detail()
    {
       $id = $this->uri->segment(2);
       $this->db->select("bookings.*,users.fname as client_fname,u2.fname AS performer_fname,users.lname as client_lname,u2.lname AS performer_lname, u2.photo AS performer_photo,users.photo as client_photo");
       $this->db->from("bookings");
       $this->db->join("users",'bookings.client_id=users.user_id');
       $this->db->join("users as u2",'bookings.performer_id=u2.user_id');
       $this->db->where("booking_id",$id);
       $query = $this->db->get();
       return $query;
    }
    function fetch_delete_package()
    {
       $id = $this->uri->segment(2);
       $this->db->select("*");
       $this->db->from("packages");
       $this->db->where("package_id",$id);
       $this->db->delete("packages");
    }
    function fetch_delete_report()
    {
       $id = $this->uri->segment(2);
       $this->db->select("*");
       $this->db->from("reports");
       $this->db->where("report_id",$id);
       $this->db->delete("reports");
    }
    function fetch_delete_history()
    {
       $id = $this->uri->segment(2);
       $this->db->select("*");
       $this->db->from("feedbacks");
       $this->db->where("feedback_id",$id);
       $this->db->delete("feedbacks");
    }
    function fetch_delete_user()
    {
       $id = $this->uri->segment(2);
       $this->db->select("*");
       $this->db->from("users");
       $this->db->where("user_id",$id);
       $this->db->delete("users");
    }
    function fetch_delete_event()
    {
       $id = $this->uri->segment(2);
       $this->db->select("*");
       $this->db->from("bookings");
       $this->db->where("booking_id",$id);
       $this->db->delete("bookings");
    }
    function fetch_data_event()
    {
       $this->db->select("bookings.*,users.fname as client_fname,u2.fname AS performer_fname,users.lname as client_lname,u2.lname AS performer_lname");
       $this->db->from("bookings");
       $this->db->join("users",'bookings.client_id=users.user_id');
       $this->db->join("users as u2",'bookings.performer_id=u2.user_id');
       $query = $this->db->get();
       return $query;
    }
    function fetch_data_history_data()
    {
      $date = date();
      $status = "approve";
      $this->db->distinct();
      $this->db->select('*');
      $this->db->from('bookings');
      $this->db->where('event_date <', $date); 
      $this->db->where('status', $status); 
       $query = $this->db->get();
       return $query;
    }
    function fetch_data_client()
    {
       $this->db->select("*");
       $this->db->from("users");
       $this->db->where("user_type=",'client');
       $query = $this->db->get();
       return $query;
    }
    function fetch_data_perf()
    {
       $this->db->select("*");
       $this->db->from("users");
       $this->db->where("user_type=",'performer');
       $query = $this->db->get();
       return $query;
    }
    function fetch_data_packages()
    {
       $this->db->select("*");
       $this->db->from("packages");
       $this->db->join("users",'packages.owner=users.user_id');
       $query = $this->db->get();
       return $query;
    }
    function fetch_data_history()
    {
       $this->db->select("*");
       $this->db->from("feedbacks");
       $this->db->join("users",'feedbacks.from_id=users.user_id');
       $this->db->join("bookings",'feedbacks.booking_id=bookings.booking_id');
       $query = $this->db->get();
       return $query;
    }
    function fetch_data_histview()
    {
       $id = $this->uri->segment(2);
       $this->db->select("feedbacks.*,bookings.*,users.fname as client_fname,u2.fname AS performer_fname,users.lname as client_lname,u2.lname AS performer_lname, u2.photo AS performer_photo,users.photo as client_photo");
       $this->db->from("feedbacks");
       $this->db->join("users",'feedbacks.from_id=users.user_id');
       $this->db->join("users as u2",'feedbacks.to_id=u2.user_id');
       $this->db->join("bookings",'feedbacks.booking_id=bookings.booking_id');
       $this->db->where("feedback_id",$id);
       $query = $this->db->get();
       return $query;
    }
    function fetch_data_report()
    {
      $this->db->select("reports.*,bookings.*,users.fname as report_from_fname,u2.fname AS report_to_fname,users.lname as report_from_lname,u2.lname AS report_to_lname, u2.photo AS report_from_photo,users.photo as report_to_photo");
       $this->db->from("reports");
       $this->db->join("users",'reports.report_from=users.user_id');
       $this->db->join("users as u2",'reports.report_to=u2.user_id');
       $this->db->join("bookings",'reports.booking_id=bookings.booking_id');
       $query = $this->db->get();
       return $query;
    }
    function insert_data_users($data_insert)
    {
       $this->db->insert("users", $data_insert);
    }
    function insert_data_bookings($data_insert)
    {
       $this->db->insert("bookings", $data_insert);
    }
    function insert_data_report($data_insert)
    {
       $this->db->insert("reports", $data_insert);
    }

}