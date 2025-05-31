<script setup lang="ts">
import AppLayout from '@klinik/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@klinik/types';
import { Head } from '@inertiajs/vue3';
import TabulatorTable from '@/components/TabulatorTable.vue';  

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Dashboard',
        href: '/dashboard',
    },
    {
        title: 'Manajemen Role',
        href: '/acl/role',
    },
];

const data = Array.from({length: 30}, (_, i) => ({
    id: i+1,
    name: `Role ${i+1}`,
    age: i+1,
    age1: i+1,
    age2: i+1,
    age3: i+1,
    age4: i+1,
    age5: i+1,
    age6: i+1,
    age7: i+1,
    age8: i+1,
}));



const columns = [
  { title: 'ID', field: 'id', sorter: 'string' },
  { title: 'Name', field: 'name', sorter: 'string' },
  { title: 'Age', field: 'age', sorter: 'string' },
  { title: 'Age', field: 'age1', sorter: 'string' },
  { title: 'Age', field: 'age2', sorter: 'string' },
  { title: 'Age', field: 'age3', sorter: 'string' },
  { title: 'Age', field: 'age4', sorter: 'string' },
  { title: 'Age', field: 'age5', sorter: 'string' },
  { title: 'Age', field: 'age6', sorter: 'string' },
  { title: 'Age', field: 'age7', sorter: 'string' },
  { title: 'Age', field: 'age8', sorter: 'string' },
];

// const data = [
//     { 
//         name : 1,
//         progress : 1,
//         rating : 1,
//         car : 1,
//         gender : 1,
//         col : 1,
//         dob  : 1,
//     },
//     { 
//         name : 1,
//         progress : 1,
//         rating : 1,
//         car : 1,
//         gender : 1,
//         col : 1,
//         dob  : 1,
//     }
// ];

// const columns = [
//     {title:"Name", field:"name", width:160},
//     {//create column group
//         title:"Work Info",
//         columns:[
//             {title:"Progress", field:"progress", hozAlign:"right", sorter:"number", width:100},
//             {title:"Rating", field:"rating", hozAlign:"center", width:80},
//             {title:"Driver", field:"car", hozAlign:"center", width:80},
//         ],
//     },
//     {//create column group
//         title:"Personal Info",
//         columns:[
//             {title:"Gender", field:"gender", width:90},
//             {title:"Favourite Color", field:"col", width:140},
//             {title:"Date Of Birth", field:"dob", hozAlign:"center", sorter:"date"},
//         ],
//     },
// ];

const collapseFormat = (data: any[]): HTMLElement | string => {
    const list = document.createElement('ul');

    data.forEach((col) => {
        const item = document.createElement('li');
        item.innerHTML = `<strong>${col.title}</strong> - ${col.value}`;
        list.appendChild(item);
    });

    return data.length ? list : '';
};
</script>

<template>
    <Head title="Role" />
    <AppLayout 
        :breadcrumbs="breadcrumbs"
        title="MANAJEMEN ROLE" 
        icon="oi:list-rich"
        :actions="[
            {
                label: '',
                href: '/acl/role/create',
                button : {
                    type: 'add'
                }
            },
        ]"
    >
        <TabulatorTable :usingFilter="true" :data="data" :columns="columns" id="main" :options="[]">
        </TabulatorTable>
    </AppLayout>
</template>