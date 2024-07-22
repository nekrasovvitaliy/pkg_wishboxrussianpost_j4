<?php
/**
 * @copyright (c) 2023 Nekrasov Vitaliy
 * @license     GNU General Public License version 2 or later;
 */
namespace Joomla\Component\Wishboxrussianpost\Site\Trait;

use Joomla\CMS\Component\ComponentHelper;
use Wishbox\ShippingService\Russianpost\ApiClient;

/**
 * @since 1.0.0
 *
 * @noinspection PhpUnused
 */
trait ApiClientTrait
{
	/**
	 * @return ApiClient
	 *
	 * @since 1.0.0
	 */
	protected function getApiClient(): ApiClient
	{
		$componentParams = ComponentHelper::getParams('com_wishboxrussianpost');

		return new ApiClient(
			$componentParams->get('authorisationToken', ''),
			$componentParams->get('authorisationKey', ''),
			(bool) $componentParams->get('debugMode', false)
		);
	}
}
