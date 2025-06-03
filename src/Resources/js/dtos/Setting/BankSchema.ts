import { z } from "zod";
import { Bank } from "@klinik/interfaces/Setting/Bank";

const RawBankSchema: z.ZodType<Bank> = z.object({
  id: z.number().nullable(),
  name: z.string(),
  account_number: z.string(),
  account_name: z.string()
});

export const BankSchema = RawBankSchema;

