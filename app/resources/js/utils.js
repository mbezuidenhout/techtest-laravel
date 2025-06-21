export function validateSouthAfricanID(id) {
    // Must be exactly 13 digits
    if (!/^\d{13}$/.test(id)) return false;

    // Luhn algorithm for checksum
    let sum = 0;
    for (let i = 0; i < 13; i++) {
        let digit = parseInt(id[i], 10);
        if ((i % 2) === 0) {
            sum += digit;
        } else {
            let double = digit * 2;
            sum += double > 9 ? double - 9 : double;
        }
    }
    return (sum % 10) === 0;
}
