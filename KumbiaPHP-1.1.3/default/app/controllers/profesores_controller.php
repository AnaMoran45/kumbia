<?php

Load::models('Profesores');
class ProfesoresController extends AppController
{
    public function index($page=1)
    {
        View::template('pantalla1');
        $this->titulo = "Profesores";
        $profesor = new Profesores();
        $this->ListaProfesores = $profesor->getProfesores($page);
    }

    //create

    public function create()
    {
        $this->titulo = "Registro profesores";
        View::template('pantalla1');
        if (Input::hasPost('profesores')){
            $profesor = new Profesores(Input::post('profesores'));
            if ($profesor->create()){
                Flash::valid("Creado exitosamente");
                Input::delete();
                return;
            }
            Flash::error("Fallo la operacion");
        }
    }

    //edit

    public function edit($Id){
        $this->titulo = "Editando registro";
        View::template('pantalla1');
        $profesor = new Profesores();
        if (Input::hasPost('profesores')){
            if(!$profesor->update(Input::post('profesores'))){
                Flash::error("No se actualizo el registro");
            }else{
                Flash::valid("Profesor actualizado");
                return Redirect::to();
            }
        }else{
            $this->profesores = $profesor->find((int)$Id);
        }
    }

    //eliminar

    public function del($Id)
    {
        $profesor = new Profesores();
        if (!$profesor->delete((int) $Id)) {
            Flash::error("Error al borrar");
        } else {
            Flash::valid("Alumno borrado");
        }

        return Redirect::to();
    }

}
