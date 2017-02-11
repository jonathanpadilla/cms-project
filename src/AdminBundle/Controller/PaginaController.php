<?php

namespace AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use \stdClass;

class PaginaController extends Controller
{
    public function indexAction($id = 0)
    {
    	if($id)
    	{
    		$default_data = $this->get('DefaultData');
    		$default_data->setHeaderTitle('Pagina');
    		$model_bloque = $this->get('ModelBloque');
    		
    		$bloques = $this->renderView('AdminBundle:Bloques:bloque.html.twig', ['bloques' => $model_bloque->getAll($id)]);

    		return $this->render('AdminBundle::pagina.html.twig', [
    			'bloques'		=> $bloques,
                'id_pagina'     => $id,
	        	'default_data' 	=> $default_data->getAll()
        	]);
    	}
    	return new RedirectResponse($this->generateUrl('admin_tablero'));
    }

    public function editarItemAction(Request $request)
    {
        if($request->getMethod() == 'POST')
        {
            $id     = $request->get('id', null);
            $tipo   = $request->get('tipo', null);
            $value  = $request->get('value', null);

            return new response(
                $this->renderView('AdminBundle:Bloques:form_editar_texto.html.twig', [
                    'id'    => $id,
                    'tipo'  => $tipo,
                    'value' => $value]
                )
            );

        }

        return new RedirectResponse($this->generateUrl('admin_tablero'));
    }

    public function guardarItemAction(Request $request)
    {
        if($request->getMethod() == 'POST')
        {
            $id             = $request->get('id', null);
            $nuevo_etxto    = $request->get('texto', null);

            $em = $this->getDoctrine()->getManager();
            if($texto = $em->getRepository('AdminBundle:CmsTexto')->findOneBy(['texIdPk' => $id]))
            {
                $texto->setTexTexto($nuevo_etxto);

                $em->persist($texto);
                $em->flush();

                return new RedirectResponse($this->generateUrl('admin_pagina', ['id' => $texto->getTexSectionFk()->getSecBloqueFk()->getBloPaginaFk()->getPagIdPk()]));
            }
        }

        return new RedirectResponse($this->generateUrl('admin_tablero'));
    }
}