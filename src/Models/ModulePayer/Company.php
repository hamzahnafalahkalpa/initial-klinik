<?php

namespace Projects\Klinik\Models\ModulePayer;

use Hanafalah\ModulePayer\Models\Company as ModelsCompany;
use Projects\Klinik\Transformers\Company\{ViewCompany,ShowCompany};

class Company extends ModelsCompany
{
    protected $table = 'unicodes';

    public function viewUsingRelation(): array{
        return $this->mergeArray(parent::viewUsingRelation(),['paymentSummary']);
    }

    public function showUsingRelation(): array{
        return $this->mergeArray(parent::viewUsingRelation(),parent::showUsingRelation(),['paymentSummary']);
    }

    public function getShowResource(){
        return ShowCompany::class;
    }

    public function getViewResource(){
        return ViewCompany::class;
    }
}
