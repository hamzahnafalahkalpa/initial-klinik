<script setup lang="ts">
import { BankSchema } from '@klinik/dtos/Setting/BankSchema';
import ContentLayout from '@klinik/layouts/setting/ContentLayout.vue';
import { CellComponent } from 'tabulator-tables';
import MultiButton from '../../../components/ui/button/MultiButton.vue';

import { 
  Input, FormField, FormItem, FormLabel, FormControl, FormMessage
} from '@klinik/components/ui';
import { createApp, h, isVNode, onRenderTracked, render } from 'vue';

function customHeaderFilter(headerValue: string, rowValue: string, rowData: any, filterParams: any){
    const findValue = headerValue.toLowerCase();
    const name = rowData.name.toLowerCase();
    const accountNumber = rowData.account_number.toLowerCase();
    const accountName = rowData.account_name.toLowerCase();

    return (name.includes(findValue) || accountNumber.includes(findValue) || accountName.includes(findValue));
}

const columns = [
      { 
        field: 'action', headerSort: false, width: 100,
        formatter: (cell: any) => {
          let container = document.createElement('div');
          let vnode = h(MultiButton, {
            actions: cell.getData().actions,
            rowData: cell.getData(),
          });
          let app = createApp({ render: () => vnode });
          app.mount(container);
          return container;
        }
      },
      { 
        title: 'Rekening', field: 'name', sorter: 'string', width: 200,
        headerFilter: 'input', headerFilterPlaceholder: 'Cari rekening',
        headerFilterFunc: customHeaderFilter,
        formatter: (cell: typeof CellComponent) => {
          return `<b>${cell.getData().name}</b> ${cell.getData().account_number} (${cell.getData().account_name})`
        }
      },
      { 
        title: 'Tgl. Buat', field: 'created_at', sorter: 'string'
      }
]
</script>
<template>
  <ContentLayout
    dialogTitle="Formulir Rekening Bank"
    dialogDescription="Silahkan isi formulir di bawah ini"
    routeName="bank"
    :columns="columns"
    :schema="BankSchema"
    mainContent="Bank"
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
        <FormLabel :required="true">Nama Bank</FormLabel>
        <FormControl>
          <Input
            type="text"
            placeholder="Masukkan Nama Bank"
            autocomplete="off"
            v-bind="componentField"
            required
          />
        </FormControl>
        <FormMessage />
      </FormItem>
    </FormField>

    <FormField name="account_number" v-slot="{ componentField }">
        <FormItem>
            <FormLabel :required="true">No. Rekening</FormLabel>
            <FormControl>
            <Input
                type="text"
                placeholder="Nomor Rekening"
                autocomplete="off"
                v-bind="componentField"
                required
            />
            </FormControl>
            <FormMessage />
        </FormItem>
    </FormField>

    <FormField name="account_name" v-slot="{ componentField }">
        <FormItem>
            <FormLabel :required="true">Nama Penerima</FormLabel>
            <FormControl>
            <Input
                type="text"
                placeholder="Isi Penerima"
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
