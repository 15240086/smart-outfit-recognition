<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FitScan - Smart Outfit Recognition</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bungee&family=Crimson+Text:wght@400;600;700&family=EB+Garamond:wght@400;600;700&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">
    <link rel="icon" href="{{ asset('assets/images/logo.png') }}" type="image/x-icon">

    <style>
        html {
            scroll-behavior: smooth;
        }

        .font-title {
            font-family: "Bungee", sans-serif;
        }

        .font-body {
            font-family: "Inter", sans-serif;
        }

        .font-accent {
            font-family: "Crimson Text", serif;
        }

        .font-elegant {
            font-family: "EB Garamond", serif;
        }

        .nav-link {
            position: relative;
            color: #374151;
            text-decoration: none;
            transition: all 0.3s ease;
            padding-bottom: 4px;
            font-weight: 500;
        }

        .nav-link:hover {
            color: #3B6FD4;
        }

        .nav-link.active {
            color: #3B6FD4;
            font-weight: 600;
        }

        .nav-link.active::after, .nav-link:hover::after {
            content: "";
            position: absolute;
            left: 0;
            bottom: -4px;
            width: 100%;
            height: 2px;
            background-color: #3B6FD4;
            border-radius: 999px;
        }

        .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: rgba(59, 111, 212, 0.1);
            border: 1px solid rgba(59, 111, 212, 0.25);
            color: #3B6FD4;
            font-size: 0.82rem;
            font-weight: 500;
            padding: 6px 14px;
            border-radius: 999px;
            margin-bottom: 24px;
        }

        .hero-title {
            font-size: clamp(2rem, 4vw, 3rem);
            font-weight: 800;
            color: #0f172a;
            line-height: 1.2;
            margin-bottom: 20px;
        }

        .hero-title .accent-blue {
            color: #3B6FD4;
        }

        .hero-title .accent-orange {
            color: #E87F24;
        }

        .hero-desc {
            color: #4b5563;
            font-size: 1rem;
            line-height: 1.7;
            margin-bottom: 32px;
            max-width: 420px;
        }

        .hero-btn-primary {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: #3B6FD4;
            color: #fff;
            font-weight: 600;
            font-size: 0.95rem;
            padding: 13px 28px;
            border-radius: 12px;
            text-decoration: none;
            transition: background 0.2s ease, transform 0.2s ease;
        }

        .hero-btn-primary:hover {
            background: #2d5cbf;
            transform: translateY(-1px);
        }

        .hero-btn-secondary {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: transparent;
            color: #1e293b;
            font-weight: 600;
            font-size: 0.95rem;
            padding: 12px 24px;
            border-radius: 12px;
            border: 1.5px solid #cbd5e1;
            text-decoration: none;
            transition: border-color 0.2s ease, background 0.2s ease;
        }

        .hero-btn-secondary:hover {
            border-color: #3B6FD4;
            background: rgba(59, 111, 212, 0.05);
        }

        .hero-avatars {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-top: 36px;
        }

        .hero-avatar-stack {
            display: flex;
        }

        .hero-avatar-stack img {
            width: 38px;
            height: 38px;
            border-radius: 999px;
            border: 2px solid #fff;
            object-fit: cover;
            margin-left: -10px;
        }

        .hero-avatar-stack img:first-child {
            margin-left: 0;
        }

        .hero-avatar-text strong {
            display: block;
            font-size: 0.9rem;
            font-weight: 700;
            color: #0f172a;
        }

        .hero-avatar-text span {
            font-size: 0.8rem;
            color: #6b7280;
        }

        .hero-mockup-card {
            background: #fff;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(59, 111, 212, 0.12), 0 4px 16px rgba(0,0,0,0.06);
            overflow: hidden;
            position: relative;
        }

        .hero-mockup-topbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 14px 18px 10px;
            border-bottom: 1px solid #f1f5f9;
        }

        .hero-mockup-dots {
            display: flex;
            gap: 6px;
        }

        .hero-mockup-dots span {
            width: 10px;
            height: 10px;
            border-radius: 999px;
            background: #e2e8f0;
            display: block;
        }

        .hero-mockup-icon {
            color: #3B6FD4;
        }

        .hero-mockup-body {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 0;
        }

        .hero-mockup-photo-wrap {
            position: relative;
            background: #f8fafc;
        }

        .hero-mockup-photo-wrap img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        .hero-mockup-sparkle {
            position: absolute;
            bottom: 16px;
            left: 16px;
            width: 44px;
            height: 44px;
            border-radius: 12px;
            background: #fff;
            box-shadow: 0 4px 12px rgba(0,0,0,0.12);
            display: flex;
            align-items: center;
            justify-content: center;
            color: #3B6FD4;
        }

        .hero-mockup-results {
            padding: 16px 18px;
        }

        .hero-mockup-results h4 {
            font-size: 0.9rem;
            font-weight: 600;
            color: #0f172a;
            margin-bottom: 14px;
        }

        .hero-result-item {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 14px;
        }

        .hero-result-icon {
            width: 34px;
            height: 34px;
            border-radius: 8px;
            background: #EEF4FF;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            color: #3B6FD4;
        }

        .hero-result-info {
            flex: 1;
        }

        .hero-result-label {
            display: flex;
            justify-content: space-between;
            font-size: 0.78rem;
            font-weight: 600;
            color: #1e293b;
            margin-bottom: 5px;
        }

        .hero-result-bar-track {
            height: 5px;
            background: #e2e8f0;
            border-radius: 999px;
            overflow: hidden;
        }

        .hero-result-bar-fill {
            height: 100%;
            background: #3B6FD4;
            border-radius: 999px;
        }

        .hero-dominasi-card {
            background: #f8fafc;
            border-radius: 10px;
            padding: 12px 14px;
            margin-top: 4px;
            display: flex;
            gap: 8px;
            align-items: flex-start;
        }

        .hero-dominasi-card svg {
            flex-shrink: 0;
            color: #3B6FD4;
            margin-top: 2px;
        }

        .hero-dominasi-card p {
            font-size: 0.75rem;
            font-weight: 600;
            color: #1e293b;
            margin-bottom: 4px;
        }

        .hero-dominasi-card span {
            font-size: 0.72rem;
            color: #6b7280;
            line-height: 1.5;
            display: block;
        }

        .hero-scroll-hint {
            text-align: center;
            color: #94a3b8;
            font-size: 0.82rem;
            margin-top: 40px;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 4px;
        }

        .hero-dot-pattern {
            background-image: radial-gradient(circle, #cbd5e1 1px, transparent 1px);
            background-size: 22px 22px;
        }

        .hero-wave {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            pointer-events: none;
            overflow: hidden;
            line-height: 0;
        }

        .how-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: rgba(59, 111, 212, 0.1);
            border: 1px solid rgba(59, 111, 212, 0.25);
            color: #3B6FD4;
            font-size: 0.78rem;
            font-weight: 600;
            padding: 6px 16px;
            border-radius: 999px;
            letter-spacing: 0.05em;
            text-transform: uppercase;
            margin-bottom: 20px;
        }

        .how-title {
            font-size: clamp(1.8rem, 4vw, 2.6rem);
            font-weight: 800;
            color: #0f172a;
            line-height: 1.2;
            margin-bottom: 8px;
        }

        .how-title .accent-blue {
            color: #3B6FD4;
            display: block;
        }

        .how-desc {
            color: #64748b;
            font-size: 0.97rem;
            line-height: 1.7;
            max-width: 500px;
            margin: 0 auto 48px;
        }

        .how-step-card {
            background: #fff;
            border-radius: 20px;
            padding: 32px 24px 28px;
            position: relative;
            box-shadow: 0 4px 24px rgba(59, 111, 212, 0.08);
            text-align: center;
            flex: 1;
            margin-bottom: 40px;
        }

        .how-step-number {
            position: absolute;
            top: -16px;
            left: 24px;
            width: 36px;
            height: 36px;
            border-radius: 999px;
            background: #3B6FD4;
            color: #fff;
            font-size: 0.9rem;
            font-weight: 700;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 12px rgba(59, 111, 212, 0.35);
        }

        .how-step-illustration {
            width: 100%;
            height: 200px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 20px;
            border-radius: 12px;
            background: #F0F4FF;
            overflow: hidden;
            position: relative;
        }

        .how-step-title {
            font-size: 1rem;
            font-weight: 700;
            color: #0f172a;
            margin-bottom: 10px;
        }

        .how-step-desc {
            font-size: 0.85rem;
            color: #64748b;
            line-height: 1.6;
        }

        .how-connector {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            margin-top: -60px;
        }

        .how-connector-btn {
            width: 38px;
            height: 38px;
            border-radius: 999px;
            background: #EEF4FF;
            border: 1px solid rgba(59, 111, 212, 0.2);
            display: flex;
            align-items: center;
            justify-content: center;
            color: #3B6FD4;
        }

        .how-feature-item {
            display: flex;
            align-items: flex-start;
            gap: 14px;
        }

        .how-feature-icon {
            width: 44px;
            height: 44px;
            border-radius: 12px;
            background: #EEF4FF;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            color: #3B6FD4;
        }

        .how-feature-title {
            font-size: 0.92rem;
            font-weight: 700;
            color: #3B6FD4;
            margin-bottom: 4px;
        }

        .how-feature-desc {
            font-size: 0.82rem;
            color: #64748b;
            line-height: 1.5;
        }

        .how-result-mini {
            display: flex;
            flex-direction: column;
            gap: 8px;
            padding: 12px;
            background: #fff;
            border-radius: 10px;
            flex: 1;
        }

        .how-result-mini-item {
            display: flex;
            align-items: center;
            gap: 6px;
            font-size: 0.72rem;
        }

        .how-result-mini-bar-track {
            flex: 1;
            height: 4px;
            background: #e2e8f0;
            border-radius: 999px;
            overflow: hidden;
        }

        .how-result-mini-bar-fill {
            height: 100%;
            background: #3B6FD4;
            border-radius: 999px;
        }

        .how-result-mini-pct {
            font-size: 0.7rem;
            font-weight: 600;
            color: #3B6FD4;
            min-width: 28px;
            text-align: right;
        }

        .team-new-card {
            background: #fff;
            border-radius: 20px;
            padding: 28px 20px 22px;
            text-align: center;
            box-shadow: 0 4px 24px rgba(59, 111, 212, 0.08);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            position: relative;
        }

        .team-new-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 16px 40px rgba(59, 111, 212, 0.15);
        }

        .team-new-photo-wrap {
            position: relative;
            width: 120px;
            height: 120px;
            margin: 0 auto 16px;
        }

        .team-new-photo-wrap img {
            width: 120px;
            height: 120px;
            border-radius: 999px;
            object-fit: cover;
            display: block;
            background: #EEF4FF;
        }

        .team-new-role-badge {
            position: absolute;
            bottom: 2px;
            right: 2px;
            width: 32px;
            height: 32px;
            border-radius: 999px;
            background: #fff;
            box-shadow: 0 2px 8px rgba(59, 111, 212, 0.18);
            display: flex;
            align-items: center;
            justify-content: center;
            color: #3B6FD4;
        }

        .team-new-name {
            font-size: 1rem;
            font-weight: 700;
            color: #0f172a;
            margin-bottom: 4px;
        }

        .team-new-role {
            font-size: 0.82rem;
            font-weight: 600;
            color: #3B6FD4;
            margin-bottom: 12px;
        }

        .team-new-desc {
            font-size: 0.8rem;
            color: #64748b;
            line-height: 1.6;
            margin-bottom: 18px;
        }

        .team-new-socials {
            display: flex;
            justify-content: center;
            gap: 14px;
        }

        .team-new-socials a {
            color: #94a3b8;
            transition: color 0.2s ease;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .team-new-socials a:hover {
            color: #3B6FD4;
        }

        .team-job-badge {
            display: inline-flex;
            align-items: center;
            background: rgba(59, 111, 212, 0.1);
            border: 1px solid rgba(59, 111, 212, 0.22);
            color: #3B6FD4;
            font-size: 0.72rem;
            font-weight: 700;
            padding: 3px 10px;
            border-radius: 999px;
            margin-bottom: 10px;
            letter-spacing: 0.02em;
        }

        .team-new-nim {
            font-size: 0.78rem;
            font-weight: 600;
            color: #94a3b8;
            margin-bottom: 6px;
            letter-spacing: 0.03em;
        }

        .team-section-deco-left {
            position: absolute;
            top: 60px;
            left: 40px;
            opacity: 0.18;
            pointer-events: none;
        }

        .team-section-deco-right {
            position: absolute;
            top: 40px;
            right: 40px;
            opacity: 0.22;
            pointer-events: none;
        }

        .team-wave-bottom {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            pointer-events: none;
            overflow: hidden;
            line-height: 0;
        }

        .footer-new {
            background: linear-gradient(180deg, #d8e6f6 0%, #E8EFFA 100%);
            position: relative;
            overflow: hidden;
        }

        .footer-col-title {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 0.97rem;
            font-weight: 700;
            color: #3B6FD4;
            margin-bottom: 20px;
        }

        .footer-col-title svg {
            flex-shrink: 0;
            color: #3B6FD4;
        }

        .footer-nav-link {
            display: block;
            font-size: 0.88rem;
            color: #4b5563;
            text-decoration: none;
            margin-bottom: 12px;
            transition: color 0.2s ease;
        }

        .footer-nav-link:hover {
            color: #3B6FD4;
        }

        .footer-desc {
            font-size: 0.88rem;
            color: #4b5563;
            line-height: 1.7;
            margin-bottom: 20px;
            max-width: 260px;
        }

        .footer-social-btn {
            width: 38px;
            height: 38px;
            border-radius: 999px;
            background: rgba(59, 111, 212, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            color: #3B6FD4;
            text-decoration: none;
            transition: background 0.2s ease, transform 0.2s ease;
            flex-shrink: 0;
        }

        .footer-social-btn:hover {
            background: rgba(59, 111, 212, 0.2);
            transform: translateY(-2px);
        }

        .footer-privacy-card {
            background: rgba(59, 111, 212, 0.06);
            border: 1px solid rgba(59, 111, 212, 0.15);
            border-radius: 14px;
            padding: 14px 16px;
            display: flex;
            align-items: flex-start;
            gap: 12px;
            margin-top: 24px;
        }

        .footer-privacy-icon {
            width: 36px;
            height: 36px;
            border-radius: 10px;
            background: rgba(59, 111, 212, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            color: #3B6FD4;
            flex-shrink: 0;
        }

        .footer-privacy-title {
            font-size: 0.85rem;
            font-weight: 700;
            color: #0f172a;
            margin-bottom: 4px;
        }

        .footer-privacy-desc {
            font-size: 0.78rem;
            color: #64748b;
            line-height: 1.5;
        }

        .footer-about-desc {
            font-size: 0.88rem;
            color: #4b5563;
            line-height: 1.7;
            margin-bottom: 20px;
        }

        .footer-email-form {
            display: flex;
            gap: 0;
            margin-bottom: 10px;
        }

        .footer-email-input {
            flex: 1;
            padding: 11px 16px;
            border: 1.5px solid #e2e8f0;
            border-right: none;
            border-radius: 10px 0 0 10px;
            font-size: 0.88rem;
            color: #374151;
            background: #fff;
            outline: none;
            transition: border-color 0.2s ease;
        }

        .footer-email-input:focus {
            border-color: #3B6FD4;
        }

        .footer-email-input::placeholder {
            color: #9ca3af;
        }

        .footer-email-btn {
            width: 46px;
            border-radius: 0 10px 10px 0;
            background: #3B6FD4;
            color: #fff;
            border: none;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: background 0.2s ease;
            flex-shrink: 0;
        }

        .footer-email-btn:hover {
            background: #2d5cbf;
        }

        .footer-email-note {
            display: flex;
            align-items: flex-start;
            gap: 6px;
            font-size: 0.78rem;
            color: #64748b;
            line-height: 1.5;
        }

        .footer-email-note svg {
            flex-shrink: 0;
            color: #94a3b8;
            margin-top: 1px;
        }

        .footer-bottom {
            background: #fff;
            border-top: 1px solid #e2e8f0;
            padding: 18px 0;
        }

        .footer-bottom-link {
            font-size: 0.82rem;
            color: #64748b;
            text-decoration: none;
            transition: color 0.2s ease;
        }

        .footer-bottom-link:hover {
            color: #3B6FD4;
        }

        .footer-bottom-sep {
            color: #cbd5e1;
            font-size: 0.82rem;
        }

        .footer-scroll-top {
            width: 38px;
            height: 38px;
            border-radius: 999px;
            background: #3B6FD4;
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            transition: background 0.2s ease, transform 0.2s ease;
            flex-shrink: 0;
        }

        .footer-scroll-top:hover {
            background: #2d5cbf;
            transform: translateY(-2px);
        }
    </style>
</head>

<body class="bg-stone-50 text-gray-800">
    <!--begin::Header-->
    <header class="sticky top-0 z-50 bg-white border-b border-gray-200 shadow-sm">
        <!--begin::Header Container-->
        <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">
            <!--begin::Header Left-->
            <div>
                <!--begin::Header Title-->
                <h1 class="text-2xl font-title tracking-wide">
                    <!--begin::Title Primary-->
                    <span class="text-[#3B6FD4]">FITSCAN</span>
                    <!--end::Title Primary-->
                    <!--begin::Title Secondary-->
                    <span class="text-[#E87F24]"> AI</span>
                    <!--end::Title Secondary-->
                </h1>
                <!--end::Header Title-->
            </div>
            <!--end::Header Left-->
            <!--begin::Header Menu-->
            <nav class="hidden md:flex items-center gap-10 text-sm font-body text-gray-800">
                <!--begin::Menu Item-->
                <a href="#home" class="nav-link active">Beranda</a>
                <!--end::Menu Item-->
                <!--begin::Menu Item-->
                <a href="#about" class="nav-link">Tentang Kami</a>
                <!--end::Menu Item-->
                <!--begin::Menu Item-->
                <a href="#team" class="nav-link">Tim</a>
                <!--end::Menu Item-->
            </nav>
            <!--end::Header Menu-->
            <!--begin::Header Action-->
            <a href="{{ route('upload') }}" class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl bg-[#3B6FD4] text-white text-sm font-medium shadow-sm hover:bg-[#2d5cbf] transition">
                <!--begin::Upload Icon-->
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 16v2a2 2 0 002 2h12a2 2 0 002-2v-2M12 12V4m0 0L8 8m4-4l4 4" />
                </svg>
                <!--end::Upload Icon-->
                Unggah Gambar
            </a>
            <!--end::Header Action-->
        </div>
        <!--end::Header Container-->
    </header>
    <!--end::Header-->

    <!--begin::Hero Section-->
    <section id="home" class="relative overflow-hidden" style="background: linear-gradient(160deg, #EEF2FB 0%, #F0F4FF 60%, #E8EFFA 100%); min-height: 100vh; display: flex; flex-direction: column; justify-content: center;">
        <!--begin::Dot Pattern Overlay-->
        <div class="absolute inset-0 hero-dot-pattern opacity-40 pointer-events-none"></div>
        <!--end::Dot Pattern Overlay-->

        <!--begin::Hero Container-->
        <div class="relative max-w-7xl mx-auto px-4 py-20 md:py-14 w-full z-10">
            <!--begin::Hero Grid-->
            <div class="grid md:grid-cols-2 gap-12 items-center">

                <!--begin::Hero Left-->
                <div>
                    <!--begin::Hero Badge-->
                    <div class="hero-badge font-body">
                        <!--begin::AI Icon-->
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-sparkles-icon lucide-sparkles h-4 w-4"><path d="M11.017 2.814a1 1 0 0 1 1.966 0l1.051 5.558a2 2 0 0 0 1.594 1.594l5.558 1.051a1 1 0 0 1 0 1.966l-5.558 1.051a2 2 0 0 0-1.594 1.594l-1.051 5.558a1 1 0 0 1-1.966 0l-1.051-5.558a2 2 0 0 0-1.594-1.594l-5.558-1.051a1 1 0 0 1 0-1.966l5.558-1.051a2 2 0 0 0 1.594-1.594z"/><path d="M20 2v4"/><path d="M22 4h-4"/><circle cx="4" cy="20" r="2"/></svg>
                        <!--end::AI Icon-->
                        AI Outfit Recognition
                    </div>
                    <!--end::Hero Badge-->

                    <!--begin::Hero Title-->
                    <h2 class="hero-title font-title">
                        Identifikasi Jenis Outfit<br>
                        <span class="accent-blue">Langsung</span> dari Gambar<br>
                        dengan <span class="accent-orange">AI</span>
                    </h2>
                    <!--end::Hero Title-->

                    <!--begin::Hero Description-->
                    <p class="hero-desc font-body">
                        Unggah gambar atau ambil foto, dan biarkan AI kami menganalisis jenis pakaian yang dikenakan beserta tingkat dominasi outfit secara otomatis.
                    </p>
                    <!--end::Hero Description-->

                    <!--begin::Hero Buttons-->
                    <div class="flex flex-wrap items-center gap-4">
                        <!--begin::Primary Button-->
                        <a href="{{ route('upload') }}" class="hero-btn-primary">
                            <!--begin::Button Icon-->
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4 16v2a2 2 0 002 2h12a2 2 0 002-2v-2M12 12V4m0 0L8 8m4-4l4 4" />
                            </svg>
                            <!--end::Button Icon-->
                            Mulai Analisis
                        </a>
                        <!--end::Primary Button-->

                        <!--begin::Secondary Button-->
                        <a href="#about" class="hero-btn-secondary">
                            <!--begin::Button Icon-->
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <polygon points="5 3 19 12 5 21 5 3" fill="currentColor" stroke="none"/>
                            </svg>
                            <!--end::Button Icon-->
                            Lihat Cara Kerja
                        </a>
                        <!--end::Secondary Button-->
                    </div>
                    <!--end::Hero Buttons-->

                </div>
                <!--end::Hero Left-->

                <!--begin::Hero Right-->
                <div>
                    <!--begin::Mockup Card-->
                    <div class="hero-mockup-card">
                        <!--begin::Mockup Top Bar-->
                        <div class="hero-mockup-topbar">
                            <!--begin::Window Dots-->
                            <div class="hero-mockup-dots">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                            <!--end::Window Dots-->
                            <!--begin::Top Bar Icon-->
                            <div class="hero-mockup-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                    <rect x="3" y="3" width="18" height="18" rx="2" ry="2"/>
                                    <circle cx="8.5" cy="8.5" r="1.5"/>
                                    <polyline points="21 15 16 10 5 21"/>
                                </svg>
                            </div>
                            <!--end::Top Bar Icon-->
                        </div>
                        <!--end::Mockup Top Bar-->

                        <!--begin::Mockup Body-->
                        <div class="hero-mockup-body">
                            <!--begin::Photo Column-->
                            <div class="hero-mockup-photo-wrap" style="max-height: 400px;">
                                <!--begin::Model Photo-->
                                <img src="{{ asset('assets/images/background.jpg') }}" alt="Contoh analisis outfit">
                                <!--end::Model Photo-->
                                <!--begin::Sparkle Button-->
                                <div class="hero-mockup-sparkle">
                                    <!--begin::AI Icon-->
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-sparkles-icon lucide-sparkles h-4 w-4"><path d="M11.017 2.814a1 1 0 0 1 1.966 0l1.051 5.558a2 2 0 0 0 1.594 1.594l5.558 1.051a1 1 0 0 1 0 1.966l-5.558 1.051a2 2 0 0 0-1.594 1.594l-1.051 5.558a1 1 0 0 1-1.966 0l-1.051-5.558a2 2 0 0 0-1.594-1.594l-5.558-1.051a1 1 0 0 1 0-1.966l5.558-1.051a2 2 0 0 0 1.594-1.594z"/><path d="M20 2v4"/><path d="M22 4h-4"/><circle cx="4" cy="20" r="2"/></svg>
                                    <!--end::AI Icon-->
                                </div>
                                <!--end::Sparkle Button-->
                            </div>
                            <!--end::Photo Column-->

                            <!--begin::Results Column-->
                            <div class="hero-mockup-results">
                                <!--begin::Results Title-->
                                <h4 class="mt-4">Hasil Analisis</h4>
                                <!--end::Results Title-->

                                <!--begin::Result Item - Jas-->
                                <div class="hero-result-item">
                                    <!--begin::Item Icon-->
                                    <div class="hero-result-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M20.38 3.46L16 2a4 4 0 01-8 0L3.62 3.46a2 2 0 00-1.34 2.23l.58 3.57a1 1 0 00.99.84H6v10c0 1.1.9 2 2 2h8a2 2 0 002-2V10h2.15a1 1 0 00.99-.84l.58-3.57a2 2 0 00-1.34-2.23z"/>
                                        </svg>
                                    </div>
                                    <!--end::Item Icon-->
                                    <!--begin::Item Info-->
                                    <div class="hero-result-info">
                                        <div class="hero-result-label">
                                            <span>Jas</span>
                                            <span>40%</span>
                                        </div>
                                        <div class="hero-result-bar-track">
                                            <div class="hero-result-bar-fill" style="width: 40%;"></div>
                                        </div>
                                    </div>
                                    <!--end::Item Info-->
                                </div>
                                <!--end::Result Item - Jas-->

                                <!--begin::Result Item - Celana-->
                                <div class="hero-result-item">
                                    <!--begin::Item Icon-->
                                    <div class="hero-result-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 2h12l-2 10H8L6 2zM8 12l-2 10h4l2-6 2 6h4l-2-10"/>
                                        </svg>
                                    </div>
                                    <!--end::Item Icon-->
                                    <!--begin::Item Info-->
                                    <div class="hero-result-info">
                                        <div class="hero-result-label">
                                            <span>Celana</span>
                                            <span>30%</span>
                                        </div>
                                        <div class="hero-result-bar-track">
                                            <div class="hero-result-bar-fill" style="width: 30%;"></div>
                                        </div>
                                    </div>
                                    <!--end::Item Info-->
                                </div>
                                <!--end::Result Item - Celana-->

                                <!--begin::Result Item - Sepatu-->
                                <div class="hero-result-item">
                                    <!--begin::Item Icon-->
                                    <div class="hero-result-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 13l2-5h10l4 4v2H3z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 13v3h18v-1l-4-2H3z"/>
                                        </svg>
                                    </div>
                                    <!--end::Item Icon-->
                                    <!--begin::Item Info-->
                                    <div class="hero-result-info">
                                        <div class="hero-result-label">
                                            <span>Sepatu</span>
                                            <span>20%</span>
                                        </div>
                                        <div class="hero-result-bar-track">
                                            <div class="hero-result-bar-fill" style="width: 20%;"></div>
                                        </div>
                                    </div>
                                    <!--end::Item Info-->
                                </div>
                                <!--end::Result Item - Sepatu-->

                                <!--begin::Result Item - Topi-->
                                <div class="hero-result-item">
                                    <!--begin::Item Icon-->
                                    <div class="hero-result-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 2L3 6v14a2 2 0 002 2h14a2 2 0 002-2V6l-3-4z"/>
                                            <line x1="3" y1="6" x2="21" y2="6"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M16 10a4 4 0 01-8 0"/>
                                        </svg>
                                    </div>
                                    <!--end::Item Icon-->
                                    <!--begin::Item Info-->
                                    <div class="hero-result-info">
                                        <div class="hero-result-label">
                                            <span>Topi</span>
                                            <span>10%</span>
                                        </div>
                                        <div class="hero-result-bar-track">
                                            <div class="hero-result-bar-fill" style="width: 10%;"></div>
                                        </div>
                                    </div>
                                    <!--end::Item Info-->
                                </div>
                                <!--end::Result Item - Topi-->

                                <!--begin::Dominasi Card-->
                                <div class="hero-dominasi-card mt-4">
                                    <!--begin::Dominasi Icon-->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 2l2.4 7.4H22l-6.2 4.5 2.4 7.4L12 17l-6.2 4.3 2.4-7.4L2 9.4h7.6L12 2z"/>
                                    </svg>
                                    <!--end::Dominasi Icon-->
                                    <!--begin::Dominasi Text-->
                                    <div>
                                        <p>Tingkat Dominasi</p>
                                        <span>Persentase menunjukkan seberapa dominan item tersebut dalam keseluruhan outfit.</span>
                                    </div>
                                    <!--end::Dominasi Text-->
                                </div>
                                <!--end::Dominasi Card-->
                            </div>
                            <!--end::Results Column-->
                        </div>
                        <!--end::Mockup Body-->
                    </div>
                    <!--end::Mockup Card-->
                </div>
                <!--end::Hero Right-->

            </div>
            <!--end::Hero Grid-->

            <!--begin::Scroll Hint-->
            <div class="hero-scroll-hint font-body">
                <span>Scroll untuk eksplorasi</span>
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>
                </svg>
            </div>
            <!--end::Scroll Hint-->
        </div>
        <!--end::Hero Container-->

        <!--begin::Wave Decoration-->
        <div class="team-wave-bottom">
            <svg viewBox="0 0 1440 130" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" style="display:block; width:100%; height:130px;">
                <!--begin::Wave Layer 1 - Biru tua-->
                <path d="M0,90 C120,60 240,110 360,85 C480,60 600,105 720,80 C840,55 960,100 1080,75 C1200,50 1320,95 1440,70 L1440,130 L0,130 Z" fill="rgba(179,207,235,0.35)"/>
                <!--end::Wave Layer 1-->
                <!--begin::Wave Layer 2 - Biru sedang-->
                <path d="M0,105 C100,75 220,125 360,100 C500,75 620,118 760,95 C900,72 1020,115 1160,92 C1300,69 1380,108 1440,88 L1440,130 L0,130 Z" fill="rgba(179,207,235,0.2)"/>
                <!--end::Wave Layer 2-->
                <!--begin::Wave Layer 3 - Biru muda-->
                <path d="M0,115 C80,95 200,130 340,112 C480,94 580,128 720,110 C860,92 980,125 1120,108 C1260,91 1360,120 1440,105 L1440,130 L0,130 Z" fill="rgba(179,207,235,0.45)"/>
                <!--end::Wave Layer 3-->
            </svg>
        </div>
        <!--end::Wave Decoration-->

    </section>
    <!--end::Hero Section-->

    <!--begin::About Section-->
    <section id="about" class="relative py-20 overflow-hidden" style="background: linear-gradient(180deg, #c5d9f1 0%, #F0F4FF 100%);">
        <!--begin::Dot Pattern Overlay-->
        <div class="absolute inset-0 hero-dot-pattern opacity-30 pointer-events-none"></div>
        <!--end::Dot Pattern Overlay-->

        <!--begin::About Container-->
        <div class="relative max-w-5xl mx-auto px-6 z-10 pt-10 pb-20">

            <!--begin::Section Header-->
            <div class="text-center">
                <!--begin::About Badge-->
                <div class="how-badge font-body">
                    <!--begin::Badge Icon-->
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-3.5 h-3.5"><path d="M11.017 2.814a1 1 0 0 1 1.966 0l1.051 5.558a2 2 0 0 0 1.594 1.594l5.558 1.051a1 1 0 0 1 0 1.966l-5.558 1.051a2 2 0 0 0-1.594 1.594l-1.051 5.558a1 1 0 0 1-1.966 0l-1.051-5.558a2 2 0 0 0-1.594-1.594l-5.558-1.051a1 1 0 0 1 0-1.966l5.558-1.051a2 2 0 0 0 1.594-1.594z"/><path d="M20 2v4"/><path d="M22 4h-4"/><circle cx="4" cy="20" r="2"/></svg>
                    <!--end::Badge Icon-->
                    Tentang Kami
                </div>
                <!--end::About Badge-->

                <!--begin::About Title-->
                <h3 class="how-title font-body">
                    3 Langkah Mudah
                    <span class="accent-blue">Dapatkan Hasil Analisis</span>
                </h3>
                <!--end::About Title-->

                <!--begin::About Description-->
                <p class="how-desc font-body">
                    Fitscan AI menggunakan teknologi kecerdasan buatan untuk mengenali dan menganalisis outfit dari gambar dengan cepat dan akurat.
                </p>
                <!--end::About Description-->
            </div>
            <!--end::Section Header-->

            <!--begin::Steps Row-->
            <div class="flex flex-col md:flex-row items-stretch gap-0 md:gap-0 mb-14">

                <!--begin::Step 1-->
                <div class="how-step-card">
                    <!--begin::Step Number-->
                    <div class="how-step-number">1</div>
                    <!--end::Step Number-->

                    <!--begin::Step Illustration-->
                    <div class="how-step-illustration">
                        <!--begin::Upload SVG Illustration-->
                        <svg viewBox="0 0 200 160" xmlns="http://www.w3.org/2000/svg" class="w-full h-full">
                            <!-- Sparkle decorations -->
                            <text x="30" y="35" font-size="10" fill="#93C5FD" opacity="0.7">✦</text>
                            <text x="160" y="50" font-size="8" fill="#93C5FD" opacity="0.5">✦</text>
                            <text x="155" y="130" font-size="10" fill="#93C5FD" opacity="0.6">✦</text>
                            <!-- Browser window card -->
                            <rect x="30" y="30" width="140" height="100" rx="10" fill="white" stroke="#DBEAFE" stroke-width="1.5"/>
                            <!-- Browser dots -->
                            <circle cx="45" cy="42" r="3" fill="#BFDBFE"/>
                            <circle cx="55" cy="42" r="3" fill="#BFDBFE"/>
                            <circle cx="65" cy="42" r="3" fill="#BFDBFE"/>
                            <!-- Dashed upload area -->
                            <rect x="45" y="55" width="110" height="65" rx="8" fill="#EFF6FF" stroke="#93C5FD" stroke-width="1.5" stroke-dasharray="5,4"/>
                            <!-- Upload cloud icon -->
                            <path d="M90 95 L100 83 L110 95" stroke="#3B6FD4" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" fill="none"/>
                            <line x1="100" y1="83" x2="100" y2="103" stroke="#3B6FD4" stroke-width="2" stroke-linecap="round"/>
                            <path d="M82 103 Q80 103 80 101 Q80 92 88 90 Q88 82 96 82 Q104 82 104 90 Q112 90 112 101 Q112 103 110 103" stroke="#3B6FD4" stroke-width="1.8" stroke-linecap="round" fill="none"/>
                            <!-- Image icon bottom right -->
                            <rect x="125" y="105" width="22" height="18" rx="4" fill="#3B6FD4" opacity="0.15"/>
                            <path d="M128 119 L132 114 L136 117 L139 113 L144 119" stroke="#3B6FD4" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" fill="none"/>
                            <circle cx="131" cy="112" r="1.5" fill="#3B6FD4"/>
                        </svg>
                        <!--end::Upload SVG Illustration-->
                    </div>
                    <!--end::Step Illustration-->

                    <!--begin::Step Content-->
                    <h4 class="how-step-title font-body">Unggah Gambar</h4>
                    <p class="how-step-desc font-body">Unggah foto outfit Anda atau ambil gambar langsung melalui perangkat Anda.</p>
                    <!--end::Step Content-->
                </div>
                <!--end::Step 1-->

                <!--begin::Step Connector 1-->
                <div class="how-connector hidden md:flex">
                    <div class="how-connector-btn">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
                        </svg>
                    </div>
                </div>
                <!--end::Step Connector 1-->

                <!--begin::Step 2-->
                <div class="how-step-card">
                    <!--begin::Step Number-->
                    <div class="how-step-number">2</div>
                    <!--end::Step Number-->

                    <!--begin::Step Illustration-->
                    <div class="how-step-illustration">
                        <!--begin::AI SVG Illustration-->
                        <svg viewBox="0 0 200 160" xmlns="http://www.w3.org/2000/svg" class="w-full h-full">
                            <!-- Central AI box -->
                            <rect x="78" y="58" width="44" height="44" rx="10" fill="#3B6FD4"/>
                            <text x="100" y="86" text-anchor="middle" font-size="16" font-weight="bold" fill="white" font-family="sans-serif">AI</text>
                            <!-- Connecting lines -->
                            <line x1="56" y1="50" x2="78" y2="68" stroke="#BFDBFE" stroke-width="1.5" stroke-dasharray="3,3"/>
                            <line x1="144" y1="50" x2="122" y2="68" stroke="#BFDBFE" stroke-width="1.5" stroke-dasharray="3,3"/>
                            <line x1="56" y1="110" x2="78" y2="92" stroke="#BFDBFE" stroke-width="1.5" stroke-dasharray="3,3"/>
                            <line x1="144" y1="110" x2="122" y2="92" stroke="#BFDBFE" stroke-width="1.5" stroke-dasharray="3,3"/>
                            <line x1="100" y1="38" x2="100" y2="58" stroke="#BFDBFE" stroke-width="1.5" stroke-dasharray="3,3"/>
                            <line x1="100" y1="102" x2="100" y2="122" stroke="#BFDBFE" stroke-width="1.5" stroke-dasharray="3,3"/>
                            <!-- Outfit icon nodes -->
                            <!-- T-shirt top left -->
                            <circle cx="46" cy="42" r="18" fill="#EEF4FF"/>
                            <path d="M38 38 L42 34 L46 36 L50 34 L54 38 L50 40 L50 50 L42 50 L42 40 Z" stroke="#3B6FD4" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" fill="none"/>
                            <!-- Pants top right -->
                            <circle cx="154" cy="42" r="18" fill="#EEF4FF"/>
                            <path d="M147 36 L161 36 L159 46 L154 44 L149 46 Z M149 46 L147 52 M159 46 L161 52" stroke="#3B6FD4" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" fill="none"/>
                            <!-- Shoes bottom left -->
                            <circle cx="46" cy="118" r="18" fill="#EEF4FF"/>
                            <path d="M36 120 L44 112 L50 116 L56 120 L36 120 Z M36 120 L36 124 L56 124 L56 120" stroke="#3B6FD4" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" fill="none"/>
                            <!-- Bag bottom right -->
                            <circle cx="154" cy="118" r="18" fill="#EEF4FF"/>
                            <path d="M147 112 L161 112 L163 124 L145 124 Z M150 112 L150 108 L158 108 L158 112" stroke="#3B6FD4" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" fill="none"/>
                            <!-- Top node -->
                            <circle cx="100" cy="28" r="14" fill="#EEF4FF"/>
                            <path d="M95 25 L100 20 L105 25 M100 20 L100 34" stroke="#3B6FD4" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" fill="none"/>
                        </svg>
                        <!--end::AI SVG Illustration-->
                    </div>
                    <!--end::Step Illustration-->

                    <!--begin::Step Content-->
                    <h4 class="how-step-title font-body">AI Menganalisis</h4>
                    <p class="how-step-desc font-body">Sistem AI kami akan mendeteksi dan menganalisis berbagai jenis pakaian yang dikenakan.</p>
                    <!--end::Step Content-->
                </div>
                <!--end::Step 2-->

                <!--begin::Step Connector 2-->
                <div class="how-connector hidden md:flex">
                    <div class="how-connector-btn">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
                        </svg>
                    </div>
                </div>
                <!--end::Step Connector 2-->

                <!--begin::Step 3-->
                <div class="how-step-card">
                    <!--begin::Step Number-->
                    <div class="how-step-number">3</div>
                    <!--end::Step Number-->

                    <!--begin::Step Illustration-->
                    <div class="how-step-illustration" style="background: #F8FAFF; padding: 0; gap: 0;">
                        <!--begin::Result Preview Illustration-->
                        <div style="display:flex; width:100%; height:100%;">
                            <!--begin::Mini Photo-->
                            <div style="width: 45%; background: #e2e8f0; border-radius: 8px 0 0 8px; overflow: hidden; flex-shrink: 0;">
                                <img src="{{ asset('assets/images/background.jpg') }}" alt="Preview" style="width:100%; height:100%; object-fit:cover; display:block;">
                            </div>
                            <!--end::Mini Photo-->
                            <!--begin::Mini Results-->
                            <div class="how-result-mini">
                                <!--begin::Mini Result - Kemeja-->
                                <div class="how-result-mini-item">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 flex-shrink-0" style="color:#3B6FD4;" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M20.38 3.46L16 2a4 4 0 01-8 0L3.62 3.46a2 2 0 00-1.34 2.23l.58 3.57a1 1 0 00.99.84H6v10c0 1.1.9 2 2 2h8a2 2 0 002-2V10h2.15a1 1 0 00.99-.84l.58-3.57a2 2 0 00-1.34-2.23z"/>
                                    </svg>
                                    <span style="font-size:0.65rem; color:#374151; font-weight:600; min-width:32px;">Kemeja</span>
                                    <div class="how-result-mini-bar-track">
                                        <div class="how-result-mini-bar-fill" style="width:85%;"></div>
                                    </div>
                                    <span class="how-result-mini-pct">85%</span>
                                </div>
                                <!--end::Mini Result - Kemeja-->
                                <!--begin::Mini Result - Celana-->
                                <div class="how-result-mini-item">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 flex-shrink-0" style="color:#3B6FD4;" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 2h12l-2 10H8L6 2zM8 12l-2 10h4l2-6 2 6h4l-2-10"/>
                                    </svg>
                                    <span style="font-size:0.65rem; color:#374151; font-weight:600; min-width:32px;">Celana</span>
                                    <div class="how-result-mini-bar-track">
                                        <div class="how-result-mini-bar-fill" style="width:75%;"></div>
                                    </div>
                                    <span class="how-result-mini-pct">75%</span>
                                </div>
                                <!--end::Mini Result - Celana-->
                                <!--begin::Mini Result - Sepatu-->
                                <div class="how-result-mini-item">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 flex-shrink-0" style="color:#3B6FD4;" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 13l2-5h10l4 4v2H3z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 13v3h18v-1l-4-2H3z"/>
                                    </svg>
                                    <span style="font-size:0.65rem; color:#374151; font-weight:600; min-width:32px;">Sepatu</span>
                                    <div class="how-result-mini-bar-track">
                                        <div class="how-result-mini-bar-fill" style="width:66%;"></div>
                                    </div>
                                    <span class="how-result-mini-pct">66%</span>
                                </div>
                                <!--end::Mini Result - Sepatu-->
                                <!--begin::Mini Result - Tas-->
                                <div class="how-result-mini-item">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 flex-shrink-0" style="color:#3B6FD4;" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 2L3 6v14a2 2 0 002 2h14a2 2 0 002-2V6l-3-4z"/>
                                        <line x1="3" y1="6" x2="21" y2="6"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M16 10a4 4 0 01-8 0"/>
                                    </svg>
                                    <span style="font-size:0.65rem; color:#374151; font-weight:600; min-width:32px;">Tas</span>
                                    <div class="how-result-mini-bar-track">
                                        <div class="how-result-mini-bar-fill" style="width:40%;"></div>
                                    </div>
                                    <span class="how-result-mini-pct">40%</span>
                                </div>
                                <!--end::Mini Result - Tas-->
                            </div>
                            <!--end::Mini Results-->
                        </div>
                        <!--end::Result Preview Illustration-->
                    </div>
                    <!--end::Step Illustration-->

                    <!--begin::Step Content-->
                    <h4 class="how-step-title font-body">Lihat Hasil</h4>
                    <p class="how-step-desc font-body">Dapatkan hasil analisis lengkap beserta tingkat dominasi setiap item outfit secara detail.</p>
                    <!--end::Step Content-->
                </div>
                <!--end::Step 3-->

            </div>
            <!--end::Steps Row-->

            <!--begin::Features Row-->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8">

                <!--begin::Feature - Akurat-->
                <div class="how-feature-item">
                    <!--begin::Feature Icon-->
                    <div class="how-feature-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                            <circle cx="12" cy="12" r="10"/>
                            <circle cx="12" cy="12" r="4"/>
                            <line x1="12" y1="2" x2="12" y2="6"/>
                            <line x1="12" y1="18" x2="12" y2="22"/>
                            <line x1="2" y1="12" x2="6" y2="12"/>
                            <line x1="18" y1="12" x2="22" y2="12"/>
                        </svg>
                    </div>
                    <!--end::Feature Icon-->
                    <!--begin::Feature Text-->
                    <div>
                        <p class="how-feature-title font-body">Akurat</p>
                        <p class="how-feature-desc font-body">Analisis tepat dengan teknologi AI terbaru</p>
                    </div>
                    <!--end::Feature Text-->
                </div>
                <!--end::Feature - Akurat-->

                <!--begin::Feature - Cepat-->
                <div class="how-feature-item">
                    <!--begin::Feature Icon-->
                    <div class="how-feature-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                            <polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"/>
                        </svg>
                    </div>
                    <!--end::Feature Icon-->
                    <!--begin::Feature Text-->
                    <div>
                        <p class="how-feature-title font-body">Cepat</p>
                        <p class="how-feature-desc font-body">Hasil analisis dalam hitungan detik</p>
                    </div>
                    <!--end::Feature Text-->
                </div>
                <!--end::Feature - Cepat-->

                <!--begin::Feature - Aman-->
                <div class="how-feature-item">
                    <!--begin::Feature Icon-->
                    <div class="how-feature-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4"/>
                        </svg>
                    </div>
                    <!--end::Feature Icon-->
                    <!--begin::Feature Text-->
                    <div>
                        <p class="how-feature-title font-body">Aman</p>
                        <p class="how-feature-desc font-body">Privasi gambar Anda terjaga dengan aman</p>
                    </div>
                    <!--end::Feature Text-->
                </div>
                <!--end::Feature - Aman-->

                <!--begin::Feature - Informasi Lengkap-->
                <div class="how-feature-item">
                    <!--begin::Feature Icon-->
                    <div class="how-feature-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                            <line x1="18" y1="20" x2="18" y2="10"/>
                            <line x1="12" y1="20" x2="12" y2="4"/>
                            <line x1="6" y1="20" x2="6" y2="14"/>
                        </svg>
                    </div>
                    <!--end::Feature Icon-->
                    <!--begin::Feature Text-->
                    <div>
                        <p class="how-feature-title font-body">Informasi Lengkap</p>
                        <p class="how-feature-desc font-body">Detail outfit dan tingkat dominasi yang informatif</p>
                    </div>
                    <!--end::Feature Text-->
                </div>
                <!--end::Feature - Informasi Lengkap-->

            </div>
            <!--end::Features Row-->

        </div>
        <!--end::How Container-->

        <!--begin::Wave Decoration-->
        <div class="team-wave-bottom">
            <svg viewBox="0 0 1440 130" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" style="display:block; width:100%; height:130px;">
                <!--begin::Wave Layer 1 - Biru tua-->
                <path d="M0,90 C120,60 240,110 360,85 C480,60 600,105 720,80 C840,55 960,100 1080,75 C1200,50 1320,95 1440,70 L1440,130 L0,130 Z" fill="rgba(179,207,235,0.35)"/>
                <!--end::Wave Layer 1-->
                <!--begin::Wave Layer 2 - Biru sedang-->
                <path d="M0,105 C100,75 220,125 360,100 C500,75 620,118 760,95 C900,72 1020,115 1160,92 C1300,69 1380,108 1440,88 L1440,130 L0,130 Z" fill="rgba(179,207,235,0.2)"/>
                <!--end::Wave Layer 2-->
                <!--begin::Wave Layer 3 - Biru muda-->
                <path d="M0,115 C80,95 200,130 340,112 C480,94 580,128 720,110 C860,92 980,125 1120,108 C1260,91 1360,120 1440,105 L1440,130 L0,130 Z" fill="rgba(179,207,235,0.45)"/>
                <!--end::Wave Layer 3-->
            </svg>
        </div>
        <!--end::Wave Decoration-->
    </section>
    <!--end::About Section-->

    <!--begin::Team Section-->
    <section id="team" class="relative py-24 overflow-hidden" style="background: linear-gradient(180deg, #c5d9f1 0%, #F0F4FF 100%);">
        <!--begin::Dot Pattern Overlay-->
        <div class="absolute inset-0 hero-dot-pattern opacity-25 pointer-events-none"></div>
        <!--end::Dot Pattern Overlay-->

        <!--begin::Deco Left-->
        <div class="team-section-deco-left hidden lg:block">
            <!--begin::Dot Grid-->
            <svg width="80" height="120" viewBox="0 0 80 120" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g fill="#3B6FD4">
                    <circle cx="8" cy="8" r="2.5"/><circle cx="24" cy="8" r="2.5"/><circle cx="40" cy="8" r="2.5"/><circle cx="56" cy="8" r="2.5"/>
                    <circle cx="8" cy="24" r="2.5"/><circle cx="24" cy="24" r="2.5"/><circle cx="40" cy="24" r="2.5"/><circle cx="56" cy="24" r="2.5"/>
                    <circle cx="8" cy="40" r="2.5"/><circle cx="24" cy="40" r="2.5"/><circle cx="40" cy="40" r="2.5"/><circle cx="56" cy="40" r="2.5"/>
                    <circle cx="8" cy="56" r="2.5"/><circle cx="24" cy="56" r="2.5"/><circle cx="40" cy="56" r="2.5"/><circle cx="56" cy="56" r="2.5"/>
                    <circle cx="8" cy="72" r="2.5"/><circle cx="24" cy="72" r="2.5"/><circle cx="40" cy="72" r="2.5"/><circle cx="56" cy="72" r="2.5"/>
                </g>
            </svg>
            <!--end::Dot Grid-->
            <!--begin::Arrow Deco-->
            <svg width="80" height="80" viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg" class="mt-2 ml-6">
                <path d="M10 60 Q30 10 70 20" stroke="#3B6FD4" stroke-width="2" stroke-linecap="round" fill="none"/>
                <path d="M65 14 L70 20 L62 22" stroke="#3B6FD4" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" fill="none"/>
            </svg>
            <!--end::Arrow Deco-->
        </div>
        <!--end::Deco Left-->

        <!--begin::Deco Right-->
        <div class="team-section-deco-right hidden lg:block">
            <!--begin::Sparkle Large-->
            <svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M24 4 L26 22 L44 24 L26 26 L24 44 L22 26 L4 24 L22 22 Z" fill="#3B6FD4"/>
            </svg>
            <!--end::Sparkle Large-->
            <!--begin::Sparkle Small-->
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="ml-10 mt-2">
                <path d="M12 2 L13 11 L22 12 L13 13 L12 22 L11 13 L2 12 L11 11 Z" fill="#3B6FD4"/>
            </svg>
            <!--end::Sparkle Small-->
        </div>
        <!--end::Deco Right-->

        <!--begin::Team Container-->
        <div class="relative max-w-7xl mx-auto px-6 z-10">

            <!--begin::Section Header-->
            <div class="text-center mb-14">
                <!--begin::Team Badge-->
                <div class="how-badge font-body" style="margin-bottom: 16px;">
                    <!--begin::Badge Icon-->
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>
                    <!--end::Badge Icon-->
                    Tim Pengembang
                </div>
                <!--end::Team Badge-->

                <!--begin::Team Title-->
                <h3 class="font-body mb-4" style="font-size: clamp(1.8rem, 4vw, 2.8rem); font-weight: 800; color: #0f172a; line-height: 1.2;">
                    Kenali Tim di Balik <span style="color: #3B6FD4;">Fitscan AI</span>
                </h3>
                <!--end::Team Title-->

                <!--begin::Team Description-->
                <p class="font-body" style="color: #64748b; font-size: 0.97rem; line-height: 1.7; max-width: 520px; margin: 0 auto;">
                    Kami adalah sekelompok pengembang dan desainer yang berkomitmen membangun teknologi AI untuk memudahkan identifikasi outfit Anda.
                </p>
                <!--end::Team Description-->
            </div>
            <!--end::Section Header-->

            <!--begin::Team Grid-->
            <div class="grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6">

                <!--begin::Team Member - Ryan-->
                <div class="team-new-card">
                    <!--begin::Photo Wrap-->
                    <div class="team-new-photo-wrap">
                        <img src="{{ asset('assets/images/profile-2.jpeg') }}" alt="Ryan Raphael Setiawan">
                        <!--begin::Role Badge Icon-->
                        <div class="team-new-role-badge">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 3l14 9-14 9V3z"/>
                            </svg>
                        </div>
                        <!--end::Role Badge Icon-->
                    </div>
                    <!--end::Photo Wrap-->
                    <!--begin::Member Info-->
                    <p class="team-new-name font-body">Ryan Raphael Setiawan</p>
                    <p class="team-new-nim font-body">15240053</p>
                    <div>
                        <span class="team-job-badge font-body">Team Leader</span>
                    </div>
                    <p class="team-new-desc font-body">Mengatur jalannya pengembangan proyek, koordinasi anggota tim, serta memastikan seluruh fitur berjalan dengan baik.</p>
                    <!--end::Member Info-->
                    <!--begin::Socials-->
                    <div class="team-new-socials">
                        <!--begin::Social - WhatsApp-->
                        <a href="https://wa.me/6282129248115" target="_blank" rel="noopener noreferrer" aria-label="WhatsApp">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                            </svg>
                        </a>
                        <!--end::Social - WhatsApp-->
                        <!--begin::Social - Mail-->
                        <a href="mailto:15240053@bsi.ac.id" target="_blank" aria-label="Email">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                        </a>
                        <!--end::Social - Mail-->
                        <!--begin::Social - Instagram-->
                        <a href="https://www.instagram.com/rrszyders?igsh=NHFnbnN2eXlrdDcw" target="_blank" rel="noopener noreferrer" aria-label="Instagram">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                <rect x="2" y="2" width="20" height="20" rx="5" ry="5"/>
                                <circle cx="12" cy="12" r="4"/>
                                <circle cx="17.5" cy="6.5" r="0.5" fill="currentColor"/>
                            </svg>
                        </a>
                        <!--end::Social - Instagram-->
                    </div>
                    <!--end::Socials-->
                </div>
                <!--end::Team Member - Ryan-->

                <!--begin::Team Member - Melawati-->
                <div class="team-new-card">
                    <!--begin::Photo Wrap-->
                    <div class="team-new-photo-wrap">
                        <img src="{{ asset('assets/images/profile-3.jpeg') }}" alt="Melawati">
                        <!--begin::Role Badge Icon-->
                        <div class="team-new-role-badge">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <polyline points="16 18 22 12 16 6"/>
                                <polyline points="8 6 2 12 8 18"/>
                            </svg>
                        </div>
                        <!--end::Role Badge Icon-->
                    </div>
                    <!--end::Photo Wrap-->
                    <!--begin::Member Info-->
                    <p class="team-new-name font-body">Melawati</p>
                    <p class="team-new-nim font-body">15240086</p>
                    <div>
                        <span class="team-job-badge font-body">Web Developer</span>
                    </div>
                    <p class="team-new-desc font-body">Mengembangkan fitur website, implementasi antarmuka, dan integrasi sistem AI pada aplikasi.</p>
                    <!--end::Member Info-->
                    <!--begin::Socials-->
                    <div class="team-new-socials">
                        <!--begin::Social - WhatsApp-->
                        <a href="https://wa.me/6282124390154" target="_blank" rel="noopener noreferrer" aria-label="WhatsApp">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                            </svg>
                        </a>
                        <!--end::Social - WhatsApp-->
                        <!--begin::Social - Mail-->
                        <a href="mailto:15240086@bsi.ac.id" target="_blank" aria-label="Email">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                        </a>
                        <!--end::Social - Mail-->
                        <!--begin::Social - Instagram-->
                        <a href="https://www.instagram.com/mela.watii_?igsh=MTc1d2UwbTB0ZGc5Ng==" target="_blank" rel="noopener noreferrer" aria-label="Instagram">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                <rect x="2" y="2" width="20" height="20" rx="5" ry="5"/>
                                <circle cx="12" cy="12" r="4"/>
                                <circle cx="17.5" cy="6.5" r="0.5" fill="currentColor"/>
                            </svg>
                        </a>
                        <!--end::Social - Instagram-->
                    </div>
                    <!--end::Socials-->
                </div>
                <!--end::Team Member - Melawati-->

                <!--begin::Team Member - Rivan-->
                <div class="team-new-card">
                    <!--begin::Photo Wrap-->
                    <div class="team-new-photo-wrap">
                        <img src="{{ asset('assets/images/profile-4.webp') }}" alt="Muhammad Rivan Aldiansyah">
                        <!--begin::Role Badge Icon-->
                        <div class="team-new-role-badge">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                        </div>
                        <!--end::Role Badge Icon-->
                    </div>
                    <!--end::Photo Wrap-->
                    <!--begin::Member Info-->
                    <p class="team-new-name font-body">Muhammad Rivan Aldiansyah</p>
                    <p class="team-new-nim font-body">15240681</p>
                    <div>
                        <span class="team-job-badge font-body">Documentation</span>
                    </div>
                    <p class="team-new-desc font-body">Menyusun dokumentasi proyek, laporan pengembangan sistem, dan kebutuhan presentasi aplikasi.</p>
                    <!--end::Member Info-->
                    <!--begin::Socials-->
                    <div class="team-new-socials">
                        <!--begin::Social - WhatsApp-->
                        <a href="https://wa.me/628561344463" target="_blank" rel="noopener noreferrer" aria-label="WhatsApp">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                            </svg>
                        </a>
                        <!--end::Social - WhatsApp-->
                        <!--begin::Social - Mail-->
                        <a href="mailto:15240681@bsi.ac.id" target="_blank" aria-label="Email">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                        </a>
                        <!--end::Social - Mail-->
                        <!--begin::Social - Instagram-->
                        <a href="https://www.instagram.com/vandiansyah_?igsh=bjNvN2VxYXA0ZHRm" target="_blank" rel="noopener noreferrer" aria-label="Instagram">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                <rect x="2" y="2" width="20" height="20" rx="5" ry="5"/>
                                <circle cx="12" cy="12" r="4"/>
                                <circle cx="17.5" cy="6.5" r="0.5" fill="currentColor"/>
                            </svg>
                        </a>
                        <!--end::Social - Instagram-->
                    </div>
                    <!--end::Socials-->
                </div>
                <!--end::Team Member - Rivan-->

                <!--begin::Team Member - Wafiq-->
                <div class="team-new-card">
                    <!--begin::Photo Wrap-->
                    <div class="team-new-photo-wrap">
                        <img src="{{ asset('assets/images/profile-5.png') }}" alt="Wafiq Nur Aliyah">
                        <!--begin::Role Badge Icon-->
                        <div class="team-new-role-badge">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                <circle cx="12" cy="12" r="10"/>
                                <line x1="12" y1="8" x2="12" y2="12"/>
                                <line x1="12" y1="16" x2="12.01" y2="16"/>
                            </svg>
                        </div>
                        <!--end::Role Badge Icon-->
                    </div>
                    <!--end::Photo Wrap-->
                    <!--begin::Member Info-->
                    <p class="team-new-name font-body">Wafiq Nur Aliyah</p>
                    <p class="team-new-nim font-body">15240148</p>
                    <div>
                        <span class="team-job-badge font-body">System Analyst</span>
                    </div>
                    <p class="team-new-desc font-body">Menganalisis kebutuhan sistem, alur kerja aplikasi, serta membantu pengujian fitur agar berjalan optimal.</p>
                    <!--end::Member Info-->
                    <!--begin::Socials-->
                    <div class="team-new-socials">
                        <!--begin::Social - WhatsApp-->
                        <a href="https://wa.me/6285128004045" target="_blank" rel="noopener noreferrer" aria-label="WhatsApp">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                            </svg>
                        </a>
                        <!--end::Social - WhatsApp-->
                        <!--begin::Social - Mail-->
                        <a href="mailto:15240148@bsi.ac.id" target="_blank" aria-label="Email">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                        </a>
                        <!--end::Social - Mail-->
                        <!--begin::Social - Instagram-->
                        <a href="#" aria-label="Instagram">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                <rect x="2" y="2" width="20" height="20" rx="5" ry="5"/>
                                <circle cx="12" cy="12" r="4"/>
                                <circle cx="17.5" cy="6.5" r="0.5" fill="currentColor"/>
                            </svg>
                        </a>
                        <!--end::Social - Instagram-->
                    </div>
                    <!--end::Socials-->
                </div>
                <!--end::Team Member - Wafiq-->

                <!--begin::Team Member - Fitria-->
                <div class="team-new-card">
                    <!--begin::Photo Wrap-->
                    <div class="team-new-photo-wrap">
                        <img src="{{ asset('assets/images/profile-1.jpeg') }}" alt="Fitria Rahmadani">
                        <!--begin::Role Badge Icon-->
                        <div class="team-new-role-badge">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                        </div>
                        <!--end::Role Badge Icon-->
                    </div>
                    <!--end::Photo Wrap-->
                    <!--begin::Member Info-->
                    <p class="team-new-name font-body">Fitria Rahmadani</p>
                    <p class="team-new-nim font-body">15240566</p>
                    <div>
                        <span class="team-job-badge font-body">Support Team</span>
                    </div>
                    <p class="team-new-desc font-body">Membantu proses pengembangan proyek, pengumpulan kebutuhan, dan dukungan pengujian aplikasi.</p>
                    <!--end::Member Info-->
                    <!--begin::Socials-->
                    <div class="team-new-socials">
                        <!--begin::Social - WhatsApp-->
                        <a href="https://wa.me/6281519622557" target="_blank" rel="noopener noreferrer" aria-label="WhatsApp">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                            </svg>
                        </a>
                        <!--end::Social - WhatsApp-->
                        <!--begin::Social - Mail-->
                        <a href="mailto:15240566@bsi.ac.id" target="_blank" aria-label="Email">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                        </a>
                        <!--end::Social - Mail-->
                        <!--begin::Social - Instagram-->
                        <a href="https://www.instagram.com/fitriarhmdhni?igsh=MWZxaGNycmozemZxMw==" target="_blank" rel="noopener noreferrer" aria-label="Instagram">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                <rect x="2" y="2" width="20" height="20" rx="5" ry="5"/>
                                <circle cx="12" cy="12" r="4"/>
                                <circle cx="17.5" cy="6.5" r="0.5" fill="currentColor"/>
                            </svg>
                        </a>
                        <!--end::Social - Instagram-->
                    </div>
                    <!--end::Socials-->
                </div>
                <!--end::Team Member - Fitria-->

            </div>
            <!--end::Team Grid-->

        </div>
        <!--end::Team Container-->

    </section>
    <!--end::Team Section-->

    <!--begin::Footer-->
    <footer class="footer-new font-body">

        <!--begin::Footer Main-->
        <div class="max-w-7xl mx-auto px-6 pt-20 pb-12 relative z-10">
            <!--begin::Footer Grid-->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">

                <!--begin::Footer Col 1 - Brand-->
                <div class="lg:col-span-1">
                    <!--begin::Footer Logo-->
                    <h2 class="text-2xl font-title tracking-wide mb-4">
                        <span class="text-[#3B6FD4]">FITSCAN</span>
                        <span class="text-[#E87F24]"> AI</span>
                    </h2>
                    <!--end::Footer Logo-->

                    <!--begin::Footer Brand Desc-->
                    <p class="footer-desc">
                        Platform berbasis AI yang membantu Anda mengidentifikasi jenis outfit dari gambar dengan cepat, akurat, dan informatif.
                    </p>
                    <!--end::Footer Brand Desc-->

                    <!--begin::Footer Privacy Card-->
                    <div class="footer-privacy-card">
                        <!--begin::Privacy Icon-->
                        <div class="footer-privacy-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4"/>
                            </svg>
                        </div>
                        <!--end::Privacy Icon-->
                        <!--begin::Privacy Text-->
                        <div>
                            <p class="footer-privacy-title">Privasi & Keamanan Terjamin</p>
                            <p class="footer-privacy-desc">Gambar yang Anda unggah aman dan tidak disimpan tanpa izin.</p>
                        </div>
                        <!--end::Privacy Text-->
                    </div>
                    <!--end::Footer Privacy Card-->
                </div>
                <!--end::Footer Col 1 - Brand-->

                <!--begin::Footer Col 2 - Navigasi-->
                <div>
                    <!--begin::Col Title-->
                    <div class="footer-col-title">
                        <!--begin::Col Icon-->
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                        </svg>
                        <!--end::Col Icon-->
                        Navigasi
                    </div>
                    <!--end::Col Title-->
                    <!--begin::Nav Links-->
                    <a href="#home" class="footer-nav-link">Beranda</a>
                    <a href="#about" class="footer-nav-link">Tentang Kami</a>
                    <a href="#team" class="footer-nav-link">Tim</a>
                    <!--end::Nav Links-->
                </div>
                <!--end::Footer Col 2 - Navigasi-->

                <!--begin::Footer Col 3 - Tentang Kami-->
                <div>
                    <!--begin::Col Title-->
                    <div class="footer-col-title">
                        <!--begin::Col Icon-->
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                            <circle cx="12" cy="12" r="10"/>
                            <line x1="12" y1="8" x2="12" y2="12"/>
                            <line x1="12" y1="16" x2="12.01" y2="16"/>
                        </svg>
                        <!--end::Col Icon-->
                        Tentang Kami
                    </div>
                    <!--end::Col Title-->
                    <!--begin::About Desc-->
                    <p class="footer-about-desc">
                        Fitscan AI dikembangkan oleh tim mahasiswa yang berkomitmen menghadirkan solusi teknologi cerdas untuk kebutuhan sehari-hari.
                    </p>
                    <!--end::About Desc-->
                    <!--begin::Clothes Rack SVG Illustration-->
                    <svg viewBox="0 0 160 130" xmlns="http://www.w3.org/2000/svg" style="width:100%; max-width:160px; opacity:0.7;">
                        <!-- Rack pole vertical -->
                        <line x1="80" y1="10" x2="80" y2="120" stroke="#3B6FD4" stroke-width="2.5" stroke-linecap="round" opacity="0.4"/>
                        <!-- Rack horizontal bar -->
                        <line x1="20" y1="30" x2="140" y2="30" stroke="#3B6FD4" stroke-width="2.5" stroke-linecap="round" opacity="0.4"/>
                        <!-- Rack feet -->
                        <line x1="60" y1="120" x2="100" y2="120" stroke="#3B6FD4" stroke-width="2.5" stroke-linecap="round" opacity="0.4"/>
                        <line x1="80" y1="120" x2="70" y2="130" stroke="#3B6FD4" stroke-width="2" stroke-linecap="round" opacity="0.3"/>
                        <line x1="80" y1="120" x2="90" y2="130" stroke="#3B6FD4" stroke-width="2" stroke-linecap="round" opacity="0.3"/>
                        <!-- Hanger 1 -->
                        <path d="M45 30 Q45 22 52 22 Q59 22 59 30" stroke="#3B6FD4" stroke-width="1.8" fill="none" opacity="0.5"/>
                        <!-- Shirt 1 -->
                        <path d="M35 30 L40 26 L52 29 L64 26 L69 30 L63 35 L63 55 L41 55 L41 35 Z" stroke="#3B6FD4" stroke-width="1.5" fill="#EEF4FF" opacity="0.8"/>
                        <!-- Hanger 2 -->
                        <path d="M75 30 Q75 22 82 22 Q89 22 89 30" stroke="#3B6FD4" stroke-width="1.8" fill="none" opacity="0.5"/>
                        <!-- Shirt 2 -->
                        <path d="M65 30 L70 26 L82 29 L94 26 L99 30 L93 35 L93 58 L71 58 L71 35 Z" stroke="#3B6FD4" stroke-width="1.5" fill="#EEF4FF" opacity="0.8"/>
                        <!-- Hanger 3 -->
                        <path d="M105 30 Q105 22 112 22 Q119 22 119 30" stroke="#3B6FD4" stroke-width="1.8" fill="none" opacity="0.5"/>
                        <!-- Shirt 3 -->
                        <path d="M95 30 L100 26 L112 29 L124 26 L129 30 L123 35 L123 55 L101 55 L101 35 Z" stroke="#3B6FD4" stroke-width="1.5" fill="#EEF4FF" opacity="0.8"/>
                        <!-- Plant pot -->
                        <rect x="12" y="92" width="22" height="20" rx="3" stroke="#3B6FD4" stroke-width="1.5" fill="#EEF4FF" opacity="0.6"/>
                        <line x1="23" y1="92" x2="23" y2="78" stroke="#3B6FD4" stroke-width="1.5" opacity="0.5"/>
                        <path d="M23 82 Q30 76 35 80" stroke="#3B6FD4" stroke-width="1.5" fill="none" opacity="0.5"/>
                        <path d="M23 86 Q16 80 11 84" stroke="#3B6FD4" stroke-width="1.5" fill="none" opacity="0.5"/>
                        <!-- Drawer/box -->
                        <rect x="125" y="100" width="30" height="22" rx="3" stroke="#3B6FD4" stroke-width="1.5" fill="#EEF4FF" opacity="0.6"/>
                        <line x1="125" y1="111" x2="155" y2="111" stroke="#3B6FD4" stroke-width="1" opacity="0.4"/>
                        <circle cx="140" cy="106" r="2" fill="#3B6FD4" opacity="0.4"/>
                        <circle cx="140" cy="116" r="2" fill="#3B6FD4" opacity="0.4"/>
                    </svg>
                    <!--end::Clothes Rack SVG Illustration-->
                </div>
                <!--end::Footer Col 3 - Tentang Kami-->
            </div>
            <!--end::Footer Grid-->
        </div>
        <!--end::Footer Main-->

        <!--begin::Footer Bottom-->
        <div class="footer-bottom">
            <!--begin::Bottom Container-->
            <div class="max-w-7xl mx-auto px-6 flex flex-col md:flex-row items-center justify-between gap-4">
                <!--begin::Copyright-->
                <p class="text-sm font-body" style="color: #64748b;">
                    © 2026 <a href="#home" class="font-semibold" style="color: #3B6FD4; text-decoration: none;">Fitscan AI</a>. All rights reserved.
                </p>
                <!--end::Copyright-->
                <!--begin::Bottom Right-->
                <div class="flex items-center gap-4">
                    <!--begin::Bottom Links-->
                    <a href="#" class="footer-bottom-link">Kebijakan Privasi</a>
                    <span class="footer-bottom-sep">|</span>
                    <a href="#" class="footer-bottom-link">Syarat & Ketentuan</a>
                    <span class="footer-bottom-sep">|</span>
                    <a href="#" class="footer-bottom-link">Sitemap</a>
                    <!--end::Bottom Links-->
                    <!--begin::Scroll To Top-->
                    <a href="#home" class="footer-scroll-top" aria-label="Scroll ke atas">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 15l7-7 7 7"/>
                        </svg>
                    </a>
                    <!--end::Scroll To Top-->
                </div>
                <!--end::Bottom Right-->
            </div>
            <!--end::Bottom Container-->
        </div>
        <!--end::Footer Bottom-->
    </footer>
    <!--end::Footer-->

    <script src="https://cdn.tailwindcss.com"></script>

    <!--begin::Active Nav Script-->
    <script>
        (function () {
            <!--begin::Variables-->
            const navLinks = document.querySelectorAll('.nav-link');
            const sections = document.querySelectorAll('section[id]');
            <!--end::Variables-->

            <!--begin::Set Active Link-->
            function setActiveLink(id) {
                navLinks.forEach(function (link) {
                    link.classList.remove('active');
                    if (link.getAttribute('href') === '#' + id) {
                        link.classList.add('active');
                    }
                });
            }
            <!--end::Set Active Link-->

            <!--begin::Scroll Spy-->
            function onScroll() {
                let currentId = '';
                sections.forEach(function (section) {
                    const sectionTop = section.offsetTop - 80;
                    if (window.scrollY >= sectionTop) {
                        currentId = section.getAttribute('id');
                    }
                });
                if (currentId) {
                    setActiveLink(currentId);
                }
            }
            <!--end::Scroll Spy-->

            <!--begin::Click Handler-->
            navLinks.forEach(function (link) {
                link.addEventListener('click', function () {
                    const href = this.getAttribute('href');
                    if (href && href.startsWith('#')) {
                        setActiveLink(href.replace('#', ''));
                    }
                });
            });
            <!--end::Click Handler-->

            <!--begin::Event Listeners-->
            window.addEventListener('scroll', onScroll, { passive: true });
            onScroll();
            <!--end::Event Listeners-->
        })();
    </script>
    <!--end::Active Nav Script-->
</body>
</html>
