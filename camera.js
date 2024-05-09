const webcamElement = document.getElementById('camera-container');
const captureButton = document.getElementById('capture-button');
const capturedImage = document.getElementById('captured-img');
const legibleCheckbox = document.getElementById('legible-check');
const submitButton = document.getElementById('submit-button');

let webcamStream = null;

function startWebcam() {
    if (navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
        navigator.mediaDevices.getUserMedia({ video: true })
            .then(stream => {
                webcamStream = stream;
                const videoElement = document.createElement('video');
                videoElement.id = 'camera-stream';
                videoElement.srcObject = stream;
                videoElement.play();
                webcamElement.appendChild(videoElement);
                console.log("Camera access granted");
            })
            .catch(err => console.error("Error accessing camera:", err));
    } else {
        alert("Your browser doesn't support webcam access.");
    }
}

startWebcam();

legibleCheckbox.addEventListener('change', () => {
    submitButton.disabled = !legibleCheckbox.checked;
});
captureButton.addEventListener('click', () => {
    const videoElement = document.getElementById('camera-stream');
    const canvas = document.createElement('canvas');
    const ctx = canvas.getContext('2d');
    canvas.width = videoElement.videoWidth;
    canvas.height = videoElement.videoHeight;
    ctx.drawImage(videoElement, 0, 0, canvas.width, canvas.height);
    capturedImage.width = canvas.width;
    capturedImage.height = canvas.height;
    capturedImage.getContext('2d').drawImage(canvas, 0, 0);
    capturedImage.style.display = 'block';
});

// Submit check information and captured image data (backend integration)
submitButton.addEventListener('click', () => {
    const accountName = document.getElementById('account-name').value;
    const date = document.getElementById('date').value;
    const amount = document.getElementById('amount').value;
    const payee = document.getElementById('payee').value;
    const checkNumber = document.getElementById('check-number').value;
    const capturedImageData = capturedImage.toDataURL(); // Get data URL of captured image

    // Send data to server using Fetch API (or other methods)
    fetch('/submit-check', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json' // Assuming JSON format
        },
        body: JSON.stringify({
            accountName,
            date,
            amount,
            payee,
            checkNumber,
            capturedImageData
        })
    })
        .then(response => {
            if (response.ok) {
                console.log("Check information submitted successfully!");
                // Handle successful submission (e.g., clear form, show confirmation)
            } else {
                console.error("Error submitting check information:", response.statusText);
                // Handle submission error (e.g., display error message)
            }
        })
        .catch(err => console.error("Error sending data:", err));
});