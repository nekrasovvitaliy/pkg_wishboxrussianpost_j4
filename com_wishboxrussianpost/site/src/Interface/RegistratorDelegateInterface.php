<?php
/**
 * @copyright   (c) 2013-2024 Nekrasov Vitaliy <nekrasov_vitaliy@list.ru>
 * @license     GNU General Public License version 2 or later
 */
namespace Joomla\Component\Wishboxrussianpost\Site\Interface;

use Joomla\Component\Wishboxrussianpost\Site\Entity\ProductEntity;
use Joomla\Database\DatabaseDriver;

/**
 * @property DatabaseDriver $db
 *
 * @since 1.0.0
 */
interface RegistratorDelegateInterface
{
	/**
	 * @return string
	 *
	 * @since 1.0.0
	 */
	public function getRecipientLastName(): string;

	/**
	 * @return string
	 *
	 * @since 1.0.0
	 */
	public function getRecipientFirstName(): string;

	/**
	 * @return string
	 *
	 * @since 1.0.0
	 */
	public function getRecipientPatronymic(): string;

	/**
	 * @return string
	 *
	 * @since 1.0.0
	 */
	public function getRecipientIndex(): string;


	/**
	 * @return string
	 *
	 * @see https://otpravka.pochta.ru/specification#/enums-base-mail-type
	 *
	 * @since 1.0.0
	 */
	public function getMailType(): string;

	/**
	 * @return string
	 *
	 * @since 1.0.0
	 */
	public function getOrderNumber(): string;

	/**
	 * @return string
	 *
	 * @since 1.0.0
	 */
	public function getOrderComment(): string;

	/**
	 * @return integer
	 *
	 * @since 1.0.0
	 */
	public function getTariffCode(): int;

	/**
	 * @return array
	 *
	 * @since 1.0.0
	 */
	public function getDeliveryRecipientCost(): array;

	/**
	 * @return string
	 *
	 * @since 1.0.0
	 */
	public function getSellerName(): string;

	/**
	 * @return integer
	 *
	 * @since 1.0.0
	 */
	public function getSellerInn(): int;

	/**
	 * @return string
	 *
	 * @since 1.0.0
	 */
	public function getSellerPhone(): string;

	/**
	 * @return integer
	 *
	 * @since 1.0.0
	 */
	public function getSellerOwnershipForm(): int;

	/**
	 * @return string
	 *
	 * @since 1.0.0
	 */
	public function getRecipientCompany(): string;

	/**
	 * @return string
	 *
	 * @since 1.0.0
	 */
	public function getRecipientName(): string;

	/**
	 * @return string
	 *
	 * @since 1.0.0
	 */
	public function getRecipientEmail(): string;

	/**
	 * @return string
	 *
	 * @since 1.0.0
	 */
	public function getRecipientPhone(): string;

	/**
	 * @return boolean
	 *
	 * @since 1.0.0
	 */
	public function isTariffFromDoor(): bool;

	/**
	 * @return integer
	 *
	 * @since 1.0.0
	 */
	public function getTotalWeight(): int;

	/**
	 * @return integer
	 *
	 * @since 1.0.0
	 */
	public function getPackageWidth(): int;

	/**
	 * @return integer
	 *
	 * @since 1.0.0
	 */
	public function getPackageHeight(): int;

	/**
	 * @return integer
	 *
	 * @since 1.0.0
	 */
	public function getPackageLength(): int;

	/**
	 * @return ProductEntity[]
	 *
	 * @since 1.0.0
	 */
	public function getProducts(): array;

	/**
	 * @return string
	 *
	 * @since 1.0.0
	 */
	public function getShipmentPoint(): string;

	/**
	 * @return string
	 *
	 * @since 1.0.0
	 */
	public function getDeliveryPoint(): string;

	/**
	 * @param   string  $trackingNumber  Tracking number
	 *
	 * @return void
	 *
	 * @since 1.0.0
	 */
	public function setTrackingNumber(string $trackingNumber): void;
}
