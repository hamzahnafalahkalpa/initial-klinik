import { ViewCountry } from "../Country/Country";
import { Address, ShowAddress } from "../Regional/Address";
import { ShowPhone } from "../Support/Phone";
import { CardIdentity } from "./CardIdentity";
import { ShowFamilyRelationship } from "./FamilyRelationship";

export interface ViewPeople{
    id ?: string | null;
    uuid : string;
    name : string;
    first_name ?: string | null;
    last_name : string;
    dob ?: string | null;
    pob ?: string | null; 
    sex ?: EnumGender | null;
    // card_identity : 
}

export interface ShowPeople extends ViewPeople{
    profile ?: string | null;
    blood_type ?: EnumBloodType | null;
    last_education ?: string | null;
    marital_status ?: EnumMaritalStatus | null;
    total_children ?: number | null;
    email ?: string | null;
    father_name ?: string | null;
    mother_name ?: string | null;
    is_nationality ?: boolean | null;
    country ?: ViewCountry | null;
    family_relationship : ShowFamilyRelationship;
    phones : ShowPhone[];
    address : ShowAddress;
}

export interface People{
    id: string | null;
    name: string;
    sex: EnumGender | null;
    dob: string | null;
    pob: string | null;
    last_education: number | null;
    father_name: string | null;
    mother_name: string | null;
    blood_type: EnumBloodType | null;
    marital_status: EnumMaritalStatus | null;
    total_children: number;
    country_id: number | null;
    address: PeopleAddress;
    card_identity: CardIdentity;
    family_relationship: PeopleFamily;
    phones: string[];
}

export interface PeopleAddress{
    residence_same_as_ktp ?: boolean | null;
    ktp : Address;
    residence : Address;
}

export interface PeopleFamily{
    people_id?: string | null;
    role: string | null;
    name: string | null;
    phone: string | null;
}

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