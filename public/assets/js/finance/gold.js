document.addEventListener("DOMContentLoaded", function () {
    const metalSelect = document.getElementById("metal");

    metalSelect.addEventListener("change", function () {
        const selectedMetal = this.value.toLowerCase().trim();

        if (selectedMetal === "gold") {
            window.location.href = "/finance/gold";
        } else if (selectedMetal === "silver") {
            window.location.href = "/finance/silver";
        }
    });
});