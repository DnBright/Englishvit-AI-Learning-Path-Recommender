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

    // Atomic Items Data (Ketengan) with Tags for Logic Engine
    const atomicItems = [
        {
            id: 'live-standard', name: 'Standard Live Class', price: 55000, category: 'live', icon: '🏫',
            tags: { goal: ['conversation', 'career'], level: ['beginner', 'intermediate'], weakness: ['speaking', 'listening'], time: ['mid', 'high'], budget: ['standar', 'premium', 'intensive'] }
        },
        {
            id: 'live-ielts', name: 'Academic IELTS Live Sesi', price: 75000, category: 'live', icon: '🎓',
            tags: { goal: ['academic', 'study_abroad'], level: ['intermediate', 'advanced'], weakness: ['speaking', 'writing', 'listening', 'grammar'], time: ['high', 'professional'], budget: ['premium', 'intensive'] }
        },
        {
            id: 'module-skill', name: 'Single Skill Module (VOD)', price: 19000, category: 'module', icon: '📽️',
            tags: { goal: ['academic', 'career', 'conversation', 'study_abroad'], level: ['beginner', 'intermediate', 'advanced'], weakness: ['speaking', 'writing', 'listening', 'grammar'], time: ['low', 'mid'], budget: ['hemat', 'standar', 'premium', 'intensive'] }
        },
        {
            id: 'quiz-daily', name: 'Daily Quiz Access (7D)', price: 10000, category: 'module', icon: '✍️',
            tags: { goal: ['academic', 'career', 'conversation', 'study_abroad'], level: ['beginner', 'intermediate', 'advanced'], weakness: ['grammar', 'listening'], time: ['low', 'mid', 'high', 'professional'], budget: ['hemat', 'standar', 'premium', 'intensive'] }
        },
        {
            id: 'one-private', name: '1-on-1 Private Session', price: 125000, category: 'private', icon: '👤',
            tags: { goal: ['academic', 'career', 'conversation', 'study_abroad'], level: ['beginner', 'intermediate', 'advanced'], weakness: ['speaking', 'writing'], time: ['high', 'professional'], budget: ['premium', 'intensive'] }
        },
        {
            id: 'test-prediction', name: 'IELTS Prediction Test', price: 95000, category: 'test', icon: '📜',
            tags: { goal: ['academic', 'study_abroad'], level: ['intermediate', 'advanced'], weakness: ['speaking', 'writing', 'listening', 'grammar'], time: ['mid', 'high', 'professional'], budget: ['standar', 'premium', 'intensive'] }
        },
        {
            id: 'essay-review', name: 'Writing Essay Review', price: 110000, category: 'test', icon: '📝',
            tags: { goal: ['academic', 'study_abroad'], level: ['intermediate', 'advanced'], weakness: ['writing'], time: ['mid', 'high'], budget: ['premium', 'intensive'] }
        }
    ];

    let userCart = [];

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

    // --- INTERACTIVE CALENDAR STATE ---
    let customSchedule = {}; // Key: "m-w-d", Value: [activityType, ...]
    let currentMonthView = 1;


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
            "Pemilihan Tujuan",
            "Level Saat Ini",
            "Area Kesulitan",
            "Komitmen Waktu",
            "Rentang Anggaran",
            "Target Waktu"
        ];
        stepIndicator.textContent = `Langkah ${currentStep}: ${stepTitles[currentStep - 1]}`;

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
            ieltsValue.textContent = `Target Skor: ${this.value}`;
            formData.ielts_goal = parseFloat(this.value);
        });
    }

    // --- PROCESSING & LOGIC ENGINE ---
    window.startAIAnalysis = function () {
        assessmentContainer.classList.add('d-none');
        processingOverlay.classList.remove('d-none');

        const details = document.getElementById('processingDetails');
        const stages = [
            "Menghitung Bobot Tujuan (30%)...",
            "Mengevaluasi Kesenjangan Level (25%)...",
            "Memetakan Bundel Kesulitan (20%)...",
            "Memeriksa Batasan Anggaran (10%)...",
            "Menyelesaikan Strategi Roadmap..."
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

    function calculateMatchScore(item, data) {
        let goalScore = item.tags.goal.includes(data.goal_category) ? 100 : 0;
        let levelScore = item.tags.level.includes(data.level) ? 100 : 0;

        // Weakness evaluation (partial matching allowed)
        let weaknessScore = 0;
        if (data.weaknesses && data.weaknesses.length > 0) {
            const matches = data.weaknesses.filter(w => item.tags.weakness.includes(w));
            weaknessScore = matches.length > 0 ? 100 : 0;
        }

        let timeScore = item.tags.time.includes(data.time_commit) ? 100 : 0;
        let budgetScore = item.tags.budget.includes(data.budget) ? 100 : 0;

        // Weighting Formula
        // Score = (Goal * 30%) + (Level * 25%) + (Weakness * 20%) + (Time * 15%) + (Budget * 10%)
        let totalScore = (goalScore * 0.30) + (levelScore * 0.25) + (weaknessScore * 0.20) + (timeScore * 0.15) + (budgetScore * 0.10);
        return Math.round(totalScore);
    }

    function generatePersonalizedResults() {
        processingOverlay.classList.add('d-none');
        resultSection.classList.remove('d-none');

        // Populate Summary
        const goalTexts = { academic: 'Persiapan IELTS/TOEFL', career: 'Pertumbuhan Karir', conversation: 'Percakapan Harian', study_abroad: 'Studi ke Luar Negeri' };
        const levelTexts = { beginner: 'Pemula', intermediate: 'Menengah', advanced: 'Lanjutan' };
        document.getElementById('roadmapProfileSummary').textContent =
            `Anda adalah seorang ${levelTexts[formData.level] || 'pelajar'} yang menargetkan ${goalTexts[formData.goal_category] || 'kesuksesan'} dalam ${formData.timeline || 3} bulan.`;

        // The Logic Engine Calculation
        let recommendations = atomicItems.map(item => {
            return {
                ...item,
                matchScore: calculateMatchScore(item, formData)
            };
        }).sort((a, b) => b.matchScore - a.matchScore);

        // Core Recommendations (> 65%)
        let coreRecs = recommendations.filter(r => r.matchScore >= 65);
        if (coreRecs.length === 0) coreRecs = recommendations.slice(0, 2); // Fallback

        // Initialize user cart with core recommendations
        userCart = [...coreRecs];

        // Calculate Total Price & Savings
        const totalPrice = coreRecs.reduce((sum, item) => sum + item.price, 0);
        const savings = Math.round(totalPrice * 0.15); // Simulated 15% discount for bundle

        document.getElementById('resultTotalPrice').textContent = `Rp ${totalPrice.toLocaleString('id-ID')}`;
        document.getElementById('resultSavings').textContent = `${savings.toLocaleString('id-ID')}`;

        renderRoadmapTimeline(coreRecs, recommendations);
    }

    function generateDetailedSchedule(cartItems, timelineMonths) {
        let scheduleHTML = '';
        const totalMonths = parseInt(timelineMonths) || 1;

        scheduleHTML += `
            <div class="m-b-30 d-flex-center-btw flex-wrap gap-15 ai-roadmap-controls">
                <div>
                    <h4 class="fw-800 m-b-5">📅 Kalender Roadmap Belajar</h4>
                    <p class="f-13 fc-black-5 mb-0">Rencana personal Anda. <strong>Klik hari untuk kustomisasi jadwal!</strong></p>
                </div>
                <div class="d-flex align-center gap-15 bg-white p-2 border-radius-12 shadow-sm border">
                    <button class="btn btn-sm btn-icon-round bg-purple-1 fc-purple-7" onclick="changeMonthView(-1)" title="Bulan Sebelumnya">
                        <i class="material-icons f-18">chevron_left</i>
                    </button>
                    <div class="text-center px-2" style="min-width: 100px;">
                        <span class="f-11 fw-700 fc-black-4 d-block text-uppercase">Tampilan</span>
                        <span class="fw-800 f-15 fc-purple-7" id="currentMonthLabel">Bulan ${currentMonthView}</span>
                    </div>
                    <button class="btn btn-sm btn-icon-round bg-purple-1 fc-purple-7" onclick="changeMonthView(1)" title="Bulan Berikutnya">
                        <i class="material-icons f-18">chevron_right</i>
                    </button>
                </div>
            </div>
            <div class="ai-month-slider-container">
        `;

        const dayLabels = ['Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab', 'Min'];

        for (let m = 1; m <= totalMonths; m++) {
            const isVisible = m === currentMonthView ? '' : 'd-none';
            scheduleHTML += `
                <div class="ai-month-slide ${isVisible}" id="monthSlide-${m}">
                    <div class="calendar-header-main">
                        <span class="f-16 fw-800">Bulan Belajar ${m}</span>
                        <p class="f-12 fc-black-4 m-0">Satu langkah lebih dekat ke target Anda!</p>
                    </div>
                    <table class="ai-calendar-table">
                        <thead>
                            <tr>
                                <th class="week-hdr">Wk</th>
                                ${dayLabels.map(label => `<th>${label}</th>`).join('')}
                            </tr>
                        </thead>
                        <tbody>
            `;

            for (let w = 0; w < 4; w++) {
                scheduleHTML += '<tr>';
                // Week number indicator
                scheduleHTML += `<td class="week-num-col">Minggu<br>${w + 1}</td>`;

                for (let d = 0; d < 7; d++) {
                    const dayKey = `${m}-${w}-${d}`;
                    let dayContent = '';

                    // Use custom schedule if exists, otherwise fallback to AI logic
                    if (customSchedule[dayKey]) {
                        customSchedule[dayKey].forEach(type => {
                            const icon = type === 'live' ? '🏫' : (type === 'private' ? '👤' : (type === 'module' ? '📽️' : '📜'));
                            const label = type === 'live' ? 'Live' : (type === 'private' ? 'Private' : (type === 'module' ? 'Focus' : 'Test'));
                            const time = type === 'live' ? '19:00' : (type === 'private' ? '10:00' : (type === 'module' ? '09:00' : '08:00'));
                            dayContent += `<div class="calendar-slot-available ${type}" onclick="event.stopPropagation(); toggleActivity('${dayKey}', '${type}')">
                                <span class="slot-time">${time} WIB</span>
                                <span class="slot-label">${icon} ${label}</span>
                            </div>`;
                        });
                    } else {
                        cartItems.forEach(item => {
                            if (item.category === 'live') {
                                // Distributed: Tuesday, Thursday, Saturday
                                if (d === 1 || d === 3 || d === 5) dayContent += `<div class="calendar-slot-available live" title="${item.name}" onclick="event.stopPropagation(); toggleActivity('${dayKey}', 'live')">
                                    <span class="slot-time">19:00 WIB</span>
                                    <span class="slot-label">${item.icon} Live Class</span>
                                </div>`;
                            } else if (item.category === 'private') {
                                // Distributed: Sunday
                                if (d === 6) dayContent += `<div class="calendar-slot-available private" title="${item.name}" onclick="event.stopPropagation(); toggleActivity('${dayKey}', 'private')">
                                    <span class="slot-time">10:00 WIB</span>
                                    <span class="slot-label">${item.icon} Private</span>
                                </div>`;
                            } else if (item.category === 'module') {
                                // Distributed: Monday, Wednesday, Friday
                                if (d === 0 || d === 2 || d === 4) dayContent += `<div class="calendar-slot-available module" title="${item.name}" onclick="event.stopPropagation(); toggleActivity('${dayKey}', 'module')">
                                    <span class="slot-time">09:00 WIB</span>
                                    <span class="slot-label">${item.icon} Materi</span>
                                </div>`;
                            } else if (item.category === 'test') {
                                // Distributed: Sunday (Week 1 and 3)
                                if ((w === 0 || w === 2) && d === 6) dayContent += `<div class="calendar-slot-available test" title="${item.name}" onclick="event.stopPropagation(); toggleActivity('${dayKey}', 'test')">
                                    <span class="slot-time">08:00 WIB</span>
                                    <span class="slot-label">${item.icon} Quiz</span>
                                </div>`;
                            }
                        });
                    }

                    const hasActivityClass = dayContent !== '' ? 'has-activity' : 'is-empty';
                    const hoverTitle = dayContent !== '' ? 'Klik untuk edit' : 'Klik untuk tambah jadwal';

                    scheduleHTML += `
                        <td class="day-cell ${hasActivityClass}" onclick="openDayEditor('${dayKey}')" title="${hoverTitle}">
                            <div class="day-activities">${dayContent}</div>
                        </td>
                    `;
                }
                scheduleHTML += '</tr>';
            }

            scheduleHTML += `
                        </tbody>
                    </table>
                    <div class="ai-legend-wrapper m-t-25">
                        <div class="f-12 fw-800 m-b-15 fc-black-6 text-uppercase letter-spacing-1">
                            <i class="material-icons f-14 v-middle m-r-5">info_outline</i> Panduan Jenis Kegiatan
                        </div>
                        <div class="ai-legend-grid">
                            <div class="ai-legend-card live">
                                <div class="icon">🏫</div>
                                <div class="info">
                                    <span class="title">Live Class</span>
                                    <p class="desc">Kelas interaktif tatap muka via Zoom dengan Tutor Expert (1.5 Jam).</p>
                                </div>
                            </div>
                            <div class="ai-legend-card private">
                                <div class="icon">👤</div>
                                <div class="info">
                                    <span class="title">Privat</span>
                                    <p class="desc">Sesi 1-on-1 intensif untuk konsultasi personal & koreksi (1 Jam).</p>
                                </div>
                            </div>
                            <div class="ai-legend-card module">
                                <div class="icon">📽️</div>
                                <div class="info">
                                    <span class="title">Materi / Focus</span>
                                    <p class="desc">Belajar mandiri via platform video & latihan modul pilihan.</p>
                                </div>
                            </div>
                            <div class="ai-legend-card test">
                                <div class="icon">📜</div>
                                <div class="info">
                                    <span class="title">Quiz / Test</span>
                                    <p class="desc">Ukur progres Anda dengan tes berkala setiap 2 minggu sekali.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            `;
        }

        scheduleHTML += `</div>`; // Close slider container


        // Section: Detailed Explanation
        scheduleHTML += `<div class="m-t-40"><h5 class="fw-800 m-b-20 fc-purple-7">📚 Detail Instruksi & Panduan Rutinitas (${totalMonths} Bulan Ke Depan)</h5>`;

        cartItems.forEach(item => {
            let details = '';
            if (item.category === 'live') {
                details = 'Interaksi langsung dengan tutor eksklusif melalui Zoom. Jadwal diset otomatis setiap <strong>Selasa & Kamis Pukul 19.00 WIB</strong> berturut-turut sesuai fase bulan. Fokuskan pada keaktifan.';
            } else if (item.category === 'private') {
                details = 'Sesi review eksklusif Face-to-Face secara virtual (1 Siswa, 1 Tutor). Default jadwal rutin: <strong>Sabtu 10.00 WIB</strong>. Siapkan bahan dari senin-jumat untuk direview.';
            } else if (item.category === 'module') {
                details = 'Modul E-Course ini bersifat Video On-Demand (Flexible Time). Disarankan konsisten: <strong>Senin, Rabu, Jumat pukul 09.00</strong>. Anda bisa atur jam sesuai kerjaan if bentrok.';
            } else if (item.category === 'test') {
                details = 'Simulasi Tryout Penuh. Test Online dengan durasi ~3.5 Jam. Jadwal: <strong>Minggu pertama tiap fase pukul 08.00 WIB</strong>.';
            }

            scheduleHTML += `
                <div class="ai-card p-4 shadow-sm bg-white br-12 border-left-purple m-b-20">
                    <div class="d-flex-center-btw mb-2">
                        <span class="badge bg-info-1 fc-info-7 f-10">${item.category.toUpperCase()}</span>
                    </div>
                    <h6 class="fw-800 m-b-10">${item.name}</h6>
                    <p class="f-13 fc-black-5 mb-0 lh-15">${details}</p>
                </div>
            `;
        });

        scheduleHTML += `</div>`;
        return scheduleHTML;
    }

    function renderRoadmapTimeline(coreRecs, allRecs) {
        const list = document.getElementById('aiRoadmapTimeline');
        list.innerHTML = generateDetailedSchedule(coreRecs, formData.timeline);

        // Add Alternatif if any (50-64%)
        const altRecs = allRecs.filter(r => r.matchScore >= 50 && r.matchScore < 65);
        if (altRecs.length > 0) {
            const altDiv = document.createElement('div');
            altDiv.className = 'm-t-20 p-3 bg-light br-12';
            altDiv.innerHTML = `<h6 class="fw-700 f-12 m-b-10 fc-black-5">Alternative Suggestions (50-64% Match):</h6>`;
            altRecs.forEach(alt => {
                altDiv.innerHTML += `
                 <div class="f-12 m-b-5 d-flex-center-btw">
                    <span>• ${alt.name}</span>
                    <span class="fc-warning-7 fw-700">${alt.matchScore}% Match</span>
                 </div>`;
            });
            list.appendChild(altDiv);
        }
    }

    // --- INTERFACE TO DASHBOARD ---
    window.purchasePlan = function () {
        // Transition to Invoice
        resultSection.classList.add('d-none');
        customizerSection.classList.add('d-none');
        floatingCart.style.display = 'none';

        const invoice = document.getElementById('aiInvoiceSection');
        if (invoice) {
            invoice.classList.remove('d-none');
            renderInvoice();
            invoice.scrollIntoView({ behavior: 'smooth' });
        }
    };

    function renderInvoice() {
        const today = new Date().toLocaleDateString('en-ID', { year: 'numeric', month: 'long', day: 'numeric' });
        const dateEl = document.getElementById('invoiceDate');
        if (dateEl) dateEl.textContent = today;

        const invoiceList = document.getElementById('aiInvoiceItems');
        if (invoiceList) invoiceList.innerHTML = '';

        let total = 0;
        userCart.forEach(item => {
            total += item.price;
            if (invoiceList) {
                invoiceList.innerHTML += `
                    <div class="d-flex-center-btw m-b-10">
                        <span class="f-13 fc-black-5">${item.name}</span>
                        <span class="f-13 fw-700">Rp ${item.price.toLocaleString('id-ID')}</span>
                    </div>
                `;
            }
        });

        const commitmentText = formData.timeline ? `${formData.timeline} Months` : 'Flexible';
        const totalEl = document.getElementById('aiInvoiceTotal');
        const commitEl = document.getElementById('aiInvoiceCommitment');

        if (totalEl) totalEl.textContent = `Rp ${total.toLocaleString('id-ID')}`;
        if (commitEl) commitEl.textContent = `${commitmentText} Commitment`;
    }



    window.switchToCustomizer = function () {
        resultSection.classList.add('d-none');
        customizerSection.classList.remove('d-none');
        floatingCart.style.display = 'flex';
        renderCustomizer(); // Trigger rendering of userCart built in logic engine
    };

    window.resetAIForm = function () {
        currentStep = 1;
        landingPage.classList.remove('d-none');
        assessmentContainer.classList.add('d-none');
        resultSection.classList.add('d-none');
        customizerSection.classList.add('d-none');
        const invoice = document.getElementById('aiInvoiceSection');
        if (invoice) invoice.classList.add('d-none');


        floatingCart.style.display = 'none';
        userCart = [];

        // Reset selections
        document.querySelectorAll('.active').forEach(a => {
            if (!a.classList.contains('ai-step-dot') && !a.classList.contains('milestone-item')) {
                a.classList.remove('active');
            }
        });

        // Reset form data
        formData = {
            goal_category: '',
            level: '',
            ielts_goal: 7.0,
            weaknesses: [],
            time_commit: '',
            budget: '',
            timeline: ''
        };
    };
    // The following functions are part of the customizer logic
    // which allows users to add/remove specific modules (ketengan)


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
        customizerSection.classList.add('d-none');
        floatingCart.style.display = 'none';
        resultSection.classList.remove('d-none');

        // Update total price display in Result Section based on actual custom cart
        const totalPrice = userCart.reduce((sum, item) => sum + item.price, 0);
        const savings = Math.round(totalPrice * 0.15);

        const resTotalEl = document.getElementById('resultTotalPrice');
        const resSavEl = document.getElementById('resultSavings');
        if (resTotalEl) resTotalEl.textContent = `Rp ${totalPrice.toLocaleString('id-ID')}`;
        if (resSavEl) resSavEl.textContent = `${savings.toLocaleString('id-ID')}`;

        // Regenerate roadmap timeline with detailed schedule based on updated cart
        const list = document.getElementById('aiRoadmapTimeline');
        list.innerHTML = generateDetailedSchedule(userCart, formData.timeline);

        resultSection.scrollIntoView({ behavior: 'smooth' });
    }

    // --- INTERACTIVE CALENDAR HANDLERS ---
    window.toggleActivity = function (dayKey, type) {
        if (!customSchedule[dayKey]) {
            customSchedule[dayKey] = [];
        }

        const index = customSchedule[dayKey].indexOf(type);
        if (index > -1) {
            customSchedule[dayKey].splice(index, 1);
        } else {
            customSchedule[dayKey].push(type);
        }

        refreshCalendar();
    };

    window.openDayEditor = function (dayKey) {
        if (!customSchedule[dayKey] || customSchedule[dayKey].length === 0) {
            customSchedule[dayKey] = ['module'];
        } else if (customSchedule[dayKey].includes('module') && !customSchedule[dayKey].includes('live')) {
            customSchedule[dayKey].push('live');
        } else if (customSchedule[dayKey].includes('live')) {
            customSchedule[dayKey] = [];
        }
        refreshCalendar();
    };

    function refreshCalendar() {
        const list = document.getElementById('aiRoadmapTimeline');
        if (list) {
            list.innerHTML = generateDetailedSchedule(userCart, formData.timeline);
        }
    }

    window.changeMonthView = function (dir) {
        const totalMonths = parseInt(formData.timeline) || 1;
        let nextMonth = currentMonthView + dir;

        if (nextMonth < 1) nextMonth = totalMonths;
        if (nextMonth > totalMonths) nextMonth = 1;

        currentMonthView = nextMonth;
        refreshCalendar();
    };
});
