import { z } from "zod";
import { MenuItem } from "../../interfaces";

// Predeclare for recursion
type MenuItemType = z.infer<typeof RawMenuItemSchema>;

const RawMenuItemSchema: z.ZodType<MenuItem> = z.lazy(() =>
  z.object({
    id : z.number(),
    name: z.string(),
    alias: z.string().nullable().optional(),
    directory: z.string().nullable().optional(),
    method: z.string().nullable().optional(),
    slug: z.string().nullable().optional(),
    access: z.boolean().nullable().optional(),
    icon: z.string().nullable().optional(),
    childs: z.array(RawMenuItemSchema), // ← no default, no optional
  })
);

export const MenuItemSchema = RawMenuItemSchema;
