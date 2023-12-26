<script setup>
    const props = defineProps(['formData']);
</script>
<template>
    <section class="text-gray-600 body-font">
        <div class="mb-2">
            <table class="w-full text-left table-auto min-w-max">
                <tbody>
                    <tr>
                        <td class="p-4 border-b border-gray-200 bg-blue-gray-100">
                            <span class="font-bold text-lg">免許・資格</span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="relative flex flex-col w-full h-full text-gray-700 bg-white shadow-md rounded-xl bg-clip-border">
            <table class="w-full text-left min-w-max">
                <tbody>
                    <tr>
                        <th class="p-4 border-b border-gray-300 bg-gray-100 rounded-tl-xl w-52">
                            <p class="block font-sans text-sm antialiased font-normal leading-none text-gray-900 opacity-70">
                                免許・資格１
                            </p>
                        </th>
                        <td class="p-4 border-b border-gray-300">
                            <input type="number" id="license1_year" v-model="props.formData.license1_year" autocomplete="off" class="w-20 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            <label for="license1_year" class="text-sm text-gray-600 ml-1 mr-2">年</label>
                            <input type="number" id="license1_month" v-model="props.formData.license1_month" autocomplete="off" class="w-12 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            <label for="license1_month" class="text-sm text-gray-600 ml-1 mr-10">月</label>
                            <input type="text" id="license1" v-model="props.formData.license1" autocomplete="off" class="w-[600px] bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        </td>
                    </tr>
                    <tr>
                        <th class="p-4 border-b border-gray-300 bg-gray-100">
                            <p class="block font-sans text-sm antialiased font-normal leading-none text-gray-900 opacity-70">
                                免許・資格２
                            </p>
                        </th>
                        <td class="p-4 border-b border-gray-300">
                            <input type="number" id="license2_year" v-model="props.formData.license2_year" autocomplete="off" class="w-20 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            <label for="license2_year" class="text-sm text-gray-600 ml-1 mr-2">年</label>
                            <input type="number" id="license2_month" v-model="props.formData.license2_moht" autocomplete="off" class="w-12 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            <label for="license2_month" class="text-sm text-gray-600 ml-1 mr-10">月</label>
                            <input type="text" id="license2" v-model="props.formData.license2" autocomplete="off" class="w-[600px] bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        </td>
                    </tr>
                    <tr>
                        <th class="p-4 border-b border-gray-300 bg-gray-100">
                            <p class="block font-sans text-sm antialiased font-normal leading-none text-gray-900 opacity-70">
                                免許・資格３
                            </p>
                        </th>
                        <td class="p-4 border-b border-gray-300">
                            <input type="number" id="license3_year" v-model="props.formData.license3_year" autocomplete="off" class="w-20 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            <label for="license3_year" class="text-sm text-gray-600 ml-1 mr-2">年</label>
                            <input type="number" id="license3_month" v-model="props.formData.license3_month" autocomplete="off" class="w-12 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            <label for="license3_month" class="text-sm text-gray-600 ml-1 mr-10">月</label>
                            <input type="text" id="license3" v-model="props.formData.license3" autocomplete="off" class="w-[600px] bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        </td>
                    </tr>
                    <tr>
                        <th class="p-4 border-b border-gray-300 bg-gray-100">
                            <p class="block font-sans text-sm antialiased font-normal leading-none text-gray-900 opacity-70">
                                免許・資格４
                            </p>
                        </th>
                        <td class="p-4 border-b border-gray-300">
                            <input type="number" id="license4_year" v-model="props.formData.license4_year" autocomplete="off" class="w-20 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            <label for="license4_year" class="text-sm text-gray-600 ml-1 mr-2">年</label>
                            <input type="number" id="license4_month" v-model="props.formData.license4_month" autocomplete="off" class="w-12 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            <label for="license4_month" class="text-sm text-gray-600 ml-1 mr-10">月</label>
                            <input type="text" id="license4" v-model="props.formData.license4" autocomplete="off" class="w-[600px] bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>
</template>