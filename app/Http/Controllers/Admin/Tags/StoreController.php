<?php

namespace App\Http\Controllers\Admin\Tags;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\Tags\StoreRequest;
use App\Models\Tag;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request){
        $data = $request -> validated();
        Tag::FirstOrCreate($data);
        return redirect()-> route('admin.tags.index');
    }
}
