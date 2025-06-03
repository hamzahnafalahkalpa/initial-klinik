import { ServiceList, ShowService } from "./Service";

export interface ViewServicePrice{
    id: string;
    current: boolean | null;
    parent_id: number | null;
    service_id: number;
    service: ServiceList;
    service_item_id: number;
    service_item_type: string;
    service_item: any | null;
    price: number | null;
}

export interface ShowServicePrice extends ViewServicePrice{
    service: ShowService;
}

export interface ServicePriceList {
    id?: number | null;
    name: string;
}

export interface ServicePrice {
    id ?: number | null;
    name : string;
}