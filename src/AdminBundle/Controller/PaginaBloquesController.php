<?php

namespace AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use AdminBundle\Entity\CmsBloque;

class PaginaBloquesController extends Controller
{
    public function indexAction($id = 0)
    {
    	// utils
    	$default_data = $this->get('DefaultData');
    	$default_data->setHeaderTitle('Administrar bloque');
        $model_bloque = $this->get('ModelBloque');

        // editar
        $pagina = false;
        if($id)
        {
            $em = $this->getDoctrine()->getManager();
            $pagina = $em->getRepository('AdminBundle:CmsPagina')->findOneBy(['pagIdPk' => $id]);
        }

        $bloques = $this->renderView('AdminBundle:Layouts:bloque_admin.html.twig', ['bloques' => $model_bloque->getAll($id)]);

        return $this->render('AdminBundle::pagina_bloques.html.twig', [
            'pagina'        => $pagina,
            'bloques'       => $bloques,
        	'default_data' 	=> $default_data->getAll()
        	]);
    }

    public function agregarBloqueAction(Request $request)
    {
        if($request->getMethod() == 'POST' || $request->getMethod() == 'GET')
        {
            $pagina     = $request->get('pagina', null);
            $tipo       = $request->get('tipo', null);
            $id         = $request->get('id', null);
            $nombre     = $request->get('nombre', null);
            $controller = $request->get('controller', null);
            $orden      = $request->get('orden', 1);
            $visible    = $request->get('visible', 1);
            $comentario = $request->get('comentario', null);

            $em = $this->getDoctrine()->getManager();

            if(!$bloque = $em->getRepository('AdminBundle:CmsBloque')->findOneBy(['bloIdPk' => $id]))
            {
                $fk_pagina = $em->getRepository('AdminBundle:CmsPagina')->findOneBy(['pagIdPk' => $pagina]);
                $fk_tipo = $em->getRepository('AdminBundle:CmsBloqueTipo')->findOneBy(['btiIdPk' => $tipo]);

                $bloque = new CmsBloque();
                $bloque->setBloFechaRegistro(new \DateTime(date("Y-m-d H:i:s")));
                $bloque->setBloPaginaFk($fk_pagina);
                $bloque->setBloTipoFk($fk_tipo);
            }

            $bloque->setBloNombre($nombre);
            $bloque->setBloController($controller);
            $bloque->setBloOrden($orden);
            $bloque->setBloVisible($visible);
            $bloque->setBloComentario($comentario);

            $em->persist($bloque);
            $em->flush();

            return new RedirectResponse($this->generateUrl('admin_pagina_bloques', ['id' => $pagina]));
        }

        return new RedirectResponse($this->generateUrl('admin_tablero'));
    }

    public function cargarFormAction(Request $request)
    {
        $html = null;

        if($request->getMethod() == 'POST')
        {
            $tipo   = $request->get('tipo', false);
            $pagina = $request->get('pagina', false);

            switch($tipo)
            {
                case 2:$html = $this->renderView('AdminBundle:Layouts:form_bloque_publicacion.html.twig', ['pagina' => $pagina]);
                    break;
            }
        }

        // $normalizer = new ObjectNormalizer();
        // $encoder = new JsonEncoder();
        // $serializer = new Serializer(array($normalizer), array($encoder));

        // return new response(
        //     $serializer->serialize($result, 'json')
        // );
        
        return new response($html);
    }
}