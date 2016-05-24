<?php
namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use AppBundle\Entity\Estado;
use AppBundle\Entity\Roles;

class LoadRolesData extends AbstractFixture implements FixtureInterface, OrderedFixtureInterface, ContainerAwareInterface {
	
	/**
	 *
	 * @var ContainerInterface
	 */
	private $container;
	
	public function setContainer(ContainerInterface $container = null) {
	
		$this->container = $container;
	
	}
	
	public function load(ObjectManager $manager) {
				
		// Recogemos la ubicación del proyecto symfony
		$symfony_app_base_dir = $this->container->getParameter('kernel.root_dir');
		
		// abrimos el fichero y lo recorremos en modo lectura
		$fd = fopen($symfony_app_base_dir.'/Resources/data/roles.csv', "r");
		
		if($fd) {
			while (($data = fgetcsv($fd)) !== false) {
				// Creamos el objeto
				$roles = new Roles();
				// Recogemos el objeto del fichero
				$roles->setNombre($data[0]);
				$roles->setRole($data[1]);
		
				$manager->persist($roles);
				// alamacenamos en la base de datos.
				$manager->flush();
		
				// referenciamos el estado.
				$this->addReference($roles->getRole(), $roles);
			}
			fclose($fd);	// se cierra el fichero
		}
		
	}
	
	//Orden de carga de ficheros.
	public function getOrder() {
	
		return 2;
	}
}
