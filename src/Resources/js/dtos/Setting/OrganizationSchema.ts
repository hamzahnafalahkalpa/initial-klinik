import { z } from "zod";
import { Organization } from "@klinik/interfaces/Setting/Organization";

const RawOrganizationSchema: z.ZodType<Organization> = z.object({
  id : z.number().optional().nullable(),
  name: z.string({
    required_error: "Nama instansi harus diisi",
    invalid_type_error: "Nama instansi harus berupa string",
  }),
  phone: z.string().regex(/^[0-9]+$/, {
    message: "Nomor telepon hanya boleh berisi angka",
  }).optional().nullable(),
  address: z.string({
    invalid_type_error: "Alamat harus berupa string",
  }).optional().nullable(),
  phone_owner: z.string().regex(/^[0-9]+$/, {
    message: "Nomor telepon pic/owner hanya boleh berisi angka",
  }).optional().nullable(),
  name_owner: z.string({
    invalid_type_error: "Nama pic/owner harus berupa string",
  }).optional().nullable(),
})

export const OrganizationSchema = RawOrganizationSchema;
