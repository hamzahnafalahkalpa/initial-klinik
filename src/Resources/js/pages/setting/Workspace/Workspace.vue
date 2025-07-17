<script setup lang="ts">
import { WorkspaceSchema } from '@klinik/dtos/Setting/WorkspaceSchema';
import ContentLayout from '@klinik/layouts/setting/ContentLayout.vue';
import { CellComponent } from 'tabulator-tables';
import FieldWrapper from '../../../components/ui/field/FieldWrapper.vue';
import Input from '../../../components/ui/input/Input.vue';

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
    dialogTitle="Formulir Workspace"
    dialogDescription="Silahkan isi formulir di bawah ini"
    routeName="bank"
    :columns="[
      { field: 'actions', headerSort: false, width: 70 },
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
    ]"
    :schema="WorkspaceSchema"
    mainContent="Profile Faskes"
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
    <FieldWrapper name="uuid" form-item-class="hidden" v-slot="{ componentField }">
      <Input type="text" v-bind="componentField" autocomplete="off" />
    </FieldWrapper>

    <FieldWrapper name="name" title="Nama Faskes" v-slot="{ componentField }">
      <Input
        type="text"
        placeholder="Masukkan Nama Faskes"
        autocomplete="off"
        v-bind="componentField"
        required
      />
    </FieldWrapper>

    <FieldWrapper name="email" title="Email Faskes" v-slot="{ componentField }">
      <Input
        type="text"
        placeholder="Email faskes"
        autocomplete="off"
        v-bind="componentField"
      />
    </FieldWrapper>

    <FieldWrapper name="phone" title="Telepon Faskes" v-slot="{ componentField }">
      <Input
        type="text"
        placeholder="Telepon faskes"
        autocomplete="off"
        v-bind="componentField"
      />
    </FieldWrapper>

    <FieldWrapper name="owner_id" title="ID Pemilik" v-slot="{ componentField }">
      <Input
        type="text"
        placeholder="Cari pemilik"
        autocomplete="off"
        v-bind="componentField"
      />
    </FieldWrapper>

  </ContentLayout>
</template>
