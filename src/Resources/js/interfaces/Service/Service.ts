import { ViewPriceComponent } from "../PaymentModule/PriceComponent";
import { ViewServiceItem } from "./ServiceItem";
import { ViewServicePrice } from "./ServicePrice";

export interface ViewService{
    id               : number | null;
    name             : string;
    status           : boolean | null;
    reference_id     : number | null;
    reference_type   : string | null;
    status_spell     : string | null;
    price            : number | null;
    margin           : number | null;
    service_items    : ViewServiceItem[];
    service_prices   : ViewServicePrice[];
    price_components : ViewPriceComponent[];
    reference        : any | null;
    childs           : ViewService[];
    created_at       : string;
    updated_at       : string;
}

export interface ShowService extends ViewService{
}

export interface ServiceList {
    id?: number | null;
    name: string;
}

export interface Service {
    id ?: number | null;
    name : string;
}