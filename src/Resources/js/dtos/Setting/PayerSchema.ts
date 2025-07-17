import { z } from "zod";
import { Payer } from "@klinik/interfaces/Setting/Payer";
import { OrganizationSchema } from "./OrganizationSchema";

const RawPayerSchema: z.ZodType<Payer> = OrganizationSchema
export const PayerSchema = RawPayerSchema;
