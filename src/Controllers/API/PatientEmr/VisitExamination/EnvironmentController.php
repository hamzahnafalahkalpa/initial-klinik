<?php

namespace Projects\Klinik\Controllers\API\PatientEmr\VisitExamination;

use Projects\Klinik\Controllers\API\PatientEmr\EnvironmentController as EnvEnvironmentController;

class EnvironmentController extends EnvEnvironmentController
{
    protected function getVisitExaminationPaginate(?callable $callback = null){        
      $this->commonRequest();
      return $this->__visit_examination_schema->conditionals(function($query) use ($callback){
          $this->commonConditional($query);
          $query->when(isset($callback),function ($query) use ($callback){
              $callback($query);
          });
      })->viewVisitExaminationPaginate();
    }

    protected function showVisitExamination(?callable $callback = null){        
        $this->commonRequest();
        return $this->__visit_examination_schema->conditionals(function($query) use ($callback){
            $this->commonConditional($query);
            $query->when(isset($callback),function ($query) use ($callback){
                $callback($query);
            });
        })->showVisitExamination();
    }

    protected function deleteVisitExamination(?callable $callback = null){        
        $this->commonRequest();
        return $this->__visit_examination_schema->conditionals(function($query) use ($callback){
            $this->commonConditional($query);
            $callback($query);
        })->deleteVisitExamination();
    }

    protected function storeVisitExamination(?callable $callback = null){
        $this->commonRequest();
        return $this->__visit_examination_schema->conditionals(function($query) use ($callback){
            $this->commonConditional($query);
            $callback($query);
        })->storeVisitExamination();
    }
}
