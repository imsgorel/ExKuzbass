window.onload = function() {
        const mainBlock = document.getElementById('MainBlock');
        const mainTitle = document.getElementById('MainTitle');
        mainBlock.style.opacity = 1;
        mainTitle.style.opacity = 1;
}
document.querySelectorAll('.excursion-image').forEach(image => {
        image.addEventListener('click', function() {
            const modal = document.getElementById('modal');
            const modalImg = document.getElementById('modal-img');
            modal.style.display = 'flex';
            modalImg.src = this.src;
            modalImg.style.opacity = 1;
        });
    });
    
    document.getElementById('close').addEventListener('click', function() {
        const modal = document.getElementById('modal');
        modal.style.display = 'none';
    });
    
    window.addEventListener('click', function(event) {
        const modal = document.getElementById('modal');
        if (event.target === modal) {
            modal.style.display = 'none';
        }
    });
    