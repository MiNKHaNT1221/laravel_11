@extends('layouts.app')

@section('content')
    <div class="floating-elements">
        <div class="floating-dot"></div>
        <div class="floating-dot"></div>
        <div class="floating-dot"></div>
        <div class="floating-dot"></div>
        <div class="floating-dot"></div>
    </div>
    <div class="skyline"></div>
    <div class="container">
        <div class="header">
            <h1>Job Creator Upgrade</h1>
            <p>Verify your company ownership and upgrade your account</p>
        </div>
        <div class="form-container">
            @if(session('success'))
                <div style="color: green; text-align: center; margin-bottom: 20px; font-weight: bold;">{{ session('success') }}</div>
            @endif
            @if($errors->any())
                <div style="color: #e74c3c; text-align: center; margin-bottom: 20px; font-weight: bold;">
                    Please fix the errors below.<br>
                    <ul style="list-style: none; padding: 0;">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form id="upgradeForm" method="POST" action="{{ route('upgrade.submit') }}" enctype="multipart/form-data">
                @csrf
                <div class="section">
                    <div class="section-title">Personal Information</div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="firstName">First Name <span class="required">*</span></label>
                            <input type="text" id="firstName" name="firstName" value="{{ old('firstName') }}" required>
                        </div>
                        <div class="form-group">
                            <label for="lastName">Last Name <span class="required">*</span></label>
                            <input type="text" id="lastName" name="lastName" value="{{ old('lastName') }}" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="email">Email Address <span class="required">*</span></label>
                            <input type="email" id="email" name="email" value="{{ old('email') }}" required>
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone Number <span class="required">*</span></label>
                            <input type="tel" id="phone" name="phone" value="{{ old('phone') }}" required>
                        </div>
                    </div>
                </div>
                <div class="section">
                    <div class="section-title">Company Information</div>
                    <div class="form-group">
                        <label for="companyName">Company Name <span class="required">*</span></label>
                        <input type="text" id="companyName" name="companyName" value="{{ old('companyName') }}" required>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="registrationNumber">Company Registration Number <span class="required">*</span></label>
                            <input type="text" id="registrationNumber" name="registrationNumber" value="{{ old('registrationNumber') }}" required>
                        </div>
                        <div class="form-group">
                            <label for="taxId">Tax ID/EIN <span class="required">*</span></label>
                            <input type="text" id="taxId" name="taxId" value="{{ old('taxId') }}" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="companyAddress">Company Address <span class="required">*</span></label>
                        <textarea id="companyAddress" name="companyAddress" required>{{ old('companyAddress') }}</textarea>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="industry">Industry <span class="required">*</span></label>
                            <select id="industry" name="industry" required>
                                <option value="">Select Industry</option>
                                <option value="technology" {{ old('industry')=='technology'?'selected':'' }}>Technology</option>
                                <option value="healthcare" {{ old('industry')=='healthcare'?'selected':'' }}>Healthcare</option>
                                <option value="finance" {{ old('industry')=='finance'?'selected':'' }}>Finance</option>
                                <option value="education" {{ old('industry')=='education'?'selected':'' }}>Education</option>
                                <option value="manufacturing" {{ old('industry')=='manufacturing'?'selected':'' }}>Manufacturing</option>
                                <option value="retail" {{ old('industry')=='retail'?'selected':'' }}>Retail</option>
                                <option value="construction" {{ old('industry')=='construction'?'selected':'' }}>Construction</option>
                                <option value="hospitality" {{ old('industry')=='hospitality'?'selected':'' }}>Hospitality</option>
                                <option value="other" {{ old('industry')=='other'?'selected':'' }}>Other</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="companySize">Company Size <span class="required">*</span></label>
                            <select id="companySize" name="companySize" required>
                                <option value="">Select Size</option>
                                <option value="1-10" {{ old('companySize')=='1-10'?'selected':'' }}>1-10 employees</option>
                                <option value="11-50" {{ old('companySize')=='11-50'?'selected':'' }}>11-50 employees</option>
                                <option value="51-200" {{ old('companySize')=='51-200'?'selected':'' }}>51-200 employees</option>
                                <option value="201-500" {{ old('companySize')=='201-500'?'selected':'' }}>201-500 employees</option>
                                <option value="500+" {{ old('companySize')=='500+'?'selected':'' }}>500+ employees</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="companyWebsite">Company Website</label>
                        <input type="url" id="companyWebsite" name="companyWebsite" value="{{ old('companyWebsite') }}" placeholder="https://www.yourcompany.com">
                    </div>
                </div>
                <div class="section">
                    <div class="section-title">Ownership Verification</div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="position">Your Position in Company <span class="required">*</span></label>
                            <select id="position" name="position" required>
                                <option value="">Select Position</option>
                                <option value="owner" {{ old('position')=='owner'?'selected':'' }}>Owner</option>
                                <option value="ceo" {{ old('position')=='ceo'?'selected':'' }}>CEO</option>
                                <option value="founder" {{ old('position')=='founder'?'selected':'' }}>Founder</option>
                                <option value="partner" {{ old('position')=='partner'?'selected':'' }}>Partner</option>
                                <option value="hr-manager" {{ old('position')=='hr-manager'?'selected':'' }}>HR Manager</option>
                                <option value="other" {{ old('position')=='other'?'selected':'' }}>Other</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="ownershipPercentage">Ownership Percentage</label>
                            <input type="number" id="ownershipPercentage" name="ownershipPercentage" min="0" max="100" value="{{ old('ownershipPercentage') }}" placeholder="%">
                        </div>
                    </div>
                </div>
                <div class="section">
                    <div class="section-title">Document Upload</div>
                    <div class="form-group">
                        <label for="businessLicense">Business License/Certificate of Incorporation <span class="required">*</span></label>
                        <div class="file-upload">
                            <input type="file" id="businessLicense" name="businessLicense" accept=".pdf,.jpg,.png,.doc,.docx" required>
                            <label for="businessLicense" class="file-upload-label">
                                📄 Click to upload business license or drag and drop
                                <small style="display: block; margin-top: 5px; opacity: 0.7;">Supported formats: PDF, JPG, PNG, DOC, DOCX</small>
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="proofOfAddress">Proof of Business Address <span class="required">*</span></label>
                        <div class="file-upload">
                            <input type="file" id="proofOfAddress" name="proofOfAddress" accept=".pdf,.jpg,.png,.doc,.docx" required>
                            <label for="proofOfAddress" class="file-upload-label">
                                🏢 Click to upload proof of address or drag and drop
                                <small style="display: block; margin-top: 5px; opacity: 0.7;">Utility bill, lease agreement, or bank statement</small>
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="identification">Government-issued ID <span class="required">*</span></label>
                        <div class="file-upload">
                            <input type="file" id="identification" name="identification" accept=".pdf,.jpg,.png" required>
                            <label for="identification" class="file-upload-label">
                                🆔 Click to upload ID or drag and drop
                                <small style="display: block; margin-top: 5px; opacity: 0.7;">Driver's license, passport, or national ID</small>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="section">
                    <div class="section-title">Additional Information</div>
                    <div class="form-group">
                        <label for="jobPostingPlans">How many job positions do you plan to post monthly?</label>
                        <select id="jobPostingPlans" name="jobPostingPlans">
                            <option value="">Select Range</option>
                            <option value="1-5" {{ old('jobPostingPlans')=='1-5'?'selected':'' }}>1-5 positions</option>
                            <option value="6-15" {{ old('jobPostingPlans')=='6-15'?'selected':'' }}>6-15 positions</option>
                            <option value="16-30" {{ old('jobPostingPlans')=='16-30'?'selected':'' }}>16-30 positions</option>
                            <option value="30+" {{ old('jobPostingPlans')=='30+'?'selected':'' }}>30+ positions</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="additionalInfo">Additional Comments</label>
                        <textarea id="additionalInfo" name="additionalInfo" placeholder="Any additional information that might help verify your company ownership...">{{ old('additionalInfo') }}</textarea>
                    </div>
                </div>
                <div class="section">
                    <div class="checkbox-group">
                        <input type="checkbox" id="terms" name="terms" required {{ old('terms') ? 'checked' : '' }}>
                        <label for="terms">
                            I hereby declare that all the information provided is true and accurate. I understand that providing false information may result in account termination. I agree to the <strong>Terms of Service</strong> and <strong>Privacy Policy</strong> for job creator accounts. <span class="required">*</span>
                        </label>
                    </div>
                </div>
                <div class="submit-section">
                    <button type="submit" class="submit-btn">Submit Application</button>
                    <p style="margin-top: 15px; color: #666; font-size: 0.9em;">
                        Your application will be reviewed within 2-3 business days
                    </p>
                </div>
            </form>
        </div>
    </div>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Arial', sans-serif; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); min-height: 100vh; padding: 20px; position: relative; overflow-x: hidden; }
        .skyline { position: fixed; bottom: 0; left: 0; width: 100%; height: 200px; background: linear-gradient(to top, rgba(0,0,0,0.3) 0%, transparent 100%); z-index: 0; }
        .container { max-width: 800px; margin: 0 auto; background: rgba(255, 255, 255, 0.95); border-radius: 20px; box-shadow: 0 30px 60px rgba(0, 0, 0, 0.3); backdrop-filter: blur(10px); border: 1px solid rgba(255, 255, 255, 0.2); position: relative; z-index: 1; overflow: hidden; }
        .header { background: linear-gradient(135deg, #667eea, #764ba2); padding: 40px 30px; text-align: center; color: white; position: relative; }
        .header h1 { font-size: 2.5em; margin-bottom: 10px; position: relative; text-shadow: 2px 2px 4px rgba(0,0,0,0.3); }
        .header p { font-size: 1.1em; opacity: 0.9; position: relative; }
        .form-container { padding: 40px 30px; }
        .section { margin-bottom: 35px; padding: 25px; background: rgba(102, 126, 234, 0.05); border-radius: 15px; border: 1px solid rgba(102, 126, 234, 0.1); transition: all 0.3s ease; }
        .section:hover { transform: translateY(-2px); box-shadow: 0 10px 25px rgba(102, 126, 234, 0.15); }
        .section-title { font-size: 1.4em; font-weight: bold; color: #4c63d2; margin-bottom: 20px; display: flex; align-items: center; gap: 10px; }
        .section-title::before { content: ''; width: 4px; height: 25px; background: linear-gradient(135deg, #667eea, #764ba2); border-radius: 2px; }
        .form-group { margin-bottom: 20px; }
        .form-row { display: grid; grid-template-columns: 1fr 1fr; gap: 20px; }
        label { display: block; margin-bottom: 8px; font-weight: 600; color: #333; font-size: 0.95em; }
        .required { color: #e74c3c; }
        input, select, textarea { width: 100%; padding: 15px; border: 2px solid rgba(102, 126, 234, 0.2); border-radius: 10px; font-size: 16px; transition: all 0.3s ease; background: rgba(255, 255, 255, 0.8); }
        input:focus, select:focus, textarea:focus { outline: none; border-color: #667eea; box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1); transform: translateY(-1px); }
        textarea { min-height: 120px; resize: vertical; }
        .file-upload { position: relative; display: inline-block; width: 100%; }
        .file-upload input[type="file"] { position: absolute; opacity: 0; width: 100%; height: 100%; cursor: pointer; }
        .file-upload-label { display: block; padding: 15px; border: 2px dashed rgba(102, 126, 234, 0.4); border-radius: 10px; text-align: center; cursor: pointer; transition: all 0.3s ease; background: rgba(102, 126, 234, 0.05); }
        .file-upload-label:hover { border-color: #667eea; background: rgba(102, 126, 234, 0.1); }
        .checkbox-group { display: flex; align-items: flex-start; gap: 15px; margin-top: 10px; padding: 20px; background: rgba(102, 126, 234, 0.05); border-radius: 10px; border: 1px solid rgba(102, 126, 234, 0.1); }
        .checkbox-group input[type="checkbox"] { width: auto; margin: 0; transform: scale(1.2); }
        .checkbox-group label { margin: 0; flex: 1; font-size: 0.9em; line-height: 1.5; }
        .submit-section { text-align: center; padding: 30px 0; }
        .submit-btn { background: linear-gradient(135deg, #667eea, #764ba2); color: white; padding: 18px 50px; border: none; border-radius: 50px; font-size: 1.1em; font-weight: bold; cursor: pointer; transition: all 0.3s ease; box-shadow: 0 10px 25px rgba(102, 126, 234, 0.3); }
        .submit-btn:hover { transform: translateY(-3px); box-shadow: 0 15px 35px rgba(102, 126, 234, 0.4); }
        .submit-btn:active { transform: translateY(-1px); }
        @media (max-width: 768px) { .form-row { grid-template-columns: 1fr; } .container { margin: 10px; } .header { padding: 30px 20px; } .form-container { padding: 30px 20px; } }
        .floating-elements { position: fixed; top: 0; left: 0; width: 100%; height: 100%; pointer-events: none; z-index: 0; }
        .floating-dot { position: absolute; width: 8px; height: 8px; background: rgba(255, 255, 255, 0.3); border-radius: 50%; animation: float 6s ease-in-out infinite; }
        .floating-dot:nth-child(1) { top: 20%; left: 10%; animation-delay: 0s; }
        .floating-dot:nth-child(2) { top: 60%; left: 85%; animation-delay: 2s; }
        .floating-dot:nth-child(3) { top: 40%; left: 20%; animation-delay: 4s; }
        .floating-dot:nth-child(4) { top: 80%; left: 70%; animation-delay: 1s; }
        .floating-dot:nth-child(5) { top: 10%; left: 80%; animation-delay: 3s; }
        @keyframes float { 0%, 100% { transform: translateY(0px) rotate(0deg); } 50% { transform: translateY(-20px) rotate(180deg); } }
    </style>
    <script>
        // Form submission handling
        document.getElementById('upgradeForm').addEventListener('submit', function(e) {
            e.preventDefault();
            // Simple form validation
            const requiredFields = this.querySelectorAll('input[required], select[required], textarea[required]');
            let isValid = true;
            requiredFields.forEach(field => {
                if (!field.value.trim()) {
                    field.style.borderColor = '#e74c3c';
                    isValid = false;
                } else {
                    field.style.borderColor = 'rgba(102, 126, 234, 0.2)';
                }
            });
            if (isValid) {
                // Simulate form submission
                const submitBtn = this.querySelector('.submit-btn');
                const originalText = submitBtn.textContent;
                submitBtn.textContent = 'Submitting...';
                submitBtn.disabled = true;
                setTimeout(() => {
                    alert('Application submitted successfully! You will receive a confirmation email shortly.');
                    submitBtn.textContent = originalText;
                    submitBtn.disabled = false;
                    this.reset();
                }, 2000);
            } else {
                alert('Please fill in all required fields.');
            }
        });
        // File upload preview
        document.querySelectorAll('input[type="file"]').forEach(input => {
            input.addEventListener('change', function() {
                const label = this.nextElementSibling;
                const fileName = this.files[0] ? this.files[0].name : 'Click to upload or drag and drop';
                const icon = this.files[0] ? '✓' : '📄';
                label.innerHTML = `${icon} ${fileName}`;
                if (this.files[0]) {
                    label.style.borderColor = '#667eea';
                    label.style.background = 'rgba(102, 126, 234, 0.1)';
                }
            });
        });
        // Smooth animations on scroll
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        });
        document.querySelectorAll('.section').forEach(section => {
            section.style.opacity = '0';
            section.style.transform = 'translateY(30px)';
            section.style.transition = 'all 0.6s ease';
            observer.observe(section);
        });
// @endsection
    </script>
{{-- @endsection --}}
