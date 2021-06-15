<?php

    class Alumnos extends ActiveRecord{
        public function getAlumnos($page, $ppage=20){
            return $this->paginate("page: $page", "per_page: $ppage", 'order: Id desc');
        }
    }
?>