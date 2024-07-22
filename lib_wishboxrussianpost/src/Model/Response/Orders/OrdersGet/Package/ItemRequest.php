<?php
/**
 * @copyright   2013-2024 Nekrasov Vitaliy
 * @license     GNU General Public License version 2 или позже
 */
namespace WishboxCdekSDK2\Model\Request\Orders\OrdersPost\Package;

use WishboxCdekSDK2\Entity\Requests\Money;
use WishboxCdekSDK2\Model\Request\AbstractRequest;

/**
 * @since 1.0.0
 */
class ItemRequest extends AbstractRequest
{
	/**
	 * 20.7.1. Наименование товара (может также содержать описание товара: размер, цвет)
	 *
	 * @var string
	 *
	 * @since 1.0.0
	 */
	protected string $name;

	/**
	 * 20.7.2. Идентификатор/артикул товара
	 *         Артикул товара может содержать только символы:[A-z А-я 0-9 ! @ " # № $ ; % ^ : & ? * () _ - + = ? < > , .{ } [ ] \ / , пробел]
	 *         При передаче одинаковых артикулов в рамках одной упаковки, артикул будет заменяться на:
	 *         {ware_key}_* , где * – это 7 случайных символов.
	 *
	 * @var string
	 *
	 * @since 1.0.0
	 */
	protected string $ware_key; // phpcs:ignore

	/**
	 * 20.7.3. Маркировка товара
	 *         Если для товара/вложения указана маркировка, Amount не может быть больше 1.
	 *         Для корректного отображения маркировки товара в чеке требуется передавать НЕ РАЗОБРАННЫЙ тип маркировки,
	 *         который может выглядеть следующим образом:
	 *         1) Код товара в формате GS1
	 *         Пример: 010468008549838921AAA0005255832GS91EE06GS92VTwGVc7wKCc2tqRncUZ1RU5LeUKSXjWbfNQOpQjKK+A
	 *         2) Последовательность допустимых символов общей длиной в 29 символов.
	 *         Пример: 00000046198488X?io+qCABm8wAYa
	 *         3) Меховые изделия. Имеют собственный формат.
	 *         Пример: RU-430302-AAA7582720
	 *         (GS следует передавать, как символ ASCII 29)
	 *
	 * @var string|null
	 *
	 * @since 1.0.0
	 */
	protected ?string $marking = null;

	/**
	 * 20.7.4. Оплата за товар при получении (за единицу товара в валюте страны получателя, значение >=0) — наложенный
	 *         платеж, в случае предоплаты значение = 0
	 *
	 * @var MoneyRequest
	 *
	 * @since 1.0.0
	 */
	protected MoneyRequest $payment;

	/**
	 * 20.7.5. Объявленная стоимость товара (за единицу товара в валюте взаиморасчетов, значение >=0). С данного
	 *         значения рассчитывается страховка
	 *
	 * @var float
	 *
	 * @since 1.0.0
	 */
	protected float $cost;

	/**
	 * 20.7.6. Вес (за единицу товара, в граммах)
	 *
	 * @var integer
	 *
	 * @since 1.0.0
	 */
	protected int $weight;

	/**
	 * 20.7.7 Вес брутто
	 *        Только для международных заказов
	 *
	 * @var integer|null
	 *
	 * @since 1.0.0
	 */
	protected ?int $weight_gross = null; // phpcs:ignore

	/**
	 * 20.7.8. Количество единиц товара (в штуках)
	 *         Количество одного товара в заказе может быть от 1 до 999
	 *
	 * @var integer
	 *
	 * @since 1.0.0
	 */
	protected int $amount;

	/**
	 * 20.7.9. Наименование на иностранном языке
	 *         Только для международных заказов
	 *
	 * @var string|null
	 *
	 * @since 1.0.0
	 */
	protected ?string $name_i18n; // phpcs:ignore

	/**
	 * 20.7.10. Бренд на иностранном языке
	 *          Только для международных заказов
	 *
	 * @var string|null
	 *
	 * @since 1.0.0
	 */
	protected ?string $brand;

	/**
	 * 20.7.11 Код страны производителя товара в формате  ISO_3166-1_alpha-2
	 *         Только для международных заказов
	 *
	 * @var string|null
	 *
	 * @since 1.0.0
	 */
	protected ?string $country_code; // phpcs:ignore

	/**
	 * 20.7.12. Код материала (подробнее см. приложение 4)
	 *          Только для международных заказов
	 *
	 * @var integer|null
	 *
	 * @since 1.0.0
	 */
	protected ?int $material = null;

	/**
	 * 20.7.13.	Содержит wifi/gsm
	 *          Только для международных заказов
     *
	 * @var boolean|null
	 *
	 * @since 1.0.0
	 */
	protected ?bool $wifi_gsm = null; // phpcs:ignore

