<?php
/**
 * @copyright   (c) 2013-2024 Nekrasov Vitaliy <nekrasov_vitaliy@list.ru>
 * @license     GNU General Public License version 2 or later
 */
namespace WishboxRussianPost\Factory;

use WishboxRussianPost\Handler\Response\AccountNotFoundHandler;
use WishboxRussianPost\Handler\Response\ResponseErrorHandler;
use WishboxRussianPost\Handler\Response\ResponseErrorsHandler;
use WishboxRussianPost\Handler\Response\ResponseRequestsErrorsHandler;
use WishboxRussianPost\Handler\Response\ServiceUnavailableHandler;
use WishboxRussianPost\Interface\HandlerInterface;

/**
 * Class ResponsePipelineFactory
 *
 * @since 1.0.0
 */
class ResponsePipelineFactory
{
	/**
	 * Creates default response pipeline.
	 *
	 * @return HandlerInterface
	 *
	 * @since 1.0.0
	 */
	public static function createDefaultPipeline(): HandlerInterface
	{
		$serviceUnavailableHandler = new ServiceUnavailableHandler;
		$responseErrorHandler = new ResponseErrorHandler;
		$responseErrorsHandler = new ResponseErrorsHandler;
		$responseRequestsErrorsHandler = new ResponseRequestsErrorsHandler;
		$handler = new AccountNotFoundHandler;
		$handler->setNext($serviceUnavailableHandler)
			->setNext($serviceUnavailableHandler)
			->setNext($responseErrorHandler)
			->setNext($responseErrorsHandler)
			->setNext($responseRequestsErrorsHandler);

		return $handler;
	}
}
