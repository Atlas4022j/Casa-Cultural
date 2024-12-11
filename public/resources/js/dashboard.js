document.addEventListener('DOMContentLoaded', function() {
    // DOM Elements
    const sidebar = document.getElementById('sidebar');
    const sidebarToggle = document.getElementById('sidebar-toggle');
    const submenuItems = document.querySelectorAll('.has-submenu');

    // Toggle Sidebar
    function toggleSidebar(event) {
        event.preventDefault();
        const isActive = sidebar.classList.toggle('active');

        if (isActive) {
            createOverlay();
        } else {
            removeOverlay();
        }
    }

    // Create Overlay
    function createOverlay() {
        if (!document.querySelector('.sidebar-overlay')) {
            const overlay = document.createElement('div');
            overlay.className = 'sidebar-overlay';
            overlay.style.cssText = `
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: rgba(0, 0, 0, 0.5);
                z-index: 999;
            `;
            document.body.appendChild(overlay);

            // Close sidebar when clicking overlay
            overlay.addEventListener('click', () => {
                sidebar.classList.remove('active');
                removeOverlay();
            });
        }
    }

    // Remove Overlay
    function removeOverlay() {
        const overlay = document.querySelector('.sidebar-overlay');
        if (overlay) {
            overlay.remove();
        }
    }

    // Close sidebar when clicking outside
    function handleOutsideClick(event) {
        if (sidebar.classList.contains('active') && !sidebar.contains(event.target) && !event.target.closest('#sidebar-toggle')) {
            sidebar.classList.remove('active');
            removeOverlay();
        }
    }

    // Handle window resize
    function handleResize() {
        if (window.innerWidth > 1024 && sidebar.classList.contains('active')) {
            sidebar.classList.remove('active');
            removeOverlay();
        }
    }

    // Toggle Submenu
    function toggleSubmenu(event) {
        event.preventDefault();
        const currentSubmenu = this.closest('.has-submenu');
        const submenu = currentSubmenu.querySelector('.submenu');

        // Close other open submenus
        submenuItems.forEach(item => {
            if (item !== currentSubmenu && item.classList.contains('active')) {
                item.classList.remove('active');
                const otherSubmenu = item.querySelector('.submenu');
                slideUp(otherSubmenu);
            }
        });

        // Toggle current submenu
        currentSubmenu.classList.toggle('active');
        if (currentSubmenu.classList.contains('active')) {
            slideDown(submenu);
        } else {
            slideUp(submenu);
        }
    }

    // Slide animations
    function slideDown(element) {
        element.style.maxHeight = element.scrollHeight + "px";
    }

    function slideUp(element) {
        element.style.maxHeight = "0";
    }

    // Event Listeners
    sidebarToggle.addEventListener('click', toggleSidebar);
    window.addEventListener('resize', handleResize);
    document.addEventListener('click', handleOutsideClick);

    submenuItems.forEach(item => {
        const submenuToggle = item.querySelector('a');
        if (submenuToggle) {
            submenuToggle.addEventListener('click', toggleSubmenu);
        }
    });

    // Initialize Sidebar
    if (window.innerWidth <= 1024) {
        sidebar.classList.remove('active');
    }
});

// SECTION REPORTS
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('roomRegistrationForm');
    const fileInput = document.getElementById('roomImages');
    const imagePreviewContainer = document.getElementById('imagePreviewContainer');

    // Inicializar los iconos de Lucide
    lucide.createIcons();

    fileInput.addEventListener('change', function(e) {
        imagePreviewContainer.innerHTML = ''; // Limpiar previsualizaciones anteriores
        const files = e.target.files;

        for (let i = 0; i < files.length; i++) {
            const file = files[i];
            if (!file.type.startsWith('image/')) continue;

            const reader = new FileReader();
            reader.onload = function(e) {
                const previewElement = document.createElement('div');
                previewElement.className = 'image-preview';
                previewElement.innerHTML = `
                    <img src="${e.target.result}" alt="Preview">
                    <button type="button" class="remove-image" aria-label="Eliminar imagen">
                        <i data-lucide="x"></i>
                    </button>
                `;
                imagePreviewContainer.appendChild(previewElement);

                // Inicializar el icono de eliminar
                lucide.createIcons({
                    icons: ['x'],
                    attrs: {
                        class: 'rr-icon'
                    }
                });

                // Agregar evento para eliminar la imagen
                previewElement.querySelector('.remove-image').addEventListener('click', function() {
                    previewElement.remove();
                    // Aquí puedes agregar lógica adicional si necesitas actualizar el input de archivos
                });
            }
            reader.readAsDataURL(file);
        }
    });

    form.addEventListener('submit', function(e) {
        e.preventDefault();
        // Aquí puedes agregar la lógica para enviar el formulario
        console.log('Formulario enviado');
        // Puedes usar FormData para recopilar los datos del formulario, incluyendo las imágenes
        const formData = new FormData(form);
        // Enviar formData a tu servidor usando fetch o axios
    });

    // Crear un contenedor para las previsualizaciones si no existe
    const previewSection = document.createElement('div');
    previewSection.id = 'previewSection';
    previewSection.style = 'margin-top: 20px;';
    const formParent = form.parentElement;
    formParent.appendChild(previewSection);

    // Mover el contenedor de previsualización dentro de la sección de previsualización
    previewSection.appendChild(imagePreviewContainer);

    // Animación de entrada para el formulario
    setTimeout(() => {
        form.classList.add('rr-form-animate-in');
    }, 100);

    // Asegurar que el contenedor de previsualización esté separado del formulario
    const formContainer = document.querySelector('.form-container');
    formContainer.classList.add('with-preview');
});

// END REPORTES