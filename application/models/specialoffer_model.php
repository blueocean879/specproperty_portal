<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Specialoffer_model extends CI_Model
{
    /**
     * This function is used to get the project listing count
     * @param string $searchText : This is optional search text
     * @return number $count : This is row count
     */
    function offerListingCount($searchText = '')
    {
        $this->db->select('BaseTbl.*,');
        $this->db->from('tbl_specialoffers as BaseTbl');

        if(!empty($searchText)) {
            $likeCriteria = "(BaseTbl.offer_content  LIKE '%".$searchText."%'
                            OR  BaseTbl.start_date  LIKE '%".$searchText."%'
                            OR  BaseTbl.end_date  LIKE '%".$searchText."%')";
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
    function offerListing($searchText = '', $page, $segment)
    {
      	$this->db->select('BaseTbl.*,');
        $this->db->from('tbl_specialoffers as BaseTbl');

        if(!empty($searchText)) {
            $likeCriteria = "(BaseTbl.offer_content  LIKE '%".$searchText."%'
                            OR  BaseTbl.start_date  LIKE '%".$searchText."%'
                            OR  BaseTbl.end_date  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
       
        $this->db->limit($page, $segment);
        $query = $this->db->get();
        
        $result = $query->result();        
        return $result;
    }

    /*function getProjectInfo($project_id){
        $this->db->select('tbl_projects.id, tbl_projects.project_name, tbl_specialoffers.*,');
        $this->db->join('tbl_specialoffers','tbl_projects.id = tbl_specialoffers.project_id','left');
        $query = $this->db->get_where('tbl_projects', array('tbl_projects.id' => $project_id));

        $result = NULL;
        if($query->num_rows() > 0)
        {
            $result = $query->row();
        }
        
        return $result;
    }
*/
    function getSpecialOffersByProject($project_id){
        $this->db->select('tbl_specialoffers.*');
        $this->db->where('project_id', $project_id);

        $query  = $this->db->get('tbl_specialoffers');
        $result = array();
        if ($query->num_rows() > 0)
        {
         $result = $query->result(); 
        }
        return $result;
    }

    function addSpecialOffer($project_id, $form_data){
        $new_offer = array(
          'start_date'          => $form_data['start_date'],
          'end_date'            => $form_data['end_date'],
          'offer_content'       => $form_data['offer_content'],
          'project_id'          => $project_id,
        );

        $this->db->insert('tbl_specialoffers', $new_offer);
        $specialoffer_id = $this->db->insert_id();
        
        return $specialoffer_id;
    }

    function deleteSpecialOffer($specialoffer_id){
    	$this->db->where('id', $specialoffer_id);
      return $this->db->delete('tbl_specialoffers');
    }
}