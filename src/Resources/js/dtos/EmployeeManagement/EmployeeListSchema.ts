import { z } from "zod";
import { EmployeeList } from "@projects/klinik/src/Resources/js/interfaces/EmployeeManagement/Employee";

const RawEmployeeListSchema: z.ZodType<EmployeeList> = z.lazy(() =>
  z.object({
    id: z.string().nullable(),
    name: z.string().nullable(),
    profile: z.unknown().nullable(),
  })
);

export const EmployeeListSchema = RawEmployeeListSchema;

