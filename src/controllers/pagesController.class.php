<?php

class pagesController{

    public function initDashboard()
    {
        require_once "src/views/pages/financial/dashboards.php";
        
    }

    public function initIncome()
    {
        require_once "src/views/pages/financial/income.php";
    }

    public function initBill()
    {
        require_once "src/views/pages/financial/bills.php";
    }

    public function initHistory()
    {
        require_once "src/views/pages/commom/history.php";
    }

    public function initFlow()
    {
        require_once "src/views/pages/financial/flow.php";
    }

    public function initFine()
    {
        require_once "src/views/pages/financial/fines.php";
    }

    public function initPrice()
    {
        require_once "src/views/pages/financial/price.php";
    }

    public function initDiary()
    {
        require_once "src/views/pages/financial/diary.php";
    }

    public function initCustomers()
    {
        require_once "src/views/pages/logistic/customer.php";
    }

    public function initEmployees()
    {
        require_once "src/views/pages/logistic/employees.php";
    }

    public function initContracts()
    {
        require_once "src/views/pages/logistic/contract.php";
    }

    public function initSchedule()
    {
        require_once "src/views/pages/logistic/schedule.php";
    }

}
?>