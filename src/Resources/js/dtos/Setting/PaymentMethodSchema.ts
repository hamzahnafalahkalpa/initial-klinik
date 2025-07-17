import { z } from "zod";
import { PaymentMethod } from "../../interfaces/Setting/PaymentMethod";

// Predeclare for recursion
type PaymentMethodChildType = z.infer<typeof RawPaymentMethodSchema>;

const RawPaymentMethodSchema: z.ZodType<PaymentMethod> = z.lazy(() =>
  z.object({
    id : z.string().optional().nullable(),
    parent_id: z.string().optional().nullable(),
    name: z.string({
      required_error: "Jenis pembayaran harus diisi",
      invalid_type_error: "Jenis pembayaran harus berupa string",
    }),
    flag: z.string({
      required_error: "Flag harus diisi",
      invalid_type_error: "Flag harus berupa string",
    }),
    childs: z.array(PaymentMethodSchema).optional()
  })
);

export const PaymentMethodSchema = RawPaymentMethodSchema;
