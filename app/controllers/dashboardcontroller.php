<?php


namespace BARAA\Controllers;


use BARAA\LIB\Helper;
use BARAA\LIB\InputFilter;
use BARAA\LIB\Proj_imgs;
use BARAA\Models\About_imgs;
use BARAA\Models\AbstractModel;
use BARAA\Models\Clients;
use BARAA\Models\Imgs;
use BARAA\Models\Project_lang;
use BARAA\Models\Projects;
use BARAA\Models\Social_links;

class DashboardController extends AbstractController
{
    use Helper;
    use InputFilter;

    public function defaultAction(){
        if (!isset($_SESSION['admin']))
        {
            $this->redirect('/dashboard/login');
        }

        $this->_lang->load('dash.header');
        $this->_lang->load('index.default');
        $this->_lang->load('dash.default');
        $this->_lang->load('index.footer');

        $this->_data['social'] = Social_links::getAll();
        $this->_data['page'] = 'home';

        $projects = Projects::getAll();
        $this->_data['projects'] = [];

        foreach ($projects as $project)
        {
            $this->_data['projects'][] = $project->forHome();
        }


        $this->_view('wraperstart');
    }

    public function aboutAction(){
        if (!isset($_SESSION['admin']))
        {
            $this->redirect('/dashboard/login');
        }

        if (isset($_POST['sub'])){
            if ($_POST['sub'] === 'expr'){
                $expr = parse_ini_file(INI.'experience.ini');
                $content = '';

                for ($i=1;$i<=9;$i++){
                    $time = $expr['time'.$i];
                    $expe = $expr['expe'.$i];
                    $with = $expr['with'.$i];

                    if (array_key_exists($i,$_POST['experience'])){
                        if (isset($_POST['experience'][$i]["'time'"])){
                            $time = $_POST['experience'][$i]["'time'"];
                        }

                        if (isset($_POST['experience'][$i]["'expe'"])){
                            $expe = $_POST['experience'][$i]["'expe'"];
                        }

                        if (isset($_POST['experience'][$i]["'with'"])){
                            $with = $_POST['experience'][$i]["'with'"];
                        }
                    }

                    $content .= "time$i = '$time' \nexpe$i = '$expe'\nwith$i = '$with'\n\n";
                }

                $fp = fopen(INI.'experience.ini', 'wb');
                fwrite($fp, $content);
                fclose($fp);

            }elseif($_POST['sub'] === 'clients'){
                foreach (Clients::getAll() as $client){
                    if (isset($_FILES['clients']['tmp_name'][$client->id]) && $_FILES['clients']['tmp_name'][$client->id] != ''){
                        $file_name = $_FILES['clients']['name'][$client->id];
                        $name = $file_name;

                        if (!file_exists('.'.IMG.$name)){
                            if(move_uploaded_file($_FILES['clients']['tmp_name'][$client->id],'.'.IMG.$name)){
                                $img = new Imgs();
                                $img->img = $name;
    
                                if ($img->save()){
                                    $client->imgId = $img->id;
                                    $client->title = $file_name[1];
    
                                    $client->save();
                                }
                            }
                        }else{
                            $img = Imgs::getByUnique($name);

                            $client->imgId = $img->id;
                            $client->title = $file_name[1];

                            $client->save();
                        }

                    }else{
                        continue;
                    }
                }

                if (isset($_FILES['add_img'])){
                    $file_name = $_FILES['add_img']['name'][$client->id];
                    $name = $file_name;

                    if(!file_exists('.'.IMG.$name)){
                        if(move_uploaded_file($_FILES['add_img']['tmp_name'],'.'.IMG.$name)) {
                            $img = new Imgs();
                            $img->img = $name;
    
                            if ($img->save()) {
                                $client = new Clients();
    
                                $client->imgId = $img->id;
                                $client->title = explode('.',$name)[0];
    
                                $client->save();
                            }
                        }
                    }else{

                        $img = Imgs::getByUnique($name);

                        $client = new Clients();
    
                        $client->imgId = $img->id;
                        $client->title = $file_name[1];

                        $client->save();
                    }
                }
            }elseif($_POST['sub'] === 'testimonials'){
                extract(parse_ini_file('./app/ini/testimonials.ini'));
                for ($i=1;$i<=count($_POST['stars']);$i++){
                    $testi = 'test'.$i.'.ini';
                    $test = parse_ini_file(INI.$testi);
                    echo '<br/><br/><br/>';var_dump($test);

                    $from = $test['from'];
                    $img = $test['img'];
                    $details = $test['details'];
                    $stars = $test['stars'];

                    if (isset($_POST['name'][$i]) && $_POST['name'][$i] != ''){
                        $from = $_POST['name'][$i];
                    }

                    if (isset($_POST['opinion'][$i]) && $_POST['opinion'][$i] != ''){
                        $details = $_POST['opinion'][$i];
                    }

                    if (isset($_POST['stars'][$i]) && $_POST['stars'][$i] != '' && $_POST['stars'][$i] != $stars){
                        $stars = $_POST['stars'][$i];
                    }

                    if (isset($_FILES['image']['tmp_name'][$i]) && $_FILES['image']['tmp_name'][$i] != ''){
                        $file_name = array_reverse(explode('.', $_FILES['image']['name'][$i]));
                        $name = $this->randText('6') . '.' .$file_name[0];

                        if (move_uploaded_file($_FILES['image']['tmp_name'][$i],'.'.UPL.$name)){
                            $img = $name;
                        }
                    }

                    $content = "from = '$from'\nimg = '$img'\ndetails = '$details'\nstars = '$stars'";

                    $fp = fopen(INI.$testi, 'wb');
                    fwrite($fp,$content);
                    fclose($fp);
                }
            }elseif($_POST['sub'] === 'testimonials_add'){
                $from = $_POST['name_add'];
                $details = $_POST['opinion_add'];
                $stars = $_POST['stars_add'];
                $img = '';

                $file_name = array_reverse(explode('.', $_FILES['image_add']['name']));
                $name = $this->randText('6') . '.' .$file_name[0];

                if (move_uploaded_file($_FILES['image_add']['tmp_name'],'.'.UPL.$name)){
                    $img = $name;
                }

                $ini_name = $this->randText('6') . '.ini';
                $count = count(parse_ini_file('./app/ini/testimonials.ini'))+1;
                $content = "from = '$from'\nimg = '$img'\ndetails = '$details'\nstars = '$stars'";

                $fp = fopen('./app/ini/testimonials.ini', 'ab');
                fwrite($fp,"\ntest$count = '$ini_name'");
                fclose($fp);

                foreach (LANGS as $LANG){
                    $fp = fopen('./app/languages/'.$LANG.'/ini/'.$ini_name, 'wb');
                    fwrite($fp,$content);
                    fclose($fp);
                }
            }
            else{
                if (isset($_POST['typed']) && $_POST['typed'] !== ""){
                    $data = parse_ini_file(INI.'about.ini');

                    $content = '';
                    foreach ($data as $key=>$value){
                        if ($key === 'typed'){
                            $value = $_POST['typed'];
                        }

                        $content .= $key.'= "'.$value."\" \n";
                    }

                    $fp = fopen(INI.'about.ini', 'wb');
                    fwrite($fp,$content);
                    fclose($fp);
                }

                if (isset($_POST['desc']) && $_POST['desc'] != ""){
                    $data = parse_ini_file(INI.'about.ini');

                    $content = '';
                    foreach ($data as $key=>$value){
                        if ($key === 'data'){
                            $value = $_POST['desc'];
                        }

                        $content .= $key.'= "'.$value."\" \n";
                    }

                    $fp = fopen(INI.'about.ini', 'wb');
                    fwrite($fp,$content);
                    fclose($fp);
                }

                if (isset($_FILES['image']) && is_array($_FILES['image'])){
                    foreach ($_FILES['image']['tmp_name'] as $key => $image){
                        $about_img = About_imgs::getByPK($key);

                        if ($_FILES['image']['name'][$key] != '' && $image != ''){
                            $file_name = array_reverse(explode('.', $_FILES['image']['name'][$key]));
                            $name = $this->randText('6') . '.' .$file_name[0];

                            if (move_uploaded_file($image,'.'.UPL.$name)){
                                $img = new Imgs();
                                $img->img = $name;

                                if ($img->save()){
                                    $about_img->imgId = $img->id;
                                    $about_img->title = $file_name[1];

                                    $about_img->save();
                                }
                            }
                        }
                    }
                }
            }

            $this->redirect('/dashboard/about');
        }

        $this->_lang->load('dash.header');
        $this->_lang->load('index.about');
        $this->_lang->load('dash.details');
        $this->_lang->load('index.footer');

        $this->_data['social'] = Social_links::getAll();
        $this->_data['page'] = 'about';

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

        $this->_view();
    }

