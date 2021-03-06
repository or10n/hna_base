<?php

class StatisticController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        $statistic = new Application_Model_DbTable_Statistic();
        
        $countActive = $statistic->getActive();
        $countBanned = $statistic->getBanned();
        $countArchived = $statistic->getArchived();
        $countConnections = $statistic->getConnections();
        $countRenewals = $statistic->getRenewals();

        $countForMounth = $statistic->getPaysForMounth();

        $this->view->countActive = $countActive;
        $this->view->countBanned = $countBanned;
        $this->view->countArchived = $countArchived;
        $this->view->countConnections = $countConnections;
        $this->view->countRenewals = $countRenewals;
        $this->view->countForMounth = $countForMounth;

        $admin = new Application_Model_DbTable_Admin();
        $admins = $admin->getAdmins();

        foreach ($admins as $key => $value) {
            $data["{$value['login']}"] = $statistic->getAdminsActions($value['admin_id']);
        }
        $this->view->admin_list = $data;

    }


}

