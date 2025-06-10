import { z } from "zod";
import { Funding } from "@klinik/interfaces/Setting/Funding";

const RawFundingSchema: z.ZodType<Funding> = z.object({
  id: z.number().optional().nullable(),
  name: z.string({
    required_error: "Nama bank harus diisi",
    invalid_type_error: "Nama bank harus berupa string",
  })
});

export const FundingSchema = RawFundingSchema;

