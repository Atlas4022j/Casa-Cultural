document.addEventListener('DOMContentLoaded', function() {
    const container = document.querySelector('.rd-container');
    const modal = document.getElementById('rd-image-modal');
    const modalImg = document.getElementById('rd-modal-image');
    const closeButton = document.getElementsByClassName('rd-close-button')[0];
    const prevButton = document.getElementById('rd-prev-button');
    const nextButton = document.getElementById('rd-next-button');
    const imagesGrid = document.getElementById('rd-images-grid');
    let images = [];
    let currentImageIndex = 0;
  
    if (container) {
      container.style.display = 'block';
      container.style.visibility = 'visible';
    }
  
    // Function to load images
    function loadImages(imageUrls) {
      images = imageUrls;
      imagesGrid.innerHTML = '';
      images.forEach((url, index) => {
        const imageCard = document.createElement('div');
        imageCard.className = 'rd-image-card';
        const img = document.createElement('img');
        img.src = url;
        img.alt = `Imagen de la habitación ${index + 1}`;
        img.className = 'rd-room-image';
        img.dataset.index = index;
        imageCard.appendChild(img);
        imagesGrid.appendChild(imageCard);
  
        img.addEventListener('click', function() {
          openModal(this.src, parseInt(this.dataset.index));
        });
      });
    }
  
    // Call this function with your image URLs
    // loadImages(['url1.jpg', 'url2.jpg', 'url3.jpg']);
  
    const fadeInSections = document.querySelectorAll('.rd-fade-in-section');
    const observerOptions = {
      root: null,
      rootMargin: '0px',
      threshold: 0.1
    };
  
    const observer = new IntersectionObserver((entries, observer) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.add('rd-appear');
          entry.target.classList.add('rd-animate-fade-in');
          entry.target.style.visibility = 'visible';
          observer.unobserve(entry.target);
        }
      });
    }, observerOptions);
  
    fadeInSections.forEach(section => {
      section.style.visibility = 'visible';
      observer.observe(section);
    });
  
    function openModal(src, index) {
      modal.style.display = 'block';
      setTimeout(() => modal.classList.add('show'), 10);
      modalImg.src = src;
      currentImageIndex = index;
      updateNavigationButtons();
    }
  
    function closeModal() {
      modal.classList.remove('show');
      setTimeout(() => {
        modal.style.display = 'none';
        modalImg.src = '';
      }, 300);
    }
  
    function navigateImage(direction) {
      currentImageIndex = (currentImageIndex + direction + images.length) % images.length;
      modalImg.style.opacity = '0';
      setTimeout(() => {
        modalImg.src = images[currentImageIndex];
        modalImg.style.opacity = '1';
      }, 300);
      updateNavigationButtons();
    }
  
    function updateNavigationButtons() {
      prevButton.style.display = images.length > 1 ? 'block' : 'none';
      nextButton.style.display = images.length > 1 ? 'block' : 'none';
    }
  
    closeButton.addEventListener('click', closeModal);
    prevButton.addEventListener('click', () => navigateImage(-1));
    nextButton.addEventListener('click', () => navigateImage(1));
  
    modal.addEventListener('click', function(event) {
      if (event.target === modal) {
        closeModal();
      }
    });
  
    document.addEventListener('keydown', function(event) {
      if (modal.classList.contains('show')) {
        if (event.key === 'ArrowLeft') {
          navigateImage(-1);
        } else if (event.key === 'ArrowRight') {
          navigateImage(1);
        } else if (event.key === 'Escape') {
          closeModal();
        }
      }
    });
  
    window.addEventListener('resize', () => {
      if (modal.classList.contains('show')) {
        updateModalImageSize();
      }
    });
  
    function updateModalImageSize() {
      const img = modalImg;
      const containerWidth = modal.clientWidth * 0.9;
      const containerHeight = modal.clientHeight * 0.9;
      const imgRatio = img.naturalWidth / img.naturalHeight;
      const containerRatio = containerWidth / containerHeight;
  
      if (imgRatio > containerRatio) {
        img.style.width = containerWidth + 'px';
        img.style.height = 'auto';
      } else {
        img.style.height = containerHeight + 'px';
        img.style.width = 'auto';
      }
    }
  
    // Function to load room details
    function loadRoomDetails(details) {
      document.getElementById('rd-room-id').textContent = details.id;
      document.getElementById('rd-room-number').textContent = details.numero_habitacion;
      document.getElementById('rd-room-type').textContent = details.tipo_habitacion;
      document.getElementById('rd-room-price').textContent = `S/ ${details.precio.toFixed(2)}`;
      document.getElementById('rd-room-description').textContent = details.descripcion || 'No especificada';
      
      const statusElement = document.getElementById('rd-room-status');
      statusElement.textContent = details.estado ? 'Disponible' : 'No Disponible';
      statusElement.className = `rd-badge rd-${details.estado ? 'available' : 'unavailable'}`;
  
      // Load images
      loadImages(details.imagenes);
    }
  
    // Example usage:
    // loadRoomDetails({
    //   id: 1,
    //   numero_habitacion: '101',
    //   tipo_habitacion: 'Suite',
    //   precio: 150.00,
    //   descripcion: 'Una hermosa suite con vista al mar',
    //   estado: true,
    //   imagenes: ['url1.jpg', 'url2.jpg', 'url3.jpg']
    // });
  
    setTimeout(() => {
      window.dispatchEvent(new Event('resize'));
    }, 100);
  });
  
  