<script setup lang="ts">
import { FundingSchema } from '@klinik/dtos/Setting/FundingSchema';
import ContentLayout from '@klinik/layouts/setting/ContentLayout.vue';

import { 
  Input, FormField, FormItem, FormLabel, FormControl, FormMessage
} from '@klinik/components/ui';

function customHeaderFilter(headerValue: string, rowValue: string, rowData: any, filterParams: any){
    const findValue = headerValue.toLowerCase();
    const name = rowData.name.toLowerCase();
    const accountNumber = rowData.account_number.toLowerCase();
    const accountName = rowData.account_name.toLowerCase();

    return (name.includes(findValue) || accountNumber.includes(findValue) || accountName.includes(findValue));
}
</script>
<template>
  <ContentLayout
    dialogTitle="Formulir Pendanaan"
    dialogDescription="Silahkan isi formulir di bawah ini"
    routeName="funding"
    :columns="[
      { field: 'actions', headerSort: false, width: 70 },
      { 
        title: 'Pendanaan', field: 'name', sorter: 'string', width: 200,
        headerFilter: 'input', headerFilterPlaceholder: 'Cari nama'
      },
      { 
        title: 'Tgl. Buat', field: 'created_at', sorter: 'string'
      }
    ]"
    :schema="FundingSchema"
    mainContent="Funding"
    :actions="[
        {
          type: 'edit',
          button: { buttonType: 'edit' }
        },
        {
          type: 'delete',
          button: { buttonType: 'delete' }
        }
    ]"
  >
    <FormField name="id" v-slot="{ componentField }">
      <FormItem class="hidden">
        <FormControl>
          <Input type="text" v-bind="componentField" autocomplete="off" />
        </FormControl>
        <FormMessage />
      </FormItem>
    </FormField>

    <FormField name="name" v-slot="{ componentField }">
      <FormItem>
        <FormLabel :required="true">Nama Funding</FormLabel>
        <FormControl>
          <Input
            type="text"
            placeholder="Masukkan Nama Funding"
            autocomplete="off"
            v-bind="componentField"
            required
          />
        </FormControl>
        <FormMessage />
      </FormItem>
    </FormField>
  </ContentLayout>
</template>
