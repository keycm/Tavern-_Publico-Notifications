<?php
// Check if there is a saved username cookie to pre-fill the form
$saved_username = isset($_COOKIE['remember_username']) ? $_COOKIE['remember_username'] : '';
$remember_checked = !empty($saved_username) ? 'checked' : '';
?>

<div id="signInUpModal" class="modal auth-modal">
    <div class="modal-content auth-modal-content">
        <span class="close-button auth-close-btn">&times;</span>
        
        <div class="auth-branding-panel">
            <div class="auth-branding-overlay"></div>
            <div class="auth-branding-content">
                <div class="logo">
                    <div class="logo-main-line">
                        <span>TAVERN PUBLICO</span>
                    </div>
                    <span class="est-year">EST ★ 2024</span>
                </div>
                <p>Taste the tradition, savor the innovation.</p>
            </div>
        </div>

        <div class="auth-form-panel">
            <div id="signInPanel" class="modal-panel active">
                <div class="modal-form-container">
                    <div class="modal-header-text">
                        <h2 class="modal-title">Welcome Back! 👋</h2>
                        <p class="modal-subtitle">Sign in to continue to your account.</p>
                    </div>
                    <form id="signInForm" class="modal-form">
                        <input type="hidden" name="redirect_url" id="redirectUrl">
                        
                        <div class="form-group">
                            <label for="loginUsernameEmail">Username or Email</label>
                            <div class="input-icon-wrapper">
                                <i class="fas fa-user input-icon"></i>
                                <input type="text" id="loginUsernameEmail" name="username_email" placeholder="e.g., yourname@gmail.com" value="<?php echo htmlspecialchars($saved_username); ?>" required>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="loginPassword">Password</label>
                            <div class="input-icon-wrapper">
                                <i class="fas fa-lock input-icon"></i>
                                <input type="password" id="loginPassword" name="password" placeholder="Enter your password" required>
                            </div>
                        </div>

                        <div class="remember-forgot-row">
                            <label class="remember-me-container">
                                <input type="checkbox" id="rememberMe" name="remember_me" <?php echo $remember_checked; ?>>
                                <span class="checkmark"></span>
                                Remember me
                            </label>
                            <a href="#" id="forgotPasswordLink">Forgot Password?</a>
                        </div>

                        <button type="submit" class="btn btn-primary modal-btn">Sign In</button>
                    </form>
                    <p class="modal-bottom-text">Don't have an account? <a href="#" class="switch-to-register">Create one here</a></p>
                </div>
            </div>

            <div id="registerPanel" class="modal-panel">
                <div class="modal-form-container">
                    <div class="modal-header-text">
                        <h2 class="modal-title">Create Account ✨</h2>
                        <p class="modal-subtitle">Get started with a free account today.</p>
                    </div>
                    <form id="registerForm" class="modal-form">
                        <div class="form-group">
                            <label for="registerName">Username</label>
                            <div class="input-icon-wrapper">
                                <i class="fas fa-id-badge input-icon"></i>
                                <input type="text" id="registerName" name="username" placeholder="Choose a unique username" required>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="registerEmail">Email Address</label>
                            <div class="input-icon-wrapper">
                                <i class="fas fa-envelope input-icon"></i>
                                <input type="email" id="registerEmail" name="email" placeholder="yourname@gmail.com" required>
                            </div>
                            <div id="gmail-error-message" class="email-error-message">Only @gmail.com addresses are allowed.</div>
                        </div>
                        
                        <div class="form-group" style="position: relative;">
                            <label for="registerPassword">Password</label>
                            <div class="input-icon-wrapper">
                                <i class="fas fa-key input-icon"></i>
                                <input type="password" id="registerPassword" name="password" placeholder="Create a strong password" required>
                            </div>
                            <div id="password-rules-modal" class="mini-modal">
                                <p class="validation-rule-container">
                                    <span id="length" class="validation-rule invalid">6+ characters</span>,
                                    <span id="capital" class="validation-rule invalid">1 uppercase</span>,
                                    <span id="special" class="validation-rule invalid">1 special</span>
                                </p>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="registerConfirmPassword">Confirm Password</label>
                            <div class="input-icon-wrapper">
                                <i class="fas fa-check-circle input-icon"></i>
                                <input type="password" id="registerConfirmPassword" name="confirm_password" placeholder="Confirm your password" required>
                            </div>
                        </div>
                        
                        <button type="submit" class="btn btn-primary modal-btn">Register Account</button>
                    </form>
                    <p class="modal-bottom-text">Already have an account? <a href="#" class="switch-to-signin">Sign in here</a></p>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="otpModal" class="modal">
    <div class="modal-content single-form-modal">
        <span class="close-button auth-close-btn">&times;</span>
        <div class="modal-form-container">
            <div class="modal-icon-header"><i class="fas fa-shield-alt"></i></div>
            <h2 class="modal-title">Verification</h2>
            <p class="modal-subtitle">A 6-digit code has been sent to your email.</p>
            <form id="otpForm" class="modal-form">
                <input type="hidden" id="otpEmail" name="email">
                <div class="form-group">
                    <label for="otp">Verification Code</label>
                    <div class="input-icon-wrapper">
                        <i class="fas fa-hashtag input-icon"></i>
                        <input type="text" id="otp" name="otp" placeholder="Enter 6-digit code" required style="text-align: center; font-size: 1.2rem; letter-spacing: 2px;">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary modal-btn">Verify Account</button>
                <div class="form-options" style="text-align: center; margin-top: 20px;">
                    <a href="#" id="resendRegisterOtpLink" class="disabled-link">Resend Code</a>
                    <span id="resendRegisterTimer"></span>
                </div>
            </form>
        </div>
    </div>
