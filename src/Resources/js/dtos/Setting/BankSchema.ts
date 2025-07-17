import { z } from "zod";
import { Bank } from "@klinik/interfaces/Setting/Bank";

const RawBankSchema: z.ZodType<Bank> = z.object({
  id: z.number().optional().nullable(),
  name: z.string({
    required_error: "Nama bank harus diisi",
    invalid_type_error: "Nama bank harus berupa string",
  }),
  account_number: z.string({
    required_error: "Nomor rekening harus diisi",
    invalid_type_error: "Nomor rekening harus berupa string",
  }),
  account_name: z.string({
    required_error: "Nama pemilik rekening harus diisi",
    invalid_type_error: "Nama pemilik rekening harus berupa string",
  })
});

export const BankSchema = RawBankSchema;

