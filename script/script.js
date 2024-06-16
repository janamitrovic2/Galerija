document.addEventListener('DOMContentLoaded', (event) => {
    const dropZone = document.getElementById('drop-zone');
    const preview = document.getElementById('preview');
    const dropZoneText = dropZone.querySelector('span');

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
        dropZoneText.textContent = 'Prevucite fajl ovde';
    });

    dropZone.addEventListener('drop', (e) => {
        e.preventDefault();
        e.stopPropagation();
        dropZone.classList.remove('dragover');
        dropZoneText.textContent = '';

        const files = e.dataTransfer.files;
        if (files.length > 0) {
            handleFiles(files);
        }
    });

    function handleFiles(files) {
        const validExtensions = ['image/jpeg', 'image/png', 'image/tiff'];
        preview.innerHTML = '';
        let validFiles = 0;

        const file = files;
        if (validExtensions.includes(file.type)) {
            validFiles++;
            const reader = new FileReader();
            reader.onload = (e) => {
                const img = document.createElement('img');
                img.src = e.target.result;
                preview.appendChild(img);
            };
            reader.readAsDataURL(file);
        }
        if (validFiles <= 0) {
            dropZoneText.textContent = 'Nema validnih fajlova, prihvatamo samo JPG, JPEG, PNG, ili TIFF fajlove';
        }
    }
});