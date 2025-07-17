import { z } from "zod";
import { Supplier } from "../../interfaces/Setting/Supplier";

const RawSupplierSchema: z.ZodType<Supplier> = z.object({
  id : z.number().optional().nullable(),
  name: z.string({
    required_error: "Nama supplier harus diisi",
    invalid_type_error: "Nama supplier harus berupa string",
  }),
  phone: z.string({
    invalid_type_error: "Nama supplier harus berupa string",
  }).regex(/^[0-9]+$/, {
    message: "Nomor telepon hanya boleh berisi angka",
  }).optional().nullable(),
  address: z.string({
    invalid_type_error: "Nama supplier harus berupa string",
  }).optional().nullable(),
})

export const SupplierSchema = RawSupplierSchema;
