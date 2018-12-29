<?php declare(strict_types = 1);

namespace Warengo\RSS;

use Suin\RSSWriter\Item;

final class RSSItem extends Item {

	/** @var RSSAttribute[] */
	protected $attributes = [];

	public function addAttribute(string $name, ?string $content = null, bool $cdata = false): RSSAttribute {
		return $this->attributes[] = new RSSAttribute($name, $content, $cdata);
	}

	public function asXML() {
		$xml = parent::asXML();

		foreach ($this->attributes as $attribute) {
			$cdata = $attribute->isCdata();
			if ($this->preferCdata || $cdata) {
				$child = $xml->addCdataChild($attribute->getName(), $attribute->getContent());
			} else {
				$child = $xml->addChild($attribute->getName(), $attribute->getContent());
			}

			foreach ($attribute->getAttributes() as $name => $content) {
				$child->addAttribute($name, $content);
			}
		}

		return $xml;
	}

}

