<header>
    <div class="header-top ">
        <div class=" container h-100">
            <div class="row  ">
                <div class="text-<?= (($_SESSION['dir'] == 'ltr')? 'left':'right'); ?> col-6 p-0">
                    <a href="/">
                        <div class=" logo col-auto pt-2  d-lg-block w-100 h-100" >
                            <picture><img src="<?= IMG ?>baraa_logo1.png" alt="logo" title="baraa" id="logo" style="height: 94% !important;"></picture>
                        </div></a>

                </div>

                <div class=" col-6 p-0  text-<?= (($_SESSION['dir'] == 'ltr')? 'right':'left'); ?> menu-container " style="justify-content: flex-end;display: flex;">

                <?= isset($_SESSION['admin'])&& explode(' ',str_replace(['\\','/'],' ',str_replace(array('C:\xampp\htdocs\BaraaZoroub-website\app\config\..\views\\','/home/progwlfo/baraazoroub.com/app/config/../views/'),'',$this->_action_view)))[0] == 'dashboard' && $_SESSION['admin'] == 'admin' ? '
                    <form action="/dashboard/upload/cv" method="post" enctype="multipart/form-data" class="text-'.(($_SESSION['dir'] == 'ltr')? 'right':'left').'">
                        <a class="btn btn-outline-primary btn-link px-5 py-2 m-3 text-primary cv-text" href="#" onclick="return cv()">CV</a>
                        <input type="file" name="cv" accept=".doc,.docx,.pdf,.txt" hidden />
                    </form>
                '
                :'
                    <a class="btn btn-outline-primary btn-link px-5 py-2 m-3 text-primary cv-text" href="/index/download/cv">CV</a>
                ' ?>

                    <a class="text-<?= (($_SESSION['dir'] == 'ltr')? 'right':'left'); ?> toggle-menu " style="cursor: pointer;" id="hamp">
                        <i></i>
                        <i></i>
                        <i></i></a>

                    <div class="menu-box" id="menu-bar" >

                        <div class=" link1    ">
                            <h3 class="font-weight-bold text-white"><?= $header_p ?></h3>
                            <ul class=" list-unstyled  my-auto pt-2  " >
                                <?php
                                    foreach ($header_links as $header_link){
                                        if (strtolower($header_link[0]) == strtolower($page)){
                                            echo '<li class="active  "> <a href="'.$header_link[1].'" target="_self"  class=" pb-4 font-weight-bold  ">'.$header_link[0].'</a></li>';
                                        }else{
                                            $target = ($header_link[0] == 'Google Analytics')? '_blank':'_self';
                                            echo '<li><a href="'.$header_link[1].'" target="'.$target.'"  class=" pb-4 font-weight-bold  ">'.$header_link[0].'</a></li>';
                                        }
                                    }
                                ?>
                            </ul>
                        </div>

                        <div class="social  text-center ">
                            <ul class="list-unstyled  row d-flex text-center mb-n2">
                                <?php
                                    $x = 1;

                                    foreach ($social as $item){

                                        if ($x == 5){
                                            echo '</ul><ul class="list-unstyled  row d-flex text-center mb-0">';
                                        }
                                        $class = $item->id;
                                        $class = ($item->id == 'facebook')? 'b fa-facebook-f':(($item->id == 'linkedin')?'b fa-linkedin-in':(($item->id == 'mail')? 'r fa-envelope':'b fa-'.$class));

                                        $link = ($item->id == 'mail')?'mailto: '.$item->link:$item->link;

                                        echo '<li>  <a target="_blank" href="'.$link.'" class="'.$item->id.' px-2"><i class="fa'.$class.'"></i></a></li>';

                                        $x++;
                                    }
                                ?>
                            </ul>

                        </div>


                    </div>

                </div>






            </div>
        </div>


    </div>

</header>
