<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {
    
    
        public function __construct() {
        parent::__construct();
        $this->load->model('WebAdmin_Model');
        $this->load->model('General_Model');
        $this->load->model('Tutors_Model');
        $this->load->model('Student_Model');
        $this->load->model('Main_User_Model');
    }
    
    
            
     public function header($title='') {
        
        $data['main_subjs'] = $this->Main_User_Model->GetMainSubjects();
        $data['sub_subjs'] = $this->WebAdmin_Model->SubCourse_List();
        $data['town_list'] = $this->WebAdmin_Model->Town_List();
                
        $data['title'] = $title;
        
        $this->load->view('template/header_main.php',$data);
    }

    public function footer() {
        
        $data['restwords'] = $this->WebAdmin_Model->restricted_words();
        $data['blogs'] = $this->WebAdmin_Model->view_blogs();
        
        $this->load->view('template/footer.php',$data);
    }
    
        public function sidebar()
    {
    $data['adds'] = $this->WebAdmin_Model->get_all_ads();
    $this->load->view('template/sidebar.php',$data);     
    }



       //** HOME PAGE **//
       
       public function view_home_page_content()
       {
         $data['content'] = $this->WebAdmin_Model->view_home_page_content();
          
         $this->load->view('admin/template/header.php');
         $this->load->view('admin/template/header_bar.php');
         $this->load->view('admin/template/sidebar.php');
	     $this->load->view('admin/general/view_home_page_content',$data);
         $this->load->view('admin/template/footer.php');
       }
       
       public function view_home_page_content_query()
       {
       $home_page_content =$this->input->post('home_page_content');
        
       $data = array('page_content' => $home_page_content);
       $wher = array('page_name' => 'home');

       $this->General_Model->update_record($data, "pages", $wher);
       
       $this->session->set_flashdata('msg', 'Page Content Updated Successfully.');
       redirect(base_url() . 'Pages/view_home_page_content');    
       }
        
       
       
       //** FAQs PAGE **//
       
       public function view_faqs_page_content()
       {
         $data['content'] = $this->WebAdmin_Model->view_faqs_page_content();
          
         $this->load->view('admin/template/header.php');
         $this->load->view('admin/template/header_bar.php');
         $this->load->view('admin/template/sidebar.php');
    	 $this->load->view('admin/general/view_faqs_page_content',$data);
         $this->load->view('admin/template/footer.php');
       }
       
       public function view_faqs_page_content_query()
       {
       $faqs_page_content =$this->input->post('faqs_page_content');
        
       $data = array('page_content' => $faqs_page_content);
       $wher = array('page_name' => 'faqs');

       $this->General_Model->update_record($data, "pages", $wher);
       
       $this->session->set_flashdata('msg', 'Page Content Updated Successfully.');
       redirect(base_url() . 'Pages/view_faqs_page_content');    
       }
       
       public function faqs_page()
       {
       $data['content'] = $this->WebAdmin_Model->view_faqs_page_content();
       
       $title = "FAQs - Courses And Tutors London find the best tutors in london, birmingham, manchester, chelsea, liverpool, bradford, wales, essex, sussex.";
       
       $this->header($title);
       $this->load->view('faqs.php', $data);
       $this->sidebar();
       $this->footer();    
       }

       



       //** Contact US PAGE **//
       
       public function view_contact_page_content()
       {
         $data['content'] = $this->WebAdmin_Model->view_contact_page_content();
          
         $this->load->view('admin/template/header.php');
         $this->load->view('admin/template/header_bar.php');
         $this->load->view('admin/template/sidebar.php');
    	 $this->load->view('admin/general/view_contact_page_content',$data);
         $this->load->view('admin/template/footer.php');
       }
       
       public function view_contact_page_content_query()
       {
       $contact_page_content =$this->input->post('contact_page_content');
        
       $data = array('page_content' => $contact_page_content);
       $wher = array('page_name' => 'contact_us');

       $this->General_Model->update_record($data, "pages", $wher);
       
       $this->session->set_flashdata('msg', 'Page Content Updated Successfully.');
       redirect(base_url() . 'Pages/view_contact_page_content');    
       }
       
       public function contact_us()
       {
       $data['content'] = $this->WebAdmin_Model->view_contact_page_content();
      
       $title = "Contact Us - Courses And Tutors London find best tutors courses training private tuition for different subjects like maths, science, IT, architecture, art, photoshop, autocad.";

       $this->header($title);
       $this->load->view('contact_us.php', $data);
       $this->sidebar();
        $this->footer();
       }
       
       
           //** RESOURCES PAGE **//
       
       public function view_resources_page_content()
       {
         $data['content'] = $this->WebAdmin_Model->view_resources_page_content();
          
         $this->load->view('admin/template/header.php');
         $this->load->view('admin/template/header_bar.php');
         $this->load->view('admin/template/sidebar.php');
	     $this->load->view('admin/general/view_resources_page_content',$data);
         $this->load->view('admin/template/footer.php');
       }
       
       public function view_resources_page_content_query()
       {
       $resource_details = $this->input->post('resource_details');
       $resource_title   = $this->input->post('resource_title');
       $resource_link    = $this->input->post('resource_link');
        
       $maxid = $this->General_Model->find_maxid("resource_id", "resources");
       foreach ($maxid as $maxid) {
       $Maxtype = $maxid->resource_id;
       }
       
       
       $data = array('resource_id'      => $Maxtype,
                     'resource_title'   => $resource_title,
                     'resource_link'    => $resource_link,
                     'resource_details' => $resource_details);
       

       $this->General_Model->create_record($data, "resources");
       
       $this->session->set_flashdata('msg', 'Record Added Successfully.');
       redirect(base_url() . 'Pages/view_resources_page_content');    
       }
       
       public function resources_page()
       {
       $data['content'] = $this->WebAdmin_Model->view_resources_page_content();

       $title = "Resources - Courses And Tutors find science tutors, maths tutors, english tutors, physics tutors, autocad tutors, photoshop tutors, accounting tutors, chemistry tutors.";
       
       $this->header($title);
       $this->load->view('resources.php', $data);
       $this->footer();    
       }
       
       public function resource_details()
       {
       $resource_id  = $this->uri->segment(3);  
       $data['content'] = $this->WebAdmin_Model->resource_details($resource_id);
       
         $this->load->view('admin/template/header.php');
         $this->load->view('admin/template/header_bar.php');
         $this->load->view('admin/template/sidebar.php');
	     $this->load->view('admin/general/resource_details',$data);
         $this->load->view('admin/template/footer.php');
       }
       
       
       public function resource_edit_query()
       {
       $resource_details = $this->input->post('resource_details');
       $resource_title   = $this->input->post('resource_title');
       $resource_link    = $this->input->post('resource_link');    
       $resource_id      = $this->input->post('resource_id'); 
       
        $data = array('resource_title'   => $resource_title,
                      'resource_link'    => $resource_link,
                      'resource_details' => $resource_details);
       

       $wher = array('resource_id' => $resource_id);
       
       $this->General_Model->update_record($data, "resources", $wher);

       $this->session->set_flashdata('msg', 'Record Updated Successfully.');
       redirect(base_url() . 'Pages/resource_details/'.$resource_id);           
       }
       
       public function delete_resource()
       {
        $resource_id  = $this->uri->segment(3);  
        
        $wher = array('resource_id' => $resource_id);

        $this->General_Model->delete_record("resources", $wher);
           
       $this->session->set_flashdata('msg', 'Record Deleted Successfully.');
       redirect(base_url() . 'Pages/view_resources_page_content'); 
       }
       
       
       public function view_resource_details()
       {
        $resource_id  = $this->uri->segment(3);  
        $data['content'] = $this->WebAdmin_Model->resource_details($resource_id);


       $title = "Resource Details - find the best tutors in london for maths, chemistry, physics, general science, algebra, programming, java, php, python, ruby, finance, accounting.";
       
       $this->header($title);
       $this->load->view('resource_details.php', $data);
       $this->footer();    
       }
       
       
        
        
}


