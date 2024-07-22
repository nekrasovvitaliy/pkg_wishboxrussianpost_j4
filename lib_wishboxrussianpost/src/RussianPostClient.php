<?php
/**
 * @copyright   (c) 2013-2024 Nekrasov Vitaliy <nekrasov_vitaliy@list.ru>
 * @license     GNU General Public License version 2 or later
 */
namespace WishboxRussianPost;

use Joomla\CMS\Cache\CacheControllerFactoryInterface;
use Joomla\CMS\Cache\Controller\CallbackController;
use Joomla\CMS\Factory;
use Joomla\Http\Response as HttpResponse;
use Joomla\Uri\Uri;
use Psr\Http\Message\StreamInterface;
use Joomla\CMS\Http\Http;
use Joomla\CMS\Http\HttpFactory;
use WishboxRussianPost\Factory\ResponsePipelineFactory;
use WishboxRussianPost\Interface\ResponseInterface;
use WishboxRussianPost\Model\Request\PostOffice\NearbyGetRequest;
use WishboxRussianPost\Model\ResponseData;

/**
 * @since 1.0.0
 */
final class RussianPostClient
{
	/**
	 * @var string
	 *
	 * @since 1.0.0
	 */
	private string $authorisationToken;

	/**
	 * Тип аккаунта.
	 *
	 * @var string
	 *
	 * @since 1.0.0
	 */
	private string $authorisationKey;

	/**
	 * @var array
	 *
	 * @since 1.0.0
	 */
	private array $memory = [];

	/**
	 * @var Http
	 *
	 * @since 1.0.0
	 */
	private Http $http;

	/**
	 * @param   string      $authorisationToken  Authorisation Token
	 * @param   string      $authorisationKey    Authorisation key
	 * @param   float|null  $timeout             Timeout
	 *
	 * @since 1.0.0
	 */
	public function __construct(string $authorisationToken, string $authorisationKey = null, ?float $timeout = 10.0)
	{
		$this->http = HttpFactory::getHttp(
			[
				'timeout' => $timeout,
				'http_errors' => false,
			]
		);
		$this->authorisationToken = $authorisationToken;
		$this->authorisationKey = $authorisationKey;
	}

	/**
	 * @param   PostOfficeGetRequest  $request  Request
	 *
	 * @return PostOfficeGetResponse
	 *
	 * @since 1.0.0
	 *
	 */
	public function getPostOffice(PostOfficeGetRequest $request): PostOfficeGetResponse
	{
		/** @var PostOfficeGetResponse $response */
		$response = $this->getResponse(
			Constants::POSTOFFICE_URL . '/' . $postalCode,
			PostOfficeGetResponse::class,
			null,
			'GET'
		);

		return $response;
	}

	/**
	 * @param   PostOfficeGetRequest  $request  Request
	 *
	 * @return PostOfficeGetResponse
	 *
	 * @since 1.0.0
	 *
	 */
	public function getPostOfficesNearby(NearbyGetRequest $request): PostOfficeGetResponse
	{
		/** @var PostOfficeGetResponse $response */
		$response = $this->getResponse(
			Constants::POSTOFFICE_URL . '/' . $postalCode,
			PostOfficeGetResponse::class,
			null,
			'GET'
		);

		return $response;
	}

	/**
	 * @param   string      $path    Path
	 * @param   array|null  $data    Data
	 * @param   string      $method  Method
	 *
	 * @return ResponseData
	 *
	 * @since 1.0.0
	 *
	 * @noinspection PhpUnnecessaryLocalVariableInspection
	 */
	public function getResponseData(string $path, array $data = null, string $method = 'POST'): ResponseData
	{
		$response = $this->getHttpResponse($path, $data, $method);

		$responseData = new ResponseData(
			$response->code,
			$response->headers,
			$response->body
		);

		return $responseData;
	}

