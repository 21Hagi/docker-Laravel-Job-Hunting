<script setup>
    import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
    import { ref, reactive } from 'vue';
    import { Inertia } from '@inertiajs/inertia';
    import { getToday } from '@/common';
    import { Head } from '@inertiajs/vue3';
    import Stepper from './ResumeForm/Stepper.vue';
    import Profile from './ResumeForm/Profile.vue';
    import Address from './ResumeForm/Address.vue';
    import Contact from './ResumeForm/Contact.vue';
    import Photo from './ResumeForm/Photo.vue';
    import EduHistory from './ResumeForm/EduHistory.vue';
    import JobHistory from './ResumeForm/JobHistory.vue';
    import License from './ResumeForm/License.vue';
    import Reason from './ResumeForm/Reason.vue';
    import Requests from './ResumeForm/Requests.vue';
    import CreateDate from './ResumeForm/CreateDate.vue';
    import NavigationButton from './ResumeForm/NavigationButton.vue';

    const components = {
        Stepper, Profile, Address, Contact, Photo, EduHistory, JobHistory,
        License, Reason, Requests, CreateDate, NavigationButton
    };

    let currentPage = ref(1);

    const checkCurrentPage = (number) => ({
        'current-page': currentPage.value === number,
        'passed-page': currentPage.value > number,
    });

    const handleCurrentPageChanged = (newPage) => {
        currentPage.value = newPage;
    };

    const nextCurrentPage = () => currentPage.value++;
    const prevCurrentPage = () => currentPage.value--;

    const props = defineProps({
        resumeData: Object,
    })

    const profileData = props.resumeData.profileData || {};
    const addressData = props.resumeData.addressData || {};
    const contactData = props.resumeData.contactData || {};
    const eduHistoryData = props.resumeData.eduHistoryData || {};
    const jobHistoryData = props.resumeData.jobHistoryData || {};
    const licenseData = props.resumeData.licenseData || {};

    const allFormData = {
        profileForm: reactive({
            kanji_last_name: profileData.kanji_last_name ?? '', 
            kanji_first_name: profileData.kanji_first_name ?? '', 
            furigana_last_name: profileData.furigana_last_name ?? '', 
            furigana_first_name: profileData.furigana_first_name ?? '', 
            birth_year: profileData.birth_year ?? '', 
            birth_month: profileData.birth_month ?? '', 
            birth_day: profileData.birth_day ?? '', 
            age: profileData.age ?? '', 
            gender: profileData.gender ?? '',
        }),

        addressForm: reactive({
            zip_code1: addressData.zip_code1 ?? '', address1: addressData.address1 ?? '', 
            building_name1: addressData.building_name1 ?? '', address1_furigana: addressData.address1_furigana ?? '', 
            zip_code2: addressData.zip_code2 ?? '', address2: addressData.address2 ?? '', 
            building_name2: addressData.building_name2 ?? '', address2_furigana: addressData.address2_furigana ?? '', 
        }),

        contactForm: reactive({
            phone_number1: contactData.phone_number1 ?? '', phone_number2: contactData.phone_number2 ?? '', 
            phone_number3: contactData.phone_number3 ?? '', email: contactData.email ?? '',
            other_phone_number1: contactData.other_phone_number1 ?? '', other_phone_number2: contactData.other_phone_number2 ?? '', 
            other_phone_number3: contactData.other_phone_number3 ?? '', other_email: contactData.other_email ?? '',
        }),

        photoForm: reactive({ photo: null }),

        eduHistoryForm: reactive({
            edu_history1: { year: eduHistoryData.edu_history1_year ?? '', month: eduHistoryData.edu_history1_month ?? '', history: eduHistoryData.edu_history1_history ?? '' },
            edu_history2: { year: eduHistoryData.edu_history2_year ?? '', month: eduHistoryData.edu_history2_month ?? '', history: eduHistoryData.edu_history2_history ?? '' }, 
            edu_history3: { year: eduHistoryData.edu_history3_year ?? '', month: eduHistoryData.edu_history3_month ?? '', history: eduHistoryData.edu_history3_history ?? '' }, 
            edu_history4: { year: eduHistoryData.edu_history4_year ?? '', month: eduHistoryData.edu_history4_month ?? '', history: eduHistoryData.edu_history4_history ?? '' }, 
            edu_history5: { year: eduHistoryData.edu_history5_year ?? '', month: eduHistoryData.edu_history5_month ?? '', history: eduHistoryData.edu_history5_history ?? '' }, 
            edu_history6: { year: eduHistoryData.edu_history6_year ?? '', month: eduHistoryData.edu_history6_month ?? '', history: eduHistoryData.edu_history6_history ?? '' }, 
            edu_history7: { year: eduHistoryData.edu_history7_year ?? '', month: eduHistoryData.edu_history7_month ?? '', history: eduHistoryData.edu_history7_history ?? '' }, 
            edu_history8: { year: eduHistoryData.edu_history8_year ?? '', month: eduHistoryData.edu_history8_month ?? '', history: eduHistoryData.edu_history8_history ?? '' }, 
            edu_history9: { year: eduHistoryData.edu_history9_year ?? '', month: eduHistoryData.edu_history9_month ?? '', history: eduHistoryData.edu_history9_history ?? '' }, 
            edu_history10: { year: eduHistoryData.edu_history10_year ?? '', month: eduHistoryData.edu_history10_month ?? '', history: eduHistoryData.edu_history10_history ?? '' },  
        }),

        jobHistoryForm: reactive({
            job_history1: { year: jobHistoryData.job_history1_year ?? '', month: jobHistoryData.job_history1_month ?? '', history: jobHistoryData.job_history1_history ?? '' },
            job_history2: { year: jobHistoryData.job_history2_year ?? '', month: jobHistoryData.job_history2_month ?? '', history: jobHistoryData.job_history2_history ?? '' }, 
            job_history3: { year: jobHistoryData.job_history3_year ?? '', month: jobHistoryData.job_history3_month ?? '', history: jobHistoryData.job_history3_history ?? '' }, 
            job_history4: { year: jobHistoryData.job_history4_year ?? '', month: jobHistoryData.job_history4_month ?? '', history: jobHistoryData.job_history4_history ?? '' }, 
            job_history5: { year: jobHistoryData.job_history5_year ?? '', month: jobHistoryData.job_history5_month ?? '', history: jobHistoryData.job_history5_history ?? '' }, 
            job_history6: { year: jobHistoryData.job_history6_year ?? '', month: jobHistoryData.job_history6_month ?? '', history: jobHistoryData.job_history6_history ?? '' }, 
            job_history7: { year: jobHistoryData.job_history7_year ?? '', month: jobHistoryData.job_history7_month ?? '', history: jobHistoryData.job_history7_history ?? '' }, 
            job_history8: { year: jobHistoryData.job_history8_year ?? '', month: jobHistoryData.job_history8_month ?? '', history: jobHistoryData.job_history8_history ?? '' }, 
            job_history9: { year: jobHistoryData.job_history9_year ?? '', month: jobHistoryData.job_history9_month ?? '', history: jobHistoryData.job_history9_history ?? '' }, 
            job_history10: { year: jobHistoryData.job_history10_year ?? '', month: jobHistoryData.job_history10_month ?? '', history: jobHistoryData.job_history10_history ?? '' }, 
        }),

        licenseForm: reactive({
            license1: { year: licenseData.license1_year ?? '', month: licenseData.license1_month ?? '', license: licenseData.license1_license ?? '' }, 
            license2: { year: licenseData.license2_year ?? '', month: licenseData.license2_month ?? '', license: licenseData.license2_license ?? '' },
            license3: { year: licenseData.license3_year ?? '', month: licenseData.license3_month ?? '', license: licenseData.license3_license ?? '' }, 
            license4: { year: licenseData.license4_year ?? '', month: licenseData.license4_month ?? '', license: licenseData.license4_license ?? '' },
        }),

        reasonForm: reactive({ reason: null }),

        requestsForm: reactive({ requests: null }),

        createDateForm: reactive({ create_date: getToday() })
    }

    const createPdf = () => {
        Inertia.post('/resume', allFormData, {
            onSuccess: (page) => {
                if (page.props.fileName) {
                    Inertia.replace('/resume/create', { preserveState: true });
                    const url = `/resume/${page.props.fileName}`;
                    window.open(url, '_blank');
                }
            }
        });
    }

