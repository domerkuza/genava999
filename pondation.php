<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hackathon Platform - Vote Weighting Dashboard</title>
    <style>
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

        .table-actions {
            display: flex;
            gap: 0.5rem;
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

        /* Vote Weighting Configuration */
        .weighting-config {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 2rem;
            margin-bottom: 1.5rem;
        }

        .weight-visualization {
            grid-column: 1 / -1;
            margin-top: 1.5rem;
            padding-top: 1.5rem;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }

        .config-section {
            margin-bottom: 1.5rem;
        }

        .section-title {
            color: #e2e8f0;
            font-size: 1rem;
            font-weight: 500;
            margin-bottom: 1rem;
        }

        .slider-container {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-bottom: 0.5rem;
        }

        .weight-slider {
            flex: 1;
            height: 6px;
            -webkit-appearance: none;
            appearance: none;
            background: rgba(51, 65, 85, 0.8);
            border-radius: 3px;
            outline: none;
        }

        .weight-slider::-webkit-slider-thumb {
            -webkit-appearance: none;
            appearance: none;
            width: 18px;
            height: 18px;
            border-radius: 50%;
            background: #3b82f6;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .weight-slider::-webkit-slider-thumb:hover {
            background: #60a5fa;
            transform: scale(1.1);
        }

        .weight-slider::-moz-range-thumb {
            width: 18px;
            height: 18px;
            border-radius: 50%;
            background: #3b82f6;
            cursor: pointer;
            border: none;
            transition: all 0.2s ease;
        }

        .weight-slider::-moz-range-thumb:hover {
            background: #60a5fa;
            transform: scale(1.1);
        }

        .slider-value {
            min-width: 50px;
            font-weight: 600;
            color: #f8fafc;
            text-align: right;
        }

        .weight-description {
            color: #94a3b8;
            font-size: 0.875rem;
        }

        .weight-chart {
            display: flex;
            height: 40px;
            width: 100%;
            border-radius: 8px;
            overflow: hidden;
            margin-bottom: 1rem;
        }

        .chart-bar {
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 600;
            transition: width 0.3s ease;
        }

        .jury-bar {
            background: linear-gradient(90deg, #3b82f6, #2563eb);
            width: 70%;
        }

        .stagiaire-bar {
            background: linear-gradient(90deg, #10b981, #059669);
            width: 30%;
        }

        .chart-legend {
            display: flex;
            gap: 1.5rem;
        }

        .legend-item {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: #e2e8f0;
            font-size: 0.875rem;
        }

        .legend-color {
            width: 16px;
            height: 16px;
            border-radius: 4px;
        }

        .jury-color {
            background: #3b82f6;
        }

        .stagiaire-color {
            background: #10b981;
        }

        /* Score Calculation Example */
        .calculation-example {
            padding: 1.5rem;
            background: rgba(30, 41, 59, 0.5);
            border-radius: 8px;
            border: 1px solid rgba(255, 255, 255, 0.05);
        }

        .example-inputs {
            display: flex;
            gap: 2rem;
            margin-bottom: 1.5rem;
        }

        .input-group {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
            flex: 1;
        }

        .input-group label {
            color: #94a3b8;
            font-size: 0.875rem;
        }

        .score-input {
            padding: 0.75rem 1rem;
            border-radius: 8px;
            border: 1px solid #334155;
            background-color: #1e293b;
            color: #f8fafc;
            font-size: 1rem;
            font-weight: 600;
            width: 100%;
        }

        .input-suffix {
            color: #94a3b8;
            font-size: 0.875rem;
            margin-left: 0.5rem;
        }

        .calculation-result {
            padding: 1.5rem;
            background: rgba(15, 23, 42, 0.7);
            border-radius: 8px;
            border: 1px solid rgba(255, 255, 255, 0.05);
        }

        .result-formula {
            color: #94a3b8;
            font-size: 0.875rem;
            margin-bottom: 1rem;
        }

        .result-value {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .result-label {
            color: #e2e8f0;
            font-size: 1rem;
        }

        .result-score {
            font-size: 1.5rem;
            font-weight: 600;
            color: #f8fafc;
        }

        /* Star Ratings */
        .score-stars {
            display: flex;
        }

        .star {
            color: #475569;
            margin-right: 2px;
        }

        .star.filled {
            color: #fbbf24;
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
            .stats-cards {
                grid-template-columns: 1fr;
            }

            .search-filter {
                flex-direction: column;
            }

            .weighting-config {
                grid-template-columns: 1fr;
            }

            .example-inputs {
                flex-direction: column;
            }

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

            .header {
                flex-direction: column;
                align-items: flex-start;
                gap: 1rem;
            }

            .table-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 1rem;
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
<?php include_once("connexion.php");?>
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
            <a href="projects.php" class="menu-item">
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
            <a href="project_v.php" class="menu-item">
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
            <a href="#" class="menu-item active">
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
    <div class="main-content">
        <div class="header">
            <h1 class="page-title">Vote Weighting Configuration</h1>
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
        <?php
include_once("connexion.php"); // Include your database connection

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
function countProjets($connexion)
{
    $query = "SELECT COUNT(*) as total FROM project";
    $pdostmt = $connexion->prepare($query);
    $pdostmt->execute();
    $result = $pdostmt->fetch(PDO::FETCH_ASSOC);
    return $result['total'];
}
function countMembres($connexion,$id)
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
// Fetch current weighting values from the database
$query = "SELECT * FROM ponderation ORDER BY Id DESC LIMIT 1;";
$stmt = $connexion->prepare($query);
$stmt->execute();
$ponderation = $stmt->fetch(PDO::FETCH_ASSOC);
if ($ponderation) {
    $juryWeight = $ponderation['P_jury'];
    $stagiairesWeight = $ponderation['P_stagiaires'];
} else {
    // Default values if no record found
    $juryWeight = 70;
    $stagiairesWeight = 30;
}
// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get slider values from POST request
    $juryWeight = $_POST['juryWeight'];
    $stagiairesWeight = $_POST['stagiairesWeight'];

    // Validate that the weights add up to 100
    if ($juryWeight + $stagiairesWeight !== 100) {
        echo "<script>alert('The weights must add up to 100%.');</script>";
    } else {
        // Insert or update the values in the database
        $query = "UPDATE ponderation SET P_jury = :juryWeight, P_stagiaires = :stagiairesWeight WHERE Id = 1 ;";
        $stmt = $connexion->prepare($query);
        $stmt->execute([
            ':juryWeight' => $juryWeight,
            ':stagiairesWeight' => $stagiairesWeight
        ]);
        if ($stmt) {
            echo "<script>alert('Weights saved successfully!');</script>";
        }

        
    }
}
?>
        <!-- Vote Weighting Configuration -->
        <div class="table-container">
            <form method="post">
                <div class="table-header">
                    <h2 class="table-title">Vote Weighting Parameters</h2>
                    <button type="submit" class="btn btn-primary btn-sm"
                        onclick="">Save Configuration</button>
                </div>

                <div class="weighting-config">
                    <div class="config-section">
                        <h3 class="section-title">Jury Vote Weight</h3>
                        <div class="slider-container">
                            <input type="range" min="0" max="100" value="<?php echo  $juryWeight?>" name="juryWeight"  class="weight-slider">
                            <div class="slider-value" id="juryWeightValue"><?php echo  $juryWeight?>%</div>
                        </div>
                        <div class="weight-description">
                            <p>Jury votes will account for 70% of the final project score.</p>
                        </div>
                    </div>

                    <div class="config-section">
                        <h3 class="section-title">Stagiaires Vote Weight</h3>
                        <div class="slider-container">
                            <input type="range" min="0" max="100" value="<?php echo   $stagiairesWeight?>" name="stagiairesWeight" class="weight-slider">
                            <div class="slider-value"  id="stagiaireWeightValue"><?php echo $stagiairesWeight?>%</div>
                        </div>
                        <div class="weight-description">
                            <p>Stagiaire votes will account for 30% of the final project score.</p>
                        </div>
                    </div>
            </form>
           
            <div class="weight-visualization">
                <h3 class="section-title">Weight Distribution</h3>
                <div class="weight-chart">
                    <div class="chart-bar jury-bar">
                    <?php echo  $juryWeight?>%
                    </div>
                    <div class="chart-bar stagiaire-bar">
                        <?php echo   $stagiairesWeight?>%
                    </div>
                </div>
                <div class="chart-legend">
                    <div class="legend-item">
                        <div class="legend-color jury-color"></div>
                        <span>Jury</span>
                    </div>
                    <div class="legend-item">
                        <div class="legend-color stagiaire-color"></div>
                        <span>Stagiaires</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Score Calculation Example -->
    <div class="table-container">
        <div class="table-header">
            <h2 class="table-title">Score Calculation Example</h2>
        </div>

        <div class="calculation-example">
            <div class="example-inputs">
                <div class="input-group">
                    <label>Average Jury Score</label>
                    <input type="number" min="0" max="5" step="0.1" value="4.2" class="score-input" id="juryScore"
                        oninput="calculateFinalScore()">
                    <span class="input-suffix">/ 5</span>
                </div>
                <div class="input-group">
                    <label>Average Stagiaire Score</label>
                    <input type="number" min="0" max="5" step="0.1" value="3.8" class="score-input" id="stagiaireScore"
                        oninput="calculateFinalScore()">
                    <span class="input-suffix">/ 5</span>
                </div>
            </div>

            <div class="calculation-result">
                <div class="result-formula">
                    <p>Final Score = (Jury Score × <span id="juryPercent">70</span>%) + (Stagiaire Score × <span
                            id="stagiairePercent">30</span>%)</p>
                </div>
                <div class="result-value">
                    <span class="result-label">Final Score:</span>
                    <span class="result-score" id="finalScore">4.08 / 5</span>
                </div>
            </div>
        </div>
    </div>


    </div>

    <script>
        // Basic functionality for the sliders
        document.addEventListener('DOMContentLoaded', function () {
            const jurySlider = document.querySelector('.config-section:nth-child(1) .weight-slider');
            const stagiaireSlider = document.querySelector('.config-section:nth-child(2) .weight-slider');
            const juryBar = document.querySelector('.jury-bar');
            const stagiaireBar = document.querySelector('.stagiaire-bar');

            function updateWeights(juryValue, fromStagiaire = false) {
                const stagiaireValue = 100 - juryValue;

                if (!fromStagiaire) {
                    document.getElementById('juryWeightValue').textContent = juryValue + '%';
                    document.getElementById('stagiaireWeightValue').textContent = stagiaireValue + '%';
                    stagiaireSlider.value = stagiaireValue;
                } else {
                    document.getElementById('juryWeightValue').textContent = juryValue + '%';
                    jurySlider.value = juryValue;
                }

                juryBar.style.width = juryValue + '%';
                stagiaireBar.style.width = stagiaireValue + '%';

                if (juryValue >= 15) {
                    juryBar.textContent = juryValue + '%';
                } else {
                    juryBar.textContent = '';
                }

                if (stagiaireValue >= 15) {
                    stagiaireBar.textContent = stagiaireValue + '%';
                } else {
                    stagiaireBar.textContent = '';
                }

                // Update the calculation formula and recalculate
                document.getElementById('juryPercent').textContent = juryValue;
                document.getElementById('stagiairePercent').textContent = stagiaireValue;
                calculateFinalScore();
            }

            jurySlider.addEventListener('input', function () {
                const juryValue = parseInt(this.value);
                updateWeights(juryValue);
            });

            stagiaireSlider.addEventListener('input', function () {
                const stagiaireValue = parseInt(this.value);
                const juryValue = 100 - stagiaireValue;
                updateWeights(juryValue, true);
            });

            // Function to calculate the final score
            window.calculateFinalScore = function () {
                const juryScore = parseFloat(document.getElementById('juryScore').value);
                const stagiaireScore = parseFloat(document.getElementById('stagiaireScore').value);
                const juryPercent = parseInt(document.getElementById('juryPercent').textContent) / 100;
                const stagiairePercent = parseInt(document.getElementById('stagiairePercent').textContent) / 100;

                const finalScore = (juryScore * juryPercent) + (stagiaireScore * stagiairePercent);
                document.getElementById('finalScore').textContent = finalScore.toFixed(2) + ' / 5';
            }

            // Initialize the calculation
            calculateFinalScore();

            // Mobile sidebar functionality
            const sidebar = document.querySelector('.sidebar');
            const menuItems = document.querySelectorAll('.menu-item');

            menuItems.forEach(item => {
                item.addEventListener('click', function () {
                    menuItems.forEach(i => i.classList.remove('active'));
                    this.classList.add('active');
                });
            });
        });
    </script>
</body>

</html>