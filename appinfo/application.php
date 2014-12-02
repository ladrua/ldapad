<?php
/**
 * ownCloud - ldapad
 *
 * This file is licensed under the Affero General Public License version 3 or
 * later. See the COPYING file.
 *
 * @author Stian Aurdal <stian@databank.no>
 * @copyright Stian Aurdal 2014
 */

namespace OCA\LdapAd\AppInfo;


use \OCP\AppFramework\App;
use \OCP\IContainer;

use \OCA\LdapAd\Controller\PageController;


class Application extends App {


	public function __construct (array $urlParams=array()) {
		parent::__construct('ldapad', $urlParams);

		$container = $this->getContainer();

		/**
		 * Controllers
		 */
		$container->registerService('PageController', function(IContainer $c) {
			return new PageController(
				$c->query('AppName'), 
				$c->query('Request'),
				$c->query('UserId')
				
			);
		});


		/**
		 * Core
		 */
		$container->registerService('UserId', function(IContainer $c) {
			return \OCP\User::getUser();
		});		
		
	}


}