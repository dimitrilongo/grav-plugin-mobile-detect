<?php
namespace Grav\Plugin;

use Composer\Autoload\ClassLoader;

use \Grav\Common\Plugin;
use Grav\Common\Twig\Twig;
use RocketTheme\Toolbox\Event\Event;

class MobileDetectPlugin extends Plugin
{
	public static function getSubscribedEvents()
	{
		return [
			'onPluginsInitialized' => ['autoload', 100001],
			'onTwigExtensions'     => ['onTwigExtensions', 0],
		];
	}

	/**
	 * [onPluginsInitialized:100000] Composer autoload.
	 *
	 * @return ClassLoader
	 */
	public function autoload()
	{
		return require __DIR__ . '/vendor/autoload.php';
	}
	public function onTwigExtensions()
	{
		require_once(__DIR__ . '/twig/MobileDetectTwigExtension.php');
		$this->grav['twig']->twig->addExtension(new MobileDetectTwigExtension());
	}
}
