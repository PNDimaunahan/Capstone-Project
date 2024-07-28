document.addEventListener("DOMContentLoaded", function() {
  const carouselItems = document.querySelectorAll(".carousel-item");
  const indicatorContainer = document.querySelector(".indicators");
  let currentIndex = 0;
  const intervalTime = 7000; // Change slide every 3 seconds
  let slideInterval;

  function startSlide() {
    slideInterval = setInterval(() => {
      nextSlide();
    }, intervalTime);
  }

  function stopSlide() {
    clearInterval(slideInterval);
  }

  function showSlide(index) {
    carouselItems.forEach(item => {
      item.style.display = "none";
    });
    carouselItems[index].style.display = "block";
  }

  function nextSlide() {
    currentIndex++;
    if (currentIndex >= carouselItems.length) {
      currentIndex = 0;
    }
    updateIndicators();
    showSlide(currentIndex);
  }

  function prevSlide() {
    currentIndex--;
    if (currentIndex < 0) {
      currentIndex = carouselItems.length - 1;
    }
    updateIndicators();
    showSlide(currentIndex);
  }

  function createIndicators() {
    carouselItems.forEach((item, index) => {
      const indicator = document.createElement("span");
      indicator.classList.add("indicator");
      indicator.setAttribute("data-slide-to", index);
      indicator.addEventListener("click", () => {
        currentIndex = index;
        updateIndicators();
        showSlide(currentIndex);
        stopSlide();
        startSlide();
      });
      indicatorContainer.appendChild(indicator);
    });
    updateIndicators();
  }

  function updateIndicators() {
    const indicators = document.querySelectorAll(".indicator");
    indicators.forEach((indicator, index) => {
      if (index === currentIndex) {
        indicator.classList.add("active");
      } else {
        indicator.classList.remove("active");
      }
    });
  }

  showSlide(currentIndex);
  createIndicators();
  startSlide();
});


var accordionItems = document.querySelectorAll('.accordion-item');

accordionItems.forEach(function(item) {
  item.addEventListener('click', function() {
    var collapse = this.querySelector('.accordion-collapse');
    var isOpen = collapse.classList.contains('show');
    var accordionButton = this.querySelector('.accordion-button');
    
    // Toggle the 'show' class on the collapse element
    collapse.classList.toggle('show');
    
    // Toggle the 'collapsed' class on the accordion button
    if (accordionButton) {
      accordionButton.classList.toggle('collapsed', isOpen);
    }

    // Set aria-expanded attribute based on the collapse state
    if (accordionButton) {
      accordionButton.setAttribute('aria-expanded', isOpen ? 'false' : 'true');
    }
  });
});