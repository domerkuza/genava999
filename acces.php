<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hackathon Platform</title>
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

        /* Container */
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem 1rem;
        }

        /* Header */
        header {
            text-align: center;
            margin-bottom: 3rem;
            padding-top: 2rem;
        }

        .logo {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
            background: linear-gradient(90deg, #3b82f6, #10b981, #3b82f6);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            display: inline-block;
        }

        .tagline {
            font-size: 1.2rem;
            color: #94a3b8;
            max-width: 600px;
            margin: 0 auto;
        }

        /* Main Content */
        .main-content {
            display: flex;
            flex-direction: column;
            gap: 2rem;
        }

        @media (min-width: 768px) {
            .main-content {
                flex-direction: row;
            }
        }

        /* Info Section */
        .info-section {
            flex: 1;
        }

        .info-card {
            background: rgba(15, 23, 42, 0.7);
            border-radius: 12px;
            padding: 2rem;
            margin-bottom: 2rem;
            border: 1px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
        }

        .info-card h2 {
            font-size: 1.5rem;
            margin-bottom: 1rem;
            color: #f8fafc;
            position: relative;
            padding-left: 1rem;
        }

        .info-card h2::before {
            content: '';
            position: absolute;
            left: 0;
            top: 50%;
            transform: translateY(-50%);
            width: 4px;
            height: 24px;
            background: #10b981;
            border-radius: 2px;
        }

        .info-card p {
            color: #cbd5e1;
            margin-bottom: 1rem;
        }

        .info-card ul {
            list-style-type: none;
            margin: 1.5rem 0;
        }

        .info-card li {
            margin-bottom: 1rem;
            padding-left: 1.5rem;
            position: relative;
            color: #cbd5e1;
        }

        .info-card li::before {
            content: '•';
            position: absolute;
            left: 0;
            color: #3b82f6;
            font-weight: bold;
        }

        .event-card {
            background: linear-gradient(135deg, rgba(59, 130, 246, 0.1), rgba(16, 185, 129, 0.1));
            border-radius: 12px;
            padding: 1.5rem;
            margin-top: 2rem;
            border: 1px solid rgba(59, 130, 246, 0.2);
        }

        .event-card h3 {
            font-size: 1.25rem;
            margin-bottom: 0.5rem;
            color: #f8fafc;
        }

        .event-date {
            font-size: 0.875rem;
            color: #94a3b8;
            margin-bottom: 1rem;
        }

        .tag {
            display: inline-block;
            padding: 0.25rem 0.75rem;
            border-radius: 9999px;
            font-size: 0.75rem;
            font-weight: 600;
            margin-right: 0.5rem;
            margin-bottom: 0.5rem;
        }

        .tag-blue {
            background-color: rgba(59, 130, 246, 0.2);
            color: #60a5fa;
        }

        .tag-green {
            background-color: rgba(16, 185, 129, 0.2);
            color: #34d399;
        }

        .tag-purple {
            background-color: rgba(139, 92, 246, 0.2);
            color: #a78bfa;
        }

        /* Auth Section */
        .auth-section {
            flex: 1;
            min-width: 0;
        }

        /* CSS-only tabs using radio buttons */
        .tabs {
            position: relative;
        }

        .tab-input {
            display: none;
        }

        .tab-labels {
            display: flex;
            margin-bottom: 1.5rem;
            background-color: rgba(15, 23, 42, 0.7);
            border-radius: 8px;
            overflow: hidden;
        }

        .tab-label {
            flex: 1;
            padding: 1rem;
            text-align: center;
            cursor: pointer;
            color: #94a3b8;
            font-weight: 600;
            transition: all 0.3s ease;
            border-bottom: 2px solid transparent;
        }

        #tab1:checked~.tab-labels .tab-label[for="tab1"],
        #tab2:checked~.tab-labels .tab-label[for="tab2"],
        #tab3:checked~.tab-labels .tab-label[for="tab3"] {
            color: #f8fafc;
            border-bottom-color: #3b82f6;
            background-color: rgba(59, 130, 246, 0.1);
        }

        #tab2:checked~.tab-labels .tab-label[for="tab2"] {
            border-bottom-color: #10b981;
            background-color: rgba(16, 185, 129, 0.1);
        }

        #tab3:checked~.tab-labels .tab-label[for="tab3"] {
            border-bottom-color: #8b5cf6;
            background-color: rgba(139, 92, 246, 0.1);
        }

        .tab-content {
            background: rgba(15, 23, 42, 0.7);
            border-radius: 12px;
            padding: 2rem;
            border: 1px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
        }

        .tab-pane {
            display: none;
        }

        #tab1:checked~.tab-content #pane1,
        #tab2:checked~.tab-content #pane2,
        #tab3:checked~.tab-content #pane3 {
            display: block;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-label {
            display: block;
            margin-bottom: 0.5rem;
            color: #e2e8f0;
            font-weight: 500;
        }

        .form-input {
            width: 100%;
            padding: 0.75rem 1rem;
            border-radius: 8px;
            border: 1px solid #334155;
            background-color: #1e293b;
            color: #f8fafc;
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        .form-input:focus {
            outline: none;
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.3);
        }

        /* Custom file input styling */
        .file-input-container {
            position: relative;
            width: 100%;
        }

        .file-input {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            opacity: 0;
            cursor: pointer;
            z-index: 2;
        }

        .file-input-label {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            padding: 0.75rem 1rem;
            border-radius: 8px;
            border: 1px solid #334155;
            background-color: #1e293b;
            color: #94a3b8;
            font-size: 1rem;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .file-input-label:hover {
            border-color: #3b82f6;
            background-color: rgba(59, 130, 246, 0.1);
        }

        .file-input-icon {
            margin-right: 0.5rem;
            font-size: 1.25rem;
        }

        .file-input-text {
            flex: 1;
        }

        .form-row {
            display: flex;
            gap: 1rem;
        }

        .form-row .form-group {
            flex: 1;
        }

        .form-check {
            display: flex;
            align-items: center;
            margin-bottom: 1.5rem;
        }

        .form-check-input {
            margin-right: 0.5rem;
            width: 1rem;
            height: 1rem;
        }

        .form-check-label {
            color: #cbd5e1;
            font-size: 0.875rem;
        }

        .form-link {
            color: #3b82f6;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .form-link:hover {
            color: #60a5fa;
            text-decoration: underline;
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
            font-size: 1rem;
            width: 100%;
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

        .btn-purple {
            background: linear-gradient(90deg, #8b5cf6, #7c3aed);
            color: white;
        }

        .btn-purple:hover {
            background: linear-gradient(90deg, #7c3aed, #6d28d9);
            transform: translateY(-2px);
            box-shadow: 0 4px 6px -1px rgba(139, 92, 246, 0.4);
        }

        .divider {
            display: flex;
            align-items: center;
            margin: 1.5rem 0;
            color: #64748b;
            font-size: 0.875rem;
        }

        .divider::before,
        .divider::after {
            content: '';
            flex: 1;
            height: 1px;
            background-color: #334155;
        }

        .divider::before {
            margin-right: 1rem;
        }

        .divider::after {
            margin-left: 1rem;
        }

        .social-buttons {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
        }

        .btn-social {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 0.75rem;
            border-radius: 8px;
            font-weight: 600;
            background-color: #1e293b;
            border: 1px solid #334155;
            color: #e2e8f0;
            transition: all 0.3s ease;
        }

        .btn-social:hover {
            background-color: #334155;
            transform: translateY(-2px);
        }

        .btn-social img {
            width: 20px;
            height: 20px;
            margin-right: 0.5rem;
        }

        /* Team Member Section */
        .team-section {
            margin-top: 2rem;
            padding-top: 1rem;
            border-top: 1px solid #334155;
        }

        .team-section h3 {
            font-size: 1.25rem;
            margin-bottom: 1rem;
            color: #f8fafc;
        }

        .team-member {
            background: rgba(15, 23, 42, 0.5);
            border-radius: 8px;
            padding: 1.5rem;
            margin-bottom: 1.5rem;
            border: 1px solid rgba(255, 255, 255, 0.05);
        }

        .team-member-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1rem;
        }

        .team-member-number {
            font-weight: 600;
            color: #10b981;
        }

        /* Education Section */
        .education-section {
            background: rgba(15, 23, 42, 0.5);
            border-radius: 8px;
            padding: 1.5rem;
            margin-bottom: 1.5rem;
            border: 1px solid rgba(255, 255, 255, 0.05);
        }

        .education-section h3 {
            font-size: 1.25rem;
            margin-bottom: 1rem;
            color: #10b981;
        }

        /* Footer */
        footer {
            text-align: center;
            margin-top: 4rem;
            padding: 2rem 0;
            color: #64748b;
            font-size: 0.875rem;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .form-row {
                flex-direction: column;
                gap: 0;
            }
        }
    </style>
</head>

<body>
    <div class="bg-grid"></div>

    <div class="container">
        <header>
            <h1 class="logo">Hackathon Platform</h1>
            <p class="tagline">Join our community of innovators, showcase your projects, and connect with talented
                developers around the world.</p>
        </header>

        <div class="main-content">
            <div class="info-section">
                <div class="info-card">
                    <h2>What is a Hackathon?</h2>
                    <p>A hackathon is an event where programmers, designers, and other tech enthusiasts collaborate
                        intensively on software projects. The word "hackathon" combines "hack" (exploratory programming)
                        and "marathon" (an endurance event).</p>

                    <p>Hackathons typically last between 24-48 hours and challenge participants to create innovative
                        solutions to real-world problems. These events foster creativity, collaboration, and rapid
                        development.</p>

                    <h3 style="margin-top: 1.5rem; color: #f8fafc;">Why Participate in Hackathons?</h3>
                    <ul>
                        <li>Develop new skills and learn from peers in a collaborative environment</li>
                        <li>Network with industry professionals and potential employers</li>
                        <li>Build impressive portfolio projects to showcase your abilities</li>
                        <li>Win prizes and recognition for your innovative solutions</li>
                        <li>Experience the thrill of creating something meaningful in a short timeframe</li>
                    </ul>

                    <p>Whether you're a seasoned developer or just starting your coding journey, hackathons provide an
                        excellent opportunity to challenge yourself, learn new technologies, and make connections in the
                        tech community.</p>
                </div>

                <div class="event-card">
                    <h3>Upcoming Hackathon</h3>
                    <div class="event-date">Starting in 3 days, 14 hours</div>
                    <div>
                        <span class="tag tag-blue">Web3</span>
                        <span class="tag tag-green">AI</span>
                        <span class="tag tag-purple">Blockchain</span>
                    </div>
                    <h4 style="margin-top: 1rem; color: #f8fafc;">Web3 Innovation Challenge</h4>
                    <p style="color: #cbd5e1; font-size: 0.9rem; margin-top: 0.5rem;">
                        Join us for an exciting 48-hour hackathon focused on building the future of decentralized
                        applications.
                        Work with cutting-edge technologies and compete for prizes worth $10,000!
                    </p>
                </div>
            </div>

            <div class="auth-section">
                <div class="tabs">
                    <!-- CSS-only tabs using radio buttons -->
                    <input type="radio" name="tabs" id="tab1" class="tab-input" checked>
                    <input type="radio" name="tabs" id="tab2" class="tab-input">
                    <input type="radio" name="tabs" id="tab3" class="tab-input">

                    <div class="tab-labels">
                        <label for="tab1" class="tab-label">Sign In</label>
                        <label for="tab2" class="tab-label">Sign Up</label>
                        <label for="tab3" class="tab-label">Post Project</label>
                    </div>

                    <div class="tab-content">
                        <div class="tab-pane" id="pane1">
                            <form method="post">
                                <div class="form-group">
                                    <label class="form-label" for="signin-email">Email</label>
                                    <input type="text" name="email" class="form-input" id="signin-email"
                                        placeholder="name@example.com" required>
                                </div>

                                <div class="form-group">
                                    <div style="display: flex; justify-content: space-between; margin-bottom: 0.5rem;">
                                        <label class="form-label" for="signin-password">Password</label>
                                        <a href="#" class="form-link">Forgot password?</a>
                                    </div>
                                    <input type="password" name="mot_de_passe" class="form-input" id="signin-password"
                                        placeholder="••••••••" required>
                                </div>

                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="remember">
                                    <label class="form-check-label" for="remember">Remember me for 30 days</label>
                                </div>

                                <button type="submit" name="sign_in" class="btn btn-primary">Sign In</button>

                                <div class="divider">Or continue with</div>

                                <div class="social-buttons">
                                    <button type="button" class="btn-social">
                                        <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                                            <path
                                                d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z" />
                                        </svg>
                                        GitHub
                                    </button>
                                    <button type="button" class="btn-social">
                                        <svg width="20" height="20" viewBox="0 0 24 24">
                                            <path
                                                d="M12.545,10.239v3.821h5.445c-0.712,2.315-2.647,3.972-5.445,3.972c-3.332,0-6.033-2.701-6.033-6.032s2.701-6.032,6.033-6.032c1.498,0,2.866,0.549,3.921,1.453l2.814-2.814C17.503,2.988,15.139,2,12.545,2C7.021,2,2.543,6.477,2.543,12s4.478,10,10.002,10c8.396,0,10.249-7.85,9.426-11.748L12.545,10.239z"
                                                fill="#EA4335" />
                                            <path
                                                d="M12.545,10.239v3.821h5.445c-0.712,2.315-2.647,3.972-5.445,3.972c-3.332,0-6.033-2.701-6.033-6.032s2.701-6.032,6.033-6.032c1.498,0,2.866,0.549,3.921,1.453l2.814-2.814C17.503,2.988,15.139,2,12.545,2C7.021,2,2.543,6.477,2.543,12s4.478,10,10.002,10c8.396,0,10.249-7.85,9.426-11.748L12.545,10.239z"
                                                fill="#FBBC05" />
                                            <path
                                                d="M12.545,10.239v3.821h5.445c-0.712,2.315-2.647,3.972-5.445,3.972c-3.332,0-6.033-2.701-6.033-6.032s2.701-6.032,6.033-6.032c1.498,0,2.866,0.549,3.921,1.453l2.814-2.814C17.503,2.988,15.139,2,12.545,2C7.021,2,2.543,6.477,2.543,12s4.478,10,10.002,10c8.396,0,10.249-7.85,9.426-11.748L12.545,10.239z"
                                                fill="#4285F4" />
                                            <path
                                                d="M12.545,10.239v3.821h5.445c-0.712,2.315-2.647,3.972-5.445,3.972c-3.332,0-6.033-2.701-6.033-6.032s2.701-6.032,6.033-6.032c1.498,0,2.866,0.549,3.921,1.453l2.814-2.814C17.503,2.988,15.139,2,12.545,2C7.021,2,2.543,6.477,2.543,12s4.478,10,10.002,10c8.396,0,10.249-7.85,9.426-11.748L12.545,10.239z"
                                                fill="#34A853" />
                                        </svg>
                                        Google
                                    </button>
                                </div>
                            </form>
                        </div>
                        <form method="post">
                            <div class="tab-pane" id="pane2">
                               
                                    <div class="form-row">
                                        <div class="form-group">
                                            <label class="form-label" for="first-name">First name</label>
                                            <input type="text" class="form-input" name="prenom" id="first-name"
                                                placeholder="John" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="last-name">Last name</label>
                                            <input type="text" name="nom" class="form-input" id="last-name"
                                                placeholder="Doe" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label" for="signup-email">telephone</label>
                                        <input type="text" name="tele" class="form-input" id="signup-email"
                                            placeholder="0748367937" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="signup-email">Email</label>
                                        <input type="email" name="email" class="form-input" id="signup-email"
                                            placeholder="name@example.com" required>
                                    </div>

                                    <!-- Education Information Section -->
                                    <div class="education-section">
                                        <h3>Education Information</h3>

                                        <div class="form-group">
                                            <label class="form-label" for="institution">Institution</label>
                                            <select class="form-input" id="institution" name="institut" required>
                                                <option value="" disabled selected>Select your institution</option>
                                                <option value="ofppt-casa">OFPPT Casablanca</option>
                                                <option value="ofppt-rabat">OFPPT Rabat</option>
                                                <option value="ofppt-marrakech">OFPPT Marrakech</option>
                                                <option value="ofppt-tanger">OFPPT Tanger</option>
                                                <option value="ofppt-agadir">OFPPT Agadir</option>
                                                <option value="other">Other</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label" for="filiere">Filière</label>
                                            <select class="form-input" id="filiere" name="filiere" required>
                                                <option value="" disabled selected>Select your field of study</option>
                                                <option value="dev-digital">Développement Digital</option>
                                                <option value="infra-systemes">Infrastructure des Systèmes et Réseaux
                                                </option>
                                                <option value="dev-mobile">Développement Mobile</option>
                                                <option value="full-stack">Développeur Full Stack</option>
                                                <option value="data-ia">Data & Intelligence Artificielle</option>
                                                <option value="cyber-security">Cybersécurité</option>
                                                <option value="design-ui">Design UI/UX</option>
                                                <option value="gestion-projet">Gestion de Projets Informatiques</option>
                                                <option value="other">Other</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label" for="study-year">Year of Study</label>
                                            <select name="year" class="form-input" id="study-year" required>
                                                <option value="" disabled selected>Select your year</option>
                                                <option value="1">1st Year</option>
                                                <option value="2">2nd Year</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label" for="signup-password">Password</label>
                                        <input type="password" name="mot_de_passe" class="form-input"
                                            id="signup-password" placeholder="••••••••">
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label" for="confirm-password">Confirm Password</label>
                                        <input type="password" class="form-input" id="confirm-password"
                                            placeholder="••••••••">
                                    </div>

                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="terms" required>
                                        <label class="form-check-label" for="terms">
                                            I agree to the <a href="#" class="form-link">Terms of Service</a> and <a
                                                href="#" class="form-link">Privacy Policy</a>
                                        </label>
                                    </div>

                                    <button type="submit" name="createaccount" class="btn btn-success">Create
                                        Account</button>

                                    <div class="divider">Or continue with</div>

                                    <div class="social-buttons">
                                        <button type="button" class="btn-social">
                                            <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                                                <path
                                                    d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z" />
                                            </svg>
                                            GitHub
                                        </button>
                                        <button type="button" class="btn-social">
                                            <svg width="20" height="20" viewBox="0 0 24 24">
                                                <path
                                                    d="M12.545,10.239v3.821h5.445c-0.712,2.315-2.647,3.972-5.445,3.972c-3.332,0-6.033-2.701-6.033-6.032s2.701-6.032,6.033-6.032c1.498,0,2.866,0.549,3.921,1.453l2.814-2.814C17.503,2.988,15.139,2,12.545,2C7.021,2,2.543,6.477,2.543,12s4.478,10,10.002,10c8.396,0,10.249-7.85,9.426-11.748L12.545,10.239z"
                                                    fill="#EA4335" />
                                                <path
                                                    d="M12.545,10.239v3.821h5.445c-0.712,2.315-2.647,3.972-5.445,3.972c-3.332,0-6.033-2.701-6.033-6.032s2.701-6.032,6.033-6.032c1.498,0,2.866,0.549,3.921,1.453l2.814-2.814C17.503,2.988,15.139,2,12.545,2C7.021,2,2.543,6.477,2.543,12s4.478,10,10.002,10c8.396,0,10.249-7.85,9.426-11.748L12.545,10.239z"
                                                    fill="#FBBC05" />
                                                <path
                                                    d="M12.545,10.239v3.821h5.445c-0.712,2.315-2.647,3.972-5.445,3.972c-3.332,0-6.033-2.701-6.033-6.032s2.701-6.032,6.033-6.032c1.498,0,2.866,0.549,3.921,1.453l2.814-2.814C17.503,2.988,15.139,2,12.545,2C7.021,2,2.543,6.477,2.543,12s4.478,10,10.002,10c8.396,0,10.249-7.85,9.426-11.748L12.545,10.239z"
                                                    fill="#4285F4" />
                                                <path
                                                    d="M12.545,10.239v3.821h5.445c-0.712,2.315-2.647,3.972-5.445,3.972c-3.332,0-6.033-2.701-6.033-6.032s2.701-6.032,6.033-6.032c1.498,0,2.866,0.549,3.921,1.453l2.814-2.814C17.503,2.988,15.139,2,12.545,2C7.021,2,2.543,6.477,2.543,12s4.478,10,10.002,10c8.396,0,10.249-7.85,9.426-11.748L12.545,10.239z"
                                                    fill="#34A853" />
                                            </svg>
                                            Google
                                        </button>
                                    </div>
                                
                            </div>
                        </form>
                        <?php
                        include_once("connexion.php");

                        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                            if (isset($_POST['createaccount'])) {
                                $nom = $_POST['nom'];
                                $prenom = $_POST['prenom'];
                                $email = $_POST['email'];
                                $institut = $_POST['institut'];
                                $filier = $_POST['filiere'];
                                $year = $_POST['year'];
                                $mot_de_passe = $_POST['mot_de_passe'];
                                $tele = $_POST['tele'];
                                //check if the email already exists
                                $query = "SELECT * FROM stagiaire WHERE email = :email";
                                $stmt = $connexion->prepare($query);
                                $stmt->execute(['email' => $email]);
                                $existingUser = $stmt->fetch(PDO::FETCH_ASSOC);
                                if ($existingUser) {
                                    echo "<script>alert('you have already account exists');</script>";
                                } else {
                                    $query = "INSERT INTO stagiaire (nom,prenom,institut,filier,anner,tele,email,mdp) 
                                    VALUES (:nom,:prenom,:institut,:filier,:anner,:tele,:email,:mdp)";
                                    $stmt = $connexion->prepare($query);
                                    $result = $stmt->execute([
                                        'nom' => $nom,
                                        'prenom' => $prenom,
                                        'institut' => $institut,
                                        'filier' => $filier,
                                        'anner' => $year,
                                        'email' => $email,
                                        'mdp' => $mot_de_passe,
                                        'tele' => $tele
                                    ]);
                                    if ($result) {
                                        echo "<script>alert('Account created successfully!');</script>";
                                    } else {
                                        echo "<script>alert('Error creating account. Please try again.');</script>";
                                    }

                                }
                            } elseif(isset($_POST['post_project'])) {
                                // تهيئة $result لتجنب الخطأ
                                    $result = false;
                                    $ppt_path = '';
                                    if (isset($_FILES['Documents'])) {
                                        $allowed = array('pdf', 'doc', 'docx');
                                        $filename = $_FILES['Documents']['name'];
                                        $ext = pathinfo($filename, PATHINFO_EXTENSION);
                            
                                        if (in_array($ext, $allowed) ) { // 1MB max
                                            $new_filename = $_POST['project-title'] . '.' . $ext; // Add a dot before the extension
                                            $upload_path = 'doc/' . $new_filename;
                            
                                            if (move_uploaded_file($_FILES['Documents']['tmp_name'], $upload_path)) {
                                                $ppt_path = $upload_path;
                                            }
                                        }
                                    }

                                    // التحقق من الحقول المطلوبة
                                    $project_title = isset($_POST['project-title']) ? $_POST['project-title'] : null;
                                    $project_category = isset($_POST['project-category']) ? $_POST['project-category'] : null;
                                    $project_description = isset($_POST['project-description']) ? $_POST['project-description'] : null;
                                    $member1_name = isset($_POST['member1-name']) ? $_POST['member1-name'] : null;
                                    $member1_email = isset($_POST['member1-email']) ? $_POST['member1-email'] : null;
                                    $member1_role = isset($_POST['member1-role']) ? $_POST['member1-role'] : null;
                                    $member2_name = isset($_POST['member2-name']) ? $_POST['member2-name'] : null;
                                    $member2_email = isset($_POST['member2-email']) ? $_POST['member2-email'] : null;
                                    $member2_role = isset($_POST['member2-role']) ? $_POST['member2-role'] : null;
                                    $member3_name = isset($_POST['member3-name']) ? $_POST['member3-name'] : null;
                                    $member3_email = isset($_POST['member3-email']) ? $_POST['member3-email'] : null;
                                    $member3_role = isset($_POST['member3-role']) ? $_POST['member3-role'] : null;
                                    $video_path = isset($_POST['projectVideo']) ? $_POST['projectVideo'] : null;
                                
                                    // التحقق من الحقول المطلوبة
                                    if (!$project_title || !$project_category || !$project_description || !$member1_name || !$member1_email) {
                                        echo "<script>alert('يرجى ملء جميع الحقول المطلوبة.');</script>";
                                    } else {
                                        // إدخال البيانات في قاعدة البيانات
                                        $query = "INSERT INTO project (title, category, description_pr, membre1, email_membre1, role_membre1, membre2, email_membre2, role_membre2, membre3, email_membre3, role_membre3,doc_url,video_url) 
                                                  VALUES (:title, :category, :description_pr, :membre1, :email_membre1, :role_membre1, :membre2, :email_membre2, :role_membre2, :membre3, :email_membre3, :role_membre3,:doc_url,:video_url)";
                                        $stmt = $connexion->prepare($query);
                                        $result = $stmt->execute([
                                            'title' => $project_title,
                                            'category' => $project_category,
                                            'description_pr' => $project_description,
                                            'membre1' => $member1_name,
                                            'email_membre1' => $member1_email,
                                            'role_membre1' => $member1_role,
                                            'membre2' => $member2_name,
                                            'email_membre2' => $member2_email,
                                            'role_membre2' => $member2_role,
                                            'membre3' => $member3_name,
                                            'email_membre3' => $member3_email,
                                            'role_membre3' => $member3_role,
                                            'doc_url' => $ppt_path,
                                            'video_url' => $video_path
                                           
                                        ]);
                                        if ($result) {
                                            // نقل الملف المرفوع إلى المجلد المستهدف
                                            
                                            echo "<script>alert('تم نشر المشروع بنجاح!');</script>";
                                        } else {
                                            echo "<script>alert('حدث خطأ أثناء نشر المشروع. يرجى المحاولة مرة أخرى.');</script>";
                                        }
                                    }
                                }elseif (isset($_POST['sign_in'])) {
                                    $mot_de_passe = $_POST['mot_de_passe'];
                                    $email = $_POST['email'];
                                    $query = "SELECT *FROM stagiaire WHERE email = :email";
                                    
                                    $stmt = $connexion->prepare($query);
                                    $stmt->execute(['email' => $email]);
                                    $user = $stmt->fetch(PDO::FETCH_ASSOC);
                                    
                                    if ($user) {
                                        // Vérifier le mot de passe
                                        if ($mot_de_passe= $user['mdp']) {
                                            if ($user['valiadtion'] === 'valide') {
                                                // Démarrer une session et rediriger l'utilisateur
                                                session_start();
                                                $_SESSION['IdStagiaire'] = $user['IdStagiaire'];
                                                $_SESSION['prenom'] = $user['prenom'];
                                                $_SESSION['nom'] = $user['nom'];
                                                header('Location: home_sta.php');
                                            } else {
                                                echo "<script>alert('Votre compte n\'est pas encore validé.');</script>";
                                            }
                                        } else {
                                            echo "<script>alert('Mot de passe incorrect.');</script>";
                                        }
                                    } else {
                                        $query = "SELECT *FROM jury WHERE email = :email";
                                        $stmt = $connexion->prepare($query);
                                        $stmt->execute(['email' => $email]);
                                        $user = $stmt->fetch(PDO::FETCH_ASSOC);
                                        if($user){
                                            // Vérifier le mot de passe
                                            if ($mot_de_passe= $user['mdp'] ) {
                                                // Démarrer une session et rediriger l'utilisateur
                                                session_start();
                                                $_SESSION['Idjury'] = $user['Idjury'];
                                                $_SESSION['prenom'] = $user['prenom'];
                                                $_SESSION['nom'] = $user['nom'];
                                                if($user['fonction'] === 'admin'){
                                                    header('Location: projects.php');
                                                }else{
                                                    
                                                    header('Location: jurydashboard.php');
                                                }
                                            } else {
                                                echo "<script>alert('Mot de passe incorrect.');</script>";
                                            }
                                        }else{
                                            echo "<script>alert('Aucun compte trouvé avec cet email.');</script>";
                                        }
                                    }
                                }
                                
                              
        
                              

                            }
                        
                        ?>
                        <div class="tab-pane" id="pane3">
                            <form method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label class="form-label" for="project-title">Project Title</label>
                                    <input type="text" class="form-input" name="project-title" id="project-title"
                                        placeholder="My Amazing Project">
                                </div>

                                <div class="form-group">
                                    <label class="form-label" for="project-category">Category</label>
                                    <select class="form-input" name="project-category" id="project-category">
                                        <option value="" disabled selected>Select a category</option>
                                        <option value="web">Web Development</option>
                                        <option value="mobile">Mobile App</option>
                                        <option value="ai">AI/Machine Learning</option>
                                        <option value="blockchain">Blockchain</option>
                                        <option value="iot">IoT</option>
                                        <option value="game">Game Development</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label class="form-label" for="project-description">Description</label>
                                    <textarea class="form-input" name="project-description" id="project-description"
                                        rows="4" placeholder="Describe your project in detail..."></textarea>
                                </div>

                                <!-- Team Members Section (replacing Technologies Used) -->
                                <div class="team-section">
                                    <h3>Team Members (Max 3)</h3>

                                    <!-- Team Member 1 -->
                                    <div class="team-member">
                                        <div class="team-member-header">
                                            <span class="team-member-number">Team Member 1</span>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group">
                                                <label class="form-label" for="member1-name">Full Name</label>
                                                <input type="text" name="member1-name" class="form-input"
                                                    id="member1-name" placeholder="John Doe">
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label" for="member1-email">Email</label>
                                                <input type="email" name="member1-email" class="form-input"
                                                    id="member1-email" placeholder="john@example.com">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="member1-role">Role</label>
                                            <input type="text" name="member1-role" class="form-input" id="member1-role"
                                                placeholder="Frontend Developer, Designer, etc.">
                                        </div>
                                    </div>

                                    <!-- Team Member 2 -->
                                    <div class="team-member">
                                        <div class="team-member-header">
                                            <span class="team-member-number">Team Member 2</span>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group">
                                                <label class="form-label" for="member2-name">Full Name</label>
                                                <input type="text" name="member2-name" class="form-input"
                                                    id="member2-name" placeholder="Jane Smith">
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label" for="member2-email">Email</label>
                                                <input type="email" name="member2-email" class="form-input"
                                                    id="member2-email" placeholder="jane@example.com">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="member2-role">Role</label>
                                            <input type="text" name="member2-role" class="form-input" id="member2-role"
                                                placeholder="Backend Developer, Data Scientist, etc.">
                                        </div>
                                    </div>

                                    <!-- Team Member 3 -->
                                    <div class="team-member">
                                        <div class="team-member-header">
                                            <span class="team-member-number">Team Member 3</span>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group">
                                                <label class="form-label" for="member3-name">Full Name</label>
                                                <input type="text" name="member3-name" class="form-input"
                                                    id="member3-name" placeholder="Alex Johnson">
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label" for="member3-email">Email</label>
                                                <input type="email" name="member3-email" class="form-input"
                                                    id="member3-email" placeholder="alex@example.com">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="member3-role">Role</label>
                                            <input type="text" name="member3-role" class="form-input" id="member3-role"
                                                placeholder="UI/UX Designer, Project Manager, etc.">
                                        </div>
                                    </div>
                                </div>

                                <!-- File Upload (replacing Repository URL) -->
                                <div class="form-group">
                                    <label class="form-label" for="project-file">Project Files</label>
                                    <div class="file-input-container">
                                        <input type="file" name="Documents" id="project-file" class="file-input"
                                            accept=".zip,.rar,.pdf,.doc,.docx">
                                        <div class="file-input-label">
                                            <span class="file-input-icon">📄</span>
                                            <span class="file-input-text">Choose project files (.zip, .pdf, .doc)</span>
                                        </div>
                                    </div>
                                    <p style="color: #94a3b8; font-size: 0.75rem; margin-top: 0.5rem;">Max file size:
                                        10MB</p>
                                </div>
                                <!-- Video Upload (replacing Demo URL) -->
                                <div class="form-group">
                                    <label class="form-label" for="project-video">Project Demo Video</label>
                                    <div class="file-input-container">
                                        <input type="text" name="projectVideo" id="project-video" class="form-input"
                                            accept="video/*">

                                    </div>

                                </div>


                                <button type="submit" value="submit" name="post_project" class="btn btn-purple">Submit Project</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <footer>
            <p>© 2025 Hackathon Platform. All rights reserved.</p>
        </footer>
    </div>
</body>

</html>