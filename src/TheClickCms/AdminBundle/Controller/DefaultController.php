<?php

namespace TheClickCms\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

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
      
        

}
