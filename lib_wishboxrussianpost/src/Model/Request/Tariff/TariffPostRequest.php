<?php
/**
 * @copyright   (c) 2013-2024 Nekrasov Vitaliy <nekrasov_vitaliy@list.ru>
 * @license     GNU General Public License version 2 or later
 */
namespace WishboxRussianPost\Model\Request\Tariff;

use WishboxRussianPost\Model\Request\AbstractRequest;
use WishboxRussianPost\Model\Request\Tariff\TariffPost\DimensionRequest;

/**
 * @since 1.0.0
 *
 * @noinspection PhpUnused
 */
class TariffPostRequest extends AbstractRequest
{
	/**
	 * Признак услуги проверки комплектности
	 *
	 * @var boolean|null
	 *
	 * @since 1.0.0
	 */
	protected ?bool $completenessChecking = null;

	/**
	 * Признак услуги проверки вложения
	 *
	 * @var boolean|null
	 *
	 * @since 1.0.0
	 */
	protected ?bool $contentsChecking = null;

	/**
	 * Отметка "Курьер"
	 *
	 * @var boolean|null
	 *
	 * @since 1.0.0
	 */
	protected ?bool $courier = null;

	/**
	 * Объявленная ценность
	 *
	 * @var int|null
	 *
	 * @since 1.0.0
	 */
	protected ?int $declaredValue;

	/**
	 * Идентификатор пункта выдачи заказов
	 *
	 * @var string|null
	 *
	 * @since 1.0.0
	 */
	protected ?string $deliveryPointIndex = null;

	/**
	 * Линейные размеры
	 *
	 * @var DimensionRequest|null
	 *
	 * @since 1.0.0
	 */
	protected ?DimensionRequest $dimension = null;

	/**
	 * Типоразмер
	 *
	 * @var string|null
	 *
	 * @since 1.0.0
	 *
	 * @see https://otpravka.pochta.ru/specification#/enums-dimension-type
	 */
	protected ?string $dimensionType = null;

	/**
	 * Категория вложения (Для международных отправлений).
	 *
	 * @var string
	 *
	 * @since 1.0.0
	 *
	 * @see https://otpravka.pochta.ru/specification#/enums-base-entries-type
	 */
	protected string $entriesType;

	/**
	 * Отметка "Осторожно/Хрупко"
	 *
	 * @var boolean|null
	 *
	 * @since 1.0.0
	 */
	protected ?bool $fragile = null;

	/**
	 * Почтовый индекс объекта почтовой связи места приема
	 *
	 * @var string|null
	 *
	 * @since 1.0.0
	 */
	protected ?string $indexFrom = null;

	/**
	 * Почтовый индекс объекта почтовой связи места назначения
	 *
	 * @var string|null
	 *
	 * @since 1.0.0
	 */
	protected ?string $indexTo = null;

	/**
	 * Опись вложения
	 *
	 * @var boolean
	 *
	 * @since 1.0.0
	 */
	protected bool $inventory;

	/**
	 * Категория РПО
	 *
	 * @var string
	 *
	 * @since 1.0.0
	 *
	 * @see https://otpravka.pochta.ru/specification#/enums-base-mail-category
	 */
	protected string $mailCategory;

	/**
	 * Код страны назначения.
	 *
	 * @var integer|null
	 *
	 * @since 1.0.0
	 *
	 * @see https://otpravka.pochta.ru/specification#/dictionary-countries
	 */
	protected ?int $mailDirect = null;

	/**
	 * Вид РПО
	 *
	 * @var string
	 *
	 * @since 1.0.0
	 *
	 * @see https://otpravka.pochta.ru/specification#/enums-base-mail-type
	 */
	protected string $mailType;

	/**
	 * Масса отправления в граммах
	 *
	 * @var integer
	 *
	 * @since 1.0.0
	 */
	protected int $mass;

	/**
	 * Способ оплаты уведомления
	 *
	 * @var string|null
	 *
	 * @since 1.0.0
	 *
	 * @see https://otpravka.pochta.ru/specification#/enums-payment-methods
	 */
	protected ?string $noticePaymentMethod;

	/**
	 * Способ оплаты
	 *
	 * @var string|null
	 *
	 * @since 1.0.0
	 *
	 * @see https://otpravka.pochta.ru/specification#/enums-payment-methods
	 */
	protected ?string $paymentMethod;

	/**
	 * Признак услуги SMS уведомления
	 *
	 * @var integer|null
	 *
	 * @since 1.0.0
	 */
	protected ?int $smsNoticeRecipient = null;

	/**
	 * Вид транспортировки
	 *
	 * @var string|null
	 *
	 * @since 1.0.0
	 *
	 * @see https://otpravka.pochta.ru/specification#/enums-base-transport-type
	 */
	protected ?string $transportType = null;

	/**
	 * Возврат сопроводительных документов
	 *
	 * @var boolean|null
	 *
	 * @since 1.0.0
	 */
	protected ?bool $vsd = null;

