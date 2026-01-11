<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projects valide</title>
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

        /* Tables */
        .table-container {
            background: rgba(15, 23, 42, 0.7);
            border-radius: 12px;
            padding: 1.5rem;
            border: 1px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
            margin-bottom: 2rem;
            overflow-x: auto;
        }

        .table-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1rem;
        }

        .table-title {
            font-size: 1.25rem;
            font-weight: 600;
            color: #f8fafc;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
        }

        .table th {
            text-align: left;
            padding: 1rem;
            color: #94a3b8;
            font-weight: 500;
            border-bottom: 1px solid #334155;
        }

        .table td {
            padding: 1rem;
            color: #e2e8f0;
            border-bottom: 1px solid #334155;
        }

        .table tr:last-child td {
            border-bottom: none;
        }

        .table tr:hover td {
            background-color: rgba(59, 130, 246, 0.05);
        }

        .status {
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

        .status-invalide {
            background-color: rgba(239, 68, 68, 0.2);
            color: #f87171;
        }

        .action-btn {
            background: none;
            border: none;
            color: #94a3b8;
            cursor: pointer;
            padding: 0.25rem;
            transition: color 0.3s ease;
            margin-right: 0.5rem;
        }

        .action-btn:hover {
            color: #f8fafc;
        }

        .action-btn.view {
            color: #3b82f6;
        }

        .action-btn.view:hover {
            color: #60a5fa;
        }

        .action-btn.validate {
            color: #10b981;
        }

        .action-btn.validate:hover {
            color: #34d399;
        }

        .action-btn.delete {
            color: rgb(245, 6, 6);
        }

        .action-btn.delete:hover {
            color: rgb(211, 52, 52);
        }


        /* Search and Filter */
        .search-filter {
            display: flex;
            gap: 1rem;
            margin-bottom: 1.5rem;
        }

        .search-input {
            flex: 1;
            padding: 0.75rem 1rem;
            border-radius: 8px;
            border: 1px solid #334155;
            background-color: #1e293b;
            color: #f8fafc;
            font-size: 0.875rem;
        }

        .search-input:focus {
            outline: none;
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.3);
        }

        .filter-select {
            padding: 0.75rem 1rem;
            border-radius: 8px;
            border: 1px solid #334155;
            background-color: #1e293b;
            color: #f8fafc;
            font-size: 0.875rem;
            min-width: 150px;
        }

        .filter-select:focus {
            outline: none;
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.3);
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

        /* Pagination */
        .pagination {
            display: flex;
            justify-content: flex-end;
            align-items: center;
            margin-top: 1.5rem;
        }

        .page-item {
            margin: 0 0.25rem;
        }

        .page-link {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 36px;
            height: 36px;
            border-radius: 8px;
            color: #94a3b8;
            background-color: #1e293b;
            border: 1px solid #334155;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .page-link:hover {
            background-color: rgba(59, 130, 246, 0.1);
            color: #f8fafc;
            border-color: #3b82f6;
        }

        .page-link.active {
            background-color: #3b82f6;
            color: white;
            border-color: #3b82f6;
        }

        /* Stats Cards */
        .stats-cards {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .stat-card {
            background: rgba(15, 23, 42, 0.7);
            border-radius: 12px;
            padding: 1.5rem;
            border: 1px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
        }

        .stat-icon {
            width: 40px;
            height: 40px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1rem;
        }

        .stat-icon.blue {
            background-color: rgba(59, 130, 246, 0.2);
            color: #60a5fa;
        }

        .stat-icon.green {
            background-color: rgba(16, 185, 129, 0.2);
            color: #34d399;
        }

        .stat-icon.orange {
            background-color: rgba(249, 115, 22, 0.2);
            color: #fb923c;
        }

        .stat-icon.red {
            background-color: rgba(239, 68, 68, 0.2);
            color: #f87171;
        }

        .stat-title {
            color: #94a3b8;
            font-size: 0.875rem;
            margin-bottom: 0.5rem;
        }

        .stat-value {
            font-size: 1.5rem;
            font-weight: 600;
            color: #f8fafc;
        }

        /* Modal */
        .modal-backdrop {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 1000;
            display: none;
        }

        .modal {
            background: rgba(15, 23, 42, 0.95);
            border-radius: 12px;
            padding: 2rem;
            border: 1px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 700px;
            max-height: 90vh;
            overflow-y: auto;
        }

        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
        }

        .modal-title {
            font-size: 1.25rem;
            font-weight: 600;
            color: #f8fafc;
        }

        .modal-close {
            background: none;
            border: none;
            color: #94a3b8;
            cursor: pointer;
            font-size: 1.5rem;
            line-height: 1;
        }

        .modal-body {
            margin-bottom: 1.5rem;
        }

        .modal-footer {
            display: flex;
            justify-content: flex-end;
            gap: 1rem;
        }

        /* Project Details */
        .project-details {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1.5rem;
        }

        .detail-section {
            margin-bottom: 1.5rem;
        }

        .detail-title {
            color: #94a3b8;
            font-size: 0.875rem;
            font-weight: 600;
            margin-bottom: 0.75rem;
        }

        .detail-content {
            background: rgba(30, 41, 59, 0.5);
            border-radius: 8px;
            padding: 1rem;
            border: 1px solid rgba(255, 255, 255, 0.05);
        }

        .detail-item {
            margin-bottom: 0.75rem;
        }

        .detail-label {
            color: #94a3b8;
            font-size: 0.75rem;
            margin-bottom: 0.25rem;
        }

        .detail-value {
            color: #f8fafc;
            font-size: 0.875rem;
        }

        .team-members {
            display: flex;
            flex-wrap: wrap;
            gap: 0.5rem;
            margin-top: 0.5rem;
        }

        .team-member {
            display: flex;
            align-items: center;
            background: rgba(51, 65, 85, 0.5);
            border-radius: 9999px;
            padding: 0.25rem 0.75rem;
        }

        .member-avatar {
            width: 24px;
            height: 24px;
            border-radius: 50%;
            background-color: #3b82f6;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 600;
            font-size: 0.75rem;
            margin-right: 0.5rem;
        }

        .jury-votes {
            margin-top: 1rem;
        }

        .vote-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0.5rem 0;
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        }

        .vote-item:last-child {
            border-bottom: none;
        }

        .jury-name {
            color: #e2e8f0;
            font-size: 0.875rem;
        }

        .vote-score {
            display: flex;
            align-items: center;
        }

        .score-value {
            color: #f8fafc;
            font-weight: 600;
            margin-right: 0.5rem;
        }

        .score-stars {
            display: flex;
        }

        .star {
            color: #fbbf24;
            margin-right: 0.25rem;
        }

        .jury-notes {
            margin-top: 1rem;
            background: rgba(30, 41, 59, 0.5);
            border-radius: 8px;
            padding: 1rem;
            border: 1px solid rgba(255, 255, 255, 0.05);
        }

        .note-item {
            margin-bottom: 1rem;
            padding-bottom: 1rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        }

        .note-item:last-child {
            margin-bottom: 0;
            padding-bottom: 0;
            border-bottom: none;
        }

        .note-header {
            display: flex;
            justify-content: space-between;
            margin-bottom: 0.5rem;
        }

        .note-jury {
            color: #e2e8f0;
            font-weight: 500;
            font-size: 0.875rem;
        }

        .note-date {
            color: #94a3b8;
            font-size: 0.75rem;
        }

        .note-content {
            color: #cbd5e1;
            font-size: 0.875rem;
            line-height: 1.5;
        }

        /* Badge */
        .badge {
            display: inline-flex;
            align-items: center;
            padding: 0.25rem 0.5rem;
            border-radius: 9999px;
            font-size: 0.75rem;
            font-weight: 600;
            margin-right: 0.5rem;
            margin-bottom: 0.5rem;
        }

        .badge-blue {
            background-color: rgba(59, 130, 246, 0.2);
            color: #60a5fa;
        }

        .badge-green {
            background-color: rgba(16, 185, 129, 0.2);
            color: #34d399;
        }

        .badge-purple {
            background-color: rgba(139, 92, 246, 0.2);
            color: #a78bfa;
        }

        .badge-orange {
            background-color: rgba(249, 115, 22, 0.2);
            color: #fb923c;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .stats-cards {
                grid-template-columns: 1fr;
            }

            .search-filter {
                flex-direction: column;
            }

            .project-details {
                grid-template-columns: 1fr;
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
        }
    </style>
