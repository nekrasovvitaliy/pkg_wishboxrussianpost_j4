<?php
/**
 * @copyright   (c) 2013-2024 Nekrasov Vitaliy <nekrasov_vitaliy@list.ru>
 * @license     GNU General Public License version 2 or later;
 */
namespace Joomla\Component\Wishboxrussianpost\Site\Interface;

use Joomla\Database\DatabaseDriver;
use WishboxRussianPost\Model\Request\Tariff\TariffPost\DimensionRequest;

/**
 * @property DatabaseDriver $db
 *
 * @since 1.0.0
 */
interface CalculatorDelegateInterface
{
	/**
	 * @return integer
	 *
	 * @since 1.0.0
	 */
	public function getShippingMethodId() : int;

	/**
	 * @return boolean|null
	 *
	 * @since 1.0.0
	 */
	public function getCompletenessChecking(): ?bool;

	/**
	 * @return boolean|null
	 *
	 * @since 1.0.0
	 */
	public function getContentsChecking(): ?bool;

	/**
	 * @return boolean|null
	 *
	 * @since 1.0.0
	 */
	public function getCourier(): ?bool;

	/**
	 * @return integer|null
	 *
	 * @since 1.0.0
	 */
	public function getDeclaredValue(): ?int;

	/**
	 * @return string|null
	 *
	 * @since 1.0.0
	 */
	public function getDeliveryPointIndex(): ?string;

	/**
	 * @return DimensionRequest|null
	 *
	 * @since 1.0.0
	 */
	public function getDimension(): ?DimensionRequest;

	/**
	 * @return string|null
	 *
	 * @since 1.0.0
	 */
	public function getDimensionType(): ?string;

	/**
	 * @return bool|null
	 *
	 * @since 1.0.0
	 */
	public function getFragile(): ?bool;

	/**
	 * @return string
	 *
	 * @since 1.0.0
	 */
	public function getIndexFrom(): string;

	/**
	 * @return string
	 *
	 * @since 1.0.0
	 */
	public function getIndexTo(): string;

	/**
	 * @return boolean
	 *
	 * @since 1.0.0
	 */
	public function getInventory(): bool;

	/**
	 * @return string
	 *
	 * @since 1.0.0
	 */
	public function getMailCategory(): string;

	/**
	 * @return string
	 *
	 * @since 1.0.0
	 */
	public function getMailType(): string;

	/**
	 * @return integer
	 *
	 * @since 1.0.0
	 */
	public function getMass(): int;

	/**
	 * @return string|null
	 *
	 * @since 1.0.0
	 */
	public function getNoticePaymentMethod(): ?string;

	/**
	 * @return string|null
	 *
	 * @since 1.0.0
	 */
	public function getPaymentMethod(): ?string;

	/**
	 * @return string|null
	 *
	 * @since 1.0.0
	 */
	public function getTransportType(): ?string;

	/**
	 * @return boolean|null
	 *
	 * @since 1.0.0
	 */
	public function getVsd(): ?bool;

	/**
	 * @return boolean|null
	 *
	 * @since 1.0.0
	 */
	public function getWithElectronicNotice(): ?bool;

	/**
	 * @return boolean|null
	 *
	 * @since 1.0.0
	 */
	public function getWithOrderOfNotice(): ?bool;

	/**
	 * @return boolean|null
	 *
	 * @since 1.0.0
	 */
	public function getWithSimpleNotice(): ?bool;
}
