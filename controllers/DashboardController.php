<?php 
    class DashboardController{
        public function __construct(){

        }
        public function index(){
            Response::render('back/index', ['title' => 'Dashboard', 'content' => 'dashboard/index']);
        }
    }
?>