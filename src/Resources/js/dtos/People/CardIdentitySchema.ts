import { z } from "zod";
import { CardIdentity } from "../../interfaces/People/CardIdentity";

const RawCardIdentitySchema: z.ZodType<CardIdentity> = z.object({
  nik: z.string().nullable(),
  npwp: z.string().nullable(),
  kk: z.string().nullable(),
  passport: z.string().nullable(),
  sim: z.string().nullable(),
  visa: z.string().nullable(),
  ihs: z.string().nullable(),
  bpjs: z.string().nullable(),
})

export const CardIdentitySchema = RawCardIdentitySchema;

