<script setup lang="ts">
import { CompanySchema } from '@klinik/dtos/Setting/CompanySchema';

import OrganizationLayout from '../OrganizationLayout.vue';

</script>

<template>
  <OrganizationLayout 
    dialogTitle="Formulir Perusahaan"
    dialogDescription="Silahkan isi data perusahaan di bawah ini"
    routeName="company"
    :schema="CompanySchema"
    mainContent="Perusahaan"
  />
</template>
