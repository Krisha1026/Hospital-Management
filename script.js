


window.addEventListener("scroll", function () {
    const navbar = document.querySelector(".navbar");
    if (window.scrollY > 20) {
        navbar.classList.add("sticky");
    } else {
        navbar.classList.remove("sticky");
    }

    
    const scrollUpBtn = document.querySelector(".scroll-up-btn");
    if (window.scrollY > 500) {
        scrollUpBtn.classList.add("show");
    } else {
        scrollUpBtn.classList.remove("show");
    }
});


document.querySelector(".scroll-up-btn").addEventListener("click", function () {
    window.scrollTo({ top: 0, behavior: "smooth" });
});


document.querySelector(".menu-btn").addEventListener("click", function () {
    const menu = document.querySelector(".navbar .menu");
    menu.classList.toggle("active"); 
    this.querySelector("i").classList.toggle("active"); 
});

// Typing Animation Script
function typeText(element, texts, speed, backSpeed, loop) {
    let currentTextIndex = 0;
    let currentCharIndex = 0;
    let isDeleting = false;

    function type() {
        const currentText = texts[currentTextIndex];

        if (isDeleting) {
            
            element.textContent = currentText.substring(0, currentCharIndex - 1);
            currentCharIndex--;
        } else {
            
            element.textContent = currentText.substring(0, currentCharIndex + 1);
            currentCharIndex++;
        }

        
        if (!isDeleting && currentCharIndex === currentText.length) {
            
            isDeleting = true;
            setTimeout(type, 1000); // Pause for 1 second
        } else if (isDeleting && currentCharIndex === 0) {
           
            isDeleting = false;
            currentTextIndex = (currentTextIndex + 1) % texts.length;
            setTimeout(type, 500); 
        } else {
            
            setTimeout(type, isDeleting ? backSpeed : speed);
        }
    }

    
    type();
}


const typingElement = document.querySelector(".typing");
const typingElement2 = document.querySelector(".typing-2");

const texts = [
    "24/7 Care",
    "Trusted Services",
    "Advanced Labs",
    "Online Appointments",
    "Expert Doctors",
    "Personalized Care"
];

typeText(typingElement, texts, 100, 60, true);
typeText(typingElement2, texts, 100, 60, true);




const carousel = document.querySelector(".carousel");
const cards = document.querySelectorAll(".carousel .card");
let currentIndex = 0;

function showNextCard() {
    cards[currentIndex].style.display = "none";
    currentIndex = (currentIndex + 1) % cards.length;
    cards[currentIndex].style.display = "block";
}



// Search Functionality
document.getElementById("searchButton").addEventListener("click", function () {
    const query = document.getElementById("searchInput").value.toLowerCase();
    const sections = document.querySelectorAll("section");

    sections.forEach(section => {
        const content = section.textContent.toLowerCase();
        if (content.includes(query)) {
            section.style.display = "block";
        } else {
            section.style.display = "none";
        }
    });
});




const doctorProfiles = [
    {
        name: "Dr. Kristen",
        specialty: "Chief Surgeon",
        experience: "15 years",
        description: "Chief Surgeon with over 15 years of experience in advanced surgical procedures and patient care.",
        img: "images/doctor1.jpg"
    },
    {
        name: "Dr. Harish",
        specialty: "Pediatrician",
        experience: "10 years",
        description: "Renowned Pediatrician dedicated to providing specialized healthcare for children and newborns.",
        img: "images/doctor5.jpg"
    },
    {
        name: "Nurse Lora",
        specialty: "Senior Nurse",
        experience: "12 years",
        description: "Senior Nurse ensuring top-quality patient care and post-operative recovery support.",
        img: "images/nurse.jpg"
    },
    {
        name: "Dr. Rebecca",
        specialty: "Pathologist",
        experience: "8 years",
        description: "Expert Pathologist conducting accurate lab diagnostics for precise medical treatment.",
        img: "images/doctor3.jpg"
    },
    {
        name: "Dr. Dilshan",
        specialty: "Pharmacist",
        experience: "7 years",
        description: "Experienced Pharmacist ensuring safe and effective medication management for all patients.",
        img: "images/doctor4.jpg"
    }
  ];
  
  function showProfile(index) {
    const profile = doctorProfiles[index];
    document.getElementById("doctor-name").textContent = profile.name;
    document.getElementById("doctor-specialty").textContent = `Specialty: ${profile.specialty}`;
    document.getElementById("doctor-experience").textContent = `Experience: ${profile.experience}`;
    document.getElementById("doctor-description").textContent = profile.description;
    document.getElementById("doctor-img").src = profile.img;
  }








