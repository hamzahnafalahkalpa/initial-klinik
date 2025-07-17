<script setup lang="ts">
import { AgentSchema } from '@klinik/dtos/Setting/AgentSchema';

import OrganizationLayout from '../OrganizationLayout.vue';

</script>

<template>
  <OrganizationLayout 
  :dialogTitle="'Formulir Agen'"
  :dialogDescription="'Silahkan isi data agen di bawah ini'"
  routeName="agent"
  :schema="AgentSchema"
  mainContent="Agent"

  />
</template>
