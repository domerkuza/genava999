<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hackathon Platform - Project Details</title>
    <style>
        /* Reset and Base Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background: linear-gradient(135deg, #0f172a, #1e293b);
            color: #f8fafc;
            line-height: 1.6;
            min-height: 100vh;
            display: flex;
        }

        /* Grid Background */
        .bg-grid {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-size: 40px 40px;
            background-image:
                linear-gradient(to right, rgba(255, 255, 255, 0.03) 1px, transparent 1px),
                linear-gradient(to bottom, rgba(255, 255, 255, 0.03) 1px, transparent 1px);
            z-index: -1;
        }

        /* Sidebar */
        .sidebar {
            width: 70px;
            background: rgba(15, 23, 42, 0.9);
            border-right: 1px solid rgba(255, 255, 255, 0.1);
            height: 100vh;
            position: fixed;
            overflow: hidden;
            transition: width 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            z-index: 100;
        }

        .sidebar:hover {
            width: 250px;
        }

        .sidebar-header {
            padding: 1.5rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            display: flex;
            align-items: center;
            height: 70px;
        }

        .logo-icon {
            width: 40px;
            height: 40px;
            border-radius: 8px;
            background: linear-gradient(135deg, #3b82f6, #10b981);
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            color: white;
            font-size: 1.25rem;
            flex-shrink: 0;
        }

        .logo-text {
            margin-left: 1rem;
            font-size: 1.25rem;
            font-weight: 700;
            background: linear-gradient(90deg, #3b82f6, #10b981);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            white-space: nowrap;
        }

        .sidebar-menu {
            padding: 1rem 0;
            overflow-y: auto;
            height: calc(100vh - 70px);
        }

        .menu-title {
            color: #64748b;
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            padding: 0.75rem 1.5rem;
            margin-top: 1rem;
            white-space: nowrap;
        }

        .menu-item {
            display: flex;
            align-items: center;
            padding: 0.75rem 1.5rem;
            color: #cbd5e1;
            text-decoration: none;
            transition: all 0.2s ease;
            border-left: 3px solid transparent;
            white-space: nowrap;
        }

        .menu-item:hover,
        .menu-item.active {
            background-color: rgba(59, 130, 246, 0.1);
            color: #f8fafc;
            border-left-color: #3b82f6;
        }

        .menu-item.active {
            background-color: rgba(16, 185, 129, 0.1);
            border-left-color: #10b981;
        }

        .menu-icon {
            width: 20px;
            height: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 1rem;
            flex-shrink: 0;
        }

        .menu-text {
            opacity: 0;
            transition: opacity 0.2s ease;
        }

        .sidebar:hover .menu-text {
            opacity: 1;
        }

        /* Main Content */
        .main-content {
            flex: 1;
            padding: 2rem;
            margin-left: 70px;
            width: calc(100% - 70px);
            transition: margin-left 0.3s cubic-bezier(0.4, 0, 0.2, 1), width 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
        }

        .page-title {
            font-size: 1.5rem;
            font-weight: 600;
            color: #f8fafc;
        }

        .user-menu {
            display: flex;
            align-items: center;
        }

        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: #3b82f6;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 600;
            margin-right: 0.75rem;
        }

        .user-name {
            color: #e2e8f0;
            font-weight: 500;
        }

        /* Project Details */
        .project-container {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 1.5rem;
        }

        .project-main {
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
        }

        .project-sidebar {
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
        }

        .card {
            background: rgba(15, 23, 42, 0.7);
            border-radius: 12px;
            padding: 1.5rem;
            border: 1px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
            padding-bottom: 0.75rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .card-title {
            font-size: 1.25rem;
            font-weight: 600;
            color: #f8fafc;
        }

        .project-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 1rem;
        }

        .project-title {
            font-size: 1.75rem;
            font-weight: 700;
            color: #f8fafc;
            margin-bottom: 0.5rem;
        }

        .project-category {
            display: inline-block;
            padding: 0.25rem 0.75rem;
            border-radius: 9999px;
            font-size: 0.75rem;
            font-weight: 600;
            background-color: rgba(59, 130, 246, 0.2);
            color: #60a5fa;
            margin-bottom: 0.5rem;
        }

        .project-meta {
            display: flex;
            flex-wrap: wrap;
            gap: 1rem;
            margin-bottom: 1rem;
        }

        .meta-item {
            display: flex;
            align-items: center;
            color: #94a3b8;
            font-size: 0.875rem;
        }

        .meta-icon {
            margin-right: 0.5rem;
            width: 16px;
            height: 16px;
        }

        .project-status {
            display: inline-block;
            padding: 0.25rem 0.75rem;
            border-radius: 9999px;
            font-size: 0.75rem;
            font-weight: 600;
        }

        .status-valide {
            background-color: rgba(16, 185, 129, 0.2);
            color: #34d399;
        }

        .status-pending {
            background-color: rgba(249, 115, 22, 0.2);
            color: #fb923c;
        }

        .status-invalide {
            background-color: rgba(239, 68, 68, 0.2);
            color: #f87171;
        }

        .project-description {
            color: #cbd5e1;
            line-height: 1.7;
            margin-bottom: 1.5rem;
        }

        /* Team Members */
        .team-members {
            display: flex;
            flex-wrap: wrap;
            gap: 1rem;
            margin-top: 1rem;
        }

        .team-member {
            display: flex;
            align-items: center;
            background: rgba(30, 41, 59, 0.5);
            padding: 0.75rem 1rem;
            border-radius: 8px;
            border: 1px solid rgba(255, 255, 255, 0.05);
            width: calc(50% - 0.5rem);
        }

        .team-member-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: #3b82f6;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 600;
            font-size: 0.875rem;
            margin-right: 0.75rem;
            flex-shrink: 0;
        }

        .team-member-info {
            display: flex;
            flex-direction: column;
            overflow: hidden;
        }

        .team-member-name {
            font-size: 0.875rem;
            font-weight: 500;
            color: #f8fafc;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .team-member-role {
            font-size: 0.75rem;
            color: #94a3b8;
        }

        .team-member-contact {
            font-size: 0.75rem;
            color: #60a5fa;
            margin-top: 0.25rem;
        }

        /* Rating */
        .rating {
            display: flex;
            align-items: center;
            gap: 0.25rem;
        }

        .rating-value {
            font-weight: 600;
            font-size: 1rem;
            color: #f8fafc;
        }

        .rating-stars {
            display: flex;
            color: #eab308;
        }

        .rating-count {
            color: #94a3b8;
            font-size: 0.75rem;
            margin-left: 0.5rem;
        }

        /* Jury Notes */
        .jury-notes {
            margin-top: 1rem;
        }

        .jury-note {
            background: rgba(30, 41, 59, 0.5);
            border-radius: 8px;
            padding: 1rem;
            margin-bottom: 1rem;
            border: 1px solid rgba(255, 255, 255, 0.05);
        }

        .jury-note-header {
            display: flex;
            justify-content: space-between;
            margin-bottom: 0.5rem;
        }

        .jury-name {
            font-weight: 600;
            color: #f8fafc;
        }

        .jury-rating {
            display: flex;
            align-items: center;
            color: #eab308;
        }

        .jury-comment {
            color: #cbd5e1;
            font-size: 0.875rem;
            line-height: 1.5;
        }

        /* Media Section */
        .media-container {
            margin-top: 1rem;
        }

        .video-container {
            position: relative;
            width: 100%;
            padding-bottom: 56.25%;
            /* 16:9 Aspect Ratio */
            height: 0;
            overflow: hidden;
            border-radius: 8px;
            background-color: #0f172a;
            margin-bottom: 1rem;
        }

        .video-container iframe,
        .video-container video {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border: none;
        }

        .video-placeholder {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            background-color: rgba(15, 23, 42, 0.8);
            color: #94a3b8;
        }

        .video-placeholder svg {
            width: 48px;
            height: 48px;
            margin-bottom: 1rem;
            color: #60a5fa;
        }

        /* Documents */
        .document-list {
            margin-top: 1rem;
        }

        .document-item {
            display: flex;
            align-items: center;
            background: rgba(30, 41, 59, 0.5);
            padding: 0.75rem 1rem;
            border-radius: 8px;
            border: 1px solid rgba(255, 255, 255, 0.05);
            margin-bottom: 0.75rem;
        }

        .document-icon {
            width: 32px;
            height: 32px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 0.75rem;
            flex-shrink: 0;
        }

        .document-info {
            flex: 1;
            overflow: hidden;
        }

        .document-name {
            font-size: 0.875rem;
            font-weight: 500;
            color: #f8fafc;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .document-meta {
            font-size: 0.75rem;
            color: #94a3b8;
            display: flex;
            align-items: center;
        }

        .document-size {
            margin-right: 0.75rem;
        }

        .document-date {
            display: flex;
            align-items: center;
        }

        .document-date svg {
            margin-right: 0.25rem;
        }

        .document-actions {
            display: flex;
            gap: 0.5rem;
        }

        .document-action {
            background: none;
            border: none;
            color: #94a3b8;
            cursor: pointer;
            padding: 0.25rem;
            transition: color 0.3s ease;
        }

        .document-action:hover {
            color: #f8fafc;
        }

        .document-action.download {
            color:green;
        }

        .document-action.download:hover {
            color:rgb(55, 215, 34);
        }

        /* Upload Section */
        .upload-section {
            margin-top: 1rem;
        }

        .upload-area {
            border: 2px dashed rgba(255, 255, 255, 0.1);
            border-radius: 8px;
            padding: 1.5rem;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .upload-area:hover {
            border-color: #60a5fa;
            background-color: rgba(59, 130, 246, 0.05);
        }

        .upload-icon {
            width: 48px;
            height: 48px;
            margin: 0 auto 1rem;
            color: #60a5fa;
        }

        .upload-text {
            color: #94a3b8;
            margin-bottom: 0.5rem;
        }

        .upload-hint {
            color: #64748b;
            font-size: 0.75rem;
        }

        .upload-input {
            display: none;
        }

        /* Buttons */
        .btn {
            display: inline-block;
            padding: 0.75rem 1.5rem;
            border-radius: 8px;
            font-weight: 600;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s ease;
            border: none;
            font-size: 0.875rem;
        }

        .btn-primary {
            background: linear-gradient(90deg, #3b82f6, #2563eb);
            color: white;
        }

        .btn-primary:hover {
            background: linear-gradient(90deg, #2563eb, #1d4ed8);
            transform: translateY(-2px);
            box-shadow: 0 4px 6px -1px rgba(59, 130, 246, 0.4);
        }

        .btn-success {
            background: linear-gradient(90deg, #10b981, #059669);
            color: white;
        }

        .btn-success:hover {
            background: linear-gradient(90deg, #059669, #047857);
            transform: translateY(-2px);
            box-shadow: 0 4px 6px -1px rgba(16, 185, 129, 0.4);
        }

        .btn-danger {
            background: linear-gradient(90deg, #ef4444, #dc2626);
            color: white;
        }

        .btn-danger:hover {
            background: linear-gradient(90deg, #dc2626, #b91c1c);
            transform: translateY(-2px);
            box-shadow: 0 4px 6px -1px rgba(239, 68, 68, 0.4);
        }

        .btn-sm {
            padding: 0.5rem 1rem;
            font-size: 0.75rem;
        }

        .btn-outline {
            background: transparent;
            border: 1px solid #3b82f6;
            color: #3b82f6;
        }

        .btn-outline:hover {
            background: rgba(59, 130, 246, 0.1);
        }

        .action-buttons {
            display: flex;
            gap: 1rem;
            margin-top: 1.5rem;
        }

        /* Tabs */
        .tabs {
            display: flex;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            margin-bottom: 1.5rem;
        }

        .tab {
            padding: 0.75rem 1.5rem;
            font-weight: 500;
            color: #94a3b8;
            cursor: pointer;
            border-bottom: 2px solid transparent;
            transition: all 0.3s ease;
        }

        .tab:hover {
            color: #f8fafc;
        }

        .tab.active {
            color: #f8fafc;
            border-bottom-color: #3b82f6;
        }

        .tab-content {
            display: none;
        }

        .tab-content.active {
            display: block;
        }

        /* Form Elements */
        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-label {
            display: block;
            margin-bottom: 0.5rem;
            color: #f8fafc;
            font-weight: 500;
        }

        .form-input {
            width: 100%;
            padding: 0.75rem 1rem;
            border-radius: 8px;
            border: 1px solid #334155;
            background-color: #1e293b;
            color: #f8fafc;
            font-size: 0.875rem;
            transition: all 0.3s ease;
        }

        .form-input:focus {
            outline: none;
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.3);
        }

        textarea.form-input {
            resize: vertical;
            min-height: 100px;
        }

        .form-select {
            width: 100%;
            padding: 0.75rem 1rem;
            border-radius: 8px;
            border: 1px solid #334155;
            background-color: #1e293b;
            color: #f8fafc;
            font-size: 0.875rem;
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 24 24' fill='none' stroke='%2394a3b8' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpolyline points='6 9 12 15 18 9'%3E%3C/polyline%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 1rem center;
            background-size: 16px;
        }

        .form-select:focus {
            outline: none;
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.3);
        }

        /* Responsive */
        @media (max-width: 1024px) {
            .project-container {
                grid-template-columns: 1fr;
            }

            .team-member {
                width: 100%;
            }
        }

        @media (max-width: 768px) {
            .project-header {
                flex-direction: column;
            }

            .action-buttons {
                margin-top: 1rem;
            }
        }

        @media (max-width: 640px) {
            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
                overflow: visible;
            }

            .sidebar:hover {
                width: 100%;
            }

            .sidebar-header {
                height: auto;
            }

            .sidebar-menu {
                display: flex;
                flex-wrap: wrap;
                height: auto;
                padding: 0;
            }

            .menu-title {
                display: none;
            }

            .menu-item {
                flex: 1;
                min-width: 80px;
                flex-direction: column;
                text-align: center;
                padding: 0.75rem 0.5rem;
                border-left: none;
                border-bottom: 3px solid transparent;
            }

            .menu-item:hover,
            .menu-item.active {
                border-left-color: transparent;
                border-bottom-color: #3b82f6;
            }

            .menu-item.active {
                border-bottom-color: #10b981;
            }

            .menu-icon {
                margin-right: 0;
                margin-bottom: 0.5rem;
            }

            .menu-text {
                opacity: 1;
                font-size: 0.75rem;
            }

            .main-content {
                margin-left: 0;
                width: 100%;
                padding: 1rem;
            }

            body {
                flex-direction: column;
            }

            .tabs {
                overflow-x: auto;
                white-space: nowrap;
                padding-bottom: 0.5rem;
            }

            .tab {
                padding: 0.75rem 1rem;
            }
        }
    </style>
</head>

<body>
    <div class="bg-grid"></div>

    <!-- Sidebar -->
    <aside class="sidebar">
        <div class="sidebar-header">
            <div class="logo-icon">H</div>
            <div class="logo-text">Hackathon Admin</div>
        </div>
        <nav class="sidebar-menu">
            <p class="menu-title">Main</p>
            <a href="admin-dashboard.html" class="menu-item">
                <span class="menu-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <rect x="3" y="3" width="7" height="7"></rect>
                        <rect x="14" y="3" width="7" height="7"></rect>
                        <rect x="14" y="14" width="7" height="7"></rect>
                        <rect x="3" y="14" width="7" height="7"></rect>
                    </svg>
                </span>
                <span class="menu-text">Dashboard</span>
            </a>
            <a href="stagiaires.php" class="menu-item">
                <span class="menu-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                        <circle cx="9" cy="7" r="4"></circle>
                        <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                        <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                    </svg>
                </span>
                <span class="menu-text">Stagiaires</span>
            </a>
            <a href="projects.php" class="menu-item active">
                <span class="menu-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <polygon points="12 2 2 7 12 12 22 7 12 2"></polygon>
                        <polyline points="2 17 12 22 22 17"></polyline>
                        <polyline points="2 12 12 17 22 12"></polyline>
                    </svg>
                </span>
                <span class="menu-text">Projects</span>
            </a>
            <a href="#" class="menu-item">
                <span class="menu-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                        <line x1="16" y1="2" x2="16" y2="6"></line>
                        <line x1="8" y1="2" x2="8" y2="6"></line>
                        <line x1="3" y1="10" x2="21" y2="10"></line>
                    </svg>
                </span>
                <span class="menu-text">Events</span>
            </a>

            <p class="menu-title">Management</p>
            <a href="#" class="menu-item">
                <span class="menu-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path
                            d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z">
                        </path>
                    </svg>
                </span>
                <span class="menu-text">Messages</span>
            </a>
            <a href="#" class="menu-item">
                <span class="menu-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M4 15s1-1 4-1 5 2 8 2 4-1 4-1V3s-1 1-4 1-5-2-8-2-4 1-4 1z"></path>
                        <line x1="4" y1="22" x2="4" y2="15"></line>
                    </svg>
                </span>
                <span class="menu-text">Reports</span>
            </a>
            <a href="#" class="menu-item">
                <span class="menu-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="3"></circle>
                        <path
                            d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z">
                        </path>
                    </svg>
                </span>
                <span class="menu-text">Settings</span>
            </a>
        </nav>
    </aside>

    <!-- Main Content -->
    <main class="main-content">
        <div class="header">
            <h1 class="page-title">Project Details</h1>
            <div class="user-menu">
                <div class="user-avatar">A</div>
                <span class="user-name">Admin User</span>
            </div>
        </div>
        <?php
        include_once("connexion.php");
        session_start();
        $IdProject = $_SESSION['IdProject'];
        $query = "SELECT * FROM  project WHERE IdProject = $IdProject";
        $pdostmt = $connexion->prepare($query); // Objet (instance) de PDOStatement
        $pdostmt->execute([
            ':IdProject' => $IdProject
        ]);
        $stagiaires = $pdostmt->fetch(PDO::FETCH_ASSOC);

        function countMembres($connexion, $id)
        {

            $query = "SELECT  IdProject,title,(CASE WHEN membre1 IS NOT NULL AND membre1 != '' THEN 1 ELSE 0 END +
                          CASE WHEN membre2 IS NOT NULL AND membre2 != '' THEN 1 ELSE 0 END +
                           CASE WHEN membre3 IS NOT NULL AND membre3 != '' THEN 1 ELSE 0 END ) AS total FROM project WHERE IdProject=:id;";
            $pdostmt = $connexion->prepare($query);
            $pdostmt->execute([
                ':id' => $id
            ]);
            $result = $pdostmt->fetch(PDO::FETCH_ASSOC);
            return $result['total'];
        }
        function nombreVote($connexion){
            
            $query = "SELECT COUNT(*) as total FROM votestagiaire WHERE IdProjet = :IdProject";
            $pdostmt = $connexion->prepare($query);
            $pdostmt->execute([
                ':IdProject' => $_SESSION['IdProject']
            ]);
            $result = $pdostmt->fetch(PDO::FETCH_ASSOC);
            return $result['total'];
        }
        ?>
        <!-- Project Details -->
        <div class="project-container">
            <div class="project-main">
                <div class="card">
                    <div class="project-header">
                        <div>
                            <span class="project-category"><?php echo $stagiaires["category"] ?></span>
                            <h1 class="project-title"><?php echo $stagiaires["title"] ?></h1>
                            <div class="project-meta">
                                <div class="meta-item">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="meta-icon">
                                        <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                        <line x1="16" y1="2" x2="16" y2="6"></line>
                                        <line x1="8" y1="2" x2="8" y2="6"></line>
                                        <line x1="3" y1="10" x2="21" y2="10"></line>
                                    </svg>
                                    Submitted: 15 Mar 2025
                                </div>
                                <div class="meta-item">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="meta-icon">
                                        <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                        <circle cx="9" cy="7" r="4"></circle>
                                        <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                        <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                    </svg>
                                    Team Size: <?php echo countMembres($connexion, $stagiaires["IdProject"]) ?>
                                </div>
                                <div class="meta-item">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="meta-icon">
                                        <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                                        <polyline points="14 2 14 8 20 8"></polyline>
                                        <line x1="16" y1="13" x2="8" y2="13"></line>
                                        <line x1="16" y1="17" x2="8" y2="17"></line>
                                        <polyline points="10 9 9 9 8 9"></polyline>
                                    </svg>
                                    Votes: 124
                                </div>
                                <span class="project-status status-validated">Validated</span>
                            </div>
                        </div>
                        <div class="action-buttons">
                            <button class="btn btn-success">Validate Project</button>
                            <button class="btn btn-danger">Reject Project</button>
                        </div>
                    </div>

                    <div class="tabs">
                        <div class="tab active" data-tab="overview">Overview</div>
                        <div class="tab" data-tab="team">Team</div>
                        <div class="tab" data-tab="media">Media</div>
                        <div class="tab" data-tab="documents">Documents</div>
                        <div class="tab" data-tab="jury">Jury Evaluation</div>
                    </div>

                    <div class="tab-content active" id="overview">
                        <h3 class="card-title">Project Description</h3>
                        <div class="project-description">
                            <p><?php echo $stagiaires["description_pr"] ?></p>
                        </div>

                        <h3 class="card-title" style="margin-top: 1.5rem;"></h3>
                        <div class="project-description">
                            <p></p>
                        </div>
                    </div>

                    <div class="tab-content" id="team">
                        <h3 class="card-title">Team Members</h3>
                        <div class="team-members">
                            <div class="team-member">
                                <div class="team-member-avatar">AH</div>
                                <div class="team-member-info">
                                    <div class="team-member-name"><?php echo $stagiaires["membre1"] ?></div>
                                    <div class="team-member-role"><?php echo $stagiaires["role_membre1"] ?></div>
                                    <div class="team-member-contact"><?php echo $stagiaires["email_membre1"] ?></div>
                                </div>
                            </div>
                            <div class="team-member">
                                <div class="team-member-avatar">LB</div>
                                <div class="team-member-info">
                                    <div class="team-member-name"><?php echo $stagiaires["membre2"] ?></div>
                                    <div class="team-member-role"><?php echo $stagiaires["role_membre2"] ?></div>
                                    <div class="team-member-contact"><?php echo $stagiaires["email_membre2"] ?></div>
                                </div>
                            </div>
                            <div class="team-member">
                                <div class="team-member-avatar">YM</div>
                                <div class="team-member-info">
                                    <div class="team-member-name"><?php echo $stagiaires["membre3"] ?></div>
                                    <div class="team-member-role"><?php echo $stagiaires["role_membre3"] ?></div>
                                    <div class="team-member-contact"><?php echo $stagiaires["email_membre3"] ?></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-content" id="media">
                        <h3 class="card-title">Project Video</h3>
                        <div class="video-container">
                            <!-- If video exists, show it -->


                            <iframe class="video-player" width="100%" height="600" frameborder="0"
                                src="<?php echo htmlspecialchars($stagiaires["video_url"]); ?>" allowfullscreen
                                allow="autoplay">
                            </iframe>


                            <!-- If no video exists, show placeholder -->
                            <!-- 
                            <div class="video-placeholder">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <polygon points="23 7 16 12 23 17 23 7"></polygon>
                                    <rect x="1" y="5" width="15" height="14" rx="2" ry="2"></rect>
                                </svg>
                                <p>No video has been uploaded yet</p>
                            </div>
                            -->
                        </div>

                    
                    </div>

                    <div class="tab-content" id="documents">
                        <h3 class="card-title">Project Documents</h3>
                        <div class="document-list">
            
                            <div class="document-item">
                                <div class="document-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="#34d399" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                                        <polyline points="14 2 14 8 20 8"></polyline>
                                        <line x1="16" y1="13" x2="8" y2="13"></line>
                                        <line x1="16" y1="17" x2="8" y2="17"></line>
                                        <polyline points="10 9 9 9 8 9"></polyline>
                                    </svg>
                                </div>
                                <div class="document-info">
                                    <div class="document-name"><?php echo htmlspecialchars($stagiaires["doc_url"]); ?></div>
                                    <div class="document-meta">
                                        <span class="document-size"></span>
                                        <span class="document-date">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round">
                                                <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                                <line x1="16" y1="2" x2="16" y2="6"></line>
                                                <line x1="8" y1="2" x2="8" y2="6"></line>
                                                <line x1="3" y1="10" x2="21" y2="10"></line>
                                            </svg>
                                            15 Mar 2025
                                        </span>
                                    </div>
                                </div>
                                <div class="document-actions">
                                        <a href="http://localhost/Genava/<?php echo $stagiaires['doc_url'] ?>">
                                            <button  class="document-action download" title="Download" >
                                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                                    <circle cx="12" cy="12" r="3"></circle>
                                                </svg>
                                            </button>
                                        </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-content" id="jury">
                        <h3 class="card-title">Jury Evaluation</h3>
                        <div class="jury-notes">
                            <div class="jury-note">
                                <div class="jury-note-header">
                                    <div class="jury-name">Prof. Mohammed Alaoui</div>
                                    <div class="jury-rating">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                            viewBox="0 0 24 24" fill="currentColor" stroke="none">
                                            <polygon
                                                points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                            </polygon>
                                        </svg>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                            viewBox="0 0 24 24" fill="currentColor" stroke="none">
                                            <polygon
                                                points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                            </polygon>
                                        </svg>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                            viewBox="0 0 24 24" fill="currentColor" stroke="none">
                                            <polygon
                                                points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                            </polygon>
                                        </svg>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                            viewBox="0 0 24 24" fill="currentColor" stroke="none">
                                            <polygon
                                                points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                            </polygon>
                                        </svg>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                            viewBox="0 0 24 24" fill="currentColor" stroke="none">
                                            <polygon
                                                points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                            </polygon>
                                        </svg>
                                        5.0
                                    </div>
                                </div>
                                <div class="jury-comment">
                                    Excellent project with innovative features. The team demonstrated strong technical
                                    skills and a deep understanding of IoT principles. The energy monitoring feature is
                                    particularly impressive.
                                </div>
                            </div>
                            <div class="jury-note">
                                <div class="jury-note-header">
                                    <div class="jury-name">Dr. Fatima Zahra</div>
                                    <div class="jury-rating">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                            viewBox="0 0 24 24" fill="currentColor" stroke="none">
                                            <polygon
                                                points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                            </polygon>
                                        </svg>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                            viewBox="0 0 24 24" fill="currentColor" stroke="none">
                                            <polygon
                                                points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                            </polygon>
                                        </svg>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                            viewBox="0 0 24 24" fill="currentColor" stroke="none">
                                            <polygon
                                                points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                            </polygon>
                                        </svg>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                            viewBox="0 0 24 24" fill="currentColor" stroke="none">
                                            <polygon
                                                points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                            </polygon>
                                        </svg>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                            viewBox="0 0 24 24" fill="currentColor" stroke="none">
                                            <polygon
                                                points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                            </polygon>
                                        </svg>
                                        4.8
                                    </div>
                                </div>
                                <div class="jury-comment">
                                    Very well-executed project with great attention to security aspects. The mobile app
                                    interface is intuitive and user-friendly. Could improve on documentation.
                                </div>
                            </div>
                            <div class="jury-note">
                                <div class="jury-note-header">
                                    <div class="jury-name">Eng. Karim Bensouda</div>
                                    <div class="jury-rating">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                            viewBox="0 0 24 24" fill="currentColor" stroke="none">
                                            <polygon
                                                points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                            </polygon>
                                        </svg>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                            viewBox="0 0 24 24" fill="currentColor" stroke="none">
                                            <polygon
                                                points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                            </polygon>
                                        </svg>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                            viewBox="0 0 24 24" fill="currentColor" stroke="none">
                                            <polygon
                                                points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                            </polygon>
                                        </svg>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                            viewBox="0 0 24 24" fill="currentColor" stroke="none">
                                            <polygon
                                                points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                            </polygon>
                                        </svg>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                            viewBox="0 0 24 24" fill="currentColor" stroke="none">
                                            <polygon
                                                points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                            </polygon>
                                        </svg>
                                        4.5
                                    </div>
                                </div>
                                <div class="jury-comment">
                                    Impressive technical implementation. The team has shown excellent problem-solving
                                    skills. The energy monitoring feature is innovative and has real-world applications.
                                    Would benefit from more extensive testing in varied environments.
                                </div>
                            </div>
                        </div>

                        <h3 class="card-title" style="margin-top: 1.5rem;">Add Jury Evaluation</h3>
                        <div class="form-group">
                            <label class="form-label">Jury Member</label>
                            <select class="form-select">
                                <option value="">Select Jury Member</option>
                                <option value="1">Prof. Mohammed Alaoui</option>
                                <option value="2">Dr. Fatima Zahra</option>
                                <option value="3">Eng. Karim Bensouda</option>
                                <option value="4">Dr. Nadia El Mansouri</option>
                                <option value="5">Prof. Hassan Berrada</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Rating</label>
                            <div class="rating-input">
                                <span class="rating-star active">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="currentColor" stroke="none">
                                        <polygon
                                            points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                        </polygon>
                                    </svg>
                                </span>
                                <span class="rating-star active">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="currentColor" stroke="none">
                                        <polygon
                                            points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                        </polygon>
                                    </svg>
                                </span>
                                <span class="rating-star active">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="currentColor" stroke="none">
                                        <polygon
                                            points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                        </polygon>
                                    </svg>
                                </span>
                                <span class="rating-star active">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="currentColor" stroke="none">
                                        <polygon
                                            points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                        </polygon>
                                    </svg>
                                </span>
                                <span class="rating-star">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="currentColor" stroke="none">
                                        <polygon
                                            points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                        </polygon>
                                    </svg>
                                </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Comments</label>
                            <textarea class="form-input" rows="4" placeholder="Enter evaluation comments..."></textarea>
                        </div>
                        <button class="btn btn-primary">Add Evaluation</button>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Project Status</h3>
                </div>
                <div style="padding: 1rem;">
                    <div style="display: flex; justify-content: space-between; margin-bottom: 1rem;">
                        <span style="color: #94a3b8;">Current Status:</span>
                        <span
                            class="project-status status-<?php echo $stagiaires["validation_pr"] ?>"><?php echo $stagiaires["validation_pr"] ?></span>
                    </div>
                    <div style="display: flex; justify-content: space-between; margin-bottom: 1rem;">
                        <span style="color: #94a3b8;">Submission Date:</span>
                        <span style="color: #f8fafc;"></span>
                    </div>
                    <div style="display: flex; justify-content: space-between; margin-bottom: 1rem;">
                        <span style="color: #94a3b8;">Validation Date:</span>
                        <span style="color: #f8fafc;">18 Mar 2025</span>
                    </div>
                    <div style="display: flex; justify-content: space-between; margin-bottom: 1rem;">
                        <span style="color: #94a3b8;">Validated By:</span>
                        <span style="color: #f8fafc;">Admin User</span>
                    </div>
                    <div style="display: flex; justify-content: space-between;">
                        <span style="color: #94a3b8;">Votes:</span>
                        <span style="color: #f8fafc;"><?php echo nombreVote($connexion)?></span>
                    </div>
                </div>
            </div>
            
    
            </div>
        </div>
    </main>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Tab functionality
            const tabs = document.querySelectorAll('.tab');
            const tabContents = document.querySelectorAll('.tab-content');

            tabs.forEach(tab => {
                tab.addEventListener('click', function () {
                    const tabId = this.getAttribute('data-tab');

                    // Remove active class from all tabs and contents
                    tabs.forEach(t => t.classList.remove('active'));
                    tabContents.forEach(c => c.classList.remove('active'));

                    // Add active class to current tab and content
                    this.classList.add('active');
                    document.getElementById(tabId).classList.add('active');
                });
            });

            // Rating stars functionality
            const ratingStars = document.querySelectorAll('.rating-star');
            ratingStars.forEach((star, index) => {
                star.addEventListener('click', function () {
                    ratingStars.forEach((s, i) => {
                        if (i <= index) {
                            s.classList.add('active');
                        } else {
                            s.classList.remove('active');
                        }
                    });
                });
            });

            // File upload functionality
            const videoUpload = document.getElementById('video-upload');
            const documentUpload = document.getElementById('document-upload');

            if (videoUpload) {
                videoUpload.addEventListener('change', function (e) {
                    if (e.target.files.length > 0) {
                        const fileName = e.target.files[0].name;
                        alert(`Video "${fileName}" selected for upload. In a real implementation, this would be uploaded to the server.`);
                    }
                });
            }

            if (documentUpload) {
                documentUpload.addEventListener('change', function (e) {
                    if (e.target.files.length > 0) {
                        const fileName = e.target.files[0].name;
                        alert(`Document "${fileName}" selected for upload. In a real implementation, this would be uploaded to the server.`);
                    }
                });
            }

            // Validate and Reject buttons
            const validateButtons = document.querySelectorAll('.btn-success');
            const rejectButtons = document.querySelectorAll('.btn-danger');

            validateButtons.forEach(button => {
                button.addEventListener('click', function () {
                    if (confirm('Are you sure you want to validate this project?')) {
                        const statusElements = document.querySelectorAll('.project-status');
                        statusElements.forEach(el => {
                            el.className = 'project-status status-validated';
                            el.textContent = 'Validated';
                        });
                        alert('Project has been validated successfully!');
                    }
                });
            });

            rejectButtons.forEach(button => {
                button.addEventListener('click', function () {
                    if (confirm('Are you sure you want to reject this project?')) {
                        const statusElements = document.querySelectorAll('.project-status');
                        statusElements.forEach(el => {
                            el.className = 'project-status status-rejected';
                            el.textContent = 'Rejected';
                        });
                        alert('Project has been rejected!');
                    }
                });
            });
        });
    </script>
</body>

</html>