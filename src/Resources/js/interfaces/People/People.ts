import { ViewCountry } from "../Country/Country";
import { ShowAddress } from "../Regional/Address";
import { ShowPhone } from "../Support/Phone";
import { ShowFamilyRelationship } from "./FamilyRelationship";

export interface ViewPeople{
    id ?: string;
    uuid : string;
    name : string;
    first_name ?: string;
    last_name : string;
    dob ?: string;
    pob ?: string; 
    sex ?: EnumGender;
    // card_identity : 
}

export interface ShowPeople extends ViewPeople{
    profile ?: string;
    blood_type ?: EnumBloodType;
    last_education ?: string;
    marital_status ?: EnumMaritalStatus;
    total_children ?: number;
    email ?: string;
    father_name ?: string;
    mother_name ?: string;
    is_nationality ?: boolean;
    country ?: ViewCountry;
    family_relationship : ShowFamilyRelationship;
    phones : ShowPhone[];
    address : ShowAddress;
}

export interface People extends ShowPeople{}

export enum EnumBloodType{
    A = "A",
    B = "B",
    AB = "AB",
    O = "O",
    A_NEGATIVE = "A-",
    B_NEGATIVE = "B-",
    AB_NEGATIVE = "AB-",
    O_NEGATIVE = "O-",
    A_POSITIVE = "A+",
    B_POSITIVE = "B+",
    AB_POSITIVE = "AB+",
    O_POSITIVE = "O+"
}

export enum EnumGender{
    MALE = "MALE",
    FEMALE = "FEMALE"
}

export enum EnumMaritalStatus{
    SINGLE = "SINGLE",
    MARRIED = "MARRIED"
}