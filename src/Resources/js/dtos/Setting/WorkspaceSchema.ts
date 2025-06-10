import { z } from "zod";
import { Workspace, WorkspaceAddress } from "@klinik/interfaces/Setting/Workspace";
import { WorkspaceSetting } from "../../interfaces/Workspace/WorkspaceSetting";
import { AddressSchema } from "../Regional/AddressSchema";

const RawWorkspaceSchema: z.ZodType<Workspace> = z.object({
  uuid: z.string(),
  name: z.string({
    required_error: "Nama workspace harus diisi",
    invalid_type_error: "Nama workspace harus berupa string",
  }),
  setting: z.object({
    address: AddressSchema.optional().nullable(),
    email: z.string().optional().nullable(),
    owner_id: z.string().optional().nullable(),
    owner: z.object({
      id: z.string().optional().nullable(),
      name: z.string().optional().nullable(),
    }).optional().nullable(),
    phone: z.string().optional().nullable(),
    logo: z.string().optional().nullable(),
  }).optional().nullable()
});

export const WorkspaceSchema = RawWorkspaceSchema;
