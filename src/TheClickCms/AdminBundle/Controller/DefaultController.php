<?php

namespace TheClickCms\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use TheClickCms\AdminBundle\Entity\Usuarios;
use TheClickCms\AdminBundle\Entity\Empresa;
use TheClickCms\AdminBundle\Entity\Actualizacion;


class DefaultController extends Controller {

    public function indexAction($name) {
        return $this->render('TheClickCmsAdminBundle:Default:index.html.twig', array('name' => $name));
    }




    public function vistaAgregarEmpresaAction(){

        return $this->render('TheClickCmsAdminBundle:Default:empresaAgregar.html.twig');


    }

    public function guardarEmpresaAction(Request $request){

        $pais = $request->request->get('pais');
        $detalle = $request->request->get('detalle');
        $nombre = $request->request->get('nombre');
        $correo = $request->request->get('correo');

        $em = $this->getDoctrine()->getManager();


        $empresa = new Empresa();

        $empresa->setCorreo($correo);
        $empresa->setNombre($nombre);
        $empresa->setDetalle($detalle);
        $empresa->setPais($pais);
        $empresa->setFecha(new \DateTime());

        $em->persist($empresa);
        $em->flush();


        return new Response('guardado');
    }




    public function loginAction() {

        return $this->render('TheClickCmsAdminBundle:Default:login.html.twig');
    }

    public function hacerLoginAction(Request $request) {
        $session = $this->getRequest()->getSession();
        $nombre = $request->request->get('usuario');
        $password = $request->request->get('password');
        $em = $this->getDoctrine()->getManager();
        $admin = $em->getRepository('TheClickCmsAdminBundle:Admin')->findOneBy(array('nombre' => $nombre, 'password' => $password));

        if ($admin) {


            $session->set('usuario', $nombre);
            $session->set('password', $password);
            return new Response('200');

        } else {


            return new Response('100');
        }
    }


    public function principalAction(){
        $session = $this->getRequest()->getSession();
        $em = $this->getDoctrine()->getManager();

        $nombre =  $session->get('usuario');
        $password = $session->get('password');
        $admin = $em->getRepository('TheClickCmsAdminBundle:Admin')->findOneBy(array('nombre' => $nombre, 'password' => $password));

        if($admin){


        return $this->render('TheClickCmsAdminBundle:Default:principal.html.twig' , array ('nombre' => $nombre , 'password' => $password));
        }else{

            return new Response('Acceso no autorizado');


        }
    }

      public  function logoutAction(){

           $session = $this->getRequest()->getSession();

           $session->remove('usuario');
           $session->remove('password');

           return   $this->redirect('login');
        }
	/* Mustra el formulario agregar usuario. */
	public function vistaFormularioUsuarioAction(){
                           $em = $this->getDoctrine()->getManager();
                           $empresas = $em->getRepository('TheClickCmsAdminBundle:Empresa')->findAll();

	           return $this->render('TheClickCmsAdminBundle:Default:agregarUsuarios.html.twig' , array('empresa'  => $empresas));
	}

	/* Controlador que guarda los datos ingresados por el usuarios en el formulario anterior. */
	public function guardarUsuarioAction(Request $data){
		//Reciviendo los valores del formulario.
		$pais = $data->request->get('pais');
		$detalle =$data->request->get('detalle');
		$nombre = $data->request->get('nombre');
		$correo = $data->request->get('correo');
		$cargo = $data->request->get('cargo');
		$empresaid = $data->request->get('empresa');

		$em = $this->getDoctrine()->getManager();
		$empresa = $em->getRepository('TheClickCmsAdminBundle:Empresa')->findOneBy(array('id' => $empresaid));

		//Creamos una instancia de la clase usuario.
		$usuario = new Usuarios();

		//Seteamos los valores ingresados por el usuario
		$usuario->setPais($pais);
		$usuario->setDetalle($detalle);
		$usuario->setNombre($nombre);
		$usuario->setEmail($correo);
		$usuario->setCargo($cargo);
		$usuario->setEmpresa($empresa);
		$usuario->setFecha(new \DateTime());

		//coneccion a la base de datos para ingresar los datos.

		$em->persist($empresa);
		$em->persist($usuario);
		$em->flush();
		return   $this->redirect('listarUsuarios');

	}

	/* Mostrar usuarios de la base de datos */

	public function listarUsuariosAction(){
		$em = $this->getDoctrine()->getManager();
		$usuario = $em->getRepository('TheClickCmsAdminBundle:Usuarios')->findAll();
		return $this->render('TheClickCmsAdminBundle:Default:listarUsuarios.html.twig', array('usuario' => $usuario));
	}

	/* Vista editar usuario */

	public function vistaEditarUsuarioAction($id){
		$em = $this->getDoctrine()->getManager();
		$usuario = $em->getRepository('TheClickCmsAdminBundle:Usuarios')->find($id);
		return $this->render('TheClickCmsAdminBundle:Default:editarUsuario.html.twig', array('usuario'=>$usuario));
	}

