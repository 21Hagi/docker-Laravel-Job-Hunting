<script setup>
    import { reactive } from 'vue';
    import { Core as YubinBangoCore } from "yubinbango-core2";

    const props = defineProps(['formData']);

    const otherAddressForm = reactive({
        isFormVisible: false
    });

    const showOtherAddressForm = () => {
        otherAddressForm.isFormVisible = !otherAddressForm.isFormVisible;
    };

    const fetchAddress1 = () => {
        new YubinBangoCore(String(props.formData.zip_code1), (value) => {
            props.formData.address1 = value.region + value.locality + value.street;
        })
    }

    const fetchAddress2 = () => {
        new YubinBangoCore(String(props.formData.zip_code2), (value) => {
            props.formData.address2 = value.region + value.locality + value.street;
        })
    }    
</script>

<template>
    <section class="text-gray-600 body-font">
        <div class="mb-2">
            <table class="w-full text-left table-auto min-w-max">
                <tbody>
                    <tr>
                        <td class="p-4 border-b border-gray-200 bg-blue-gray-100">
                            <span class="font-bold text-lg">住所</span>
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
                                郵便番号（ハイフンなし）
                            </p>
                        </th>
                        <td class="p-4 border-b border-gray-300">
                            <input type="number" id="zip_code1" name="zip_code1" v-model="props.formData.zip_code1" @change="fetchAddress1()" autocomplete="off" class="w-24 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        </td>
                    </tr>
                    <tr>
                        <th class="p-4 border-b border-gray-300 bg-gray-100">
                            <p class="block font-sans text-sm antialiased font-normal leading-none text-gray-900 opacity-70">
                                都道府県・市区町村・番地
                            </p>
                        </th>
                        <td class="p-4 border-b border-gray-300">
                            <input type="text" id="address1" name="address1" v-model="props.formData.address1" autocomplete="off" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        </td>
                    </tr>
                    <tr>
                        <th class="p-4 border-b border-gray-300 bg-gray-100">
                            <p class="block font-sans text-sm antialiased font-normal leading-none text-gray-900 opacity-70">
                                マンション・建物名等
                            </p>
                        </th>
                        <td class="p-4 border-b border-gray-300">
                            <input type="text" id="building_name1" name="building_name1" v-model="props.formData.building_name1" autocomplete="off" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        </td>
                    </tr>
                    <tr>
                        <th class="p-4 bg-gray-100">
                            <p class="block font-sans text-sm antialiased font-normal leading-none text-gray-900 opacity-70">
                                住所ふりがな
                            </p>
                        </th>
                        <td class="p-4">
                            <input type="text" id="address1_furigana" name="address1_furigana" v-model="props.formData.address1_furigana" autocomplete="off" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>        
        <div class="flex justify-center mt-2 ">
            <button @click="showOtherAddressForm">
                <span>上記以外の住所を希望する場合</span>
                <i v-if="otherAddressForm.isFormVisible" class="fa-solid fa-chevron-down pl-2 text-xs"></i>
                <i v-else class="fa-solid fa-chevron-right pl-2 text-xs"></i>
            </button>
        </div>
        <div v-if="otherAddressForm.isFormVisible" class="relative flex flex-col w-full h-full text-gray-700 bg-white shadow-md rounded-xl bg-clip-border">
            <table class="w-full text-left min-w-max">
                <tbody>
                    <tr>
                        <th class="p-4 border-b border-gray-300 bg-gray-100 rounded-tl-xl w-52">
                            <p class="block font-sans text-sm antialiased font-normal leading-none text-gray-900 opacity-70">
                                郵便番号（ハイフンなし）
                            </p>
                        </th>
                        <td class="p-4 border-b border-gray-300 flex">
                            <input type="number" id="zip_code2" name="zip_code2" v-model="props.formData.zip_code2" @change="fetchAddress2()" autocomplete="off" class="w-24 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        </td>
                    </tr>
                    <tr>
                        <th class="p-4 border-b border-gray-300 bg-gray-100">
                            <p class="block font-sans text-sm antialiased font-normal leading-none text-gray-900 opacity-70">
                                都道府県・市区町村・番地
                            </p>
                        </th>
                        <td class="p-4 border-b border-gray-300 flex">
                            <input type="hidden" id="address_furigana2">
                            <input type="text" id="address2" name="address2" v-model="props.formData.address2" autocomplete="off" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        </td>
                    </tr>
                    <tr>
                        <th class="p-4 border-b border-gray-300 bg-gray-100">
                            <p class="block font-sans text-sm antialiased font-normal leading-none text-gray-900 opacity-70">
                                マンション・建物名等
                            </p>
                        </th>
                        <td class="p-4 border-b border-gray-300">
                            <input type="text" id="building_name2" name="building_name2" v-model="props.formData.building_name2" autocomplete="off" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        </td>
                    </tr>
                    <tr>
                        <th class="p-4 bg-gray-100">
                            <p class="block font-sans text-sm antialiased font-normal leading-none text-gray-900 opacity-70">
                                住所ふりがな
                            </p>
                        </th>
                        <td class="p-4">
                            <input type="text" id="address2_furigana" name="address2_furigana" v-model="props.formData.address2_furigana" autocomplete="off" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>   
    </section>
</template>