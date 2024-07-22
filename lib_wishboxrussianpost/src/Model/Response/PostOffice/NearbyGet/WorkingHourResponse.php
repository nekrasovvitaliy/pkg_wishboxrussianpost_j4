<?php
/**
 * @copyright   (c) 2013-2024 Nekrasov Vitaliy <nekrasov_vitaliy@list.ru>
 * @license     GNU General Public License version 2 or later
 *
 * @noinspection PhpUnnecessaryFullyQualifiedNameInspection
 */
namespace WishboxRussianPost\Model\Response\PostOffice\NearbyGet;

use WishboxCdekSDK2\Model\Response\AbstractResponse;

/**
 * Время работы (Опционально)
 *
 * Рабочие часы в текущее время
 *
 * @since 1.0.0
 *
 * @noinspection PhpUnused
 */
class WorkingHourResponse extends AbstractResponse
{
	/**
	 * Перерывы
	 *
	 * @var string[]|null
	 *
	 * @since 1.0.0
	 */
	protected ?array $lunches = null;

	/**
	 * Номер дня в неделе
	 *
	 * @var integer|null
	 *
	 * @since 1.0.0
	 */
	protected ?int $weekdayId = null;

	/**
	 * Наименование дня в неделе
	 *
	 * @var string|null
	 *
	 * @since 1.0.0
	 */
	protected ?string $weekdayName = null;

	/**
	 * Перерывы
	 *
	 * @return string[]|null
	 *
	 * @since 1.0.0
	 */
	public function getLunches(): ?array
	{
		return $this->lunches;
	}

	/**
	 * Номер дня в неделе
	 *
	 * @return integer|null
	 *
	 * @since 1.0.0
	 */
	public function getWeekdayId(): ?int
	{
		return $this->weekdayId;
	}

	/**
	 * Наименование дня в неделе
	 *
	 * @return string|null
	 *
	 * @since 1.0.0
	 *
	 * @noinspection PhpUnused
	 */
	public function getWeekdayName(): ?string
	{
		return $this->weekdayName;
	}
}
