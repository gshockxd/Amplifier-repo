<?php 

class model extends CI_Model
{
//  delete start
    function update_hide_package($offense)
    {
       $status= array("status" 	=> "cancel");
       $id = $this->uri->segment(2);
       $this->db->select("*");
       $this->db->from("packages");
       $this->db->where("package_id",$id);
       $this->db->update("packages",$offense);
       
       $this->db->select("*");
       $this->db->from("bookings");
       $this->db->where("package_id",$id);
       $this->db->update("bookings",$status);
    }
    function update_hide_report($offense)
    {
       $id = $this->uri->segment(2);
       $this->db->select("*");
       $this->db->from("reports");
       $this->db->where("report_id",$id);
       $this->db->update("reports",$offense);
    }
    function update_hide_event()
    {
       $status= array("status" 	=> "cancel");
       $id = $this->uri->segment(2);
       $this->db->select("*");
       $this->db->from("bookings");
       $this->db->where("booking_id",$id);
       $this->db->update("bookings",$status);
    }
    function update_hide_user($offense)
    {
       $id = $this->uri->segment(2);
       $this->db->select("*");
       $this->db->from("users");
       $this->db->where("user_id",$id);
       $this->db->update("users",$offense);

       $status1= array("package_status" 	=> "hide");
       $status= array("status" 	=> "cancel");
       $id = $this->uri->segment(2);
       $this->db->select("*");
       $this->db->from("packages");
       $this->db->where("owner",$id);
       $this->db->update("packages",$status1);
      
       $this->db->select("*");
       $this->db->from("bookings");
       $this->db->where("client_id",$id);
       $this->db->update("bookings",$status);
    }
//  delte end
// offense update start
    function update_offense_user($offense)
    {
       $id = $this->uri->segment(2);
       $this->db->select("report_count");
       $this->db->from("users");
       $this->db->where("user_id",$id);
       $this->db->update("users", $offense);
    }
    function update_offense_user1($offense)
    {
       $id = $this->session->userdata('user_id');
       echo $id;
       $this->db->select("status");
       $this->db->from("users");
       $this->db->where("user_id",$id);
       $this->db->update("users", $offense);
    }
    function update_ban_user($ban)
    {
       $id = $this->uri->segment(2);
       $this->db->select("status");
       $this->db->from("users");
       $this->db->where("user_id",$id);
       $this->db->update("users", $ban);
    }
// offense update end
// views/choices start
    function fetch_data_event()
    {
       $status = "hide";
       $this->db->select("bookings.*,users.fname as client_fname,u2.fname AS performer_fname,users.lname as client_lname,u2.lname AS performer_lname");
       $this->db->from("bookings");
       $this->db->where("bookings.status!=",$status);
       $this->db->join("users",'bookings.client_id=users.user_id');
       $this->db->join("users as u2",'bookings.performer_id=u2.user_id');

       $query = $this->db->get();
       return $query;
    }
    function fetch_data_client()
    {
      $status = "hide";
      $this->db->select("*");
       $this->db->from("users");
       $this->db->where("user_type=",'client');
       $this->db->where("status!=", $status);
       $query = $this->db->get();
       return $query;
    }
    function fetch_data_perf()
    {
      $status = "hide";
       $this->db->select("*");
       $this->db->from("users");
       $this->db->where("user_type=",'performer');
       $this->db->where("status !=",$status);
       $query = $this->db->get();
       return $query;
    }
    function fetch_data_packages()
    {
      $status = "hide";
       $this->db->select("*");
       $this->db->from("packages");
       $this->db->where("package_status !=",$status);
       $this->db->join("users",'packages.owner=users.user_id');
       $query = $this->db->get();
       return $query;
    }
    
    function fetch_data_history()
    {
       $date = date('y-m-d');
       $status = "pending";
       $this->db->select("bookings.*, users.fname as client_fname,u2.fname AS performer_fname,users.lname as client_lname,u2.lname AS performer_lname");
       $this->db->from("bookings");
       $this->db->join("users",'bookings.client_id=users.user_id');
       $this->db->join("users as u2",'bookings.performer_id=u2.user_id');
       $this->db->where("event_date <",$date);
       $this->db->where("bookings.status !=", $status);
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
       $this->db->where("reports_status!=","hide");
       $this->db->join("users",'reports.report_from=users.user_id');
       $this->db->join("users as u2",'reports.report_to=u2.user_id');
       $this->db->join("bookings",'reports.booking_id=bookings.booking_id');
       $query = $this->db->get();
       return $query;
    }
    function fetch_data_user()
    {
       $this->db->select("*");
       $this->db->from("users");
      $this->db->where("status!=","hide");
       $query = $this->db->get();
       return $query;
    }
    function fetch_data_profile()
    {
       $id = $this->uri->segment(2);
       $this->db->select("users.*, count(report_to) as report_counts");
       $this->db->from("users");
       $this->db->join("reports",'report_to=user_id');
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
//  views/choices end
//  notifications start
    function fetch_data_notifications()
    {
      $date = date('Y-m-d');
      $this->db->select("*");
      $this->db->from("notifications");
      $this->db->where("created_at",$date);
      $query = $this->db->get();    
      return $query;
    }
    function fetch_data_notifications_count()
    {
      $date = date('Y-m-d');
      $this->db->select("*");
      $this->db->from("notifications");
      $notified = "notified";
      $this->db->where("status",$notified);
      $this->db->where("created_at",$date);
      $query2 = $this->db->count_all_results();
      $newdata = array(
          'notif_count' => $query2 
      );    
      return $this->session->set_userdata($newdata);;
      }
      function insert_data_notifications($notif_insert)
      {
         $this->db->insert("notifications", $notif_insert);
      }
      function insert_data_notifications2($notif_insert2)
      {
         $this->db->insert("notifications", $notif_insert2);
      }
//  notifications end
//  insert start
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
// insert end

}