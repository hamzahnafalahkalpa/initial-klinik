import { ViewEmployee } from "../EmployeeManagement/Employee";
import { ViewAddress } from "../Regional/Address";

export interface WorkspaceSetting {
    email              ?: string,
    owner_id           ?: string,
    owner              ?: ViewEmployee,
    phone              ?: string,
    address            ?: ViewAddress,
    logo               ?: string
}