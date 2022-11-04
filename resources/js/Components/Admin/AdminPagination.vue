<template>
    <ul class="pagination pagination-rounded justify-content-end my-4 mx-4">
        <template v-for="(link, p) in sliceLinks(links)" :key="p">
            <li v-if="link.url === null" class="page-item" :class="{ 'active': link.active }">
                <span class="page-link mx-2" v-html="link.label"></span>
            </li>
            <!-- <div v-if="link.url === null" class="mr-1 mb-1 px-4 py-3 text-sm leading-4 text-gray-400 border rounded"
                v-html="link.label" /> -->
            <li v-else :class="{ 'active': link.active }" class="page-item">
                <Link :href="link.url" class="page-link" v-html="link.label" preserve-state/>
            </li>
        </template>


        <!-- <li class="page-item active"><a class="page-link" href="javascript: void(0);">1</a>
        </li>
        <li class="page-item"><a class="page-link" href="javascript: void(0);">2</a></li>
        <li class="page-item"><a class="page-link" href="javascript: void(0);">3</a></li>
        <li class="page-item"><a class="page-link" href="javascript: void(0);">4</a></li>
        <li class="page-item"><a class="page-link" href="javascript: void(0);">5</a></li>
        <li class="page-item">
            <a class="page-link" href="javascript: void(0);" aria-label="Next">
                <span aria-hidden="true">»</span>
                <span class="visually-hidden">Next</span>
            </a>
        </li> -->
    </ul>
</template>
<script setup>
import { Link } from '@inertiajs/inertia-vue3';
const sliceLinks = (array) => {
    let index, start, end = 0;
    let newArray = [];
    index = array.findIndex(o => o.active === true);
    start = index < 5 ? index - 1 : index == array.length - 2 ? index - 4 : index == array.length - 3 ? index - 3 : index > 5 ? index - 2 : index - 2;
    end = index == 1 ? index + 5 : index > 5 ? index + 3 : index == 5 ? index + 3 : index + 4;
    end = end - 1;
    newArray = array.slice(start, end);
    return newArray;
};

const props = defineProps({
    links: Array,
});
</script>
