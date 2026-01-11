<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hackathon Platform - Innovate, Create, Collaborate</title>
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

        /* Animated Background */
        .bg-animation {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            overflow: hidden;
        }

        .bg-animation span {
            position: absolute;
            display: block;
            width: 20px;
            height: 20px;
            background: rgba(255, 255, 255, 0.05);
            animation: animate 25s linear infinite;
            bottom: -150px;
            border-radius: 50%;
        }

        .bg-animation span:nth-child(1) {
            left: 10%;
            width: 80px;
            height: 80px;
            animation-delay: 0s;
            animation-duration: 15s;
            background: rgba(59, 130, 246, 0.05);
        }

        .bg-animation span:nth-child(2) {
            left: 20%;
            width: 30px;
            height: 30px;
            animation-delay: 2s;
            animation-duration: 25s;
            background: rgba(16, 185, 129, 0.05);
        }

        .bg-animation span:nth-child(3) {
            left: 30%;
            width: 100px;
            height: 100px;
            animation-delay: 4s;
            animation-duration: 12s;
            background: rgba(59, 130, 246, 0.05);
        }

        .bg-animation span:nth-child(4) {
            left: 40%;
            width: 60px;
            height: 60px;
            animation-delay: 0s;
            animation-duration: 18s;
            background: rgba(16, 185, 129, 0.05);
        }

        .bg-animation span:nth-child(5) {
            left: 50%;
            width: 50px;
            height: 50px;
            animation-delay: 7s;
            animation-duration: 15s;
            background: rgba(59, 130, 246, 0.05);
        }

        .bg-animation span:nth-child(6) {
            left: 60%;
            width: 110px;
            height: 110px;
            animation-delay: 3s;
            animation-duration: 12s;
            background: rgba(16, 185, 129, 0.05);
        }

        .bg-animation span:nth-child(7) {
            left: 70%;
            width: 40px;
            height: 40px;
            animation-delay: 5s;
            animation-duration: 20s;
            background: rgba(59, 130, 246, 0.05);
        }

        .bg-animation span:nth-child(8) {
            left: 80%;
            width: 90px;
            height: 90px;
            animation-delay: 1s;
            animation-duration: 15s;
            background: rgba(16, 185, 129, 0.05);
        }

        .bg-animation span:nth-child(9) {
            left: 90%;
            width: 70px;
            height: 70px;
            animation-delay: 0s;
            animation-duration: 11s;
            background: rgba(59, 130, 246, 0.05);
        }

        @keyframes animate {
            0% {
                transform: translateY(0) rotate(0deg);
                opacity: 0.8;
            }
            100% {
                transform: translateY(-1000px) rotate(720deg);
                opacity: 0;
            }
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
            border-radius: 12px;
            background: linear-gradient(135deg, #3b82f6, #10b981);
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            color: white;
            font-size: 1.5rem;
            box-shadow: 0 10px 20px rgba(59, 130, 246, 0.3);
            position: relative;
            overflow: hidden;
        }

        .logo-icon::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: linear-gradient(45deg, transparent, rgba(255, 255, 255, 0.3), transparent);
            transform: rotate(45deg);
            animation: shine 3s infinite;
        }

        @keyframes shine {
            0% {
                left: -50%;
                top: -50%;
            }
            100% {
                left: 150%;
                top: 150%;
            }
        }

        .logo-text {
            font-size: 1.5rem;
            font-weight: 700;
            background: linear-gradient(90deg, #3b82f6, #10b981);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        .nav-links {
            display: flex;
            gap: 2rem;
        }

        .nav-link {
            color: #e2e8f0;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
            position: relative;
            padding: 0.5rem 0;
        }

        .nav-link:hover {
            color: #3b82f6;
        }

        .nav-link::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: 0;
            left: 0;
            background: linear-gradient(90deg, #3b82f6, #10b981);
            transition: width 0.3s ease;
        }

        .nav-link:hover::after {
            width: 100%;
        }

        .auth-buttons {
            display: flex;
            gap: 1rem;
        }

        .btn {
            display: inline-block;
            padding: 0.75rem 1.5rem;
            border-radius: 12px;
            font-weight: 600;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s ease;
            border: none;
            font-size: 0.875rem;
            text-decoration: none;
            position: relative;
            overflow: hidden;
            z-index: 1;
        }

        .btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, rgba(255, 255, 255, 0.1), rgba(255, 255, 255, 0));
            z-index: -1;
            transform: translateX(-100%);
            transition: transform 0.6s ease;
        }

        .btn:hover::before {
            transform: translateX(0);
        }

        .btn-outline {
            background: transparent;
            border: 1px solid rgba(255, 255, 255, 0.2);
            color: #e2e8f0;
        }

        .btn-outline:hover {
            border-color: #3b82f6;
            color: #3b82f6;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(59, 130, 246, 0.2);
        }

        .btn-primary {
            background: linear-gradient(90deg, #3b82f6, #10b981);
            color: white;
            box-shadow: 0 4px 6px -1px rgba(59, 130, 246, 0.3);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(59, 130, 246, 0.4);
        }

        .mobile-menu-btn {
            display: none;
            background: none;
            border: none;
            color: #e2e8f0;
            font-size: 1.5rem;
            cursor: pointer;
        }

        /* Hero Section */
        .hero {
            padding: 6rem 2rem;
            text-align: center;
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

        .hero-content {
            max-width: 800px;
            margin: 0 auto;
            position: relative;
        }

        .hero-shapes {
            position: absolute;
            top: -100px;
            left: -100px;
            right: -100px;
            bottom: -100px;
            z-index: -1;
            pointer-events: none;
        }

        .hero-shape {
            position: absolute;
            border-radius: 50%;
            opacity: 0.2;
        }

        .hero-shape-1 {
            width: 300px;
            height: 300px;
            background: linear-gradient(135deg, #3b82f6, transparent);
            top: -150px;
            left: -150px;
            animation: float 8s ease-in-out infinite;
        }

        .hero-shape-2 {
            width: 200px;
            height: 200px;
            background: linear-gradient(135deg, #10b981, transparent);
            bottom: -100px;
            right: -100px;
            animation: float 10s ease-in-out infinite;
        }

        .hero-shape-3 {
            width: 150px;
            height: 150px;
            background: linear-gradient(135deg, #3b82f6, transparent);
            top: 50%;
            right: -75px;
            animation: float 7s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% {
                transform: translateY(0) rotate(0deg);
            }
            50% {
                transform: translateY(-20px) rotate(5deg);
            }
        }

        .hero-title {
            font-size: 3.5rem;
            font-weight: 800;
            margin-bottom: 1.5rem;
            line-height: 1.2;
            background: linear-gradient(90deg, #ffffff, #10b981);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            position: relative;
            display: inline-block;
        }

        .hero-title::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 100px;
            height: 4px;
            background: linear-gradient(90deg, #3b82f6, #10b981);
            border-radius: 2px;
        }

        .hero-subtitle {
            font-size: 1.25rem;
            color: rgba(255, 255, 255, 0.8);
            margin-bottom: 2.5rem;
        }

        .hero-buttons {
            display: flex;
            justify-content: center;
            gap: 1rem;
            margin-bottom: 3rem;
        }

        .hero-stats {
            display: flex;
            justify-content: center;
            gap: 4rem;
            margin-top: 4rem;
        }

        .stat-item {
            text-align: center;
            position: relative;
            padding: 2rem;
            background: rgba(15, 23, 42, 0.3);
            border-radius: 16px;
            border: 1px solid rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(5px);
            transition: all 0.3s ease;
        }

        .stat-item:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
            border-color: rgba(59, 130, 246, 0.3);
        }

        .stat-item::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, rgba(59, 130, 246, 0.1), rgba(16, 185, 129, 0.1));
            border-radius: 16px;
            z-index: -1;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .stat-item:hover::before {
            opacity: 1;
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
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        /* Features Section */
        .features {
            padding: 6rem 2rem;
            background: linear-gradient(135deg, rgba(15, 23, 42, 0.8), rgba(30, 41, 59, 0.8));
            position: relative;
            overflow: hidden;
        }

        .features::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%239C92AC' fill-opacity='0.05'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
            z-index: -1;
        }

        .section-header {
            text-align: center;
            margin-bottom: 4rem;
            position: relative;
        }

        .section-title {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
            background: linear-gradient(90deg, #ffffff, #10b981);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            display: inline-block;
            position: relative;
        }

        .section-title::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 4px;
            background: linear-gradient(90deg, #3b82f6, #10b981);
            border-radius: 2px;
        }

        .section-subtitle {
            color: rgba(255, 255, 255, 0.7);
            max-width: 600px;
            margin: 0 auto;
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            max-width: 1200px;
            margin: 0 auto;
        }

        .feature-card {
            background: rgba(15, 23, 42, 0.7);
            border-radius: 16px;
            padding: 2rem;
            border: 1px solid rgba(255, 255, 255, 0.1);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            z-index: 1;
        }

        .feature-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 5px;
            background: linear-gradient(90deg, #3b82f6, #10b981);
            z-index: -1;
            transition: height 0.3s ease;
        }

        .feature-card:hover {
            transform: translateY(-10px);
            border-color: rgba(59, 130, 246, 0.3);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }

        .feature-card:hover::before {
            height: 100%;
            opacity: 0.05;
        }

        .feature-icon {
            width: 60px;
            height: 60px;
            border-radius: 16px;
            background: rgba(59, 130, 246, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1.5rem;
            color: #3b82f6;
            font-size: 1.5rem;
            position: relative;
            overflow: hidden;
        }

        .feature-icon::after {
            content: '';
            position: absolute;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, rgba(59, 130, 246, 0.2), rgba(16, 185, 129, 0.2));
            top: -100%;
            left: 0;
            transition: top 0.3s ease;
        }

        .feature-card:hover .feature-icon::after {
            top: 0;
        }

        .feature-icon svg {
            z-index: 1;
        }

        .feature-title {
            font-size: 1.25rem;
            font-weight: 600;
            margin-bottom: 1rem;
            color: #f8fafc;
        }

        .feature-description {
            color: #cbd5e1;
            font-size: 0.875rem;
            line-height: 1.7;
        }

        /* Projects Showcase */
        .projects {
            padding: 6rem 2rem;
            position: relative;
            overflow: hidden;
        }

        .projects::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: radial-gradient(circle at top right, rgba(16, 185, 129, 0.1) 0%, transparent 70%);
            z-index: -1;
        }

        .projects-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
            gap: 2rem;
            max-width: 1200px;
            margin: 0 auto;
        }

        .project-card {
            position: relative;
            border-radius: 16px;
            overflow: hidden;
            background: rgba(15, 23, 42, 0.7);
            border: 1px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
            transition: all 0.5s ease;
            transform-style: preserve-3d;
            perspective: 1000px;
        }

        .project-card:hover {
            transform: translateY(-10px) rotateX(5deg);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
            border-color: rgba(59, 130, 246, 0.3);
        }

        .project-content {
            padding: 1.5rem;
            position: relative;
            z-index: 1;
        }

        .project-content::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, rgba(59, 130, 246, 0.05), rgba(16, 185, 129, 0.05));
            z-index: -1;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .project-card:hover .project-content::before {
            opacity: 1;
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
            backdrop-filter: blur(5px);
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
            line-height: 1.7;
        }

        .project-meta {
            display: flex;
            justify-content: space-between;
            align-items: center;
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

        .view-project {
            background: linear-gradient(90deg, #3b82f6, #10b981);
            color: white;
            border: none;
            padding: 0.5rem 1rem;
            border-radius: 8px;
            font-weight: 600;
            font-size: 0.75rem;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            position: relative;
            overflow: hidden;
        }

        .view-project::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, rgba(255, 255, 255, 0.1), rgba(255, 255, 255, 0));
            transform: translateX(-100%);
            transition: transform 0.6s ease;
        }

        .view-project:hover::before {
            transform: translateX(0);
        }

        .view-project:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 6px -1px rgba(59, 130, 246, 0.4);
        }

        /* Upcoming Events */
        .events {
            padding: 6rem 2rem;
            background: linear-gradient(135deg, rgba(15, 23, 42, 0.8), rgba(30, 41, 59, 0.8));
            position: relative;
            overflow: hidden;
        }

        .events::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%239C92AC' fill-opacity='0.05'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
            z-index: -1;
        }

        .events-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
            gap: 2rem;
            max-width: 1200px;
            margin: 0 auto;
        }

        .event-card {
            background: rgba(15, 23, 42, 0.7);
            border-radius: 16px;
            overflow: hidden;
            border: 1px solid rgba(255, 255, 255, 0.1);
            transition: all 0.3s ease;
            position: relative;
        }

        .event-card:hover {
            transform: translateY(-10px);
            border-color: rgba(59, 130, 246, 0.3);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }

        .event-banner {
            height: 180px;
            background: linear-gradient(135deg, #3b82f6, #10b981);
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 2rem;
            font-weight: 700;
            overflow: hidden;
        }

        .event-banner::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url("data:image/svg+xml,%3Csvg width='100' height='100' viewBox='0 0 100 100' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M11 18c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm48 25c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm-43-7c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm63 31c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM34 90c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm56-76c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM12 86c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm28-65c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm23-11c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-6 60c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm29 22c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zM32 63c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm57-13c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-9-21c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM60 91c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM35 41c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM12 60c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2z' fill='%23ffffff' fill-opacity='0.1' fill-rule='evenodd'/%3E%3C/svg%3E");
            opacity: 0.3;
        }

        .event-content {
            padding: 1.5rem;
            position: relative;
        }

        .event-date {
            display: inline-block;
            background-color: rgba(16, 185, 129, 0.2);
            color: #34d399;
            padding: 0.25rem 0.75rem;
            border-radius: 9999px;
            font-size: 0.75rem;
            font-weight: 600;
            margin-bottom: 1rem;
        }

        .event-title {
            font-size: 1.25rem;
            font-weight: 600;
            margin-bottom: 0.75rem;
            color: #f8fafc;
        }

        .event-description {
            color: #cbd5e1;
            font-size: 0.875rem;
            margin-bottom: 1.5rem;
            line-height: 1.7;
        }

        .event-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .event-location {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: #94a3b8;
            font-size: 0.875rem;
        }

        .register-btn {
            background: linear-gradient(90deg, #3b82f6, #10b981);
            color: white;
            border: none;
            padding: 0.5rem 1rem;
            border-radius: 8px;
            font-weight: 600;
            font-size: 0.75rem;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .register-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, rgba(255, 255, 255, 0.1), rgba(255, 255, 255, 0));
            transform: translateX(-100%);
            transition: transform 0.6s ease;
        }

        .register-btn:hover::before {
            transform: translateX(0);
        }

        .register-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 6px -1px rgba(59, 130, 246, 0.4);
        }

        /* CTA Section */
        .cta {
            padding: 6rem 2rem;
            text-align: center;
            background: linear-gradient(135deg, rgba(59, 130, 246, 0.1), rgba(16, 185, 129, 0.1));
            position: relative;
            overflow: hidden;
        }

        .cta::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: radial-gradient(circle at center, rgba(59, 130, 246, 0.2) 0%, transparent 70%);
            z-index: -1;
        }

        .cta-content {
            max-width: 800px;
            margin: 0 auto;
            position: relative;
        }

        .cta-title {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
            background: linear-gradient(90deg, #ffffff, #10b981);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            position: relative;
            display: inline-block;
        }

        .cta-title::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 100px;
            height: 4px;
            background: linear-gradient(90deg, #3b82f6, #10b981);
            border-radius: 2px;
        }

        .cta-subtitle {
            color: rgba(255, 255, 255, 0.8);
            margin-bottom: 2.5rem;
            font-size: 1.125rem;
        }

        /* Footer */
        .footer {
            padding: 4rem 2rem;
            background: rgba(15, 23, 42, 0.9);
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            position: relative;
            overflow: hidden;
        }

        .footer::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%239C92AC' fill-opacity='0.05'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
            z-index: -1;
        }

        .footer-content {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 3rem;
        }

        .footer-logo {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            margin-bottom: 1.5rem;
        }

        .footer-logo-icon {
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
        }

        .footer-logo-text {
            font-size: 1.25rem;
            font-weight: 700;
            background: linear-gradient(90deg, #3b82f6, #10b981);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        .footer-description {
            color: #94a3b8;
            font-size: 0.875rem;
            margin-bottom: 1.5rem;
            line-height: 1.7;
        }

        .social-links {
            display: flex;
            gap: 1rem;
        }

        .social-link {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background: rgba(30, 41, 59, 0.5);
            display: flex;
            align-items: center;
            justify-content: center;
            color: #94a3b8;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .social-link::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, #3b82f6, #10b981);
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .social-link:hover::before {
            opacity: 1;
        }

        .social-link svg {
            position: relative;
            z-index: 1;
            transition: color 0.3s ease;
        }

        .social-link:hover svg {
            color: white;
        }

        .social-link:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 10px rgba(59, 130, 246, 0.2);
        }

        .footer-title {
            font-size: 1.125rem;
            font-weight: 600;
            color: #f8fafc;
            margin-bottom: 1.5rem;
            position: relative;
            display: inline-block;
        }

        .footer-title::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 40px;
            height: 2px;
            background: linear-gradient(90deg, #3b82f6, #10b981);
            border-radius: 1px;
        }

        .footer-links {
            list-style: none;
        }

        .footer-link {
            margin-bottom: 0.75rem;
            position: relative;
            padding-left: 1rem;
        }

        .footer-link::before {
            content: '→';
            position: absolute;
            left: 0;
            color: #3b82f6;
            opacity: 0;
            transform: translateX(-10px);
            transition: all 0.3s ease;
        }

        .footer-link:hover::before {
            opacity: 1;
            transform: translateX(0);
        }

        .footer-link a {
            color: #94a3b8;
            text-decoration: none;
            transition: all 0.3s ease;
            font-size: 0.875rem;
        }

        .footer-link a:hover {
            color: #3b82f6;
            padding-left: 5px;
        }

        .footer-bottom {
            max-width: 1200px;
            margin: 0 auto;
            padding-top: 2rem;
            margin-top: 3rem;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: #64748b;
            font-size: 0.875rem;
        }

        .footer-bottom-links {
            display: flex;
            gap: 1.5rem;
        }

        .footer-bottom-link {
            color: #94a3b8;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .footer-bottom-link:hover {
            color: #3b82f6;
        }

        /* Responsive */
        @media (max-width: 1024px) {
            .hero-title {
                font-size: 3rem;
            }

            .hero-stats {
                gap: 2rem;
            }
        }

        @media (max-width: 768px) {
            .nav-links, .auth-buttons {
                display: none;
            }

            .mobile-menu-btn {
                display: block;
            }

            .hero-title {
                font-size: 2.5rem;
            }

            .hero-buttons {
                flex-direction: column;
                align-items: center;
            }

            .hero-stats {
                flex-direction: column;
                gap: 2rem;
            }

            .footer-content {
                grid-template-columns: 1fr;
                gap: 2rem;
            }

            .footer-bottom {
                flex-direction: column;
                gap: 1rem;
                text-align: center;
            }

            .footer-bottom-links {
                justify-content: center;
            }
        }

        @media (max-width: 640px) {
            .header {
                padding: 1rem;
            }

            .hero, .features, .projects, .events, .cta {
                padding: 4rem 1rem;
            }

            .hero-title {
                font-size: 2rem;
            }

            .section-title {
                font-size: 2rem;
            }

            .features-grid, .projects-grid, .events-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>
    <div class="bg-grid"></div>
    <div class="bg-animation">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
    </div>

    <div class="app-container">
        <!-- Header -->
         
        <header class="header">
            <div class="logo">
                <div class="logo-icon">H</div>
                <div class="logo-text">Hackathon Platform</div>
            </div>

            <div class="auth-buttons">
                <a href="home.php" class="btn btn-outline">Sign In</a>
                <a href="home.php" class="btn btn-primary">Sign Up</a>
            </div>

            <button class="mobile-menu-btn">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="3" y1="12" x2="21" y2="12"></line>
                    <line x1="3" y1="6" x2="21" y2="6"></line>
                    <line x1="3" y1="18" x2="21" y2="18"></line>
                </svg>
            </button>
        </header>

        <!-- Hero Section -->
        <section class="hero">
            <div class="hero-shapes">
                <div class="hero-shape hero-shape-1"></div>
                <div class="hero-shape hero-shape-2"></div>
                <div class="hero-shape hero-shape-3"></div>
            </div>
            <div class="hero-content">
                <h1 class="hero-title">Innovate, Create, Collaborate</h1>
                <p class="hero-subtitle">Join our community of innovators, showcase your projects, and connect with talented developers around the world. Participate in exciting hackathons and turn your ideas into reality.</p>
                <div class="hero-buttons">
                    <a href="home.php" class="btn btn-primary">Get Started</a>
                    <a href="home.php" class="btn btn-outline">Learn More</a>
                </div>
            </div>

            <div class="hero-stats">
                <div class="stat-item">
                    <div class="stat-value">50+</div>
                    <div class="stat-label">Projects</div>
                </div>
                <div class="stat-item">
                    <div class="stat-value">200+</div>
                    <div class="stat-label">Participants</div>
                </div>
                <div class="stat-item">
                    <div class="stat-value">10+</div>
                    <div class="stat-label">Hackathons</div>
                </div>
            </div>
        </section>

        <!-- Features Section -->
        <section id="features" class="features">
            <div class="section-header">
                <h2 class="section-title">Platform Features</h2>
                <p class="section-subtitle">Everything you need to participate in and organize successful hackathons</p>
            </div>

            <div class="features-grid">
                <div class="feature-card">
                    <div class="feature-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                            <circle cx="9" cy="7" r="4"></circle>
                            <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                            <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                        </svg>
                    </div>
                    <h3 class="feature-title">Team Formation</h3>
                    <p class="feature-description">Find teammates with complementary skills or join existing teams. Build the perfect team to bring your ideas to life.</p>
                </div>

                <div class="feature-card">
                    <div class="feature-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polygon points="12 2 2 7 12 12 22 7 12 2"></polygon>
                            <polyline points="2 17 12 22 22 17"></polyline>
                            <polyline points="2 12 12 17 22 12"></polyline>
                        </svg>
                    </div>
                    <h3 class="feature-title">Project Showcase</h3>
                    <p class="feature-description">Present your projects to the community. Get feedback, recognition, and opportunities for further development.</p>
                </div>

                <div class="feature-card">
                    <div class="feature-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="12" r="10"></circle>
                            <polyline points="12 6 12 12 16 14"></polyline>
                        </svg>
                    </div>
                    <h3 class="feature-title">Real-time Updates</h3>
                    <p class="feature-description">Stay informed with real-time notifications about hackathon events, deadlines, and important announcements.</p>
                </div>

                <div class="feature-card">
                    <div class="feature-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                            <polyline points="14 2 14 8 20 8"></polyline>
                            <line x1="16" y1="13" x2="8" y2="13"></line>
                            <line x1="16" y1="17" x2="8" y2="17"></line>
                            <polyline points="10 9 9 9 8 9"></polyline>
                        </svg>
                    </div>
                    <h3 class="feature-title">Documentation</h3>
                    <p class="feature-description">Access comprehensive documentation and resources to help you succeed in hackathons and project development.</p>
                </div>

                <div class="feature-card">
                    <div class="feature-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                            <polyline points="22 4 12 14.01 9 11.01"></polyline>
                        </svg>
                    </div>
                    <h3 class="feature-title">Voting System</h3>
                    <p class="feature-description">Transparent and fair voting system for evaluating projects. Vote for your favorite projects and see real-time results.</p>
                </div>

                <div class="feature-card">
                    <div class="feature-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M21.44 11.05l-9.19 9.19a6 6 0 0 1-8.48-8.48l9.19-9.19a4 4 0 0 1 5.66 5.66l-9.2 9.19a2 2 0 0 1-2.83-2.83l8.49-8.48"></path>
                        </svg>
                    </div>
                    <h3 class="feature-title">Resource Sharing</h3>
                    <p class="feature-description">Share and access resources, code snippets, and tools to enhance your hackathon experience and project development.</p>
                </div>
            </div>
        </section>

        <!-- Projects Showcase -->
        <section id="projects" class="projects">
            <div class="section-header">
                <h2 class="section-title">Featured Projects</h2>
                <p class="section-subtitle">Discover innovative projects created by our talented community</p>
            </div>

            <div class="projects-grid">
                <div class="project-card">
                    <div class="project-content">
                        <span class="project-category">AI & Machine Learning</span>
                        <h3 class="project-title">AI-Powered Learning Platform</h3>
                        <p class="project-description">An intelligent learning platform that adapts to individual learning styles and provides personalized educational content.</p>
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
                                <span class="team-name">Team CodeMasters</span>
                            </div>
                            <button class="view-project">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                    <circle cx="12" cy="12" r="3"></circle>
                                </svg>
                                View Project
                            </button>
                        </div>
                    </div>
                </div>

                <div class="project-card">
                    <div class="project-content">
                        <span class="project-category">IoT Solutions</span>
                        <h3 class="project-title">Smart Health Monitoring System</h3>
                        <p class="project-description">A comprehensive health monitoring system that uses IoT devices to track vital signs and provide real-time health insights.</p>
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
                                <span class="team-name">Team Innovate</span>
                            </div>
                            <button class="view-project">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                    <circle cx="12" cy="12" r="3"></circle>
                                </svg>
                                View Project
                            </button>
                        </div>
                    </div>
                </div>

                <div class="project-card">
                    <div class="project-content">
                        <span class="project-category">Mobile Apps</span>
                        <h3 class="project-title">Sustainable City Mobile App</h3>
                        <p class="project-description">A mobile application that helps citizens adopt sustainable practices and contribute to creating eco-friendly urban environments.</p>
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
                                <span class="team-name">GreenTech</span>
                            </div>
                            <button class="view-project">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                    <circle cx="12" cy="12" r="3"></circle>
                                </svg>
                                View Project
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Upcoming Events -->
        <section id="events" class="events">
            <div class="section-header">
                <h2 class="section-title">Upcoming Hackathons</h2>
                <p class="section-subtitle">Join exciting hackathons and showcase your skills</p>
            </div>

            <div class="events-grid">
                <div class="event-card">
                    <div class="event-banner">Web3</div>
                    <div class="event-content">
                        <span class="event-date">Starting in 3 days</span>
                        <h3 class="event-title">Web3 Innovation Challenge</h3>
                        <p class="event-description">Join us for an exciting 48-hour hackathon focused on building the future of decentralized applications. Work with cutting-edge technologies and compete for prizes worth $10,000!</p>
                        <div class="event-footer">
                            <div class="event-location">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                                    <circle cx="12" cy="10" r="3"></circle>
                                </svg>
                                Virtual Event
                            </div>
                            <button class="register-btn">Register Now</button>
                        </div>
                    </div>
                </div>

                <div class="event-card">
                    <div class="event-banner">AI</div>
                    <div class="event-content">
                        <span class="event-date">Starting in 2 weeks</span>
                        <h3 class="event-title">AI for Social Good</h3>
                        <p class="event-description">Develop AI solutions that address pressing social challenges. This hackathon brings together developers, data scientists, and domain experts to create impactful projects.</p>
                        <div class="event-footer">
                            <div class="event-location">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                                    <circle cx="12" cy="10" r="3"></circle>
                                </svg>
                                Hybrid Event
                            </div>
                            <button class="register-btn">Register Now</button>
                        </div>
                    </div>
                </div>

                <div class="event-card">
                    <div class="event-banner">IoT</div>
                    <div class="event-content">
                        <span class="event-date">Starting in 1 month</span>
                        <h3 class="event-title">Smart Cities Hackathon</h3>
                        <p class="event-description">Build innovative IoT solutions for smart cities. Focus on urban mobility, energy efficiency, waste management, or public safety to create a better urban future.</p>
                        <div class="event-footer">
                            <div class="event-location">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                                    <circle cx="12" cy="10" r="3"></circle>
                                </svg>
                                In-person Event
                            </div>
                            <button class="register-btn">Register Now</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- CTA Section -->
        <section class="cta">
            <div class="cta-content">
                <h2 class="cta-title">Ready to Join Our Community?</h2>
                <p class="cta-subtitle">Sign up today and start your journey with our vibrant community of innovators, developers, and creative minds.</p>
                <a href="#" class="btn btn-primary">Get Started Now</a>
            </div>
        </section>

        <!-- Footer -->
        <footer class="footer">
            <div class="footer-content">
                <div>
                    <div class="footer-logo">
                        <div class="footer-logo-icon">H</div>
                        <div class="footer-logo-text">Hackathon Platform</div>
                    </div>
                    <p class="footer-description">A platform for innovators, developers, and creative minds to collaborate, learn, and build amazing projects together.</p>
                    <div class="social-links">
                        <a href="#" class="social-link">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round">
                                <path
                                    d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path>
                            </svg>
                        </a>
                        <a href="#" class="social-link">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round">
                                <path
                                    d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z">
                                </path>
                            </svg>
                        </a>
                        <a href="#" class="social-link">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round">
                                <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
                                <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                                <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
                            </svg>
                        </a>
                        <a href="#" class="social-link">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round">
                                <path
                                    d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22">
                                </path>
                            </svg>
                        </a>
                    </div>
                </div>

                <div>
                    <h4 class="footer-title">Platform</h4>
                    <ul class="footer-links">
                        <li class="footer-link"><a href="#">Features</a></li>
                        <li class="footer-link"><a href="#">Projects</a></li>
                        <li class="footer-link"><a href="#">Hackathons</a></li>
                        <li class="footer-link"><a href="#">Resources</a></li>
                        <li class="footer-link"><a href="#">Community</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="footer-title">Support</h4>
                    <ul class="footer-links">
                        <li class="footer-link"><a href="#">Help Center</a></li>
                        <li class="footer-link"><a href="#">Documentation</a></li>
                        <li class="footer-link"><a href="#">Contact Us</a></li>
                        <li class="footer-link"><a href="#">FAQ</a></li>
                        <li class="footer-link"><a href="#">Tutorials</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="footer-title">Legal</h4>
                    <ul class="footer-links">
                        <li class="footer-link"><a href="#">Terms of Service</a></li>
                        <li class="footer-link"><a href="#">Privacy Policy</a></li>
                        <li class="footer-link"><a href="#">Cookie Policy</a></li>
                        <li class="footer-link"><a href="#">Data Protection</a></li>
                        <li class="footer-link"><a href="#">Code of Conduct</a></li>
                    </ul>
                </div>
            </div>

            <div class="footer-bottom">
                <p>© 2025 Hackathon Platform. All rights reserved.</p>
                <div class="footer-bottom-links">
                    <a href="#" class="footer-bottom-link">Privacy</a>
                    <a href="#" class="footer-bottom-link">Terms</a>
                    <a href="#" class="footer-bottom-link">Cookies</a>
                </div>
            </div>
        </footer>
    </div>

    <script>
        // Mobile menu functionality could be added here
        document.querySelector('.mobile-menu-btn').addEventListener('click', function() {
            alert('Mobile menu functionality would be implemented here');
        });
    </script>
</body>

</html>