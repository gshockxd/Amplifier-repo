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
    function fetch_data_event()
    {
       $this->db->select("*");
       $this->db->from("bookings");
       $this->db->join("venues",'bookings.venue_id=venues.venue_id');
       $this->db->join("users",'bookings.client_id=users.user_id');
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
       $this->db->join("venues",'bookings.venue_id=venues.venue_id');
       $query = $this->db->get();
       return $query;
    }
    function fetch_data_histview()
    {
       $id = $this->uri->segment(2);
       $this->db->select("*");
       $this->db->from("feedbacks");
       $this->db->join("users",'feedbacks.from_id=users.user_id');
       $this->db->join("bookings",'feedbacks.booking_id=bookings.booking_id');
       $this->db->join("venues",'bookings.venue_id=venues.venue_id');
       $this->db->where("feedback_id",$id);
       $query = $this->db->get();
       return $query;
    }
    function fetch_data_report()
    {
       $this->db->select("*");
       $this->db->from("reports");
       $this->db->join("users",'reports.report_from=users.user_id');
       $this->db->join("bookings",'reports.booking_id=bookings.booking_id');
       $query = $this->db->get();
       return $query;
    }
}