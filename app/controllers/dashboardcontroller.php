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
            array_push($this->_data['projects'],$project->forHome());
        }


        $this->_view('wraperstart');
    }

    public function aboutAction(){
        if (!isset($_SESSION['admin']))
        {
            $this->redirect('/dashboard/login');
        }

        if (isset($_POST['sub'])){
            var_dump($_POST);echo '<br/><br/><br/><br/>';var_dump($_FILES);

            if ($_POST['sub'] == 'expr'){
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

                $fp = fopen(INI.'experience.ini','w');
                fwrite($fp, $content);
                fclose($fp);

            }elseif($_POST['sub'] == 'clients'){
                foreach (Clients::getAll() as $client){
                    if (isset($_FILES['clients']['tmp_name'][$client->id]) && $_FILES['clients']['tmp_name'][$client->id] != ''){
                        $file_name = array_reverse(explode('.', $_FILES['clients']['name'][$client->id]));
                        $name = $this->randText(6).'.'.$file_name[0];

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
                        continue;
                    }
                }

                if (isset($_FILES['add_img'])){
                    $file_name = array_reverse(explode('.', $_FILES['add_img']['name'][$client->id]));
                    $name = $this->randText(6).'.'.$file_name[0];

                    if(move_uploaded_file($_FILES['add_img']['tmp_name'],'.'.IMG.$name)) {
                        $img = new Imgs();
                        $img->img = $name;

                        if ($img->save()) {
                            $client = new Clients();

                            $client->imgId = $img->id;
                            $client->title = $file_name[1];

                            $client->save();
                        }
                    }
                }
            }elseif($_POST['sub'] == 'testimonials'){
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

                    $fp = fopen(INI.$testi,'w');
                    fwrite($fp,$content);
                    fclose($fp);
                }
            }elseif($_POST['sub'] == 'testimonials_add'){
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

                $fp = fopen('./app/ini/testimonials.ini','a');
                fwrite($fp,"\ntest$count = '$ini_name'");
                fclose($fp);

                foreach (LANGS as $LANG){
                    $fp = fopen('./app/languages/'.$LANG.'/ini/'.$ini_name,'w');
                    fwrite($fp,$content);
                    fclose($fp);
                }
            }
            else{
                if (isset($_POST['typed']) && $_POST['typed'] != ""){
                    $data = parse_ini_file(INI.'about.ini');

                    $content = '';
                    foreach ($data as $key=>$value){
                        if ($key == 'typed'){
                            $value = $_POST['typed'];
                        }

                        $content .= $key."= '$value' \n";
                    }

                    $fp = fopen(INI.'about.ini','w');
                    fwrite($fp,$content);
                    fclose($fp);
                }

                if (isset($_POST['desc']) && $_POST['desc'] != ""){
                    $data = parse_ini_file(INI.'about.ini');

                    $content = '';
                    foreach ($data as $key=>$value){
                        if ($key == 'data'){
                            $value = $_POST['desc'];
                        }

                        $content .= $key."= '$value' \n";
                    }

                    $fp = fopen(INI.'about.ini','w');
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
            array_push($about_imgs,$about_img->getImg());
        }

        $this->_data['about_imgs'] = $about_imgs;
        $this->_data['about_data'] = parse_ini_file(INI.'about.ini');
        $this->_data['experience'] = parse_ini_file(INI.'experience.ini');

        $clients = Clients::getAll();
        $this->_data['clients'] = [];
        foreach ($clients as $client){
            array_push($this->_data['clients'],$client->getImg());
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

        $projects = (Projects::getByPK($id))->forData();
        $this->_data['project'] = $projects;
        $this->_data['project_details'] = (Projects::getByPK($id))->forHome();
        $imgs = new Proj_imgs();
        $imgs->prodId = $projects->id;
        $data = $imgs->getByProdId();
        $this->_data['project_imgs'] = (count($data) && $data[0]->img == null)? []: $data;
        
        if (isset($_POST['sub'])){
            if ($this->_params[1] != 'add_image'){
                $proj_data = [
                    'name' => isset($_POST['name']) ? $_POST['name'] : '',
                    'name2' => isset($_POST['name2']) ? $_POST['name2'] : '',
                    'type' => isset($_POST['type']) ? $_POST['type'] : '',
                    'client' => isset($_POST['client']) ? $_POST['client'] : '',
                    'details' => isset($_POST['details']) ? $_POST['details'] : '',
                    'title' => isset($_POST['title']) ? $_POST['title'] : ''
                ];

                $project = Projects::getByPK($id);
                $project_data = Project_lang::getByPK($id);

                if (isset($proj_data['name']) && $proj_data['name'] != '') {
                    $project_data->name = $proj_data['name'];
                }
                
                if (isset($proj_data['name2']) && $proj_data['name2'] != '') {
                    $project_data->name2 = $proj_data['name2'];
                }

                if (isset($proj_data['type']) && $proj_data['type'] != '') {
                    $project_data->type = $proj_data['type'];
                }

                if (isset($proj_data['details']) && $proj_data['details'] != '') {
                    $project_data->details = $proj_data['details'];
                }

                if (isset($proj_data['title']) && $proj_data['title'] != '') {
                    $project_data->title = $proj_data['title'];
                }

                if (isset($proj_data['client']) && $proj_data['client'] != '') {
                    $project->client = $proj_data['client'];
                }

                if ($project_data->save() && $project->save()) {
                    $this->redirect('/dashboard/details/' . $project->id);
                }
            }elseif($this->_params[1] == 'add_image'){
                if (!empty($_FILES) && isset($_FILES['add_img']) && is_array($_FILES['add_img'])){
                    for ($i=0;$i<count($_FILES['add_img']['tmp_name']);$i++){
                        $name = $this->randText('5').'.'.(array_reverse(explode('.',$_FILES['add_img']['name'][$i]))[0]);
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
                    }
                }
                $this->redirect('/dashboard/details/'.$id);
            }

        }

        $this->_lang->load('dash.header');
        $this->_lang->load('index.details');
        $this->_lang->load('dash.details');
        $this->_lang->load('index.footer');

        $this->_data['social'] = Social_links::getAll();
        $this->_data['page'] = 'about';

        $this->_view('header,wraperstart');
    }

    public function editimgAction(){
        @$img_type = $this->_params[0];
        @$img_id = $this->_params[1];
        @$proj_id = $this->_params[2];

        if (count($_FILES) == 0){
            goto else_s;
        }

        if ($img_type == 'head'){
            $project = Projects::getByPK($proj_id);

            if ($_FILES['add_img']['type'] == 'image/png' || $_FILES['add_img']['type'] == 'image/jpeg' || $_FILES['add_img']['type'] == 'image/gif'){
                $name = $this->randText('6').'.'.(array_reverse(explode('.',$_FILES['add_img']['name'])))[0];
                var_dump('.'.UPL.$name);
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
        }elseif ($img_type == 'img'){
            $imgs = new Proj_imgs();
            $imgs->prodId = $proj_id;
            $name = $this->randText('6').'.'.array_reverse(explode('.',$_FILES['add_img']['name']))[0];

            foreach ($imgs->getByProdId() as $img){
                if ($img->imgId == $img_id){
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
                }
            }
        }else{
            else_s :
            if ($proj_id != null){
                $this->redirect('/dashboard/details/'.$proj_id);
            }else{
                $this->redirect('/dashboard/default');
            }
        }
    }

    public function deleteimgAction(){
        @$proj_id = $this->_params[2];
        @$img_id = $this->_params[1];
        @$img_type = $this->_params[0];

        if ($img_type == 'img'){

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
        }elseif($img_type == 'client'){
            $client = Clients::getByPK($img_id);
            $client->delete();

            $this->redirect('/dashboard/about');
        }else{
            else_s :
            if ($proj_id != null){
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

            $this->_lang->load('dash.header');
            $this->_lang->load('index.details');
            $this->_lang->load('dash.details');
            $this->_lang->load('index.footer');

            $this->_data['social'] = Social_links::getAll();
            $this->_data['page'] = 'about';

            $this->_view('header,wraperstart');
        }
    }

    public function logoutAction(){
        unset($_SESSION['admin']);
        $this->redirect('/dashboard/login');
    }
}