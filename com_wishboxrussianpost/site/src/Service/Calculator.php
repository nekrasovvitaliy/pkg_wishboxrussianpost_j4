<?php
/**
 * @copyright   (c) 2013-2024 Nekrasov Vitaliy <nekrasov_vitaliy@list.ru>
 * @license     GNU General Public License version 2 or later
 */
namespace Joomla\Component\Wishboxrussianpost\Site\Service;

use Exception;
use InvalidArgumentException;
use Joomla\Component\Wishboxrussianpost\Site\Interface\CalculatorDelegateInterface;
use Joomla\Component\Wishboxrussianpost\Site\Trait\ApiClientTrait;
use Wishbox\ShippingService\ShippingTariff;
use WishboxRussianPost\Model\Request\Tariff\TariffPostRequest;
use function defined;

// phpcs:disable PSR1.Files.SideEffects
defined('_JEXEC') or die;
// phpcs:enable PSR1.Files.SideEffects

/**
 * @since 1.0.0
 *
 * @noinspection PhpUnused
 */
class Calculator
{
	use ApiClientTrait;

	/**
	 * @var CalculatorDelegateInterface $delegate
	 *
	 * @since 1.0.0
	 */
	protected CalculatorDelegateInterface $delegate;

	/**
	 * @var array $tariffs
	 *
	 * @since 1.0.0
	 */
	protected static array $tariffs;

	/**
	 * @param   CalculatorDelegateInterface  $delegate Delegate
	 *
	 * @since 1.0.0
	 */
	public function __construct(CalculatorDelegateInterface $delegate)
	{
		$this->delegate = $delegate;
	}

	/**
	 * Returns shipping price
	 *
	 * @return ShippingTariff|null
	 *
	 * @throws Exception
	 *
	 * @since 1.0.0
	 */
	public function getTariff(): ?ShippingTariff
	{
		$shippingTariff = $this->getShippingTariff();

		self::$tariffs[$this->delegate->getShippingMethodId()] = $shippingTariff;

		return $shippingTariff;
	}

	/**
	 * Returns tariff
	 *
	 * @return ShippingTariff
	 *
	 * @throws Exception
	 *
	 * @since 1.0.0
	 */
	private function getShippingTariff(): ShippingTariff
	{
		$shippingTariff = new ShippingTariff(0, 0);

		$tariffs = $this->getTariffs();

		if (count($tariffs))
		{
			$minTariff = $this->getMinTariff($tariffs);
			$periodMin = $minTariff->getPeriodMin();
			$periodMax = $minTariff->getPeriodMax();
			$shipping = $minTariff->getShipping();
			$code = $minTariff->getCode();
			$name = $minTariff->getName();
			$shippingTariff->setPeriodMin($periodMin)
				->setPeriodMax($periodMax)
				->setShipping($shipping)
				->setCode($code)
				->setName($name);
		}

		return $shippingTariff;
	}

	/**
	 * Метод возвращает самый дешевый тариф из массива
	 *
	 * @param   array $tariffs  Tariffs
	 *
	 * @return ShippingTariff
	 *
	 * @since 1.0.0
	 */
	private function getMinTariff(array $tariffs): ShippingTariff
	{
		if (!count($tariffs))
		{
			throw new InvalidArgumentException('Array of tariffs must not be empty', 500);
		}

		$minTariff = $tariffs[0];

		foreach ($tariffs as $tariff)
		{
			if ($tariff->getDeliverySum() < $minTariff->getDeliverySum())
			{
				$minTariff = $tariff;
			}
		}

		return $minTariff;
	}

	/**
	 * Method
	 *
	 * @return array
	 *
	 * @throws Exception
	 *
	 * @since 1.0.0
	 */
	private function getTariffs(): array
	{
		$tariffPostRequest = new TariffPostRequest;

		$completenessChecking = $this->delegate->getCompletenessChecking();

		if ($completenessChecking !== null)
		{
			$tariffPostRequest->setCompletenessChecking($completenessChecking);
		}

		$contentsChecking = $this->delegate->getContentsChecking();

		if ($contentsChecking !== null)
		{
			$tariffPostRequest->setCompletenessChecking($contentsChecking);
		}

		$courier = $this->delegate->getCourier();

		if ($courier !== null)
		{
			$tariffPostRequest->setCourier($courier);
		}

		$declaredValue = $this->delegate->getDeclaredValue();

		if ($declaredValue !== null)
		{
			$tariffPostRequest->setDeclaredValue($declaredValue);
		}

		$deliveryPointIndex = $this->delegate->getDeliveryPointIndex();

		if ($deliveryPointIndex !== null)
		{
			$tariffPostRequest->setDeliveryPointIndex($deliveryPointIndex);
		}

		$dimension = $this->delegate->getDimension();

		if ($dimension !== null)
		{
			$tariffPostRequest->setDimension($dimension);
		}

		$dimensionType = $this->delegate->getDimensionType();

		if ($dimensionType !== null)
		{
			$tariffPostRequest->setDimensionType($dimensionType);
		}

		$fragile = $this->delegate->getFragile();

		if ($fragile !== null)
		{
			$tariffPostRequest->setDimensionType($fragile);
		}

		$indexFrom = $this->delegate->getIndexFrom();
		$tariffPostRequest->setIndexFrom($indexFrom);

		$indexTo = $this->delegate->getIndexTo();
		$tariffPostRequest->setIndexTo($indexTo);

		$inventory = $this->delegate->getInventory();
		$tariffPostRequest->setInventory($inventory);

		$mailCategory = $this->delegate->getMailCategory();
		$tariffPostRequest->setMailCategory($mailCategory);

		$mailType = $this->delegate->getMailType();
		$tariffPostRequest->setMailType($mailType);

		$mass = $this->delegate->getMass();
		$tariffPostRequest->setMass($mass);

		$noticePaymentMethod = $this->delegate->getNoticePaymentMethod();

		if ($noticePaymentMethod !== null)
		{
			$tariffPostRequest->setNoticePaymentMethod($noticePaymentMethod);
		}

		$paymentMethod = $this->delegate->getPaymentMethod();

		if ($paymentMethod !== null)
		{
			$tariffPostRequest->setPaymentMethod($paymentMethod);
		}

		$transportType = $this->delegate->getTransportType();

		if ($transportType !== null)
		{
			$tariffPostRequest->setTransportType($transportType);
		}

		$vsd = $this->delegate->getVsd();

		if ($vsd !== null)
		{
			$tariffPostRequest->setVsd($vsd);
		}

		$withElectronicNotice = $this->delegate->getWithElectronicNotice();

		if ($withElectronicNotice !== null)
		{
			$tariffPostRequest->setVsd($withElectronicNotice);
		}

		$withOrderOfNotice = $this->delegate->getWithOrderOfNotice();

		if ($withOrderOfNotice !== null)
		{
			$tariffPostRequest->setWithOrderOfNotice($withOrderOfNotice);
		}

		$withSimpleNotice = $this->delegate->getWithSimpleNotice();

		if ($vsd !== null)
		{
			$tariffPostRequest->setWithSimpleNotice($withSimpleNotice);
		}

		$apiClient = $this->getApiClient();

		$tariffs = $apiClient->calculateTariffList($tariffPostRequest);

		return array_values($tariffs);
	}
}
