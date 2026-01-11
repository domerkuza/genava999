<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plateforme de Hackathon - Innover, Créer, Collaborer</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800&family=Poppins:wght@300;400;500;600;700&display=swap">
    <style>
        /* Reset and Base Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Montserrat', sans-serif;
        }

        :root {
            --primary: #3b82f6;
            --primary-dark: #2563eb;
            --secondary: #10b981;
            --secondary-dark: #059669;
            --accent: #8b5cf6;
            --accent-dark: #7c3aed;
            --dark: #0f172a;
            --dark-lighter: #1e293b;
            --light: #f8fafc;
            --text-light: #94a3b8;
            --text-lighter: #cbd5e1;
            --gradient-primary: linear-gradient(135deg, #3b82f6, #10b981);
            --gradient-secondary: linear-gradient(135deg, #8b5cf6, #ec4899);
            --gradient-dark: linear-gradient(135deg, #0f172a, #1e293b);
            --shadow-sm: 0 4px 6px rgba(0, 0, 0, 0.1);
            --shadow-md: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
            --shadow-lg: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
            --shadow-primary: 0 10px 20px rgba(59, 130, 246, 0.3);
            --shadow-secondary: 0 10px 20px rgba(16, 185, 129, 0.3);
            --shadow-accent: 0 10px 20px rgba(139, 92, 246, 0.3);
            --border-radius-sm: 8px;
            --border-radius-md: 12px;
            --border-radius-lg: 20px;
            --border-radius-xl: 30px;
            --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        body {
            background: var(--gradient-dark);
            color: var(--light);
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

        /* Animated Shapes */
        .animated-shape {
            position: absolute;
            border-radius: 50%;
            filter: blur(60px);
            opacity: 0.15;
            z-index: -1;
            animation: float 15s ease-in-out infinite;
        }

        .shape-1 {
            width: 300px;
            height: 300px;
            background: var(--primary);
            top: 10%;
            left: -100px;
            animation-delay: 0s;
        }

        .shape-2 {
            width: 400px;
            height: 400px;
            background: var(--secondary);
            top: 60%;
            right: -150px;
            animation-delay: 5s;
        }

        .shape-3 {
            width: 250px;
            height: 250px;
            background: var(--accent);
            bottom: 10%;
            left: 20%;
            animation-delay: 10s;
        }

        @keyframes float {
            0% {
                transform: translateY(0) scale(1);
            }
            50% {
                transform: translateY(-30px) scale(1.05);
            }
            100% {
                transform: translateY(0) scale(1);
            }
        }

        /* Floating Elements */
        .floating-element {
            position: absolute;
            z-index: -1;
            opacity: 0.1;
            animation: floatElement 10s ease-in-out infinite;
        }

        .code-element {
            font-family: monospace;
            font-size: 1.5rem;
            color: var(--primary);
        }

        .code-1 {
            top: 15%;
            left: 10%;
            animation-delay: 0s;
        }

        .code-2 {
            top: 40%;
            right: 15%;
            animation-delay: 2s;
        }

        .code-3 {
            bottom: 20%;
            left: 15%;
            animation-delay: 4s;
        }

        @keyframes floatElement {
            0% {
                transform: translateY(0) rotate(0deg);
            }
            50% {
                transform: translateY(-20px) rotate(5deg);
            }
            100% {
                transform: translateY(0) rotate(0deg);
            }
        }

        /* Container */
        .container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 2rem;
        }

        /* Header */
        .header {
            padding: 1.5rem 0;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 100;
            background: rgba(15, 23, 42, 0.8);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
            transition: var(--transition);
        }

        .header.scrolled {
            padding: 1rem 0;
            background: rgba(15, 23, 42, 0.95);
            box-shadow: var(--shadow-md);
        }

        .header-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .logo-icon {
            width: 50px;
            height: 50px;
            border-radius: var(--border-radius-sm);
            background: var(--gradient-primary);
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            color: white;
            font-size: 1.5rem;
            box-shadow: var(--shadow-primary);
            position: relative;
            overflow: hidden;
        }

        .logo-icon::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.2);
            transform: skewX(-30deg);
            transition: var(--transition);
        }

        .logo:hover .logo-icon::before {
            left: 100%;
        }

        .logo-text {
            font-size: 1.5rem;
            font-weight: 700;
            background: var(--gradient-primary);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        .nav {
            display: flex;
            align-items: center;
            gap: 3rem;
        }

        .nav-links {
            display: flex;
            gap: 2rem;
            list-style: none;
        }

        .nav-link {
            color: var(--text-lighter);
            text-decoration: none;
            font-weight: 500;
            transition: var(--transition);
            position: relative;
            padding: 0.5rem 0;
        }

        .nav-link::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0;
            height: 2px;
            background: var(--gradient-primary);
            transition: var(--transition);
        }

        .nav-link:hover {
            color: var(--light);
        }

        .nav-link:hover::after {
            width: 100%;
        }

        .auth-buttons {
            display: flex;
            gap: 1rem;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 0.75rem 1.5rem;
            border-radius: var(--border-radius-sm);
            font-weight: 600;
            transition: var(--transition);
            cursor: pointer;
            text-decoration: none;
            border: none;
            outline: none;
        }

        .btn-outline {
            background: transparent;
            color: var(--light);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .btn-outline:hover {
            border-color: var(--primary);
            color: var(--primary);
            transform: translateY(-3px);
        }

        .btn-primary {
            background: var(--gradient-primary);
            color: white;
            box-shadow: var(--shadow-primary);
        }

        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 30px rgba(59, 130, 246, 0.4);
        }

        .mobile-menu-btn {
            display: none;
            background: transparent;
            border: none;
            color: var(--light);
            font-size: 1.5rem;
            cursor: pointer;
        }

        /* Hero Section */
        .hero {
            padding: 10rem 0 6rem;
            position: relative;
            overflow: hidden;
        }

        .hero-container {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 4rem;
            align-items: center;
        }

        .hero-content {
            max-width: 600px;
        }

        .hero-subtitle {
            display: inline-block;
            background: rgba(59, 130, 246, 0.1);
            color: var(--primary);
            padding: 0.5rem 1rem;
            border-radius: 50px;
            font-weight: 600;
            font-size: 0.875rem;
            margin-bottom: 1.5rem;
            border: 1px solid rgba(59, 130, 246, 0.2);
        }

        .hero-title {
            font-size: 3.5rem;
            font-weight: 800;
            line-height: 1.2;
            margin-bottom: 1.5rem;
            background: linear-gradient(to right, var(--light), #a5b4fc);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        .hero-title span {
            display: block;
            background: var(--gradient-primary);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        .hero-description {
            color: var(--text-lighter);
            font-size: 1.1rem;
            margin-bottom: 2.5rem;
            line-height: 1.8;
        }

        .hero-buttons {
            display: flex;
            gap: 1rem;
            margin-bottom: 2.5rem;
        }

        .btn-secondary {
            background: var(--gradient-secondary);
            color: white;
            box-shadow: var(--shadow-accent);
        }

        .btn-secondary:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 30px rgba(139, 92, 246, 0.4);
        }

        .hero-stats {
            display: flex;
            gap: 3rem;
        }

        .stat-item {
            display: flex;
            flex-direction: column;
        }

        .stat-value {
            font-size: 2.5rem;
            font-weight: 700;
            background: var(--gradient-primary);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            line-height: 1;
        }

        .stat-label {
            color: var(--text-light);
            font-size: 0.875rem;
            margin-top: 0.5rem;
        }

        .hero-image {
            position: relative;
        }

        .hero-image-main {
            width: 100%;
            border-radius: var(--border-radius-lg);
            box-shadow: var(--shadow-lg);
            transform: perspective(1000px) rotateY(-5deg);
            transition: var(--transition);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .hero-image:hover .hero-image-main {
            transform: perspective(1000px) rotateY(0deg);
        }

        .hero-image::before {
            content: '';
            position: absolute;
            top: -20px;
            left: -20px;
            width: 100px;
            height: 100px;
            background: var(--gradient-secondary);
            border-radius: var(--border-radius-md);
            z-index: -1;
            opacity: 0.5;
        }

        .hero-image::after {
            content: '';
            position: absolute;
            bottom: -30px;
            right: -30px;
            width: 150px;
            height: 150px;
            background: var(--gradient-primary);
            border-radius: 50%;
            z-index: -1;
            opacity: 0.5;
        }

        /* Features Section */
        .features {
            padding: 6rem 0;
            position: relative;
        }

        .section-header {
            text-align: center;
            max-width: 800px;
            margin: 0 auto 4rem;
        }

        .section-subtitle {
            display: inline-block;
            background: rgba(16, 185, 129, 0.1);
            color: var(--secondary);
            padding: 0.5rem 1rem;
            border-radius: 50px;
            font-weight: 600;
            font-size: 0.875rem;
            margin-bottom: 1rem;
            border: 1px solid rgba(16, 185, 129, 0.2);
        }

        .section-title {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
            background: linear-gradient(to right, var(--light), #a5b4fc);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        .section-description {
            color: var(--text-lighter);
            font-size: 1.1rem;
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2.5rem;
        }

        .feature-card {
            background: rgba(30, 41, 59, 0.5);
            border-radius: var(--border-radius-md);
            padding: 2.5rem;
            border: 1px solid rgba(255, 255, 255, 0.05);
            transition: var(--transition);
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
            height: 100%;
            background: linear-gradient(135deg, rgba(59, 130, 246, 0.1), rgba(16, 185, 129, 0.1));
            z-index: -1;
            opacity: 0;
            transition: var(--transition);
        }

        .feature-card:hover {
            transform: translateY(-10px);
            border-color: rgba(59, 130, 246, 0.2);
            box-shadow: var(--shadow-md);
        }

        .feature-card:hover::before {
            opacity: 1;
        }

        .feature-icon {
            width: 60px;
            height: 60px;
            border-radius: var(--border-radius-sm);
            background: var(--gradient-primary);
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1.5rem;
            box-shadow: var(--shadow-primary);
            position: relative;
            overflow: hidden;
        }

        .feature-icon::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.2);
            transform: skewX(-30deg);
            transition: var(--transition);
        }

        .feature-card:hover .feature-icon::before {
            left: 100%;
        }

        .feature-icon svg {
            width: 30px;
            height: 30px;
            color: white;
        }

        .feature-title {
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 1rem;
            color: var(--light);
        }

        .feature-description {
            color: var(--text-lighter);
            line-height: 1.7;
        }

        /* How It Works Section */
        .how-it-works {
            padding: 6rem 0;
            position: relative;
            background: rgba(15, 23, 42, 0.5);
        }

        .steps {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2.5rem;
            counter-reset: step;
        }

        .step-card {
            background: rgba(30, 41, 59, 0.5);
            border-radius: var(--border-radius-md);
            padding: 2.5rem;
            border: 1px solid rgba(255, 255, 255, 0.05);
            transition: var(--transition);
            position: relative;
            counter-increment: step;
        }

        .step-card:hover {
            transform: translateY(-10px);
            border-color: rgba(59, 130, 246, 0.2);
            box-shadow: var(--shadow-md);
        }

        .step-card::before {
            content: counter(step);
            position: absolute;
            top: -20px;
            left: 20px;
            width: 40px;
            height: 40px;
            background: var(--gradient-primary);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            color: white;
            box-shadow: var(--shadow-primary);
        }

        .step-title {
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 1rem;
            color: var(--light);
        }

        .step-description {
            color: var(--text-lighter);
            line-height: 1.7;
        }

        /* Upcoming Hackathons Section */
        .upcoming {
            padding: 6rem 0;
            position: relative;
        }

        .hackathon-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 2.5rem;
        }

        .hackathon-card {
            background: rgba(30, 41, 59, 0.5);
            border-radius: var(--border-radius-md);
            overflow: hidden;
            border: 1px solid rgba(255, 255, 255, 0.05);
            transition: var(--transition);
        }

        .hackathon-card:hover {
            transform: translateY(-10px);
            border-color: rgba(59, 130, 246, 0.2);
            box-shadow: var(--shadow-md);
        }

        .hackathon-image {
            height: 200px;
            position: relative;
            overflow: hidden;
        }

        .hackathon-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: var(--transition);
        }

        .hackathon-card:hover .hackathon-image img {
            transform: scale(1.1);
        }

        .hackathon-date {
            position: absolute;
            top: 1rem;
            right: 1rem;
            background: rgba(15, 23, 42, 0.8);
            color: var(--light);
            padding: 0.5rem 1rem;
            border-radius: var(--border-radius-sm);
            font-size: 0.875rem;
            font-weight: 600;
            backdrop-filter: blur(5px);
            -webkit-backdrop-filter: blur(5px);
        }

        .hackathon-content {
            padding: 2rem;
        }

        .hackathon-title {
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 1rem;
            color: var(--light);
        }

        .hackathon-description {
            color: var(--text-lighter);
            margin-bottom: 1.5rem;
            line-height: 1.7;
        }

        .hackathon-tags {
            display: flex;
            flex-wrap: wrap;
            gap: 0.5rem;
            margin-bottom: 1.5rem;
        }

        .tag {
            background: rgba(59, 130, 246, 0.1);
            color: var(--primary);
            padding: 0.25rem 0.75rem;
            border-radius: 50px;
            font-size: 0.75rem;
            font-weight: 600;
            border: 1px solid rgba(59, 130, 246, 0.2);
        }

        .tag.green {
            background: rgba(16, 185, 129, 0.1);
            color: var(--secondary);
            border-color: rgba(16, 185, 129, 0.2);
        }

        .tag.purple {
            background: rgba(139, 92, 246, 0.1);
            color: var(--accent);
            border-color: rgba(139, 92, 246, 0.2);
        }

        .hackathon-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .hackathon-prize {
            color: var(--text-light);
            font-size: 0.875rem;
        }

        .prize-amount {
            color: var(--light);
            font-weight: 600;
        }

        /* Testimonials Section */
        .testimonials {
            padding: 6rem 0;
            position: relative;
            background: rgba(15, 23, 42, 0.5);
        }

        .testimonial-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 2.5rem;
        }

        .testimonial-card {
            background: rgba(30, 41, 59, 0.5);
            border-radius: var(--border-radius-md);
            padding: 2.5rem;
            border: 1px solid rgba(255, 255, 255, 0.05);
            transition: var(--transition);
            position: relative;
        }

        .testimonial-card:hover {
            transform: translateY(-10px);
            border-color: rgba(59, 130, 246, 0.2);
            box-shadow: var(--shadow-md);
        }

        .testimonial-quote {
            font-size: 3rem;
            color: var(--primary);
            position: absolute;
            top: 1rem;
            right: 1.5rem;
            opacity: 0.2;
        }

        .testimonial-content {
            color: var(--text-lighter);
            font-size: 1.1rem;
            line-height: 1.7;
            margin-bottom: 2rem;
            position: relative;
            z-index: 1;
        }

        .testimonial-author {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .author-avatar {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            overflow: hidden;
        }

        .author-avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .author-info {
            display: flex;
            flex-direction: column;
        }

        .author-name {
            color: var(--light);
            font-weight: 600;
        }

        .author-role {
            color: var(--text-light);
            font-size: 0.875rem;
        }

        /* CTA Section */
        .cta {
            padding: 6rem 0;
            position: relative;
        }

        .cta-container {
            background: linear-gradient(135deg, rgba(59, 130, 246, 0.1), rgba(16, 185, 129, 0.1));
            border-radius: var(--border-radius-lg);
            padding: 4rem;
            border: 1px solid rgba(59, 130, 246, 0.2);
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .cta-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 100 100"><rect width="100" height="100" fill="none"/><path d="M0,0L100,100" stroke="rgba(255,255,255,0.05)" stroke-width="1"/></svg>');
            background-size: 30px 30px;
            z-index: -1;
        }

        .cta-title {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
            background: linear-gradient(to right, var(--light), #a5b4fc);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        .cta-description {
            color: var(--text-lighter);
            font-size: 1.1rem;
            max-width: 700px;
            margin: 0 auto 2.5rem;
            line-height: 1.7;
        }

        .cta-buttons {
            display: flex;
            justify-content: center;
            gap: 1rem;
        }

        /* Footer */
        .footer {
            padding: 6rem 0 2rem;
            background: var(--dark);
            border-top: 1px solid rgba(255, 255, 255, 0.05);
        }

        .footer-container {
            display: grid;
            grid-template-columns: 2fr repeat(3, 1fr);
            gap: 4rem;
        }

        .footer-logo {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-bottom: 1.5rem;
        }

        .footer-logo-icon {
            width: 40px;
            height: 40px;
            border-radius: var(--border-radius-sm);
            background: var(--gradient-primary);
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
            background: var(--gradient-primary);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        .footer-description {
            color: var(--text-light);
            margin-bottom: 1.5rem;
            line-height: 1.7;
        }

        .social-links {
            display: flex;
            gap: 1rem;
        }

        .social-link {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: rgba(30, 41, 59, 0.5);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--text-lighter);
            transition: var(--transition);
            border: 1px solid rgba(255, 255, 255, 0.05);
        }

        .social-link:hover {
            background: var(--primary);
            color: white;
            transform: translateY(-3px);
        }

        .footer-title {
            font-size: 1.25rem;
            font-weight: 600;
            color: var(--light);
            margin-bottom: 1.5rem;
        }

        .footer-links {
            list-style: none;
        }

        .footer-link {
            margin-bottom: 1rem;
        }

        .footer-link a {
            color: var(--text-light);
            text-decoration: none;
            transition: var(--transition);
        }

        .footer-link a:hover {
            color: var(--primary);
        }

        .footer-bottom {
            margin-top: 4rem;
            padding-top: 2rem;
            border-top: 1px solid rgba(255, 255, 255, 0.05);
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: var(--text-light);
            font-size: 0.875rem;
        }

        .footer-bottom-links {
            display: flex;
            gap: 2rem;
        }

        .footer-bottom-link {
            color: var(--text-light);
            text-decoration: none;
            transition: var(--transition);
        }

        .footer-bottom-link:hover {
            color: var(--primary);
        }

        /* Responsive Styles */
        @media (max-width: 1200px) {
            .hero-title {
                font-size: 3rem;
            }

            .footer-container {
                grid-template-columns: 1fr 1fr;
                gap: 3rem;
            }
        }

        @media (max-width: 992px) {
            .hero-container {
                grid-template-columns: 1fr;
                gap: 3rem;
            }

            .hero-content {
                max-width: 100%;
                text-align: center;
            }

            .hero-buttons, .hero-stats {
                justify-content: center;
            }

            .hero-image {
                max-width: 600px;
                margin: 0 auto;
            }

            .cta-container {
                padding: 3rem 2rem;
            }
        }

        @media (max-width: 768px) {
            .header-container {
                position: relative;
            }

            .nav {
                position: absolute;
                top: 100%;
                left: 0;
                width: 100%;
                background: var(--dark-lighter);
                padding: 1.5rem;
                flex-direction: column;
                gap: 1.5rem;
                border-radius: 0 0 var(--border-radius-md) var(--border-radius-md);
                box-shadow: var(--shadow-md);
                transform: translateY(-10px);
                opacity: 0;
                visibility: hidden;
                transition: var(--transition);
                z-index: 100;
            }

            .nav.active {
                transform: translateY(0);
                opacity: 1;
                visibility: visible;
            }

            .nav-links {
                flex-direction: column;
                width: 100%;
            }

            .auth-buttons {
                width: 100%;
            }

            .btn {
                width: 100%;
            }

            .mobile-menu-btn {
                display: block;
            }

            .hero-title {
                font-size: 2.5rem;
            }

            .section-title {
                font-size: 2rem;
            }

            .footer-container {
                grid-template-columns: 1fr;
                gap: 2rem;
            }

            .footer-bottom {
                flex-direction: column;
                gap: 1rem;
                text-align: center;
            }

            .footer-bottom-links {
                flex-direction: column;
                gap: 1rem;
            }
        }

        @media (max-width: 576px) {
            .hero-title {
                font-size: 2rem;
            }

            .hero-stats {
                flex-direction: column;
                gap: 1.5rem;
            }

            .hero-buttons {
                flex-direction: column;
                width: 100%;
            }

            .btn {
                width: 100%;
            }

            .cta-title {
                font-size: 2rem;
            }

            .cta-buttons {
                flex-direction: column;
                width: 100%;
            }
        }
    </style>
</head>

<body>
    <!-- Background Elements -->
    <div class="bg-grid"></div>
    <div class="animated-shape shape-1"></div>
    <div class="animated-shape shape-2"></div>
    <div class="animated-shape shape-3"></div>

    <div class="floating-element code-element code-1">&lt;/&gt;</div>
    <div class="floating-element code-element code-2">{...}</div>
    <div class="floating-element code-element code-3">&lt;/&gt;</div>

    <!-- Header -->
    <header class="header" id="header">
        <div class="container header-container">
            <a href="#" class="logo">
                <div class="logo-icon"><img src="logo.jpeg" alt="Logo Hackathon" style="width: 50px; height: 50px;"></div>
               
            </a>
            <nav class="nav" id="nav">
                <ul class="nav-links">
                    <li><a href="#" class="nav-link">Accueil</a></li>
                    <li><a href="#features" class="nav-link">Fonctionnalités</a></li>
                    <li><a href="#how-it-works" class="nav-link">Comment ça marche</a></li>
                    <li><a href="#upcoming" class="nav-link">À venir</a></li>
                    <li><a href="#testimonials" class="nav-link">Témoignages</a></li>
                </ul>
                <div class="auth-buttons">
                    <a href="acces.php" class="btn btn-outline">Se connecter</a>
                    <a href="acces.php" class="btn btn-primary">S'inscrire</a>
                </div>
            </nav>
            <button class="mobile-menu-btn" id="mobile-menu-btn">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="3" y1="12" x2="21" y2="12"></line>
                    <line x1="3" y1="6" x2="21" y2="6"></line>
                    <line x1="3" y1="18" x2="21" y2="18"></line>
                </svg>
            </button>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="hero">
        <div class="container hero-container">
            <div class="hero-content">
                <div class="hero-subtitle">Le défi de codage ultime</div>
                <h1 class="hero-title">Innover, Créer, <span>Collaborer</span></h1>
                <p class="hero-description">Rejoignez notre communauté d'innovateurs, présentez vos projets et connectez-vous avec des développeurs talentueux du monde entier. Transformez vos idées en réalité et participez pour gagner des prix incroyables.</p>
                <div class="hero-buttons">
                    <a href="#" class="btn btn-primary">Commencer</a>
                    <a href="acces.php" class="btn btn-secondary">Explorer les projets</a>
                </div>
                <div class="hero-stats">
                    <div class="stat-item">
                        <div class="stat-value">10K+</div>
                        <div class="stat-label">Participants</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-value">500+</div>
                        <div class="stat-label">Projets</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-value">50K€</div>
                        <div class="stat-label">Prix total</div>
                    </div>
                </div>
            </div>
            <div class="hero-image">
                <img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80" alt="Collaboration d'équipe Hackathon" class="hero-image-main">
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features" id="features">
        <div class="container">
            <div class="section-header">
                <div class="section-subtitle">Fonctionnalités de la plateforme</div>
                <h2 class="section-title">Tout ce dont vous avez besoin pour réussir</h2>
                <p class="section-description">Notre plateforme fournit tous les outils et ressources nécessaires pour participer aux hackathons, présenter vos projets et vous connecter avec d'autres développeurs.</p>
            </div>
            <div class="features-grid">
                <div class="feature-card">
                    <div class="feature-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polygon points="12 2 2 7 12 12 22 7 12 2"></polygon>
                            <polyline points="2 17 12 22 22 17"></polyline>
                            <polyline points="2 12 12 17 22 12"></polyline>
                        </svg>
                    </div>
                    <h3 class="feature-title">Vitrine de projets</h3>
                    <p class="feature-description">Présentez vos projets avec des descriptions détaillées, des images et des démos. Recevez des commentaires de la communauté et des juges pour améliorer votre travail.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                            <circle cx="9" cy="7" r="4"></circle>
                            <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                            <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                        </svg>
                    </div>
                    <h3 class="feature-title">Formation d'équipe</h3>
                    <p class="feature-description">Trouvez des coéquipiers aux compétences complémentaires ou rejoignez des équipes existantes. Collaborez efficacement avec des outils intégrés de gestion d'équipe.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                            <polyline points="22 4 12 14.01 9 11.01"></polyline>
                        </svg>
                    </div>
                    <h3 class="feature-title">Évaluation équitable</h3>
                    <p class="feature-description">Notre système d'évaluation transparent garantit que tous les projets sont évalués équitablement en fonction de l'innovation, de la complexité technique et de la présentation.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="12" r="10"></circle>
                            <path d="M8 14s1.5 2 4 2 4-2 4-2"></path>
                            <line x1="9" y1="9" x2="9.01" y2="9"></line>
                            <line x1="15" y1="9" x2="15.01" y2="9"></line>
                        </svg>
                    </div>
                    <h3 class="feature-title">Soutien communautaire</h3>
                    <p class="feature-description">Connectez-vous avec une communauté dynamique de développeurs, designers et mentors qui peuvent vous aider à surmonter les défis et à améliorer vos compétences.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M12 20h9"></path>
                            <path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path>
                        </svg>
                    </div>
                    <h3 class="feature-title">Retour en temps réel</h3>
                    <p class="feature-description">Recevez des commentaires instantanés sur vos soumissions de la part de pairs et de mentors, vous aidant à itérer et à améliorer votre projet pendant le hackathon.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="2" y="7" width="20" height="14" rx="2" ry="2"></rect>
                            <path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path>
                        </svg>
                    </div>
                    <h3 class="feature-title">Bibliothèque de ressources</h3>
                    <p class="feature-description">Accédez à une bibliothèque complète de tutoriels, de documentation et de modèles de démarrage pour vous aider à construire de meilleurs projets plus rapidement.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- How It Works Section -->
    <section class="how-it-works" id="how-it-works">
        <div class="container">
            <div class="section-header">
                <div class="section-subtitle">Processus simple</div>
                <h2 class="section-title">Comment ça marche</h2>
                <p class="section-description">Participer à nos hackathons est facile. Suivez ces étapes simples pour commencer et mettre en valeur vos compétences.</p>
            </div>
            <div class="steps">
                <div class="step-card">
                    <h3 class="step-title">Créer un compte</h3>
                    <p class="step-description">Inscrivez-vous gratuitement pour accéder à toutes les fonctionnalités de notre plateforme. Complétez votre profil avec vos compétences et votre expérience pour aider les autres à vous trouver.</p>
                </div>
                <div class="step-card">
                    <h3 class="step-title">Former ou rejoindre une équipe</h3>
                    <p class="step-description">Trouvez des coéquipiers aux compétences complémentaires ou rejoignez une équipe existante. Vous pouvez également participer en solo si vous préférez travailler indépendamment.</p>
                </div>
                <div class="step-card">
                    <h3 class="step-title">S'inscrire à un hackathon</h3>
                    <p class="step-description">Parcourez les hackathons à venir et inscrivez-vous à ceux qui vous intéressent. Chaque hackathon a son propre thème, ses règles et ses prix.</p>
                </div>
                <div class="step-card">
                    <h3 class="step-title">Construire votre projet</h3>
                    <p class="step-description">Travaillez avec votre équipe pour créer une solution innovante qui répond au défi du hackathon. Utilisez nos ressources pour surmonter les obstacles.</p>
                </div>
                <div class="step-card">
                    <h3 class="step-title">Soumettre votre travail</h3>
                    <p class="step-description">Soumettez votre projet avant la date limite. Incluez une description détaillée, des captures d'écran, une vidéo de démonstration et l'accès au dépôt de code.</p>
                </div>
                <div class="step-card">
                    <h3 class="step-title">Être évalué & gagner</h3>
                    <p class="step-description">Votre projet sera évalué par notre panel de juges et la communauté. Les gagnants reçoivent des prix, de la reconnaissance et des opportunités de développement ultérieur.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Upcoming Hackathons Section -->
    <section class="upcoming" id="upcoming">
        <div class="container">
            <div class="section-header">
                <div class="section-subtitle">Marquez votre calendrier</div>
                <h2 class="section-title">Hackathons à venir</h2>
                <p class="section-description">Découvrez ces hackathons passionnants qui arrivent bientôt. Inscrivez-vous tôt pour réserver votre place et commencer à préparer votre équipe.</p>
            </div>
            <div class="hackathon-grid">
                <div class="hackathon-card">
                    <div class="hackathon-image">
                        <img src="https://images.unsplash.com/photo-1517245386807-bb43f82c33c4?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80" alt="Défi d'innovation Web3">
                        <div class="hackathon-date">Commence dans 3 jours</div>
                    </div>
                    <div class="hackathon-content">
                        <h3 class="hackathon-title">Défi d'innovation Web3</h3>
                        <p class="hackathon-description">Construisez l'avenir des applications décentralisées dans ce hackathon de 48 heures axé sur les technologies Web3.</p>
                        <div class="hackathon-tags">
                            <span class="tag">Web3</span>
                            <span class="tag green">Blockchain</span>
                            <span class="tag purple">DeFi</span>
                        </div>
                        <div class="hackathon-footer">
                            <div class="hackathon-prize">Prix total: <span class="prize-amount">10 000€</span></div>
                            <a href="acces.php" class="btn btn-primary">S'inscrire</a>
                        </div>
                    </div>
                </div>
                <div class="hackathon-card">
                    <div class="hackathon-image">
                        <img src="https://images.unsplash.com/photo-1531746790731-6c087fecd65a?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1506&q=80" alt="Hackathon IA pour le bien">
                        <div class="hackathon-date">Commence dans 2 semaines</div>
                    </div>
                    <div class="hackathon-content">
                        <h3 class="hackathon-title">IA pour le bien commun</h3>
                        <p class="hackathon-description">Développez des solutions d'IA qui répondent aux défis sociaux et environnementaux réels dans cet événement de 72 heures.</p>
                        <div class="hackathon-tags">
                            <span class="tag">IA</span>
                            <span class="tag green">Machine Learning</span>
                            <span class="tag purple">Impact Social</span>
                        </div>
                        <div class="hackathon-footer">
                            <div class="hackathon-prize">Prix total: <span class="prize-amount">15 000€</span></div>
                            <a href="acces.php" class="btn btn-primary">S'inscrire</a>
                        </div>
                    </div>
                </div>
                <div class="hackathon-card">
                    <div class="hackathon-image">
                        <img src="https://images.unsplash.com/photo-1573164713988-8665fc963095?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1469&q=80" alt="Innovation d'applications mobiles">
                        <div class="hackathon-date">Commence dans 1 mois</div>
                    </div>
                    <div class="hackathon-content">
                        <h3 class="hackathon-title">Innovation d'applications mobiles</h3>
                        <p class="hackathon-description">Créez des applications mobiles innovantes qui résolvent des problèmes quotidiens ou offrent des expériences de divertissement uniques.</p>
                        <div class="hackathon-tags">
                            <span class="tag">Mobile</span>
                            <span class="tag green">UI/UX</span>
                            <span class="tag purple">Multi-plateforme</span>
                        </div>
                        <div class="hackathon-footer">
                            <div class="hackathon-prize">Prix total: <span class="prize-amount">8 000€</span></div>
                            <a href="acces.php" class="btn btn-primary">S'inscrire</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="testimonials" id="testimonials">
        <div class="container">
            <div class="section-header">
                <div class="section-subtitle">Histoires de réussite</div>
                <h2 class="section-title">Ce que disent les participants</h2>
                <p class="section-description">Écoutez les anciens participants parler de leurs expériences et de la façon dont nos hackathons les ont aidés à se développer professionnellement.</p>
            </div>
            <div class="testimonial-grid">
                <div class="testimonial-card">
                    <div class="testimonial-quote">"</div>
                    <p class="testimonial-content">Participer au Défi d'innovation Web3 a changé ma carrière. Notre équipe a construit une marketplace décentralisée qui a attiré l'attention de plusieurs investisseurs. Nous développons maintenant une startup à part entière !</p>
                    <div class="testimonial-author">
                        <div class="author-avatar">
                            <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Ahmed Khalid">
                        </div>
                        <div class="author-info">
                            <div class="author-name">Ahmed Khalid</div>
                            <div class="author-role">Développeur Full Stack</div>
                        </div>
                    </div>
                </div>
                <div class="testimonial-card">
                    <div class="testimonial-quote">"</div>
                    <p class="testimonial-content">La plateforme a rendu la formation d'équipe incroyablement facile. J'ai trouvé des coéquipiers avec des compétences complémentaires, et nous avons fini par remporter la première place ! Le mentorat et les retours que nous avons reçus tout au long du hackathon ont été inestimables.</p>
                    <div class="testimonial-author">
                        <div class="author-avatar">
                            <img src="https://randomuser.me/api/portraits/women/44.jpg" alt="Sara Benali">
                        </div>
                        <div class="author-info">
                            <div class="author-name">Sara Benali</div>
                            <div class="author-role">Designer UI/UX</div>
                        </div>
                    </div>
                </div>
                <div class="testimonial-card">
                    <div class="testimonial-quote">"</div>
                    <p class="testimonial-content">En tant qu'étudiant, j'hésitais à rejoindre au début, mais la communauté était si accueillante et encourageante. J'ai appris plus en 48 heures que pendant un semestre entier de cours. Je recommande vivement à tous ceux qui cherchent à améliorer leurs compétences !</p>
                    <div class="testimonial-author">
                        <div class="author-avatar">
                            <img src="https://randomuser.me/api/portraits/men/67.jpg" alt="Youssef Amrani">
                        </div>
                        <div class="author-info">
                            <div class="author-name">Youssef Amrani</div>
                            <div class="author-role">Étudiant en informatique</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta">
        <div class="container">
            <div class="cta-container">
                <h2 class="cta-title">Prêt à montrer vos compétences ?</h2>
                <p class="cta-description">Rejoignez notre communauté d'innovateurs dès aujourd'hui et participez à des hackathons passionnants. Que vous soyez un développeur expérimenté ou débutant, il y a une place pour vous dans notre communauté.</p>
                <div class="cta-buttons">
                    <a href="acces.php" class="btn btn-primary">S'inscrire maintenant</a>
                    <a href="acces.php" class="btn btn-secondary">Explorer les hackathons</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="footer-container">
                <div class="footer-about">
                    <div class="footer-logo">
                        <div class="logo-icon"><img src="logo.jpeg" alt="Logo Hackathon" style="width: 40px; height: 40px;"></div>
                        <div class="footer-logo-text">Hackathon</div>
                    </div>
                    <p class="footer-description">Notre plateforme connecte des développeurs talentueux, des designers et des innovateurs pour créer des projets incroyables et résoudre des problèmes réels grâce aux hackathons.</p>
                    <div class="social-links">
                        <a href="acces.php" class="social-link">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path>
                            </svg>
                        </a>
                        <a href="acces.php" class="social-link">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path>
                            </svg>
                        </a>
                        <a href="acces.php" class="social-link">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"  width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"></path>
                                <rect x="2" y="9" width="4" height="12"></rect>
                                <circle cx="4" cy="4" r="2"></circle>
                            </svg>
                        </a>
                        <a href="acces.php" class="social-link">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
                                <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                                <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
                            </svg>
                        </a>
                    </div>
                </div>
                <div class="footer-links-column">
                    <h3 class="footer-title">Plateforme</h3>
                    <ul class="footer-links">
                        <li class="footer-link"><a href="#">Comment ça marche</a></li>
                        <li class="footer-link"><a href="#">Fonctionnalités</a></li>
                        <li class="footer-link"><a href="#">Tarifs</a></li>
                        <li class="footer-link"><a href="#">FAQ</a></li>
                    </ul>
                </div>
                <div class="footer-links-column">
                    <h3 class="footer-title">Ressources</h3>
                    <ul class="footer-links">
                        <li class="footer-link"><a href="#">Blog</a></li>
                        <li class="footer-link"><a href="#">Documentation</a></li>
                        <li class="footer-link"><a href="#">Tutoriels</a></li>
                        <li class="footer-link"><a href="#">Support</a></li>
                    </ul>
                </div>
                <div class="footer-links-column">
                    <h3 class="footer-title">Entreprise</h3>
                    <ul class="footer-links">
                        <li class="footer-link"><a href="#">À propos</a></li>
                        <li class="footer-link"><a href="#">Carrières</a></li>
                        <li class="footer-link"><a href="#">Contact</a></li>
                        <li class="footer-link"><a href="#">Partenaires</a></li>
                    </ul>
                </div>
            </div>
            <div class="footer-bottom">
                <div class="footer-copyright">© 2025 Plateforme Hackathon. Tous droits réservés.</div>
                <div class="footer-bottom-links">
                    <a href="#" class="footer-bottom-link">Politique de confidentialité</a>
                    <a href="#" class="footer-bottom-link">Conditions d'utilisation</a>
                    <a href="#" class="footer-bottom-link">Politique des cookies</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- JavaScript -->
    <script>
        // Header scroll effect
        window.addEventListener('scroll', function() {
            const header = document.getElementById('header');
            if (window.scrollY > 50) {
                header.classList.add('scrolled');
            } else {
                header.classList.remove('scrolled');
            }
        });

        // Mobile menu toggle
        const mobileMenuBtn = document.getElementById('mobile-menu-btn');
        const nav = document.getElementById('nav');
        
        mobileMenuBtn.addEventListener('click', function() {
            nav.classList.toggle('active');
        });

        // Close mobile menu when clicking outside
        document.addEventListener('click', function(event) {
            if (!nav.contains(event.target) && !mobileMenuBtn.contains(event.target)) {
                nav.classList.remove('active');
            }
        });

        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                
                const targetId = this.getAttribute('href');
                if (targetId === '#') return;
                
                const targetElement = document.querySelector(targetId);
                if (targetElement) {
                    window.scrollTo({
                        top: targetElement.offsetTop - 100,
                        behavior: 'smooth'
                    });
                    
                    // Close mobile menu after clicking
                    nav.classList.remove('active');
                }
            });
        });
    </script>
</body>

</html>