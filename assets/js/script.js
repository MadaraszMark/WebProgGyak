// DARK MODE TOGGLE
const pageBody = document.body;
const toggle = document.createElement('button');
toggle.innerText = "🌙";
toggle.title = "Sötét mód";
toggle.style.position = "fixed";
toggle.style.bottom = "20px";
toggle.style.right = "20px";
toggle.style.padding = "10px 14px";
toggle.style.border = "none";
toggle.style.borderRadius = "50%";
toggle.style.background = "#4f46e5";
toggle.style.color = "#fff";
toggle.style.fontSize = "1.2rem";
toggle.style.cursor = "pointer";
toggle.style.zIndex = "999";

toggle.onclick = () => {
    pageBody.classList.toggle('dark-mode');
    toggle.innerText = pageBody.classList.contains('dark-mode') ? "☀️" : "🌙";
};

document.body.appendChild(toggle);

// SMOOTH SCROLL
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener("click", function (e) {
        e.preventDefault();
        document.querySelector(this.getAttribute("href")).scrollIntoView({
            behavior: "smooth"
        });
    });
});

// LIGHTBOX a galériához
document.addEventListener("click", e => {
    if (e.target.tagName === "IMG" && e.target.closest(".gallery-grid")) {
        const src = e.target.getAttribute("src");
        const overlay = document.createElement("div");
        overlay.style.position = "fixed";
        overlay.style.top = 0;
        overlay.style.left = 0;
        overlay.style.width = "100vw";
        overlay.style.height = "100vh";
        overlay.style.background = "rgba(0,0,0,0.8)";
        overlay.style.display = "flex";
        overlay.style.alignItems = "center";
        overlay.style.justifyContent = "center";
        overlay.style.cursor = "zoom-out";
        overlay.style.zIndex = 1000;

        const img = document.createElement("img");
        img.src = src;
        img.style.maxWidth = "90%";
        img.style.maxHeight = "90%";
        img.style.borderRadius = "10px";
        img.style.boxShadow = "0 0 20px rgba(255,255,255,0.2)";

        overlay.appendChild(img);
        document.body.appendChild(overlay);

        overlay.addEventListener("click", () => {
            overlay.remove();
        });
    }
});

// FORM VALIDÁCIÓ - Kapcsolat űrlap
function validateContactForm() {
    var name = document.getElementById('name').value.trim();
    var email = document.getElementById('email').value.trim();
    var message = document.getElementById('message').value.trim();

    if (name === '' || email === '' || message === '') {
        alert('Kérlek, tölts ki minden mezőt!');
        return false;
    }

    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email)) {
        alert('Kérlek, adj meg egy érvényes email címet!');
        return false;
    }

    return true;
}
