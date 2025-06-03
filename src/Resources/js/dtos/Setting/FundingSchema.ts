import { z } from "zod";
import { Funding } from "@klinik/interfaces/Setting/Funding";

const RawFundingSchema: z.ZodType<Funding> = z.object({
  id: z.number().nullable(),
  name: z.string()
});

export const FundingSchema = RawFundingSchema;

