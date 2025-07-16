<?php

namespace Projects\Klinik\Requests\PatientEmr\VisitExamination\Examination;

class StoreRequest extends Environment
{
  public function authorize(){
    return true;
  }
  
  public function rules(){    
    return $this->setRules(array_merge([
      'visit_examination_id'      => ['required'],
      'examination'               => ['nullable','array']
    ], 
    ...call_user_func(function(){
        $files = [];
        foreach (glob(__DIR__.'/Assessment/*.php') as $file) $files[] = include_once($file);
        return $files;
      })
    ));
  }
}
