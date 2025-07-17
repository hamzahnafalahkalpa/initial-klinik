import { ViewDistrict } from "./District";
import { ViewProvince } from "./Province";
import { ViewSubdistrict } from "./Subdistrict";
import { ViewVillage } from "./Village";

export interface ViewAddress{
    id ?: string | null;
    flag : string;
    name ?: string | null;
    rt ?: string | null;
    rw ?: string | null;
    zip_code ?: string | null;
    village_id ?: number | null;
    village ?: ViewVillage | null;
    district_id ?: number | null;
    district ?: ViewDistrict | null;
    province_id ?: number | null;
    province ?: ViewProvince | null;
    subdistrict_id ?: number | null;
    subdistrict ?: ViewSubdistrict | null;
    latitude ?: string | null;
    longitude ?: string | null;
}

export interface ShowAddress extends ViewAddress{
    
}

export interface Address{
    id?: string | null;
    name: string;
    rt?: string | null;
    rw?: string | null;
    pos_code?: string | null;
    village_id?: number | null;
    province_id?: number | null;
    district_id?: number | null;
    subdistrict_id?: number | null;
}