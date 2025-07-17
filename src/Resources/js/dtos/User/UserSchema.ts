import { z } from "zod";
import { User } from "../../interfaces/User/User";

const RawUserSchema: z.ZodType<User> = z.object({
    id: z.string().nullable(),
    username: z.string(),
    password: z.string().nullable(),
    password_confirmation: z.string().nullable(),
    email: z.string()
});

export const UserSchema = RawUserSchema;

