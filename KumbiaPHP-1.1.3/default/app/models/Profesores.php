<?php

    class Profesores extends ActiveRecord{
        public function getProfesores($page, $ppage=20){
            return $this->paginate("page: $page", "per_page: $ppage", 'order: Id desc');
        }
    }

?>