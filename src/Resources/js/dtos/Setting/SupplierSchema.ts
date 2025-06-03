import { z } from "zod";
import { Supplier } from "../../interfaces/Setting/Supplier";

const RawSupplierSchema: z.ZodType<Supplier> = z.object({
  id : z.number(),
  name: z.string()
})

export const SupplierSchema = RawSupplierSchema;
