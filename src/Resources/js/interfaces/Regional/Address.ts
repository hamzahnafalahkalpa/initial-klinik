import { ViewDistrict } from "./District";
import { ViewProvince } from "./Province";
import { ViewSubdistrict } from "./Subdistrict";
import { ViewVillage } from "./Village";

export interface ViewAddress{
    id ?: string;
    flag : string;
    name ?: string;
    rt ?: string;
    rw ?: string;
    zip_code ?: string;
    village_id ?: number;
    village ?: ViewVillage;
    district_id ?: number;
    district ?: ViewDistrict;
    province_id ?: number;
    province ?: ViewProvince;
    subdistrict_id ?: number;
    subdistrict ?: ViewSubdistrict;
}

export interface ShowAddress extends ViewAddress{
    
}

export interface Address extends ShowAddress{

}