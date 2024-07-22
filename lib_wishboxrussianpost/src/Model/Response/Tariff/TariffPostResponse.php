<?php
/**
 * @copyright   (c) 2013-2024 Nekrasov Vitaliy <nekrasov_vitaliy@list.ru>
 * @license     GNU General Public License version 2 or later
 *
 * @noinspection PhpFullyQualifiedNameUsageInspection
 * @noinspection PhpUnnecessaryFullyQualifiedNameInspection
 */
namespace WishboxRussianPost\Model\Response\Tariff;

use WishboxRussianPost\Model\Response\AbstractResponse;
use WishboxRussianPost\Model\Response\Tariff\TariffPost\DeliveryTimeResponse;
use WishboxRussianPost\Model\Response\Tariff\TariffPost\RateResponse;

/**
 * @since 1.0.0
 *
 * @noinspection PhpUnused
 */
class TariffPostResponse extends AbstractResponse
{
	/**
	 * Плата за Авиа-пересылку (коп.)
	 *
	 * @var RateResponse $aviaRate;
	 *
	 * @since 1.0.0
	 */
	protected RateResponse $aviaRate;

	/**
	 * Плата за "Проверку комплектности" (коп.)
	 *
	 * @var RateResponse|null
	 *
	 * @since 1.0.0
	 */
	protected ?RateResponse $completenessCheckingRate = null;

	/**
	 * Плата за "Проверку вложений" (коп.)
	 *
	 * @var RateResponse|null
	 *
	 * @since 1.0.0
	 */
	protected ?RateResponse $contentsCheckingRate = null;

	/**
	 * Время доставки
	 *
	 * @var DeliveryTimeResponse|null
	 *
	 * @since 1.0.0
	 */
	protected ?DeliveryTimeResponse $deliveryTime = null;

	/**
	 * Надбавка за отметку "Осторожно/Хрупкое"
	 *
	 * @var RateResponse|null
	 *
	 * @since 1.0.0
	 */
	protected ?RateResponse $fragileRate = null;

	/**
	 * Плата за пересылку (коп.)
	 *
	 * @var RateResponse|null
	 *
	 * @since 1.0.0
	 */
	protected ?RateResponse $groundRate = null;

	/**
	 * Плата за объявленную ценность (коп.)
	 *
	 * @var RateResponse|null
	 *
	 * @since 1.0.0
	 */
	protected ?RateResponse $insuranceRate = null;

	/**
	 * Плата за "Опись вложения" (коп.)
	 *
	 * @var RateResponse|null
	 *
	 * @since 1.0.0
	 */
	protected ?RateResponse $inventoryRate = null;

	/**
	 * Способ оплаты уведомления
	 *
	 * @var string|null
	 *
	 * @since 1.0.0
	 *
	 * @see https://otpravka.pochta.ru/specification#/enums-payment-methods
	 */
	protected ?string $noticePaymentMethod = null;

	/**
	 * Надбавка за уведомление о вручении
	 *
	 * @var RateResponse|null
	 *
	 * @since 1.0.0
	 */
	protected ?RateResponse $noticeRate = null;

	/**
	 * Надбавка за негабарит при весе более 10кг
	 *
	 * @var RateResponse|null
	 *
	 * @since 1.0.0
	 */
	protected ?RateResponse $oversizeRate = null;

	/**
	 * Способ оплаты
	 *
	 * @var string|null
	 *
	 * @since 1.0.0
	 *
	 * @see https://otpravka.pochta.ru/specification#/enums-payment-methods
	 */
	protected ?string $paymentMethod = null;

	/**
	 * Плата за "Пакет смс получателю" (коп.)
	 *
	 * @var RateResponse|null
	 *
	 * @since 1.0.0
	 */
	protected ?RateResponse $smsNoticeRecipientRate = null;

	/**
	 * Плата всего (коп.)
	 *
	 * @var integer
	 *
	 * @since 1.0.0
	 */
	protected int $totalRate;

	/**
	 * Всего НДС (коп.)
	 *
	 * @var integer|null
	 *
	 * @since 1.0.0
	 */
	protected ?int $totalVat;

	/**
	 * Плата за "Возврат сопроводительных документов" (коп.)
	 *
	 * @var RateResponse|null
	 *
	 * @since 1.0.0
	 */
	protected ?RateResponse $vsdRate = null;

	/**
	 * Плата за Авиа-пересылку (коп.)
	 *
	 * @return RateResponse
	 *
	 * @since 1.0.0
	 *
	 * @noinspection PhpUnused
	 */
	public function getAviaRate(): RateResponse
	{
		return $this->aviaRate;
	}

