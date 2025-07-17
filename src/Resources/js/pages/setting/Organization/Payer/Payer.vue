<script setup lang="ts">
import { PayerSchema } from '@klinik/dtos/Setting/PayerSchema';

import OrganizationLayout from '../OrganizationLayout.vue';

</script>

<template>
  <OrganizationLayout 
    dialogTitle="Formulir Perusahaan Pembayar"
    dialogDescription="Silahkan isi data pembayar di bawah ini"
    routeName="payer"
    :schema="PayerSchema"
    mainContent="Pembayar"
  />
</template>