</div>

<div id="forgotPasswordModal" class="modal">
    <div class="modal-content single-form-modal">
        <span class="close-button auth-close-btn">&times;</span>
        <div class="modal-form-container">
            <div class="modal-icon-header"><i class="fas fa-unlock-alt"></i></div>
            <h2 class="modal-title">Reset Password</h2>
            <p class="modal-subtitle">Enter your registered email to receive a secure reset code.</p>
            <form id="forgotPasswordForm" class="modal-form">
                <div class="form-group">
                    <label for="forgotEmail">Email Address</label>
                    <div class="input-icon-wrapper">
                        <i class="fas fa-envelope input-icon"></i>
                        <input type="email" id="forgotEmail" name="email" placeholder="e.g., yourname@gmail.com" required>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary modal-btn">Send Reset Code</button>
            </form>
        </div>
    </div>
</div>

<div id="resetOtpModal" class="modal">
    <div class="modal-content single-form-modal">
        <span class="close-button auth-close-btn">&times;</span>
        <div class="modal-form-container">
            <div class="modal-icon-header"><i class="fas fa-key"></i></div>
            <h2 class="modal-title">Enter Reset Code</h2>
            <p class="modal-subtitle">A 6-digit code has been sent to your email.</p>
            <form id="resetOtpForm" class="modal-form">
                <input type="hidden" id="resetOtpEmail" name="email">
                <div class="form-group">
                    <label for="resetOtp">Reset Code</label>
                    <div class="input-icon-wrapper">
                        <i class="fas fa-hashtag input-icon"></i>
                        <input type="text" id="resetOtp" name="otp" placeholder="Enter 6-digit code" required style="text-align: center; font-size: 1.2rem; letter-spacing: 2px;">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary modal-btn">Verify Code</button>
                <div class="form-options" style="text-align: center; margin-top: 20px;">
                    <a href="#" id="resendOtpLink" class="disabled-link">Resend Code</a>
                    <span id="resendTimer"></span>
                </div>
            </form>
        </div>
    </div>
</div>

<div id="setNewPasswordModal" class="modal">
    <div class="modal-content single-form-modal">
        <span class="close-button auth-close-btn">&times;</span>
        <div class="modal-form-container">
            <div class="modal-icon-header"><i class="fas fa-lock"></i></div>
            <h2 class="modal-title">New Password</h2>
            <p class="modal-subtitle">Create a new, strong password for your account.</p>
            <form id="setNewPasswordForm" class="modal-form">
                <input type="hidden" id="setNewPasswordEmail" name="email">
                <div class="form-group">
                    <label for="newPassword">New Password</label>
                    <div class="input-icon-wrapper">
                        <i class="fas fa-key input-icon"></i>
                        <input type="password" id="newPassword" name="password" placeholder="Enter new password" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="newPasswordConfirm">Confirm New Password</label>
                    <div class="input-icon-wrapper">
                        <i class="fas fa-check-circle input-icon"></i>
                        <input type="password" id="newPasswordConfirm" name="password_confirm" placeholder="Confirm new password" required>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary modal-btn">Save Password</button>
            </form>
        </div>
    </div>
