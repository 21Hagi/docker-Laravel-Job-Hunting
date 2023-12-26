<script setup>
    import { ref } from 'vue';

    const props = defineProps({
        currentPage: Number,
        checkCurrentPage: Function,
        formData: Object
    });

    const currentPageRef = ref(props.currentPage);
    const emit = defineEmits();

    const handleClick = (pageNumber) => {
        currentPageRef.value = pageNumber;
        emit('currentPageChanged', pageNumber);
    };

    const setCreateDate = () => {

    }

</script>
<template>
    <section class="body-font font-origSerif">
        <div class="mb-2">
            <table class="w-full text-left table-auto min-w-max">
                <tbody>
                    <tr>
                        <td class="p-4 bg-blue-gray-100 border-b border-gray-200 bg-blue-gray-100">
                            <span class="font-bold text-lg">確認</span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="ml-60">
            <div class="flex mt-5">
                <div class="mr-10 w-[500px]">
                    <div class="flex justify-between">
                        <div class="text-3xl pl-1">履 歴 書</div>
                        <button @click="handleClick(10)" class="text-sm mt-4 hover:bg-gray-200 flex text-right">
                            <div class="w-16">{{ props.formData.createDateForm.create_date.split('-')[0] }}年</div>
                            <div class="w-10">{{ props.formData.createDateForm.create_date.split('-')[1] }}月</div>
                            <div class="w-[75px]">{{ props.formData.createDateForm.create_date.split('-')[2] }}日 現在</div>
                        </button>
                    </div>
                    <div class="border-t-2 border-r-2 border-l-2 border-solid border-black mt-2">
                        <button @click="handleClick(1)" class="hover:bg-gray-200 w-full">
                            <div class="border-b border-solid border-black  flex">
                                <div class="px-3 text-left text-xs py-3">ふりがな</div>
                                <div class="pt-2 text-xm">
                                    <span class="pl-4">{{ props.formData.profileForm.furigana_last_name }}</span><span class="pl-5">{{ props.formData.profileForm.furigana_first_name }}</span>
                                </div>
                            </div>
                            <div class="border-b-2 border-black h-16 flex">
                                <div class="px-3 mt-1.5 text-left py-3 text-xm">氏名</div>
                                <div class="pt-4 text-2xl">
                                    <span class="pl-8">{{ props.formData.profileForm.kanji_last_name }}</span><span class="pl-9">{{ props.formData.profileForm.kanji_first_name }}</span>
                                </div>
                            </div>
                            <div class="flex h-12">
                                <div class="mt-3 text-xm w-[400px] flex justify-end">
                                    <div class="w-20 text-right">{{ props.formData.profileForm.birth_year }}年</div>
                                    <div class="w-20 text-right">{{ props.formData.profileForm.birth_month }}月</div>
                                    <div class="w-20 text-right">{{ props.formData.profileForm.birth_day }}日生</div>
                                    <div>（満</div><div class="w-8">{{ props.formData.profileForm.age }}</div><div>歳）</div>
                                </div>
                                <div class="border-l-2 border-solid border-black flex">
                                    <span class="ml-1 text-xs">※性別</span>
                                    <span class="mt-3 text-xl">
                                        <span v-if="props.formData.profileForm.gender === '1'">男</span>
                                        <span v-else-if="props.formData.profileForm.gender === '2'">女</span>
                                        <span v-else></span>
                                    </span>
                                </div>
                            </div>
                        </button>
                    </div>
                </div>
                <div class="mt-5 ml-5 text-[9px] border border-dotted border-black h-[160px] w-[130px] hover:bg-gray-200">
                    <button @click="handleClick(4)" class="px-5 py-7">
                        <p class="pl-2">写真をはる位置</p><br>
                        <p>写真をはる必要が</p>
                        <p>ある場合</p>
                        <p>1. 縦 36mm〜40mm</p>
                        <p class="pl-2">横 24mm〜30mm</p>
                        <p>2.本人単身胸から上</p>
                        <p>3.裏面のりづけ</p>
                    </button>
                </div>
            </div>
            <div class="mr-10 w-[750px]">
                <div class="flex border-t-2 border-r-2 border-l-2 border-solid border-black">
                    <button @click="handleClick(2)" class="w-[580px] hover:bg-gray-200">
                        <div class="border-b border-solid border-black h-10">
                            <div class="px-3 py-3 text-xs text-left">ふりがな</div>
                        </div>
                        <div class="flex text-[14px] h-16">
                            <div class="px-3">現住所</div>
                            <div>〒</div>
                        </div>
                    </button>
                    <button @click="handleClick(3)" class="border-l-2 border-solid border-black hover:bg-gray-200">
                        <div class="border-b border-solid border-black text-[14px] h-10 w-[170px]">
                            <div class="pt-2 pl-1 text-left">電話</div>
                        </div>
                        <div class="text-[14px] pl-1 h-16">
                            <div class="text-left">E-mail</div>
                        </div>
                    </button>
                </div>               
            </div>
            <div class="mr-10 w-[750px]">
                <div class="flex border-2 border-solid border-black">
                    <button @click="handleClick(2)" class="w-[580px] hover:bg-gray-200">
                        <div class="border-b border-solid border-black h-10">
                            <div class="px-3 py-3 text-xs text-left">ふりがな</div>
                        </div>
                        <div class="flex justify-between h-16">
                            <div class="flex text-[14px]">
                                <div class="px-3">連絡先</div>
                                <div>〒</div>
                            </div>
                            <div class="text-[10px] mr-2 mt-1">(現住所以外に連絡を希望する場合のみ記入)</div>
                        </div>
                    </button>
                    <button @click="handleClick(3)" class="border-l-2 border-solid border-black hover:bg-gray-200">
                        <div class="border-b border-solid border-black text-[14px] h-10 w-[170px]">
                            <div class="pt-2 pl-1 text-left">電話</div>
                        </div>
                        <div class="text-[14px] pl-1 h-16">
                            <div class="text-left">E-mail</div>
                        </div>
                    </button>
                </div>               
            </div>
            <div class="mt-3  w-[750px]">
                <div class="flex flex-col">
                    <button @click="handleClick(5)" class="hover:bg-gray-200">
                        <table class="w-full table-auto border-2 border-solid border-black">
                            <thead class="border-b-4 border-double border-black h-8">
                                <tr class="text-center text-[12px]">
                                    <td class="w-16 border-r border-solid border-black">年</td>
                                    <td class="w-10 border-r-2 border-solid border-black">月</td>
                                    <td>学 歴・職 歴（各別にまとめて書く）</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="h-9 border-b border-black">
                                    <td class="border-r border-solid border-black"></td>
                                    <td class="border-r-2 border-solid border-black"></td>
                                    <td></td>
                                </tr>
                                <tr class="h-9 border-b border-black">
                                    <td class="border-r border-solid border-black"></td>
                                    <td class="border-r-2 border-solid border-black"></td>
                                    <td></td>
                                </tr>
                                <tr class="h-9 border-b border-black">
                                    <td class="border-r border-solid border-black"></td>
                                    <td class="border-r-2 border-solid border-black"></td>
                                    <td></td>
                                </tr>
                                <tr class="h-9 border-b border-black">
                                    <td class="border-r border-solid border-black"></td>
                                    <td class="border-r-2 border-solid border-black"></td>
                                    <td></td>
                                </tr>
                                <tr class="h-9 border-b border-black">
                                    <td class="border-r border-solid border-black"></td>
                                    <td class="border-r-2 border-solid border-black"></td>
                                    <td></td>
                                </tr>
                                <tr class="h-9 border-b border-black">
                                    <td class="border-r border-solid border-black"></td>
                                    <td class="border-r-2 border-solid border-black"></td>
                                    <td></td>
                                </tr>
                                <tr class="h-9 border-b border-black">
                                    <td class="border-r border-solid border-black"></td>
                                    <td class="border-r-2 border-solid border-black"></td>
                                    <td></td>
                                </tr>
                                <tr class="h-9 border-b border-black">
                                    <td class="border-r border-solid border-black"></td>
                                    <td class="border-r-2 border-solid border-black"></td>
                                    <td></td>
                                </tr>
                                <tr class="h-9 border-b border-black">
                                    <td class="border-r border-solid border-black"></td>
                                    <td class="border-r-2 border-solid border-black"></td>
                                    <td></td>
                                </tr>
                                <tr class="h-9 border-b border-black">
                                    <td class="border-r border-solid border-black"></td>
                                    <td class="border-r-2 border-solid border-black"></td>
                                    <td></td>
                                </tr>
                                <tr class="h-9 border-b border-black">
                                    <td class="border-r border-solid border-black"></td>
                                    <td class="border-r-2 border-solid border-black"></td>
                                    <td></td>
                                </tr>
                                <tr class="h-9 border-b border-black">
                                    <td class="border-r border-solid border-black"></td>
                                    <td class="border-r-2 border-solid border-black"></td>
                                    <td></td>
                                </tr>
                                <tr class="h-9 border-b border-black">
                                    <td class="border-r border-solid border-black"></td>
                                    <td class="border-r-2 border-solid border-black"></td>
                                    <td></td>
                                </tr>
                                <tr class="h-9 border-b border-black">
                                    <td class="border-r border-solid border-black"></td>
                                    <td class="border-r-2 border-solid border-black"></td>
                                    <td></td>
                                </tr>
                                <tr class="h-9 border-b border-black">
                                    <td class="border-r border-solid border-black"></td>
                                    <td class="border-r-2 border-solid border-black"></td>
                                    <td></td>
                                </tr>
                                <tr class="h-9 border-b border-black">
                                    <td class="border-r border-solid border-black"></td>
                                    <td class="border-r-2 border-solid border-black"></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </button>
                </div>
                <div class="text-[10px]">※「性別」欄：記載は任意です。未記載とすることも可能です。</div>    
            </div>

            <div class="flex flex-col">
                <button @click="handleClick(6)" class="mt-36 hover:bg-gray-200 w-[750px]">
                    <table class="w-full table-auto border-2 border-solid border-black">
                        <thead class="border-b-4 border-double border-black h-8">
                            <tr class="text-center text-[12px]">
                                <td class="w-16 border-r border-solid border-black">年</td>
                                <td class="w-10 border-r-2 border-solid border-black">月</td>
                                <td>学 歴・職 歴（各別にまとめて書く）</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="h-9 border-b border-black">
                                <td class="border-r border-solid border-black"></td>
                                <td class="border-r-2 border-solid border-black"></td>
                                <td></td>
                            </tr>
                            <tr class="h-9 border-b border-black">
                                <td class="border-r border-solid border-black"></td>
                                <td class="border-r-2 border-solid border-black"></td>
                                <td></td>
                            </tr>
                            <tr class="h-9 border-b border-black">
                                <td class="border-r border-solid border-black"></td>
                                <td class="border-r-2 border-solid border-black"></td>
                                <td></td>
                            </tr>
                            <tr class="h-9 border-b border-black">
                                <td class="border-r border-solid border-black"></td>
                                <td class="border-r-2 border-solid border-black"></td>
                                <td></td>
                            </tr>
                            <tr class="h-9 border-b border-black">
                                <td class="border-r border-solid border-black"></td>
                                <td class="border-r-2 border-solid border-black"></td>
                                <td></td>
                            </tr>
                            <tr class="h-9 border-b border-black">
                                <td class="border-r border-solid border-black"></td>
                                <td class="border-r-2 border-solid border-black"></td>
                                <td></td>
                            </tr>
                            <tr class="h-9 border-b border-black">
                                <td class="border-r border-solid border-black"></td>
                                <td class="border-r-2 border-solid border-black"></td>
                                <td></td>
                            </tr>
                            <tr class="h-9 border-b border-black">
                                <td class="border-r border-solid border-black"></td>
                                <td class="border-r-2 border-solid border-black"></td>
                                <td></td>
                            </tr>
                            <tr class="h-9 border-b border-black">
                                <td class="border-r border-solid border-black"></td>
                                <td class="border-r-2 border-solid border-black"></td>
                                <td></td>
                            </tr>
                            <tr class="h-9 border-b border-black">
                                <td class="border-r border-solid border-black"></td>
                                <td class="border-r-2 border-solid border-black"></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </button>
                <button @click="handleClick(7)" class="hover:bg-gray-200 w-[750px]">
                    <table class="w-full table-auto border-l-2 border-r-2 border-b-2 border-solid border-black">
                        <thead class="border-b-4 border-double border-black h-8">
                            <tr class="text-center text-[12px]">
                                <td class="w-16 border-r border-solid border-black">年</td>
                                <td class="w-10 border-r-2 border-solid border-black">月</td>
                                <td>資 格・免 許</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="h-9 border-b border-black">
                                <td class="border-r border-solid border-black"></td>
                                <td class="border-r-2 border-solid border-black"></td>
                                <td></td>
                            </tr>
                            <tr class="h-9 border-b border-black">
                                <td class="border-r border-solid border-black"></td>
                                <td class="border-r-2 border-solid border-black"></td>
                                <td></td>
                            </tr>
                            <tr class="h-9 border-b border-black">
                                <td class="border-r border-solid border-black"></td>
                                <td class="border-r-2 border-solid border-black"></td>
                                <td></td>
                            </tr>
                            <tr class="h-9 border-b border-black">
                                <td class="border-r border-solid border-black"></td>
                                <td class="border-r-2 border-solid border-black"></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </button> 
            </div>
            <div>
                <button @click="handleClick(8)" class="mt-3 hover:bg-gray-200 w-[750px]">
                    <table class="w-full table-auto border-2 border-solid border-black">
                        <thead class="border-b-4 border-double border-black h-8">
                            <tr class="text-[12px] text-left">
                                <td><span class="ml-2 text-left">志望の動機、特技、好きな学科、アピールポイントなど</span></td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="h-36 border-b border-black">
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </button> 
            </div>
            <div>
                <button @click="handleClick(9)" class="mt-3 hover:bg-gray-200">
                    <table class="w-[750px] table-auto border-2 border-solid border-black">
                        <thead class="border-b-4 border-double border-black h-8">
                            <tr class="text-[12px] text-left">
                                <td><span class="ml-2">本人希望記入欄（特に給料・職種・勤務時間・勤務地・その他についての希望などがあれば記入）</span></td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="h-9 border-b border-black">
                                <td></td>
                            </tr>
                            <tr class="h-9 border-b border-black">
                                <td></td>
                            </tr>
                            <tr class="h-9 border-b border-black">
                                <td></td>
                            </tr>
                            <tr class="h-9 border-b border-black">
                                <td></td>
                            </tr>
                            <tr class="h-9 border-b border-black">
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </button> 
            </div>
        </div>
    </section>
</template>