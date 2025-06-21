import { validateSouthAfricanID } from '../utils.js';

window.personForm = function () {
    return {
        sa_id_number: document.getElementById('sa_id_number')?.value || '',
        error: '',

        validateSaIdNumber() {
            if (/^\d{13}$/.test(this.sa_id_number)) {
                if (!validateSouthAfricanID(this.sa_id_number.trim())) {
                    this.error = 'Invalid South African ID number.';
                } else {
                    this.error = '';

                    const dobPart = this.sa_id_number.substring(0, 6);
                    const year = parseInt(dobPart.substring(0, 2), 10);
                    const month = dobPart.substring(2, 4);
                    const day = dobPart.substring(4, 6);

                    // Determine century
                    const fullYear = year < 25 ? 2000 + year : 1900 + year;

                    // Format date
                    const jsDate = new Date(`${fullYear}-${month}-${day}`);

                    // Set the birth_date input value
                    document.getElementById('birth_date')._flatpickr.setDate(jsDate);
                }
            }
        },
        validateSaIdNumberLength() {
            if (!/^\d{13}$/.test(this.sa_id_number)) {
                this.error = 'ID Number must be exactly 13 digits.';
            } else {
                this.error = '';
            }
        }
    };
};
