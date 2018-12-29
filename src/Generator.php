<?php declare(strict_types = 1);

namespace Warengo\RSS;

use Nette\Application\IResponse;
use Nette\Http\IRequest;
use Suin\RSSWriter\Channel;
use Suin\RSSWriter\Feed;

class Generator {

	/** @var Feed */
	private $feed;

	/** @var Channel */
	private $channel;

	public function __construct(IRequest $request) {
		$this->feed = new Feed();
		$this->channel = new Channel();
		$this->channel->pubDate(time())
			->lastBuildDate(time())
			->url($request->getUrl()->getBaseUrl());

		$this->channel->appendTo($this->feed);
	}

	public function setTitle(string $title) {
		$this->channel->title($title);

		return $this;
	}

	public function setHomepageUrl(string $url) {
		$this->channel->url($url);

		return $this;
	}

	public function setLogo(string $logo) {
		$this->channel->setLogo($logo);

		return $this;
	}

	public function newItem() {
		$item = new RSSItem();
		$item->appendTo($this->channel);

		return $item;
	}

	public function getResponse(): IResponse {
		return new RssResponse($this->feed->render());
	}

}
