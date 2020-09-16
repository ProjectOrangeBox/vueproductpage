<?php

namespace application\controllers;

use projectorangebox\log\LoggerTrait;
use projectorangebox\events\EventsTrait;
use projectorangebox\dispatcher\Controller;

class main extends Controller
{
	use LoggerTrait;
	use EventsTrait;

	protected $logEnabled = true;
	protected $logCaptureLevel = 255;

	public function index(): string
	{
		$data = [];

		return $this->view->data($data)->render('main');
	}

	public function product(int $number): string
	{
		$this->response->contentType('application/json');

		$json = $this->productmodel->getProduct($number);

		return json_encode(utf8ize($json), JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);
	}

	public function fourohfour(): string
	{
		$this->response->responseCode(404);

		return '404 error' . EOL;
	}
} /* end class */
