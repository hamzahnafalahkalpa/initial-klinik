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
}

export interface ShowAddress extends ViewAddress{
    
}

export interface Address{
    id: number | null;
    name: string;
    province_id: number | null;
    district_id: number | null;
    subdistrict_id: number | null;
    village_id: number | null;
}