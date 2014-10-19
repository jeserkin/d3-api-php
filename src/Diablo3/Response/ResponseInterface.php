<?php
namespace Diablo3\Response;

interface ResponseInterface
{
	/**
	 * @return bool
	 */
	public function hasErrors();

	/**
	 * @return int
	 */
	public function getErrorCode();

	/**
	 * @return string
	 */
	public function getErrorMessage();

	/**
	 * @return string
	 */
	public function getResponse();
}