    public function detailsAction(){
        if (!isset($_SESSION['admin']))
        {
            $this->redirect('/dashboard/login');
        }

        @$id = $this->_params[0];

        if ($id == null){
            $this->redirect('/dashboard/default');
        }

	    $project = Projects::getByPK($id);

	    if ($project === false)
	    {
		    $this->redirect('/dashboard/default');
	    }
        
        if (isset($_POST['sub'])){
            if (!isset($this->_params[1]) || $this->_params[1] !== 'add_image'){
                $proj_data = [
                    'name' => isset($_POST['name']) ? $_POST['name'] : '',
                    'name2' => isset($_POST['name2']) ? $_POST['name2'] : '',
                    'type' => isset($_POST['type']) ? $_POST['type'] : '',
                    'client' => isset($_POST['client']) ? $_POST['client'] : '',
                    'details' => isset($_POST['details']) ? $_POST['details'] : '',
                    'title' => isset($_POST['title']) ? $_POST['title'] : ''
                ];

                $project = Projects::getByPK($id);
                $project_data = (new Project_lang)::getByPK($id);

                if (isset($proj_data['name']) && $proj_data['name'] !== '') {
                    $project_data->name = $proj_data['name'];
                }
                
                if (isset($proj_data['name2']) && $proj_data['name2'] !== '') {
                    $project_data->name2 = $proj_data['name2'];
                }

                if (isset($proj_data['type']) && $proj_data['type'] !== '') {
                    $project_data->type = $proj_data['type'];
                }

                if (isset($proj_data['details']) && $proj_data['details'] !== '') {
                    $project_data->details = $proj_data['details'];
                }

                if (isset($proj_data['title']) && $proj_data['title'] !== '') {
                    $project_data->title = $proj_data['title'];
                }

                if (isset($proj_data['client']) && $proj_data['client'] !== '') {
                    $project->client = $proj_data['client'];
                }

                if ($project_data->save() && $project->save()) {
                    $this->redirect('/dashboard/details/' . $project->id);
                }
            }elseif($this->_params[1] === 'add_image'){

                if (!empty($_FILES) && isset($_FILES['add_img']) && is_array($_FILES['add_img'])){
                    for ($i=0, $iMax = count($_FILES['add_img']['tmp_name']); $i< $iMax; $i++){
                        
                        $name = $_FILES['add_img']['name'][$i];
                        
                        if (!file_exists('.'.UPL.$name)){

                            if (move_uploaded_file($_FILES['add_img']['tmp_name'][$i],'.'.UPL.$name)){
                                $img = new Imgs();
                                $img->img = $name;
    
                                if ($img->save()){
                                    $prod_img = new Proj_imgs();
                                    $prod_img->prodId = $id;
                                    $prod_img->imgId  = $img->id;
    
                                    if ($prod_img->save()){
                                        continue;
                                    }
                                }
                            }

                        }else{
                            $img = Imgs::getByUnique($name);

                            $prod_img = new Proj_imgs();
                            $prod_img->prodId = $id;
                            $prod_img->imgId  = $img->id;

                            if ($prod_img->save()){
                                continue;
                            }
                        }

                    }
                }
                $this->redirect('/dashboard/details/'.$id);
            }

        }

	    $projects = (Projects::getByPK($id))->forData();
	    $this->_data['project'] = $projects;
	    $this->_data['project_details'] = (Projects::getByPK($id))->forHome();
	    $imgs = new Proj_imgs();
	    $imgs->prodId = $projects->id;
	    $data = $imgs->getByProdId();
	    $this->_data['project_imgs'] = (count($data) && $data[0]->img === null)? []: $data;

        $this->_lang->load('dash.header');
        $this->_lang->load('index.details');
        $this->_lang->load('dash.details');
        $this->_lang->load('index.footer');

        $this->_data['social'] = Social_links::getAll();
        $this->_data['page'] = 'about';

        $this->_view('header,wraperstart');
    }