</script>

<template>
    <Head title="履歴書作成" />

    <AuthenticatedLayout>
        <template #header>
            <div class="flex justify-between">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">履歴書作成</h2>
                <button @click="createPdf" class="text-white bg-red-500 border-0 py-2 px-8 focus:outline-none hover:bg-red-600 rounded text-xm delete-confirm mr-5 max-md:text-sm max-md:px-4"><i class="fa-solid fa-file-arrow-down mr-2"></i>履歴書をダウンロード</button>
            </div>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">         
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <Stepper :currentPage="currentPage" :checkCurrentPage="checkCurrentPage" @currentPageChanged="handleCurrentPageChanged" />
                        <Profile v-if="currentPage === 1" :formData="allFormData.profileForm" />
                        <Address v-else-if="currentPage === 2" :formData="allFormData.addressForm" />
                        <Contact v-else-if="currentPage === 3" :formData="allFormData.contactForm" />
                        <Photo v-else-if="currentPage === 4" :formData="allFormData.photoForm" />
                        <EduHistory v-else-if="currentPage === 5" :formData="allFormData.eduHistoryForm" />
                        <JobHistory v-else-if="currentPage === 6" :formData="allFormData.jobHistoryForm" />
                        <License v-else-if="currentPage === 7" :formData="allFormData.licenseForm" />
                        <Reason v-else-if="currentPage === 8" :formData="allFormData.reasonForm" />
                        <Requests v-else-if="currentPage === 9" :formData="allFormData.requestsForm" />
                        <CreateDate v-else-if="currentPage === 10" :formData="allFormData.createDateForm" />
                        <NavigationButton :currentPage="currentPage" :prevCurrentPage="prevCurrentPage" :nextCurrentPage="nextCurrentPage" />
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
