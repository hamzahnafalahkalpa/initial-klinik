<script setup lang="ts">
import { PaymentMethodSchema } from '@klinik/dtos/Setting/PaymentMethodSchema';
import ContentLayout from '@klinik/layouts/setting/ContentLayout.vue';

import { 
  Input, FormField, FormItem, FormLabel, FormControl, FormMessage
} from '@klinik/components/ui';

</script>
<template>
  <ContentLayout
    dialogTitle="Formulir Jenis Pembayaran"
    dialogDescription="Silahkan isi formulir di bawah ini"
    routeName="paymentMethod"
    :columns="[
      { field: 'actions', headerSort: false, width: 70 },
      { 
        title: 'Jenis Pembayaran', field: 'name', sorter: 'string', width: 200,
        headerFilter: 'input', headerFilterPlaceholder: 'Cari Jenis Pembayaran'
      },
      { 
        title: 'Label', field: 'label', sorter: 'string', width: 200
      },
      { 
        title: 'Tgl. Buat', field: 'created_at', sorter: 'string'
      }
    ]"
    :schema="PaymentMethodSchema"
    mainContent="PaymentMethod"
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
        <FormLabel :required="true">Nama PaymentMethod</FormLabel>
        <FormControl>
          <Input
            type="text"
            placeholder="Masukkan Nama PaymentMethod"
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