	/* Controlador para guardar el formulario editar */
	public function guardarFormularioEditarUsuarioAction(Request $data){
		//Recibiendo los parametros del formulario editar.
		$id = $data->request->get('id');
		$pais = $data->request->get('pais');
		$detalle = $data->request->get('detalle');
		$nombre = $data->request->get('nombre');
		$correo = $data->request->get('correo');
		$cargo = $data->request->get('cargo');
		$empresa = $data->request->get('empresa');
		//Conectamos con la base de datos.
		$em = $this->getDoctrine()->getManager();
		$usuario = $em->getRepository('TheClickCmsAdminBundle:Usuarios')->findOneBy(array('id'=>$id));
		//Seteando los valores que vienen del formulario editar.
		$usuario->setPais($pais);
		$usuario->setDetalle($detalle);
		$usuario->setNombre($nombre);
		$usuario->setEmail($correo);
		$usuario->setCargo($cargo);
		$usuario->setEmpresa($empresa);
		//Haciendo la edicion en la base de datos.
		$em->merge($usuario);
		$em->flush();
		return new response('Usuario Editado');
	}

	/* Controlador para eliminar datos de la grilla */
	public function eliminarUsuarioAction($id){
		//Conectar con la base de datos.
		$em = $this->getDoctrine()->getManager();
		$usuario = $em->getRepository('TheClickCmsAdminBundle:Usuarios')->find($id);
		$em->remove($usuario);
		$em->flush();
		return new Response('Usuario Eliminado');
	}
	/* Controlador para la vista listar empresas. */
	public function listarEmpresasAction(){
		$em = $this->getDoctrine()->getManager();
		$empresa = $em->getRepository('TheClickCmsAdminBundle:Empresa')->findAll();
		return $this->render('TheClickCmsAdminBundle:Default:listarEmpresa.html.twig', array('empresa'=>$empresa));
	}

	/* Controlador para cargar la editar empresa */
	public function vistaEditarEmpresaAction($id){
		$em = $this->getDoctrine()->getManager();
		$empresa = $em->getRepository('TheClickCmsAdminBundle:Empresa')->find($id);
		return $this->render('TheClickCmsAdminBundle:Default:editarEmpresa.html.twig', array('empresa'=>$empresa));
	}

	/* Controlador que guarda el formulario editar empresa */
	public function guardarEditarEmpresaAction(Request $data){
		$id = $data->request->get('id');
		$pais = $data->request->get('pais');
		$detalle = $data->request->get('detalle');
		$nombre = $data->request->get('nombre');
		$correo = $data->request->get('correo');

		$em = $this->getDoctrine()->getManager();
		$empresa = $em->getRepository('TheClickCmsAdminBundle:Empresa')->findOneBy(array('id'=>$id));

		$empresa->setPais($pais);
		$empresa->setDetalle($detalle);
		$empresa->setNombre($nombre);
		$empresa->setCorreo($correo);

		$em->merge($empresa);
		$em->flush();

		return new response('Usuario Editado');
	}

	/* Controlador para eliminar empresa */
	public function eliminarEmpresaAction($id){
		//Conectar con la base de datos.
		$em = $this->getDoctrine()->getManager();
		$empresa = $em->getRepository('TheClickCmsAdminBundle:Empresa')->find($id);
		$em->remove($empresa);
		$em->flush();
		return new Response('Usuario Eliminado');
	}
	/* Controlador para la vista agregar actualizacion */
	public function vistaAgregarActualizacionAction(){
		return $this->render('TheClickCmsAdminBundle:Default:agregarActualizacion.html.twig');
	}

	/* Controlador que guarda lo que viene del formulario agregar actualizacion */
	public function guardarActualizacionAction(Request $data){
		$detalle = $data->request->get('detalle');
		$descripccioncorta = $data->request->get('descripcioncorta');
		$version = $data->request->get('version');

		$actualizacion = new Actualizacion();

		$actualizacion->setDescripcion($detalle);
		$actualizacion->setDescripcionCorta($descripccioncorta);
		$actualizacion->setVersion($version);
		$actualizacion->setFechaActualizacion(new \DateTime());

		$em = $this->getDoctrine()->getManager();
		$em->persist($actualizacion);
		$em->flush();
		return new response('Actualizacion Guardada');
	}

	/* Renderiza la vista de la grilla mostrar actualizaciones */
	public function listarActualizacionAction(){
		$em = $this->getDoctrine()->getManager();
		$actualizacion = $em->getRepository('TheClickCmsAdminBundle:Actualizacion')->findAll();
		return $this->render('TheClickCmsAdminBundle:Default:listarActualizacion.html.twig', array('actualizacion'=>$actualizacion));
	}

	public function vistaEditarActualizacionAction($id){
		$em = $this->getDoctrine()->getManager();
		$actualizacion = $em->getRepository('TheClickCmsAdminBundle:Actualizacion')->find($id);
		return $this->render('TheClickCmsAdminBundle:Default:editarActualizacion.html.twig', array('actualizacion'=>$actualizacion));
	}

	public function guardarEditarActualizacionAction(Request $data){
		$id = $data->request->get('id');
		$detalle = $data->request->get('detalle');
		$descripcioncorta = $data->request->get('descripcioncorta');
		$version = $data->request->get('version');

		$em = $this->getDoctrine()->getManager();
		$actualizacion = $em->getRepository('TheClickCmsAdminBundle:Actualizacion')->findOneBy(array('id'=>$id));

		$actualizacion->setDescripcion($detalle);
		$actualizacion->setDescripcionCorta($descripcioncorta);
		$actualizacion->setVersion($version);

		$em->merge($actualizacion);
		$em->flush();

		return new response("Usuario Editado");
	}

	public function eliminarActualizacionAction($id){
		$em = $this->getDoctrine()->getManager();
		$actualizacion = $em->getRepository('TheClickCmsAdminBundle:Actualizacion')->find($id);
		$em->remove($actualizacion);
		$em->flush();
		return new Response('Actualizacion Eliminada');
	}
}
