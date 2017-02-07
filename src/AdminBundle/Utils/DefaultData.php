<?php
namespace AdminBundle\Utils;
 
class DefaultData
{
    private $lang 				= 'es';
    private $class_body 		= '';
    private $header_title 		= 'Admin';
    private $header_keywords 	= 'cms,administrador,administrador de contenido,contenido';
    private $header_description = 'cms project, Administrador de contenido';
    private $header_autor		= '';

	// SETTERS

    public function setLang($lang)
    {
    	$this->lang = $lang;
    }

    public function setClassBody($class_body)
    {
    	$this->class_body = $class_body;
    }

    public function setHeaderTitle($header_title)
    {
    	$this->header_title = $header_title;
    }

    public function setHeaderKeywords($header_keywords)
    {
    	$this->header_keywords = $header_keywords;
    }

    public function setHeaderDescription($header_description)
    {
    	$this->header_description = $header_description;
    }

    public function setHeaderAutor($header_autor)
    {
    	$this->header_autor = $header_autor;
    }

    // GETTERS
    public function getAll()
    {
    	return [
    		'lang' 			=> $this->lang,
			'class_body' 	=> $this->class_body,
			'header' 		=> array(
								'title' 		=> $this->header_title,
								'keywords' 		=> $this->header_keywords,
								'description' 	=> $this->header_description,
								'autor' 		=> $this->header_autor,
							),
    	];
    }
}