<?php

namespace Projects\Klinik\Controllers\API\Unicode\Autolist;

use Hanafalah\LaravelHasProps\Models\Scopes\HasCurrentScope;
use Hanafalah\LaravelSupport\Concerns\Support\HasCache;
use Illuminate\Http\Request;
use Projects\Klinik\Controllers\API\ApiController;
use Illuminate\Support\Str;
use Hanafalah\ModuleMedicService\Enums\Label as MedicServiceLabel;

class AutolistController extends ApiController{
    use HasCache;

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
            case 'Unicode':
                $datas = $this->cacheWhen(true,[
                    'name'     => 'unicode',
                    'tags'     => ['unicode', 'unicode-index'],
                    'forever' => true
                ], function() use ($morph){
                    $unicodes = $this->callAutolist($morph,function($query){
                        $query->withoutGlobalScope('flag');
                    });
                    $grouped = [];
                    foreach ($unicodes as $unicode) {
                        $flag = $unicode['flag'];
                        $grouped[$flag] ??= [];
                        $grouped[$flag][] = $unicode;
                    }
                    return $grouped;
                });

                return (isset(request()->search_flag)) ? [request()->search_flag => $datas[request()->search_flag]] : $datas;
            break;
            case 'ItemStuff':
                return $this->callAutolist($morph,function($query){
                    $query->withoutGlobalScope('flag')->when(isset(request()->search_flag),function($query){
                        $query->flagIn(request()->search_flag);
                    })->where('props->general_flag','ItemStuff');
                });
            break;
            case 'MedicService':
                return $this->callAutolist($morph,function($query){
                    $query->when(isset(request()->is_for_referral) && request()->is_for_referral,function($query){
                        $query->whereIn('label',[
                            MedicServiceLabel::OUTPATIENT->value,
                            MedicServiceLabel::INPATIENT->value,
                            MedicServiceLabel::LABORATORY->value,
                            MedicServiceLabel::MCU->value,
                            MedicServiceLabel::RADIOLOGY->value,
                            MedicServiceLabel::VERLOS_KAMER->value,
                            MedicServiceLabel::EMERGENCY_UNIT->value,
                            MedicServiceLabel::TREATMENT_ROOM->value
                        ]);
                    })->when(isset(request()->exclude_id),function($query){
                        $ids = $this->mustArray(request()->exclude_id);
                        $query->whereNotIn('id',$ids);
                    });
                });
            break;
            case 'Treatment':
                return $this->callAutolist($morph,function($query){
                    $query->when(isset(request()->search_service_reference_label),function($query){
                        $query->whereHasMorph('reference',[
                            'ClinicalPathology',
                            'AnatomicalPathology',
                            'MedicalTreatment'
                        ],function($query){
                            $query->whereHas('medicalServiceTreatment',function($query){
                                $service_reference_label = $this->mustArray(request()->search_service_reference_label);
                                $query->whereIn('props->prop_service_reference->label',$service_reference_label);
                            });
                            // $model = $query->getModel();
                            // switch($model->getMorphClass()){
                            //     case 'MasterInformedConsent':
                            //     break;
                            //     default :
                            //     break;
                            // }
                        });
                    });
                });
            break;
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