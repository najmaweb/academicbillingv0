<?php
class Bookpaymentgroup extends CI_Model{
    function __construct(){
        parent::__construct();
    }
    function getBookpaymentgroup($id){
        $sql = "select id,name,amount,description from bookpaymentgroups ";
        $sql.= "where id=".$id;
        $ci = & get_instance();
        $que = $ci->db->query($sql);
        return $que->result()[0];
    }
    function getBookpaymentgroups(){
        $sql = "select id,name,amount,description from bookpaymentgroups ";
        $ci = & get_instance();
        $que = $ci->db->query($sql);
        return $que->result();
    }
    function getBookpaymentgrouparray(){
        $sql = "select id,name,amount,description from bookpaymentgroups ";
        $sql.= "order by name";
        $ci = & get_instance();
        $que = $ci->db->query($sql);
        $arr = array();
        foreach($que->result() as $res){
            $arr[$res->id] = $res->name;
        }
        return $arr;
    }
    function remove($id){
        $sql = "delete from bookpaymentgroups where id=".$id;
        $ci = & get_instance();
        $que = $ci->db->query($sql);
        return $sql;
    }
    function save($params){
        $sql = "insert into bookpaymentgroups (name,amount,description) ";
        $sql.= "values ";
        $sql.= "('".$params['name']."','".$params['amount']."','".$params['description']."') ";
        $ci = & get_instance();
        $que = $ci->db->query($sql);
        return $ci->db->insert_id();
    }
    function update($params){
        $sql = "update bookpaymentgroups set name= '".$params["name"]."',amount='".$params["amount"]."',description='".$params["description"]."' ";
        $sql.= "where ";
        $sql.= "id='".$params['id']."' ";
        $ci = & get_instance();
        $que = $ci->db->query($sql);
        return $sql;
    }    
}