<?php
/**
 * @copyright   (с) 2013-2024 Nekrasov Vitaliy <nekrasov_vitaliy@list.ru>
 * @license     GNU General Public License version 2 or later
 */
namespace WishboxRussianPost\Interface;

use Throwable;

/**
 * Interface ClientExceptionInterface
 *
 * @since 1.0.0
 */
interface ClientExceptionInterface extends Throwable
{
	/**
	 * Client exception must implement valid __toString() method.
	 *
	 * @return string
	 *
	 * @since 1.0.0
	 */
	public function __toString();
}