    public function editimgAction(){
        if (!isset($_SESSION['admin']))
        {
            $this->redirect('/dashboard/login');
        }

        @$img_type = $this->_params[0];
        @$img_id = $this->_params[1];
        @$proj_id = $this->_params[2];

        if (count($_FILES) == 0){
            goto else_s;
        }

        if ($img_type === 'head'){
            $project = Projects::getByPK($proj_id);

            $name = $_FILES['add_img']['name'];

            if(!file_exists('.'.IMG.$name)){
                if ($_FILES['add_img']['type'] === 'image/png' || $_FILES['add_img']['type'] === 'image/jpeg' || $_FILES['add_img']['type'] === 'image/gif'){
                    
                    if (move_uploaded_file($_FILES['add_img']['tmp_name'],'.'.IMG.$name)){
                        $img = new Imgs();
                        $img->img = $name;

                        if ($img->save()){
                            $project->head_img = $img->id;
                            if ($project->save()){
                                $this->redirect('/dashboard/details/'.$project->id);
                            }
                        }
                    }
                }else{
                    goto else_s;
                }
            }else{
                $img = Imgs::getByUnique($name);

                $project->head_img = $img->id;
                if ($project->save()){
                    $this->redirect('/dashboard/details/'.$project->id);
                }
            }
        }elseif ($img_type === 'img'){
            $imgs = new Proj_imgs();
            $imgs->prodId = $proj_id;
            $name = $_FILES['add_img']['name'];

            foreach ($imgs->getByProdId() as $img){
                if ($img->imgId === $img_id){
                    if(!file_exists('.'.UPL.$name)){
                        if (move_uploaded_file($_FILES['add_img']['tmp_name'],'.'.UPL.$name)){
                            $imgs = new Imgs();
                            $imgs->img = $name;
    
                            if ($imgs->save()){
                                $img->imgId = $imgs->id;
    
                                if ($img->save()){
                                    $this->redirect('/dashboard/details/'.$proj_id);
                                }
                            }
                        }
                    }else{
                        $imgs = Imgs::getByUnique($name);

                        $img->imgId = $imgs->id;
    
                        if ($img->save()){
                            $this->redirect('/dashboard/details/'.$proj_id);
                        }
                    }
                }
            }
        }else{
            else_s :
            if ($proj_id !== null){
                $this->redirect('/dashboard/details/'.$proj_id);
            }else{
                $this->redirect('/dashboard/default');
            }
        }
    }

