import { ViewEmployee } from "../EmployeeManagement/Employee"
import { ViewPeople } from "../People/People"
// import { ViewPatient } from "../Patient/Patient"
import { ViewRole } from "../Setting/Role"
import { User } from "./User"

export interface ViewUserReference{
    id: string | null
    uuid: string
    reference_type: string | null
    reference_id: string | null
    reference : ViewPeople | ViewEmployee | null
    role: ViewRole
    roles: ViewRole[]
    user_id: string | null
    current: boolean
    created_at: string
    updated_at: string
}

export interface ShowUserReference extends ViewUserReference{
}

export interface UserReference{
    id ?: string | null,
    role_ids: number[],
    user: User
}