<?php

namespace TheClickCms\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use TheClickCms\AdminBundle\Entity\Usuarios;

class DefaultController extends Controller {

    public function indexAction($name) {
        return $this->render('TheClickCmsAdminBundle:Default:index.html.twig', array('name' => $name));
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

            return new Response('logout');
        }
	/* Mustra el formulario agregar usuario. */
	public function vistaFormularioUsuarioAction(){
		return $this->render('TheClickCmsAdminBundle:Default:agregarUsuarios.html.twig');
	}

	/* Controlador que guarda los datos ingresados por el usuarios en el formulario anterior. */
	public function guardarUsuarioAction(Request $data){
		//Reciviendo los valores del formulario.
		//$usuario = $data->request->get('usuario');
		$pais = $data->request->get('pais');
		$detalle =$data->request->get('detalle');
		$nombre = $data->request->get('nombre');
		$correo = $data->request->get('correo');
		$cargo = $data->request->get('cargo');
		$empresa = $data->request->get('empresa');
		//Creamos una instancia de la clase usuario.
		$usuario = new Usuarios();
		//Seteamos los valores ingresados por el usuario
		$usuario->setPais($pais);
		$usuario->setDetalle($detalle);
		$usuario->setNombre($nombre);
		$usuario->setEmail($correo);
		$usuario->setCargo($cargo);
		$usuario->setEmpresa($empresa);
		//coneccion a la base de datos para ingresar los datos.
		$em = $this->getDoctrine()->getManager();
		$em->persist($usuario);
		$em->flush();

		return new response('Datos guardados');
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
}
