<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
require APPPATH . '/libraries/BaseController.php';

/**
 * Class : User (UserController)
 * User Class to control all user related operations.
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */
class Specialoffer extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Specialoffer_model','',TRUE);
        $this->isLoggedIn();   
    }

    /*public function managespecialoffers($project_id){
        $specialoffers = $this->Specialoffer_model->getSpecialOffersByProject($project_id);
        
        $data['special_offers'] = $specialoffers;
        $data['project_id'] = $project_id;    
            
        $this->global['pageTitle'] = 'Special Offers';
        $this->loadViews("manageSpecialOffers", $this->global, $data, NULL);
    }

    public function addspecialoffer($project_id){
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
    }*/

    public function deletespecialoffer($offer_id,$project_id){
    	if($this->isAdmin() == TRUE)
        {
            echo(json_encode(array('status'=>'access')));
        }
        else
        {
            $result = $this->Specialoffer_model->deleteSpecialOffer($offer_id);
            
            if ($result > 0) { 
            	redirect('project/managespecialoffers/'.$project_id);
            }
            else { 
                
            }
        }
    }

}