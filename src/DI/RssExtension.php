<?php declare(strict_types = 1);

namespace Warengo\RSS\DI;

use Nette\DI\CompilerExtension;
use Warengo\RSS\Generator;

class RssExtension extends CompilerExtension {

	public $defaults = [
		'icon' => null,
		'title' => null,
	];

	public function loadConfiguration() {
		$builder = $this->getContainerBuilder();
		$config = $this->validateConfig($this->defaults);

		$def = $builder->addDefinition($this->prefix('generator'))
			->setType(Generator::class);

		foreach ($config as $key => $value) {
			if ($value !== null) {
				$def->addSetup('set' . ucfirst($key), [$value]);
			}
		}
	}

}
