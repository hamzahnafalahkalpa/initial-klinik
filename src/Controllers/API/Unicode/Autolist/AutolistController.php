<?php

namespace Projects\Klinik\Controllers\API\Unicode\Autolist;

use Hanafalah\ModuleEmployee\Contracts\Schemas\Employee;
use Illuminate\Http\Request;
use Projects\Klinik\Controllers\API\ApiController;
use Illuminate\Support\Str;

class AutolistController extends ApiController{
    protected $__onlies = [
        'Employee',
        'Funding',
        'Client',
        'Role',
        'Coa',
        'Bank',
        'Supplier',
        'Profession',
        'Occupation',
        'EmployeeType',
        'ExecutionType',
        'ItemStuff',
        'AnggaranStuff',
        'Service',
        'Jasa',
        'ProjectMaterial',
        'ProjectRequest',
        'Purchasing',
        'ReceiveOrder',
        'Item',
        'CoaType',
        'AccountGroup'
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
            case 'Employee':
                request()->merge([
                    'search_name'  => request()->search_value,
                    'search_nip'   => request()->search_value,
                    'search_value' => null
                ]);
                return $this->callAutolist('Employee');
            break;
            case 'ItemStuff':
                return $this->callAutolist('ItemStuff',function($query){
                    $flag = Str::studly(request()->flag);
                    $query->where('flag',$flag);
                });
            break;
            case 'AnggaranStuff':
                return $this->callAutolist('AnggaranStuff',function($query){
                    $flag = Str::studly(request()->flag);
                    $query->where('flag',$flag);
                });
            break;
            case 'Item': 
                return $this->callAutolist('Item',function($query){
                    $query->with([
                        'reference' => function($query){
                            $query->morphWith([
                                $this->ProjectMaterialModelInstance() => ['material'],
                                $this->RapItemModelInstance()         => ['subtitle','itemReference'],
                            ]);
                        }
                    ])->whereHasMorph('reference',[request()->search_reference_type ?? '*'],function($query){
                        $model = $query->getModel();
                        switch ($model->getMorphClass()) {
                            case 'RapItem':
                                $subtitle_ids = $this->mustArray(request()->search_rab_work_list_id);
                                $query->whereIn('subtitle_id',$subtitle_ids);
                                    //   ->when(isset(request()->search_project_id),function($query){
                                    //       $query->whereHas('rabItem.','re')
                                    //   });
                            break;
                            case 'ProjectMaterial':
                                $query->where('project_id',request()->search_project_id);
                            break;
                            case 'Material':
                                $query->where('id',request()->search_material_id);
                            break;
                        }
                    });
                });
            break;
            case 'ProjectMaterial' : 
                return $this->callAutolist('ProjectMaterial',function($query){
                    $query->when(isset(request()->search_project_id),function($query){
                        $query->where('project_id',request()->search_project_id);
                    });
                });
            break;
            case 'PurchaseRequest' : 
                return $this->callAutolist('PurchaseRequest',function($query){
                    $query->when(isset(request()->search_project_id),function($query){
                        $query->whereHas('procurement',function($query){
                            $query->where('warehouse_id',request()->search_project_id);
                            $query->where('warehouse_type','Project');
                        });
                    });
                });
            break;
            case 'Material' : 
                return $this->callAutolist('Material',function($query){
                    $query->when(isset(request()->search_project_id),function($query){
                        $query->with(['projectMaterial' => fn($query) => $query->where('project_id',request()->search_project_id)]);
                    });
                });
            break;
            default:
                if (in_array($morph,$this->__onlies)){
                    return $this->callAutolist($morph);
                }
                abort(404);
            break;
        }
    }

    public function store(Request $request){
        $morph = Str::studly(request()->morph);
        if (isset(request()->type)) $flag = Str::studly(request()->type);
        switch ($morph) {
            case 'ItemStuff':
                request()->merge(['flag' => $flag]);
                return $this->appSchema('ItemStuff')->storeItemStuff();
            break;
            case 'AnggaranStuff':
                request()->merge(['flag' => $flag]);
                return $this->appSchema('AnggaranStuff')->storeAnggaranStuff();
            break;
            case 'AnggaranItemStuff':
                request()->merge(['flag' => $flag]);
                return $this->appSchema('AnggaranItemStuff')->storeAnggaranItemStuff();
            break;
            case 'ProjectItemStuff':
                request()->merge(['flag' => $flag]);
                return $this->appSchema('ProjectItemStuff')->storeProjectItemStuff();
            break;
        }
        return false;
    }

    private function callAutolist(string $morph,?callable $callback = null){
        return app(config('app.contracts.'.$morph))->autolist(request()->type,$callback);
    }

    private function appSchema(string $morph){
        return app(config('app.contracts.'.$morph));
    }
}