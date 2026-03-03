@extends('layouts.lms-layout')

@section('title', 'AI Mentor | Englishvit')
@section('nav_ai', 'active')

@section('content')
<div class="gpt-ux-container">
    <!-- Centered Chat Thread -->
    <div class="gpt-chat-thread pd-t-40 pd-b-100">
        <div class="container max-w-800">
            <!-- Initial Greeting -->
            <div class="gpt-message-row ai-message">
                <div class="gpt-avatar bg-brand">
                    <span class="material-icons">auto_awesome</span>
                </div>
                <div class="gpt-content">
                    <h5 class="fw-800 primary-text mb-2">Hello! I'm your Englishvit Mentor.</h5>
                    <p class="mb-0 text-muted">I've been analyzing your recent progress in the **Success Path**. You're doing great with your Listening modules! How can I help you improve your IELTS score today?</p>
                </div>
            </div>

            <!-- Message Container for Dynamic Messages -->
            <div id="gpt-messages-container"></div>

            <!-- Typing Indicator -->
            <div id="gpt-typing" class="gpt-message-row ai-message" style="display: none;">
                <div class="gpt-avatar bg-brand">
                    <span class="material-icons">auto_awesome</span>
                </div>
                <div class="gpt-content">
                    <div class="typing-dots">
                        <span></span><span></span><span></span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Floating Bottom Input -->
    <div class="gpt-input-fixed">
        <div class="container max-w-800">
            <!-- Quick Prompts (Small & Subtle) -->
            <div class="d-flex flex-wrap gap-8 justify-center m-b-15">
                <button class="gpt-quick-suggest" onclick="quickPrompt('Predict my IELTS score')">Predict Score</button>
                <button class="gpt-quick-suggest" onclick="quickPrompt('Show my next milestone')">Next Milestone</button>
                <button class="gpt-quick-suggest" onclick="quickPrompt('Give me a Speaking cue')">Speaking Cue</button>
            </div>

            <div class="gpt-input-wrapper shadow-lg">
                <textarea id="gpt-input" placeholder="Ask anything to your Englishvit Mentor..." rows="1"></textarea>
                <button class="gpt-send-btn" id="send-btn" onclick="handleSend()">
                    <span class="material-icons">arrow_upward</span>
                </button>
            </div>
            <p class="f-10 text-center text-muted m-t-10 opacity-60">Englishvit AI Mentor can make mistakes. Consider checking important information.</p>
        </div>
    </div>
</div>

<style>
    .max-w-800 { max-width: 800px; margin: 0 auto; }
    .bg-brand { background: #002655 !important; }
</style>
@endsection

@section('scripts')
<script>
    const chatInput = document.getElementById('gpt-input');
    const container = document.getElementById('gpt-messages-container');
    const typingIndicator = document.getElementById('gpt-typing');

    // Auto-expand textarea
    chatInput.addEventListener('input', function() {
        this.style.height = 'auto';
        this.style.height = (this.scrollHeight) + 'px';
    });

    function handleSend() {
        const text = chatInput.value.trim();
        if(!text) return;

        // Add User Message
        appendMessage('user', text);
        chatInput.value = '';
        chatInput.style.height = 'auto';
        
        // Show Typing
        typingIndicator.style.display = 'flex';
        scrollToBottom();

        // Simulate AI
        setTimeout(() => {
            typingIndicator.style.display = 'none';
            const responses = [
                "That's a very proactive question! Based on your current progress, I suggest we focus on **Coherence and Cohesion** for your next task.",
                "I've looked at your data. You're strong in Vocabulary, but we can refine your **Grammar complexity** to hit that Band 7.0 mark.",
                "Certainly! Here is a Speaking Cue Card for you: 'Describe a place you visited that you would like to go back to'."
            ];
            appendMessage('ai', responses[Math.floor(Math.random() * responses.length)]);
            scrollToBottom();
        }, 1500);
    }

    function appendMessage(role, text) {
        const row = document.createElement('div');
        row.className = `gpt-message-row ${role}-message animate__animated animate__fadeIn`;
        
        const avatar = role === 'ai' ? 
            `<div class="gpt-avatar bg-brand"><span class="material-icons">auto_awesome</span></div>` :
            `<div class="gpt-avatar bg-secondary"><span class="material-icons">person</span></div>`;

        row.innerHTML = `
            ${avatar}
            <div class="gpt-content">
                <p class="mb-0">${text}</p>
            </div>
        `;
        container.appendChild(row);
    }

    function quickPrompt(text) {
        chatInput.value = text;
        handleSend();
    }

    function scrollToBottom() {
        window.scrollTo({ top: document.body.scrollHeight, behavior: 'smooth' });
    }

    chatInput.addEventListener('keypress', (e) => {
        if(e.key === 'Enter' && !e.shiftKey) {
            e.preventDefault();
            handleSend();
        }
    });
</script>
@endsection
