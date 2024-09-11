<?php

defined('DS') or define('DS', '/');

Kirby::plugin('schnti/cachebuster', [
	'options'    => [
		'active' => true
	],
	'components' => [
		'css' => function ($kirby, $url) {
			$relative_url = Url::path($url, false);
			$file_root = $kirby->root('index') . DS . $relative_url;

			if ($kirby->option('schnti.cachebuster.active')) {
				$file = $kirby->roots()->index() . DS . $url;
				return dirname($url) . '/' . F::name($url) . '.' . F::modified($file_root) . '.css';

			} else {
				return $url;
			}
		},
		'js'  => function ($kirby, $url) {
			$relative_url = Url::path($url, false);
			$file_root = $kirby->root('index') . DS . $relative_url;

			if ($kirby->option('schnti.cachebuster.active')) {

				$file = $kirby->roots()->index() . DS . $url;
				return dirname($url) . '/' . F::name($url) . '.' . F::modified($file_root) . '.js';

			} else {
				return $url;
			}
		}
	]
]);
