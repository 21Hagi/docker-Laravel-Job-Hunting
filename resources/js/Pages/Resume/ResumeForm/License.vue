<script setup>
    const props = defineProps(['formData']);

    const clearFormData = () => {
        Object.keys(props.formData).forEach(key => {
            props.formData[key] = '';
        });
    };
</script>
<template>
    <section class="text-gray-600 body-font">
        <div class="mb-2">
            <table class="w-full text-left table-auto min-w-max">
                <tbody>
                    <tr>
                        <td class="p-4 border-b border-gray-200 bg-blue-gray-100 flex justify-between">
                            <span class="font-bold text-lg">資格・免許</span>
                            <button class="text-sm hover:underline" @click="clearFormData"><i class="fa-solid fa-xmark mr-1"></i>リセットする</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="relative flex flex-col w-full h-full text-gray-700 bg-white shadow-md rounded-xl bg-clip-border">
            <table class="w-full text-left min-w-max">
                <tbody>
                    <tr>
                        <th class="p-4 border-b border-gray-300 bg-gray-100 rounded-tl-xl w-52  max-xl:w-28">
                            <p class="block font-sans text-sm antialiased font-normal leading-none text-gray-900 opacity-70">
                                資格・免許１
                            </p>
                        </th>
                        <td class="p-4 border-b border-gray-300 max-xl:w-[300px]">
                            <input type="number" id="license1_year" v-model="props.formData.license1.year" autocomplete="off" class="w-20 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out max-xl:text-sm max-xl:w-16">
                            <label for="license1_year" class="text-sm text-gray-600 ml-1 mr-2">年</label>
                            <input type="number" id="license1_month" v-model="props.formData.license1.month" autocomplete="off" class="w-12 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out max-xl:text-sm">
                            <label for="license1_month" class="text-sm text-gray-600 ml-1 mr-10">月</label>
                            <input type="text" id="license1" v-model="props.formData.license1.license" autocomplete="off" class="w-[600px] bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out max-xl:text-sm max-xl:w-full max-xl:mt-2">
                        </td>
                    </tr>
                    <tr>
                        <th class="p-4 border-b border-gray-300 bg-gray-100">
                            <p class="block font-sans text-sm antialiased font-normal leading-none text-gray-900 opacity-70">
                                資格・免許２
                            </p>
                        </th>
                        <td class="p-4 border-b border-gray-300">
                            <input type="number" id="license2_year" v-model="props.formData.license2.year" autocomplete="off" class="w-20 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out max-xl:text-sm max-xl:w-16">
                            <label for="license2_year" class="text-sm text-gray-600 ml-1 mr-2">年</label>
                            <input type="number" id="license2_month" v-model="props.formData.license2.month" autocomplete="off" class="w-12 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out max-xl:text-sm">
                            <label for="license2_month" class="text-sm text-gray-600 ml-1 mr-10">月</label>
                            <input type="text" id="license2" v-model="props.formData.license2.license" autocomplete="off" class="w-[600px] bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out max-xl:text-sm max-xl:w-full max-xl:mt-2">
                        </td>
                    </tr>
                    <tr>
                        <th class="p-4 border-b border-gray-300 bg-gray-100">
                            <p class="block font-sans text-sm antialiased font-normal leading-none text-gray-900 opacity-70">
                                資格・免許３
                            </p>
                        </th>
                        <td class="p-4 border-b border-gray-300">
                            <input type="number" id="license3_year" v-model="props.formData.license3.year" autocomplete="off" class="w-20 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out max-xl:text-sm max-xl:w-16">
                            <label for="license3_year" class="text-sm text-gray-600 ml-1 mr-2">年</label>
                            <input type="number" id="license3_month" v-model="props.formData.license3.month" autocomplete="off" class="w-12 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out max-xl:text-sm">
                            <label for="license3_month" class="text-sm text-gray-600 ml-1 mr-10">月</label>
                            <input type="text" id="license3" v-model="props.formData.license3.license" autocomplete="off" class="w-[600px] bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out max-xl:text-sm max-xl:w-full max-xl:mt-2">
                        </td>
                    </tr>
                    <tr>
                        <th class="p-4 bg-gray-100">
                            <p class="block font-sans text-sm antialiased font-normal leading-none text-gray-900 opacity-70">
                                資格・免許４
                            </p>
                        </th>
                        <td class="p-4">
                            <input type="number" id="license4_year" v-model="props.formData.license4.year" autocomplete="off" class="w-20 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out max-xl:text-sm max-xl:w-16">
                            <label for="license4_year" class="text-sm text-gray-600 ml-1 mr-2">年</label>
                            <input type="number" id="license4_month" v-model="props.formData.license4.month" autocomplete="off" class="w-12 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out max-xl:text-sm">
                            <label for="license4_month" class="text-sm text-gray-600 ml-1 mr-10">月</label>
                            <input type="text" id="license4" v-model="props.formData.license4.license" autocomplete="off" class="w-[600px] bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out max-xl:text-sm max-xl:w-full max-xl:mt-2">
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>
</template>