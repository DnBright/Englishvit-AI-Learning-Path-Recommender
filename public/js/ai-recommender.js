document.addEventListener('DOMContentLoaded', function () {
    const generateBtn = document.getElementById('generatePathBtn');
    const processingOverlay = document.getElementById('aiProcessingOverlay');
    const aiForm = document.getElementById('aiOnboardingForm');
    const aiResult = document.getElementById('aiResultSection');
    const ieltsSlider = document.getElementById('ieltsSlider');
    const ieltsValue = document.getElementById('ieltsScoreValue');

    // Simple option selection toggle
    document.querySelectorAll('.ai-select-box, .ai-time-box').forEach(box => {
        box.addEventListener('click', function () {
            const group = this.dataset.group;
            if (this.dataset.multi === 'true') {
                this.classList.toggle('active');
            } else {
                document.querySelectorAll(`.ai-select-box[data-group="${group}"], .ai-time-box[data-group="${group}"]`).forEach(b => b.classList.remove('active'));
                this.classList.add('active');
            }
        });
    });

    // IELTS Slider Update
    if (ieltsSlider && ieltsValue) {
        ieltsSlider.addEventListener('input', function () {
            ieltsValue.textContent = `Goal Score: ${parseFloat(this.value).toFixed(1)}`;
        });
    }

    if (generateBtn) {
        generateBtn.addEventListener('click', function () {
            // Capture selections
            const level = document.querySelector('.ai-select-box[data-group="level"].active')?.textContent.trim().split('\n')[0] || 'Beginner';
            const budget = document.querySelector('.ai-select-box[data-group="budget"].active')?.querySelector('.f-body2').textContent.trim() || 'Standar';
            const timeframe = document.querySelector('.ai-time-box[data-group="time"].active')?.textContent.trim() || '6 Months';

            // Show processing overlay
            processingOverlay.style.display = 'flex';

            // Simulate AI analysis
            setTimeout(() => {
                processingOverlay.style.display = 'none';
                aiForm.classList.add('d-none');
                aiResult.classList.remove('d-none');

                // Update result based on budget
                const intensityText = budget === 'Intensif' ? 'Very High (Personalized)' : (budget === 'Hemat' ? 'Balanced (Self-paced)' : 'High (Interactive)');
                const intensityElement = aiResult.querySelector('.center-text:last-child .fc-black-6');
                if (intensityElement) intensityElement.textContent = intensityText;

                const durationElement = aiResult.querySelector('.center-text:first-child .fc-black-6');
                if (durationElement) durationElement.textContent = timeframe;

                // Update Roadmap based on budget (Simulated)
                if (budget === 'Hemat') {
                    aiResult.querySelectorAll('.ai-roadmap-item .badge').forEach((badge, i) => {
                        if (i === 0) badge.textContent = 'Smart Book';
                        if (i === 1) badge.textContent = 'Learning Package';
                        if (i === 2) badge.textContent = 'IELTS AI Practice';
                    });
                } else if (budget === 'Intensif') {
                    aiResult.querySelectorAll('.ai-roadmap-item .badge').forEach((badge, i) => {
                        if (i === 0) badge.textContent = 'One on One';
                        if (i === 1) badge.textContent = 'Live Class (VIP)';
                        if (i === 2) badge.textContent = 'Comprehensive Test';
                    });
                }

                // Scroll to result
                aiResult.scrollIntoView({ behavior: 'smooth' });
            }, 3000);
        });
    }

    // Scroll back to form
    window.resetAIForm = function () {
        if (aiResult) aiResult.classList.add('d-none');
        if (aiForm) aiForm.classList.remove('d-none');
        if (aiForm) aiForm.scrollIntoView({ behavior: 'smooth' });
    }
});
