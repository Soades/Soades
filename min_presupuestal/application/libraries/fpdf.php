<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once dirname(__FILE__).'/fpdf/fpdf.php';

class Fpdf extends FPDF {

    function __construct() {
        parent::__construct();
    }

}
