<?php
namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use AppBundle\Entity\Estado;

class LoadEstadoData extends AbstractFixture implements FixtureInterface, OrderedFixtureInterface, ContainerAwareInterface {
	
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
		$fd = fopen($symfony_app_base_dir.'/Resources/data/estado.csv', "r");
		
		if($fd) {
			while (($data = fgetcsv($fd)) !== false) {
				// Creamos el objeto
				$estado = new Estado();
				// Recogemos el objeto del fichero
				$estado -> setEstado($data[0]);
		
				$manager->persist($estado);
				// alamacenamos en la base de datos.
				$manager->flush();
		
				// referenciamos el estado.
				$this->addReference($estado->getEstado(), $estado);
			}
			fclose($fd);	// se cierra el fichero
		}
		
	}
	
	//Orden de carga de ficheros.
	public function getOrder() {
	
		return 1;
	}
}