<?php
/**
 * @copyright   (c) 2013-2024 Nekrasov Vitaliy <nekrasov_vitaliy@list.ru>
 * @license     GNU General Public License version 2 or later
 */
namespace WishboxRussianPost\Model\Request\Tariff\TariffPost;

use WishboxRussianPost\Model\Request\AbstractRequest;

/**
 * @since 1.0.0
 *
 * @noinspection PhpUnused
 */
class DimensionRequest extends AbstractRequest
{
	/**
	 * Линейная высота (сантиметры)
	 *
	 * @var int|null
	 *
	 * @since 1.0.0
	 */
	protected ?int $height = null;

	/**
	 * Линейная длина (сантиметры)
	 *
	 * @var integer|null
	 *
	 * @since 1.0.0
	 */
	protected ?int $length = null;

	/**
	 * Линейная ширина (сантиметры)
	 *
	 * @var integer|null
	 *
	 * @since 1.0.0
	 */
	protected ?int $width = null;

	/**
	 * Линейная высота (сантиметры)
	 *
	 * @param   integer|null  $height  Height
	 *
	 * @return self
	 *
	 * @since 1.0.0
	 *
	 * @noinspection PhpUnused
	 */
	public function setHeight(?int $height): self
	{
		$this->height = $height;

		return $this;
	}

	/**
	 * Линейная длина (сантиметры)
	 *
	 * @param   integer|null  $length  Contents checking
	 *
	 * @return self
	 *
	 * @since 1.0.0
	 *
	 * @noinspection PhpUnused
	 */
	public function setLength(?int $length): self
	{
		$this->length = $length;

		return $this;
	}

	/**
	 * Линейная ширина (сантиметры)
	 *
	 * @param   integer|null  $width  Width
	 *
	 * @return self
	 *
	 * @since 1.0.0
	 *
	 * @noinspection PhpUnused
	 */
	public function setWidth(?int $width): self
	{
		$this->width = $width;

		return $this;
	}
}
