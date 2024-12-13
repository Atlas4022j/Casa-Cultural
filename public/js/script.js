//Js de Modelo de Reservas
document.querySelectorAll('.primary-btn').forEach(button => { 
    button.addEventListener('click', function (e) {
        e.preventDefault();

        // Obtén el contenedor padre (room-item)
        const roomItem = this.closest('.room-item');

        // Captura los datos desde los atributos data-*
        const room = roomItem.dataset.room;
        const price = roomItem.dataset.price;
        const floor = roomItem.dataset.floor;
        const capacity = roomItem.dataset.capacity;

        // Construye la URL para redirigir con los parámetros
        const url = `/reserva-habitacion?room=${encodeURIComponent(room)}&price=${price}&floor=${floor}&capacity=${capacity}`;

        // Redirige a la URL generada
        window.location.href = url;
    });
});




