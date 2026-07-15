<footer class="lumora-footer mt-10">
    <style>
        .lumora-footer {
            --bg-color: #0B0F19;
            --surface-color: rgba(19, 26, 38, 0.75);
            --primary-color: #6D5EF5;
            --primary-hover: #7C6EFF;
            --text-primary: #F5F7FA;
            --text-secondary: #97A1B5;
            --border-color: rgba(255, 255, 255, 0.08);
            --transition: 250ms cubic-bezier(0.4, 0, 0.2, 1);
            
            background: var(--surface-color);
            backdrop-filter: blur(24px);
            -webkit-backdrop-filter: blur(24px);
            border-top: 1px solid var(--border-color);
            border-radius: 40px 40px 0 0;
            color: var(--text-primary);
            padding: 80px 24px 40px;
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
            position: relative;
            overflow: hidden;
        }

        .footer-container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .footer-top {
            display: grid;
            grid-template-columns: 2fr 1fr 1fr;
            gap: 64px;
            margin-bottom: 64px;
        }

        /* Brand Section */
        .brand-section {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .footer-logo {
            display: flex;
            align-items: center;
            gap: 12px;
            text-decoration: none;
            color: var(--text-primary);
        }

        .logo-icon {
            width: 36px;
            height: 36px;
            background: var(--primary-color);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 12px rgba(109, 94, 245, 0.3);
        }

        .logo-text {
            font-size: 22px;
            font-weight: 700;
            letter-spacing: -0.02em;
        }

        .footer-tagline {
            color: var(--text-secondary);
            font-size: 15px;
            line-height: 1.6;
            max-width: 300px;
        }

        .social-links {
            display: flex;
            gap: 16px;
            margin-top: 8px;
        }

        .social-link {
            color: var(--text-secondary);
            transition: var(--transition);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .social-link:hover {
            color: var(--text-primary);
            transform: translateY(-2px);
        }

        /* Nav Columns */
        .footer-column h4 {
            font-size: 14px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            margin-bottom: 24px;
            color: var(--text-primary);
        }

        .footer-nav {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            flex-direction: column;
            gap: 14px;
        }

        .footer-nav a {
            color: var(--text-secondary);
            text-decoration: none;
            font-size: 14px;
            transition: var(--transition);
            display: inline-block;
            position: relative;
        }

        .footer-nav a:after {
            content: '';
            position: absolute;
            width: 0;
            height: 1px;
            bottom: -2px;
            left: 0;
            background-color: var(--primary-color);
            transition: var(--transition);
        }

        .footer-nav a:hover {
            color: var(--text-primary);
        }

        .footer-nav a:hover:after {
            width: 100%;
        }

        /* Bottom Section */
        .footer-bottom {
            border-top: 1px solid var(--border-color);
            padding-top: 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 13px;
            color: var(--text-secondary);
        }

        .footer-copyright strong {
            color: var(--text-primary);
            font-weight: 600;
        }

        .footer-center-note {
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .version-badge {
            background: rgba(109, 94, 245, 0.1);
            color: var(--primary-color);
            padding: 4px 10px;
            border-radius: 6px;
            font-weight: 600;
            font-size: 11px;
            border: 1px solid rgba(109, 94, 245, 0.2);
        }

        .back-to-top {
            position: absolute;
            right: 40px;
            bottom: 40px;
            width: 44px;
            height: 44px;
            background: var(--surface-color);
            border: 1px solid var(--border-color);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: var(--transition);
            color: var(--text-primary);
            outline: none;
        }

        .back-to-top:hover {
            background: var(--primary-color);
            border-color: var(--primary-color);
            transform: translateY(-4px);
            box-shadow: 0 8px 20px rgba(109, 94, 245, 0.3);
        }

        /* Responsive */
        @media (max-width: 1024px) {
            .footer-top {
                grid-template-columns: 1fr 1fr;
            }
            .brand-section {
                grid-column: span 2;
                margin-bottom: 24px;
            }
        }

        @media (max-width: 640px) {
            .lumora-footer {
                padding: 60px 24px 100px;
                border-radius: 32px 32px 0 0;
            }
            .footer-top {
                grid-template-columns: 1fr;
                gap: 40px;
                text-align: center;
            }
            .brand-section {
                grid-column: span 1;
                align-items: center;
            }
            .footer-nav {
                align-items: center;
            }
            .footer-bottom {
                flex-direction: column;
                gap: 20px;
                text-align: center;
            }
            .back-to-top {
                right: 50%;
                transform: translateX(50%);
                bottom: 30px;
            }
            .back-to-top:hover {
                transform: translateX(50%) translateY(-4px);
            }
        }
    </style>

    <div class="footer-container">
        <div class="footer-top">
            <!-- Brand Column -->
            <div class="brand-section">
                <a href="index.php" class="footer-logo">
                   <img src="uploads/logo.png" alt="" class="h-20">
                </a>
                <p class="footer-tagline">Capture your thoughts. Preserve your memories. Your personal sanctuary for digital journaling.</p>
                <div class="social-links">
                    <a href="https://x.com/raghavudayy" class="social-link" aria-label="X (formerly Twitter)">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
                    </a>
                    <a href="https://github.com/raghavudayy" class="social-link" aria-label="GitHub">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><path d="M12 .297c-6.63 0-12 5.373-12 12 0 5.303 3.438 9.8 8.205 11.385.6.113.82-.258.82-.577 0-.285-.01-1.04-.015-2.04-3.338.724-4.042-1.61-4.042-1.61C4.422 18.07 3.633 17.7 3.633 17.7c-1.087-.744.084-.729.084-.729 1.205.084 1.838 1.236 1.838 1.236 1.07 1.835 2.809 1.305 3.495.998.108-.776.417-1.305.76-1.605-2.665-.3-5.466-1.332-5.466-5.93 0-1.31.465-2.38 1.235-3.22-.135-.303-.54-1.523.105-3.176 0 0 1.005-.322 3.3 1.23.96-.267 1.98-.399 3-.405 1.02.006 2.04.138 3 .405 2.28-1.552 3.285-1.23 3.285-1.23.645 1.653.24 2.873.12 3.176.765.84 1.23 1.91 1.23 3.22 0 4.61-2.805 5.625-5.475 5.92.42.36.81 1.096.81 2.22 0 1.606-.015 2.896-.015 3.286 0 .315.21.69.825.57C20.565 22.092 24 17.592 24 12.297c0-6.627-5.373-12-12-12"/></svg>
                    </a>
                    <a href="https://linkedin.com/in/raghavudayy" class="social-link" aria-label="LinkedIn">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg>
                    </a>
                </div>
            </div>

            <!-- Quick Navigation -->
            <div class="footer-column">
                <h4>Quick Navigation</h4>
                <ul class="footer-nav">
                    <li><a href="dashboard.php">Dashboard</a></li>
                    <li><a href="view_entries.php">My Diary</a></li>
                    <li><a href="add_entry.php">New Entry</a></li>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="profile.php">Profile</a></li>
                    <li><a href="features.php">Features</a></li>
                    <li><a href="about.php">About</a></li>
                </ul>
            </div>

            <!-- Support Column -->
            <div class="footer-column">
                <h4>Support</h4>
                <ul class="footer-nav">
                    <li><a href="help.php">Help Center</a></li>
                    <li><a href="privacy.php">Privacy Policy</a></li>
                    <li><a href="terms.php">Terms & Conditions</a></li>
                    <li><a href="contact.php">Contact Us</a></li>
                </ul>
            </div>
        </div>

        <div class="footer-bottom">
            <div class="footer-copyright">
                &copy; 2026 <strong>MemoNest</strong>. All Rights Reserved.
            </div>
            
            <div class="footer-center-note">
                Made with using PHP & MySQL
            </div>

            <div class="footer-meta">
                <span class="version-badge">v1.0.0</span>
            </div>
        </div>

        <button class="back-to-top" onclick="window.scrollTo({top: 0, behavior: 'smooth'})" aria-label="Back to top">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                <path d="M18 15l-6-6-6 6"/>
            </svg>
        </button>
    </div>
</footer>