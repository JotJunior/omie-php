<?php
/**
 * omie-php
 * OmieRequestException.php
 *
 * Copyright (c) LQDI Digital
 * www.lqdi.net - 2017
 *
 * @author Aryel Tupinambá <aryel.tupinamba@lqdi.net>
 *
 * Created at: 03/05/2017, 17:51
 */

namespace DfKimera\OmiePhp\Exceptions;

use DfKimera\OmiePhp\Structs\Error;

class OmieRequestException extends \Exception {

	protected $error = null;

	public function __construct(Error $error = null, $message = null) {

		if(!$error && !$message) {
			parent::__construct("Unknown Omie API error!", 0);
		} else if($message) {
			parent::__construct("Unknown Omie API error!", 0);
		} else {
			parent::__construct("Omie API error #{$error->code}: {$error->description}", $error->code);
		}

		if($error) $this->error = $error;
		if($message) $this->message = $message;
	}

	public function getOmieError() {
		return $this->error;
	}

}