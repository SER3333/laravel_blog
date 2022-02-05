<?php

namespace App\Http\Controllers\Admin\Posts;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Admin\PostService;

class BaseController extends Controller
{
    public $service;
    public function __construct(PostService $service){
        $this->service = $service;
    }
}
