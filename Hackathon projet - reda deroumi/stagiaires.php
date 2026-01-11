<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hackathon Platform - Stagiaires Management</title>
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

        .status-pending {
            background-color: rgba(249, 115, 22, 0.2);
            color: #fb923c;
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

        .action-btn.validate {
            color: #10b981;
        }

        .action-btn.validate:hover {
            color: #34d399;
        }

        .action-btn.delete {
            color: #ef4444;
        }

        .action-btn.delete:hover {
            color: #f87171;
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
            max-width: 500px;
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

        /* Responsive */
        @media (max-width: 768px) {
            .stats-cards {
                grid-template-columns: 1fr;
            }

            .search-filter {
                flex-direction: column;
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


<?php
include_once("connexion.php");
$query = "SELECT * FROM  stagiaire";
$pdostmt = $connexion->prepare($query); // Objet (instance) de PDOStatement
$pdostmt->execute();
function countProjets($connexion)
{
    $query = "SELECT COUNT(*) as total FROM stagiaire";
    $pdostmt = $connexion->prepare($query);
    $pdostmt->execute();
    $result = $pdostmt->fetch(PDO::FETCH_ASSOC);
    return $result['total'];
}
function countStagiairesvalide($connexion)
{
    $query = "SELECT COUNT(*) as total FROM stagiaire WHERE valiadtion='valide'";
    $pdostmt = $connexion->prepare($query);
    $pdostmt->execute();
    $result = $pdostmt->fetch(PDO::FETCH_ASSOC);
    return $result['total'];
}
function countStagiairesinvalide($connexion)
{
    $query = "SELECT COUNT(*) as total FROM stagiaire WHERE valiadtion='invalide'";
    $pdostmt = $connexion->prepare($query);
    $pdostmt->execute();
    $result = $pdostmt->fetch(PDO::FETCH_ASSOC);
    return $result['total'];
}
include_once 'connexion.php'; // Connexion à la base de données
        $query1 = "SELECT * FROM stagiaire ";
        $pdostmt1 = $connexion->prepare($query1); // Objet (instance) de PDOStatement
        $pdostmt1->execute();
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Requête pour récupérer les stagiaires
        if (!empty($_POST['valide'])) {
            $idStagiaire = $_POST['valide'];
            $query = "SELECT valiadtion FROM stagiaire WHERE idStagiaire = :idStagiaire";
            $pdostmt = $connexion->prepare($query);
            $pdostmt->execute([
                ':idStagiaire' => $idStagiaire
            ]);
            $result = $pdostmt->fetch(PDO::FETCH_ASSOC);
            if ($result['valiadtion'] == "invalide") {
                $query = "UPDATE stagiaire SET valiadtion = 'valide' WHERE idStagiaire = :idStagiaire";
                $pdostmt = $connexion->prepare($query);
                $pdostmt->execute([
                    ':idStagiaire' => $idStagiaire
                ]);
                $query1 = "SELECT * FROM stagiaire ";
                $pdostmt1 = $connexion->prepare($query1); // Objet (instance) de PDOStatement
                $pdostmt1->execute();
            } elseif ($result['valiadtion'] == "valide") {
                $query = "UPDATE stagiaire SET valiadtion = 'invalide' WHERE idStagiaire = :idStagiaire";
                $pdostmt = $connexion->prepare($query);
                $pdostmt->execute([
                    ':idStagiaire' => $idStagiaire
                ]);
                $query1 = "SELECT * FROM stagiaire ";
                $pdostmt1 = $connexion->prepare($query1); // Objet (instance) de PDOStatement
                $pdostmt1->execute();
            }

        } elseif (!empty($_POST['delete'])) {
            $idStagiaire = $_POST['delete'];
            // Code to delete stagiaire
            $query = "DELETE FROM stagiaire WHERE idStagiaire = :idStagiaire";
            $pdostmt = $connexion->prepare($query);
            $pdostmt->execute([
                ':idStagiaire' => $idStagiaire
            ]);
            if ($pdostmt->rowCount() > 0) {
                echo "<script>alert('Stagiaire supprimé avec succès');</script>";
            } else {
                echo "<script>alert('Erreur lors de la suppression du stagiaire');</script>";
            }
            $query1 = "SELECT * FROM stagiaire ";
            $pdostmt1 = $connexion->prepare($query1); // Objet (instance) de PDOStatement
            $pdostmt1->execute();
        }
    }

?>

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
            <a href="#" class="menu-item active">
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
                <span class="menu-text"><V class="projet">P.valide</V></span>
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
            <h1 class="page-title">Stagiaires Management</h1>
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
                        <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                        <circle cx="9" cy="7" r="4"></circle>
                        <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                        <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                    </svg>
                </div>
                <span class="stat-title">Total Stagiaires</span>
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
                <span class="stat-title">Validated</span>
                <span class="stat-value"><?php echo countStagiairesvalide($connexion) ?></span>
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
                <span class="stat-title">Pending</span>
                <span class="stat-value"><?php echo countStagiairesinvalide($connexion) ?></span>
            </div>
            <div class="stat-card">
                <div class="stat-icon red">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10"></circle>
                        <line x1="15" y1="9" x2="9" y2="15"></line>
                        <line x1="9" y1="9" x2="15" y2="15"></line>
                    </svg>
                </div>
                <span class="stat-title">Rejected</span>
                <span class="stat-value"></span>
            </div>
        </div>

        <!-- Stagiaires Table -->
        <div class="table-container">
            <div class="table-header">
                <h2 class="table-title">All Stagiaires</h2>
                <button class="btn btn-primary btn-sm">Export Data</button>
            </div>
            <div class="search-filter">
                <input type="text" class="search-input" placeholder="Search stagiaires...">
                <select class="filter-select">
                    <option value="all">All Status</option>
                    <option value="validated">Validated</option>
                    <option value="pending">Pending</option>
                    <option value="rejected">Rejected</option>
                </select>
                <select class="filter-select">
                    <option value="all">All Institutions</option>
                    <option value="ofppt-casa">OFPPT Casablanca</option>
                    <option value="ofppt-rabat">OFPPT Rabat</option>
                    <option value="ofppt-marrakech">OFPPT Marrakech</option>
                    <option value="ofppt-tanger">OFPPT Tanger</option>
                    <option value="ofppt-agadir">OFPPT Agadir</option>
                </select>
                <select class="filter-select">
                    <option value="all">All Filières</option>
                    <option value="dev-digital">Développement Digital</option>
                    <option value="infra-systemes">Infrastructure des Systèmes et Réseaux</option>
                    <option value="dev-mobile">Développement Mobile</option>
                    <option value="full-stack">Développeur Full Stack</option>
                    <option value="data-ia">Data & Intelligence Artificielle</option>
                    <option value="cyber-security">Cybersécurité</option>
                </select>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>Institution</th>
                        <th>Filière</th>
                        <th>Year</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>

                    <?php while ($stagiaires = $pdostmt1->fetch(PDO::FETCH_ASSOC)): ?>
                        <tr>
                            <td>#ST00<?php echo $stagiaires["IdStagiaire"] ?></td>
                            <td><?php echo $stagiaires["nom"] ?><?php echo $stagiaires["prenom"] ?></td>
                            <td><?php echo $stagiaires["email"] ?></td>
                            <td><?php echo $stagiaires["institut"] ?></td>
                            <td><?php echo $stagiaires["filier"] ?></td>
                            <td><?php echo $stagiaires["anner"] ?>rd Year</td>
                            <td><span
                                    class="status status-<?php echo $stagiaires["valiadtion"] ?>"><?php echo $stagiaires["valiadtion"] ?></span>
                            </td>
                            <td>
                                <form method="POST">
                                    <button  name="valide" value="<?php echo $stagiaires["IdStagiaire"] ?>" class="action-btn validate"
                                        title="Validate" >
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                                            <polyline points="22 4 12 14.01 9 11.01"></polyline>
                                        </svg>
                                    </button>
                                    <button  name="delete" value="<?php echo $stagiaires["IdStagiaire"] ?>" class="action-btn delete"
                                        title="Delete">
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

        <!-- Details Modal -->
        <div class="modal-backdrop" id="detailsModal">
            <div class="modal">
                <div class="modal-header">
                    <h3 class="modal-title">Stagiaire Details</h3>
                    <button class="modal-close">&times;</button>
                </div>
                <div class="modal-body">
                    <div style="margin-bottom: 1.5rem;">
                        <h4 style="color: #94a3b8; font-size: 0.875rem; margin-bottom: 0.5rem;">Personal Information
                        </h4>
                        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
                            <div>
                                <p style="color: #94a3b8; font-size: 0.75rem; margin-bottom: 0.25rem;">Full Name</p>
                                <p style="color: #f8fafc; font-size: 0.875rem;">Mohammed Alaoui</p>
                            </div>
                            <div>
                                <p style="color: #94a3b8; font-size: 0.75rem; margin-bottom: 0.25rem;">Email</p>
                                <p style="color: #f8fafc; font-size: 0.875rem;">mohammed.alaoui@example.com</p>
                            </div>
                            <div>
                                <p style="color: #94a3b8; font-size: 0.75rem; margin-bottom: 0.25rem;">Phone</p>
                                <p style="color: #f8fafc; font-size: 0.875rem;">+212 612 345 678</p>
                            </div>
                            <div>
                                <p style="color: #94a3b8; font-size: 0.75rem; margin-bottom: 0.25rem;">Date of Birth</p>
                                <p style="color: #f8fafc; font-size: 0.875rem;">15/04/2002</p>
                            </div>
                        </div>
                    </div>
                    <div style="margin-bottom: 1.5rem;">
                        <h4 style="color: #94a3b8; font-size: 0.875rem; margin-bottom: 0.5rem;">Education</h4>
                        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
                            <div>
                                <p style="color: #94a3b8; font-size: 0.75rem; margin-bottom: 0.25rem;">Institution</p>
                                <p style="color: #f8fafc; font-size: 0.875rem;">OFPPT Casablanca</p>
                            </div>
                            <div>
                                <p style="color: #94a3b8; font-size: 0.75rem; margin-bottom: 0.25rem;">Filière</p>
                                <p style="color: #f8fafc; font-size: 0.875rem;">Développement Digital</p>
                            </div>
                            <div>
                                <p style="color: #94a3b8; font-size: 0.75rem; margin-bottom: 0.25rem;">Year</p>
                                <p style="color: #f8fafc; font-size: 0.875rem;">2nd Year</p>
                            </div>
                            <div>
                                <p style="color: #94a3b8; font-size: 0.75rem; margin-bottom: 0.25rem;">Student ID</p>
                                <p style="color: #f8fafc; font-size: 0.875rem;">OFPPT-2023-45678</p>
                            </div>
                        </div>
                    </div>
                    <div>
                        <h4 style="color: #94a3b8; font-size: 0.875rem; margin-bottom: 0.5rem;">Registration Info</h4>
                        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
                            <div>
                                <p style="color: #94a3b8; font-size: 0.75rem; margin-bottom: 0.25rem;">Registration Date
                                </p>
                                <p style="color: #f8fafc; font-size: 0.875rem;">12/03/2025</p>
                            </div>
                            <div>
                                <p style="color: #94a3b8; font-size: 0.75rem; margin-bottom: 0.25rem;">Status</p>
                                <p style="color: #fb923c; font-size: 0.875rem;">Pending</p>
                            </div>
                            <div>
                                <p style="color: #94a3b8; font-size: 0.75rem; margin-bottom: 0.25rem;">Projects
                                    Submitted</p>
                                <p style="color: #f8fafc; font-size: 0.875rem;">2</p>
                            </div>
                            <div>
                                <p style="color: #94a3b8; font-size: 0.75rem; margin-bottom: 0.25rem;">Events
                                    Participated</p>
                                <p style="color: #f8fafc; font-size: 0.875rem;">1</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary">Close</button>
                    <button class="btn btn-success">Validate</button>
                </div>
            </div>
        </div>
    </main>

    <script>
        // Simple JavaScript to handle modal functionality
        document.addEventListener('DOMContentLoaded', function () {


            // Get modals
            const detailsModal = document.getElementById('detailsModal');

            // Get close buttons
            const closeButtons = document.querySelectorAll('.modal-close');
            const cancelButtons = document.querySelectorAll('.modal-footer .btn-primary');



            // Handle detail button clicks
            detailButtons.forEach(button => {
                button.addEventListener('click', function () {
                    detailsModal.style.display = 'flex';
                });
            });

            // Handle close button clicks
            closeButtons.forEach(button => {
                button.addEventListener('click', function () {
                    detailsModal.style.display = 'none';
                });
            });

            // Handle cancel button clicks
            cancelButtons.forEach(button => {
                button.addEventListener('click', function () {
                    detailsModal.style.display = 'none';
                });
            });

            // Close modal when clicking outside
            window.addEventListener('click', function (event) {
                if (event.target === detailsModal) {
                    detailsModal.style.display = 'none';
                }
            });
        });
    </script>
</body>

</html>