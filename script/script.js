document.addEventListener('DOMContentLoaded', (event) => {
    const dropZone = document.getElementById('drop-zone');
    const preview = document.getElementById('preview');
    const dropZoneText = dropZone.querySelector('span');
    const upozorenja = document.getElementById('upozorenja');
    const reset = document.getElementById('reset');

    reset.addEventListener('click', () => {
        upozorenja.innerHTML="";
    });
    
    const fileInput = document.getElementById('slika');
    fileInput.addEventListener('change', (e) => {
        const file = e.target.files[0]; // Uzmi samo prvi fajl
        handleFile(file);
    });

    dropZone.addEventListener('dragover', (e) => {
        e.preventDefault();
        e.stopPropagation();
        dropZone.classList.add('dragover');
        dropZoneText.textContent = 'Otpustite fajl ovde';
    });

    dropZone.addEventListener('dragleave', (e) => {
        e.preventDefault();
        e.stopPropagation();
        dropZone.classList.remove('dragover');
        dropZoneText.textContent = '... ili prevucite fajl ovde';
    });


    dropZone.addEventListener('drop', (e) => {
        e.preventDefault();
        e.stopPropagation();
        dropZone.classList.remove('dragover');
        dropZoneText.textContent = '';

        const files = e.dataTransfer.files;
        if (files.length > 0) {
            const file = files[0]; // Uzmi samo prvi fajl
            handleFile(file);
        }
    });
    


    // NISTA DOLE NE RADI

    

    function handleFile(file) {
        const validExtensions = ['image/jpeg', 'image/png', 'image/jpg', 'image/tiff'];
        preview.innerHTML = ''; // Očisti prethodni prikaz ako postoji
    
        if (validExtensions.includes(file.type)) 
        {

            if(file.size<=5-1024*1024)
            {
                const reader = new FileReader();
                reader.onload = (e) => {
                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.className = 'img-fluid'; 
                    preview.appendChild(img);
                }
            reader.readAsDataURL(file);
            
            }
            else
            {
                dropZoneText.textContent = 'Slika prelazi 5MB.';
            }
            
        } 
        else {
            dropZoneText.textContent = 'Slika nije jpg/jpeg/png/gif formata.';
        }
    }

    
});