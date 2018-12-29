<?php declare(strict_types = 1);

namespace Warengo\RSS;

final class RSSAttribute {

	/** @var string */
	private $name;

	/** @var bool */
	private $cdata;

	/** @var null|string */
	private $content;

	/** @var array */
	private $attributes = [];

	public function __construct(string $name, ?string $content, bool $cdata = false) {
		$this->name = $name;
		$this->cdata = $cdata;
		$this->content = $content;
	}

	/**
	 * @return bool
	 */
	public function isCdata(): bool {
		return $this->cdata;
	}

	/**
	 * @return null|string
	 */
	public function getContent(): ?string {
		return $this->content;
	}

	/**
	 * @return array
	 */
	public function getAttributes(): array {
		return $this->attributes;
	}

	/**
	 * @return string
	 */
	public function getName(): string {
		return $this->name;
	}

	public function addAttribute(string $name, string $content): void {
		$this->attributes[$name] = $content;
	}

}
