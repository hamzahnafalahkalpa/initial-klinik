<?php

namespace Projects\Klinik\Controllers\API\Unicode\Autolist;

use Illuminate\Http\Request;
use Projects\Klinik\Controllers\API\ApiController;
use Illuminate\Support\Str;

class AutolistController extends ApiController{
    protected $__onlies = [
    ];

    protected $__stores = [
        'AnggaranItemStuff',
        'ItemStuff',
        'ProjectStuff'
    ];

    public function index(Request $request){
        request()->merge([
            'search_name'  => request()->search_value,
            'search_value' => null
        ]);

        $morph = Str::studly(request()->morph);
        switch ($morph) {
            default:
                return $this->callAutolist($morph);
            break;
        }
    }

    private function callAutolist(string $morph,?callable $callback = null){
        return app(config('app.contracts.'.$morph))->autolist(request()->type,$callback);
    }
}