	/**
	 * 20.7.14. Ссылка на сайт интернет-магазина с описанием товара
	 *
	 * Только для международных заказов
	 *
	 * @var string|null
	 *
	 * @since 1.0.0
	 */
	protected ?string $url = null;

	/**
	 * 20.7.1. Наименование товара (может также содержать описание товара: размер, цвет)
	 *
	 * @param   string  $name  Наименование товара
	 *
	 * @return self
	 *
	 * @since 1.0.0
	 */
	public function setName(string $name): self
	{
		$this->name = $name;

		return $this;
	}

	/**
	 * 20.7.2. Идентификатор/артикул товара
	 *
	 * Артикул товара может содержать только символы:[A-z А-я 0-9 ! @ " # № $ ; % ^ : & ? * () _ - + = ? < > , .{ } [ ] \ / , пробел]
	 * При передаче одинаковых артикулов в рамках одной упаковки, артикул будет заменяться на:
	 * {ware_key}_* , где * – это 7 случайных символов.
	 *
	 * @param   string  $wareKey  Идентификатор/артикул товара
	 *
	 * @return self
	 *
	 * @since 1.0.0
	 *
	 * @noinspection PhpUnused
	 */
	public function setWareKey(string $wareKey): self
	{
		$this->ware_key = $wareKey; // phpcs:ignore

		return $this;
	}

	/**
	 * Устанавливает маркировка товара/вложения.
	 *
	 * @param   string  $marking  Маркировка товара/вложения
	 *
	 * @return self
	 *
	 * @since        1.0.0
	 *
	 * @noinspection PhpUnused
	 */
	public function setMarking(string $marking): self
	{
		$this->marking = $marking;

		return $this;
	}

	/**
	 * Устанавливает параметр оплата за товар при получении.
	 *
	 * @param   MoneyRequest  $payment  Оплата за товар при получении
	 *
	 * @return self
	 *
	 * @since        1.0.0
	 *
	 * @noinspection PhpUnused
	 */
	public function setPayment(MoneyRequest $payment): self
	{
		$this->payment = $payment;

		return $this;
	}

	/**
	 * Устанавливает объявленную стоимость товара.
	 *
	 * @param  float  $cost  Объявленная стоимость товара
	 *
	 * @return self
	 *
	 * @since 1.0.0
	 *
	 * @noinspection PhpUnused
	 */
	public function setCost(float $cost): self
	{
		$this->cost = $cost;

		return $this;
	}

	/**
	 * Устанавливает вес (за единицу товара, в граммах).
	 *
	 * @param   integer  $weight  Вес (за единицу товара, в граммах)
	 *
	 * @return self
	 *
	 * @since        1.0.0
	 *
	 * @noinspection PhpUnused
	 */
	public function setWeight(int $weight): self
	{
		$this->weight = $weight;

		return $this;
	}

	/**
	 * Устанавливает вес брутто (только для международных заказов).
	 *
	 * @param  integer  $weightGross  Вес брутто (только для международных заказов)
	 *
	 * @return self
	 *
	 * @since        1.0.0
	 *
	 * @noinspection PhpUnused
	 */
	public function setWeightGross(int $weightGross): self
	{
		$this->weight_gross = $weightGross; // phpcs:ignore

		return $this;
	}

	/**
	 * Устанавливает количество единиц товара.
	 *
	 * @param   integer  $amount  Количество единиц товара
	 *
	 * @return self
	 *
	 * @since 1.0.0
	 *
	 * @noinspection PhpUnused
	 */
	public function setAmount(int $amount): self
	{
		$this->amount = $amount;

		return $this;
	}

	/**
	 * Устанавливает наименование на иностранном языке.
	 *
	 * @param   string  $nameI18n  Наименование на иностранном языке
	 *
	 * @return self
	 *
	 * @since 1.0.0
	 *
	 * @noinspection PhpUnused
	 */
	public function setNameI18n(string $nameI18n): self
	{
		$this->name_i18n = $nameI18n; // phpcs:ignore

		return $this;
	}

	/**
	 * Устанавливает бренд на иностранном языке.
	 *
	 * @param   string  $brand  Бренд на иностранном языке
	 *
	 * @return self
	 *
	 * @since 1.0.0
	 *
	 * @noinspection PhpUnused
	 */
	public function setBrand(string $brand): self
	{
		$this->brand = $brand;

		return $this;
	}

	/**
	 * Устанавливает код страны в формате ISO_3166-1_alpha-2.
	 *
	 * @param  string  $countryCode  Код страны в формате ISO_3166-1_alpha-2
	 *
	 * @return self
	 *
	 * @since 1.0.0
	 *
	 * @noinspection PhpUnused
	 */
	public function setCountryCode(string $countryCode): self
	{
		$this->country_code = $countryCode; // phpcs:ignore

		return $this;
	}

	/**
	 * Устанавливает код материала.
	 *
	 * @param   integer  $material  Код материала
	 *
	 * @return self
	 *
	 * @since 1.0.0
	 *
	 * @noinspection PhpUnused
	 */
	public function setMaterial(int $material): self
	{
		$this->material = $material;

		return $this;
	}

