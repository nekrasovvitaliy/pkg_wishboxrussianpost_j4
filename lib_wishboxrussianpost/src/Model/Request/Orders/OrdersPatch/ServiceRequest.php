<?php
/**
 * @copyright   (c) 2013-2024 Nekrasov Vitaliy <nekrasov_vitaliy@list.ru>
 * @license     GNU General Public License version 2 or later
 */
namespace WishboxCdekSDK2\Model\Request\Orders\OrdersPatch;

use WishboxCdekSDK2\Model\Request\AbstractRequest;

/**
 * @since 1.0.0
 */
class ServiceRequest extends AbstractRequest
{
	/**
	 * 19.1. Тип дополнительной услуги (подробнее см. приложение 3)
	 *
	 * @var string
	 *
	 * @since 1.0.0
	 */
	public string $code;

	/**
	 * 19.2. Параметр дополнительной услуги:
	 *       количество для услуг PACKAGE_1, CARTON_BOX_XS, CARTON_BOX_S, CARTON_BOX_M, CARTON_BOX_L, CARTON_BOX_500GR,
	 *       CARTON_BOX_1KG, CARTON_BOX_2KG, CARTON_BOX_3KG, CARTON_BOX_5KG, CARTON_BOX_10KG, CARTON_BOX_15KG,
	 *       CARTON_BOX_20KG, CARTON_BOX_30KG, CARTON_FILLER (для всех типов заказа)
	 *       объявленная стоимость заказа для услуги INSURANCE (только для заказов с типом "доставка")
	 *       длина для услуг BUBBLE_WRAP, WASTE_PAPER (для всех типов заказа)
	 *       номер телефона для услуги SMS
	 *       код фотопроекта для услуги PHOTO_OF_DOCUMENTS
	 *
	 *       Актуальность доступных доп. услуг рекомендуем уточнить у закреплённого менеджера.
	 *
	 * @var integer|null
	 *
	 * @since 1.0.0
	 */
	public ?int $parameter = null;

	/**
	 * 19.1. Тип дополнительной услуги (подробнее см. приложение 3)
	 *
	 * @param   string  $code  Code
	 *
	 * @return self
	 *
	 * @since 1.0.0
	 *
	 * @noinspection PhpUnused
	 */
	public function setCode(string $code): self
	{
		$this->code = $code;

		return $this;
	}

	/**
	 * 19.2. Параметр дополнительной услуги:
	 *        количество для услуг PACKAGE_1, CARTON_BOX_XS, CARTON_BOX_S, CARTON_BOX_M, CARTON_BOX_L, CARTON_BOX_500GR,
	 *        CARTON_BOX_1KG, CARTON_BOX_2KG, CARTON_BOX_3KG, CARTON_BOX_5KG, CARTON_BOX_10KG, CARTON_BOX_15KG,
	 *        CARTON_BOX_20KG, CARTON_BOX_30KG, CARTON_FILLER (для всех типов заказа)
	 *        объявленная стоимость заказа для услуги INSURANCE (только для заказов с типом "доставка")
	 *        длина для услуг BUBBLE_WRAP, WASTE_PAPER (для всех типов заказа)
	 *        номер телефона для услуги SMS
	 *        код фотопроекта для услуги PHOTO_OF_DOCUMENTS
	 *
	 *        Актуальность доступных доп. услуг рекомендуем уточнить у закреплённого менеджера.
	 *
	 * @param   integer|null  $parameter  Parameter
	 *
	 * @return self
	 *
	 * @since 1.0.0
	 *
	 * @noinspection PhpUnused
	 */
	public function setParameter(?int $parameter): self
	{
		$this->parameter = $parameter;

		return $this;
	}
}
