<?php

namespace TheClickCms\UploadBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('TheClickCmsUploadBundle:Default:index.html.twig', array('name' => $name));
    }
}
