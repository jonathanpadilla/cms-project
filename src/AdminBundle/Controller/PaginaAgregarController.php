<?php

namespace AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use AdminBundle\Entity\CmsPagina;

class PaginaAgregarController extends Controller
{
    public function indexAction($id = 0)
    {
    	// utils
    	$default_data = $this->get('DefaultData');
    	$default_data->setHeaderTitle('Agregar nueva página');

        // editar
        $pagina = false;
        if($id)
        {
            $em = $this->getDoctrine()->getManager();
            $pagina = $em->getRepository('AdminBundle:CmsPagina')->findOneBy(['pagIdPk' => $id]);
        }

        return $this->render('AdminBundle::pagina_agregar.html.twig', [
            'pagina'        => $pagina,
        	'default_data' 	=> $default_data->getAll()
        	]);
    }

    public function guardarAction(Request $request)
    {
        if($request->getMethod() == 'POST')
        {
            $id         = $request->get('id', false);
            $nombre     = ucfirst(strtolower($request->get('input_nombre', false)));
            $orden      = ($request->get('input_orden', false)) ? $request->get('input_orden', false) : 0;
            $controller = ucfirst($request->get('input_controller', false));
            $comentario = ucfirst($request->get('txtarea_comentario', false));

            $em = $this->getDoctrine()->getManager();
            if(!$pagina = $em->getRepository('AdminBundle:CmsPagina')->findOneBy(['pagIdPk' => $id]))
            {
                $pagina = new CmsPagina();
                $pagina->setPagFechaRegistro(new \DateTime(date("Y-m-d H:i:s")));
            }

            $pagina->setPagNombre($nombre);
            $pagina->setPagController($controller);
            $pagina->setPagOrden($orden);
            $pagina->setPagComentario($comentario);

            $em->persist($pagina);
            $em->flush();

        }

        return new RedirectResponse($this->generateUrl('admin_tablero'));
    }

    public function eliminarAction($id = 0)
    {
        if($id)
        {
            $em = $this->getDoctrine()->getManager();
            $pagina = $em->getRepository('AdminBundle:CmsPagina')->findOneBy(['pagIdPk' => $id]);
            $pagina->setPagEliminado(1);
            $em->persist($pagina);
            $em->flush();
        }

        return new RedirectResponse($this->generateUrl('admin_tablero'));
    }
}