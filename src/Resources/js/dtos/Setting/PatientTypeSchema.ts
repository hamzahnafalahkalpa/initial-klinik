import { z } from "zod";
import { PatientType } from "@klinik/interfaces/Setting/PatientType";

const RawPatientTypeSchema: z.ZodType<PatientType> = z.object({
  id: z.string().optional().nullable(),
  parent_id: z.string().optional().nullable(),
  name: z.string({
    required_error: "Nama wajib diisi",
    invalid_type_error: "Nama harus berupa string",
  }),
  label: z.string({
    required_error: "Label wajib diisi",
    invalid_type_error: "Label wajib berupa string",
  })
});

export const PatientTypeSchema = RawPatientTypeSchema;

