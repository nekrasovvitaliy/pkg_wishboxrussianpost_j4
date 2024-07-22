<?php
/**
 * @copyright (c) 2024 Nekrasov Vitaliy
 * @license     GNU General Public License version 2 or later;
 */
namespace Joomla\Component\Wishboxrussianpost\Administrator\Extension;

// phpcs:disable PSR1.Files.SideEffects
defined('_JEXEC') or die;
// phpcs:enable PSR1.Files.SideEffects

use Joomla\CMS\Cache\CacheControllerFactoryAwareInterface;
use Joomla\CMS\Factory;
use Joomla\CMS\Form\FormFactoryAwareInterface;
use Joomla\CMS\Router\SiteRouterAwareInterface;
use Joomla\Component\Wishboxrussianpost\Administrator\Service\Html\Wishboxrussianpost;
use Joomla\CMS\Association\AssociationServiceTrait;
use Joomla\CMS\Component\Router\RouterServiceInterface;
use Joomla\CMS\Component\Router\RouterServiceTrait;
use Joomla\CMS\Extension\BootableExtensionInterface;
use Joomla\CMS\Extension\MVCComponent;
use Joomla\CMS\HTML\HTMLRegistryAwareTrait;
use Joomla\Database\DatabaseAwareInterface;
use Joomla\Database\DatabaseDriver;
use Joomla\Database\Exception\DatabaseNotFoundException;
use Joomla\Event\DispatcherAwareInterface;
use Psr\Container\ContainerInterface;
use UnexpectedValueException;
use function defined;

/**
 * Component class for Wishboxrussianpost
 *
 * @since  1.0.0
 */
class WishboxrussianpostComponent extends MVCComponent implements RouterServiceInterface, BootableExtensionInterface
{
	use AssociationServiceTrait;
	use RouterServiceTrait;
	use HTMLRegistryAwareTrait;

	/**
	 * Booting the extension. This is the function to set up the environment of the extension like
	 * registering new class loaders, etc.
	 *
	 * If required, some initial set-up can be done from services of the container, e.g.,
	 * registering HTML services.
	 *
	 * @param   ContainerInterface  $container  The container
	 *
	 * @return  void
	 *
	 * @since   1.0.0
	 *
	 * @noinspection PhpMissingReturnTypeInspection
	 */
	public function boot(ContainerInterface $container)
	{
		$db = $container->get('DatabaseDriver');
		$this->getRegistry()->register('wishboxrussianpost', new Wishboxrussianpost($db));
	}

	/**
	 * Returns the table for the count items functions for the given section.
	 *
	 * @param   string|null  $section  The section
	 *
	 * @return  void
	 *
	 * @since   1.0.0
	 */
	protected function getTableNameForSection(string $section = null)
	{

	}

	/**
	 * @param   string  $name    Name
	 * @param   string  $prefix  Prefix
	 * @param   array   $config  Config
	 *
	 * @return mixed
	 *
	 * @since 1.0.0
	 */
	public function createModel(string $name, string $prefix, array $config = []): mixed
	{
		$mvcFactory = $this->getMVCFactory();
		$className = 'Joomla\\Component\\Wishboxrussianpost\\' . $prefix . '\\' . ucfirst($name) . 'Model';
		$model = new $className($config, $mvcFactory);

		if ($model instanceof FormFactoryAwareInterface)
		{
			try
			{
				/** @noinspection PhpPossiblePolymorphicInvocationInspection */
				$model->setFormFactory($mvcFactory->getFormFactory());
			}

			/** @noinspection PhpUnusedLocalVariableInspection */
			catch (UnexpectedValueException $e)
			{
				// Ignore it
			}
		}

		if ($model instanceof DispatcherAwareInterface)
		{
			try
			{
				/** @noinspection PhpPossiblePolymorphicInvocationInspection */
				$model->setDispatcher($mvcFactory->getDispatcher());
			}

			/** @noinspection PhpUnusedLocalVariableInspection */
			catch (UnexpectedValueException $e)
			{
				// Ignore it
			}
		}

		if ($model instanceof SiteRouterAwareInterface)
		{
			try
			{
				/** @noinspection PhpPossiblePolymorphicInvocationInspection */
				$model->setSiteRouter($mvcFactory->getSiteRouter());
			}

			/** @noinspection PhpUnusedLocalVariableInspection */
			catch (UnexpectedValueException $e)
			{
				// Ignore it
			}
		}

		if ($model instanceof CacheControllerFactoryAwareInterface)
		{
			try
			{
				/** @noinspection PhpPossiblePolymorphicInvocationInspection */
				$model->setCacheControllerFactory($mvcFactory->getCacheControllerFactory());
			}

			/** @noinspection PhpUnusedLocalVariableInspection */
			catch (UnexpectedValueException $e)
			{
				// Ignore it
			}
		}

		if ($model instanceof DatabaseAwareInterface)
		{
			try
			{
				$model->setDatabase(Factory::getContainer()->get(DatabaseDriver::class));
			}

			/** @noinspection PhpUnusedLocalVariableInspection */
			catch (DatabaseNotFoundException $e)
			{
				@trigger_error(
					'Database must be set, this will not be caught anymore in 5.0.',
					E_USER_DEPRECATED
				);
				$model->setDatabase(Factory::getContainer()->get(DatabaseDriver::class));
			}
		}

		return $model;
	}
}
