<?php

namespace Projects\Klinik\Controllers\API\Procurement;

use Hanafalah\ModuleProcurement\Enums\Procurement\Status;
use Projects\Klinik\Controllers\API\ApiController;
use Illuminate\Support\Str;

class ProcurementController extends ApiController{
    protected function procurementSetup(? array $procurement = null){
        $this->userAttempt();
        if (isset(request()->project_id)) {
            config()->set('module-warehouse.warehouse','Project');
            config()->set('module-item.warehouse','Project');
        }
        $procurement = $this->mergeArray($procurement,[
                            'name'        => request()->name,
                            'author_type' => $this->global_employee->getMorphClass(),
                            'author_id'   => $this->global_employee->getKey()
                        ],call_user_func(function(){
                            if (isset(request()->project_id)){
                                return [
                                    'warehouse_type' => 'Project',
                                    'warehouse_id'   => request()->project_id
                                ];
                            }
                            return [];
                        }));
        if (isset($procurement['card_stocks']) && count($procurement['card_stocks']) > 0) {
            $card_stocks = &$procurement['card_stocks'];
            foreach ($card_stocks as &$card_stock) {
                $card_stock['stock_movement']['qty']            = $card_stock['qty'] ?? 0;
                $card_stock['stock_movement']['cogs']           = $card_stock['cogs'] ?? 0;
                $card_stock['stock_movement']['reference_type'] = $procurement['warehouse_type'] ?? 'Project';
                $card_stock['stock_movement']['reference_id']   = $procurement['warehouse_id'] ?? request()->project_id;
            }
        }
        return $procurement;
    }

    protected function receiveOrderSetup(){
        $attributes = request()->all();
        $new_attributes = $attributes['receive_order'];
        $purchase_order = $this->PurchaseOrderModel()->findOrFail($attributes['id']);
        $new_attributes['purchase_order_id'] = $attributes['id'];
        $new_attributes['purchasing_id']     = $purchase_order->purchasing_id;
        $new_attributes['prop_purchase_order']    = [
            'id'          => $attributes['id'],
            'project_id'  => $attributes['project_id'],
            'procurement' => $attributes['procurement']
        ];
        $new_attributes['procurement']['card_stocks'] ??= [];
        $ro_card_stocks = &$new_attributes['procurement']['card_stocks'];
        foreach ($new_attributes['prop_purchase_order']['procurement']['card_stocks'] as $card_stock) {
            $card_stock_model = $this->CardStockModel()->find($card_stock['id']);
            if (isset($new_attributes['procurement']['id'])){
                $card_stock_ro    = $this->CardStockModel()->parentId($card_stock_model->getKey())
                                         ->where('reference_type','Procurement')
                                         ->where('reference_id',$new_attributes['procurement']['id'])
                                         ->where('item_id',$card_stock_model->item_id)->first();
            }
            $ro_card_stocks[] = [
                'id'        => $card_stock_ro->id ?? null,
                'parent_id' => $card_stock['id'],
                'item_id'   => $card_stock_model->item_id,
                'qty'       => $card_stock['receive_qty'],
                'stock_movement' => [
                    'id'        => $card_stock_ro?->stockMovement->id ?? null,
                    'parent_id' => $card_stock_model->stockMovement->id ?? null,
                    'cogs'      => $card_stock['cogs'] ?? 0
                ]
            ];
        }
        $new_attributes['procurement'] = $this->procurementSetup($new_attributes['procurement']);
        request()->replace($new_attributes);
    }

    protected function purchasingProcurementSetup(array $purchase_orders){

        foreach ($purchase_orders as &$purchase_order) {
            $procurement = &$purchase_order['procurement'];
            $procurement['warehouse_type'] = request()->procurement['warehouse_type'] ?? null;
            $procurement['warehouse_id']   = request()->procurement['warehouse_id'] ?? null;
            if (isset($procurement['rab_work_lists']) && count($procurement['rab_work_lists']) > 0) {
                $procurement['prop_rab_work_lists'] = $procurement['rab_work_lists'];
                unset($procurement['rab_work_lists']);
            }
            if (isset(request()->project_id)){
                $procurement['warehouse_type'] = 'Project';
                $procurement['warehouse_id']   = request()->project_id;
            }
            if (isset($purchase_order['supplier_id'])){
                $procurement['supplier_type'] ??= 'Supplier';
            }
            $procurement = $this->procurementSetup($procurement);
            config()->set('module-warehouse.warehouse',$procurement['warehouse_type']);
            config()->set('module-item.warehouse',$procurement['warehouse_type']);
            $purchase_order['procurement'] = $procurement;
        }
        return $purchase_orders;
    }

    protected function approver(){
        if (isset(request()->id)){
            $purchasing = $this->PurchasingModel()->findOrFail(request()->id);
            $approval   = $purchasing->approval;
        }else{
            $approval = [
                'note' => null,
                'status' => null,
                'approver' => [
                    'estimator_id' => null,
                    'coo_id' => null,
                    'cto_id' => null,
                    'ceo_id' => null
                ]
            ];
        }
        if (!isset($this->global_employee)) $this->userAttempt();
        $employee = $this->global_employee;
        if (isset($employee)){
            $occupation = $employee->prop_occupation;
            if (isset($occupation)){
                $name = Str::lower($occupation['name']);
                $approval['approver'][$name.'_id'] = $employee->getKey();
                $approve = request()->approval == 'true' ? true : (request()->approval == 'false' ? false : null);
                $approval['approver'][$name] = [
                    'id'     => $employee->getKey(),
                    'name'   => $employee->name,
                    'status' => $approve,
                    'at'     => now()->format('Y-m-d H:i:s')
                ];

                if (!$approve){
                    $approval['status'] = Status::CANCELED->value;
                    $approval['note']   = request()->note;
                }
            }
        }
        return $approval;
    }
}