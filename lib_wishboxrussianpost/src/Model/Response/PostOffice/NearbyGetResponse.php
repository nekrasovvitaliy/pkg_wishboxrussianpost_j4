<?php
/**
 * @copyright   (c) 2013-2024 Nekrasov Vitaliy <nekrasov_vitaliy@list.ru>
 * @license     GNU General Public License version 2 or later
 *
 * @noinspection PhpUnnecessaryFullyQualifiedNameInspection
 */
namespace WishboxRussianPost\Model\Response\PostOffice;

use WishboxRussianPost\Model\Response\AbstractResponse;
use WishboxRussianPost\Model\Response\PostOffice\NearbyGet\WorkingHourResponse;

/**
 * Поиск почтовых отделений по координатам
 *
 * @since 1.0.0
 *
 * @noinspection PhpUnused
 */
class NearbyGetResponse extends AbstractResponse
{
	/**
	 * Адрес отделения
	 *
	 * @var string
	 *
	 * @since 1.0.0
	 */
	protected string $addressSource;

	/**
	 * Время работы (Опционально)
	 *
	 * Рабочие часы в текущее время
	 *
	 * @var WorkingHourResponse|null
	 *
	 * @since 1.0.0
	 */
	protected ?WorkingHourResponse $currentDayWorkingHours;

	/**
	 * Расстояние до отделения
	 *
	 * @var float|null
	 *
	 * @since 1.0.0
	 */
	protected ?float $distance = null;

	/**
	 * Округ
	 *
	 * @var string|null
	 *
	 * @since 1.0.0
	 */
	protected ?string $district = null;

	/**
	 * Выходные
	 *
	 * @var array|null
	 *
	 * @since 1.0.0
	 */
	protected ?array $holidays = null;

	/**
	 * Признак 'закрыто'
	 *
	 * @var boolean|null
	 *
	 * @since 1.0.0
	 */
	protected ?bool $isClosed = null;

	/**
	 * Признак внутреннего отделения
	 *
	 * @var boolean|null
	 *
	 * @since 1.0.0
	 */
	protected ?bool $isPrivateCategory = null;

	/**
	 * Признак 'временно закрыто'
	 *
	 * @var boolean|null
	 *
	 * @since 1.0.0
	 */
	protected ?bool $isTemporaryClosed;

	/**
	 * Latitude
	 *
	 * @var float
	 *
	 * @since 1.0.0
	 */
	protected float $latitude;

	/**
	 * Longitude
	 *
	 * @var float
	 *
	 * @since 1.0.0
	 */
	protected float $longitude;

	/**
	 * Индекс ближайшего почтового отделения
	 *
	 * @var string|null
	 *
	 * @since 1.0.0
	 */
	protected ?string $nearestOfficePostalcode = null;

	/**
	 * Время работы
	 *
	 * Рабочие часы в следующий рабочий день
	 *
	 * @var WorkingHourResponse|null
	 *
	 * @since 1.0.0
	 */
	protected ?WorkingHourResponse $nextDayWorkingHours = null;

	/**
	 * Phones
	 *
	 * @var array|null
	 *
	 * @since 1.0.0
	 */
	protected ?array $phones = null;

	/**
	 * Индекс почтового отделения
	 *
	 * @var string
	 *
	 * @since 1.0.0
	 */
	protected string $postalCode;

	/**
	 * Предписанный
	 *
	 * @var boolean|null
	 *
	 * @since 1.0.0
	 */
	protected ?bool $prescribed;

	/**
	 * Область, край
	 *
	 * @var string
	 *
	 * @since 1.0.0
	 */
	protected string $region;

	/**
	 * Settlement
	 *
	 * @var string|null
	 *
	 * @since 1.0.0
	 */
	protected ?string $settlement = null;

	/**
	 * Причина 'временно закрыто'
	 *
	 * @var string|null
	 *
	 * @since 1.0.0
	 */
	protected ?string $temporaryClosedReason = null;

	/**
	 * Тип отделения
	 *
	 * @var string
	 *
	 * @since 1.0.0
	 */
	protected string $typeCode;

	/**
	 * Идентификатор типа отделения
	 *
	 * @var integer
	 *
	 * @since 1.0.0
	 */
	protected int $typeId;

	/**
	 * Рабочие часы
	 *
	 * @var array|null
	 *
	 * @since 1.0.0
	 */
	protected ?array $workingHours = null;

	/**
	 * Признак работы в субботу
	 *
	 * @var boolean|null
	 *
	 * @since 1.0.0
	 */
	protected ?bool $worksOnSaturdays = null;

	/**
	 * Признак работы в воскресенье
	 *
	 * @var boolean|null
	 *
	 * @since 1.0.0
	 */
	protected ?bool $worksOnSundays = null;

	/**
	 * Адрес отделения
	 *
	 * @return string
	 *
	 * @since 1.0.0
	 */
	public function getAddressSource(): string
	{
		return $this->addressSource;
	}

	/**
	 * Рабочие часы в текущее время
	 *
	 * @return WorkingHourResponse
	 *
	 * @since 1.0.0
	 */
	public function getCurrentDayWorkingHours(): WorkingHourResponse
	{
		return $this->currentDayWorkingHours;
	}

