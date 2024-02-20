<script setup>
    import { ref } from 'vue';

    const props = defineProps({
        currentPage: Number,
        checkCurrentPage: Function,
    });

    const currentPageRef = ref(props.currentPage);
    const emit = defineEmits();

    const movePage = (pageNumber) => {
        currentPageRef.value = pageNumber;
        emit('currentPageChanged', pageNumber);
    };
</script>

<template>
    <ul class="relative flex flex-row gap-x-2 mb-5 w-full text-center max-lg:hidden">
        <li class="shrink basis-0 flex-1 group">
            <div class="min-h-[28px] w-full inline-flex items-center text-xs align-middle ml-10">
                <button class="w-7 h-7 flex justify-center items-center flex-shrink-0 font-medium rounded-full" 
                :class="currentPage === 1 ? 'bg-indigo-600 text-white': 'bg-gray-100 text-gray-800'" @click="movePage(1)">
                    {{ checkCurrentPage(1)['passed-page'] ? "✔︎" : 1 }}
                </button>
                <div class="ms-2 w-full h-px flex-1 bg-gray-200 group-last:hidden"></div>
            </div>
            <button class="mt-1" @click="movePage(1)">
                <span class="block text-sm font-medium text-gray-800">
                    基本情報
                </span>
            </button>
        </li>
        <li class="shrink basis-0 flex-1 group">
            <div class="min-h-[28px] w-full inline-flex items-center text-xs align-middle ml-[42px]">
                <button class="w-7 h-7 flex justify-center items-center flex-shrink-0 font-medium rounded-full" 
                :class="currentPage === 2 ? 'bg-indigo-600 text-white': 'bg-gray-100 text-gray-800'" @click="movePage(2)">
                    {{ checkCurrentPage(2)['passed-page'] ? "✔︎" : 2 }}
                </button>
                <div class="ms-2 w-full h-px flex-1 bg-gray-200 group-last:hidden"></div>
            </div>
            <button class="mt-1" @click="movePage(2)">
                <span class="block text-sm font-medium text-gray-800">
                    住所
                </span>
            </button>
        </li>
        <li class="shrink basis-0 flex-1 group">
            <div class="min-h-[28px] w-full inline-flex items-center text-xs align-middle ml-10">
                <button class="w-7 h-7 flex justify-center items-center flex-shrink-0 font-medium rounded-full" 
                :class="currentPage === 3 ? 'bg-indigo-600 text-white': 'bg-gray-100 text-gray-800'" @click="movePage(3)">
                    {{ checkCurrentPage(3)['passed-page'] ? "✔︎" : 3 }}
                </button>
                <div class="ms-2 w-full h-px flex-1 bg-gray-200 group-last:hidden"></div>
            </div>
            
            <button class="mt-1" @click="movePage(3)">
                <span class="block text-sm font-medium text-gray-800">
                    連絡先
                </span>
            </button>
        </li>
        <li class="shrink basis-0 flex-1 group">
            <div class="min-h-[28px] w-full inline-flex items-center text-xs align-middle ml-10">
                <button class="w-7 h-7 flex justify-center items-center flex-shrink-0 font-medium rounded-full" 
                :class="currentPage === 4 ? 'bg-indigo-600 text-white': 'bg-gray-100 text-gray-800'" @click="movePage(4)">
                    {{ checkCurrentPage(4)['passed-page'] ? "✔︎" : 4 }}
                </button>
                <div class="ms-2 w-full h-px flex-1 bg-gray-200 group-last:hidden"></div>
            </div>
            <button class="mt-1" @click="movePage(4)">
                <span class="block text-sm font-medium text-gray-800">
                    証明写真
                </span>
            </button>
        </li>
        <li class="shrink basis-0 flex-1 group">
            <div class="min-h-[28px] w-full inline-flex items-center text-xs align-middle ml-[42px]">
                <button class="w-7 h-7 flex justify-center items-center flex-shrink-0 font-medium rounded-full" 
                :class="currentPage === 5 ? 'bg-indigo-600 text-white': 'bg-gray-100 text-gray-800'" @click="movePage(5)">
                    {{ checkCurrentPage(5)['passed-page'] ? "✔︎" : 5 }}
                </button>
                <div class="ms-2 w-full h-px flex-1 bg-gray-200 group-last:hidden"></div>
            </div>
            <button class="mt-1" @click="movePage(5)">
                <span class="block text-sm font-medium text-gray-800">
                    学歴
                </span>
            </button>
        </li>
        <li class="shrink basis-0 flex-1 group">
            <div class="min-h-[28px] w-full inline-flex items-center text-xs align-middle ml-[41.2px]">
                <button class="w-7 h-7 flex justify-center items-center flex-shrink-0 font-medium rounded-full" 
                :class="currentPage === 6 ? 'bg-indigo-600 text-white': 'bg-gray-100 text-gray-800'" @click="movePage(6)">
                    {{ checkCurrentPage(6)['passed-page'] ? "✔︎" : 6 }}
                </button>
                <div class="ms-2 w-full h-px flex-1 bg-gray-200 group-last:hidden"></div>
            </div>
            <button class="mt-1" @click="movePage(6)">
                <span class="block text-sm font-medium text-gray-800">
                    職歴
                </span>
            </button>
        </li>
        <li class="shrink basis-0 flex-1 group">
            <div class="min-h-[28px] w-full inline-flex items-center text-xs align-middle ml-10">
                <button class="w-7 h-7 flex justify-center items-center flex-shrink-0 font-medium rounded-full" 
                :class="currentPage === 7 ? 'bg-indigo-600 text-white': 'bg-gray-100 text-gray-800'" @click="movePage(7)">
                    {{ checkCurrentPage(7)['passed-page'] ? "✔︎" : 7 }}
                </button>
                <div class="ms-2 w-full h-px flex-1 bg-gray-200 group-last:hidden"></div>
            </div>
            <button class="mt-1" @click="movePage(7)">
                <span class="block text-sm font-medium text-gray-800">
                    資格・免許
                </span>
            </button>
        </li>
        <li class="shrink basis-0 flex-1 group">
            <div class="min-h-[28px] w-full inline-flex items-center text-xs align-middle ml-10">
                <button class="w-7 h-7 flex justify-center items-center flex-shrink-0 font-medium rounded-full" 
                :class="currentPage === 8 ? 'bg-indigo-600 text-white': 'bg-gray-100 text-gray-800'" @click="movePage(8)">
                    {{ checkCurrentPage(8)['passed-page'] ? "✔︎" : 8 }}
                </button>
                <div class="ms-2 w-full h-px flex-1 bg-gray-200 group-last:hidden"></div>
            </div>
            <button class="mt-1" @click="movePage(8)">
                <span class="block text-sm font-medium text-gray-800">
                    志望動機
                </span>
            </button>
        </li>
        <li class="shrink basis-0 flex-1 group">
            <div class="min-h-[28px] w-full inline-flex items-center text-xs align-middle ml-10">
                <button class="w-7 h-7 flex justify-center items-center flex-shrink-0 font-medium rounded-full" 
                :class="currentPage === 9 ? 'bg-indigo-600 text-white': 'bg-gray-100 text-gray-800'" @click="movePage(9)">
                    {{ checkCurrentPage(9)['passed-page'] ? "✔︎" : 9 }}
                </button>
                <div class="ms-2 w-full h-px flex-1 bg-gray-200 group-last:hidden"></div>
            </div>
            <button class="mt-1" @click="movePage(9)">
                <span class="block text-sm font-medium text-gray-800">
                    本人希望欄
                </span>
            </button>
        </li>
        <li class="shrink basis-0 flex-1 group">
            <div class="min-h-[28px] w-full inline-flex items-center text-xs align-middle ml-10">
                <button class="w-7 h-7 flex justify-center items-center flex-shrink-0 font-medium rounded-full" 
                :class="currentPage === 10 ? 'bg-indigo-600 text-white': 'bg-gray-100 text-gray-800'" @click="movePage(10)">
                    {{ checkCurrentPage(10)['passed-page'] ? "✔︎" : 10 }}
                </button>
                <div class="ms-2 w-full h-px flex-1 bg-gray-200 group-last:hidden"></div>
            </div>
            <button class="mt-1" @click="movePage(10)">
                <span class="block text-sm font-medium text-gray-800">
                    作成日
                </span>
            </button>
        </li>
        <!-- <li class="shrink basis-0 flex-1 group">
            <div class="min-h-[28px] w-full inline-flex items-center text-xs align-middle ml-9">
                <button class="w-7 h-7 flex justify-center items-center flex-shrink-0 font-medium rounded-full" 
                :class="currentPage === 11 ? 'bg-indigo-600 text-white': 'bg-gray-100 text-gray-800'" @click="movePage(11)">
                    {{ checkCurrentPage(11)['passed-page'] ? "✔︎" : 11 }}
                </button>
                <div class="ms-2 w-full h-px flex-1 bg-gray-200 group-last:hidden"></div>
            </div>
            <button class="mt-1" @click="movePage(11)">
                <span class="block text-sm font-medium text-gray-800">
                    確認
                </span>
            </button>
        </li> -->
    </ul>
</template>