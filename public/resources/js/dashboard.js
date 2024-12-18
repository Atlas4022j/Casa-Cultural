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

// VIEWS DETAILS
document.addEventListener('DOMContentLoaded', function() {
    feather.replace();

    const imagesGrid = document.getElementById('luxe-images-grid');
    const modal = document.getElementById('luxe-image-modal');
    const modalImg = document.getElementById('luxe-modal-image');
    const closeButton = document.querySelector('.luxe-close-button');
    const prevButton = document.getElementById('luxe-prev-button');
    const nextButton = document.getElementById('luxe-next-button');

    let currentImageIndex = 0;
    const images = Array.from(document.querySelectorAll('.luxe-room-image'));

    imagesGrid.addEventListener('click', function(e) {
        if (e.target.classList.contains('luxe-room-image')) {
            openModal(e.target);
        }
    });

    closeButton.addEventListener('click', closeModal);

    prevButton.addEventListener('click', showPreviousImage);
    nextButton.addEventListener('click', showNextImage);

    document.addEventListener('keydown', function(e) {
        if (modal.style.display === 'block') {
            if (e.key === 'ArrowLeft') {
                showPreviousImage();
            } else if (e.key === 'ArrowRight') {
                showNextImage();
            } else if (e.key === 'Escape') {
                closeModal();
            }
        }
    });

    function openModal(img) {
        modal.style.display = 'block';
        setTimeout(() => {
            modal.classList.add('show');
            modalImg.classList.add('show');
        }, 10);
        modalImg.src = img.src;
        currentImageIndex = images.indexOf(img);
        updateNavigationButtons();
    }

    function closeModal() {
        modal.classList.remove('show');
        modalImg.classList.remove('show');
        setTimeout(() => {
            modal.style.display = 'none';
        }, 300);
    }

    function showPreviousImage() {
        currentImageIndex = (currentImageIndex - 1 + images.length) % images.length;
        updateModalImage();
    }

    function showNextImage() {
        currentImageIndex = (currentImageIndex + 1) % images.length;
        updateModalImage();
    }

    function updateModalImage() {
        modalImg.classList.remove('show');
        setTimeout(() => {
            modalImg.src = images[currentImageIndex].src;
            modalImg.classList.add('show');
        }, 300);
        updateNavigationButtons();
    }

    function updateNavigationButtons() {
        prevButton.style.display = images.length > 1 ? 'block' : 'none';
        nextButton.style.display = images.length > 1 ? 'block' : 'none';
    }

    // Animate room info items
    const infoItems = document.querySelectorAll('.luxe-info-item');
    infoItems.forEach((item, index) => {
        item.style.animationDelay = `${index * 0.1}s`;
    });

    // Animate image cards
    const imageCards = document.querySelectorAll('.luxe-image-card');
    imageCards.forEach((card, index) => {
        card.style.animationDelay = `${index * 0.1 + 0.5}s`;
    });
});


//END

// EDIT IMG