	/**
	 * Расстояние до отделения
	 *
	 * @return string|null
	 *
	 * @since 1.0.0
	 *
	 * @noinspection PhpUnused
	 */
	public function getDistance(): ?string
	{
		return $this->distance;
	}

	/**
	 * Округ
	 *
	 * @return string|null
	 *
	 * @since 1.0.0
	 *
	 * @noinspection PhpUnused
	 */
	public function getDiscrict(): ?string
	{
		return $this->district;
	}

	/**
	 * Выходные
	 *
	 * @return array|null
	 *
	 * @since 1.0.0
	 *
	 * @noinspection PhpUnused
	 */
	public function getHolidays(): ?array
	{
		return $this->holidays;
	}

	/**
	 * Признак 'закрыто'
	 *
	 * @return boolean|null
	 *
	 * @since 1.0.0
	 *
	 * @noinspection PhpUnused
	 */
	public function getIsClosed(): ?bool
	{
		return $this->isClosed;
	}

	/**
	 * Признак внутреннего отделения
	 *
	 * @return boolean|null
	 *
	 * @since 1.0.0
	 *
	 * @noinspection PhpUnused
	 */
	public function getIsPrivateCategory(): ?bool
	{
		return $this->isPrivateCategory;
	}

	/**
	 * Признак 'временно закрыто'
	 *
	 * @return boolean|null
	 *
	 * @since 1.0.0
	 *
	 * @noinspection PhpUnused
	 */
	public function getIsTemporaryClosed(): ?bool
	{
		return $this->isTemporaryClosed;
	}

	/**
	 * Latitude
	 *
	 * @return float
	 *
	 * @since 1.0.0
	 *
	 * @noinspection PhpUnused
	 */
	public function getLatitude(): float
	{
		return $this->latitude;
	}

	/**
	 * Longitude
	 *
	 * @return float
	 *
	 * @since 1.0.0
	 *
	 * @noinspection PhpUnused
	 */
	public function getLongitude(): float
	{
		return $this->longitude;
	}

	/**
	 * Индекс ближайшего почтового отделения
	 *
	 * @return string|null
	 *
	 * @since 1.0.0
	 *
	 * @noinspection PhpUnused
	 */
	public function getNearestOfficePostalcode(): ?string
	{
		return $this->nearestOfficePostalcode;
	}

	/**
	 * Рабочие часы в следующий рабочий день
	 *
	 * @return WorkingHourResponse
	 *
	 * @since 1.0.0
	 *
	 * @noinspection PhpUnused
	 */
	public function getNextDayWorkingHours(): WorkingHourResponse
	{
		return $this->nextDayWorkingHours;
	}

	/**
	 * Индекс почтового отделения
	 *
	 * @return boolean
	 *
	 * @since 1.0.0
	 *
	 * @noinspection PhpUnused
	 */
	public function getPostalCode(): bool
	{
		return $this->postalCode;
	}

	/**
	 * Предписанный
	 *
	 * @return boolean|null
	 *
	 * @since 1.0.0
	 *
	 * @noinspection PhpUnused
	 */
	public function getPrescribed(): ?bool
	{
		return $this->prescribed;
	}

	/**
	 * Область, край
	 *
	 * @return string|null
	 *
	 * @since 1.0.0
	 *
	 * @noinspection PhpUnused
	 */
	public function getRegion(): ?string
	{
		return $this->region;
	}

	/**
	 * Поселение
	 *
	 * @return string|null
	 *
	 * @since 1.0.0
	 *
	 * @noinspection PhpUnused
	 */
	public function getSettlement(): ?string
	{
		return $this->settlement;
	}

	/**
	 * Причина 'временно закрыто'
	 *
	 * @return string|null
	 *
	 * @since 1.0.0
	 *
	 * @noinspection PhpUnused
	 */
	public function getTemporaryClosedReason(): ?string
	{
		return $this->temporaryClosedReason;
	}

	/**
	 * Тип отделения
	 *
	 * @return string
	 *
	 * @since 1.0.0
	 *
	 * @noinspection PhpUnused
	 */
	public function getTypeCode(): string
	{
		return $this->typeCode;
	}

	/**
	 * Идентификатор типа отделения
	 *
	 * @return int
	 *
	 * @since 1.0.0
	 *
	 * @noinspection PhpUnused
	 */
	public function getTypeId(): int
	{
		return $this->typeId;
	}

	/**
	 * Рабочие часы
	 *
	 * @return WorkingHourResponse[]
	 *
	 * @since 1.0.0
	 *
	 * @noinspection PhpUnused
	 */
	public function getWorkingHours(): array
	{
		return $this->workingHours;
	}

	/**
	 * Признак работы в субботу
	 *
	 * @return boolean|null
	 *
	 * @since 1.0.0
	 *
	 * @noinspection PhpUnused
	 */
	public function getWorksOnSaturdays(): ?bool
	{
		return $this->worksOnSaturdays;
	}

	/**
	 * Признак работы в воскресенье
	 *
	 * @return string|null
	 *
	 * @since 1.0.0
	 *
	 * @noinspection PhpUnused
	 */
	public function getWorksOnSundays(): ?string
	{
		return $this->worksOnSundays;
	}
}
