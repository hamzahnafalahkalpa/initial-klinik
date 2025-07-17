import { z } from "zod";
import { Role } from "../../interfaces/Setting/Role";

// Predeclare for recursion
type RoleChildType = z.infer<typeof RawRoleSchema>;

const RawRoleSchema: z.ZodType<Role> = z.lazy(() =>
  z.object({
    id : z.number().optional().nullable(),
    name: z.string({
      required_error: "Nama role harus diisi",
      invalid_type_error: "Nama role harus berupa string",
    }),
    childs: z.array(RoleSchema).optional()
  })
);

export const RoleSchema = RawRoleSchema;
