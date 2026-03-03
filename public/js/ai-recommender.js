document.addEventListener('DOMContentLoaded', function () {
    const generateBtn = document.getElementById('generatePathBtn');
    const processingOverlay = document.getElementById('aiProcessingOverlay');
    const aiForm = document.getElementById('aiOnboardingForm');
    const aiResult = document.getElementById('aiResultSection');
    const aiCustomizer = document.getElementById('aiCustomizerSection');
    const ieltsSlider = document.getElementById('ieltsSlider');
    const ieltsValue = document.getElementById('ieltsScoreValue');
    const floatingCart = document.getElementById('aiFloatingCart');
    const totalPriceDisplay = document.getElementById('aiTotalPrice');

    // Atomic Items Data (Ketengan)
    const atomicItems = [
        { id: 'live-standard', name: 'Standard Live Class', price: 55000, category: 'live', icon: '🏫' },
        { id: 'live-ielts', name: 'Academic IELTS Live Sesi', price: 75000, category: 'live', icon: '🎓' },
        { id: 'module-skill', name: 'Single Skill Module (VOD)', price: 19000, category: 'module', icon: '📽️' },
        { id: 'quiz-daily', name: 'Daily Quiz Access (7D)', price: 10000, category: 'module', icon: '✍️' },
        { id: 'one-private', name: '1-on-1 Private Session', price: 125000, category: 'private', icon: '👤' },
        { id: 'test-prediction', name: 'IELTS Prediction Test', price: 95000, category: 'test', icon: '📜' },
        { id: 'essay-review', name: 'Writing Essay Review', price: 110000, category: 'test', icon: '📝' }
    ];

    let userCart = [];

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

    // --- STATE MANAGEMENT ---
    let currentStep = 1;
    const totalSteps = 6;
    let formData = {
        goal_category: '',
        level: '',
        ielts_goal: 7.0,
        weaknesses: [],
        time_commit: '',
        budget: '',
        timeline: ''
    };

    // --- DOM ELEMENTS ---
    const landingPage = document.getElementById('aiLandingPage');
    const assessmentContainer = document.getElementById('aiAssessmentContainer');
    const resultSection = document.getElementById('aiResultSection');
    const customizerSection = document.getElementById('aiCustomizerSection');

    const progressFill = document.getElementById('aiAssessmentProgress');
    const stepIndicator = document.getElementById('aiStepIndicator');
    const stepPercent = document.getElementById('aiStepPercent');

    // ieltsSlider and ieltsValue are already defined globally, but re-declared here for scope within the new flow
    // const ieltsSlider = document.getElementById('ieltsSlider'); // Already defined
    // const ieltsValue = document.getElementById('ieltsScoreValue'); // Already defined

    // --- NAVIGATION ---
    window.startAssessment = function () {
        landingPage.classList.add('d-none');
        assessmentContainer.classList.remove('d-none');
        updateStepUI();
    };

    window.assessmentNext = function () {
        if (currentStep < totalSteps) {
            currentStep++;
            updateStepUI();
        }
    };

    window.assessmentPrev = function () {
        if (currentStep > 1) {
            currentStep--;
            updateStepUI();
        }
    };

    function updateStepUI() {
        // Hide all steps
        document.querySelectorAll('.ai-step-view').forEach(step => step.classList.add('d-none'));

        // Show current step
        const currentView = document.getElementById(`aiStep${currentStep}`);
        if (currentView) currentView.classList.remove('d-none');

        // Update Progress Bar
        const percent = Math.round((currentStep / totalSteps) * 100);
        progressFill.style.width = `${percent}%`;
        stepPercent.textContent = `${percent}% Complete`;

        // Update Indicator Text
        const stepTitles = [
            "Goal Selection",
            "Current Level",
            "Weakness Area",
            "Time Commitment",
            "Budget Range",
            "Target Timeline"
        ];
        stepIndicator.textContent = `Step ${currentStep}: ${stepTitles[currentStep - 1]}`;

        // Navigation Buttons
        document.getElementById('aiPrevBtn').classList.toggle('d-none', currentStep === 1);
        document.getElementById('aiNextBtn').classList.toggle('d-none', currentStep === totalSteps);
        document.getElementById('aiFinishBtn').classList.toggle('d-none', currentStep !== totalSteps);
    }

    // --- SELECTION LOGIC ---
    document.querySelectorAll('.ai-select-box, .ai-time-box').forEach(box => {
        box.addEventListener('click', function () {
            const group = this.dataset.group;
            const val = this.dataset.val;
            const multi = this.dataset.multi === "true";

            if (!multi) {
                document.querySelectorAll(`[data-group="${group}"]`).forEach(b => b.classList.remove('active'));
                this.classList.add('active');
                formData[group] = val;

                // Special: Show IELTS slider if Academic is picked
                if (group === 'goal_category' && val === 'academic') {
                    document.getElementById('ieltsGoalContainer').classList.remove('d-none');
                } else if (group === 'goal_category') {
                    document.getElementById('ieltsGoalContainer').classList.add('d-none');
                }
            } else {
                this.classList.toggle('active');
                const actives = Array.from(document.querySelectorAll(`[data-group="${group}"].active`)).map(b => b.dataset.val);
                formData[group] = actives;
            }
        });
    });

    if (ieltsSlider) {
        ieltsSlider.addEventListener('input', function () {
            ieltsValue.textContent = `Goal Score: ${this.value}`;
            formData.ielts_goal = parseFloat(this.value);
        });
    }

    // --- PROCESSING & LOGIC ENGINE ---
    window.startAIAnalysis = function () {
        assessmentContainer.classList.add('d-none');
        processingOverlay.classList.remove('d-none');

        const details = document.getElementById('processingDetails');
        const stages = [
            "Calculating Goal Weight (30%)...",
            "Evaluating Level Gap (25%)...",
            "Mapping Weakness Bundle (20%)...",
            "Checking Budget Constraints (10%)...",
            "Finalizing Roadmap Strategy..."
        ];

        let i = 0;
        const interval = setInterval(() => {
            if (i < stages.length) {
                details.textContent = stages[i];
                i++;
            } else {
                clearInterval(interval);
                generatePersonalizedResults();
            }
        }, 800);
    };

    function generatePersonalizedResults() {
        processingOverlay.classList.add('d-none');
        resultSection.classList.remove('d-none');

        // Populate Summary
        document.getElementById('roadmapProfileSummary').textContent =
            `You are a ${formData.level || 'learner'} aiming for ${formData.goal_category || 'success'} in ${formData.timeline || 3} months.`;

        // The Logic Engine Calculation (Simulation for now)
        renderRoadmapTimeline();
    }

    function renderRoadmapTimeline() {
        const list = document.getElementById('aiRoadmapTimeline');
        list.innerHTML = '';

        // Mocking logic-based products
        const plan = [
            { month: 1, title: formData.goal_category === 'academic' ? "Grammar Mastery" : "Speaking Foundation", tag: "MODULE" },
            { month: 2, title: formData.weaknesses.includes('writing') ? "Writing Drill Bundle" : "Communication Skills", tag: "LIVE CLASS" },
            { month: 3, title: "Final Certification & Prep", tag: "ASSESSMENT" }
        ];

        plan.forEach(step => {
            const div = document.createElement('div');
            div.className = 'ai-roadmap-item mb-4';
            div.innerHTML = `
                <div class="d-flex align-center">
                    <div class="ai-roadmap-step">Month ${step.month}</div>
                    <div class="ai-roadmap-card flex-grow shadow-sm p-3 bg-white br-12 ml-3">
                        <div class="badge bg-info-1 fc-info-7 f-10 mb-2">${step.tag}</div>
                        <h6 class="fw-800 m-b-5">${step.title}</h6>
                    </div>
                </div>
            `;
            list.appendChild(div);
        });
    }

    // --- INTERFACE TO DASHBOARD ---
    window.purchasePlan = function () {
        alert("Plan Purchased! Integrating with your Dashboard...");
        // In a real app, this would hit an API and then redirect to the Dashboard View
    };

    window.switchToCustomizer = function () {
        resultSection.classList.add('d-none');
        customizerSection.classList.remove('d-none');
        // renderCustomizer(); (Reuse existing logic if applicable)
    };

    window.resetAIForm = function () {
        currentStep = 1;
        landingPage.classList.remove('d-none');
        assessmentContainer.classList.add('d-none');
        resultSection.classList.add('d-none');
        customizerSection.classList.add('d-none');
        document.querySelectorAll('.active').forEach(a => a.classList.remove('active'));
    };
    // The following functions are part of the original customizer logic,
    // which might be reused or adapted for the new `switchToCustomizer` function.
    // For now, they are kept as is, assuming `renderCustomizer` will be called from `switchToCustomizer`.

    function renderCustomizer() {
        const eceranList = document.getElementById('aiEceranList');
        const addonList = document.getElementById('aiAvailableAddons');
        eceranList.innerHTML = '';
        addonList.innerHTML = '';

        // Render Current Cart
        userCart.forEach((item, index) => {
            const div = document.createElement('div');
            div.className = 'ai-item-eceran';
            div.innerHTML = `
                <div class="ai-item-info">
                    <span class="f-20">${item.icon}</span>
                    <div>
                        <div class="fw-bold">${item.name}</div>
                        <div class="f-12 fc-black-5">${item.category}</div>
                    </div>
                </div>
                <div class="d-flex align-items-center gap-15">
                    <div class="ai-item-price">Rp ${item.price.toLocaleString('id-ID')}</div>
                    <button class="ai-btn-remove" onclick="removeFromCart(${index})">
                        <i class="material-icons f-14">close</i>
                    </button>
                </div>
            `;
            eceranList.appendChild(div);
        });

        // Render Available Addons
        atomicItems.filter(item => !userCart.find(c => c.id === item.id)).forEach(item => {
            const div = document.createElement('div');
            div.className = 'ai-item-eceran';
            div.innerHTML = `
                <div class="ai-item-info">
                    <span class="f-20">${item.icon}</span>
                    <div class="fw-bold">${item.name}</div>
                </div>
                <div class="d-flex align-items-center gap-15">
                    <div class="ai-item-price">Rp ${item.price.toLocaleString('id-ID')}</div>
                    <button class="ai-btn-add" onclick="addToCart('${item.id}')">Add</button>
                </div>
            `;
            addonList.appendChild(div);
        });

        updateTotalPrice();
        updateMentorAdvice();
        updatePathStrength();
    }

    window.addToCart = function (id) {
        const item = atomicItems.find(i => i.id === id);
        userCart.push({ ...item });
        renderCustomizer();
    };

    window.removeFromCart = function (index) {
        userCart.splice(index, 1);
        renderCustomizer();
    };

    function updateTotalPrice() {
        const total = userCart.reduce((sum, item) => sum + item.price, 0);
        totalPriceDisplay.textContent = `Rp ${total.toLocaleString('id-ID')}`;
    }

    function updatePathStrength() {
        const strengthFill = document.getElementById('aiStrengthFill');
        const strengthPercent = document.getElementById('aiStrengthPercent');
        const ieltsGoal = parseFloat(ieltsSlider.value);

        // Base strength
        let strength = 20;

        // Variety points (Category depth)
        const categories = new Set(userCart.map(item => item.category));
        strength += categories.size * 15;

        // Investment points
        const total = userCart.reduce((sum, item) => sum + item.price, 0);
        if (total > 150000) strength += 20;
        else if (total > 80000) strength += 10;

        // Cap at 100
        strength = Math.min(100, strength);

        // Update UI
        strengthFill.style.width = `${strength}%`;
        strengthPercent.textContent = `${strength}%`;

        // Pulse effect
        const container = document.getElementById('aiStrengthContainer');
        container.classList.remove('pulse');
        void container.offsetWidth; // Trigger reflow
        container.classList.add('pulse');

        updateBudgetAlignment(total);
    }

    function updateBudgetAlignment(total) {
        const budgetBadge = document.getElementById('aiBudgetAlignment');
        const budgetPreference = document.querySelector('.ai-select-box[data-group="budget"].active')?.querySelector('.f-body2').textContent.trim() || 'Standar';

        let status = "Strategic Choice";
        let badgeClass = "bg-info-1 fc-info-7";

        if (budgetPreference === 'Hemat') {
            if (total > 100000) {
                status = "Above Budget (Investment)";
                badgeClass = "bg-warning-1 fc-warning-7";
            } else {
                status = "Excellent Value";
                badgeClass = "bg-success-1 fc-success-7";
            }
        } else if (budgetPreference === 'Intensif') {
            if (total < 250000) {
                status = "Budget Left (Add more?)";
                badgeClass = "bg-purple-1 fc-purple-7";
            } else {
                status = "Professional Choice";
                badgeClass = "bg-info-1 fc-info-7";
            }
        } else { // Standar
            if (total > 200000) {
                status = "Premium Selection";
                badgeClass = "bg-purple-1 fc-purple-7";
            }
        }

        budgetBadge.textContent = status;
        budgetBadge.className = `badge ${badgeClass} f-10`;
    }

    function updateMentorAdvice() {
        const mentorBubble = document.getElementById('aiMentorAdvice');
        const mentorText = document.getElementById('aiMentorText');
        const hasGoal = parseFloat(ieltsSlider.value) >= 7.0;
        const hasTest = userCart.some(i => i.category === 'test');
        const hasLive = userCart.some(i => i.category === 'live' || i.category === 'private');

        if (hasGoal && !hasTest && userCart.length > 0) {
            mentorBubble.classList.remove('d-none');
            mentorText.textContent = "Targetmu 7.0+, tapi kamu belum mengambil simulasi test. Saya sarankan tambah 'IELTS Prediction Test' agar kita tahu progresmu!";
        } else if (userCart.length === 0) {
            mentorBubble.classList.remove('d-none');
            mentorText.textContent = "Halo Andi! Rakit belajarmu di bawah ini sesuai budgetmu ya. Ingat, minimal ambil 1 modul dasar agar progressmu lancar.";
        } else if (hasGoal && !hasLive) {
            mentorBubble.classList.remove('d-none');
            mentorText.textContent = "Untuk skor tinggi, interaksi dengan tutor (Live Class) sangat membantu lho. Coba tambah 1 sesi ke eceranmu!";
        } else {
            mentorBubble.classList.add('d-none');
        }
    }

    window.showFinalRoadmap = function () {
        aiCustomizer.classList.add('d-none');
        floatingCart.style.display = 'none';
        aiResult.classList.remove('d-none');

        // Populate final roadmap based on cart
        const roadmapContainer = aiResult.querySelector('.ai-roadmap');
        roadmapContainer.innerHTML = '';

        userCart.forEach((item, i) => {
            const div = document.createElement('div');
            div.className = 'ai-roadmap-item';
            div.innerHTML = `
                <div class="ai-roadmap-dot"></div>
                <div class="ai-card p-4">
                    <div class="d-flex-center-btw mb-2">
                        <h5 class="fw-bold mb-0">${item.name}</h5>
                        <span class="badge bg-info-1 fc-info-7">${item.category}</span>
                    </div>
                    <p class="f-body2 mb-0">Part of your custom #${(i + 1)} step in your journey.</p>
                </div>
            `;
            roadmapContainer.appendChild(div);
        });

        aiResult.scrollIntoView({ behavior: 'smooth' });
    }

    // Scroll back to form
    window.resetAIForm = function () {
        if (aiResult) aiResult.classList.add('d-none');
        if (aiCustomizer) aiCustomizer.classList.add('d-none');
        if (floatingCart) floatingCart.style.display = 'none';
        if (aiForm) aiForm.classList.remove('d-none');
        if (aiForm) aiForm.scrollIntoView({ behavior: 'smooth' });
    }
});