document.addEventListener('DOMContentLoaded', function() {
    const imageInput = document.getElementById('rr-img');
    const previewContainer = document.getElementById('image-preview-container');
    const carousel = document.getElementById('fullscreen-carousel');
    const carouselSlides = document.getElementById('carousel-slides');
    const prevSlide = document.getElementById('prev-slide');
    const nextSlide = document.getElementById('next-slide');
    const closeCarousel = document.getElementById('close-carousel');
    let currentSlide = 0;

    // Manejar la carga de imágenes
    window.handleImageUpload = function(event) {
        const files = event.target.files;
        for (let file of files) {
            const reader = new FileReader();
            reader.onload = function(e) {
                addImageToPreview(e.target.result);
                updateCarousel(); // Actualizar carrusel cada vez que se agrega una nueva imagen
            }
            reader.readAsDataURL(file);
        }
    }

    // Añadir imagen al contenedor de vista previa
    function addImageToPreview(src) {
        const wrapper = document.createElement('div');
        wrapper.className = 'image-wrapper';
        wrapper.innerHTML = `
            <img src="${src}" alt="Imagen de la habitación" onclick="openCarousel(this)">
            <button type="button" class="delete-img-btn" onclick="removeImage(this)">
                <i data-lucide="x" class="delete-icon"></i>
            </button>
        `;
        previewContainer.appendChild(wrapper);
        if (typeof lucide !== 'undefined') {
            lucide.createIcons();
        }
    }

    // Remover imagen
    window.removeImage = function(button) {
        const wrapper = button.closest('.image-wrapper');
        wrapper.classList.add('removing');
        setTimeout(() => {
            wrapper.remove();
            updateCarousel(); // Actualizar carrusel después de eliminar una imagen
        }, 300);
    }

    // Abrir carrusel
    window.openCarousel = function(clickedImg) {
        const images = document.querySelectorAll('.image-wrapper img');
        carouselSlides.innerHTML = '';
        images.forEach((img, index) => {
            const slide = document.createElement('div');
            slide.className = 'carousel-slide';
            slide.innerHTML = `<img src="${img.src}" alt="Imagen ${index + 1}">`;
            carouselSlides.appendChild(slide);
        });
        carousel.classList.add('active');
        currentSlide = Array.from(images).indexOf(clickedImg);
        updateCarousel();
    }

    // Actualizar carrusel
    function updateCarousel() {
        const images = document.querySelectorAll('.image-wrapper img');
        carouselSlides.innerHTML = ''; // Limpiar carrusel antes de actualizar

        images.forEach((img, index) => {
            const slide = document.createElement('div');
            slide.className = 'carousel-slide';
            slide.innerHTML = `<img src="${img.src}" alt="Imagen ${index + 1}">`;
            carouselSlides.appendChild(slide);
        });

        const slides = carouselSlides.children;
        for (let i = 0; i < slides.length; i++) {
            slides[i].style.transform = `translateX(${100 * (i - currentSlide)}%)`;
        }
    }

    // Navegación del carrusel
    prevSlide.addEventListener('click', () => {
        currentSlide = (currentSlide - 1 + carouselSlides.children.length) % carouselSlides.children.length;
        updateCarousel();
    });

    nextSlide.addEventListener('click', () => {
        currentSlide = (currentSlide + 1) % carouselSlides.children.length;
        updateCarousel();
    });

    // Cerrar carrusel al hacer clic en el botón de "X"
    closeCarousel.addEventListener('click', () => {
        carousel.classList.remove('active');
    });

    // Cerrar carrusel haciendo clic fuera del área
    carousel.addEventListener('click', (e) => {
        if (e.target === carousel) {
            carousel.classList.remove('active');
        }
    });

    // Navegación con teclado
    document.addEventListener('keydown', (e) => {
        if (!carousel.classList.contains('active')) return;
        if (e.key === 'ArrowLeft') prevSlide.click();
        if (e.key === 'ArrowRight') nextSlide.click();
        if (e.key === 'Escape') closeCarousel.click();
    });
});

function replaceImage(input, imageId) {
    const file = input.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            const imageWrapper = document.getElementById(`image-${imageId}`);
            const imgElement = imageWrapper.querySelector('img');
            imgElement.src = e.target.result; // Actualizar la imagen mostrada
        };
        reader.readAsDataURL(file);
    }
}

// Manejar la carga inicial de nuevas imágenes
window.handleImageUpload = function(event) {
    const files = event.target.files;
    const previewContainer = document.getElementById('image-preview-container');

    for (let file of files) {
        const reader = new FileReader();
        reader.onload = function(e) {
            const wrapper = document.createElement('div');
            wrapper.className = 'image-wrapper';
            wrapper.innerHTML = `
                <img src="${e.target.result}" alt="Nueva imagen">
                <button type="button" class="delete-img-btn" onclick="this.closest('.image-wrapper').remove()">
                    <i data-lucide="x" class="delete-icon"></i> Eliminar
                </button>
            `;
            previewContainer.appendChild(wrapper);
        };
        reader.readAsDataURL(file);
    }
}


//END