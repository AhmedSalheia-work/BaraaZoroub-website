<?php

namespace BARAA\Controllers;

use BARAA\LIB\Helper;
use BARAA\LIB\Proj_imgs;
use BARAA\Models\About_imgs;
use BARAA\Models\Clients;
use BARAA\Models\Projects;
use BARAA\Models\Social_links;

class IndexController extends AbstractController
{
	use Helper;

    public function defaultAction(){
        $this->_lang->load('index.header');
        $this->_lang->load('index.default');
        $this->_lang->load('index.footer');

        $this->_data['social'] = Social_links::getAll();
        $this->_data['page'] = ($_SESSION['lang'] === 'en')?'home':'الصفحة الرئيسية';

        $projects = Projects::getByUnique('y');
        $this->_data['projects'] = [];

        foreach ($projects as $project)
        {
            $this->_data['projects'][] = $project->forHome();
        }

        $this->_view('wraperstart');
    }

    public function aboutAction(){
        $this->_lang->load('index.header');
        $this->_lang->load('index.about');
        $this->_lang->load('index.footer');

        $this->_data['social'] = Social_links::getAll();

        $about_imgat = About_imgs::getAll();
        $about_imgs = [];
        foreach ($about_imgat as $about_img) {
            $about_imgs[] = $about_img->getImg();
        }

        $this->_data['about_imgs'] = $about_imgs;
        $this->_data['about_data'] = parse_ini_file(INI.'about.ini');
        $this->_data['experience'] = parse_ini_file(INI.'experience.ini');

        $clients = Clients::getAll();
        $this->_data['clients'] = [];
        foreach ($clients as $client){
            $this->_data['clients'][] = $client->getImg();
        }

        $this->_data['testimonials'] = parse_ini_file('./app/ini/testimonials.ini');

        $this->_data['page'] = ($_SESSION['lang'] === 'en')?'about':'عني';
        $this->_view();
    }

    public function detailsAction(){
        @$id = $this->_params[0];
        $project = Projects::getByPK($id);

        if ($project === false)
        {
        	$this->redirect('/');
        }

        $projects = ($project)->forData();
        $this->_data['project'] = $projects;
        $imgs = new Proj_imgs();
        $imgs->prodId = $projects->id;
        $this->_data['project_imgs'] = $imgs->getByProdId();

        $this->_lang->load('index.header');
        $this->_lang->load('index.details');
        $this->_lang->load('index.footer');

        $this->_data['social'] = Social_links::getAll();
        $this->_data['page'] = 'about';

        $this->_view('header,wraperstart');
    }


    public function downloadAction()
    {
        $ini = parse_ini_file('./app/ini/cv.ini');

        if(isset($this->_params[0]) && strtolower($this->_params[0]) === 'cv'){
            $file = '.'.UPL.$ini['file'];

            header('Content-Type: '. \mime_content_type($file));
            header("Content-Transfer-Encoding: Binary");
            header("Content-disposition: attachment; filename=\"" . basename($file) . "\"");
            readfile($file);
        }
    }

    public function portfolioAction()
    {
	    $this->_lang->load('index.header');
	    $this->_lang->load('index.default');
	    $this->_lang->load('index.footer');

	    $this->_data['social'] = Social_links::getAll();
	    $this->_data['page'] = ($_SESSION['lang'] === 'en')?'portfolio':'المعرض';

	    $projects = Projects::getAll();
	    $this->_data['projects'] = [];

	    foreach ($projects as $project)
	    {
		    $this->_data['projects'][] = $project->forHome();
	    }

	    $this->_view();
    }
}