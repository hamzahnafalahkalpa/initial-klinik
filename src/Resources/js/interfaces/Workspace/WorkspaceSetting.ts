import { ViewEmployee } from "../EmployeeManagement/Employee";
import { ViewAddress } from "../Regional/Address";

export interface WorkspaceSetting {
    address            ?: ViewAddress,
    email              ?: string,
    owner_id           ?: string,
    owner              ?: ViewEmployee,
    phone              ?: string,
    logo               ?: string
}