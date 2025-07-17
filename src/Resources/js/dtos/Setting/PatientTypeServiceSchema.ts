import { z } from "zod";
import { PatientType } from "@klinik/interfaces/Setting/PatientType";
import { PatientTypeSchema } from "./PatientTypeSchema";

const RawPatientTypeServiceSchema: z.ZodType<PatientType> = PatientTypeSchema

export const PatientTypeServiceSchema = RawPatientTypeServiceSchema;

