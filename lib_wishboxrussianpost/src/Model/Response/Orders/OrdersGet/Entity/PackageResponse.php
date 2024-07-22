<?php
/**
 * @copyright   (c) 2013-2024 Nekrasov Vitaliy <nekrasov_vitaliy@list.ru>
 * @license     GNU General Public License version 2 or later
 */
namespace WishboxCdekSDK2\Model\Response\Orders\OrdersGet\Entity;

use WishboxCdekSDK2\Model\Response\AbstractResponse;

/**
 * @since 1.0.0
 */
class PackageResponse extends AbstractResponse
{
	/**
	 * 1.26.1. Уникальный номер упаковки в ИС СДЭК
	 *
	 * @var string
	 *
	 * @since 1.0.0
	 */
	protected string $package_id; // phpcs:ignore

	/**
	 * 1.26.2. Номер упаковки в ИС клиента (можно использовать порядковый номер упаковки заказа или номер заказа),
	 * уникален в пределах заказа.
	 *
	 * @var string
	 *
	 * @since 1.0.0
	 */
	protected string $number;

	/**
	 * Общий вес (в граммах).
	 *
	 * @var integer
	 *
	 * @since 1.0.0
	 */
	protected int $weight;

	/**
	 * Объемный вес (в граммах).
	 *
	 * @var integer|null
	 *
	 * @since 1.0.0
	 */
	protected ?int $weight_volume; // phpcs:ignore

	/**
	 * Расчетный вес (в граммах).
	 *
	 * @var integer|null
	 *
	 * @since 1.0.0
	 */
	protected ?int $weight_calc; // phpcs:ignore

	/**
	 * Габариты упаковки. Длина (в сантиметрах).
	 *
	 * @var integer|null
	 *
	 * @since 1.0.0
	 */
	protected ?int $length;

	/**
	 * Габариты упаковки. Ширина (в сантиметрах).
	 *
	 * @var integer|null
	 *
	 * @since 1.0.0
	 */
	protected ?int $width;

	/**
	 * Габариты упаковки. Высота (в сантиметрах).
	 *
	 * @var integer|null
	 *
	 * @since 1.0.0
	 */
	protected ?int $height;

	/**
	 * Комментарий к упаковке.
	 *
	 * @var string|null
	 *
	 * @since 1.0.0
	 */
	protected ?string $comment;

	/**
	 * Позиции товаров в упаковке.
	 *
	 * @var \WishboxCdekSDK2\Model\Response\Orders\OrdersGet\Entity\Package\ItemResponse[]|null
	 *
	 * @since 1.0.0
	 */
	protected ?array $items = null;

	/**
	 * Получить значение - Уникальный номер упаковки в ИС СДЭК.
	 *
	 * @return string
	 *
	 * @since 1.0.0
	 *
	 * @noinspection PhpUnused
	 */
	public function getPackageId(): string
	{
		return $this->package_id; // phpcs:ignore
	}

	/**
	 * Устанавливает номер упаковки.
	 *
	 * @return string
	 *
	 * @since 1.0.0
	 *
	 * @noinspection PhpUnused
	 */
	public function getNumber(): string
	{
		return $this->number;
	}

	/**
	 * Получить значение - общий вес (в граммах).
	 *
	 * @return integer
	 *
	 * @since 1.0.0
	 */
	public function getWeight(): int
	{
		return $this->weight;
	}

	/**
	 * Получить значение - объемный вес (в граммах).
	 *
	 * @return integer|null
	 *
	 * @since 1.0.0
	 *
	 * @noinspection PhpUnused
	 */
	public function getWeightVolume(): ?int
	{
		return $this->weight_volume; // phpcs:ignore
	}

	/**
	 * Получить значение - расчетный вес (в граммах).
	 *
	 * @return integer|null
	 *
	 * @since 1.0.0
	 *
	 * @noinspection PhpUnused
	 */
	public function getWeightCalc(): ?int
	{
		return $this->weight_calc; // phpcs:ignore
	}

	/**
	 * Получить значение - габариты упаковки. Длина (в сантиметрах).
	 *
	 * @return integer|null
	 *
	 * @since 1.0.0
	 */
	public function getLength(): ?int
	{
		return $this->length;
	}

	/**
	 * Получить значение - габариты упаковки. Ширина (в сантиметрах).
	 *
	 * @return integer|null
	 *
	 * @since 1.0.0
	 */
	public function getWidth(): ?int
	{
		return $this->width;
	}

	/**
	 * Получить значение - габариты упаковки. Высота (в сантиметрах).
	 *
	 * @return integer|null
	 *
	 * @since 1.0.0
	 */
	public function getHeight(): ?int
	{
		return $this->height;
	}

	/**
	 * Получить значение - комментарий к упаковке.
	 *
	 * @return string|null
	 *
	 * @since 1.0.0
	 */
	public function getComment(): ?string
	{
		return $this->comment;
	}

	/**
	 * Возвращает позиции товаров в упаковке.
	 *
	 * @return ItemResponse[]|null
	 *
	 * @since 1.0.0
	 */
	public function getItems(): ?array
	{
		return $this->items;
	}

	/**
	 * Экспресс-метод установки адреса.
	 *
	 * @param   integer  $weight  Общий вес (в граммах)
	 *
	 * @return self
	 *
	 * @since 1.0.0
	 *
	 * @noinspection PhpUnused
	 */
	public static function withWeight(int $weight): self
	{
		$instance = new self;
		$instance->weight = $weight;

		return $instance;
	}
}
