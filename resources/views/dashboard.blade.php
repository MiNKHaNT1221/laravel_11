@extends('layouts.app')

@section('content')
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            position: relative;
            overflow-x: hidden;
        }

        /* Skyline Background */
        .skyline {
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 150px;
            background: linear-gradient(to top, rgba(0,0,0,0.2) 0%, transparent 100%);
            z-index: 0;
        }

        .skyline::before {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 80px;
            background: 
                polygon(0% 100%, 6% 70%, 10% 100%, 14% 50%, 18% 100%, 24% 40%, 28% 100%, 34% 65%, 38% 100%, 44% 30%, 48% 100%, 54% 55%, 58% 100%, 64% 45%, 68% 100%, 74% 60%, 78% 100%, 84% 35%, 88% 100%, 94% 50%, 98% 100%, 100% 100%);
            background-color: rgba(0,0,0,0.3);
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            position: relative;
            z-index: 1;
        }

        .header {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 20px;
            padding: 30px;
            margin-bottom: 30px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            position: relative;
            overflow: hidden;
        }

        .header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, #667eea, #764ba2);
        }

        .header-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 20px;
        }

        .header h1 {
            color: #4c63d2;
            font-size: 2.2em;
            font-weight: bold;
        }

        .header p {
            color: #666;
            margin-top: 5px;
        }

        .stats {
            display: flex;
            gap: 30px;
            align-items: center;
        }

        .stat-item {
            text-align: center;
            padding: 15px;
            background: rgba(102, 126, 234, 0.1);
            border-radius: 15px;
            min-width: 80px;
        }

        .stat-number {
            font-size: 1.8em;
            font-weight: bold;
            color: #4c63d2;
        }

        .stat-label {
            font-size: 0.85em;
            color: #666;
            margin-top: 5px;
        }

        .main-content {
            display: grid;
            grid-template-columns: 1fr 400px;
            gap: 30px;
        }

        .job-form-section {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 20px;
            padding: 40px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .sidebar {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .sidebar-section {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 20px;
            padding: 25px;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .section-title {
            font-size: 1.5em;
            font-weight: bold;
            color: #4c63d2;
            margin-bottom: 25px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .section-title::before {
            content: '';
            width: 4px;
            height: 25px;
            background: linear-gradient(135deg, #667eea, #764ba2);
            border-radius: 2px;
        }

        .form-group {
            margin-bottom: 25px;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #333;
            font-size: 0.95em;
        }

        .required {
            color: #e74c3c;
        }

        input, select, textarea {
            width: 100%;
            padding: 15px;
            border: 2px solid rgba(102, 126, 234, 0.2);
            border-radius: 12px;
            font-size: 16px;
            transition: all 0.3s ease;
            background: rgba(255, 255, 255, 0.9);
            font-family: inherit;
        }

        input:focus, select:focus, textarea:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
            transform: translateY(-1px);
        }

        textarea {
            min-height: 120px;
            resize: vertical;
        }

        .rich-editor {
            min-height: 200px;
            border: 2px solid rgba(102, 126, 234, 0.2);
            border-radius: 12px;
            background: white;
        }

        .skills-input {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            padding: 10px;
            border: 2px solid rgba(102, 126, 234, 0.2);
            border-radius: 12px;
            background: rgba(255, 255, 255, 0.9);
            min-height: 50px;
            align-items: flex-start;
        }

        .skill-tag {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 0.85em;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .skill-remove {
            cursor: pointer;
            font-weight: bold;
            opacity: 0.8;
        }

        .skill-remove:hover {
            opacity: 1;
        }

        .skill-input-field {
            border: none;
            outline: none;
            background: transparent;
            flex: 1;
            min-width: 120px;
            padding: 8px;
        }

        .btn {
            padding: 15px 30px;
            border: none;
            border-radius: 25px;
            font-size: 1em;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .btn-primary {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            box-shadow: 0 10px 25px rgba(102, 126, 234, 0.3);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 15px 35px rgba(102, 126, 234, 0.4);
        }

        .btn-secondary {
            background: rgba(102, 126, 234, 0.1);
            color: #4c63d2;
            border: 2px solid rgba(102, 126, 234, 0.2);
        }

        .btn-secondary:hover {
            background: rgba(102, 126, 234, 0.2);
            transform: translateY(-1px);
        }

        .form-actions {
            display: flex;
            gap: 15px;
            justify-content: flex-end;
            margin-top: 30px;
            padding-top: 30px;
            border-top: 1px solid rgba(102, 126, 234, 0.1);
        }

        .job-preview {
            background: rgba(102, 126, 234, 0.05);
            border: 1px solid rgba(102, 126, 234, 0.1);
            border-radius: 15px;
            padding: 20px;
            margin-top: 20px;
        }

        .preview-title {
            font-size: 1.3em;
            font-weight: bold;
            color: #4c63d2;
            margin-bottom: 10px;
        }

        .preview-company {
            color: #666;
            margin-bottom: 15px;
        }

        .preview-details {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(120px, 1fr));
            gap: 15px;
            margin-bottom: 15px;
        }

        .preview-detail {
            background: white;
            padding: 10px;
            border-radius: 8px;
            text-align: center;
            border: 1px solid rgba(102, 126, 234, 0.1);
        }

        .preview-detail-label {
            font-size: 0.8em;
            color: #666;
            margin-bottom: 5px;
        }

        .preview-detail-value {
            font-weight: 600;
            color: #4c63d2;
        }

        .recent-jobs {
            list-style: none;
        }

        .job-item {
            padding: 15px;
            background: rgba(102, 126, 234, 0.05);
            border-radius: 12px;
            margin-bottom: 15px;
            border: 1px solid rgba(102, 126, 234, 0.1);
            transition: all 0.3s ease;
        }

        .job-item:hover {
            transform: translateX(5px);
            background: rgba(102, 126, 234, 0.1);
        }

        .job-item-title {
            font-weight: 600;
            color: #4c63d2;
            margin-bottom: 5px;
        }

        .job-item-meta {
            font-size: 0.85em;
            color: #666;
            display: flex;
            justify-content: space-between;
        }

        .status-badge {
            padding: 4px 10px;
            border-radius: 12px;
            font-size: 0.8em;
            font-weight: 600;
        }

        .status-active {
            background: #e8f5e8;
            color: #27ae60;
        }

        .status-pending {
            background: #fff3e0;
            color: #f39c12;
        }

        .floating-elements {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: 0;
        }

        .floating-dot {
            position: absolute;
            width: 6px;
            height: 6px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            animation: float 8s ease-in-out infinite;
        }

        .floating-dot:nth-child(1) { top: 15%; left: 10%; animation-delay: 0s; }
        .floating-dot:nth-child(2) { top: 70%; left: 90%; animation-delay: 3s; }
        .floating-dot:nth-child(3) { top: 30%; left: 85%; animation-delay: 6s; }
        .floating-dot:nth-child(4) { top: 85%; left: 15%; animation-delay: 2s; }
        .floating-dot:nth-child(5) { top: 50%; left: 5%; animation-delay: 5s; }
        .floating-dot:nth-child(6) { top: 25%; left: 70%; animation-delay: 4s; }

        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); opacity: 0.2; }
            50% { transform: translateY(-30px) rotate(180deg); opacity: 0.6; }
        }

        @media (max-width: 1024px) {
            .main-content {
                grid-template-columns: 1fr;
            }
            
            .header-content {
                text-align: center;
            }
            
            .stats {
                justify-content: center;
            }
        }

        @media (max-width: 768px) {
            .container {
                padding: 15px;
            }
            
            .form-row {
                grid-template-columns: 1fr;
            }
            
            .job-form-section, .sidebar-section {
                padding: 25px;
            }
            
            .stats {
                flex-wrap: wrap;
                gap: 15px;
            }
            
            .form-actions {
                flex-direction: column;
            }
            
            .btn {
                width: 100%;
            }
        }
    </style>
    <div class="floating-elements">
        <div class="floating-dot"></div>
        <div class="floating-dot"></div>
        <div class="floating-dot"></div>
        <div class="floating-dot"></div>
        <div class="floating-dot"></div>
        <div class="floating-dot"></div>
    </div>
    <div class="skyline"></div>
    <div class="container">
        <div class="header">
            <div class="header-content">
                <div>
                    <h1>Job Creator Dashboard</h1>
                    <p>Create and manage your job listings</p>
                </div>
                <div class="stats">
                    <div class="stat-item">
                        <div class="stat-number">12</div>
                        <div class="stat-label">Active Jobs</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number">234</div>
                        <div class="stat-label">Applications</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number">8</div>
                        <div class="stat-label">Hired</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="main-content">
            <div class="job-form-section">
                <div class="section-title">Create New Job Listing</div>
                <!-- ...form HTML as in your dashboard file... -->
            </div>
            <div class="sidebar">
                <div class="sidebar-section">
                    <div class="section-title">Quick Actions</div>
                    <button class="btn btn-secondary" style="width: 100%; margin-bottom: 10px;">📊 View Analytics</button>
                    <button class="btn btn-secondary" style="width: 100%; margin-bottom: 10px;">📋 Manage Applications</button>
                    <button class="btn btn-secondary" style="width: 100%;">⚙️ Account Settings</button>
                </div>
                <div class="sidebar-section">
                    <div class="section-title">Recent Jobs</div>
                    <ul class="recent-jobs">
                        <li class="job-item">
                            <div class="job-item-title">Frontend Developer</div>
                            <div class="job-item-meta">
                                <span>45 applications</span>
                                <span class="status-badge status-active">Active</span>
                            </div>
                        </li>
                        <li class="job-item">
                            <div class="job-item-title">Product Manager</div>
                            <div class="job-item-meta">
                                <span>23 applications</span>
                                <span class="status-badge status-active">Active</span>
                            </div>
                        </li>
                        <li class="job-item">
                            <div class="job-item-title">UX Designer</div>
                            <div class="job-item-meta">
                                <span>12 applications</span>
                                <span class="status-badge status-pending">Pending</span>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="sidebar-section">
                    <div class="section-title">Tips & Guidelines</div>
                    <div style="font-size: 0.9em; line-height: 1.6; color: #666;">
                        <p style="margin-bottom: 10px;">✨ <strong>Be specific:</strong> Clear job titles get 30% more applications.</p>
                        <p style="margin-bottom: 10px;">💰 <strong>Include salary:</strong> Salary ranges increase application rates.</p>
                        <p style="margin-bottom: 10px;">🎯 <strong>Use keywords:</strong> Help candidates find your job easily.</p>
                        <p>📱 <strong>Mobile friendly:</strong> Most candidates browse on mobile devices.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        // Skills input functionality
        // ...full JS from your dashboard HTML goes here...
    </script>
@endsection
