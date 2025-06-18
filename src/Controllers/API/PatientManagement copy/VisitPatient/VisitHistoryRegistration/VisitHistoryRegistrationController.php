<?php

namespace Projects\Klinik\Controllers\API\PatientEmr\VisitPatient\VisitHistoryRegistration;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Projects\Klinik\Jobs\LIS\RequestLabToLISJob;
use Projects\Klinik\Observers\Transaction\Summaries\CancelationDetailsReport;
use Projects\Klinik\Requests\PatientEmr\VisitPatient\VisitHistoryRegistration\{
    ViewRequest,
    ShowRequest,
    UpdateRequest
};
use Zahzah\ModulePatient\Enums\VisitPatient\VisitStatus;
use Zahzah\ModulePatient\Enums\VisitPatient\{
    Activity,
    ActivityStatus
};

class VisitHistoryRegistrationController extends EnvironmentController
{
    public function index(ViewRequest $request)
    {
        return $this->__visit_registration_schema->viewVisitRegistrationHistoryPaginate();
    }

    public function show(ShowRequest $request)
    {
        return $this->__visit_registration_schema->showVisitRegistration();
    }

    public function cancel(Request $request)
    {
        $request->merge([
            "patient_id"       => request()->patient_id,
            "visit_patient_id" => request()->id
        ]);

        $attributes ??= request()->all();
        if (!isset(request()->password_cancel)) throw new \Exception("perlu masukan password");
        if (Hash::check(request()->password_cancel, $this->global_workspace->password_cancel)) {
            // dd($request->visit_patient_id);
            if (isset($request->visit_patient_id)) {
                $visit_patient = $this->VisitPatientModel()->with("visitRegistrations")->where("id", $attributes['visit_patient_id'])->first();
                $visit_patient->status = VisitStatus::CANCELLED->value;
                // dd($visit_patient);
                $visit_patient->save();

                $visit_registration_lab = $this->VisitRegistrationModel()->where('visit_patient_id', $visit_patient->id)->whereHas('medicService', function ($q) {
                    $q->where('flag', 'LABORATORY');
                })->first();

                // dd();
                if (isset($visit_registration_lab)) {
                    $transaction = $this->TransactionModel()->with(['parent.transactionItems'])->where('reference_id', $visit_registration_lab->id)->where('reference_type', $visit_registration_lab->getMorphClass())->first()->parent;
                    dispatch(new RequestLabToLISJob($visit_patient, 'LABORATORY', $transaction, 'cancel'));
                }

                $visit_patient->pushActivity(Activity::ADM_VISIT->value, [ActivityStatus::ADM_CANCELLED->value]);

                $transaction = $visit_patient->transaction;
                $transaction->reported_at = null;
                $transaction->is_rendered = null;
                $transaction->save();

                $transaction->reported_at = now()->addSecond(10);
                // GENERETED PROPS FOR OBSERVERS CANCELATION DETAILS 
                $transaction->observers = [
                    class_basename(CancelationDetailsReport::class) => "PROCESS",
                ];
                $transaction->save();
            }
        } else throw new \Exception("password salah !");
    }
}
