 setTimeout(() => {
        const alert = document.querySelector('.alert');
        if (alert) {
            alert.classList.remove('show');
        }
    }, 3000); // Dismiss after 3 seconds