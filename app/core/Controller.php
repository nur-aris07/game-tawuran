<?php

class Controller {
    public function view($view, $data=[])
    {
        require_once '../app/views/' . $view . '.php';
    }

    public function model($model)
    {
        require_once '../app/models/' . $model . '.php';
        return new $model;
    }

    public function tier($poin)
    {
        if ($poin<100) {
            return 'Bronze';
        } else if ($poin<200) {
            return 'Silver';
        } else if ($poin<500) {
            return 'Gold';
        } else if ($poin<1000) {
            return 'Epic';
        } else {
            return 'Platinum';
        }
    }
}