import { ShowServicePrice, ViewServicePrice } from "./ServicePrice";

export interface ViewServiceItem{
    id ?: number | null;
    parent_id ?: number | null;
    name : string;
    price : number;
    flag : string;
    reference ?: any | null;
    childs ?: ViewServiceItem[];
    service_price ?: ViewServicePrice | null;
    created_at ?: string;
    updated_at ?: string;
}

export interface ShowServiceItem extends ViewServiceItem{
    reference ?: any | null;
    childs ?: ShowServiceItem[];
    service_price ?: ShowServicePrice | null;
}

export interface ServiceItemList {
    id?: number | null;
    name: string;
}

export interface ServiceItem {
    id ?: number | null;
    name : string;
}