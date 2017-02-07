<?php
namespace AdminBundle\Utils;

use Doctrine\ORM\EntityManager;
use AdminBundle\Utils\ModelBloque;
use \stdClass;
 
class ModelBloque
{
	private $em;

	public function __construct(EntityManager $entityManager)
    {
    	$this->em = $entityManager;
    }

	public function getAll($pagina)
	{
		if($pagina)
    	{

    		$lista_bloques = [];
    		if($bloques = $this->em->getRepository('AdminBundle:CmsBloque')->findBy(['bloPaginaFk' => $pagina, 'bloEliminado' => null], ['bloOrden' => 'ASC']))
    		{
    			foreach($bloques as $bloque)
    			{
    				$data = new stdClass();

    				$data->id 			= $bloque->getBloIdPk();
    				$data->nombre 		= $bloque->getBloNombre();
    				$data->controller 	= $bloque->getBloController();
    				$data->orden 		= $bloque->getBloOrden();
    				$data->visible 		= $bloque->getBloVisible();
    				$data->comentario	= $bloque->getBloComentario();
    				$data->tipo_id 		= $bloque->getBloTipoFk()->getBtiIdPk();
    				$data->tipo_nombre	= $bloque->getBloTipoFk()->getBtiNombre();
    				$data->secciones 	= $this->getSeccion($bloque->getBloIdPk());

    				$lista_bloques[] = $data;
    			}
    		}

    		return $lista_bloques;

    	}

    	return false;
	}

	public function getSeccion($bloque = null, $parent = null)
	{

		$lista_seccion = [];
		if($secciones = $this->em->getRepository('AdminBundle:CmsSeccion')->findBy(['secBloqueFk' => $bloque, 'secParentFk' => $parent, 'secEliminado' => null], ['secOrden' => 'ASC']))
		{
			foreach($secciones as $seccion )
			{
				$data = new stdClass();

				$data->id 		= $seccion->getSecIdPk();
				$data->parent	= ($seccion->getSecParentFk()) ? $seccion->getSecParentFk()->getSecIdPk(): null;
				$data->nombre 	= $seccion->getSecNombre();
				$data->texto 	= $seccion->getSecTexto();
				$data->orden 	= $seccion->getSecOrden();
				$data->tipo 	= $seccion->getSecTipo();
				$data->item 	= $this->buscarItem($seccion->getSecIdPk());

				// if(!$data->parent)
				// {
				// 	$sub = new ModelBloque();
				// 	$data->sub 		= $sub->getSeccion(null, $data->parent);
				// }

				$lista_seccion[] = $data;
			}
		}

		return $lista_seccion;

	}

	private function buscarItem($seccion)
	{
		if($seccion)
		{
			// buscar texto
			if($texto = $this->getTexto($seccion))
			{
				return ['texto' => $texto];
			}

			if($imagen = $this->getImagen($seccion))
			{
				return ['imagen' => $imagen];
			}
		}

		return false;
	}

	public function getTexto($seccion)
	{
		if($seccion)
		{
			if($texto = $this->em->getRepository('AdminBundle:CmsTexto')->findOneBy(['texSectionFk' => $seccion]))
			{
				return $texto;
			}
		}

		return false;
	}

	public function getImagen($seccion)
	{
		if($seccion)
		{
			if($imagen = $this->em->getRepository('AdminBundle:CmsImagen')->findOneBy(['imaSeccionFk' => $seccion]))
			{
				return $imagen;
			}
		}

		return false;
	}
}