</head>
<?php include("connexion.php"); ?>

<body>
    <div class="bg-grid"></div>

    <!-- Sidebar -->
    <aside class="sidebar">
        <div class="sidebar-header">
            <div class="logo-icon">H</div>
            <div class="logo-text">Dashboard</div>
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
            <a href="#" class="menu-item ">
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
            <a href="project_v.php" class="menu-item active">
                <span class="menu-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                        <line x1="16" y1="2" x2="16" y2="6"></line>
                        <line x1="8" y1="2" x2="8" y2="6"></line>
                        <line x1="3" y1="10" x2="21" y2="10"></line>
                    </svg>
                </span>
                <span class="menu-text">P.valide</span>
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
            <a href="pondation.php" class="menu-item">
                <span class="menu-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
                        width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round">
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
            <h1 class="page-title">Projects Management</h1>
            <div class="user-menu">
                <div class="user-avatar">A</div>
                <span class="user-name">Admin User</span>
            </div>
        </div>

        <!-- Stats Cards -->
        <div class="stats-cards">
            <div class="stat-card">
                <div class="stat-icon blue">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <polygon points="12 2 2 7 12 12 22 7 12 2"></polygon>
                        <polyline points="2 17 12 22 22 17"></polyline>
                        <polyline points="2 12 12 17 22 12"></polyline>
                    </svg>
                </div>
                <span class="stat-title">Total Projects</span>
                <span class="stat-value"><?php echo countProjets($connexion) ?></span>
            </div>
            <div class="stat-card">
                <div class="stat-icon green">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                        <polyline points="22 4 12 14.01 9 11.01"></polyline>
                    </svg>
                </div>
                <span class="stat-title">valider</span>
                <span class="stat-value"><?php echo countProjectsvalide($connexion) ?></span>
            </div>
            <div class="stat-card">
                <div class="stat-icon orange">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10"></circle>
                        <line x1="12" y1="8" x2="12" y2="12"></line>
                        <line x1="12" y1="16" x2="12.01" y2="16"></line>
                    </svg>
                </div>
                <span class="stat-title">invalide</span>
                <span class="stat-value"><?php echo countProjectsinvalide($connexion) ?></span>
            </div>
            <div class="stat-card">
                <div class="stat-icon green">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                        <polyline points="22 4 12 14.01 9 11.01"></polyline>
                    </svg>
                </div>
                <span class="stat-title">Participants </span>
                <span class="stat-value"><?php echo countTotalMembres($connexion) ?></span>
            </div>
        </div>

        <!-- Projects Table -->
        <div class="table-container">
            <div class="table-header">
                <h2 class="table-title">All Projects</h2>
                <button class="btn btn-primary btn-sm">Export Data</button>
            </div>
            <div class="search-filter">
                <input type="text" class="search-input" placeholder="Search projects...">
                <select class="filter-select">
                    <option value="all">All Status</option>
                    <option value="approved">Approved</option>
                    <option value="pending">Pending</option>
                    <option value="rejected">Rejected</option>
                </select>
                <select class="filter-select">
                    <option value="all">All Categories</option>
                    <option value="web">Web Development</option>
                    <option value="mobile">Mobile Apps</option>
                    <option value="ai">AI & Machine Learning</option>
                    <option value="iot">IoT Solutions</option>
                    <option value="game">Game Development</option>
                </select>
            </div>


            <?php
            include_once("connexion.php"); //copier le code de connexion
            $query = "SELECT * FROM  project";
            $pdostmt = $connexion->prepare($query); // Objet (instance) de PDOStatement
            $pdostmt->execute();
            function countProjets($connexion)
            {
                $query = "SELECT COUNT(*) as total FROM project";
                $pdostmt = $connexion->prepare($query);
                $pdostmt->execute();
                $result = $pdostmt->fetch(PDO::FETCH_ASSOC);
                return $result['total'];
            }
            function countTotalMembres($connexion)
            {
                $query = "SELECT (SUM(CASE WHEN membre1 IS NOT NULL AND membre1 != '' THEN 1 ELSE 0 END) +
                           SUM(CASE WHEN membre2 IS NOT NULL AND membre2 != '' THEN 1 ELSE 0 END) +
                            SUM(CASE WHEN membre3 IS NOT NULL AND membre3 != '' THEN 1 ELSE 0 END)) AS total FROM project;";
                $pdostmt = $connexion->prepare($query);
                $pdostmt->execute();
                $result = $pdostmt->fetch(PDO::FETCH_ASSOC);
                return $result['total'];
            }
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
            function countProjectsinvalide($connexion)
            {
                $query = "SELECT COUNT(*) as total FROM project WHERE validation_pr='invalide'";
                $pdostmt = $connexion->prepare($query);
                $pdostmt->execute();
                $result = $pdostmt->fetch(PDO::FETCH_ASSOC);
                return $result['total'];
            }
            function countProjectsvalide($connexion)
            {
                $query = "SELECT COUNT(*) as total FROM project WHERE validation_pr='valide'";
                $pdostmt = $connexion->prepare($query);
                $pdostmt->execute();
                $result = $pdostmt->fetch(PDO::FETCH_ASSOC);
                return $result['total'];
            }
            include_once 'connexion.php'; // Connexion à la base de données
            $query1 = "SELECT 
        p.IdProject, 
        p.title, 
        p.category, 
        p.description_pr, 
        COALESCE(AVG(vs.score), 0) AS avg_stagiaires, 
        COALESCE(AVG(vj.score), 0) AS avg_jury,
        (COALESCE(AVG(vs.score), 0) * (ps.P_stagiaires / 100) + 
         COALESCE(AVG(vj.score), 0) * (ps.P_jury / 100)) AS final_score
    FROM 
        project p
    LEFT JOIN votestagiaire vs ON p.IdProject = vs.Idprojet
    LEFT JOIN votejury vj ON p.IdProject = vj.Idprojet
    CROSS JOIN ponderation ps
    WHERE ps.Id = 1
    GROUP BY p.IdProject
    ORDER BY final_score DESC;
 WHERE validation_pr='valide'"; // Requête pour récupérer les stagiaires
            $pdostmt1 = $connexion->prepare($query1); // Objet (instance) de PDOStatement
            $pdostmt1->execute();

            function AVGStagairevote($connexion, $id)
            {
                $query = "SELECT AVG(score) as total FROM votestagiaire WHERE Idprojet=:id";
                $pdostmt = $connexion->prepare($query);
                $pdostmt->execute([
                    ':id' => $id
                ]);
                $result = $pdostmt->fetch(PDO::FETCH_ASSOC);
                $averageScore = $result['total'] ? round($result['total'], 1) : 0;
                return $averageScore;
            }
            function AVGJuryvote($connexion, $id)
            {
                $query = "SELECT AVG(score) as total FROM votejury WHERE Idprojet=:id";
                $pdostmt = $connexion->prepare($query);
                $pdostmt->execute([
                    ':id' => $id
                ]);
                $result = $pdostmt->fetch(PDO::FETCH_ASSOC);
                $averageScore = $result['total'] ? round($result['total'], 1) : 0;
                return $averageScore;
            }
            function NombreStagiairevote($connexion, $id)
            {
                $query = "SELECT COUNT(*) as total FROM votestagiaire WHERE Idprojet=:Idprojet";
                $pdostmt = $connexion->prepare($query);
                $pdostmt->execute([
                    ':Idprojet' => $id
                ]);
                $result = $pdostmt->fetch(PDO::FETCH_ASSOC);
                return $result['total'];
            }
            function NombreJuryvote($connexion, $id)
            {
                $query = "SELECT  COUNT(DISTINCT Idjury) AS nb_jurys FROM votejury WHERE Idjury IN (1, 2, 3) AND Idprojet = :idprojet;";
                $pdostmt = $connexion->prepare($query);
                $pdostmt->execute([
                    ':idprojet' => $id
                ]);
                $result = $pdostmt->fetch(PDO::FETCH_ASSOC);
                return $result['nb_jurys'];
            }
            function NoteFinale($connexion,$Savg,$Javg)
            {
                $query = "SELECT P_stagiaires ,P_jury FROM ponderation WHERE Id=1";
                $pdostmt = $connexion->prepare($query);
                $pdostmt->execute();
                $result = $pdostmt->fetch(PDO::FETCH_ASSOC);
                $P_stagiaires = $result['P_stagiaires']/100;
                $P_jury= $result['P_jury']/100;
                $note_finale = ($Savg * $P_stagiaires) + ($Javg * $P_jury);
                return number_format($note_finale,2);

            }
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Requête pour récupérer les stagiaires
                if (isset($_POST['view'])) {
                    session_start();
                    $_SESSION['IdProject'] = $_POST['view'];
                    ;
                    echo "<script>window.location.href = 'one_project.php';</script>";
                } elseif (isset($_POST['valide'])) {
                    $IdProject = $_POST['valide'];
                    $query = "UPDATE project SET validation_pr = 'valide' WHERE IdProject = :IdProject";
                    $pdostmt = $connexion->prepare($query);
                    $pdostmt->execute([
                        ':IdProject' => $IdProject
                    ]);
                    $query1 = "SELECT * FROM project ";
                    $pdostmt1 = $connexion->prepare($query1); // Objet (instance) de PDOStatement
                    $pdostmt1->execute();
                } elseif (isset($_POST['valide'])) {
                    $IdProject = $_POST['valide'];
                    $query = "UPDATE project SET validation_pr = 'valide' WHERE IdProject = :IdProject";
                    $pdostmt = $connexion->prepare($query);
                    $pdostmt->execute([
                        ':IdProject' => $IdProject
                    ]);
                    $query1 = "SELECT * FROM project ";
                    $pdostmt1 = $connexion->prepare($query1); // Objet (instance) de PDOStatement
                    $pdostmt1->execute();
                } elseif (!empty($_POST['delete'])) {
                    $idStagiaire = $_POST['delete'];
                    // Code to delete stagiaire
                    $query = "DELETE FROM project WHERE Idproject = :IdProject";
                    $pdostmt = $connexion->prepare($query);
                    $pdostmt->execute([
                        ':IdProject' => $idStagiaire
                    ]);
                    if ($pdostmt->rowCount() > 0) {
                        echo "<script>alert('Stagiaire supprimé avec succès');</script>";
                    } else {
                        echo "<script>alert('Erreur lors de la suppression du stagiaire');</script>";
                    }
                    $query1 = "SELECT * FROM project where validation_pr='valide'";
                    $pdostmt1 = $connexion->prepare($query1); // Objet (instance) de PDOStatement
                    $pdostmt1->execute();
                }

            }

            ?>

            <table class="table">
                <thead>
                    <tr>
                        <th>Project Name</th>
                        <th>Team</th>
                        <th>Category</th>
                        <th>N.J</th>
                        <th>J.AVG</th>
                        <th>N.S</th>
                        <th>S.AVG</th>
                        <th>N.F</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($stagiaires = $pdostmt1->fetch(PDO::FETCH_ASSOC)): ?>
                        <tr>
                            <td><?php echo $stagiaires["title"] ?></td>
                            <td>
                                <div style="display: flex; align-items: center;">
                                    <span>Team Innovate</span>
                                    <span style="margin-left: 0.5rem; color: #94a3b8; font-size: 0.75rem;">
                                        (<?php echo countMembres($connexion, $stagiaires["IdProject"]) ?>
                                        members)</span>
                                </div>
                            </td>
                            <td><?php echo $stagiaires["category"] ?></td>
                            <td><?php echo NombreJuryvote($connexion, $stagiaires["IdProject"]) ?>/3</td>
                            <td><?php echo AVGJuryvote($connexion, $stagiaires["IdProject"]) ?></td>
                            <td><?php echo NombreStagiairevote($connexion, $stagiaires["IdProject"]) ?></td>
                            <td><?php echo AVGStagairevote($connexion, $stagiaires["IdProject"]) ?></td>
                            <td><?php echo NoteFinale($connexion,
                                    AVGStagairevote($connexion, $stagiaires["IdProject"]),
                                    AVGJuryvote($connexion, $stagiaires["IdProject"])) 
                                    ?></td>




                            <td>
                                <form method="post">

                                    <button name="view" value="<?php echo $stagiaires["IdProject"] ?>"
                                        class="action-btn view" title="View Details" onclick="openProjectModal('PRJ001')">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                            <circle cx="12" cy="12" r="3"></circle>
                                        </svg>
                                    </button>

                                    <button name="valide" value="<?php echo $stagiaires["IdProject"] ?>"
                                        class="action-btn validate" title="Validate">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                                            <polyline points="22 4 12 14.01 9 11.01"></polyline>
                                        </svg>
                                    </button>
                                    <button name="delete" value="<?php echo $stagiaires["IdProject"] ?>"
                                        class="action-btn delete" title="Validate">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <polyline points="3 6 5 6 21 6"></polyline>
                                            <path
                                                d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                            </path>
                                        </svg>
                                    </button>

                                </form>
                            </td>
                        </tr>
                    <?php endwhile; ?>


                </tbody>
            </table>
            <div class="pagination">
                <div class="page-item">
                    <button class="page-link">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="15 18 9 12 15 6"></polyline>
                        </svg>
                    </button>
                </div>
                <div class="page-item">
                    <button class="page-link active">1</button>
                </div>
                <div class="page-item">
                    <button class="page-link">2</button>
                </div>
                <div class="page-item">
                    <button class="page-link">3</button>
                </div>
                <div class="page-item">
                    <button class="page-link">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="9 18 15 12 9 6"></polyline>
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Project Details Modal
        <div class="modal-backdrop" id="projectModal">
            <div class="modal">
                <div class="modal-header">
                    <h3 class="modal-title">Project Details</h3>
                    <button class="modal-close" onclick="closeProjectModal()">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="project-details">
                        <div class="detail-section">
                            <h4 class="detail-title">Project Information</h4>
                            <div class="detail-content">
                                <div class="detail-item">
                                    <p class="detail-label">Project Name</p>
                                    <p class="detail-value">Smart Health Monitoring System</p>
                                </div>
                                <div class="detail-item">
                                    <p class="detail-label">Category</p>
                                    <p class="detail-value">IoT Solutions</p>
                                </div>
                                <div class="detail-item">
                                    <p class="detail-label">Submission Date</p>
                                    <p class="detail-value">15/03/2025</p>
                                </div>
                                <div class="detail-item">
                                    <p class="detail-label">Status</p>
                                    <p class="detail-value" style="color: #34d399;">Approved</p>
                                </div>
                                <div class="detail-item">
                                    <p class="detail-label">Technologies</p>
                                    <div>
                                        <span class="badge badge-blue">Arduino</span>
                                        <span class="badge badge-green">React</span>
                                        <span class="badge badge-purple">Node.js</span>
                                        <span class="badge badge-orange">MongoDB</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="detail-section">
                            <h4 class="detail-title">Team Information</h4>
                            <div class="detail-content">
                                <div class="detail-item">
                                    <p class="detail-label">Team Name</p>
                                    <p class="detail-value">Team Innovate</p>
                                </div>
                                <div class="detail-item">
                                    <p class="detail-label">Team Members</p>
                                    <div class="team-members">
                                        <div class="team-member">
                                            <div class="member-avatar">A</div>
                                            <span>Ahmed Khalid (Leader)</span>
                                        </div>
                                        <div class="team-member">
                                            <div class="member-avatar">S</div>
                                            <span>Sara Benali</span>
                                        </div>
                                        <div class="team-member">
                                            <div class="member-avatar">Y</div>
                                            <span>Youssef Amrani</span>
                                        </div>
                                        <div class="team-member">
                                            <div class="member-avatar">L</div>
                                            <span>Leila Tazi</span>
                                        </div>
                                        <div class="team-member">
                                            <div class="member-avatar">K</div>
                                            <span>Karim Idrissi</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="detail-item">
                                    <p class="detail-label">Institution</p>
                                    <p class="detail-value">OFPPT Casablanca</p>
                                </div>
                                <div class="detail-item">
                                    <p class="detail-label">Filière</p>
                                    <p class="detail-value">Développement Digital</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="detail-section">
                        <h4 class="detail-title">Project Description</h4>
                        <div class="detail-content">
                            <p style="color: #cbd5e1; font-size: 0.875rem; line-height: 1.5;">
                                The Smart Health Monitoring System is an IoT-based solution that helps users track their
                                vital health metrics in real-time. The system uses wearable sensors to collect data such
                                as heart rate, blood pressure, body temperature, and activity levels. This data is
                                processed and analyzed to provide personalized health insights and alerts.
                                <br><br>
                                Key features include:
                                <br>
                                - Real-time health monitoring through wearable devices<br>
                                - Mobile application for data visualization and alerts<br>
                                - AI-powered health insights and recommendations<br>
                                - Emergency alert system for critical health situations<br>
                                - Secure data storage and sharing with healthcare providers
                            </p>
                        </div>
                    </div>

                    <div class="detail-section">
                        <h4 class="detail-title">Jury Evaluation</h4>
                        <div class="detail-content">
                            <div class="detail-item">
                                <p class="detail-label">Overall Score</p>
                                <div style="display: flex; align-items: center;">
                                    <span
                                        style="font-weight: 600; margin-right: 0.5rem; color: #f8fafc; font-size: 1.25rem;">4.8</span>
                                    <div style="display: flex; color: #fbbf24;">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            viewBox="0 0 24 24" fill="currentColor" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <polygon
                                                points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                            </polygon>
                                        </svg>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            viewBox="0 0 24 24" fill="currentColor" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <polygon
                                                points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                            </polygon>
                                        </svg>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            viewBox="0 0 24 24" fill="currentColor" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <polygon
                                                points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                            </polygon>
                                        </svg>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            viewBox="0 0 24 24" fill="currentColor" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <polygon
                                                points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                            </polygon>
                                        </svg>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            viewBox="0 0 24 24" fill="currentColor" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <polygon
                                                points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                            </polygon>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <div class="detail-item">
                                <p class="detail-label">Jury Votes</p>
                                <div class="jury-votes">
                                    <div class="vote-item">
                                        <span class="jury-name">Dr. Mohammed Alami</span>
                                        <div class="vote-score">
                                            <span class="score-value">5.0</span>
                                            <div class="score-stars">
                                                <span class="star">★</span>
                                                <span class="star">★</span>
                                                <span class="star">★</span>
                                                <span class="star">★</span>
                                                <span class="star">★</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="vote-item">
                                        <span class="jury-name">Prof. Fatima Zahra</span>
                                        <div class="vote-score">
                                            <span class="score-value">4.5</span>
                                            <div class="score-stars">
                                                <span class="star">★</span>
                                                <span class="star">★</span>
                                                <span class="star">★</span>
                                                <span class="star">★</span>
                                                <span class="star">★</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="vote-item">
                                        <span class="jury-name">Eng. Karim Bensouda</span>
                                        <div class="vote-score">
                                            <span class="score-value">4.8</span>
                                            <div class="score-stars">
                                                <span class="star">★</span>
                                                <span class="star">★</span>
                                                <span class="star">★</span>
                                                <span class="star">★</span>
                                                <span class="star">★</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="detail-item">
                                <p class="detail-label">Stagiaire Votes</p>
                                <div class="jury-votes">
                                    <div class="vote-item">
                                        <span class="jury-name">Stagiaires Group A</span>
                                        <div class="vote-score">
                                            <span class="score-value">4.3</span>
                                            <div class="score-stars">
                                                <span class="star">★</span>
                                                <span class="star">★</span>
                                                <span class="star">★</span>
                                                <span class="star">★</span>
                                                <span class="star">☆</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="vote-item">
                                        <span class="jury-name">Stagiaires Group B</span>
                                        <div class="vote-score">
                                            <span class="score-value">4.1</span>
                                            <div class="score-stars">
                                                <span class="star">★</span>
                                                <span class="star">★</span>
                                                <span class="star">★</span>
                                                <span class="star">★</span>
                                                <span class="star">☆</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="detail-item">
                                <p class="detail-label">Jury Notes</p>
                                <div class="jury-notes">
                                    <div class="note-item">
                                        <div class="note-header">
                                            <span class="note-jury">Dr. Mohammed Alami</span>
                                            <span class="note-date">18/03/2025</span>
                                        </div>
                                        <p class="note-content">
                                            Exceptional project with real-world applications. The team demonstrated a
                                            deep understanding of IoT technologies and healthcare needs. The
                                            implementation is robust and the UI is intuitive. Particularly impressed by
                                            the emergency alert system and the accuracy of the health metrics tracking.
                                        </p>
                                    </div>
                                    <div class="note-item">
                                        <div class="note-header">
                                            <span class="note-jury">Prof. Fatima Zahra</span>
                                            <span class="note-date">17/03/2025</span>
                                        </div>
                                        <p class="note-content">
                                            Very well-executed project with strong technical foundations. The AI
                                            component for health insights is particularly innovative. Some improvements
                                            could be made in data visualization and user experience. Overall, a highly
                                            promising solution with potential for real impact in healthcare monitoring.
                                        </p>
                                    </div>
                                    <div class="note-item">
                                        <div class="note-header">
                                            <span class="note-jury">Eng. Karim Bensouda</span>
                                            <span class="note-date">19/03/2025</span>
                                        </div>
                                        <p class="note-content">
                                            From a technical standpoint, this project is outstanding. The team has
                                            successfully integrated hardware and software components to create a
                                            seamless experience. The data security measures are robust, which is crucial
                                            for health data. The scalability of the solution is also well-thought-out.
                                            Highly recommend for approval.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" onclick="closeProjectModal()">Close</button>
                    <button class="btn btn-success">Approve Project</button>
                </div>
            </div>
        </div> -->
    </main>


</body>

</html>