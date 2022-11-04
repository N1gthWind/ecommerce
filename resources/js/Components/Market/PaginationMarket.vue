<template>
    <div class="tp-pagination text-center">
        <div class="row">
            <div class="col-xl-12">
                <div class="basic-pagination pt-30 pb-30">
                    <ul>
                        <template v-for="(link, p) in links" :key="p">
                            <li v-if="link.url === null" class="page-item" :class="{ 'active': link.active }">
                            </li>
                            <li v-else>
                                <Link as="button" :class="{ 'active': link.active }" :href="link.url" class="page-link"
                                    v-html="link.label" preserve-state />
                            </li>
                        </template>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { Link, usePage } from '@inertiajs/inertia-vue3';
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

<style lang="scss">

</style>
