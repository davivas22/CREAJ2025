
 
 // Control del video promocional
        document.addEventListener('DOMContentLoaded', function() {
            const video = document.getElementById('promoVideo');
            const playButton = document.getElementById('playButton');
            const progressBar = document.getElementById('progressBar');

            if (video && playButton && progressBar) {
                playButton.addEventListener('click', function() {
                    if (video.paused) {
                        video.play();
                        playButton.innerHTML = `
                            <div class="w-20 h-20 flex items-center justify-center rounded-full bg-white/30 backdrop-blur-sm border-2 border-white group-hover:bg-white/40 transition-all duration-300">
                                <svg class="w-10 h-10 text-white" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zM7 8a1 1 0 012 0v4a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v4a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                </svg>
                            </div>`;
                    } else {
                        video.pause();
                        playButton.innerHTML = `
                            <div class="w-20 h-20 flex items-center justify-center rounded-full bg-white/30 backdrop-blur-sm border-2 border-white group-hover:bg-white/40 transition-all duration-300">
                                <svg class="w-10 h-10 text-white" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M6.3 2.841A1.5 1.5 0 004 4.11V15.89a1.5 1.5 0 002.3 1.269l9.344-5.89a1.5 1.5 0 000-2.538L6.3 2.84z" />
                                </svg>
                            </div>`;
                    }
                });

                video.addEventListener('timeupdate', function() {
                    const progress = (video.currentTime / video.duration) * 100;
                    progressBar.style.width = progress + '%';
                });

                video.addEventListener('ended', function() {
                    video.currentTime = 0;
                    playButton.innerHTML = `
                        <div class="w-20 h-20 flex items-center justify-center rounded-full bg-white/30 backdrop-blur-sm border-2 border-white group-hover:bg-white/40 transition-all duration-300">
                            <svg class="w-10 h-10 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M6.3 2.841A1.5 1.5 0 004 4.11V15.89a1.5 1.5 0 002.3 1.269l9.344-5.89a1.5 1.5 0 000-2.538L6.3 2.84z" />
                            </svg>
                        </div>`;
                });
            }

            // Efecto Parallax y animaciones al scroll
            const parallaxElements = document.querySelectorAll('.parallax-scroll');
            const animatedElements = document.querySelectorAll('.animate-on-scroll');
            
            // Función para manejar el efecto parallax
            function handleParallax() {
                parallaxElements.forEach(element => {
                    const scrolled = window.pageYOffset;
                    const rate = element.dataset.rate || 0.5;
                    const yPos = -(scrolled * rate);
                    element.style.transform = `translate3d(0px, ${yPos}px, 0px)`;
                });
            }

            // Función para manejar las animaciones al scroll
            function handleScrollAnimations() {
                animatedElements.forEach(element => {
                    const elementTop = element.getBoundingClientRect().top;
                    const elementBottom = element.getBoundingClientRect().bottom;
                    const windowHeight = window.innerHeight;

                    if (elementTop < windowHeight * 0.75 && elementBottom > 0) {
                        element.classList.add('animate-fade-in', 'animate-slide-up');
                    }
                });
            }

            // Event listeners
            window.addEventListener('scroll', () => {
                requestAnimationFrame(() => {
                    handleParallax();
                    handleScrollAnimations();
                });
            });

            // Iniciar animaciones
            handleScrollAnimations();
        });
    
    
        // Función para animar contadores
        function animateCounter(element, target, duration) {
            let start = 0;
            const increment = target / (duration / 16); // 16ms es aproximadamente 60fps
            const timer = setInterval(() => {
                start += increment;
                element.textContent = Math.floor(start);
                if (start >= target) {
                    element.textContent = target;
                    clearInterval(timer);
                }
            }, 16);
        }

        // Función para iniciar animación cuando el elemento es visible
        function handleIntersection(entries, observer) {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const container = entry.target;
                    const counter = container.querySelector('.counter');
                    const target = parseInt(container.dataset.count);
                    animateCounter(counter, target, 2000); // 2000ms = 2s duración
                    observer.unobserve(container); // Solo animar una vez
                }
            });
        }

        document.addEventListener('DOMContentLoaded', function() {
            // Configurar el Intersection Observer para los contadores
            const counterObserver = new IntersectionObserver(handleIntersection, {
                threshold: 0.5
            });

            // Observar todos los contenedores de estadísticas
            document.querySelectorAll('[data-count]').forEach(container => {
                counterObserver.observe(container);
            });

            // Slider personalizado
            // Inicializar Swiper para casas en tendencia
            const trendingSwiper = new Swiper('.trendingSwiper', {
                slidesPerView: 1,
                spaceBetween: 30,
                loop: true,
                speed: 1000,
                autoplay: {
                    delay: 3000,
                    disableOnInteraction: false,
                },
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
                effect: 'fade',
                fadeEffect: {
                    crossFade: true
                }
            });

            // Inicializar Swiper para testimonios
            const testimonialSwiper = new Swiper('.testimonialSwiper', {
                slidesPerView: 1,
                spaceBetween: 30,
                loop: true,
                autoplay: {
                    delay: 5000,
                    disableOnInteraction: false,
                },
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
                breakpoints: {
                    640: {
                        slidesPerView: 1,
                    },
                    768: {
                        slidesPerView: 2,
                        spaceBetween: 20,
                    },
                    1024: {
                        slidesPerView: 3,
                        spaceBetween: 30,
                    },
                },
            });
            
            // Inicializar gráficos
            const priceCtx = document.getElementById('priceChart').getContext('2d');
            const propertyTypeCtx = document.getElementById('propertyTypeChart').getContext('2d');
            
            // Datos iniciales para los gráficos
            const priceData = {
                labels: ['Santa Tecla', 'San Salvador', 'La Libertad', 'Antiguo Cuscatlán', 'Nuevo Cuscatlán'],
                datasets: [{
                    label: 'Precio promedio (USD)',
                    data: [250000, 180000, 320000, 290000, 210000],
                    backgroundColor: [
                        'rgba(186, 157, 121, 0.7)',
                        'rgba(186, 157, 121, 0.6)',
                        'rgba(186, 157, 121, 0.5)',
                        'rgba(186, 157, 121, 0.4)',
                        'rgba(186, 157, 121, 0.3)'
                    ],
                    borderColor: [
                        'rgba(94, 94, 94, 1)',
                        'rgba(94, 94, 94, 1)',
                        'rgba(94, 94, 94, 1)',
                        'rgba(94, 94, 94, 1)',
                        'rgba(94, 94, 94, 1)'
                    ],
                    borderWidth: 1
                }]
            };
            
            const propertyTypeData = {
                labels: ['Casas', 'Apartamentos', 'Terrenos', 'Comercial', 'Oficinas'],
                datasets: [{
                    label: 'Búsquedas (%)',
                    data: [45, 30, 15, 7, 3],
                    backgroundColor: [
                        'rgba(186, 157, 121, 0.8)',
                        'rgba(227, 205, 174, 0.8)',
                        'rgba(244, 244, 244, 0.8)',
                        'rgba(94, 94, 94, 0.8)',
                        'rgba(186, 157, 121, 0.6)'
                    ],
                    hoverOffset: 4
                }]
            };
            
            // Crear gráficos
            const priceChart = new Chart(priceCtx, {
                type: 'bar',
                data: priceData,
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'top',
                        },
                        title: {
                            display: true,
                            text: 'Precios promedio por zona (USD)'
                        }
                    }
                }
            });
            
            const propertyTypeChart = new Chart(propertyTypeCtx, {
                type: 'doughnut',
                data: propertyTypeData,
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'top',
                        },
                        title: {
                            display: true,
                            text: 'Distribución de búsquedas por tipo de propiedad'
                        }
                    }
                }
            });
            
            // Actualizar datos de gráficos al hacer clic en el botón
            document.getElementById('updateCharts').addEventListener('click', function() {
                // Generar datos aleatorios para simular actualización
                const newPriceData = priceData.datasets[0].data.map(() => 
                    Math.floor(Math.random() * 200000) + 100000
                );
                
                const newPropertyTypeData = propertyTypeData.datasets[0].data.map(() => 
                    Math.floor(Math.random() * 50) + 5
                );
                
                // Actualizar datos
                priceChart.data.datasets[0].data = newPriceData;
                propertyTypeChart.data.datasets[0].data = newPropertyTypeData;
                
                // Redibujar gráficos
                priceChart.update();
                propertyTypeChart.update();
                
                // Mostrar notificación
                alert('Datos actualizados con éxito');
            });
            
            // Juego de ruleta
            const wheel = document.getElementById('wheel');
            const spinButton = document.getElementById('spinWheel');
            const prizeMessage = document.getElementById('prizeMessage');
            const prizeText = document.getElementById('prizeText');
            const prizeCode = document.getElementById('prizeCode');
            
            const prizes = [
                { name: '5% de descuento', code: 'ENCASA5' },
                { name: '10% de descuento', code: 'ENCASA10' },
                { name: 'Asesoría gratuita', code: 'ASESORIA' },
                { name: 'Sin premio', code: 'INTENTALO' }
            ];
            
            let canSpin = true;
            
            spinButton.addEventListener('click', function() {
                if (!canSpin) return;
                
                canSpin = false;
                prizeMessage.classList.add('hidden');
                
                // Número aleatorio de rotaciones (entre 5 y 10 vueltas)
                const rotations = 5 + Math.floor(Math.random() * 5);
                
                // Ángulo aleatorio final (0-360)
                const finalAngle = Math.floor(Math.random() * 360);
                
                // Ángulo total
                const totalAngle = rotations * 360 + finalAngle;
                
                // Animar la ruleta
                wheel.style.transition = 'transform 4s cubic-bezier(0.1, 0.1, 0.1, 1)';
                wheel.style.transform = `rotate(${totalAngle}deg)`;
                
                // Determinar el premio basado en el ángulo final
                setTimeout(() => {
                    const normalizedAngle = finalAngle % 360;
                    let prizeIndex;
                    
                    if (normalizedAngle >= 0 && normalizedAngle < 90) {
                        prizeIndex = 0; // 5%
                    } else if (normalizedAngle >= 90 && normalizedAngle < 180) {
                        prizeIndex = 1; // 10%
                    } else if (normalizedAngle >= 180 && normalizedAngle < 270) {
                        prizeIndex = 2; // Asesoría
                    } else {
                        prizeIndex = 3; // Sin premio
                    }
                    
                    const prize = prizes[prizeIndex];
                    
                    // Mostrar el premio
                    prizeText.textContent = prize.name;
                    prizeCode.textContent = prize.code;
                    prizeMessage.classList.remove('hidden');
                    
                    // Permitir girar de nuevo después de un tiempo
                    setTimeout(() => {
                        canSpin = true;
                        wheel.style.transition = 'none';
                        wheel.style.transform = `rotate(${finalAngle}deg)`;
                    }, 1000);
                    
                }, 4000);
            });
            
            // Hero Slider
            const slides = document.querySelectorAll('#heroSlider [data-slide]');
            const indicators = document.querySelectorAll('.slider-indicator');
            const prevBtn = document.getElementById('prevSlide');
            const nextBtn = document.getElementById('nextSlide');
            let currentSlide = 0;
            const totalSlides = slides.length;
            
            function showSlide(index) {
                // Ocultar todos los slides
                slides.forEach(slide => {
                    slide.classList.remove('opacity-100');
                    slide.classList.add('opacity-0');
                });
                
                // Desactivar todos los indicadores
                indicators.forEach(indicator => {
                    indicator.classList.remove('bg-opacity-70', 'active');
                    indicator.classList.add('bg-opacity-40');
                });
                
                // Mostrar el slide actual
                slides[index].classList.remove('opacity-0');
                slides[index].classList.add('opacity-100');
                
                // Activar el indicador actual
                indicators[index].classList.remove('bg-opacity-40');
                indicators[index].classList.add('bg-opacity-70', 'active');
                
                currentSlide = index;
            }
            
            // Configurar botones de navegación
            prevBtn.addEventListener('click', () => {
                let newIndex = currentSlide - 1;
                if (newIndex < 0) newIndex = totalSlides - 1;
                showSlide(newIndex);
            });
            
            nextBtn.addEventListener('click', () => {
                let newIndex = currentSlide + 1;
                if (newIndex >= totalSlides) newIndex = 0;
                showSlide(newIndex);
            });
            
            // Configurar indicadores
            indicators.forEach((indicator, index) => {
                indicator.addEventListener('click', () => {
                    showSlide(index);
                });
            });
            
            // Autoplay
            let slideInterval = setInterval(() => {
                let newIndex = currentSlide + 1;
                if (newIndex >= totalSlides) newIndex = 0;
                showSlide(newIndex);
            }, 5000);
            
            // Pausar autoplay al interactuar con los controles
            const pauseAutoplay = () => {
                clearInterval(slideInterval);
                slideInterval = setInterval(() => {
                    let newIndex = currentSlide + 1;
                    if (newIndex >= totalSlides) newIndex = 0;
                    showSlide(newIndex);
                }, 5000);
            };
            
            prevBtn.addEventListener('click', pauseAutoplay);
            nextBtn.addEventListener('click', pauseAutoplay);
            indicators.forEach(indicator => {
                indicator.addEventListener('click', pauseAutoplay);
            });
            
            // Animaciones al scroll
            const animateOnScroll = () => {
                const elements = document.querySelectorAll('.grid > div, h2, p, .text-center > a');
                
                elements.forEach(element => {
                    const elementTop = element.getBoundingClientRect().top;
                    const windowHeight = window.innerHeight;
                    
                    if (elementTop < windowHeight * 0.85) {
                        element.classList.add('animate-fade-in');
                        element.style.opacity = '1';
                    }
                });
            };
            
            // Inicializar animaciones
            window.addEventListener('scroll', animateOnScroll);
            animateOnScroll(); // Ejecutar una vez al cargar la página
            
            // Menú móvil toggle
            const menuButton = document.getElementById('menuButton');
            const mobileMenu = document.getElementById('mobileMenu');
            
            if (menuButton && mobileMenu) {
                menuButton.addEventListener('click', () => {
                    mobileMenu.classList.toggle('hidden');
                });
            }
            
            // Navbar scroll effect
            const navbar = document.getElementById('navbar');
            
            window.addEventListener('scroll', () => {
                if (window.scrollY > 50) {
                    navbar.classList.add('bg-white', 'shadow-md');
                    navbar.classList.remove('bg-transparent');
                } else {
                    navbar.classList.remove('shadow-md');
                }
            });
        });
    