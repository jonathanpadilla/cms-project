<?php

namespace AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class TableroController extends Controller
{
    public function indexAction()
    {
    	// utils
    	$default_data = $this->get('DefaultData');
    	$default_data->setHeaderTitle('Tablero');

    	$em = $this->getDoctrine()->getManager();

        return $this->render('AdminBundle::tablero.html.twig', [
        	'paginas'		=> $em->getRepository('AdminBundle:CmsPagina')->findBy(['pagEliminado' => null], ['pagOrden' => 'ASC']),
        	'default_data' 	=> $default_data->getAll()
        	]);
    }
}