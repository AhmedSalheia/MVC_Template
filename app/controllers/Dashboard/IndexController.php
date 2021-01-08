<?php

namespace QEEMA\controllers\Dashboard;

use QEEMA\controllers\AbstractController;
use QEEMA\lib\traits\Helper;

class IndexController extends AbstractController
{
    use Helper;
    public function defaultAction(){
        $this->_data['admin'] = $this->requireAuth();
        $this->_view();
    }

    public function loginAction()
    {
        $adm = [];
        if (isset($_POST['sub']))
        {
            $adm = array(
                'email' => $this->filterEmail($this->checkInput('post','username')),
                'password' => $this->filterStr($this->checkInput('post','password'))
            );

        }elseif (isset($_COOKIE[ADMIN_COK]))
        {
            $adm = unserialize($_COOKIE[ADMIN_COK],['allowed_classes' => false]);
            $adm['email'] = $this->dec($adm['email']);
            $adm['password'] = $this->dec($adm['password']);
        }

        if ($adm !== [])
        {
            $data = parse_ini_file(INI.'login.ini');

            if ($adm['email'] === $this->dec($data['email']))
            {
                if ($adm['password'] === $this->dec($data['password']))
                {
                    $ref = [
                        'email' => $adm['email'],
                        'name'  => $data['username'],
                        'img'   => $data['img']
                    ];
                    $_SESSION[ADMIN_SES_NAME] = serialize($ref);
                    if (isset($_POST['inputCheckboxesCall']))
                    {
                        \setcookie(ADMIN_COK,serialize(['email'=>$this->enc($ref['email']),'password'=>$this->enc($adm['password'])]),time()+60*60*24*30);
                    }

                    if (isset($_GET['ref'])){
                        $this->redirect($_GET['ref']);
                    }else
                    {
                        $this->redirect('/dashboard/');
                    }
                }else
                {
                    $_SESSION['msg'] = json_encode(['message' => 'Wrong Username Or Password']);
                }
            }else
            {
                $_SESSION['msg'] = json_encode(['message' => 'Wrong Username Or Password']);
            }
        }

        $this->_view(['blocks'=>['sidebar','header','footer','wrapperstart','wrapperend'],'footer'=>['js' => ['myScript']]]);
    }

    public function logoutAction()
    {
        \setcookie(ADMIN_COK,'',time()-60*60*24*30);
        unset($_SESSION[ADMIN_SES_NAME]);
        $this->redirect('/dashboard/index');
    }
}
