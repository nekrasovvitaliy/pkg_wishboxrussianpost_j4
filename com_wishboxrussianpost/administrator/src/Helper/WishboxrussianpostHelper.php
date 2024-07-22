<?php
/**
 * @copyright (c) 2024 Nekrasov Vitaliy
 * @license     GNU General Public License version 2 or later;
 */
namespace Joomla\Component\Wishboxcdek\Administrator\Helper;

use Exception;
use Joomla\CMS\Factory;
use Joomla\Database\DatabaseDriver;
use Joomla\Registry\Registry;
use RuntimeException;

// phpcs:disable PSR1.Files.SideEffects
defined('_JEXEC') or die;
// phpcs:enable PSR1.Files.SideEffects

/**
 * Wishboxcdek helper.
 *
 * @since  1.0.0
 */
class WishboxrussianpostHelper
{
	/**
	 * Gets a list of the actions that can be performed.
	 *
	 * @return  Registry
	 *
	 * @throws Exception
	 *
	 * @since   1.0.0
	 */
	public static function getActions(): Registry
	{
		$user = Factory::getApplication()->getIdentity();
		$result = new Registry;

		$assetName = 'com_wishboxrussianpost';

		$actions = [
			'core.admin'
		];

		foreach ($actions as $action)
		{
			$result->set($action, $user->authorise($action, $assetName));
		}

		return $result;
	}
}
