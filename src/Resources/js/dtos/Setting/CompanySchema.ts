import { z } from "zod";
import { Company } from "@klinik/interfaces/Setting/Company";
import { OrganizationSchema } from "./OrganizationSchema";

const RawCompanySchema: z.ZodType<Company> = OrganizationSchema
export const CompanySchema = RawCompanySchema;
