<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Company_model extends CI_Model
{
    /**
     * This function is used to get the company listing count
     * @param string $searchText : This is optional search text
     * @return number $count : This is row count
     */
    function companyListingCount($searchText = '')
    {
        $this->db->select('BaseTbl.id, BaseTbl.address, BaseTbl.company_name, BaseTbl.phone_number');
        $this->db->from('tbl_companies as BaseTbl');

        if(!empty($searchText)) {
            $likeCriteria = "(BaseTbl.address  LIKE '%".$searchText."%'
                            OR  BaseTbl.company_name  LIKE '%".$searchText."%'
                            OR  BaseTbl.phone_number  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
       
        $query = $this->db->get();
        
        return $query->num_rows();
    }

    /**
     * This function is used to get the company listing
     * @param string $searchText : This is optional search text
     * @param number $page : This is pagination offset
     * @param number $segment : This is pagination limit
     * @return array $result : This is result
     */
    function companyListing($searchText = '', $page, $segment)
    {
      	$this->db->select('BaseTbl.id, BaseTbl.address, BaseTbl.company_name, BaseTbl.phone_number');
        $this->db->from('tbl_companies as BaseTbl');
     
        if(!empty($searchText)) {
            $likeCriteria = "(BaseTbl.address  LIKE '%".$searchText."%'
                            OR  BaseTbl.company_name  LIKE '%".$searchText."%'
                            OR  BaseTbl.phone_number  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
       
        $this->db->limit($page, $segment);
        $query = $this->db->get();
        
        $result = $query->result();        
        return $result;
    }

    function addNewCompany($form_data){
    	// Setup company data ready to insert into database
    	$new_company = array(
    		'company_name'  => $form_data['company_name'],
    		'phone_number'  => $form_data['phone_number'],
    		'address'       => $form_data['address'],
    		'email_address' => $form_data['email_address'],
    		'fax'           => $form_data['fax'] 
    	);

        $this->db->insert('tbl_companies', $new_company);
        $company_id = $this->db->insert_id();
        
        return $company_id;
    }

    function deleteCompany($company_id){
    	$this->db->where('id', $company_id);
        return $this->db->delete('tbl_companies');
    }
}