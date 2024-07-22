<?php
/**
 * @copyright   (c) 2013-2024 Nekrasov Vitaliy <nekrasov_vitaliy@list.ru>
 * @license     GNU General Public License version 2 or later
 */
namespace WishboxCdekSDK2\Model\Response\DeliveryPoints\DeliveryPointsGet\DeliveryPoint;

use WishboxCdekSDK2\Model\Response\AbstractResponse;

/**
 * @since 1.0.0
 */
class MoneyResponse extends AbstractResponse
{
	/**
	 * Сумма в валюте.
	 *
	 * @var float
	 *
	 * @since 1.0.0
	 */
	public float $value;

	/**
	 * Сумма НДС.
	 *
	 * @var float|null
	 *
	 * @since 1.0.0
	 */
	public ?float $vat_sum; // phpcs:ignore

	/**
	 * Ставка НДС.
	 *
	 * @var integer|null
	 *
	 * @since 1.0.0
	 */
	public ?int $vat_rate; // phpcs:ignore

	/**
	 * Получить значение - сумма в валюте.
	 *
	 * @return float
	 *
	 * @since 1.0.0
	 *
	 * @noinspection PhpUnused
	 */
	public function getValue(): float
	{
		return $this->value;
	}

	/**
	 * Получить значение - сумма НДС.
	 *
	 * @return float|null
	 *
	 * @since 1.0.0
	 *
	 * @noinspection PhpUnused
	 */
	public function getVatSum(): ?float
	{
		return $this->vat_sum; // phpcs:ignore
	}

	/**
	 * Получить значение - ставка НДС.
	 *
	 * @return integer|null
	 *
	 * @since 1.0.0
	 *
	 * @noinspection PhpUnused
	 */
	public function getVatRate(): ?int
	{
		return $this->vat_rate; // phpcs:ignore
	}
}