</div>

<div id="alertModal" class="modal">
    <div class="modal-content single-form-modal" style="max-width: 400px;">
        <span class="close-button auth-close-btn">&times;</span>
        <div class="modal-form-container" style="text-align: center; padding: 40px 30px;">
             <h2 id="alertModalTitle" class="modal-title" style="text-align: center; font-size: 1.8rem; margin-bottom: 15px;"></h2>
             <p id="alertModalMessage" style="color: #666; margin-bottom: 30px; line-height: 1.6;"></p>
             <button id="alertModalOk" class="btn btn-primary modal-btn" style="width: auto; padding: 10px 35px; margin: 0 auto; display: inline-block;">Got it</button>
        </div>
    </div>
</div>

<style>
/* --- PROFESSIONAL & FRIENDLY UI/UX STYLES FOR AUTH MODALS --- */

/* Force Modals to be above absolutely everything */
.modal {
    z-index: 99999 !important;
    backdrop-filter: blur(5px);
    -webkit-backdrop-filter: blur(5px);
    background-color: rgba(0, 0, 0, 0.6);
}

/* Main Two-Column Auth Modal */
.auth-modal .modal-content {
    display: flex;
    flex-direction: row;
    max-width: 950px;
    width: 90%;
    padding: 0;
    margin: 0;
    border-radius: 20px;
    overflow: hidden; 
    max-height: calc(100vh - 60px); 
    position: relative;
    box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.4);
}

/* Fixed Close Button */
.auth-close-btn {
    position: absolute;
    top: 20px;
    right: 20px;
    color: #a0aec0;
    font-size: 26px;
    cursor: pointer;
    line-height: 1;
    z-index: 100;
    background: #f8fafc;
    border-radius: 50%;
    width: 38px;
    height: 38px;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.2s ease;
}
.auth-close-btn:hover { color: #1e293b; background: #e2e8f0; transform: scale(1.05); }

.auth-branding-panel {
    width: 45%;
    background-image: url('images/1st.jpg');
    background-size: cover;
    background-position: center;
    color: #fff;
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
    padding: 50px;
    position: relative;
}

.auth-branding-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(135deg, rgba(26, 26, 26, 0.85) 0%, rgba(0, 0, 0, 0.6) 100%);
    z-index: 1;
}

