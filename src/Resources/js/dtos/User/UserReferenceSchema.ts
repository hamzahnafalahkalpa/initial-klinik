import { z } from "zod";
import { UserReference } from "../../interfaces/User/UserReference";
import { UserSchema } from "./UserSchema";

const RawUserReferenceSchema: z.ZodType<UserReference> = z.object({
    id : z.number().nullable(),
    role_ids: z.array(z.number()).nullable(),
    user: UserSchema
});

export const UserReferenceSchema = RawUserReferenceSchema;

