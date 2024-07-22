<?php
/**
 * @copyright (c) 2024 Nekrasov Vitaliy
 * @license     GNU General Public License version 2 or later;
 */

use Joomla\CMS\Component\Router\RouterFactoryInterface;
use Joomla\CMS\Dispatcher\ComponentDispatcherFactoryInterface;
use Joomla\CMS\Extension\ComponentInterface;
use Joomla\CMS\Extension\Service\Provider\ComponentDispatcherFactory;
use Joomla\CMS\Extension\Service\Provider\MVCFactory;
use Joomla\CMS\Extension\Service\Provider\RouterFactory;
use Joomla\CMS\HTML\Registry;
use Joomla\CMS\MVC\Factory\MVCFactoryInterface;
use Joomla\Component\Wishboxrussianpost\Administrator\Extension\WishboxrussianpostComponent;
use Joomla\DI\Container;
use Joomla\DI\ServiceProviderInterface;

// phpcs:disable PSR1.Files.SideEffects
defined('_JEXEC') or die;
// phpcs:enable PSR1.Files.SideEffects

/**
 * The Wishboxrussianpost service provider.
 *
 * @since  1.0.0
 */
return new class implements ServiceProviderInterface
{
	/**
	 * Registers the service provider with a DI container.
	 *
	 * @param   Container  $container  The DI container.
	 *
	 * @return  void
	 *
	 * @since   1.0.0
	 *
	 * @noinspection PhpMissingReturnTypeInspection
	 */
	public function register(Container $container)
	{
		$container->registerServiceProvider(new MVCFactory('\\Joomla\\Component\\Wishboxrussianpost'));
		$container->registerServiceProvider(new ComponentDispatcherFactory('\\Joomla\\Component\\Wishboxcdek'));
		$container->registerServiceProvider(new RouterFactory('\\Joomla\\Component\\Wishboxcdek'));

		$container->set(
			ComponentInterface::class,
			function (Container $container)
			{
				$component = new WishboxrussianpostComponent($container->get(ComponentDispatcherFactoryInterface::class));

				$component->setRegistry($container->get(Registry::class));
				$component->setMVCFactory($container->get(MVCFactoryInterface::class));
				$component->setRouterFactory($container->get(RouterFactoryInterface::class));

				return $component;
			}
		);
	}
};
