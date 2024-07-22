<?php
/**
 * @copyright   (c) 2013-2024 Nekrasov Vitaliy <nekrasov_vitaliy@list.ru>
 * @license     GNU General Public License version 2 or later
 */
namespace WishboxRussianPost\Model\Request\PostOffice;

use WishboxCdekSDK2\Model\Request\AbstractRequest;

/**
 * @since 1.0.0
 *
 * @noinspection PhpUnused
 */
class NearbyGetRequest extends AbstractRequest
{
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
	 * Количество ближайших почтовых отделений в результате поиска (Опционально)
	 *
	 * @var int|null
	 *
	 * @since 1.0.0
	 */
	protected ?int $top = null;

	/**
	 * Дополнительное ограничение по времени работы для поиска ОПС.
	 *
	 * @var string
	 *
	 * @since 1.0.0
	 */
	protected string $filter;

	/**
	 * Радиус для поиска (в километрах) (Опционально)
	 *
	 * @var integer|null
	 *
	 * @since 1.0.0
	 */
	protected ?int $searchRadius = null;

	/**
	 * Текущее клиентское дата-время в таймзоне клиента. Формат: yyyy-MM-dd'T'HH:mm:ss. Данный параметр используется
	 * для определения отделений, работающих в данный момент, т.е. если эти данные нужны, параметр передавать обязательно!
	 *
	 * @var string|null
	 *
	 * @since 1.0.0
	 */
	protected ?string $currentDateTime = null;

	/**
	 * Исключать не публичные отделения (Опционально). По-умолчанию не исключать (false).
	 *
	 * @var boolean|null
	 *
	 * @since 1.0.0
	 */
	protected ?bool $hidePrivate = null;

	/**
	 * Фильтр по типам объектов в ответе. true: ГОПС, СОПС, ПОЧТОМАТ. false: все. Значение по-умолчанию - true.
	 *
	 * @var boolean|null
	 *
	 * @since 1.0.0
	 */
	protected ?bool $filterByOfficeType = null;

	/**
	 * 12. Локализация по умолчанию 'rus'.
	 *
	 * @var string|null
	 *
	 * @since 1.0.0
	 */
	protected ?string $lang = null;

	/**
	 * Адрес в том формате, в котором возвращает его сервис Яндекса для адреса, указанного пользователем.
	 * Пример: Санкт-Петербург, улица Победы, 15к1. Параметр необходим для определения является ли переданный адрес
	 * точным адресом отделения. Требует также заполненного параметра geoObject.
	 *
	 * @var string|null
	 *
	 * @since 1.0.0
	 */
	protected ?string $yandexAddress = null;

	/**
	 * JSON-строка, содержащая объект GeoObject, получаемый для адреса в сервисе Яндекса. См. api.yandex.ru.
	 * Требует также заполненного параметра 'yandex-address'.
	 *
	 * @var string|null
	 *
	 * @since 1.0.0
	 */
	protected ?string $geoObject = null;

	/**
	 * Latitude
	 *
	 * @param   float  $latitude  Latitude
	 *
	 * @return self
	 *
	 * @since 1.0.0
	 *
	 * @noinspection PhpUnused
	 */
	public function setLatitude(float $latitude): self
	{
		$this->latitude = $latitude;

		return $this;
	}

	/**
	 * Longitude
	 *
	 * @param   float  $longitude  Longitude
	 *
	 * @return self
	 *
	 * @since 1.0.0
	 *
	 * @noinspection PhpUnused
	 */
	public function setLongitude(float $longitude): self
	{
		$this->longitude = $longitude;

		return $this;
	}

	/**
	 * Количество ближайших почтовых отделений в результате поиска (Опционально)
	 *
	 * @param   integer  $top  Top
	 *
	 * @return self
	 *
	 * @since 1.0.0
	 *
	 * @noinspection PhpUnused
	 */
	public function setTop(int $top): self
	{
		$this->top = $top;

		return $this;
	}

	/**
	 * Дополнительное ограничение по времени работы для поиска ОПС.
	 *
	 * @param   string  $filter  Filter
	 *
	 * @return self
	 *
	 * @since 1.0.0
	 *
	 * @noinspection PhpUnused
	 */
	public function setFilter(string $filter): self
	{
		$this->filter = $filter;

		return $this;
	}

	/**
	 * Радиус для поиска (в километрах) (Опционально)
	 *
	 * @param   int  $searchRadius  Search radius
	 *
	 * @return self
	 *
	 * @since 1.0.0
	 */
	public function setSearchRadius(int $searchRadius): self
	{
		$this->searchRadius = $searchRadius;

		return $this;
	}

	/**
	 * Текущее клиентское дата-время в таймзоне клиента. Формат: yyyy-MM-dd'T'HH:mm:ss. Данный параметр используется
	 * для определения отделений, работающих в данный момент, т.е. если эти данные нужны, параметр передавать обязательно!
	 *
	 * @param   string  $currentDateTime  Current date time
	 *
	 * @return self
	 *
	 * @since 1.0.0
	 *
	 * @noinspection PhpUnused
	 */
	public function setCurrentDateTime(string $currentDateTime): self
	{
		$this->currentDateTime = $currentDateTime;

		return $this;
	}

	/**
	 * Исключать не публичные отделения (Опционально). По-умолчанию не исключать (false).
	 *
	 * @param   integer|null  $hidePrivate  Hide private
	 *
	 * @return self
	 *
	 * @since 1.0.0
	 *
	 * @noinspection PhpUnused
	 */
	public function setHidePrivate(?int $hidePrivate): self
	{
		$this->hidePrivate = $hidePrivate;

		return $this;
	}

	/**
	 * Фильтр по типам объектов в ответе. true: ГОПС, СОПС, ПОЧТОМАТ. false: все. Значение по-умолчанию - true.
	 *
	 * @param   boolean|null $filterByOfficeType Filter by office type
	 *
	 * @return self
	 *
	 * @since 1.0.0
	 *
	 * @noinspection PhpUnused
	 */
	public function setFilterByOfficeType(?bool $filterByOfficeType): self
	{
		$this->filterByOfficeType = $filterByOfficeType;

		return $this;
	}

	/**
	 * Адрес в том формате, в котором возвращает его сервис Яндекса для адреса, указанного пользователем.
	 * Пример: Санкт-Петербург, улица Победы, 15к1. Параметр необходим для определения является ли переданный адрес точным адресом отделения. Требует также заполненного параметра geoObject.
	 *
	 * @param   string  $yandexAddress  Yandex address
	 *
	 * @return self
	 *
	 * @since 1.0.0
	 *
	 * @noinspection PhpUnused
	 */
	public function setYandexAddress(string $yandexAddress): self
	{
		$this->yandexAddress = $yandexAddress;

		return $this;
	}

	/**
	 * JSON-строка, содержащая объект GeoObject, получаемый для адреса в сервисе Яндекса. См. api.yandex.ru.
	 * Требует также заполненного параметра 'yandex-address'.
	 *
	 * @param   string|null  $geoObject  Geo object
	 *
	 * @return self
	 *
	 * @since 1.0.0
	 *
	 * @noinspection PhpUnused
	 */
	public function setGeoObject(?string $geoObject): self
	{
		$this->geoObject = $geoObject;

		return $this;
	}
}
