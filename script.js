document.getElementById("spin-button").addEventListener("click", function() {
    var roulette = document.querySelector(".roulette");
    var segments = document.querySelectorAll(".segment");
    
    // Número de giros aleatorios (mínimo 3, máximo 6)
    var spins = Math.floor(Math.random() * 3) + 3;
    
    // Ángulo aleatorio adicional para determinar el premio
    var angle = Math.floor(Math.random() * 360);

    // Ángulo total de giro
    var totalAngle = spins * 360 + angle;
    
    // Determinar el premio basado en el ángulo final
    var prizeIndex = Math.floor((angle % 360) / 90); // 90 grados por segmento
    var prize = segments[prizeIndex].textContent;

    // Animación de giro
    roulette.style.transition = "transform 3s ease-out";
    roulette.style.transform = `rotate(${totalAngle}deg)`;

    // Mostrar el resultado después de la animación
    setTimeout(function() {
        document.getElementById("result").textContent = `¡Ganaste $${prize}!`;
    }, 3000);
});
