<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hackathon Platform - Stagiaire Voting</title>
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
            overflow-x: hidden;
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

        /* Layout */
        .app-container {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* Header */
        .header {
            padding: 1.5rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: relative;
            z-index: 10;
            background: rgba(15, 23, 42, 0.7);
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .logo-icon {
            width: 50px;
            height: 50px;
            border-radius: 8px;
            background: linear-gradient(135deg, #3b82f6, #10b981);
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            color: white;
            font-size: 1.5rem;
            box-shadow: 0 10px 20px rgba(59, 130, 246, 0.3);
        }

        .logo-text {
            font-size: 1.5rem;
            font-weight: 700;
            background: linear-gradient(90deg, #3b82f6, #10b981);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        .user-menu {
            display: flex;
            align-items: center;
            gap: 1rem;
            background: rgba(30, 41, 59, 0.5);
            padding: 0.5rem 1.5rem;
            border-radius: 50px;
            border: 1px solid rgba(255, 255, 255, 0.1);
            transition: all 0.3s ease;
        }

        .user-menu:hover {
            background: rgba(30, 41, 59, 0.7);
            transform: translateY(-2px);
        }

        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: linear-gradient(135deg, #3b82f6, #10b981);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 600;
            box-shadow: 0 5px 15px rgba(59, 130, 246, 0.3);
        }

        .user-name {
            color: #ffffff;
            font-weight: 500;
        }

        /* Hero Section */
        .hero {
            text-align: center;
            padding: 3rem 2rem;
            position: relative;
            overflow: hidden;
        }

        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: radial-gradient(circle at center, rgba(59, 130, 246, 0.1) 0%, transparent 70%);
            z-index: -1;
        }

        .hero-title {
            font-size: 3rem;
            font-weight: 700;
            margin-bottom: 1rem;
            background: linear-gradient(90deg, #ffffff, #10b981);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            line-height: 1.2;
        }

        .hero-subtitle {
            font-size: 1.25rem;
            color: rgba(255, 255, 255, 0.8);
            max-width: 800px;
            margin: 0 auto 2rem;
        }

        .hero-action {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            background: linear-gradient(90deg, #3b82f6, #10b981);
            color: white;
            padding: 0.75rem 2rem;
            border-radius: 8px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
            box-shadow: 0 10px 20px rgba(59, 130, 246, 0.3);
        }

        .hero-action:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 30px rgba(59, 130, 246, 0.4);
        }

        .hero-stats {
            display: flex;
            justify-content: center;
            gap: 3rem;
            margin-top: 3rem;
        }

        .stat-item {
            text-align: center;
        }

        .stat-value {
            font-size: 2.5rem;
            font-weight: 700;
            background: linear-gradient(90deg, #3b82f6, #10b981);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            margin-bottom: 0.5rem;
        }

        .stat-label {
            color: rgba(255, 255, 255, 0.7);
            font-size: 0.875rem;
        }

        /* Project Showcase */
        .showcase {
            padding: 2rem;
        }

        .showcase-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
        }

        .showcase-title {
            font-size: 2rem;
            font-weight: 700;
            background: linear-gradient(90deg, #ffffff, #10b981);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        .showcase-filters {
            display: flex;
            gap: 1rem;
            overflow-x: auto;
            padding-bottom: 1rem;
            -ms-overflow-style: none;
            scrollbar-width: none;
        }

        .showcase-filters::-webkit-scrollbar {
            display: none;
        }

        .filter-btn {
            background: rgba(30, 41, 59, 0.5);
            border: 1px solid rgba(255, 255, 255, 0.1);
            color: rgba(255, 255, 255, 0.7);
            padding: 0.5rem 1.5rem;
            border-radius: 8px;
            font-size: 0.875rem;
            cursor: pointer;
            transition: all 0.3s ease;
            white-space: nowrap;
        }

        .filter-btn:hover {
            background: rgba(30, 41, 59, 0.7);
            color: #ffffff;
        }

        .filter-btn.active {
            background: linear-gradient(90deg, #3b82f6, #10b981);
            color: white;
            box-shadow: 0 5px 15px rgba(59, 130, 246, 0.3);
            border: none;
        }

        .search-container {
            position: relative;
            max-width: 400px;
            width: 100%;
            margin: 0 auto 2rem;
        }

        .search-input {
            width: 100%;
            padding: 0.75rem 1rem 0.75rem 3rem;
            border-radius: 8px;
            border: 1px solid #334155;
            background-color: #1e293b;
            color: #f8fafc;
            font-size: 0.875rem;
            transition: all 0.3s ease;
        }

        .search-input:focus {
            outline: none;
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.3);
        }

        .search-icon {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: rgba(255, 255, 255, 0.7);
        }

        /* Project Grid */
        .project-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
            gap: 2rem;
        }

        .project-card {
            position: relative;
            border-radius: 12px;
            overflow: hidden;
            background: rgba(15, 23, 42, 0.7);
            border: 1px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
            transition: all 0.5s ease;
            height: 250px;
            /* Reduced height since we removed the image */
        }

        .project-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
            border-color: rgba(59, 130, 246, 0.3);
        }

        .project-image {
            height: 200px;
            position: relative;
            overflow: hidden;
        }

        .project-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .project-card:hover .project-image img {
            transform: scale(1.1);
        }

        .project-category {
            position: absolute;
            top: 1rem;
            right: 1rem;
            background-color: rgba(59, 130, 246, 0.2);
            color: #60a5fa;
            padding: 0.25rem 0.75rem;
            border-radius: 9999px;
            font-size: 0.75rem;
            font-weight: 600;
            z-index: 1;
        }

        .project-content {
            padding: 1.5rem;
            display: flex;
            flex-direction: column;
            height: 100%;
            /* Take full height of card */
        }

        .project-title {
            font-size: 1.25rem;
            font-weight: 600;
            margin-bottom: 0.75rem;
            color: #f8fafc;
        }

        .project-description {
            color: #cbd5e1;
            font-size: 0.875rem;
            margin-bottom: 1.5rem;
            flex-grow: 1;
            line-height: 1.7;
        }

        .project-meta {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: auto;
        }

        .project-team {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .team-icon {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            background-color: rgba(59, 130, 246, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            color: #60a5fa;
        }

        .team-name {
            color: #94a3b8;
            font-size: 0.875rem;
        }

        .vote-btn {
            background: linear-gradient(90deg, #3b82f6, #10b981);
            color: white;
            border: none;
            padding: 0.75rem 1.5rem;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .vote-btn:hover {
            background: linear-gradient(90deg, #2563eb, #059669);
            transform: translateY(-2px);
            box-shadow: 0 4px 6px -1px rgba(59, 130, 246, 0.4);
        }

        .vote-btn svg {
            width: 16px;
            height: 16px;
        }

        /* Modal */
        .modal-overlay {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(15, 23, 42, 0.9);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 1000;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
        }

        .modal-overlay.active {
            opacity: 1;
            visibility: visible;
        }

        .modal {
            background: rgba(15, 23, 42, 0.95);
            border-radius: 12px;
            border: 1px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.5);
            width: 90%;
            max-width: 900px;
            max-height: 90vh;
            overflow-y: auto;
            padding: 0;
            transform: translateY(30px) scale(0.95);
            transition: all 0.3s ease;
            position: relative;
        }

        .modal-overlay.active .modal {
            transform: translateY(0) scale(1);
        }

        .modal-close {
            position: absolute;
            top: 1.5rem;
            right: 1.5rem;
            background: rgba(30, 41, 59, 0.5);
            border: none;
            color: #94a3b8;
            width: 40px;
            height: 40px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s ease;
            z-index: 10;
        }

        .modal-close:hover {
            background: rgba(30, 41, 59, 0.7);
            color: #ffffff;
        }

        .modal-image {
            height: 300px;
            position: relative;
            overflow: hidden;
        }

        .modal-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .modal-image::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 50%;
            background: linear-gradient(to top, rgba(15, 23, 42, 1), transparent);
        }

        .modal-content {
            padding: 2rem;
            position: relative;
            margin-top: 0;
            /* Changed from -100px since we removed the image */
        }

        .modal-category {
            display: inline-block;
            background-color: rgba(59, 130, 246, 0.2);
            color: #60a5fa;
            padding: 0.25rem 0.75rem;
            border-radius: 9999px;
            font-size: 0.75rem;
            font-weight: 600;
            margin-bottom: 1rem;
        }

        .modal-title {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 1rem;
            color: #f8fafc;
        }

        .modal-meta {
            display: flex;
            gap: 2rem;
            margin-bottom: 2rem;
            flex-wrap: wrap;
        }

        .meta-item {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            color: #94a3b8;
            font-size: 0.875rem;
        }

        .meta-icon {
            width: 40px;
            height: 40px;
            border-radius: 8px;
            background-color: rgba(30, 41, 59, 0.5);
            display: flex;
            align-items: center;
            justify-content: center;
            color: #60a5fa;
        }

        .meta-content {
            display: flex;
            flex-direction: column;
        }

        .meta-label {
            color: #64748b;
            font-size: 0.75rem;
        }

        .meta-value {
            color: #f8fafc;
            font-weight: 500;
        }

        .meta-value a {
            color: #60a5fa;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .meta-value a:hover {
            color: #3b82f6;
            text-decoration: underline;
        }

        .modal-description {
            margin-bottom: 2rem;
        }

        .modal-description h3 {
            font-size: 1.25rem;
            font-weight: 600;
            margin-bottom: 1rem;
            color: #f8fafc;
        }

        .modal-description p {
            color: #cbd5e1;
            margin-bottom: 1rem;
            line-height: 1.7;
        }

        .modal-description ul {
            margin-left: 1.5rem;
            margin-bottom: 1.5rem;
            color: #cbd5e1;
        }

        .modal-description li {
            margin-bottom: 0.5rem;
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
            animation: fadeIn 0.5s ease;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Voting Form */
        .voting-form {
            background: rgba(15, 23, 42, 0.7);
            border-radius: 12px;
            padding: 1.5rem;
            margin-top: 2rem;
            border: 1px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
        }

        .voting-title {
            font-size: 1.25rem;
            font-weight: 600;
            margin-bottom: 1.5rem;
            color: #f8fafc;
        }

        .voting-score {
            margin-bottom: 2rem;
        }

        .score-label {
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: #f8fafc;
            font-weight: 500;
            margin-bottom: 1rem;
        }

        .score-value {
            background: linear-gradient(90deg, #3b82f6, #10b981);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            font-size: 1.5rem;
            font-weight: 700;
        }

        .score-slider {
            width: 100%;
            -webkit-appearance: none;
            appearance: none;
            height: 8px;
            border-radius: 4px;
            background: #1e293b;
            outline: none;
            position: relative;
        }

        .score-slider::-webkit-slider-thumb {
            -webkit-appearance: none;
            appearance: none;
            width: 20px;
            height: 20px;
            border-radius: 50%;
            background: linear-gradient(135deg, #3b82f6, #10b981);
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .score-slider::-webkit-slider-thumb:hover {
            transform: scale(1.2);
        }

        .score-slider::-moz-range-thumb {
            width: 20px;
            height: 20px;
            border-radius: 50%;
            background: linear-gradient(135deg, #3b82f6, #10b981);
            cursor: pointer;
            border: none;
            transition: all 0.2s ease;
        }

        .score-slider::-moz-range-thumb:hover {
            transform: scale(1.2);
        }

        .score-marks {
            display: flex;
            justify-content: space-between;
            margin-top: 0.5rem;
        }

        .score-mark {
            color: #64748b;
            font-size: 0.75rem;
        }

        .comment-label {
            color: #f8fafc;
            font-weight: 500;
            margin-bottom: 1rem;
            display: block;
        }

        .comment-textarea {
            width: 100%;
            min-height: 120px;
            padding: 0.75rem 1rem;
            border-radius: 8px;
            border: 1px solid #334155;
            background-color: #1e293b;
            color: #f8fafc;
            font-size: 0.875rem;
            resize: vertical;
            transition: all 0.3s ease;
        }

        .comment-textarea:focus {
            outline: none;
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.3);
        }

        .voting-actions {
            display: flex;
            justify-content: flex-end;
            gap: 1rem;
            margin-top: 1.5rem;
        }

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

        .btn-secondary {
            background: rgba(30, 41, 59, 0.5);
            color: #94a3b8;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .btn-secondary:hover {
            background: rgba(30, 41, 59, 0.7);
            color: #f8fafc;
        }

        /* Footer */
        .footer {
            padding: 3rem 2rem;
            text-align: center;
            background: rgba(15, 23, 42, 0.7);
            margin-top: auto;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }

        .footer-logo {
            font-size: 1.5rem;
            font-weight: 700;
            background: linear-gradient(90deg, #3b82f6, #10b981);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            margin-bottom: 1rem;
        }

        .footer-links {
            display: flex;
            justify-content: center;
            gap: 2rem;
            margin-bottom: 2rem;
            flex-wrap: wrap;
        }

        .footer-link {
            color: #94a3b8;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .footer-link:hover {
            color: #3b82f6;
        }

        .footer-copyright {
            color: #64748b;
            font-size: 0.875rem;
        }

        /* Responsive */
        @media (max-width: 1024px) {
            .project-grid {
                grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            }
        }

        @media (max-width: 768px) {
            .hero-title {
                font-size: 2.5rem;
            }

            .hero-stats {
                flex-wrap: wrap;
                gap: 2rem;
            }

            .showcase-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 1rem;
            }

            .modal-title {
                font-size: 1.75rem;
            }
        }

        @media (max-width: 640px) {
            .header {
                flex-direction: column;
                gap: 1rem;
                text-align: center;
            }

            .logo {
                justify-content: center;
            }

            .hero-title {
                font-size: 2rem;
            }

            .project-grid {
                grid-template-columns: 1fr;
            }

            .modal-meta {
                flex-direction: column;
                gap: 1rem;
            }

            .voting-actions {
                flex-direction: column;
            }

            .btn {
                width: 100%;
                justify-content: center;
            }
        }
    </style>
</head>
<?php
include_once("connexion.php"); //copier le code de connexion
$query = "SELECT * FROM  project WHERE validation_pr='valide'";
$pdostmt1 = $connexion->prepare($query); // Objet (instance) de PDOStatement
$pdostmt1->execute();


function countProjectsvalide($connexion)
{
    $query = "SELECT COUNT(*) as total FROM project WHERE validation_pr='valide'";
    $pdostmt = $connexion->prepare($query);
    $pdostmt->execute();
    $result = $pdostmt->fetch(PDO::FETCH_ASSOC);
    return $result['total'];
}
function solde($connexion,$IdStagiaire)
{
    $query1 = "SELECT sold FROM stagiaire WHERE IdStagiaire=:IdStagiaire";
    $pdostmt = $connexion->prepare($query1);
    $pdostmt->execute([
        ":IdStagiaire"=>$IdStagiaire
    ]);
    $result1 = $pdostmt->fetch(PDO::FETCH_ASSOC);
    return $result1['sold'];
}
function countRemaining($connexion,$IdStagiaire)
{
    $query1 = "SELECT COUNT(*) as total FROM project WHERE validation_pr='valide'";
    $pdostmt = $connexion->prepare($query1);
    $pdostmt->execute();
    $result1 = $pdostmt->fetch(PDO::FETCH_ASSOC);
    $projet= $result1['total'];
    $query2 = "SELECT COUNT(*) as total FROM votestagiaire WHERE IdStagiaire=:IdStagiaire";
    $pdostmt = $connexion->prepare($query2);
    $pdostmt->execute([
        ':IdStagiaire' => $IdStagiaire
    ]);
    $result2 = $pdostmt->fetch(PDO::FETCH_ASSOC);
    $vote= $result2['total'];
    $remaining = $projet - $vote;
    return $remaining; 

}
session_start();
$IdStagiaire = $_SESSION['IdStagiaire'];
$nom = $_SESSION['nom'];
$prenom = $_SESSION['prenom']

?>

<body>
    <div class="bg-grid"></div>

    <div class="app-container">
        <!-- Header -->
        <header class="header">
            <div class="logo">
                <div class="logo-icon">H</div>
                <div class="logo-text">Hackathon Showcase</div>
            </div>
            <div class="user-menu">
                <div class="user-avatar">S</div>
                <span class="user-name"><?php echo $nom ?><?php echo $prenom ?></span>
            </div>
        </header>

        <!-- Hero Section -->
        <section class="hero">
            <h1 class="hero-title">Vote for Innovation</h1>
            <p class="hero-subtitle">Discover and support the most innovative projects created by talented teams. Your
                vote matters in shaping the future of technology.</p>
            <a href="#showcase" class="hero-action">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <polygon points="12 2 2 7 12 12 22 7 12 2"></polygon>
                    <polyline points="2 17 12 22 22 17"></polyline>
                    <polyline points="2 12 12 17 22 12"></polyline>
                </svg>
                Explore Projects
            </a>
            <div class="hero-stats">
                <div class="stat-item">
                    <div class="stat-value"><?php echo countProjectsvalide($connexion) ?></div>
                    <div class="stat-label">Projects</div>
                </div>
                <div class="stat-item">
                    <div class="stat-value"><?php echo solde($connexion,$IdStagiaire)?></div>
                    <div class="stat-label">Solde</div>
                </div>
                <div class="stat-item">
                    <div class="stat-value"><?php echo  countRemaining($connexion,$IdStagiaire)?></div>
                    <div class="stat-label">Remaining</div>
                </div>
            </div>
        </section>

        <!-- Project Showcase -->
        <section id="showcase" class="showcase">
            <div class="showcase-header">
                <h2 class="showcase-title">Project Gallery</h2>
                <div class="showcase-filters">
                    <button class="filter-btn active">All Projects</button>
                    <button class="filter-btn">Web Development</button>
                    <button class="filter-btn">Mobile Apps</button>
                    <button class="filter-btn">AI & ML</button>
                    <button class="filter-btn">IoT Solutions</button>
                </div>
            </div>

            <div class="search-container">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="search-icon">
                    <circle cx="11" cy="11" r="8"></circle>
                    <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                </svg>
                <input type="text" class="search-input" placeholder="Search for projects...">
            </div>

            <div class="project-grid">
                <?php while ($stagiaires = $pdostmt1->fetch(PDO::FETCH_ASSOC)): ?>
                    <!-- Project Card 1 -->
                    <div class="project-card">
                        <div class="project-content">
                            <h3 class="project-title"><?php echo $stagiaires["title"] ?></h3>
                            <p class="project-description">
                                <?php echo $stagiaires["description_pr"] ?>
                            </p>
                            <div class="project-meta">
                                <div class="project-team">
                                    <div class="team-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                            <circle cx="9" cy="7" r="4"></circle>
                                        </svg>
                                    </div>
                                    <span class="team-name"><?php echo $stagiaires["category"] ?></span>
                                </div>
                                <a href="project_sta.php/?id=<?php echo $stagiaires["IdProject"] ?>">
                                    <button class="vote-btn">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <polyline points="20 6 9 17 4 12"></polyline>
                                        </svg>
                                        Vote
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>


                <!-- Footer -->
                <footer class="footer">
                    <div class="footer-logo">Hackathon Showcase</div>
                    <div class="footer-links">
                        <a href="#" class="footer-link">About</a>
                        <a href="#" class="footer-link">Projects</a>
                        <a href="#" class="footer-link">Teams</a>
                        <a href="#" class="footer-link">Contact</a>
                        <a href="#" class="footer-link">Privacy Policy</a>
                    </div>
                    <div class="footer-copyright">© 2025 Hackathon Showcase. All rights reserved.</div>
                </footer>
            </div>

    </div>
    </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Filter buttons functionality
            const filterButtons = document.querySelectorAll('.filter-btn');
            filterButtons.forEach(button => {
                button.addEventListener('click', function () {
                    filterButtons.forEach(btn => btn.classList.remove('active'));
                    this.classList.add('active');
                });
            });
        });

        // Project Modal Functions
        function openProjectModal(projectName) {
            document.getElementById('projectName').textContent = projectName;

            // Remove this line:
            // document.getElementById('modalImage').src = `https://via.placeholder.com/900x300?text=${projectName.replace(/ /g, '+')}`;

            // Set project category based on project name
            let category = '';
            if (projectName.includes('Health')) {
                category = 'IoT Solutions';
            } else if (projectName.includes('AI')) {
                category = 'AI & Machine Learning';
            } else if (projectName.includes('Mobile') || projectName.includes('Augmented Reality')) {
                category = 'Mobile Apps';
            } else if (projectName.includes('Virtual Classroom')) {
                category = 'Web Development';
            } else {
                category = 'Web Development';
            }
            document.getElementById('projectCategory').textContent = category;

            // Set team name based on project name
            let team = '';
            if (projectName === 'Smart Health Monitoring System') {
                team = 'Team Innovate (5 members)';
            } else if (projectName === 'AI-Powered Learning Platform') {
                team = 'CodeMasters (4 members)';
            } else if (projectName === 'Sustainable City Mobile App') {
                team = 'GreenTech (3 members)';
            } else if (projectName === 'E-Commerce Platform') {
                team = 'WebWizards (4 members)';
            } else if (projectName === 'Virtual Classroom Environment') {
                team = 'EduTech (4 members)';
            } else {
                team = 'ARExplorers (5 members)';
            }
            document.getElementById('projectTeam').textContent = team;

            // Reset score slider to default
            document.getElementById('projectScore').value = 15;
            document.getElementById('scoreValue').textContent = '15/20';

            // Clear comment textarea
            document.querySelector('.comment-textarea').value = '';

            // Show the modal with animation
            document.getElementById('projectModal').classList.add('active');

            // Reset to first tab
            const tabs = document.querySelectorAll('.tab');
            tabs.forEach(tab => tab.classList.remove('active'));
            tabs[0].classList.add('active');

            const tabContents = document.querySelectorAll('.tab-content');
            tabContents.forEach(content => content.style.display = 'none');
            document.getElementById('demoTab').style.display = 'block';
        }

        function closeProjectModal() {
            document.getElementById('projectModal').classList.remove('active');
        }

        function updateScoreValue(value) {
            document.getElementById('scoreValue').textContent = value + '/20';
        }

        function switchTab(tabElement, tabId) {
            // Remove active class from all tabs
            const tabs = document.querySelectorAll('.tab');
            tabs.forEach(tab => tab.classList.remove('active'));

            // Add active class to clicked tab
            tabElement.classList.add('active');

            // Hide all tab content
            const tabContents = document.querySelectorAll('.tab-content');
            tabContents.forEach(content => content.style.display = 'none');

            // Show selected tab content
            document.getElementById(tabId).style.display = 'block';
        }

        function submitVote() {
            // Get project name
            const projectName = document.getElementById('projectName').textContent;

            // Get score
            const score = document.getElementById('projectScore').value;

            // Get comment
            const comment = document.querySelector('.comment-textarea').value;

            // In a real application, you would send this data to the server
            console.log('Submitting vote for', projectName);
            console.log('Score:', score + '/20');
            console.log('Comment:', comment);

            // Show success message with animation
            const modal = document.querySelector('.modal');
            modal.innerHTML = `
                <div style="padding: 3rem; text-align: center;">
                    <div style="font-size: 5rem; margin-bottom: 2rem; color: #10b981;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="pulse">
                            <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                            <polyline points="22 4 12 14.01 9 11.01"></polyline>
                        </svg>
                    </div>
                    <h2 style="font-size: 2rem; margin-bottom: 1rem; color: #f8fafc;">Thank You for Voting!</h2>
                    <p style="color: #cbd5e1; font-size: 1.25rem; margin-bottom: 2rem;">You gave <strong>${projectName}</strong> a score of <strong>${score}/20</strong>.</p>
                    <button class="btn btn-primary" onclick="closeProjectModal()" style="margin: 0 auto;">Continue Exploring</button>
                </div>
            `;

            // Close the modal after 3 seconds
            setTimeout(() => {
                closeProjectModal();
            }, 5000);
        }
    </script>
</body>

</html>