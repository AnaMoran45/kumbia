<?php

Load::models('Alumnos');
class AlumnosController extends AppController
{
    public function index($page=1)
    {
        View::template('pantalla1');
        $this->titulo="Listado alumnos";
        $alumno = new Alumnos();
        $this->ListaAlumnos = $alumno->getAlumnos($page);

    }

    /* Crea un Registro

    public function registro(){
        View::template('pantalla1');
        $this->titulo="Registro de alumnos";
    }*/

    public function create()
    {
        $this->titulo = "Registrando Alumnos";
        View::template('pantalla1');
        if (Input::hasPost('alumnos')) {
            $alumno = new Alumnos(Input::post('alumnos'));
            if ($alumno->create()) {
                Flash::valid("Creado Exitosamente");
                Input::delete();
                return;
            }
            Flash::error("Fallo la operacion");
        }
    }
    
    /*editar*/

   public function edit($Id){
        $this->titulo = "Editando registro";
       View::template('pantalla1');
       $alumno = new Alumnos();
       if(Input::hasPost('alumnos')){
           if(!$alumno->update(Input::post('alumnos'))){
               Flash::error("No se actualizo el regitro");
           }else{
               Flash::valid("Alumno actualizado");
               return Redirect::to();
           }
       }else{
           $this->alumnos = $alumno->find((int)$Id);
       }
   }

   /* elimina*/

   public function del($Id){
    $alumno = new Alumnos();
    if(!$alumno->delete((int) $Id)){
        Flash::error("Error al borrar");
        }else{
            Flash::valid("Alumno borrado");
        }

        return Redirect::to();
   }

}