    public function deleteimgAction(){
        if (!isset($_SESSION['admin']))
        {
            $this->redirect('/dashboard/login');
        }

        @$proj_id = $this->_params[2];
        @$img_id = $this->_params[1];
        @$img_type = $this->_params[0];

        if ($img_type === 'img'){

            if ($proj_id == null || $img_id == null){
                goto else_s;
            }

            $imgs = new Proj_imgs();
            $imgs->prodId = $proj_id;

            foreach ($imgs->getByProdId() as $img){
                if ($img->imgId == $img_id){
                    if ($img->get('DELETE FROM '.$img::$tableName.' WHERE prodId="'.$img->prodId.'" AND imgId="'.$img->imgId.'"') == false && $imgs->getByProdId() == []){
                        $this->redirect('/dashboard/details/'.$proj_id);
                    }
                }
            }

            $this->redirect('/dashboard/details/'.$proj_id);
        }elseif($img_type === 'client'){
            $client = Clients::getByPK($img_id);
            $client->delete();

            $this->redirect('/dashboard/about');
        }else{
            else_s :
            if ($proj_id !== null){
                $this->redirect('/dashboard/details/'.$proj_id);
            }else{
                $this->redirect('/dashboard/default');
            }
        }
    }

    public function loginAction(){
        if(isset($_SESSION['admin'])){
            $this->redirect('/dashboard/default');
        }else{
            if (isset($_POST['sub'])){
                extract(parse_ini_file('./app/ini/login_data.ini'));

                if (strtolower($_POST['email']) == $email){
                    if ($_POST['pass'] == $password){
                        $_SESSION['admin'] = 'admin';

                        $this->redirect('/dashboard/');
                    }
                }
            }
            
            $this->_data['title'] = 'Baraa Zoroub - Login Page';

            $this->_view('header,wraperstart,footer');
        }
    }

