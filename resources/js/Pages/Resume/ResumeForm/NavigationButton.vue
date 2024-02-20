<script setup>
    defineProps ({
        currentPage: Number,
        nextCurrentPage: Function,
        prevCurrentPage: Function,
    });
</script>
<template>
    <div class="flex justify-between mt-5 text-sm">
        <button v-if="currentPage !== 1" class="bg-gray-200 border-0 px-3 py-2 focus:outline-none hover:bg-gray-400 rounded max-md:py-1" @click="prevCurrentPage()">
            <i class="fa-solid fa-angles-left mr-2"></i>戻る
        </button>
        <span v-else></span>
        <button v-show="currentPage !== 10" class="text-white bg-indigo-500 border-0 px-3 py-2 focus:outline-none hover:bg-indigo-600 rounded max-md:py-1" @click="nextCurrentPage()">
            次へ<i class="fa-solid fa-angles-right ml-2"></i>
        </button>
    </div>
</template>