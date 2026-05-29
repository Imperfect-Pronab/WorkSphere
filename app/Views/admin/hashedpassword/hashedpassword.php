<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<style>
    .form-card {
        margin-top: 28px;
        margin-left: auto;
        margin-right: auto;
        background: #141210;
        border: 1px solid rgba(255, 255, 255, 0.07);
        border-radius: 16px;
        padding: 28px;
        max-width: 480px;
    }

    .field-label {
        display: block;
        font-family: 'DM Mono', monospace;
        font-size: 10px;
        letter-spacing: 0.14em;
        text-transform: uppercase;
        color: rgba(255, 255, 255, 0.3);
        margin-bottom: 8px;
    }

    .field-wrap {
        position: relative;
    }

    .hash-input {
        width: 100%;
        background: rgba(255, 255, 255, 0.04);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 10px;
        padding: 11px 44px 11px 14px;
        font-family: 'DM Mono', monospace;
        font-size: 13px;
        color: #f0ece4;
        outline: none;
        transition: border-color 0.2s, box-shadow 0.2s, background 0.2s;
        letter-spacing: 0.04em;
    }

    .hash-input::placeholder {
        color: rgba(240, 236, 228, 0.2);
    }

    .hash-input:focus {
        border-color: rgba(99, 215, 165, 0.45);
        background: rgba(255, 255, 255, 0.06);
        box-shadow: 0 0 0 3px rgba(99, 215, 165, 0.08);
    }

    /* eye toggle */
    .eye-btn {
        position: absolute;
        right: 12px;
        top: 50%;
        transform: translateY(-50%);
        background: none;
        border: none;
        cursor: pointer;
        color: rgba(255, 255, 255, 0.25);
        padding: 0;
        line-height: 0;
        transition: color 0.2s;
    }

    .eye-btn:hover {
        color: rgba(255, 255, 255, 0.65);
    }

    /* strength bar */
    .strength-bar-wrap {
        display: flex;
        gap: 5px;
        margin-top: 10px;
    }

    .strength-seg {
        flex: 1;
        height: 3px;
        border-radius: 2px;
        background: rgba(255, 255, 255, 0.08);
        transition: background 0.3s;
    }

    .strength-label {
        font-family: 'DM Mono', monospace;
        font-size: 10px;
        letter-spacing: 0.1em;
        color: rgba(255, 255, 255, 0.25);
        margin-top: 6px;
        min-height: 14px;
        transition: color 0.3s;
    }

    /* hint */
    .field-hint {
        font-size: 11.5px;
        color: rgba(255, 255, 255, 0.22);
        margin-top: 6px;
        line-height: 1.5;
    }

    /* submit */
    .submit-btn {
        margin-top: 22px;
        width: 100%;
        background: linear-gradient(135deg, #63d7a5 0%, #3ecf8e 100%);
        border: none;
        border-radius: 10px;
        padding: 12px;
        cursor: pointer;
        font-family: 'Syne', sans-serif;
        font-size: 13px;
        font-weight: 600;
        letter-spacing: 0.06em;
        text-transform: uppercase;
        color: #0a1f16;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        transition: opacity 0.2s, transform 0.2s, box-shadow 0.2s;
        box-shadow: 0 4px 20px rgba(99, 215, 165, 0.2);
    }

    .submit-btn:hover {
        opacity: 0.9;
        transform: translateY(-1px);
        box-shadow: 0 8px 28px rgba(99, 215, 165, 0.3);
    }

    .submit-btn:active {
        transform: translateY(0);
    }

    /* result box */
    .result-box {
        margin-top: 20px;
        background: rgba(99, 215, 165, 0.06);
        border: 1px solid rgba(99, 215, 165, 0.18);
        border-radius: 12px;
        padding: 16px 18px;
        display: none;
    }

    .result-box.visible {
        display: block;
    }

    .result-box-label {
        font-family: 'DM Mono', monospace;
        font-size: 10px;
        letter-spacing: 0.15em;
        text-transform: uppercase;
        color: #63d7a5;
        margin-bottom: 8px;
    }

    .result-hash {
        font-family: 'DM Mono', monospace;
        font-size: 12px;
        color: rgba(255, 255, 255, 0.7);
        word-break: break-all;
        line-height: 1.6;
    }

    .copy-btn {
        margin-top: 12px;
        display: inline-flex;
        align-items: center;
        gap-: 6px;
        background: rgba(99, 215, 165, 0.1);
        border: 1px solid rgba(99, 215, 165, 0.22);
        border-radius: 7px;
        padding: 6px 12px;
        font-family: 'DM Mono', monospace;
        font-size: 11px;
        letter-spacing: 0.06em;
        color: #63d7a5;
        cursor: pointer;
        transition: all 0.18s;
        display: flex;
        align-items: center;
        gap: 6px;
    }

    .copy-btn:hover {
        background: rgba(99, 215, 165, 0.18);
        border-color: rgba(99, 215, 165, 0.4);
    }

    /* divider */
    .form-divider {
        height: 1px;
        background: rgba(255, 255, 255, 0.06);
        margin: 22px 0;
    }

    /* info chips */
    .info-row {
        display: flex;
        gap: 10px;
        flex-wrap: wrap;
        margin-top: 16px;
    }

    .info-chip {
        display: flex;
        align-items: center;
        gap: 6px;
        background: rgba(255, 255, 255, 0.04);
        border: 1px solid rgba(255, 255, 255, 0.08);
        border-radius: 7px;
        padding: 6px 11px;
        font-size: 11.5px;
        color: rgba(255, 255, 255, 0.35);
    }

    .info-chip svg {
        flex-shrink: 0;
    }
</style>

<div class="dash-page">

    <!-- Header -->
    <div class="anim d1">
        <p class="dash-header-label">Admin Panel</p>
        <h1 class="dash-title">Hash Password</h1>
        <p class="dash-subtitle">Generate a bcrypt hash from any plain-text password.</p>
    </div>

    <!-- Form card -->
    <div class="form-card anim d2">

        <form action="<?= base_url('admin/getHashedPassword') ?>" method="post" id="hashForm">

            <label class="field-label" for="password">Plain-text Password</label>

            <div class="field-wrap">
                <input
                    class="hash-input"
                    type="password"
                    name="password"
                    id="password"
                    placeholder="Enter password to hash…"
                    required
                    autocomplete="off"
                    oninput="updateStrength(this.value)">
                <button type="button" class="eye-btn" onclick="toggleVisibility()" id="eyeBtn" aria-label="Toggle visibility">
                    <svg id="eyeIcon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z" />
                        <circle cx="12" cy="12" r="3" />
                    </svg>
                </button>
            </div>

            <!-- Strength bar -->
            <div class="strength-bar-wrap" id="strengthBar">
                <div class="strength-seg" id="seg1"></div>
                <div class="strength-seg" id="seg2"></div>
                <div class="strength-seg" id="seg3"></div>
                <div class="strength-seg" id="seg4"></div>
            </div>
            <div class="strength-label" id="strengthLabel"></div>

            <p class="field-hint">The original password is never stored. Only the generated hash is returned.</p>

            <div class="form-divider"></div>

            <button type="submit" class="submit-btn">
                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                    <rect x="3" y="11" width="18" height="11" rx="2" ry="2" />
                    <path d="M7 11V7a5 5 0 0 1 10 0v4" />
                </svg>
                Generate Hash
            </button>

        </form>

        <!-- Result (shown when CI returns hash via flashdata or query) -->
        <?php if (!empty($hashed_password)) : ?>
            <div class="result-box visible" id="resultBox">
                <div class="result-box-label">
                    <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" style="display:inline;margin-right:5px;vertical-align:middle;">
                        <polyline points="20 6 9 17 4 12" />
                    </svg>
                    Hashed Output
                </div>
                <div class="result-hash" id="hashValue"><?= esc($hashed_password) ?></div>
                <button class="copy-btn" onclick="copyHash()">
                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <rect x="9" y="9" width="13" height="13" rx="2" ry="2" />
                        <path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1" />
                    </svg>
                    <span id="copyLabel">Copy Hash</span>
                </button>
            </div>
        <?php endif; ?>

        <!-- Info chips -->
        <div class="info-row anim d3">
            <div class="info-chip">
                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="#63d7a5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="20 6 9 17 4 12" />
                </svg>
                bcrypt algorithm
            </div>
            <div class="info-chip">
                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="#60a5fa" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="20 6 9 17 4 12" />
                </svg>
                Cost factor 10
            </div>
            <div class="info-chip">
                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="#a78bfa" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="20 6 9 17 4 12" />
                </svg>
                One-way — irreversible
            </div>
        </div>

    </div>
</div>

<script>
    function toggleVisibility() {
        const input = document.getElementById('password');
        const icon = document.getElementById('eyeIcon');
        const visible = input.type === 'text';
        input.type = visible ? 'password' : 'text';
        icon.innerHTML = visible ?
            '<path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/>' :
            '<path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"/><line x1="1" y1="1" x2="23" y2="23"/>';
    }

    function updateStrength(val) {
        const segs = [1, 2, 3, 4].map(i => document.getElementById('seg' + i));
        const label = document.getElementById('strengthLabel');
        const colors = {
            1: '#ef4444',
            2: '#f59e0b',
            3: '#60a5fa',
            4: '#63d7a5'
        };
        const labels = {
            1: 'Weak',
            2: 'Fair',
            3: 'Good',
            4: 'Strong'
        };

        let score = 0;
        if (val.length >= 6) score++;
        if (val.length >= 10) score++;
        if (/[A-Z]/.test(val) && /[0-9]/.test(val)) score++;
        if (/[^A-Za-z0-9]/.test(val)) score++;

        segs.forEach((s, i) => {
            s.style.background = (val.length === 0) ?
                'rgba(255,255,255,0.08)' :
                (i < score ? colors[score] : 'rgba(255,255,255,0.08)');
        });

        label.textContent = val.length > 0 ? labels[score] || 'Very Weak' : '';
        label.style.color = val.length > 0 ? colors[score] : 'rgba(255,255,255,0.25)';
    }

    function copyHash() {
        const text = document.getElementById('hashValue').textContent.trim();
        const label = document.getElementById('copyLabel');
        navigator.clipboard.writeText(text).then(() => {
            label.textContent = 'Copied!';
            setTimeout(() => label.textContent = 'Copy Hash', 2000);
        });
    }
</script>

<?= $this->endSection() ?>