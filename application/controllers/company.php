<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

/**
 * Class : User (UserController)
 * User Class to control all user related operations.
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */
class Company extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('company_model');
        $this->isLoggedIn();   
    }

    public function companyListing(){
    	if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {   
            $searchText = $this->security->xss_clean($this->input->post('searchText'));
            $data['searchText'] = $searchText;
            
            $this->load->library('pagination');
            
            $count = $this->company_model->companyListingCount($searchText);

			$returns = $this->paginationCompress ( "companyListing/", $count, 5 );
            
            $data['companyRecords'] = $this->company_model->companyListing($searchText, $returns["page"], $returns["segment"]);
            
            $this->global['pageTitle'] = 'CodeInsect : Company Listing';
            
            $this->loadViews("companies", $this->global, $data, NULL);
        }
    }

    /**
     * This function is used to add new company to the system
     */
    function addNewCompany()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->library('form_validation');
            
            $this->form_validation->set_rules('company_name','Company Name','trim|required|max_length[128]');
            $this->form_validation->set_rules('email_address','Email','trim|required|valid_email|max_length[128]');
            $this->form_validation->set_rules('address','Address','trim|required|max_length[128]');
            
            $this->form_validation->set_rules('phone_number','Phone Number','required|min_length[10]');
            
            if($this->form_validation->run() == FALSE)
            {
                $this->addNew();
            }
            else
            {
                $form_data = $this->input->post();
                $this->load->model('company_model');
                $result = $this->company_model->addNewCompany($form_data);
                
                if($result > 0)
                {
                    $this->session->set_flashdata('success', 'New Company added successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'Company add failed');
                }
                
                redirect('companyListing');
            }
        }
    }

    /**
     * This function is used to load the add new form
     */
    function addNew()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $data = array();
            
            $this->global['pageTitle'] = 'SpecProperty : Add New Company';

            $this->loadViews("addNewCompany", $this->global, $data, NULL);
        }
    }

    /**
     * This function is used to delete the company using companyId
     * @return boolean $result : TRUE / FALSE
     */
    public function deleteCompany($company_id){
    	if($this->isAdmin() == TRUE)
        {
            echo(json_encode(array('status'=>'access')));
        }
        else
        {
            $result = $this->company_model->deleteCompany($company_id);
            
            if ($result > 0) { 
            	redirect('company/companyListing');
            }
            else { 
           
            }
        }
    }

}