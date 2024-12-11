const dropArea = document.getElementById('drop-area');
const fileInput = document.getElementById('file-input');
const output = document.getElementById('output');

// Mostrar el área activa al arrastrar
['dragenter', 'dragover'].forEach(eventName => {
    dropArea.addEventListener(eventName, (e) => {
        e.preventDefault();
        e.stopPropagation();
        dropArea.style.borderColor = 'blue';
    });
});

// Quitar estilo al salir del área
['dragleave', 'drop'].forEach(eventName => {
    dropArea.addEventListener(eventName, (e) => {
        e.preventDefault();
        e.stopPropagation();
        dropArea.style.borderColor = '#ccc';
    });
});

// Manejar el drop
dropArea.addEventListener('drop', (e) => {
    e.preventDefault();
    const files = e.dataTransfer.files;
    if (files.length > 0) {
        handleFileUpload(files[0]);
    }
});

// Manejar clic en el área
dropArea.addEventListener('click', () => fileInput.click());

// Manejar archivo seleccionado
fileInput.addEventListener('change', (e) => {
    const file = e.target.files[0];
    if (file) {
        handleFileUpload(file);
    }
});

// Subir archivo
function handleFileUpload(file) {
    const formData = new FormData();
    formData.append('file', file);

    fetch('upload.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            output.innerHTML = `Archivo procesado con éxito. <a href="${data.outputFile}" target="_blank">Descargar PDF modificado</a>`;
        } else {
            output.textContent = `Error: ${data.message}`;
        }
    })
    .catch(err => {
        output.textContent = `Error al procesar el archivo: ${err}`;
    });
}
