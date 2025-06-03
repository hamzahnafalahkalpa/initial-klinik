import { z } from "zod";
import { Encoding } from "@klinik/interfaces/Setting/Encoding";

const RawEncodingSchema: z.ZodType<Encoding> = z.object({
  id: z.number().nullable(),
  flag: z.string(),
  name: z.string(),
  model_has_encoding: z.object({
    id: z.number().nullable(),
    value: z.string().nullable(),
    separator: z.object({
      distance: z.number(),
      separator: z.string().nullable()
    }),
    structure: z.array(
      z.union([
        z.object({
          type: z.literal("alphanumeric"),
          value: z.string()
        }),
        z.object({
          type: z.literal("incrementing"),
          length: z.number()
        }),
        z.object({
          type: z.literal("date"),
          format: z.string(),
          resetable: z.boolean().default(true)
        })
      ])
    )
  })
});

export const EncodingSchema = RawEncodingSchema;

