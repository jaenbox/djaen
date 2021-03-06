<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use AppBundle\Entity\Cliente;
use AppBundle\Entity\Tecnico;
use AppBundle\Entity\HelpDesk;


class UserController extends Controller {

	public function defaultAction(Request $request) {
		// Recogemos el repositorio
		$repositoryCli = $this->getDoctrine() ->getRepository('AppBundle:Cliente');
		// recuperamos todos los clientes existentes
		$clientes = $repositoryCli->findAll();

		// Recogemos el repositorio
		$repositoryHd = $this->getDoctrine() ->getRepository('AppBundle:HelpDesk');
		// recuperamos todos los help desk existentes
		$helpdesks = $repositoryHd->findAll();

		// Recogemos el repositorio
		$repositoryTec = $this->getDoctrine() ->getRepository('AppBundle:Tecnico');
		// recuperamos todos los tecnicos existentes
		$tecnicos = $repositoryTec->findAll();

		// Recogemos el repositorio
		$repositoryAdm = $this->getDoctrine() ->getRepository('AppBundle:Administrador');
		// recuperamos todos los administradores existentes
		$admins = $repositoryAdm->findAll();

		// Se muestra la plantilla por defecto con el listado de todos los usuarios.
		return $this->render('User/default.html.twig', array( 'clientes' => $clientes, 'tecnicos' => $tecnicos, 'helpdesks' => $helpdesks, 'admins' => $admins));

	}

}