	/**
	 * Отметка 'С электронным уведомлением'
	 *
	 * @var boolean|null
	 *
	 * @since 1.0.0
	 */
	protected ?bool $withElectronicNotice = null;

	/**
	 * Отметка 'С заказным уведомлением'
	 *
	 * @var boolean
	 *
	 * @since 1.0.0
	 */
	protected bool $withOrderOfNotice;

	/**
	 * Отметка 'С простым уведомлением'
	 *
	 * @var boolean
	 *
	 * @since 1.0.0
	 */
	protected bool $withSimpleNotice;

	/**
	 * Признак услуги проверки комплектности
	 *
	 * @param   boolean|null  $completenessChecking  Completeness checking
	 *
	 * @return self
	 *
	 * @since 1.0.0
	 *
	 * @noinspection PhpUnused
	 */
	public function setCompletenessChecking(?bool $completenessChecking): self
	{
		$this->completenessChecking = $completenessChecking;

		return $this;
	}

	/**
	 * Признак услуги проверки вложения
	 *
	 * @param   boolean|null  $contentsChecking  Contents checking
	 *
	 * @return self
	 *
	 * @since 1.0.0
	 *
	 * @noinspection PhpUnused
	 */
	public function setContentsChecking(?bool $contentsChecking): self
	{
		$this->contentsChecking = $contentsChecking;

		return $this;
	}

	/**
	 * Отметка "Курьер"
	 *
	 * @param   boolean|null  $courier  Courier
	 *
	 * @return self
	 *
	 * @since 1.0.0
	 *
	 * @noinspection PhpUnused
	 */
	public function setCourier(?bool $courier): self
	{
		$this->courier = $courier;

		return $this;
	}

	/**
	 * Объявленная ценность
	 *
	 * @param   int|null  $declaredValue  Declared value
	 *
	 * @return self
	 *
	 * @since 1.0.0
	 *
	 * @noinspection PhpUnused
	 */
	public function setDeclaredValue(?int $declaredValue): self
	{
		$this->declaredValue = $declaredValue;

		return $this;
	}

	/**
	 * Идентификатор пункта выдачи заказов
	 *
	 * @param   string|null  $deliveryPointIndex  Delivery point index
	 *
	 * @return self
	 *
	 * @since 1.0.0
	 */
	public function setDeliveryPointIndex(?string $deliveryPointIndex): self
	{
		$this->deliveryPointIndex = $deliveryPointIndex;

		return $this;
	}

	/**
	 * Линейные размеры
	 *
	 * @param   DimensionRequest  $dimension  Dimension
	 *
	 * @return self
	 *
	 * @since 1.0.0
	 *
	 * @noinspection PhpUnused
	 */
	public function setDimension(DimensionRequest $dimension): self
	{
		$this->dimension = $dimension;

		return $this;
	}

	/**
	 * Типоразмер
	 *
	 * @param   string|null  $dimensionType  Dimension type
	 *
	 * @return self
	 *
	 * @since 1.0.0
	 *
	 * @noinspection PhpUnused
	 */
	public function setDimensionType(?string $dimensionType): self
	{
		$this->dimensionType = $dimensionType;

		return $this;
	}

	/**
	 * Категория вложения (Для международных отправлений).
	 *
	 * @param   string|null  $entriesType  Entry type
	 *
	 * @return self
	 *
	 * @since 1.0.0
	 *
	 * @noinspection PhpUnused
	 *
	 * @see https://otpravka.pochta.ru/specification#/enums-base-entries-type
	 */
	public function setEntriesType(?string $entriesType): self
	{
		$this->entriesType = $entriesType;

		return $this;
	}

	/**
	 * Отметка "Осторожно/Хрупко"
	 *
	 * @param   boolean|null  $fragile  Fragile
	 *
	 * @return self
	 *
	 * @since 1.0.0
	 *
	 * @noinspection PhpUnused
	 */
	public function setFragile(?bool $fragile): self
	{
		$this->fragile = $fragile;

		return $this;
	}

	/**
	 * Почтовый индекс объекта почтовой связи места приема
	 *
	 * @param   string|null  $indexFrom  Index from
	 *
	 * @return self
	 *
	 * @since 1.0.0
	 *
	 * @noinspection PhpUnused
	 */
	public function setIndexFrom(?string $indexFrom): self
	{
		$this->indexFrom = $indexFrom;

		return $this;
	}

	/**
	 * Почтовый индекс объекта почтовой связи места назначения
	 *
	 * @param   string|null  $indexTo  Index to
	 *
	 * @return self
	 *
	 * @since 1.0.0
	 *
	 * @noinspection PhpUnused
	 */
	public function setIndexTo(?string $indexTo): self
	{
		$this->indexTo = $indexTo;

		return $this;
	}

