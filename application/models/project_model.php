<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Project_model extends CI_Model
{
  var $cache_project = array();
    /**
     * This function is used to get the project listing count
     * @param string $searchText : This is optional search text
     * @return number $count : This is row count
     */
    function projectListingCount($searchText = '')
    {
        $this->db->select('BaseTbl.id, BaseTbl.project_name,');
        $this->db->from('tbl_projects as BaseTbl');

        if(!empty($searchText)) {
            $likeCriteria = "(BaseTbl.project_name  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
       
        $query = $this->db->get();
        
        return $query->num_rows();
    }

    /**
     * This function is used to get the project listing
     * @param string $searchText : This is optional search text
     * @param number $page : This is pagination offset
     * @param number $segment : This is pagination limit
     * @return array $result : This is result
     */
    function projectListing($searchText = '', $page, $segment)
    {
      	$this->db->select('BaseTbl.id, BaseTbl.project_name');
        $this->db->from('tbl_projects as BaseTbl');

        if(!empty($searchText)) {
            $likeCriteria = "(BaseTbl.project_name  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
       
        $this->db->limit($page, $segment);
        $query = $this->db->get();
        
        $result = $query->result();        
        return $result;
    }

    function getProjectInfo($project_id){
      if(!isset($this->cache_project[$project_id])){
        $this->db->select('tbl_projects.id as project_id, tbl_projects.project_name, tbl_specialoffers.*,');
        $this->db->join('tbl_specialoffers','tbl_projects.id = tbl_specialoffers.project_id','left');
        $query = $this->db->get_where('tbl_projects', array('tbl_projects.id' => $project_id));

        $result = NULL;
        if($query->num_rows() > 0)
        {
            $result = $query->row();
        }
        $this->cache_project[$project_id] = $result;
        
      }
      return $this->cache_project[$project_id];
        
    }

    function deleteProject($project_id){
    	$this->db->where('id', $project_id);
        return $this->db->delete('tbl_projects');
    }
}