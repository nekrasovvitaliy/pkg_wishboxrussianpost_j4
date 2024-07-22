<?php
/**
 * @copyright   (c) 2013-2024 Nekrasov Vitaliy <nekrasov_vitaliy@list.ru>
 * @license     GNU General Public License version 2 or later
 *
 * @noinspection PhpFullyQualifiedNameUsageInspection
 * @noinspection PhpUnnecessaryFullyQualifiedNameInspection
 */
namespace WishboxRussianPost\Model\Response\Tariff\TariffPost;

use WishboxRussianPost\Model\Response\AbstractResponse;

/**
 * @since 1.0.0
 *
 * @noinspection PhpUnused
 */
class DeliveryTimeResponse extends AbstractResponse
{
	/**
	 * Максимальное время доставки (дни)
	 *
	 * @var integer
	 *
	 * @since 1.0.0
	 */
	protected int $maxDays;

	/**
	 * Минимальное время доставки (дни)
	 *
	 * @var integer|null
	 *
	 * @since 1.0.0
	 */
	protected ?int $minDays;

	/**
	 * Максимальное время доставки (дни)
	 *
	 * @return integer
	 *
	 * @since 1.0.0
	 *
	 * @noinspection PhpUnused
	 */
	public function getMaxDays(): int
	{
		return $this->maxDays;
	}

	/**
	 * Минимальное время доставки (дни)
	 *
	 * @return integer|null
	 *
	 * @since 1.0.0
	 *
	 * @noinspection PhpUnused
	 */
	public function getMinDays(): ?int
	{
		return $this->minDays;
	}
}
