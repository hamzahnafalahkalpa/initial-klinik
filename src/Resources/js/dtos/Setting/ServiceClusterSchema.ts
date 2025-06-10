import { z } from "zod";
import { PatientType } from "@klinik/interfaces/Setting/PatientType";
import { PatientTypeSchema } from "./PatientTypeSchema";

const RawServiceClusterSchema: z.ZodType<PatientType> = PatientTypeSchema

export const ServiceClusterSchema = RawServiceClusterSchema;