	/**
	 * Устанавливает содержит ли радиочастотные модули (wifi/gsm).
	 *
	 * @param   boolean  $wifiGsm  Содержит ли радиочастотные модули (wifi/gsm)
	 *
	 * @return self
	 *
	 * @since 1.0.0
	 *
	 * @noinspection PhpUnused
	 */
	public function setWifiGsm(bool $wifiGsm = false): self
	{
		$this->wifi_gsm = $wifiGsm; // phpcs:ignore

		return $this;
	}

	/**
	 * Устанавливает ссылка на сайт интернет-магазина с описанием товара.
	 *
	 * @param   string  $url  Ссылка на сайт интернет-магазина с описанием товара
	 *
	 * @return self
	 *
	 * @since 1.0.0
	 *
	 * @noinspection PhpUnused
	 */
	public function setUrl(string $url): self
	{
		$this->url = $url;

		return $this;
	}

	/**
	 * Get наименование товара.
	 *
	 * @return string
	 *
	 * @since 1.0.0
	 *
	 * @noinspection PhpUnused
	 */
	public function getName(): string
	{
		return $this->name;
	}

	/**
	 * Get идентификатор/артикул товара.
	 *
	 * @return string
	 *
	 * @since        1.0.0
	 *
	 * @noinspection PhpUnused
	 */
	public function getWareKey(): string
	{
		return $this->ware_key; // phpcs:ignore
	}

	/**
	 * Get маркировка товара/вложения.
	 *
	 * @return string
	 *
	 * @since        1.0.0
	 *
	 * @noinspection PhpUnused
	 */
	public function getMarking(): string
	{
		return $this->marking;
	}

	/**
	 * Get оплата за товар при получении.
	 *
	 * @return MoneyRequest
	 *
	 * @since        1.0.0
	 *
	 * @noinspection PhpUnused
	 */
	public function getPayment(): MoneyRequest
	{
		return $this->payment;
	}

	/**
	 * Get объявленная стоимость товара.
	 *
	 * @return float
	 *
	 * @since        1.0.0
	 *
	 * @noinspection PhpUnused
	 */
	public function getCost()
	{
		return $this->cost;
	}

	/**
	 * Get вес (за единицу товара, в граммах).
	 *
	 * @return integer
	 *
	 * @since 1.0.0
	 *
	 * @noinspection PhpUnused
	 */
	public function getWeight(): int
	{
		return $this->weight;
	}

	/**
	 * Get вес брутто (только для международных заказов).
	 *
	 * @return integer
	 *
	 * @since        1.0.0
	 *
	 * @noinspection PhpUnused
	 */
	public function getWeightGross()
	{
		return $this->weight_gross; // phpcs:ignore
	}

	/**
	 * Get количество единиц товара.
	 *
	 * @return int
	 *
	 * @since        1.0.0
	 *
	 * @noinspection PhpUnused
	 */
	public function getAmount()
	{
		return $this->amount;
	}

	/**
	 * Get количество врученных единиц товара (в штуках).
	 *
	 * @return int
	 *
	 * @since        1.0.0
	 *
	 * @noinspection PhpUnused
	 */
	public function getDeliveryAmount()
	{
		return $this->delivery_amount; // phpcs:ignore
	}

	/**
	 * Get наименование на иностранном языке.
	 *
	 * @return string
	 *
	 * @since        1.0.0
	 *
	 * @noinspection PhpUnused
	 */
	public function getNameI18n()
	{
		return $this->name_i18n; // phpcs:ignore
	}

	/**
	 * Get бренд на иностранном языке.
	 *
	 * @return string
	 *
	 * @since        1.0.0
	 *
	 * @noinspection PhpUnused
	 */
	public function getBrand()
	{
		return $this->brand;
	}

	/**
	 * Get код страны в формате ISO_3166-1_alpha-2.
	 *
	 * @return string
	 *
	 * @since        1.0.0
	 *
	 * @noinspection PhpUnused
	 */
	public function getCountryCode()
	{
		return $this->country_code; // phpcs:ignore
	}

	/**
	 * Get код материала.
	 *
	 * @return int
	 *
	 * @since        1.0.0
	 *
	 * @noinspection PhpUnused
	 */
	public function getMaterial()
	{
		return $this->material;
	}

	/**
	 * Get содержит ли радиочастотные модули (wifi/gsm).
	 *
	 * @return bool
	 *
	 * @since        1.0.0
	 *
	 * @noinspection PhpUnused
	 */
	public function getWifiGsm()
	{
		return $this->wifi_gsm; // phpcs:ignore
	}

	/**
	 * Get ссылка на сайт интернет-магазина с описанием товара.
	 *
	 * @return string
	 *
	 * @since        1.0.0
	 *
	 * @noinspection PhpUnused
	 */
	public function getUrl()
	{
		return $this->url;
	}
}
