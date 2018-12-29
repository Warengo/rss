<?php declare(strict_types = 1);

namespace Warengo\RSS;

use Nette;
use Nette\Application\IResponse;

/**
 * @internal
 */
final class RssResponse implements IResponse {

	/** @var string */
	private $content;

	public function __construct(string $content) {
		$this->content = $content;
	}

	public function send(Nette\Http\IRequest $httpRequest, Nette\Http\IResponse $httpResponse): void {
		$httpResponse->setContentType('text/xml');

		echo $this->content;
	}

}
