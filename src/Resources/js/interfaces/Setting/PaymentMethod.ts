export interface ViewPaymentMethod{
    id : string;
    parent_id : string | null;
    name : string;
    flag: string;
    created_at ?: string;
    updated_at ?: string;
}

export interface ShowPaymentMethod extends ViewPaymentMethod{
}

export interface PaymentMethodList {
    id ?: string | null;
    name : string;
    flag : string;
}

export interface PaymentMethod {
    id ?: string | null;
    parent_id ?: string | null;
    name : string;
    flag : string;
    childs?: PaymentMethod[] | null;
}