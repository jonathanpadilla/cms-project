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

class PublicacionController extends Controller
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

        $bloques = $this->renderView('AdminBundle:Bloques:bloque_admin.html.twig', ['bloques' => $model_bloque->getAll($id)]);

        return $this->render('AdminBundle::pagina_bloques.html.twig', [
            'pagina'        => $pagina,
            'bloques'       => $bloques,
        	'default_data' 	=> $default_data->getAll()
        	]);
    }
}