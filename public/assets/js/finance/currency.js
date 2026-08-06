document.addEventListener('DOMContentLoaded', () => {

    const fromSel = document.getElementById('fromCurrency');
    const toSel = document.getElementById('toCurrency');
    const prefix = document.getElementById('prefix');
    const swapBtn = document.getElementById('swap');

    // Stop if any element is missing
    if (!fromSel || !toSel || !prefix || !swapBtn) {
        console.error("Currency converter elements not found.");
        return;
    }

    function updatePrefix() {
        prefix.textContent = fromSel.value;
    }

    updatePrefix();

    fromSel.addEventListener('change', updatePrefix);

    swapBtn.addEventListener('click', () => {

        // Swap dropdown values
        const temp = fromSel.value;
        fromSel.value = toSel.value;
        toSel.value = temp;

        updatePrefix();

        // Rotate animation
        swapBtn.classList.add('spin');

        setTimeout(() => {
            swapBtn.classList.remove('spin');
        }, 300);
    });

});