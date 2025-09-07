<?php

namespace Projects\Klinik\Models\ModulePayer;

use Hanafalah\ModulePayer\Models\Payer as ModelsPayer;
use Hanafalah\ModulePayment\Concerns\HasPaymentSummaryDeferred;
use Projects\Klinik\Transformers\Payer\{ViewPayer,ShowPayer};

class Payer extends ModelsPayer
{
    use HasPaymentSummaryDeferred;

    protected $table = 'unicodes';

    public function viewUsingRelation(): array{
        return $this->mergeArray(parent::viewUsingRelation(),['paymentSummary','userWallet' => function($query){
            $query->where('props->prop_wallet->label','PERSONAL');
        }]);
    }

    public function showUsingRelation(): array{
        return $this->mergeArray(parent::viewUsingRelation(),parent::showUsingRelation(),['paymentSummary','userWallet' => function($query){
            $query->where('props->prop_wallet->label','PERSONAL');
        }]);
    }

    public function getShowResource(){
        return ShowPayer::class;
    }

    public function getViewResource(){
        return ViewPayer::class;
    }
}
