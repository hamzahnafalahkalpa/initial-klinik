import { z } from "zod";
import { PatientTypeSchema } from "./PatientTypeSchema";
import { MedicService } from "../../interfaces/Setting/MedicService";

const RawMedicServiceSchema: z.ZodType<MedicService> = PatientTypeSchema

export const MedicServiceSchema = RawMedicServiceSchema;

