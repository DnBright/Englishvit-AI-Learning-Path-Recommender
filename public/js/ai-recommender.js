document.addEventListener('DOMContentLoaded', function() {
    const generateBtn = document.getElementById('generatePathBtn');
    const processingOverlay = document.getElementById('aiProcessingOverlay');
    const aiForm = document.getElementById('aiOnboardingForm');
    const aiResult = document.getElementById('aiResultSection');

    // Simple option selection toggle
    document.querySelectorAll('.ai-select-box').forEach(box => {
        box.addEventListener('click', function() {
            const group = this.dataset.group;
            if (this.dataset.multi === 'true') {
                this.classList.toggle('active');
            } else {
                document.querySelectorAll(`.ai-select-box[data-group="${group}"]`).forEach(b => b.classList.remove('active'));
                this.classList.add('active');
            }
        });
    });

    if (generateBtn) {
        generateBtn.addEventListener('click', function() {
            // Show processing overlay
            processingOverlay.style.display = 'flex';
            
            // Simulate AI analysis
            setTimeout(() => {
                processingOverlay.style.display = 'none';
                aiForm.classList.add('d-none');
                aiResult.classList.remove('d-none');
                
                // Scroll to result
                aiResult.scrollIntoView({ behavior: 'smooth' });
            }, 3000);
        });
    }

    // Scroll back to form
    window.resetAIForm = function() {
        aiResult.classList.add('d-none');
        aiForm.classList.remove('d-none');
        aiForm.scrollIntoView({ behavior: 'smooth' });
    }
});
