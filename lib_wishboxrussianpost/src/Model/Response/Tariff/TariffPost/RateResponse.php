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
class RateResponse extends AbstractResponse
{
	/**
	 * Тариф без НДС (коп.)
	 *
	 * @var integer
	 *
	 * @since 1.0.0
	 */
	protected int $rate;

	/**
	 * НДС (коп.)
	 *
	 * @var integer|null
	 *
	 * @since 1.0.0
	 */
	protected ?int $vat;

	/**
	 * Тариф без НДС (коп.)
	 *
	 * @return integer
	 *
	 * @since 1.0.0
	 *
	 * @noinspection PhpUnused
	 */
	public function getRate(): int
	{
		return $this->rate;
	}

	/**
	 * НДС (коп.)
	 *
	 * @return integer|null
	 *
	 * @since 1.0.0
	 *
	 * @noinspection PhpUnused
	 */
	public function getVat(): ?int
	{
		return $this->vat;
	}
}
