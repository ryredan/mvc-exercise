<?php
class ErrorController extends Controller
{
    public function process($params)
    {
        header("HTTP/1.0 $)$ Not Found");
        $this->head['title'] = 'Error 404';
        $this->view = 'error';
    }
}