<?php
/**
 * @copyright 2023 Nekrasov Vitaliy
 * @license     GNU General Public License version 2 or later
 */
namespace Joomla\Component\Wishboxcdek\Site\Service;

use Exception;
use Joomla\Component\Wishboxrussianpost\Site\Interface\RegistratorDelegateInterface;
use Joomla\Component\Wishboxrussianpost\Site\Trait\ApiClientTrait;
use Wishbox\ShippingService\Russianpost\ApiClient;
use function defined;

// phpcs:disable PSR1.Files.SideEffects
defined('_JEXEC') or die;
// phpcs:enable PSR1.Files.SideEffects

require_once JPATH_SITE . '/vendor/autoload.php';

/**
 * @since 1.0.0
 *
 * @noinspection PhpUnused
 */
class Registrator
{
	use ApiClientTrait;

	/**
	 * @var RegistratorDelegateInterface $delegate
	 *
	 * @since 1.0.0
	 */
	protected RegistratorDelegateInterface $delegate;

	/**
	 * @param   RegistratorDelegateInterface  $delegate Delegate
	 *
	 * @since 1.0.0
	 */
	public function __construct(RegistratorDelegateInterface $delegate)
	{
		$this->delegate = $delegate;
	}

	/**
	 * Registers a new order or updates an existing one
	 *
	 * @return void
	 *
	 * @throws Exception
	 *
	 * @since 1.0.0
	 */
	public function register(): void
	{
		$apiClient = new ApiClient(
			$this->addonParams->get('authorisation_token'),
			$this->addonParams->get('authorisation_key'),
			$this->addonParams->get('debug_mode')
		);

		$russianpostorderId = $apiClient->userBacklog(
			$this->delegate->getRecipientLastName(),
			$this->delegate->getRecipientFirstName(),
			$this->delegate->getRecipientPatronymic(),
			$this->delegate->getRecipientIndex(),
			$this->getMailType(),
			$weight,
			$orderNum,
			$placeTo,
			$postofficeCode,
			$regionTo,
			$streetTo,
			$telAddress
		);

		return $apiClient->backlog($russianpostorderId);
	}
}