	/**
	 * Плата за "Проверку комплектности" (коп.)
	 *
	 * @return RateResponse|null
	 *
	 * @since 1.0.0
	 *
	 * @noinspection PhpUnused
	 */
	public function getCompletenessCheckingRate(): RateResponse|null
	{
		return $this->completenessCheckingRate;
	}

	/**
	 * Плата за "Проверку вложений" (коп.)
	 *
	 * @return RateResponse|null
	 *
	 * @since 1.0.0
	 *
	 * @noinspection PhpUnused
	 */
	public function getContentsCheckingRate(): ?RateResponse
	{
		return $this->contentsCheckingRate;
	}

	/**
	 * Время доставки
	 *
	 * @return DeliveryTimeResponse|null
	 *
	 * @since 1.0.0
	 *
	 * @noinspection PhpUnused
	 */
	public function getDeliveryTime(): ?DeliveryTimeResponse
	{
		return $this->deliveryTime;
	}

	/**
	 * Надбавка за отметку "Осторожно/Хрупкое"
	 *
	 * @return RateResponse|null
	 *
	 * @since 1.0.0
	 *
	 * @noinspection PhpUnused
	 */
	public function getFragileRate(): ?RateResponse
	{
		return $this->fragileRate;
	}

	/**
	 * Плата за пересылку (коп)
	 *
	 * @return RateResponse|null
	 *
	 * @since 1.0.0
	 *
	 * @noinspection PhpUnused
	 */
	public function getGroundRate(): ?RateResponse
	{
		return $this->groundRate;
	}

	/**
	 * Плата за объявленную ценность (коп.)
	 *
	 * @return RateResponse|null
	 *
	 * @since 1.0.0
	 *
	 * @noinspection PhpUnused
	 */
	public function getInsuranceRate(): ?RateResponse
	{
		return $this->insuranceRate;
	}

	/**
	 * Плата за "Опись вложения" (коп.)
	 *
	 * @return RateResponse|null
	 *
	 * @since 1.0.0
	 *
	 * @noinspection PhpUnused
	 */
	public function getInventoryRate(): ?RateResponse
	{
		return $this->inventoryRate;
	}

	/**
	 * Способ оплаты уведомления
	 *
	 * @return RateResponse|null
	 *
	 * @since 1.0.0
	 *
	 * @noinspection PhpUnused
	 *
	 * @see https://otpravka.pochta.ru/specification#/enums-payment-methods
	 */
	public function getNoticePaymentMethod(): ?string
	{
		return $this->noticePaymentMethod;
	}

	/**
	 * Надбавка за уведомление о вручении
	 *
	 * @return RateResponse|null
	 *
	 * @since 1.0.0
	 *
	 * @noinspection PhpUnused
	 */
	public function getNoticeRate(): ?RateResponse
	{
		return $this->noticeRate;
	}

	/**
	 * Надбавка за негабарит при весе более 10кг
	 *
	 * @return RateResponse|null
	 *
	 * @since 1.0.0
	 *
	 * @noinspection PhpUnused
	 */
	public function getOversizeRate(): ?RateResponse
	{
		return $this->oversizeRate;
	}

	/**
	 * Способ оплаты
	 *
	 * @return RateResponse|null
	 *
	 * @since 1.0.0
	 *
	 * @noinspection PhpUnused
	 *
	 * @see https://otpravka.pochta.ru/specification#/enums-payment-methods
	 */
	public function getPaymentMethod(): ?string
	{
		return $this->paymentMethod;
	}

	/**
	 * Плата за "Пакет смс получателю" (коп.)
	 *
	 * @return RateResponse|null
	 *
	 * @since 1.0.0
	 *
	 * @noinspection PhpUnused
	 */
	public function getSmsNoticeRecipientRate(): ?RateResponse
	{
		return $this->smsNoticeRecipientRate;
	}

	/**
	 * Плата всего (коп.)
	 *
	 * @return integer
	 *
	 * @since 1.0.0
	 *
	 * @noinspection PhpUnused
	 */
	public function getTotalRate(): int
	{
		return $this->totalRate;
	}

	/**
	 * Всего НДС (коп.)
	 *
	 * @return integer|null
	 *
	 * @since 1.0.0
	 *
	 * @noinspection PhpUnused
	 */
	public function getTotalVat(): ?int
	{
		return $this->totalVat;
	}

	/**
	 * Плата за "Возврат сопроводительных документов" (коп.)
	 *
	 * @return RateResponse|null
	 *
	 * @since 1.0.0
	 *
	 * @noinspection PhpUnused
	 */
	public function getVsdRate(): ?RateResponse
	{
		return $this->vsdRate;
	}
}
