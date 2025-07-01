<?php

namespace Projects\Klinik\Controllers\API\Unicode\Autolist;

use Hanafalah\LaravelHasProps\Models\Scopes\HasCurrentScope;
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
            case 'Room':
                return $this->callAutolist($morph,function($query){
                    $query->when(isset(request()->search_employee_id),function($query){
                        $query->whereHas('modelHasRooms',function($query){
                            $query->withoutGlobalScopes([HasCurrentScope::class])->where('model_id',request()->search_employee_id)
                                  ->where('model_type','Employee');
                        });
                    })->when(isset(request()->search_as_pharmacy),function($query){
                        $query->where('props->as_pharmacy',request()->search_as_pharmacy);
                    });
                });
            break;
            default:
                return $this->callAutolist($morph);
            break;
        }
    }

    private function callAutolist(string $morph,?callable $callback = null){
        return app(config('app.contracts.'.$morph))->autolist(request()->type,$callback);
    }
}