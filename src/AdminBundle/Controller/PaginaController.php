<?php

namespace AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use \stdClass;

class PaginaController extends Controller
{
    public function indexAction($id = 0)
    {
    	if($id)
    	{
    		$default_data = $this->get('DefaultData');
    		$default_data->setHeaderTitle('');
    		$model_bloque = $this->get('ModelBloque');

    		// dump($model_bloque->getAll($id));exit;
    		
    		$bloques = $this->renderView('AdminBundle:Layouts:bloque.html.twig', ['bloques' => $model_bloque->getAll($id)]);

    		return $this->render('AdminBundle::pagina.html.twig', [
    			'bloques'		=> $bloques,
	        	'default_data' 	=> $default_data->getAll()
        	]);
    	}
    	return new RedirectResponse($this->generateUrl('admin_tablero'));
    }
}