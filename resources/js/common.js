import axios from "axios";

const getToday = () => {
    const today = new Date();
    const yyyy = today.getFullYear();
    const mm = ("0"+(today.getMonth()+1)).slice(-2);
    const dd = ("0"+today.getDate()).slice(-2);
    return yyyy+'-'+mm+'-'+dd;
}

const calculateAge = (year = null, month = null, day = null) => {
    if (!year || !month || !day) {
       return;
    }
    const today = new Date();
    const birthDate = new Date(year, month - 1, day);
    let age = today.getFullYear() - birthDate.getFullYear();

    if (birthDate > today || year < 1900) {
        return;
    }

    if (today.getMonth() < birthDate.getMonth() || (today.getMonth() === birthDate.getMonth() && today.getDate() < birthDate.getDate())) {
        age--;
    }

    return age;
}

export { getToday, calculateAge }
