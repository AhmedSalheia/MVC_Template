<?php


namespace QEEMA\lib\traits;

trait Auth
{

    public function requireAuth()
    {
        if (!isset($_SESSION[ADMIN_SES_NAME]))
        {
            $this->redirect('/dashboard/index/login?ref='.urlencode($_SERVER['REQUEST_URI']));
        }

        return unserialize($_SESSION[ADMIN_SES_NAME],['allowed_classes' => false]);
    }
}
