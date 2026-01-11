<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project Details - Hackathon Platform</title>
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

        /* Main Content */
        .main-content {
            flex: 1;
            padding: 2rem;
            max-width: 1200px;
            margin: 0 auto;
            width: 100%;
        }

        /* Back Button */
        .back-button {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            color: #94a3b8;
            text-decoration: none;
            margin-bottom: 2rem;
            transition: all 0.3s ease;
        }

        .back-button:hover {
            color: #3b82f6;
        }

        /* Project Details */
        .project-details {
            background: rgba(15, 23, 42, 0.7);
            border-radius: 12px;
            border: 1px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            margin-bottom: 2rem;
        }

        .project-header {
            padding: 2rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .project-category {
            display: inline-block;
            background-color: rgba(59, 130, 246, 0.2);
            color: #60a5fa;
            padding: 0.25rem 0.75rem;
            border-radius: 9999px;
            font-size: 0.75rem;
            font-weight: 600;
            margin-bottom: 1rem;
        }

        .project-title {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 1rem;
            color: #f8fafc;
        }

        .project-meta {
            display: flex;
            gap: 2rem;
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

        .project-body {
            padding: 2rem;
        }

        .project-description {
            margin-bottom: 2rem;
        }

        .project-description h3 {
            font-size: 1.25rem;
            font-weight: 600;
            margin-bottom: 1rem;
            color: #f8fafc;
        }

        .project-description p {
            color: #cbd5e1;
            margin-bottom: 1rem;
            line-height: 1.7;
        }

        .project-description ul {
            margin-left: 1.5rem;
            margin-bottom: 1.5rem;
            color: #cbd5e1;
        }

        .project-description li {
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

        .tab-content.active {
            display: block;
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

        /* Voting Section */
        .voting-section {
            background: rgba(15, 23, 42, 0.7);
            border-radius: 12px;
            padding: 2rem;
            margin-bottom: 2rem;
            border: 1px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
        }

        .section-title {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
            color: #f8fafc;
        }

        .voting-form {
            margin-bottom: 2rem;
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

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-label {
            color: #f8fafc;
            font-weight: 500;
            margin-bottom: 0.5rem;
            display: block;
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

        .form-textarea {
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

        .form-textarea:focus {
            outline: none;
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.3);
        }

        .form-actions {
            display: flex;
            justify-content: flex-end;
            gap: 1rem;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
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

        /* Comments Section */
        .comments-section {
            background: rgba(15, 23, 42, 0.7);
            border-radius: 12px;
            padding: 2rem;
            border: 1px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
        }

        .comments-list {
            margin-top: 2rem;
        }

        .comment {
            padding: 1.5rem;
            border-radius: 8px;
            background: rgba(30, 41, 59, 0.5);
            border: 1px solid rgba(255, 255, 255, 0.05);
            margin-bottom: 1.5rem;
        }

        .comment-header {
            display: flex;
            justify-content: space-between;
            margin-bottom: 1rem;
        }

        .comment-author {
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .author-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: linear-gradient(135deg, #3b82f6, #10b981);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 600;
        }

        .author-info {
            display: flex;
            flex-direction: column;
        }

        .author-name {
            font-weight: 600;
            color: #f8fafc;
        }

        .comment-date {
            font-size: 0.75rem;
            color: #94a3b8;
        }

        .comment-rating {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            background: rgba(16, 185, 129, 0.1);
            padding: 0.25rem 0.75rem;
            border-radius: 9999px;
            font-size: 0.875rem;
            font-weight: 600;
            color: #34d399;
        }

        .comment-body {
            color: #cbd5e1;
            line-height: 1.7;
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
        @media (max-width: 768px) {
            .project-meta {
                flex-direction: column;
                gap: 1rem;
            }

            .form-actions {
                flex-direction: column;
            }

            .btn {
                width: 100%;
            }
        }
    </style>
</head>
<?php
$vote = false;
session_start();
$IdStagiaire = $_SESSION['IdStagiaire'];
$nom = $_SESSION['nom'];
$prenom = $_SESSION['prenom'];

$IdProject = $_GET['id'];
include_once("connexion.php"); //copier le code de connexion
$query = "SELECT * FROM  project WHERE IdProject=:id";
$pdostmt = $connexion->prepare($query); // Objet (instance) de PDOStatement
$pdostmt->execute([
    ':id' => $IdProject
]);
$result = $pdostmt->fetch(PDO::FETCH_ASSOC);

function countProjets($connexion)
{
    $query = "SELECT COUNT(*) as total FROM project";
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

$query1 = "SELECT AVG(score) AS average_score, COUNT(*) AS total_votes 
 FROM votestagiaire WHERE Idprojet = :IdProject";
$stmt = $connexion->prepare($query1);
$stmt->execute([':IdProject' => $IdProject]);
$result1 = $stmt->fetch(PDO::FETCH_ASSOC);

// Récupérer les résultats
$averageScore = $result1['average_score'] ? round($result1['average_score'], 1) : 0; // Moyenne arrondie à 1 décimale
$totalVotes = $result1['total_votes'] ? $result1['total_votes'] : 0; // Nombre total de votes
   

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit_vote'])) {
    $score = $_POST['score'];
    $currentSolde = solde($connexion,$IdStagiaire);
    $comment = $_POST['comment'];
    $IdProject = $_GET['id'];
    if ($currentSolde < $score) {
        echo "<script>alert('Solde insuffisant pour voter.');</script>";
    } else {
        // Déduire le montant du solde
        $newSolde = $currentSolde - $score;
        $updateQuery = "UPDATE stagiaire SET sold = :newSolde WHERE IdStagiaire = :IdStagiaire";
        $updateStmt = $connexion->prepare($updateQuery);
        $updateStmt->execute([
            ':newSolde' => $newSolde,
            ':IdStagiaire' => $IdStagiaire
        ]);
    $query = "INSERT INTO votestagiaire (IdStagiaire, Idprojet, score, comments, pup) VALUES (:IdStagiaire, :IdProject, :score, :comment, :pup)";
    $pdostmt = $connexion->prepare($query);
    $pdostmt->execute([
        ':IdStagiaire' => $IdStagiaire,
        ':IdProject' => $IdProject,
        ':score' => $score,
        ':comment' => $comment,
        ':pup' => date('Y-m-d')

    ]);
    if ($pdostmt->rowCount() > 0) {
        echo "<script>alert('Vote and comment submitted successfully!');</script>";
        $vote = true;
    } else {
        echo "<script>alert('Failed to submit vote and comment.');</script>";
    }
        // Requête pour récupérer les scores et compter les votes
        $query1 = "SELECT AVG(score) AS average_score, COUNT(*) AS total_votes 
        FROM votestagiaire WHERE Idprojet = :IdProject";
        $stmt = $connexion->prepare($query1);
        $stmt->execute([':IdProject' => $IdProject]);
        $result1 = $stmt->fetch(PDO::FETCH_ASSOC);

        // Récupérer les résultats
        $averageScore = $result1['average_score'] ? round($result1['average_score'], 1) : 0; // Moyenne arrondie à 1 décimale
        $totalVotes = $result1['total_votes'] ? $result1['total_votes'] : 0; // Nombre total de votes

   }   //
}
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

        <!-- Main Content -->
        <main class="main-content">
            <a href="home_sta.php" class="back-button">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="19" y1="12" x2="5" y2="12"></line>
                    <polyline points="12 19 5 12 12 5"></polyline>
                </svg>
                Back to Projects
            </a>

            <!-- Success Message (Example) -->
            <div
                style="background: rgba(16, 185, 129, 0.1); border: 1px solid rgba(16, 185, 129, 0.3); color: #34d399; padding: 1rem; border-radius: 8px; margin-bottom: 2rem; display: none;">
                Your vote and comment have been submitted successfully!
            </div>

            <!-- Project Details -->
            <div class="project-details">
                <div class="project-header">
                    <span class="project-category">Web Development</span>
                    <h1 class="project-title">Smart Health Monitoring System</h1>

                    <div class="project-meta">
                        <div class="meta-item">
                            <div class="meta-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="9" cy="7" r="4"></circle>
                                </svg>
                            </div>
                            <div class="meta-content">
                                <span class="meta-label">Team</span>
                                <span class="meta-value"><?php echo countMembres($connexion, $IdProject) ?> members</span>
                            </div>
                        </div>

                        <div class="meta-item">
                            <div class="meta-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path d="M12 20V10"></path>
                                    <path d="M18 20V4"></path>
                                    <path d="M6 20v-6"></path>
                                </svg>
                            </div>
                            <div class="meta-content">
                                <span class="meta-label">Average Score</span>
                                <span class="meta-value"><?php echo $averageScore?>/20 (<?php echo $totalVotes?> votes)</span>
                            </div>
                        </div>

                        <div class="meta-item">
                            <div class="meta-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                                    <polyline points="14 2 14 8 20 8"></polyline>
                                    <line x1="16" y1="13" x2="8" y2="13"></line>
                                    <line x1="16" y1="17" x2="8" y2="17"></line>
                                    <polyline points="10 9 9 9 8 9"></polyline>
                                </svg>
                            </div>
                            <div class="meta-content">
                                <span class="meta-label">Documentation</span>
                                <span class="meta-value"><a href="http://localhost/Genava/<?php echo $result['doc_url'] ?>" 
                                        target="_blank">View Document</a></span>
                            </div>
                        </div>

                        <div class="meta-item">
                            <div class="meta-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <rect x="2" y="2" width="20" height="20" rx="2.18" ry="2.18"></rect>
                                    <line x1="7" y1="2" x2="7" y2="22"></line>
                                    <line x1="17" y1="2" x2="17" y2="22"></line>
                                    <line x1="2" y1="12" x2="22" y2="12"></line>
                                    <line x1="2" y1="7" x2="7" y2="7"></line>
                                    <line x1="2" y1="17" x2="7" y2="17"></line>
                                    <line x1="17" y1="17" x2="22" y2="17"></line>
                                    <line x1="17" y1="7" x2="22" y2="7"></line>
                                </svg>
                            </div>
                            <div class="meta-content">
                                <span class="meta-label">Demo Video</span>
                                <span class="meta-value"><a href="<?php echo $result['video_url'] ?>"
                                        target="_blank">Watch Demo</a></span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="project-body">
                    <div class="project-description">
                        <h3>Project Description</h3>
                        <p><?php echo $result['description_pr'] ?></p>


                    </div>

                    <div class="tabs">
                        <div class="tab active" onclick="switchTab(this, 'teamTab')">Team Members</div>
                    </div>

                    <div id="teamTab" class="tab-content active">
                        <h3>Team Members</h3>
                        <div
                            style="display: grid; grid-template-columns: repeat(auto-fill, minmax(200px, 1fr)); gap: 1.5rem; margin-top: 1.5rem;">
                            <?php if (!empty($result['membre1'])): ?>
                                <div
                                    style="background: rgba(30, 41, 59, 0.5); border-radius: 8px; padding: 1.5rem; text-align: center;">
                                    <div
                                        style="width: 80px; height: 80px; border-radius: 50%; background: linear-gradient(135deg, #3b82f6, #10b981); display: flex; align-items: center; justify-content: center; margin: 0 auto 1rem; box-shadow: 0 10px 20px rgba(59, 130, 246, 0.3);">
                                        <span style="color: white; font-weight: 600; font-size: 1.5rem;">J</span>
                                    </div>
                                    <h4 style="margin-bottom: 0.5rem; color: #ffffff;"><?php echo $result['membre1'] ?></h4>
                                    <p style="color: #94a3b8;">Team Lead</p>
                                    <p style="color: #64748b; font-size: 0.875rem; margin-top: 0.5rem;">john.doe@example.com
                                    </p>
                                </div>
                            <?php endif; ?>
                            <?php if (!empty($result['membre2'])): ?>
                                <div
                                    style="background: rgba(30, 41, 59, 0.5); border-radius: 8px; padding: 1.5rem; text-align: center;">
                                    <div
                                        style="width: 80px; height: 80px; border-radius: 50%; background: linear-gradient(135deg, #3b82f6, #10b981); display: flex; align-items: center; justify-content: center; margin: 0 auto 1rem; box-shadow: 0 10px 20px rgba(59, 130, 246, 0.3);">
                                        <span style="color: white; font-weight: 600; font-size: 1.5rem;">J</span>
                                    </div>
                                    <h4 style="margin-bottom: 0.5rem; color: #ffffff;"><?php echo $result['membre2'] ?></h4>
                                    <p style="color: #94a3b8;"><?php echo $result['role_membre2'] ?></p>
                                    <p style="color: #64748b; font-size: 0.875rem; margin-top: 0.5rem;">
                                        <?php echo $result['email_membre2'] ?></p>
                                </div>
                            <?php endif; ?>
                            <?php if (!empty($result['membre3'])): ?>
                                <div
                                    style="background: rgba(30, 41, 59, 0.5); border-radius: 8px; padding: 1.5rem; text-align: center;">
                                    <div
                                        style="width: 80px; height: 80px; border-radius: 50%; background: linear-gradient(135deg, #3b82f6, #10b981); display: flex; align-items: center; justify-content: center; margin: 0 auto 1rem; box-shadow: 0 10px 20px rgba(59, 130, 246, 0.3);">
                                        <span style="color: white; font-weight: 600; font-size: 1.5rem;">M</span>
                                    </div>
                                    <h4 style="margin-bottom: 0.5rem; color: #ffffff;"><?php echo $result['membre3'] ?></h4>
                                    <p style="color: #94a3b8;"><?php echo $result['role_membre3'] ?></p>
                                    <p style="color: #64748b; font-size: 0.875rem; margin-top: 0.5rem;">
                                        <?php echo $result['email_membre3'] ?></p>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>


                </div>
            </div>

            <!-- Voting Section -->
            <?php if ($vote == false): ?>
                <div class="voting-section">
                    <h2 class="section-title">Cast Your Vote</h2>

                    <form class="voting-form" method="post" id="voteForm">
                        <div class="voting-score">
                            <label class="score-label">
                                <span>Project Score</span>
                                <span class="score-value" id="scoreValue">15/20</span>
                            </label>
                            <input type="range" min="0" max="<?php echo solde($connexion,$IdStagiaire)?>" value="15" class="score-slider" id="projectScore"
                                name="score" >
                            <div class="score-marks">
                                <span class="score-mark">0</span>
                                <span class="score-mark">5</span>
                                <span class="score-mark">10</span>
                                <span class="score-mark">15</span>
                                <span class="score-mark">20</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="comment">Your Feedback</label>
                            <textarea class="form-textarea" id="comment" name="comment"
                                placeholder="Share your thoughts about this project..."></textarea>
                        </div>

                        <div class="form-actions">
                            <button type="submit" name="submit_vote" class="btn btn-success" id="submitVoteBtn">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <polyline points="20 6 9 17 4 12"></polyline>
                                </svg>
                                Submit Vote
                            </button>
                        </div>
                    </form>
                </div>
            <?php endif; ?>

            <!-- Comments Section -->
            <div class="comments-section">
                <h2 class="section-title">Feedback & Comments (3)</h2>

                <div class="comments-list">
                    <div class="comment">
                        <div class="comment-header">
                            <div class="comment-author">
                                <div class="author-avatar">
                                    A
                                </div>
                                <div class="author-info">
                                    <div class="author-name">Alex Johnson</div>
                                    <div class="comment-date">May 15, 2025</div>
                                </div>
                            </div>
                            <div class="comment-rating">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <polygon
                                        points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                    </polygon>
                                </svg>
                                18/20
                            </div>
                        </div>
                        <div class="comment-body">
                            This project is incredibly innovative! The real-time monitoring features are impressive, and
                            the mobile app interface is intuitive. I particularly like how the system handles alerts for
                            abnormal readings. Great work on the integration with healthcare provider systems.
                        </div>
                    </div>

                    <div class="comment">
                        <div class="comment-header">
                            <div class="comment-author">
                                <div class="author-avatar">
                                    S
                                </div>
                                <div class="author-info">
                                    <div class="author-name">Sarah Williams</div>
                                    <div class="comment-date">May 12, 2025</div>
                                </div>
                            </div>
                            <div class="comment-rating">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <polygon
                                        points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                    </polygon>
                                </svg>
                                16/20
                            </div>
                        </div>
                        <div class="comment-body">
                            The concept is excellent and addresses a real need in healthcare monitoring. I would suggest
                            improving the battery life of the wearable sensors and adding more customization options for
                            alerts. The data visualization is well done, but could benefit from more export options.
                        </div>
                    </div>

                    <div class="comment">
                        <div class="comment-header">
                            <div class="comment-author">
                                <div class="author-avatar">
                                    M
                                </div>
                                <div class="author-info">
                                    <div class="author-name">Michael Brown</div>
                                    <div class="comment-date">May 10, 2025</div>
                                </div>
                            </div>
                            <div class="comment-rating">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <polygon
                                        points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                    </polygon>
                                </svg>
                                19/20
                            </div>
                        </div>
                        <div class="comment-body">
                            Outstanding project with great attention to detail! The technical implementation is solid,
                            and I'm impressed by the machine learning component for anomaly detection. The team has
                            clearly put a lot of thought into both the hardware and software aspects. This has real
                            potential for commercial applications.
                        </div>
                    </div>
                </div>
            </div>
        </main>

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

    <script>
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
            tabContents.forEach(content => content.classList.remove('active'));

            // Show selected tab content
            document.getElementById(tabId).classList.add('active');
        }



    </script>
</body>

</html>