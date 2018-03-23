<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
require APPPATH . '/libraries/BaseController.php';

/**
 * Class : User (UserController)
 * User Class to control all user related operations.
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */
class Project extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('project_model');
        $this->isLoggedIn();   
    }

    public function projectListing(){
    	if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {   
            $searchText = $this->security->xss_clean($this->input->post('searchText'));
            $data['searchText'] = $searchText;
            
            $this->load->library('pagination');
            
            $count = $this->project_model->projectListingCount($searchText);

			$returns = $this->paginationCompress ( "projectListing/", $count, 5 );
            
            $data['projectRecords'] = $this->project_model->projectListing($searchText, $returns["page"], $returns["segment"]);
            
            $this->global['pageTitle'] = 'CodeInsect : Project Listing';
            
            $this->loadViews("projects", $this->global, $data, NULL);
        }
    }

    public function manageProject($project_id){
        if($project_id == null){
            redirect('project/projectListing');
        }
        
        $data = array();
        $data['project_id'] = $project_id;
        $data['project'] = $this->project_model->getProjectInfo($project_id);
        
        $this->global['pageTitle'] = 'Project Management';
        
        $this->loadViews("manageProject", $this->global, $data, NULL);
    }

    public function managespecialoffers($project_id){
        $this->load->model('Specialoffer_model','',TRUE);
        $specialoffers = $this->Specialoffer_model->getSpecialOffersByProject($project_id);
        
        $data['special_offers'] = $specialoffers;
        $data['project_id'] = $project_id;    
            
        $this->global['pageTitle'] = 'Special Offers';
        $this->loadViews("manageSpecialOffers", $this->global, $data, NULL);
    }

    public function managedemographics($project_id){
        $data['project_id'] = $project_id;

        $this->global['pageTitle'] = 'Demographics Images';
        $this->loadViews("manageDemographics", $this->global, $data, NULL);
    }

    public function addspecialoffer($project_id){

        $this->load->model('Specialoffer_model','',TRUE);
        $form_data = $this->input->post();
        if($form_data != FALSE){
            $this->Specialoffer_model->addSpecialOffer($project_id, $form_data);
            redirect('project/managespecialoffers/'.$project_id);
        }
       
        $data  = array(
            'project_id' => $project_id
        );

        $this->global['pageTitle'] = 'New Special Offer';
        $this->loadViews("addSpecialOffer", $this->global, $data, NULL);
    }

    /**
     * This function is used to delete the project using project_id
     * @return boolean $result : TRUE / FALSE
     */
    public function deleteProject($project_id){
    	if($this->isAdmin() == TRUE)
        {
            echo(json_encode(array('status'=>'access')));
        }
        else
        {
            $result = $this->project_model->deleteProject($project_id);
            
            if ($result > 0) { 
            	redirect('project/projectListing');
            }
            else { 
           
            }
        }
    }

}