	/**
	 * Выполняет вызов к API.
	 *
	 * @param   string   $type    Метод запроса
	 * @param   null     $params  Массив данных параметров запроса
	 * @param   string   $method  URL path запроса
	 *
	 * @return HttpResponse|StreamInterface
	 *
	 * @since 1.0.0
	 */
	private function getHttpResponse(
		string $type,
		$params = null,
		string $method = 'POST'
	): HttpResponse|StreamInterface
	{
		if (!$this->checkSavedToken())
		{
			$this->authorize();
		}

		$headers['Accept'] = 'application/json';
		$headers['Content-Type'] = 'application/json';
		$headers['Authorization'] = 'Bearer ' . $this->token;

		if (!empty($params) && is_object($params))
		{
			$params = $params->prepareRequest();
		}

		$url = Constants::API_URL . $type;
		$uri = new Uri($url);

		$response = null;

		switch ($method)
		{
			case 'GET':
				if (!empty($params))
				{
					foreach ($params as $name => $value)
					{
						$uri->setVar($name, $value);
					}
				}

				$response = $this->http->get($uri, $headers);
				break;
			case 'DELETE':
				$response = $this->http->delete($url, $headers, null, $params);
				break;
			case 'POST':
				$response = $this->http->post($url, json_encode($params), $headers);
				break;
			case 'PATCH':
				$response = $this->http->patch($url, json_encode($params), $headers);
				break;
		}

		// Если запрос на файл pdf был успешным сразу отправляем его в ответ
		if ($isPdfFileRequest)
		{
			if ($response->getStatusCode() == 200)
			{
				if (str_contains($response->getHeader('Content-Type')[0], 'application/pdf'))
				{
					return $response->getBody();
				}
			}
		}

		return $response;
	}

	/**
	 * Проверка ответа на ошибки.
	 *
	 * @param   string        $path          Path
	 * @param   ResponseData  $responseData  Response
	 *
	 * @return void
	 *
	 * @since 1.0.0
	 */
	private function handleErrors(string $path, ResponseData $responseData): void
	{
		$handler = ResponsePipelineFactory::createDefaultPipeline();
		$handler->handle($path, $responseData);
	}

	/**
	 * @param   string       $path     Path
	 * @param   string       $type     Type
	 * @param   array|null   $data     Data
	 * @param   string       $method   Method
	 * @param   boolean      $cashing  Cashing
	 *
	 * @return ResponseInterface|array
	 *
	 * @since 1.0.0
	 *
	 * @noinspection PhpUnnecessaryLocalVariableInspection
	 */
	private function getResponse(
		string $path,
		string $type,
		array $data = null,
		string $method = 'POST',
		bool $cashing = false
	): ResponseInterface|array
	{
		/** @var CallbackController $cacheController */
		$cacheController = Factory::getContainer()
			->get(CacheControllerFactoryInterface::class)
			->createCacheController(
				'callback',
				[
					'caching' => (int) $cashing
				]
			);

		/** @var ResponseData $responseData */
		$responseData = $cacheController->get(
			[$this, 'getResponseData'],
			[$path, $data, $method],
		);

		$this->handleErrors($path, $responseData);

		/** @var ResponseInterface $response */
		$response = new $type(json_decode($responseData->getBody(), true));

		return $response;
	}

	/**
	 * @param   string       $path     Path
	 * @param   string       $type     Type
	 * @param   array|null   $data     Data
	 * @param   string       $method   Method
	 * @param   boolean      $cashing  Cashing
	 *
	 * @return ResponseInterface[]
	 *
	 * @since 1.0.0
	 *
	 * @noinspection PhpUnnecessaryLocalVariableInspection
	 */
	private function getResponseArray(
		string $path,
		string $type,
		array $data = null,
		string $method = 'POST',
		bool $cashing = false
	): array
	{
		/** @var CallbackController $cacheController */
		$cacheController = Factory::getContainer()
			->get(CacheControllerFactoryInterface::class)
			->createCacheController(
				'callback',
				[
					'caching' => (int) $cashing
				]
			);

		/** @var ResponseData $data */
		$data = $cacheController->get(
			[$this, 'getResponseData'],
			[$path, $type, $data, $method],
		);

		$responseArray = [];

		foreach ($data as $item)
		{
			$responseArray[] = new $type($item);
		}

		return $responseArray;
	}
}
