import { apiResource } from './resource';

export const apiClient: {
  [key: string]: ReturnType<typeof apiResource>,
} = {
  menu            : apiResource('/api/menu'),
  employee        : apiResource('/api/employee-management/employee'),
  role            : apiResource('/api/setting/role'),
  supplier        : apiResource('/api/setting/supplier'),
  bank            : apiResource('/api/setting/bank'),
  room            : apiResource('/api/setting/room'),
  building        : apiResource('/api/setting/building'),
  classRoom       : apiResource('/api/setting/class-room'),
  funding         : apiResource('/api/setting/funding'),
  coa             : apiResource('/api/setting/coa'),
  coaType         : apiResource('/api/setting/coa-type'),
  encoding        : apiResource('/api/setting/encoding'),
  employeeType    : apiResource('/api/setting/employee-type'),
  occupation      : apiResource('/api/setting/occupation'),
  tariffComponent : apiResource('/api/setting/tariff-component'),
};
