document.addEventListener('DOMContentLoaded', function() {
    // Fonction pour créer un toast
    function showToast(message, type = 'success') {
        const toast = document.createElement('div');
        toast.className = `toast ${type}`;
        toast.innerHTML = `
            <div class="toast-content">
                <i class="bi ${type === 'success' ? 'bi-check-circle-fill' : 'bi-exclamation-circle-fill'}"></i>
                <span>${message}</span>
            </div>
        `;
        
        document.body.appendChild(toast);
        
        // Animation d'apparition
        setTimeout(() => {
            toast.style.transform = 'translateY(0)';
            toast.style.opacity = '1';
        }, 100);
        
        // Disparition automatique après 3 secondes
        setTimeout(() => {
            toast.style.transform = 'translateY(-100%)';
            toast.style.opacity = '0';
            
            setTimeout(() => {
                toast.remove();
            }, 300);
        }, 3000);
    }

    // Gérer les messages de succès/erreur
    const successMessage = '{{ session('success') }}';
    const errorMessage = '{{ session('error') }}';

    if (successMessage) {
        showToast(successMessage, 'success');
    } else if (errorMessage) {
        showToast(errorMessage, 'error');
    }
});
