import { People, ShowPeople, ViewPeople } from "../People/People";
import { UserReference } from "../User/UserReference";
import { ViewCardIdentity, CardIdentity } from "./CardIdentity";

export interface ViewEmployee{
    id ?: string | null;
    uuid : string;
    card_identity : ViewCardIdentity,
    people : ViewPeople,
    status : string,
    profile ?: string,
    sign ?: string,
    // employee_service : $this->relationValidation(employeeService, function () {
    //     return $this->employeeService->toViewApi();
    // }),            
    // profession ?: ViewProfession,
    // occupation ?: ViewOccupation
}

export interface ShowEmployee extends ViewEmployee{
    people : ShowPeople,
}

export interface EmployeeList{
    id ?: string | null;
    name ?: string | null;
    profile ?: unknown | null;
}

export interface Employee extends EmployeeList{
    card_identity: CardIdentity;
    employee_type_id?: number | null;
    profession_id?: number | null;
    occupation_id: number;
    hired_at: string;
    people: People;
    user_reference: UserReference;
}