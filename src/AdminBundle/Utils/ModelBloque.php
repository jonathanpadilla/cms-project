<?php
namespace AdminBundle\Utils;

use Doctrine\ORM\EntityManager;
use \stdClass;
 
class ModelBloque
{
	private $em;
	private $recursiveBodelBloque;

	public function __construct(EntityManager $entityManager)
    {
    	$this->em = $entityManager;
    	// $this->recursiveBodelBloque = $recursiveBodelBloque;
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

    				if($data->tipo_id == 1)
    				{
    					$data->secciones = $this->getSeccion($bloque->getBloIdPk(), null);

    				}elseif($data->tipo_id == 2)
    				{
    					$data->secciones = $this->getSeccion($bloque->getBloIdPk(), null, 1);

    				}elseif($data->tipo_id == 4){
    					$data->parametros = $this->getParametros($bloque->getBloIdPk());
    				}

    				$lista_bloques[] = $data;
    			}
    		}

    		dump($lista_bloques);

    		return $lista_bloques;

    	}

    	return false;
	}

	private function getParametros($bloque)
	{
		$lista_parametros = [];
		if($parametros = $this->em->getRepository('AdminBundle:CmsParametros')->findBy(['parBloqueFk' => $bloque]))
		{
			foreach ($parametros as $parametro) {
				$data = new stdClass();

				$data->id 		= $parametro->getParIdPk();
				$data->nombre 	= $parametro->getParNombre();
				$data->valor 	= $parametro->getParValor();
				$data->visible 	= $parametro->getParVisible();

				$lista_parametros[] = $data;
			}
		}

		return $lista_parametros;
	}

	public function getSeccion($bloque = null, $parent = null, $tipo = null)
	{

		$lista_seccion = [];
		if($secciones = $this->em->getRepository('AdminBundle:CmsSeccion')->findBy(['secBloqueFk' => $bloque, 'secParentFk' => $parent, 'secTipo' => $tipo, 'secEliminado' => null], ['secOrden' => 'ASC']))
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

				if(!$data->parent)
				{
					$data->sub = $this->getSeccion($bloque, $data->id, 2);
				}else{
					$data->sub = null;
				}

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

		return null;
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

		return null;
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