document.addEventListener('DOMContentLoaded', () => {
    const savedTheme = localStorage.getItem('marketniro-theme');

    if (savedTheme === 'dark') {
        document.body.classList.add('dark-mode');
    }

    const toggleBtn = document.getElementById('themeToggle');

    if (toggleBtn) {
        toggleBtn.addEventListener('click', () => {
            document.body.classList.toggle('dark-mode');

            const isDark = document.body.classList.contains('dark-mode');
            localStorage.setItem('marketniro-theme', isDark ? 'dark' : 'light');
        });
    }
});
