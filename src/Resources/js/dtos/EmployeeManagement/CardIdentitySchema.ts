import { z } from "zod";
import { CardIdentity } from "@projects/klinik/src/Resources/js/interfaces/EmployeeManagement/CardIdentity";

const RawCardIdentitySchema: z.ZodType<CardIdentity> = z.lazy(() =>
  z.object({
      nip: z.string().nullable(),
      bpjs_ketenagakerjaan: z.string().nullable(),
      sip: z.string().nullable(),
      sik: z.string().nullable(),
      str: z.string().nullable(),
  })
);

export const CardIdentitySchema = RawCardIdentitySchema;

