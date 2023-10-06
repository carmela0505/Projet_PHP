<?php

class Login extends Controller{

    public function index(){
 
        $scriptJS = "$(document).ready(function() {
            $('.btn').each(function() {
                $(this).removeClass('btn-info');
                $(this).removeClass('btn-secondary');
                if ($(this).attr('id') == 'btnLogin') {
                    $(this).addClass('btn-secondary');
                } else {
                    $(this).addClass('btn-info');
                }
            });
        })";

       $montitre2 = "Login";
 
    $this->render('index', compact('scriptJS', 'montitre2'));
    }

 
}