import { z } from "zod";
import { Agent } from "@klinik/interfaces/Setting/Agent";
import { OrganizationSchema } from "./OrganizationSchema";

const RawAgentSchema: z.ZodType<Agent> = OrganizationSchema
export const AgentSchema = RawAgentSchema;