.auth-branding-content { z-index: 2; }
.auth-branding-panel .logo { margin-bottom: 25px; }
.auth-branding-panel .logo .logo-main-line span { color: #FFD700; font-size: 2.8rem; font-weight: 800; letter-spacing: 1px; }
.auth-branding-panel .logo .est-year { color: #cbd5e1; font-weight: 600; letter-spacing: 2px; }
.auth-branding-panel p { font-size: 1.15rem; color: #f1f5f9; line-height: 1.6; }

/* Form Panel */
.auth-form-panel { 
    width: 55%; 
    padding: 0; 
    position: relative; 
    background-color: #ffffff; 
    overflow-y: auto; 
    max-height: calc(100vh - 60px);
}

.modal-form-container {
    padding: 50px 55px;
}

/* Single-Form Modals */
.single-form-modal {
    max-width: 450px;
    width: 95%;
    padding: 0;
    border-radius: 20px;
    box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.4);
    background-color: #ffffff;
    max-height: calc(100vh - 60px);
}
.single-form-modal .modal-form-container {
    padding: 45px 40px;
    overflow-y: auto;
}

/* Icons Header for Single Modals */
.modal-icon-header {
    text-align: center;
    font-size: 3rem;
    color: #FFD700;
    margin-bottom: 20px;
}

/* Typography */
.modal-header-text { margin-bottom: 35px; }
.modal-title { 
    font-family: 'Playfair Display', serif;
    font-size: 2.2rem;
    font-weight: 700;
    color: #1e293b;
    margin-bottom: 8px;
}
.modal-subtitle {
    color: #64748b;
    font-size: 1.05rem;
    line-height: 1.5;
    margin: 0;
}
.single-form-modal .modal-title, .single-form-modal .modal-subtitle {
    text-align: center;
}

/* Form Groups & Inputs */
.modal-form { width: 100%; }
.modal-form .form-group { text-align: left; margin-bottom: 22px; }
.modal-form .form-group label { font-weight: 600; color: #334155; margin-bottom: 8px; font-size: 0.9rem; display: block; }

/* Input Icon Wrapper */
.input-icon-wrapper {
    position: relative;
    display: flex;
    align-items: center;
}
.input-icon-wrapper .input-icon {
    position: absolute;
    left: 16px;
    color: #94a3b8;
    font-size: 1.1rem;
    transition: color 0.3s ease;
}
.input-icon-wrapper input:focus + .input-icon,
.input-icon-wrapper input:not(:placeholder-shown) + .input-icon {
    color: #1a1a1a;
}

.modal-form .form-group input {
    width: 100%;
    background-color: #f8fafc;
    border: 1px solid #e2e8f0;
    border-radius: 12px;
    padding: 14px 14px 14px 45px;
    font-size: 1rem;
    color: #1e293b;
    transition: all 0.3s ease;
    box-sizing: border-box;
}
.modal-form .form-group input::placeholder { color: #cbd5e1; }
.modal-form .form-group input:focus {
    background-color: #ffffff;
    border-color: #FFD700;
    box-shadow: 0 0 0 4px rgba(255, 215, 0, 0.15);
    outline: none;
}

/* Remember Me & Forgot Password Row */
.remember-forgot-row {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 25px;
    margin-top: -5px;
}

.remember-me-container {
    display: flex;
    align-items: center;
    gap: 8px;
    font-size: 0.95rem;
    color: #475569;
    cursor: pointer;
    user-select: none;
}
.remember-me-container input {
    display: none;
}
.remember-me-container .checkmark {
    width: 18px;
    height: 18px;
    background-color: #f8fafc;
    border: 2px solid #cbd5e1;
    border-radius: 4px;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.2s ease;
}
.remember-me-container input:checked + .checkmark {
    background-color: #FFD700;
    border-color: #FFD700;
}
.remember-me-container input:checked + .checkmark::after {
    content: '\2714';
    color: #1a1a1a;
    font-size: 12px;
    font-weight: bold;
}

#forgotPasswordLink { 
    font-size: 0.95rem; 
    color: #3b82f6; 
    text-decoration: none; 
    font-weight: 600;
    transition: color 0.2s;
}
#forgotPasswordLink:hover { color: #2563eb; text-decoration: underline; }

/* Primary Button */
.modal-btn {
    width: 100%;
    padding: 15px;
    font-size: 1.1rem;
    font-weight: 600;
    letter-spacing: 0.5px;
    margin-top: 10px;
    background-color: #1e293b;
    color: #fff;
    border-radius: 12px;
    border: none;
    box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
    cursor: pointer;
}
.modal-btn:hover {
    background-color: #FFD700;
    color: #1a1a1a;
    transform: translateY(-2px);
    box-shadow: 0 10px 15px -3px rgba(255, 215, 0, 0.3);
}

.modal-bottom-text { text-align: center; margin-top: 30px; font-size: 0.95rem; color: #64748b;}
.modal-bottom-text a { color: #3b82f6; text-decoration: none; font-weight: 600; transition: color 0.2s; }
.modal-bottom-text a:hover { color: #2563eb; text-decoration: underline; }

/* Responsive Adjustments */
@media (max-width: 768px) {
    .auth-modal .modal-content {
        flex-direction: column;
        width: 95%; 
        max-width: 450px; 
        max-height: 90vh; 
    }
    
    .auth-branding-panel { display: none; }
    
    .auth-form-panel { 
        width: 100%; 
    }
    
    .modal-form-container { padding: 40px 30px; }
    
    .modal-title { font-size: 1.8rem; }
    .modal-subtitle { font-size: 0.95rem; margin-bottom: 25px; }
    
    .modal-form .form-group input { padding: 12px 12px 12px 40px; }
    .input-icon-wrapper .input-icon { left: 14px; }
    
    .auth-close-btn { top: 12px; right: 12px; font-size: 22px; width: 32px; height: 32px; }

    .single-form-modal { max-width: 400px; max-height: 90vh; }
    .single-form-modal .modal-form-container { padding: 40px 25px; }
}

/* Email & Password Validation Styles */
.email-error-message { display: none; color: #ef4444; font-size: 0.85em; margin-top: 6px; font-weight: 500; }
.mini-modal { display: none; position: absolute; bottom: 105%; left: 0; margin-bottom: 10px; background-color: #1e293b; color: #fff; padding: 12px 18px; border-radius: 8px; z-index: 10; width: auto; white-space: nowrap; box-shadow: 0 10px 15px -3px rgba(0,0,0,0.3); opacity: 0; visibility: hidden; transform: translateY(10px); transition: opacity 0.3s ease, transform 0.3s ease, visibility 0.3s ease; }
.mini-modal.show { display: block; opacity: 1; visibility: visible; transform: translateY(0); }
.mini-modal::after { content: ''; position: absolute; top: 100%; left: 20px; border-width: 6px; border-style: solid; border-color: #1e293b transparent transparent transparent; }
.mini-modal .validation-rule-container { color: #cbd5e1; margin: 0; font-size: 0.85rem; font-weight: 500; }
.mini-modal .validation-rule.invalid { color: #fca5a5; }
.mini-modal .validation-rule.valid { color: #86efac; }

/* --- Loading Animation Styles --- */
.btn-loading { position: relative; color: transparent !important; cursor: wait; pointer-events: none; }
.btn-loading::after {
    content: ''; position: absolute; left: 50%; top: 50%; width: 22px; height: 22px;
    margin-left: -11px; margin-top: -11px; border: 3px solid rgba(255, 255, 255, 0.4);
    border-top-color: #ffffff; border-radius: 50%; animation: spin 0.8s linear infinite;
}
@keyframes spin { to { transform: rotate(360deg); } }

/* --- Resend Link Styles --- */
.disabled-link { color: #94a3b8 !important; pointer-events: none; text-decoration: none; }
#resendTimer, #resendRegisterTimer { margin-left: 5px; color: #64748b; font-weight: 600; }

/* Ensure modal buttons with icons align nicely */
.modal-form-container .btn i { margin-right: 8px; }
</style>

<script>
document.addEventListener('DOMContentLoaded', () => {
    // --- MODAL HANDLING ---
    const signInUpModal = document.getElementById("signInUpModal");
    const otpModal = document.getElementById('otpModal');
    const forgotPasswordModal = document.getElementById('forgotPasswordModal');
    const resetOtpModal = document.getElementById('resetOtpModal');
    const setNewPasswordModal = document.getElementById('setNewPasswordModal');
    const alertModal = document.getElementById('alertModal');
    const openModalBtns = document.querySelectorAll(".signin-button");
    const signInPanel = document.getElementById("signInPanel");
    const registerPanel = document.getElementById("registerPanel");
    const switchToRegisterLinks = document.querySelectorAll(".switch-to-register");
    const switchToSignInLink = document.querySelector(".switch-to-signin");
    const forgotPasswordLink = document.getElementById('forgotPasswordLink');
    const redirectUrlInput = document.getElementById('redirectUrl');

    // --- RESEND OTP ELEMENTS ---
    const resendOtpLink = document.getElementById('resendOtpLink');
    const resendTimerSpan = document.getElementById('resendTimer');
    let resendTimer;
    let countdown;

    const resendRegisterOtpLink = document.getElementById('resendRegisterOtpLink');
    const resendRegisterTimerSpan = document.getElementById('resendRegisterTimer');
    let resendRegisterTimer;
    let registerCountdown;

    function closeModal(modal) { if (modal) modal.style.display = 'none'; }

    // --- COUNTDOWN LOGIC (Password Reset) ---
    function startResendCountdown() {
        countdown = 60; 
        resendOtpLink.classList.add('disabled-link');
        resendTimerSpan.textContent = `(${countdown}s)`;
        resendTimer = setInterval(() => {
            countdown--;
            resendTimerSpan.textContent = `(${countdown}s)`;
            if (countdown <= 0) {
                clearInterval(resendTimer);
                resendTimerSpan.textContent = '';
                resendOtpLink.classList.remove('disabled-link');
            }
        }, 1000);
    }

    // --- COUNTDOWN LOGIC (Registration) ---
    function startRegisterResendCountdown() {
        registerCountdown = 60;
        resendRegisterOtpLink.classList.add('disabled-link');
        resendRegisterTimerSpan.textContent = `(${registerCountdown}s)`;
        resendRegisterTimer = setInterval(() => {
            registerCountdown--;
            resendRegisterTimerSpan.textContent = `(${registerCountdown}s)`;
            if (registerCountdown <= 0) {
                clearInterval(resendRegisterTimer);
                resendRegisterTimerSpan.textContent = '';
                resendRegisterOtpLink.classList.remove('disabled-link');
            }
        }, 1000);
    }

    function closeOtpModal() {
        closeModal(otpModal);
        sessionStorage.removeItem('showOtpModal');
        sessionStorage.removeItem('otpEmail');
        clearInterval(resendRegisterTimer);
        resendRegisterTimerSpan.textContent = '';
        resendRegisterOtpLink.classList.remove('disabled-link');
    }
    
    document.querySelectorAll('.modal .close-button').forEach(btn => {
        btn.addEventListener('click', (e) => {
            const modal = e.target.closest('.modal');
            if (modal.id === 'otpModal') {
                closeOtpModal();
            } else {
                closeModal(modal);
            }
            if (modal.id === 'resetOtpModal') {
                clearInterval(resendTimer);
                resendTimerSpan.textContent = '';
                resendOtpLink.classList.remove('disabled-link');
            }
        });
    });

    if (openModalBtns.length > 0 && signInUpModal) {
        openModalBtns.forEach(btn => {
            btn.onclick = function() {
                if (redirectUrlInput) {
                    redirectUrlInput.value = window.location.href;
                }
                signInUpModal.style.display = "flex";
                if (signInPanel) signInPanel.classList.add("active");
                if (registerPanel) registerPanel.classList.remove("active");
            };
        });
    }

    if(switchToRegisterLinks) {
        switchToRegisterLinks.forEach(link => {
            link.onclick = (e) => { e.preventDefault(); signInPanel.classList.remove("active"); registerPanel.classList.add("active"); };
        });
    }

    if(switchToSignInLink){
        switchToSignInLink.onclick = (e) => { e.preventDefault(); registerPanel.classList.remove("active"); signInPanel.classList.add("active"); };
    }

    if (forgotPasswordLink) {
        forgotPasswordLink.addEventListener('click', (e) => {
            e.preventDefault();
            closeModal(signInUpModal);
            forgotPasswordModal.style.display = 'flex';
        });
    }

    const alertModalTitle = document.getElementById('alertModalTitle');
    const alertModalMessage = document.getElementById('alertModalMessage');
    const alertModalOk = document.getElementById('alertModalOk');
    function showAlert(title, message) {
        alertModalTitle.textContent = title;
        alertModalMessage.textContent = message;
        alertModal.style.display = 'flex';
    }
    if (alertModalOk) alertModalOk.onclick = () => closeModal(alertModal);

    if (sessionStorage.getItem('showOtpModal') === 'true') {
        const userEmail = sessionStorage.getItem('otpEmail');
        if (userEmail) {
            document.getElementById('otpEmail').value = userEmail;
            otpModal.style.display = 'flex';
            startRegisterResendCountdown();
        }
    }

    // --- FORM SUBMISSIONS ---
    const registerForm = document.getElementById('registerForm');
    if (registerForm) {
        registerForm.addEventListener('submit', async (e) => {
            e.preventDefault();
            
            const password = document.getElementById('registerPassword').value;
            const confirmPassword = document.getElementById('registerConfirmPassword').value;

            if (password !== confirmPassword) {
                showAlert('Registration Failed', 'Passwords do not match. Please try again.');
                return; 
            }

            const submitBtn = registerForm.querySelector('button[type="submit"]');
            submitBtn.classList.add('btn-loading');

            const formData = new FormData(registerForm);
            const userEmail = formData.get('email');

            try {
                const response = await fetch('/register', { method: 'POST', body: formData }); 
                if (!response.ok) {
                    throw new Error(`Server responded with status: ${response.status}`);
                }
                const data = await response.json();
                
                if (data.success) {
                    closeModal(signInUpModal);
                    document.getElementById('otpEmail').value = userEmail;
                    sessionStorage.setItem('showOtpModal', 'true');
                    sessionStorage.setItem('otpEmail', userEmail);
                    otpModal.style.display = 'flex';
                    startRegisterResendCountdown();
                } else {
                    showAlert('Registration Failed', data.message);
                }

            } catch (error) {
                console.error('Registration error:', error);
                showAlert('Error', 'An unexpected network error occurred. Please try again later.');
            } finally {
                submitBtn.classList.remove('btn-loading');
            }
        });
    }
    
    if (resendRegisterOtpLink) {
        resendRegisterOtpLink.addEventListener('click', async (e) => {
            e.preventDefault();
            if (resendRegisterOtpLink.classList.contains('disabled-link')) return;

            const userEmail = document.getElementById('otpEmail').value;
            if (!userEmail) {
                showAlert('Error', 'Could not find the email to resend the code.');
                return;
            }

            resendRegisterOtpLink.textContent = 'Sending...';
            resendRegisterOtpLink.classList.add('disabled-link');
            
            const formData = new FormData();
            formData.append('email', userEmail);

            try {
                const response = await fetch('/resend_otp', { method: 'POST', body: formData }); 
                const data = await response.json();
                
                if (data.success) {
                    showAlert('Success', 'A new verification code has been sent.');
                    startRegisterResendCountdown();
                } else {
                    showAlert('Error', data.message || 'Failed to resend code.');
                    resendRegisterOtpLink.classList.remove('disabled-link');
                }
            } catch (error) {
                showAlert('Error', 'An unexpected network error occurred.');
                resendRegisterOtpLink.classList.remove('disabled-link');
            } finally {
                resendRegisterOtpLink.textContent = 'Resend Code';
            }
        });
    }

    const signInForm = document.getElementById('signInForm');
    if (signInForm) {
        signInForm.addEventListener('submit', async (e) => {
            e.preventDefault();
            const submitBtn = signInForm.querySelector('button[type="submit"]');
            submitBtn.classList.add('btn-loading');
            const formData = new FormData(signInForm);
            try {
                const response = await fetch('/login', { method: 'POST', body: formData }); 
                const data = await response.json();
                if (data.success) {
                    if (data.redirect) {
                        window.location.href = data.redirect;
                    } else {
                        window.location.reload();
                    }
                } else {
                    showAlert('Login Failed', data.message);
                }
            } catch (error) {
                console.error('Login error:', error);
                showAlert('Error', 'An unexpected network error occurred.');
            } finally {
                submitBtn.classList.remove('btn-loading');
            }
        });
    }

    const otpForm = document.getElementById('otpForm');
    if (otpForm) {
        otpForm.addEventListener('submit', async (e) => {
            e.preventDefault();
            const submitBtn = otpForm.querySelector('button[type="submit"]');
            submitBtn.classList.add('btn-loading');
            const formData = new FormData(otpForm);

            try {
                const response = await fetch('/verify_otp', { method: 'POST', body: formData }); 
                const data = await response.json();
                
                if (data.success) {
                    closeOtpModal();
                    showAlert('Success!', data.message);
                } else {
                    showAlert('Verification Failed', data.message);
                }
            } catch (error) {
                console.error('OTP Verification error:', error);
                showAlert('Error', 'An unexpected network error occurred during verification.');
            } finally {
                submitBtn.classList.remove('btn-loading');
            }
        });
    }

    // --- PASSWORD RESET FLOW ---
    const forgotPasswordForm = document.getElementById('forgotPasswordForm');
    const resetOtpForm = document.getElementById('resetOtpForm');
    const setNewPasswordForm = document.getElementById('setNewPasswordForm');

    if (forgotPasswordForm) {
        forgotPasswordForm.addEventListener('submit', async (e) => {
            e.preventDefault();
            const submitBtn = forgotPasswordForm.querySelector('button[type="submit"]');
            submitBtn.classList.add('btn-loading');
            const formData = new FormData(forgotPasswordForm);
            const userEmail = formData.get('email');
            try {
                const response = await fetch('/forgot_password', { method: 'POST', body: formData }); 
                const data = await response.json();
                if (data.success) {
                    closeModal(forgotPasswordModal);
                    document.getElementById('resetOtpEmail').value = userEmail; 
                    resetOtpModal.style.display = 'flex';
                    startResendCountdown();
                } else {
                    showAlert('Error', data.message);
                }
            } catch (error) {
                console.error('Forgot password error:', error);
                showAlert('Error', 'An unexpected network error occurred.');
            } finally {
                submitBtn.classList.remove('btn-loading');
            }
        });
    }

    if (resendOtpLink) {
        resendOtpLink.addEventListener('click', async (e) => {
            e.preventDefault();
            if (resendOtpLink.classList.contains('disabled-link')) return;
            const userEmail = document.getElementById('resetOtpEmail').value;
            if (!userEmail) {
                showAlert('Error', 'Could not find the email to resend the code.');
                return;
            }
            resendOtpLink.textContent = 'Sending...';
            resendOtpLink.classList.add('disabled-link');
            const formData = new FormData();
            formData.append('email', userEmail);
            try {
                const response = await fetch('/forgot_password', { method: 'POST', body: formData }); 
                const data = await response.json();
                if (data.success) {
                    showAlert('Success', 'A new reset code has been sent to your email.');
                    startResendCountdown();
                } else {
                    showAlert('Error', data.message || 'Failed to resend code.');
                }
            } catch (error) {
                showAlert('Error', 'An unexpected network error occurred.');
            } finally {
                resendOtpLink.textContent = 'Resend Code';
            }
        });
    }

    if (resetOtpForm) {
        resetOtpForm.addEventListener('submit', async (e) => {
            e.preventDefault();
            const submitBtn = resetOtpForm.querySelector('button[type="submit"]');
            submitBtn.classList.add('btn-loading');
            const formData = new FormData(resetOtpForm);
            const userEmail = formData.get('email');
            try {
                const response = await fetch('/verify_reset_otp', { method: 'POST', body: formData }); 
                const data = await response.json();
                if (data.success) {
                    clearInterval(resendTimer);
                    closeModal(resetOtpModal); 
                    document.getElementById('setNewPasswordEmail').value = userEmail; 
                    setNewPasswordModal.style.display = 'flex';
                } else {
                    showAlert('Verification Failed', data.message);
                }
            } catch (error) {
                console.error('Reset OTP error:', error);
            } finally {
                submitBtn.classList.remove('btn-loading');
            }
        });
    }

    if (setNewPasswordForm) {
        setNewPasswordForm.addEventListener('submit', async (e) => {
            e.preventDefault();
            const submitBtn = setNewPasswordForm.querySelector('button[type="submit"]');
            submitBtn.classList.add('btn-loading');
            const formData = new FormData(setNewPasswordForm);
            try {
                const response = await fetch('/update_password', { method: 'POST', body: formData }); 
                const data = await response.json();
                closeModal(setNewPasswordModal);
                showAlert(data.success ? 'Success!' : 'Error', data.message);
            } catch (error) {
                console.error('Update password error:', error);
            } finally {
                submitBtn.classList.remove('btn-loading');
            }
        });
    }

    // --- REAL-TIME PASSWORD VALIDATION ---
    const registerPasswordInput = document.getElementById('registerPassword');
    const passwordRulesModal = document.getElementById('password-rules-modal');
    const lengthRule = document.getElementById('length');
    const capitalRule = document.getElementById('capital');
    const specialRule = document.getElementById('special');

    if (registerPasswordInput && passwordRulesModal && lengthRule && capitalRule && specialRule) {
        registerPasswordInput.addEventListener('focus', () => {
            passwordRulesModal.classList.add('show');
        });
        registerPasswordInput.addEventListener('blur', () => {
            passwordRulesModal.classList.remove('show');
        });
        registerPasswordInput.addEventListener('input', () => {
            const password = registerPasswordInput.value;
            if (password.length >= 6) { lengthRule.classList.replace('invalid', 'valid'); } 
            else { lengthRule.classList.replace('valid', 'invalid'); }
            if (/[A-Z]/.test(password)) { capitalRule.classList.replace('invalid', 'valid'); } 
            else { capitalRule.classList.replace('valid', 'invalid'); }
            if (/[^A-Za-z0-9]/.test(password)) { specialRule.classList.replace('invalid', 'valid'); } 
            else { specialRule.classList.replace('valid', 'invalid'); }
        });
    }
});
</script>