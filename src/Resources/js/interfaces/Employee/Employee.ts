import { ShowPeople, ViewPeople } from "../People/People";
import { ViewCardIdentity } from "./CardIdentity";

export interface ViewEmployee{
    id ?: string;
    uuid : string;
    card_identity : ViewCardIdentity,
    people : ViewPeople,
    status : string,
    profile ?: string,
    sign ?: string,
    // employee_service : $this->relationValidation(employeeService, function () {
    //     return $this->employeeService->toViewApi();
    // }),            
    // profession ?: 
    // occupation ?: 
}

export interface ShowEmployee extends ViewEmployee{
    people : ShowPeople,
}

export interface Employee extends ShowEmployee{}