    public function logoutAction(){
        unset($_SESSION['admin']);
        $this->redirect('/dashboard/login');
    }


    public function uploadAction(){
        if (!isset($_SESSION['admin']))
        {
            $this->redirect('/dashboard/login');
        }

        if(isset($this->_params[0]) && strtolower($this->_params[0]) === 'cv'){
            $cv = $_FILES['cv'];
            $ini = parse_ini_file('./app/ini/cv.ini');
            $type = mime_content_type($cv['tmp_name']);

            if($type === 'text/plain' || $type === 'application/pdf' || $type === 'application/vnd.openxmlformats-officedocument.wordprocessingml.document' || $type === 'application/msword')
            {
                if(move_uploaded_file($cv['tmp_name'], '.'.UPL.$cv['name']))
                {
                    unlink('.'.UPL.$ini['file']);
                    $fp = fopen('./app/ini/cv.ini','w+');
                    fwrite($fp,'file="'.$cv['name'].'"');
                    fclose($fp);

                    $_SESSION['dash_msg'] = 'File Uploaded Successfully';
                    $this->redirect($_SERVER['HTTP_REFERER']);

                }else{
                    $_SESSION['dash_msg'] = 'Could Not Upload The File';
                    $this->redirect($_SERVER['HTTP_REFERER']);
                }
            }
        }else{
            $_SESSION['dash_msg'] = 'Sorry Wrong Upload Path';
            $this->redirect($_SERVER['HTTP_REFERER']);
        }
    }

	public function portfolioAction()
	{
		if (!isset($_SESSION['admin']))
		{
			$this->redirect('/dashboard/login');
		}

		$this->_lang->load('dash.header');
		$this->_lang->load('dash.default');
		$this->_lang->load('dash.footer');

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

	public function changeHomeAction()
	{
		if (!isset($_SESSION['admin']))
		{
			$this->redirect('/dashboard/login');
		}

		if (!isset($this->_params[0]))
		{
			echo 'Sorry You Did Not Provide Id To Add/Remove';
			exit();
		}
		$id = $this->_params[0];

		$project = Projects::getByPK($id);
		if ($project->for_home === 'y')
		{
			$projects = Projects::getByUnique('y');
			if (count($projects)-1 < 3)
			{
				echo 'Sorry The Home Page Must Be More Than 3 Projects, Delete Failed';
				exit();
			}
			$project->for_home = 'n';
			$msg = 'Removed';
		}else
		{
			$projects = Projects::getByUnique('y');
			if (count($projects)+1 > 4)
			{
				echo 'Sorry The Home Page Must Be Less Than 4 Projects, Adding Failed';
				exit();
			}
			$project->for_home = 'y';
			$msg = 'Added';
		}

		if ($project->save())
		{
			echo 'Project '.$msg.' Successfully';
		}else
		{
			echo 'Sorry, Can\'t save that now, try again later';
		}
	}

	public function newProjectAction()
	{
		$projects = Projects::getAll();
		shuffle($projects);

		$project = $projects[0];
		$id = $project->id;
		unset($project->id);
		$project->for_home = 'n';

		if ($project->save() !== false)
		{
			$proj = (new Project_lang)::getByPK($id);
			$proj::$primaryKey = 'id';
			$proj->projId = $project->id;

			if($proj->save() !== false)
			{
				$this->redirect('/dashboard/details/'.$project->id);
			}else
			{
				$this->redirect($_SERVER['HTTP_REFERER']);
			}
		}else
		{
			$this->redirect($_SERVER['HTTP_REFERER']);
		}
	}
}