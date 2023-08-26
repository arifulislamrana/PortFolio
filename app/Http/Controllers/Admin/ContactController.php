<?php

namespace App\Http\Controllers\Admin;

use App\Utility\ILogger;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    public $logger;

    public function __construct(ILogger $logger)
    {
        $this->logger = $logger;
    }
}