	/**
	 * Опись вложения
	 *
	 * @param   boolean  $inventory  Inventory
	 *
	 * @return self
	 *
	 * @since 1.0.0
	 *
	 * @noinspection PhpUnused
	 */
	public function setInventory(bool $inventory): self
	{
		$this->inventory = $inventory;

		return $this;
	}

	/**
	 * Категория РПО
	 *
	 * @param   string  $mailCategory  Mail category
	 *
	 * @return self
	 *
	 * @since 1.0.0
	 *
	 * @noinspection PhpUnused
	 *
	 * @see https://otpravka.pochta.ru/specification#/enums-base-mail-category
	 */
	public function setMailCategory(string $mailCategory): self
	{
		$this->mailCategory = $mailCategory;

		return $this;
	}

	/**
	 * Вид РПО
	 *
	 * @param   string  $mailType  Mail type
	 *
	 * @return self
	 *
	 * @since 1.0.0
	 *
	 * @noinspection PhpUnused
	 *
	 * @see https://otpravka.pochta.ru/specification#/enums-base-mail-type
	 */
	public function setMailType(string $mailType): self
	{
		$this->mailType = $mailType;

		return $this;
	}

	/**
	 * Масса отправления в граммах
	 *
	 * @param   integer  $mass  Mass
	 *
	 * @return self
	 *
	 * @since 1.0.0
	 *
	 * @noinspection PhpUnused
	 */
	public function setMass(int $mass): self
	{
		$this->mass = $mass;

		return $this;
	}

	/**
	 * Способ оплаты уведомления.
	 *
	 * @param   string|null  $noticePaymentMethod  Notice payment method
	 *
	 * @return self
	 *
	 * @since 1.0.0
	 *
	 * @noinspection PhpUnused
	 *
	 * @see https://otpravka.pochta.ru/specification#/enums-payment-methods
	 */
	public function setNoticePaymentMethod(?string $noticePaymentMethod): self
	{
		$this->noticePaymentMethod = $noticePaymentMethod;

		return $this;
	}

	/**
	 * Способ оплаты уведомления
	 *
	 * @param   integer  $paymentMethod  Payment method
	 *
	 * @return self
	 *
	 * @since 1.0.0
	 *
	 * @noinspection PhpUnused
	 *
	 * @see https://otpravka.pochta.ru/specification#/enums-payment-methods
	 */
	public function setPaymentMethod(int $paymentMethod): self
	{
		$this->paymentMethod = $paymentMethod;

		return $this;
	}

	/**
	 * Признак услуги SMS уведомления
	 *
	 * @param   integer  $smsNoticeRecipient  SMS notice recipient
	 *
	 * @return self
	 *
	 * @since 1.0.0
	 *
	 * @noinspection PhpUnused
	 */
	public function setSmsNoticeRecipient(int $smsNoticeRecipient): self
	{
		$this->smsNoticeRecipient = $smsNoticeRecipient;

		return $this;
	}

	/**
	 * Вид транспортировки
	 *
	 * @param   string|null  $transportType  TransportType
	 *
	 * @return self
	 *
	 * @since 1.0.0
	 *
	 * @noinspection PhpUnused
	 *
	 * @see https://otpravka.pochta.ru/specification#/enums-base-transport-type
	 */
	public function setTransportType(?string $transportType): self
	{
		$this->transportType = $transportType;

		return $this;
	}

	/**
	 * Возврат сопроводительных документов
	 *
	 * @param   boolean|null  $vsd  Vsd
	 *
	 * @return self
	 *
	 * @since 1.0.0
	 *
	 * @noinspection PhpUnused
	 */
	public function setVsd(?bool $vsd): self
	{
		$this->vsd = $vsd;

		return $this;
	}

	/**
	 * Отметка 'С электронным уведомлением'
	 *
	 * @param   boolean|null  $withElectronicNotice  With electronic notice
	 *
	 * @return self
	 *
	 * @since 1.0.0
	 *
	 * @noinspection PhpUnused
	 */
	public function setWithElectronicNotice(?bool $withElectronicNotice): self
	{
		$this->withElectronicNotice = $withElectronicNotice;

		return $this;
	}

	/**
	 * Отметка 'С заказным уведомлением'
	 *
	 * @param   boolean  $withOrderOfNotice  With order of notice
	 *
	 * @return self
	 *
	 * @since 1.0.0
	 *
	 * @noinspection PhpUnused
	 */
	public function setWithOrderOfNotice(bool $withOrderOfNotice): self
	{
		$this->withOrderOfNotice = $withOrderOfNotice;

		return $this;
	}

	/**
	 * Отметка 'С простым уведомлением'
	 *
	 * @param   boolean  $withSimpleNotice  With simple notice
	 *
	 * @return self
	 *
	 * @since 1.0.0
	 *
	 * @noinspection PhpUnused
	 */
	public function setWithSimpleNotice(bool $withSimpleNotice): self
	{
		$this->withSimpleNotice = $withSimpleNotice;

		return $this;
	}
}
